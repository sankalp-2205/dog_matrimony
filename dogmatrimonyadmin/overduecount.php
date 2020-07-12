<?php
session_start();
include 'connection.php';
$currenttime = time();
$overdue = 0;
$sql = "SELECT * FROM requests WHERE status = 'confirmed' AND appointment_sender = 'booked' AND appointment_receiver = 'booked'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $sentfrom = $rows['fromdogid'];
        $sentto = $rows['todogid'];
        $timeofbothbooking = $rows['time'];
        $sql2 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND report_generated = false";
        if($result2 = $link ->query($sql2))
        {
            if($result2->num_rows == 1)
            {
                while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                {
                    $appointment_date = $rows2['appointment_date'];
                }
                if($appointment_date == "NULL")
                {
                    $time = strtotime("$timeofbothbooking");
                    $deadline = $time + (86400);
                    if($currenttime > $deadline)
                    {
                        $overdue++;
                    }
                }
            }
        }
            else {
                $sql2 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND report_generated = true";
                if($result2 = $link ->query($sql2))
                {
                    if($result2->num_rows == 0)
                    {
                            $time = strtotime("$timeofbothbooking");
                            $deadline = $time + (86400);
                            if($currenttime > $deadline)
                            {
                                $overdue++;
                            }
                    }
                }
            }

        }
    }
    echo $overdue;
?>