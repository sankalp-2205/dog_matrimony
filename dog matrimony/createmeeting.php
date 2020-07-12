<?php
session_start();
if(!array_key_exists("username",$_SESSION))
{
    header("location:index.php");
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
<link rel="stylesheet" href="createmeetingstyle.css" />
<style>
              input.hidden {
    position: absolute;
    left: -9999px;
}

#profile-image1 {
    cursor: pointer;
  
     width: 100px;
    height: 100px;
	border:2px solid #03b1ce ;}
	.tital{ font-size:16px; font-weight:500;}
	 .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}
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
        <li><a href = "index.php?logout=1">Log out</a></li>
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

<!-- view dog modal -->
<div id = "createmeeting"></div>
<!-- profile of confirmed matches -->

<!-- spinner -->
<div id = 'spinner'>
            <img src = 'ajax-loader.gif' width = '64' height = '64'/>
            <br>
            Loading...
</div>
</div>
       
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

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
  document.getElementById("myNav").style.width = "0%";
  $("#sidebarCollapse").show();
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

// get data from url
function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return decodeURIComponent(sParameterName[1]);
        }
    }
}

$('body').on('focus',"input[name='date']", function(){
        $(this).datepicker({
            numberOfMonths : 1,
            showAnim : "fadeIn",
            dateFormat: "dd-mm-yy",
             minDate : "0"
        });
    });

//ajax call for creating meeting

var sentfrom = GetURLParameter('sentfrom');
var sentto= GetURLParameter('sentto');

       $(function(){  
        $("#error").fadeOut();
         $("#createmeeting").fadeOut();
         $("#spinner").show();
           datatopost = {"sentfrom":sentfrom,
                        "sentto":sentto};
          $.ajax({
        url: "createmeetingcode.php",
        type: "POST",
        data: datatopost,
        success: function(data){
                     if(data == "failure")
                     {
                         alert("This meeting is either already created or this match doesn't exist");
                         $("#spinner").hide();
                     }
                      else
                        {
                          $("#spinner").hide();
                            $("#createmeeting").html(data);
                            $("#createmeeting").fadeIn();
                        }
        },
        error: function(){
          $("#spinner").hide();
            $("#error").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
            $("#error").fadeIn();
        }
   });
    });  


$(document).on("click", "#schedule", function(event)
{
    $("#schedule").html("Processing...");
    $("#schedule").prop('disabled', true);
    $("#schedule").css("color", "black");
  event.preventDefault();
  var buttonname = $(this).attr('name'); 
    var id = extractid(buttonname);
    var datatopost = $("#scheduleform").serializeArray();
    var sentfrom = id.sentfrom;
    var sentto = id.sentto;
    console.log(sentfrom);
    console.log(sentto);
    datatopost.push({name: 'sentfrom', value: sentfrom});
    datatopost.push({name: 'sentto', value: sentto});
    $.ajax({
        url: "setbookingdate.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data == "nodate")
                    {
                        $("#schedule").html("Schedule");
                        $("#schedule").prop('disabled', false);
                        $("#dateerror").text("");
                        $("#timeerror").text("");
                        $("#dateerror").text("Please enter the date");
                    }
                    else if(data == "notime")
                    {
                        $("#schedule").html("Schedule");
                        $("#schedule").prop('disabled', false);
                        $("#dateerror").text("");
                        $("#timeerror").text("Please Enter the time");
                    }
                    else if(data == "invalid")
                    {
                        $("#schedule").html("Schedule");
                        $("#schedule").prop('disabled', false);
                        $("#dateerror").text("");
                        $("#timeerror").text("");
                        $("#dateerror").text("Please enter a valid date");
                    }
                    else if(data == "previous")
                    {
                        $("#schedule").html("Schedule");
                        $("#schedule").prop('disabled', false);
                        $("#dateerror").text("Correct");
                        $("#dateerror").text("The date should not be of the past");
                    }
                    else if(data == "success")
                    {
                        $("#schedule").html("Scheduled");
                        $("#schedule").prop('disabled', true);
                        $("#schedule").css("color", "black");
                        $("#dateerror").text("");
                        window.location.href = "http://websh.offyoucode.co.uk/dog%20matrimony/affiliatemeetings.php";

                    }
        },
        error: function(){
            $("#confirmedmatches").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
 })     

</script>