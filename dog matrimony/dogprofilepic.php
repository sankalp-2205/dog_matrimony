<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
$buttonname =  $_GET['buttonname'];
$dogid = (explode("[",$buttonname));
$dogid = (explode("]",$dogid[1]));
$dogid = $dogid[0];
$name = $_FILES["dogpicture"]["name"][$dogid];
$fileError = $_FILES["dogpicture"]["error"][$dogid];
$extention = pathinfo($name,PATHINFO_EXTENTION);
$tmp_name = $_FILES["dogpicture"]["tmp_name"][$dogid];
print_r($tmp_name);
$permanentDestination = 'profilepicture/'.md5(time()). ".$extention";
if(move_uploaded_file($tmp_name , $permanentDestination))
{
$sql = "UPDATE dogs SET dogprofilepicture = '$permanentDestination' WHERE username = '$username' AND dogid = '$dogid'";
if(!$result = $link ->query($sql))
{
    echo "<div class = 'alert alert-warning'>Unable to update dog profile picture.</div>";
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