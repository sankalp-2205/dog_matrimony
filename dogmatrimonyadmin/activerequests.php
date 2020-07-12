<?php
session_start();
include 'connection.php';
$count = 0;
$sql = "SELECT * FROM requests WHERE status <> 'cancelled' AND status <> 'declined'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $count++;
        $sentfrom = $rows['fromdogid'];
        $sentto = $rows['todogid'];
        $status = $rows['status'];
        $appoitment_sender = $rows['appointment_sender'];
        $appoitment_receiver = $rows['appointment_receiver'];
    if($status == 'confirmed' && $appoitment_receiver == 'booked' && $appoitment_sender == 'booked')
    {
        $sql2 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND report_generated = true";
        {
            if($result2 = $link ->query($sql2))
            {
                if($result2->num_rows == 1)
                {
                    $count--;
                }
            }

        }
    }
    }
    echo $count;
}
?>