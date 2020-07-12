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
<link rel="stylesheet" href="overlaystyling.css" />
<link rel="stylesheet" href="profilestylings.css" />
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


<div id = "mymeetings"></div>
<!-- profile of confirmed matches -->

<!-- spinner -->
<div id = 'spinner'>
            <img src = 'ajax-loader.gif' width = '64' height = '64'/>
            <br>
            Loading...
</div>
</div>
<div id = "myappointments"></div>       
      <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
      <br>

                  <div class="footer">
                      <p>&copy All rights reserved by Sankalp</p>
            </div> 
<script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
  $("#sidebarCollapse").hide();
}

//extract id
function extractid(name)
     {
            var arr = name.split('[');
            arr = arr[1].split(']');
            var sentfrom = (arr[0]);
            var arr2 = name.split(']');
            arr2 = arr2[1].split('[');
            var sentto = (arr2[1]);
            return{
                'sentfrom' : sentfrom,
                'sentto' : sentto
            }

     }

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
  document.getElementById("myNav").style.width = "0%";
  $("#sidebarCollapse").show();
}

$('body').on('focus',"input[name='date']", function(){
        $(this).datepicker({
            numberOfMonths : 1,
            showAnim : "fadeIn",
            dateFormat: "dd-mm-yy",
             minDate : "0"
        });
    });


    $('body').on('focus',"input[name='date2']", function(){
        $(this).datepicker({
            numberOfMonths : 1,
            showAnim : "fadeIn",
            dateFormat: "dd-mm-yy",
            maxDate : "0"
        });
    });

    $('body').on('focus',"input[name='filterdate']", function(){
        $(this).datepicker({
            numberOfMonths : 1,
            showAnim : "fadeIn",
            dateFormat: "dd-mm-yy",
        });
    });

//ajax code for loading content

$(function(){  
  $("#spinner").show();
            $("#myappointments").hide();
          $.ajax({ 
        url: "affiliatemeetingscode.php",
        type: "POST",
        success: function(data){
                    if(data)
                        {
                          $("#spinner").hide();
                             $("#myappointments").html(data);
                             $("#myappointments").slideDown();
                        }
        },
        error: function(){
          $("#spinner").hide();
            $("#myappointments").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
            $("#myappointments").slideDown();
        }
    });
     }); 

     //content of generate report

     var displayForm = (c)=>{
         var button = (c.value);
         var id = extractid(button);
        var sentfrom = id.sentfrom;
        var sentto = id.sentto;
    if (c.value == "success["+sentfrom+"]["+sentto+"]") {   
        $("#littersize_"+sentfrom+"_"+sentto).slideDown();
        $("#birthdate_"+sentfrom+"_"+sentto).slideDown();
    }
        else if (c.value == "failure["+sentfrom+"]["+sentto+"]") {
            $("#littersize_"+sentfrom+"_"+sentto).slideUp();
        $("#birthdate_"+sentfrom+"_"+sentto).slideUp();
        $("#litter_"+sentfrom+"_"+sentto).text("");
        $("#date2_"+sentfrom+"_"+sentto).text("");
        $("#littererror_"+sentfrom+"_"+sentto).text("");
        $("#date2error_"+sentfrom+"_"+sentto).text("");

    }
};

function update() {
    console.log("Here");
if (document.getElementById('all').checked) {
    $("#filterdate").prop("disabled",true);
    $("#filterdate").val("All Dates");
    location.reload(true);
}
else if (document.getElementById('select').checked) {
    $("#filterdate").prop("disabled",false);
    $("#filterdate").val("Select Date");
}
}

