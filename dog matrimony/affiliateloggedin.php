<?php
session_start();
if(!array_key_exists("username",$_SESSION))
{
    header("location:http://websh.offyoucode.co.uk/alternate/index.php");
}
//$("#usernameafterlogin").html($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible"
content="IE=edge">
<meta name="viewport" content="width=device-width,
initial-scale=1">
<title>Dog Matrimony</title>
<link href="css/bootstrap.min.css"
rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/cupertino/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="mystyling.css" />
<link rel="stylesheet" href="affiliatestyling.css" />
<link rel="stylesheet" href="overlaystyling.css" />
<style>
 
</style>
<title>Dog Matrimony</title>
  </head>
  <body>
      
     

    
      <!-- navbar -->
      <nav class="navbar navbar-custom navbar-fixed-top">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class = "navbar-brand" href="#"> <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button type="button" onclick="openNav()" id="sidebarCollapse" class="btn btn-light" style = "background-color:#1b1f21; margin-top:-5px;" >
                    <i class="fa fa-bars" style="color:white;"></i>
                </button>
        </nav></a>
        <a class = "navbar-brand" href="#" style= "margin-left: -15px;">Dog Matrimony</a>
    <button type = "button" class = "navbar-toggle" data-target = "#navbarcollapse " data-toggle="collapse">
        <span class = "sr-only">Toggle navigation</span>
        <span class = "icon-bar"><i id = "bell" class="fa fa-bell" style="font-size:18px; display:none; color:#B97745;"></i></span>
        <span class = "icon-bar"></span>
        <span class = "icon-bar"></span>
    </button>
    </div>
    <div class="navbar-collapse collapse" id="navbarcollapse">
        <ul class = "nav navbar-nav">
        <!--<li><a href = "#"></a></li> -->
        </ul>
        <ul class = "nav navbar-nav navbar-right">
        <li><a href = "#">Hi <span id = "usernameafterlogin"> </span></a></li>
        <li><a href = "http://websh.offyoucode.co.uk/alternate/index.php?logout=1">Log out</a></li>
        </ul>
    </div>
    </div>  
    </nav>
</div>
</div>
                
      <!--Workarea -->
      <div id="myNav" class="overlay">

  <!-- Button to close the overlay navigation -->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <!-- Overlay content -->
  <div class="overlay-content">
    <a href="http://websh.offyoucode.co.uk/dog%20matrimony/affiliateloggedin.php"><i class="fa fa-home"></i>&nbsp;Home</a>
    <a href="http://websh.offyoucode.co.uk/dog%20matrimony/showaffiliatedogs.php"><i class="fas fa-dog"></i>&nbsp;My Dogs</a>
    <a href="http://websh.offyoucode.co.uk/dog%20matrimony/affiliationconfirmedmatches.php"><i class="fas fa-check"></i>&nbsp;Matches</a>
    <a href="http://websh.offyoucode.co.uk/dog%20matrimony/affiliatemeetings.php"><i class="fas fa-calendar-week"></i>&nbsp;Appointments</a>
  </div>

</div>

                <div id= "editprofile"></div>
                <div id = "myprofile"></div>
      <!--Workarea -->

      <div class='modal fade' id='changepasswordmodal' tabindex='-1' role='dialog' aria-labelledby='changepasswordmodalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
    <div class='modal-content'>
        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
            <h4 class='modal-title' id='myModalLabel'>Change Password</h4>
            </div>
        <div class='modal-body'>
        <div class="container">
<div class="row">
<div class="col-md-10">
<form method="post" id="passwordForm" class = "form-horizontal">
<div class='form-group'>
<div class='col-sm-9 col-md-7'>
<div id='errormessage'>
</div>
</div>
</div>
<div class='form-group'>
<label class='col-sm-2 control-label' for='currentpassword'>Current password:</label> 
<div class='col-xs-10 col-sm-4'>
<div class='input-group'>
<input id='currentpassword' name='currentpassword' type='password' placeholder='Current Password' class='form-control input-md'>
<div class="valid-feedback mb3" id = "currentpassworderror" style = "color: red">
</div>
</div>
</div>
</div>
<div class='form-group'>
<label class='col-sm-2 control-label' for='password'>New password:</label> 
<div class='col-xs-10 col-sm-4'>
<div class='input-group'>
<input id='password1' name='password1' type='password' placeholder='New Password' class='form-control input-md'>
<div class="col-sm-6">
<span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 7 Characters Long<br>
<span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
</div>
<div class="col-sm-6">
<span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
<span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Digit
</div>
<div class="valid-feedback mb3" id = "newpassworderror" style = "color: red"></div>
</div>
</div>
</div>
<div class='form-group'>
<label class='col-sm-2 control-label' for='password2'>Confirm password:</label>  
<div class='col-xs-12 col-sm-4'>
<div class='input-group'>
<input type="password" class="input-md form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off">
<div class="col-sm-12">
<span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
</div>
<div class="valid-feedback mb3" id = "confirmpassworderror" style = "color: red"></div>
</div>
</div>
</div>
<div class='text-center'>
<button class='btn green' type='button' id = 'changepasswordform'><span class='glyphicon glyphicon-thumbs-up'></span>
                    Submit
 </button>
 <button class='btn btn-danger' data-dismiss='modal'><span class='glyphicon glyphicon-remove-sign'></span>
                    Cancel
                    </button>
