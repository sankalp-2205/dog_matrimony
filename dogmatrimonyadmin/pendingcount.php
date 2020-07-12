<?php
session_start();
include 'connection.php';
$sql = "SELECT COUNT(*) FROM requests WHERE status = 'pending'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $count = $rows['COUNT(*)'];
    }
    echo $count;
}
?>