<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
$sentfrom =  $_POST['sentfrom'];
$sentto =  $_POST['sentto'];
$sql = "SELECT * FROM dogs WHERE dogid = '$sentfrom' AND deleted = true ";
if($result = $link ->query($sql))
{
    if($result->num_rows == 1)
    {
        echo "doesnotexist";
        exit;
    }
}
$sql = "SELECT * FROM dogs WHERE dogid = '$sentto' AND deleted = true ";
if($result = $link ->query($sql))
{
    if($result->num_rows == 1)
    {
        echo "doesnotexist";
        exit;
    }
}
echo "success";
?>