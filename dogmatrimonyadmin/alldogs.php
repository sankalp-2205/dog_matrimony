<?php
session_start();
include 'connection.php';
$sql = "SELECT COUNT(*) FROM dogs WHERE deleted = false";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $dogs = $rows['COUNT(*)'];
    }
    echo $dogs;
}
?>