</div>
</form>
</div> 
</div>
</div>
</div>
</div>
</div>
</div> 

<form id="updateprofileform" method = "post" enctype = "multipart/form-data">
          <div class="container-fluid">
              <div class="row">
              <div class="col-xs-12">
                   <div id="updateprofile" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
                <div id="header" class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                    <h4><strong> Add Profile Picture:</strong></h4>
                </div>
                 <div class="modal-body">
                     <div id = "updatepicturemessage"></div>
                     <div><img class = "preview2" id = "profilepic" src = "profilepicture/dummy.png"/></div>
                     <div class="form-group">
            <label for = 'picture'>Select Picture</label>
            <input type="file" name="picture" id = 'picture'>
             </div>
                 <br>
             </div>
                   
                 <div class="modal-footer">
                     <button class="btn green" id = 'updateprofilebutton'>
                    Submit
                    </button>
                    <button class="btn btn-default" data-dismiss="modal">
                    Cancel
                    </button>
                </div>
              </div>      
        </div>
          </div>          
                  </div>
      </form>


    

<!--      -->
      <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
      <br>
      <div id="mydogs">
    
      </div>

                  <div class="footer">
                      <p>&copy All rights reserved by Sankalp</p>
            </div> 
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/j
query.min.js"></script>
<script src="js/bootstrap.min.js"></script>
      
    <script>  

