<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
// echo "failure";
$dogid = $_POST['id'];
$sql = "SELECT * FROM requests WHERE fromdogid = '$dogid' OR todogid = '$dogid'";
if($result = $link ->query($sql))
        {
             while($rows = $result->fetch_array(MYSQLI_ASSOC))
             {  
                $status = $rows['status'];
                $appointment_sender = $rows['appointment_sender'];
                $appointment_receiver = $rows['appointment_receiver'];
                if($status == 'pending')
                {
                    echo 'pendingrequest';
                    exit;
                }
                if($status == 'confirmed')
                {
                    if($appointment_receiver == 'booked' && $appointment_sender == 'booked')
                    {
                        $sql2 = "SELECT * FROM appointments WHERE sentfrom = '$dogid' OR sentto = '$dogid'";
                        if($result2 = $link ->query($sql2))
                        {
                            while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                            { 
                                $report = $rows2['report_generated'];
                                if($report == false)
                                {
                                    echo "activeappointment";
                                    exit;
                                }
                            }     
                        }
                    }  
                    else
                    {
                        echo "requestinprogress";
                        exit;
                    }
                }
            }
        }
        $sql = "UPDATE dogs SET deleted = true WHERE dogid = '$dogid'";
        if($result = $link ->query($sql))
        {
            echo "success";
        }
        else
        {
            echo "Unable to delete dog. Plz try again later";
        }
?>