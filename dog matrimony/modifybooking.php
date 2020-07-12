<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$sentfrom =  $_POST['sentfrom'];
$sentto =  $_POST['sentto'];
$username = $_SESSION['username'];
$date = $_POST['date'];
$time =  $_POST['time'];
if(empty($_POST['date']))
{
    echo "nodate";
    exit;
}
if(empty($_POST['time']))
{
    echo "notime";
    exit;
}
function Date_validate($date, $format = 'd-m-Y')
{
    $date_obj = DateTime::createFromFormat($format, $date);
    if($date_obj && $date_obj->format($format) == $date)
    {
        return true;
    }
    else
    {
        return false;
    }
}
$validity = Date_validate($date);
if($validity == false)
{
    echo "invalid";
    exit;
}
if($validity == true)
{
    $t1 = time()-86400;
    $t2 = strtotime($date);
    if($t2<$t1)
    {
        echo "previous";
        exit;
    }
}
$sql = "UPDATE appointments SET appointment_date ='$date',appointment_time = '$time' WHERE sentfrom = '$sentfrom' AND sentto = '$sentto'";
if($result = $link ->query($sql))
        {
            echo "success";
        }
else
{
    echo "Cannot update in appointments table";
}
?>