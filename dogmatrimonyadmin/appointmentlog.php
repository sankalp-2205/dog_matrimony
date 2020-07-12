<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
$sql = "SELECT * FROM appointment_log ORDER BY appointment_log_timing DESC" ;
$count1 = 0;
$count2 = 0;
if($result = $link ->query($sql))
        {
             while($rows = $result->fetch_array(MYSQLI_ASSOC))
             {  
                $sentfrom = $rows['appointment_log_sentfrom']; 
                $sentto = $rows['appointment_log_sentto'];
                $organisation = $rows['appointment_log_organisation'];
                $date = $rows['appointment_log_date'];
                $timeofappointment = $rows['appointment_log_time'];
                $viewed= $rows['appointment_log_contact_viewed'];
                $report_generated = $rows['appointment_log_report_generated'];
                $booking_clicking_time = $rows['appointment_log_booking_clicking_time'];
                $first_booking_time = $rows['appointment_log_first_booking_time'];
                $time = $rows['appointment_log_timing'];
                $time = strtotime("$time");
                $timeinindia = $time + 34200;
                $time = date('d-m-Y H:i:s', $timeinindia);
                $sql2 = "SELECT * FROM users NATURAL JOIN dogs WHERE dogid = '$sentfrom'";
                if($result2 = $link ->query($sql2))
                {
                    while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                    {
                        $dognamef = $rows2['dogname'];
                        $ownernamef = $rows2['name'];
                    }
                }
                $sql3 = "SELECT * FROM users NATURAL JOIN dogs WHERE dogid = '$sentto'";
                if($result3 = $link ->query($sql3))
                {
                    while($rows3 = $result3->fetch_array(MYSQLI_ASSOC))
                    {
                        $dognamet = $rows3['dogname'];
                        $ownernamet = $rows3['name'];
                    }
                }

             if($viewed == true && $first_booking_time == "NULL")
             {
                    $message = "$organisation has viewed contact details of $ownernamef($dognamef) and $ownernamet($dognamet)";
                    $count1++;            
             }
             if($date !== "NULL" && $booking_clicking_time == $first_booking_time && $report_generated == false)
             {
                $message = "$organisation has scheduled an appointment for $ownernamef($dognamef) and $ownernamet($dognamet) on $date between $timeofappointment";
             }
             if($date !== "NULL" && $booking_clicking_time !== $first_booking_time && $report_generated == false)
             {
                $message = "$organisation has rescheduled an appointment for $ownernamef($dognamef) and $ownernamet($dognamet) on $date between $timeofappointment";
             }
             if($report_generated == true)
             {
                 $message = "$organisation has generated a report for an appointment between $ownernamef($dognamef) and $ownernamet($dognamet) dated $date";
             }
echo "
<div style = 'color: red;' class='small'>$time</div>
                    <span style = 'color : black;'class='font-weight-bold'>$message<span>
                    <hr>";
        }
    }

                    
?>