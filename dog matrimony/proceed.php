<?php
session_start();
if(!array_key_exists("username",$_SESSION))
{
    header("location:http://websh.offyoucode.co.uk/alternate/index.php");
}
echo $_SESSION['username'];
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
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/cupertino/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script> 
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
<link rel="stylesheet" href="mystyling2.css" />
<style>
 .container
    {
        margin-bottom: 40px;
        margin-top:10px;
    }
    .fb-profile img.fb-image-lg{
    z-index: 0;
    width: 100%;  
    margin-bottom: 10px;
}
.fb-image-profile
{
    margin: -90px 10px 80px 50px;
    z-index: 9;
    width: 20%; 
}
@media (max-width:768px)
{
    
.fb-profile-text>h1{
    font-weight: 700;
    font-size:16px;
}

.fb-image-profile
{
    margin: -45px 10px 10px 25px;
    z-index: 9;
    width: 20%; 
}
}
@media (min-width:1120px)
{
  #dpbox
{
    margin: -250px 10px 10px 25px;
    max-height: 330px;
    overflow: hidden;
    float :left;
    width: 20%;
    z-index: 9;
} 
    .fb-image-profile
{
    margin: 0px 10px 80px 50px;
    z-index: 9;
    width: 100%; 
}
}
.border{
  
  margin-bottom:10px;
}



.user-profil-part{
  padding-bottom:30px;
  background-color:#FAFAFA;
}

.user-detail-row{
  margin:0px; 
}
.user-detail-section2 p{
  font-size:12px;
  padding: 0px;
  margin: 0px;
}
.user-detail-section2{
  margin-top:10px;
}
.user-detail-section2 span{
  color:#7CBBC3;
  font-size: 20px;
}
.user-detail-section2 small{
  font-size:12px;
  color:#D3A86A;
}


.profile-header-section1 h1{
  font-size: 25px;
  margin: 0px;
}
.profile-header-section1 h5{
  color: #0062cc;
}
.req-btn{
  height:30px;
  font-size:12px;
}

.profile-tag p{
  font-size: 12px;
  color:black;
}
.profile-tag i{
  color:#ADADAD;
  font-size: 20px;
}
body
{
    background-color: white;
}

.nav-link{
  font-size: 1.2em;    
}
p
{
    font-size : medium;
    font-family : 'Poppins', sans-serif;
    color: black;
}
h2
{
    color: black;
}
body
{
  overflow-x: hidden;
}

.second-box{padding:10px; background:#fafafa;}

</style>
<title>Dog Matrimony</title>
  </head>
  <body>
      <!-- navbar -->
    <nav class="navbar navbar-custom navbar-fixed-top">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class = "navbar-brand" href="#">Dog Matrimony</a>
    <button type = "button" class = "navbar-toggle" data-target = "#navbarcollapse " data-toggle="collapse">
        <span class = "sr-only">Toggle navigation</span>
        <span class = "icon-bar"></span>
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
<!--      -->
      <div id = "processrequests" style = "margin-top: -10px;"></div>
      <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
                  <div class="footer">
                      <p>&copy All rights reserved by Sankalp</p>
            </div> 

            <div id = 'spinner'>
            <img src = 'ajax-loader.gif' height = '64' width = '64' />
            <br>
            Loading...
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
       $(function(){  
         $("#processrequests").fadeOut();
         $("#spinner").show();
           datatopost = {"sentfrom":sentfrom,
                        "sentto":sentto};
          $.ajax({
        url: "proceedcode.php",
        type: "POST",
        data: datatopost,
        success: function(data){
                      if(data)
                        {
                          $("#spinner").hide();
                            $("#processrequests").html(data);
                            $("#processrequests").fadeIn();
                        }
        },
        error: function(){
          $("#spinner").hide();
            $("#processrequests").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
            $("#processrequests").fadeIn();
        }
   });
    });    
</script>
    
</body>
</html>