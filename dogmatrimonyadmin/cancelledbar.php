<?php
session_start();
include 'connection.php';
$sql = "SELECT COUNT(*) FROM requests";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $total = $rows['COUNT(*)'];
    }
}
$sql = "SELECT COUNT(*) FROM requests WHERE status = 'cancelled'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $cancelled = $rows['COUNT(*)'];
    }
}
$cancelledpercent = ($cancelled/$total)*100;
$cancelledpercent = floor($cancelledpercent);
$cancelledpercent .= "%";
echo $cancelledpercent;
?>