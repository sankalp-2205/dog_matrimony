<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['adminusername'];
$reportscard = "";
$sql2 = "SELECT * FROM appointments WHERE report_generated = true";
if($result2 = $link ->query($sql2))
{
        while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                {
                    $id = $rows2['appointment_id'];
                    $sentfrom = $rows2['sentfrom'];
                    $sentto = $rows2['sentto'];
                    $time = $rows2['booking_clicking_time'];
                    $time = strtotime("$time");
                    $timeinindia = $time + (34200);
                    $timeofgeneration = date('d-m-Y H:i:s', $timeinindia);
                    $organisation = $rows2['organisation_name'];
                    $reportscard.= "<div class='card text-center'>
                    <a><h5><span style = 'color: black;'>($timeofgeneration)</span>
                    $organisation (Appointment ID : $id)
                    </h5></a>
                    </div> ";            
            }
}
echo "<div class='container-fluid'>
  $reportscard
        </div>";
?>