function openNav() {
  document.getElementById("myNav").style.width = "100%";
  $("#sidebarCollapse").hide();
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
  document.getElementById("myNav").style.width = "0%";
  $("#sidebarCollapse").show();
}

    //js code for loading profile

    $(function(){  
          $.ajax({
        url: "affiliateloggedincode.php",
        type: "POST",
        success: function(data){
                    if(data)
                        {
                             $("#myprofile").html(data);
                        }
        },
        error: function(){
            $("#myprofile").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
     });


        // js code for show all my dogs ajax call-->
        $("input[type=password]").keyup(function(){
    var ucase = new RegExp("[A-Z]+");
	var lcase = new RegExp("[a-z]+");
	var num = new RegExp("[0-9]+");
	
	if($("#password1").val().length >= 7){
		$("#8char").removeClass("glyphicon-remove");
		$("#8char").addClass("glyphicon-ok");
		$("#8char").css("color","#00A41E");
	}else{
		$("#8char").removeClass("glyphicon-ok");
		$("#8char").addClass("glyphicon-remove");
		$("#8char").css("color","#FF0004");
	}
	
	if(ucase.test($("#password1").val())){
		$("#ucase").removeClass("glyphicon-remove");
		$("#ucase").addClass("glyphicon-ok");
		$("#ucase").css("color","#00A41E");
	}else{
		$("#ucase").removeClass("glyphicon-ok");
		$("#ucase").addClass("glyphicon-remove");
		$("#ucase").css("color","#FF0004");
	}
	if(lcase.test($("#password1").val())){
		$("#lcase").removeClass("glyphicon-remove");
		$("#lcase").addClass("glyphicon-ok");
		$("#lcase").css("color","#00A41E");
	}else{
		$("#lcase").removeClass("glyphicon-ok");
		$("#lcase").addClass("glyphicon-remove");
		$("#lcase").css("color","#FF0004");
	}
	if(num.test($("#password1").val())){
		$("#num").removeClass("glyphicon-remove");
		$("#num").addClass("glyphicon-ok");
		$("#num").css("color","#00A41E");
	}else{
		$("#num").removeClass("glyphicon-ok");
		$("#num").addClass("glyphicon-remove");
		$("#num").css("color","#FF0004");
	}
	
	if($("#password1").val() == $("#password2").val()){
		$("#pwmatch").removeClass("glyphicon-remove");
		$("#pwmatch").addClass("glyphicon-ok");
		$("#pwmatch").css("color","#00A41E");
	}else{
		$("#pwmatch").removeClass("glyphicon-ok");
		$("#pwmatch").addClass("glyphicon-remove");
		$("#pwmatch").css("color","#FF0004");
	}
});        

function emptyalltext()
{
    $("#currentpassworderror").text("");
    $("#newpassworderror").text("");
    $("#confirmpassworderror").text("");

}

//edit password modal
$(document).on("click", "#changepasswordform", function(event){
        console.log("here");
        var datatopost = $('#passwordForm').serializeArray();
        $.ajax({
        url: "changeaffiliatepassword.php",
        type: "POST",
        data: datatopost,
        success: function(data){
                    if(data)
                        {
                            if(data == "nocurrentpassword")
                            {
                                emptyalltext();
                                $("#currentpassworderror").text("Please Enter the Current Password");
                            }
                            else if(data == "nonewpassword")
                            {
                                emptyalltext();
                                $("#newpassworderror").text("Enter the New Password");
                            }
                            else if(data == "noconfirmpassword")
                            {
                                emptyalltext();
                                $("#confirmpassworderror").text("Please Enter the Confirm Password");
                            }
                            else if(data == "invalidpassword")
                            {
                                emptyalltext();
                                $("#newpassworderror").text("Please Enter the Valid Password");
                            }
                            else if(data == "passwordsdidnotmatch")
                            {
                                emptyalltext();
                                $("#confirmpassworderror").text("Passwords did not match");
                            }
                            else if(data == "incorrectpassword")
                            {
                                emptyalltext();
                                $("#currentpassworderror").text("The password is incorrect");
                            }
                            else if(data == "success")
                            {
                                emptyalltext();
                                $("#errormessage").html("<div class = 'alert alert-success'>Password successfully updates</div>");
                                location.reload(true);
                            }
                            else
                            {
                                $("#errormessage").html(data);
                            }
                        }
        },
        error: function(){
            $("#errormessage").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
});  


//edit profile modal
$(document).on("click", "#submiteditform", function(event){
        var datatopost = $('#editform').serializeArray();
        $.ajax({
        url: "editaffiliatedprofile.php",
        type: "POST",
        data: datatopost,
        success: function(data){
                    if(data)
                        {
                            if(data == "success")
                            {
                                location.reload(true);
                            }
                            else
                            {
                                $("#editmessage").html(data);
                            }
                        }
        },
        error: function(){
            $("#editmessage").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
});   

var file;
var imageType;
$(document).on("change","#picture",function(){
    file = this.files[0];
    console.log(file);
    imageType = file.type;
    imageSize = file.size;
    var match= ["image/jpeg","image/png","image/jpg"];
    if($.inArray(imageType, match) == -1){
        $("#updatepicturemessage").html("<div class='alert alert-danger'>Wrong file format!</div>");
        return false;
    }
    if(imageSize > 3*1024*1024)
    {
        $("#updatepicturemessage").html("<div class='alert alert-danger'>File too big!</div>");
        return false;
    }
        var reader = new FileReader();
        reader.onload = updatePreview;
        reader.readAsDataURL(this.files[0]);
})

function updatePreview(event)
{
    $("#profilepic").attr("src",event.target.result);
}
$(document).on("click","#updateprofilebutton" , function(event){
    event.preventDefault();
    if(!file)
    {
        $("#updatepicturemessage").html("<div class='alert alert-danger'>Please upload a picture</div>");
        return false; 
    }
    var match= ["image/jpeg","image/png","image/jpg"];
    if($.inArray(imageType, match) == -1){
        $("#updatepicturemessage").html("<div class='alert alert-danger'>Wrong file format!</div>");
        return false;
    }
    if(imageSize > 3*1024*1024)
    {
        $("#updatepicturemessage").html("<div class='alert alert-danger'>File too big!</div>");
        return false;
    }
    $("#updatepicturemessage").html("<div class='alert alert-success'>Updating</div>");
    $.ajax({
        url: "affiliatedp.php",
        type: "POST",
        data: new FormData(document.getElementById("updateprofileform")),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
                location.reload(true);
            },
        error: function(){
            $("#updatepicturemessage").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
});
</script>
    
</body>
</html>