<?php
session_start();
include 'connection.php';
$sql = "SELECT COUNT(*) FROM affiliates";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $affiliates = $rows['COUNT(*)'];
    }
    echo $affiliates;
}
?>