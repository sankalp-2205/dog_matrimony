<?php
session_start();
include 'connection.php';
if(!array_key_exists("username",$_SESSION))
{
    header("location:index.php");
}
echo $_SESSION['username'];

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
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="mystyling.css" />
<style>
 @import url(https://fonts.googleapis.com/css?family=Racing+Sans+One);

body {
    background: #EEE;
}
    
.bg_load {
    position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	background: #EEE;
}

.wrapper {
    /* Size and position */
	font-size: 25px; /* 1em */
    width: 8em;
	height: 8em;
    position: fixed;
    left: 50%;
    top: 50%;
    margin-top: -100px;
    margin-left: -100px;

    /* Styles */
	border-radius: 50%;
    background: rgba(255,255,255,0.1);
    border: 1em dashed rgba(138,189,195,0.5);
    box-shadow: 
        inset 0 0 2em rgba(255,255,255,0.3),
        0 0 0 0.7em rgba(255,255,255,0.3);
    animation: rota 3.5s linear infinite;

    /* Font styles */
    font-family: 'Racing Sans One', sans-serif;
    
    color: #444;
    text-align: center;
    text-transform: uppercase;
    text-shadow: 0 .04em rgba(255,255,255,0.9);
    line-height: 6em;
}

.wrapper:before,
.wrapper:after {
    content: "";
    position: absolute;
    z-index: -1;
    border-radius: inherit;
    box-shadow: inset 0 0 2em rgba(255,255,255,0.3);
    border: 1em dashed;
}

.wrapper:before {
    border-color: rgba(138,189,195,0.2);
	top: 0; right: 0; bottom: 0; left: 0;
}

.wrapper:after {
	border-color: rgba(138,189,195,0.4);
    top: 1em; right: 1em; bottom: 1em; left: 1em; 
}

.wrapper .inner {
    width: 100%;
    height: 100%;
    animation: rota 3.5s linear reverse infinite;
}

.wrapper span {
    display: inline-block;
    animation: placeholder 1.5s ease-out infinite;
}

.wrapper span:nth-child(1)  { animation-name: loading-1;  }
.wrapper span:nth-child(2)  { animation-name: loading-2;  }
.wrapper span:nth-child(3)  { animation-name: loading-3;  }
.wrapper span:nth-child(4)  { animation-name: loading-4;  }
.wrapper span:nth-child(5)  { animation-name: loading-5;  }
.wrapper span:nth-child(6)  { animation-name: loading-6;  }
.wrapper span:nth-child(7)  { animation-name: loading-7;  }

@keyframes rota {
    to { transform: rotate(360deg); }
}

@keyframes loading-1 {
    14.28% { opacity: 0.3; }
}

@keyframes loading-2 {
    28.57% { opacity: 0.3; }
}

@keyframes loading-3 {
    42.86% { opacity: 0.3; }
}

@keyframes loading-4 {
    57.14% { opacity: 0.3; }
}

@keyframes loading-5 {
    71.43% { opacity: 0.3; }
}

@keyframes loading-6 {
    85.71% { opacity: 0.3; }
}

@keyframes loading-7 {
    100% { opacity: 0.3; }
}
</style>
<title>Dog Matrimony</title>
  </head>
  <body>
  <div class="bg_load"></div>
<div class="wrapper">
    <div class="inner">
        <span>H</span>
        <span>O</span>
        <span>L</span>
        <span>D</span>
        <span></span>
        <span>O</span>
        <span>N</span>
    </div>
</div>
     
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/j
query.min.js"></script>
<script src="js/bootstrap.min.js"></script>
      
    <script>

        
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
var sentfrom = GetURLParameter('sentfrom');
var sentto= GetURLParameter('sentto');
var datatopost = {};
function getindex(data)
{
    var arr = data.split('[');
    arr = arr[1].split(']');
    return arr[0]; 
}
sentfrom = getindex(sentfrom);
sentto = getindex(sentto);
       $(function(){  
           datatopost = {"sentfrom":sentfrom,
                        "sentto":sentto};
          $.ajax({
        url: "sentrequestcode.php",
        type: "POST",
        data: datatopost,
        success: function(data){
                    if(data)
                        {
                            $("#sentrequest").html(data);
                            window.location.href="http://websh.offyoucode.co.uk/dog%20matrimony/requestsentwebpage.php";
                        }
        },
        error: function(){
            $("#sentrequest").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
   });
    });
  
      
      
</script>

</body>
</html>