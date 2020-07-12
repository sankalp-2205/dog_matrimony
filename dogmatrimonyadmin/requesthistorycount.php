<?php
session_start();
include 'connection.php';
$sql = "SELECT COUNT(*) FROM requests";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $requests = $rows['COUNT(*)'];
    }
    echo $requests;
}
?>