$(document).on('change', "input[name='filterdate']", function() {
  var date = $('#filterdate').val();
  $("#myappointments").html("");
  $("#myappointments").hide();
  $("#spinner").show();
    datatopost = {"date": date}
    $.ajax({ 
    url: "filter.php",
    type: "POST",
    data: datatopost,
    success: function(data){
    if(data)
    {
        $("#spinner").hide();
        $("#myappointments").html(data);
        $("#myappointments").slideDown();
    }
        },
        error: function(){
          $("#spinner").hide();
            $("#myappointments").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
            $("#myappointments").slideDown();
        }
    });
  

})



     $(document).on("click", "#modify", function(event)
{
    event.preventDefault();
  var buttonname = $(this).attr('name');
  $(this).html("Processing...");
    $(this).prop('disabled', true);
    $(this).css("color", "black"); 
    var id = extractid(buttonname);
    console.log(buttonname);
    
    var sentfrom = id.sentfrom;
    var sentto = id.sentto;
    var datatopost = $("#modifyform_"+sentfrom+"_"+sentto).serializeArray();
    console.log(datatopost);
    console.log(sentfrom);
    console.log(sentto);
    datatopost.push({name: 'sentfrom', value: sentfrom});
    datatopost.push({name: 'sentto', value: sentto});
    $.ajax({
        url: "modifybooking.php",
        type: "POST",
        data: datatopost,
        success: (data) => {
            if(data == "nodate")
                    {
                        console.log("here2");
                        $(this).html("Modify");
                        $(this).prop('disabled', false);
                        $("#dateerror_"+sentfrom+"_"+sentto).text("");
                        $("#dateerror_"+sentfrom+"_"+sentto).text("Please enter the date");
                    }
                    else if(data == "invalid")
                    {
                        $(this).html("Modify");
                        $(this).prop('disabled', false);
                        $("#dateerror_"+sentfrom+"_"+sentto).text("");
                        $("#timeerror_"+sentfrom+"_"+sentto).text("");
                        $("#dateerror_"+sentfrom+"_"+sentto).text("Please enter a valid date");
                    }
                    else if(data == "previous")
                    {
                        $(this).html("Modify");
                        $(this).prop('disabled', false);
                        $("#dateerror_"+sentfrom+"_"+sentto).text("The date should not be of the past");
                    }
                    else if(data == "success")
                    {
                        $(this).html("Modified");
                        $(this).prop('disabled', true);
                        $(this).css("color", "black");
                        $("#dateerror_"+sentfrom+"_"+sentto).text("");
                        location.reload(true);
                    }
                    else
                    {
                        console.log(data);
                    }
        },
        error: function(){
            $("#confirmedmatches").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
 })  

 //downloading report

 $(document).on("click", "#download_report", function(event)
{
    event.preventDefault();
    var buttonname2 = $(this).attr('name'); 
    var id2 = extractid(buttonname2);
    var sentfrom2 = id2.sentfrom;
    var sentto2 = id2.sentto;
    window.open("http://websh.offyoucode.co.uk/dog%20matrimony/test.php?sentfrom="+encodeURIComponent(sentfrom2)+"&sentto="+encodeURIComponent(sentto2));
});

// generating report
 $(document).on("click", "#report", function(event)
{
    event.preventDefault();
    $(this).html("Generating...");
    $(this).prop('disabled', true);
    $(this).css("color", "black");
  var buttonname = $(this).attr('name'); 
    var id = extractid(buttonname);
    var sentfrom = id.sentfrom;
    var sentto = id.sentto;
    var datatopost = $("#reportform_"+sentfrom+"_"+sentto).serializeArray();
    datatopost.push({name: 'sentfrom', value: sentfrom});
    datatopost.push({name: 'sentto', value: sentto});
    console.log(datatopost);
    $.ajax({
        url: "generatereport.php",
        type: "POST",
        data: datatopost,
        success: (data)=>{
            if(data == "nolitter")
                    {
                        $(this).html("Generate");
                        $(this).prop('disabled', false);
                        $("#dateerror2_"+sentfrom+"_"+sentto).text("");
                        $("#littererror_"+sentfrom+"_"+sentto).text("Please enter the litter size");
                        $("#descriptionerror_"+sentfrom+"_"+sentto).text("");
                    }
                    else if(data == "nodob")
                    {
                        $(this).html("Generate");
                        $(this).prop('disabled', false);
                        $("#dateerror2_"+sentfrom+"_"+sentto).text("Please Enter the date of delivery");
                        $("#littererror_"+sentfrom+"_"+sentto).text("");
                        $("#descriptionerror_"+sentfrom+"_"+sentto).text("");
                    }
                    else if(data == "nodescription")
                    {
                        $(this).html("Generate");
                        $(this).prop('disabled', false);
                        $("#dateerror2_"+sentfrom+"_"+sentto).text("");
                        $("#littererror_"+sentfrom+"_"+sentto).text("");
                        $("#descriptionerror_"+sentfrom+"_"+sentto).text("Please Enter the description");
                    }
                    else if(data == "invaliddate")
                    {
                        $(this).html("Generate");
                        $(this).prop('disabled', false);
                        $("#littererror_"+sentfrom+"_"+sentto).text("");
                        $("#descriptionerror_"+sentfrom+"_"+sentto).text("");
                        $("#dateerror2_"+sentfrom+"_"+sentto).text("Please enter a valid date");
                    }
                    else if(data == "invalidlitter")
                    {
                        $(this).html("Generate");
                        $(this).prop('disabled', false);
                        $("#littererror_"+sentfrom+"_"+sentto).text("Please Enter the valid litter size");
                        $("#descriptionerror_"+sentfrom+"_"+sentto).text("");
                        $("#dateerror2_"+sentfrom+"_"+sentto).text("");
                    }
                    else if(data == "success")
                    {
                        $(this).html("Generated");
                        $(this).prop('disabled', true);
                        $(this).css("color", "black");
                        $("#dateerror2").text("");
                        $("#littererror").text("");
                        $("#descriptionerror").text("");
                        window.open("http://websh.offyoucode.co.uk/dog%20matrimony/test.php?sentfrom="+encodeURIComponent(sentfrom)+"&sentto="+encodeURIComponent(sentto));
                        location.reload(true);
                    }
                    else
                    {
                        $(this).prop('disabled', false);
                        console.log(data);
                    }
        },
        error: function(){
            $("#confirmedmatches").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
 })  

</script>