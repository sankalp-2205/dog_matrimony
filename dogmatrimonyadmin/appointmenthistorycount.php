<?php
session_start();
include 'connection.php';
$sql = "SELECT COUNT(*) FROM appointments WHERE appointment_date <> 'NULL'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $appointments = $rows['COUNT(*)'];
    }
    echo $appointments;
}
?>