<?php
session_start();
include 'connection.php';
$count = 0;
$sql = "SELECT * FROM requests WHERE status = 'confirmed' AND appointment_sender = 'booked' AND appointment_receiver = 'booked'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $sentfrom = $rows['fromdogid'];
        $sentto = $rows['todogid'];
        $sql2 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND report_generated = true";
        if($result2 = $link ->query($sql2))
        {
            if($result2->num_rows == 0)
            {
                $count++;
            }
        }
    }
    echo $count;
}
?>