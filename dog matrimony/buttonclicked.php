<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
$_SESSION['notificationclicked'] = true;
$sql = "UPDATE users SET notification_clicked = true WHERE username = '$username'";
if(!($result = $link ->query($sql)))
{
    echo "Cannot run query for notification clicked ";
}
?>