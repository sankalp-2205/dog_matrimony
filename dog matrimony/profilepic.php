<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
$name = $_FILES["picture"]["name"];
$fileError = $_FILES["picture"]["error"];
$extention = pathinfo($name,PATHINFO_EXTENTION);
$tmp_name = $_FILES["picture"]["tmp_name"];
$permanentDestination = 'profilepicture/'.md5(time()). ".$extention";
if(move_uploaded_file($tmp_name , $permanentDestination))
{
$sql = "UPDATE users SET profilepicture = '$permanentDestination' WHERE username = '$username'";
if(!$result = $link ->query($sql))
{
    echo "<div class = 'alert alert-warning'>Unable to update profile picture.</div>";
    exit; 
}
}
else
{
    echo "<div class = 'alert alert-warning'>Not you fault.Error on our side.We will fix it asap.</div>";
    exit; 
}
if($fileError > 0){
    echo "<div class = 'alert alert-warning'>Not you fault.Error on our side2.We will fix it asap.</div>";
    exit; 
}
?>