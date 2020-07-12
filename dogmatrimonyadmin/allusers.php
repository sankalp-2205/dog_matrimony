<?php
session_start();
include 'connection.php';
$sql = "SELECT COUNT(*) FROM users";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $users = $rows['COUNT(*)'];
    }
    echo $users;
}
?>