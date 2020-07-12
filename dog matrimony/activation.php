<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible"

content="IE=edge">

<meta name="viewport" content="width=device-width,

initial-scale=1">

<title>Account activation</title>
<link href="style.css" type="text/css" rel="stylesheet" />

<link href="css/bootstrap.min.css"

rel="stylesheet">

<link href=".css"

rel="stylesheet">

<style>

h1{

color:purple;

}

h3{

color: #5ee875;

}

.container-fluid

    {

        margin-top: 20px;

    }

.containingDiv{

border:1px solid #7c73f6;

margin-top: 100px;

border-radius: 15px;

}



</style>

</head>

<body>

<div class="container-fluid" >

<div class="row">

        <div  class = " col-xs-offset-2 col-xs-9 containingDiv">

            <h1>Account activation</h1>

<?php

        session_start();

        include ('connection.php');

            if(!isset($_GET['email']) || (!isset($_GET['key'])))

            {

                echo "<div class = 'alert alert-warning'>Something went wrong. Please try again later </div>";

            }

                else

                {

                    $email = $_GET['email'];  

            $key = $_GET['key'];

            $email = $link ->real_escape_string($email);

            $key = $link->real_escape_string($key);

            $sql = "SELECT * FROM users WHERE (email = '$email' and activation = '$key')";

            if($result = $link-> query($sql))
            {
                if($result->num_rows == 1)
                {
                    $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
                        if($result = $link ->query($sql))
                        {   
                            while ($rows = $result->fetch_array(MYSQLI_ASSOC))
                            {
                                $phone = $rows['contact'];
                                echo $phone;
                            }
                        }

                   echo "<div id = 'msg' class = 'alert alert-success'>You account is one step away from activaton </div>"; 
                    echo "<br><div id = 'msg2'></div>"; 
                    echo ' <div id = "msg3">Since it is a two step verification process. An otp will be sent to your mobile number for verification</div>
                    <input type="button" class="btnSubmit" value="Send OTP" onClick="sendOTP();">';
                    echo '
                    <div id = "verify">
                    <div class="error"></div>
                </div>
                <br>    
                ';

                }

            }

            else

            {

                echo "<div class = 'alert alert-danger'>You account could not be activated </div>"; 

                

            }

            

                }

            

        ?>    

    </div>

    </div>

</div>

<script

src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/j

query.min.js"></script>
<script>
function sendOTP() {
    console.log("Here");
    $(".error").html("").hide();
    var number = <?php echo $phone;?>;
    console.log(number);
    console.log(number.toString().length)
	if (number.toString().length == 10) {
		var input = {
			"mobile_number" : number,
			"action" : "send_otp"
		};
		$.ajax({
			url : 'controller.php',
			type : 'POST',
			data : input,
			success : function(response) {
				$("#verify").html(response);
			}
		});
	} else {
		$(".error").html('Please enter a valid number!')
		$(".error").show();
	}
}

function verifyOTP() {
    var number2 = <?php echo $phone;?>;
	$(".error").html("").hide();
	$(".success").html("").hide();
    var otp = $("#mobileOtp").val();
    console.log(number2);
	var input = {
		"otp" : otp,
		"action" : "verify_otp"
	};
	if (otp.length == 6 && otp != null) {
		$.ajax({
			url : 'controller.php',
			type : 'POST',
			dataType : "json",
			data : input,
			success : function(response) {
                $("." + response.type).html(response.message)
                $("." + response.type).show()
                $("#msg").hide();
                $("#msg3").hide();
                $('.btnSubmit').prop('disabled', true);
                if(response.message !== "Mobile number verification failed" )
                validate();
			},
			error : function() {
				alert("Please try later");
			}
		});
	} else {
		$(".error").html('You have entered wrong OTP.')
		$(".error").show();
	}
}

function validate()
{
    var email = "<?php echo $email; ?>";
    var datatopost =  {email: email}
      console.log(datatopost);
    $.ajax({
        type:"POST",
        url:"verification.php",
        data: datatopost,
        success: function(data)
        {
            console.log(data);
            if(data)
            {
                window.location.href = "index.php";
            }
        },
        error: function()
        {
            $("#msg2").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
})
}

</script>

<script src="js/bootstrap.min.js"></script>

</body>

</html>