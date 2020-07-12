<?php
session_start();
include 'connection.php';
$viewed = 0;
$sql = "SELECT * FROM requests WHERE status = 'confirmed' AND appointment_sender = 'booked' AND appointment_receiver = 'booked'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $sentfrom = $rows['fromdogid'];
        $sentto = $rows['todogid'];
        $timeofbothbooking = $rows['time'];
        $sql2 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND appointment_date = 'NULL'";
        if($result2 = $link ->query($sql2))
        {
            while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
            {
                $viewed++;
            }
        } 
    }
}
    echo $viewed;
?>