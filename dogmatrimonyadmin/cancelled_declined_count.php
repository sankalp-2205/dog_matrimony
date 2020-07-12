<?php
session_start();
include 'connection.php';
$sql = "SELECT COUNT(*) FROM request_log WHERE requests_log_status = 'cancelled' OR requests_log_status = 'declined'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $count = $rows['COUNT(*)'];
    }
    echo $count;
}
?>