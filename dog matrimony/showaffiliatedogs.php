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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="mystyling.css" />
<link rel="stylesheet" href="overlaystyling.css" />
<link rel="stylesheet" href="dogprofilestyling.css" />
<style>
    p
    {
        color: black;
    }
    i
    {
        color : #0083b4;
        margin-right: 3px;
    }
</style>
<title>Dog Matrimony</title>
  </head>
  <body>

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
    <a href="http://websh.offyoucode.co.uk/dog%20matrimony/affiliateloggedin.php"><i style = 'color : #818181;' class="fa fa-home"></i>&nbsp;Home</a>
    <a href="http://websh.offyoucode.co.uk/dog%20matrimony/showaffiliatedogs.php"><i style = 'color :#818181;' class="fas fa-dog"></i>&nbsp;My Dogs</a>
    <a href="http://websh.offyoucode.co.uk/dog%20matrimony/affiliationconfirmedmatches.php"><i style = 'color : #818181;' class="fas fa-check"></i>&nbsp;Matches</a>
    <a href="http://websh.offyoucode.co.uk/dog%20matrimony/affiliatemeetings.php"><i style = 'color : #818181;' class="fas fa-calendar-week"></i>&nbsp;Appointments</a>
  </div>

</div>

<!-- view dog modal -->

<div id = "error" style = "margin-top : 30px; margin-bottom: 30px;"></div>
<div id = "mydogs" style = "margin-top : 20px; margin-bottom: 20px;">
</div>


<!-- profile of confirmed matches -->

<!-- spinner -->
<div id = 'spinner'>
            <img src = 'ajax-loader.gif' width = '64' height = '64'/>
            <br>
            Loading...
</div>

       
      <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
      <br>

                  <div class="footer">
                      <p style = "color: grey";>&copy All rights reserved by Sankalp</p>
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

$(function(){  
  $("#spinner").show();
            $("#mydogs").hide();
          $.ajax({ 
        url: "showaffiliatedogscode.php",
        type: "POST",
        success: function(data){
                    if(data)
                        {
                          $("#spinner").hide();
                             $("#mydogs").html(data);
                             $("#mydogs").slideDown();
                        }
        },
        error: function(){
          $("#spinner").hide();
            $("#error").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
            $("#error").slideDown();
        }
    });
     }); 
</script>