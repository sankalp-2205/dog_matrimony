<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
$sql = "SELECT * FROM request_log ORDER BY requests_log_timing" ;
$count1 = 0;
$count2 = 0;
$recordarray = array();
$finalmessage = "";
$temp = "";
if($result = $link ->query($sql))
        {
             while($rows = $result->fetch_array(MYSQLI_ASSOC))
             {  
                $request_id = $rows['request_id'];
                $sentfrom = $rows['requests_log_sentfrom']; 
                $sentto = $rows['requests_log_sentto'];
                $status = $rows['requests_log_status'];
                $appointment_sender = $rows['requests_log_appointment_sender'];
                $appointment_receiver = $rows['requests_log_appointment_receiver'];
                $organisation_handling = $rows['requests_log_organisation_handling'];
                $time = $rows['requests_log_timing'];
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

             if($status == 'pending')
             {
                 $message = "$ownernamef($dognamef) sent a request to $ownernamet($dognamet) handled by $organisation_handling";
             }
             if($status == 'cancelled')
             {
                 $message = "$ownernamef($dognamef) cancelled the request for $ownernamet($dognamet) handled by $organisation_handling";
             }
             if($status == 'declined')
             {
                 $message = "$ownernamet($dognamet) declined the request of $ownernamef($dognamef) handled by $organisation_handling";
             }
             if($status == 'confirmed')
             {
                 if($appointment_receiver == 'pending' && $appointment_sender == 'pending')
                 {
                    $message = "$ownernamet($dognamet) accepted the request of $ownernamef($dognamef) handled by $organisation_handling";
                }
                else if($appointment_receiver == 'booked' && $appointment_sender == 'pending')
                    {
                        $message = "$ownernamet($dognamet) has proceeded to book an appointment for $ownernamef($dognamef) handled by $organisation_handling";
                        $recordarray["$request_id"."r"] = "receiverbooked";
                    }
                else if($appointment_sender == 'booked' && $appointment_receiver == 'pending')
                {
                        $message = "$ownernamef($dognamef) has proceeded to book an appointment for $ownernamet($dognamet) handled by $organisation_handling";
                        $recordarray["$request_id"."s"] = "senderbooked";
                }
                else if($appointment_sender == 'booked' && $appointment_receiver == 'booked')
                {
                    $senderproceeded = 0;
                    $receiverproceeded = 0;
                    foreach ($recordarray as $key=>$value){ 
                        if($key == $request_id."r" && $value == "receiverbooked")
                    {
                        $receiverproceeded++;
                    }
                    if($key == $request_id."s" && $value == "senderbooked")
                    {
                        $senderproceeded++;
                    }
                }
                    if($senderproceeded == 0 && $receiverproceeded == 1)
                    {
                        $message = "$ownernamef($dognamef) has proceeded to book an appointment for $ownernamet($dognamet) handled by $organisation_handling";
                        $recordarray["$request_id"."s"] = "senderbooked";
                    }
                    elseif($senderproceeded == 1 && $receiverproceeded == 0)
                    {
                        $message = "$ownernamet($dognamet) has proceeded to book an appointment for $ownernamef($dognamef) handled by $organisation_handling";
                        $recordarray["$request_id"."r"] = "receiverbooked";
                    }
                    else
                    {
                        $message = "";
                    }        
            }
        }
$temp = $finalmessage;
if($message == "")
{
    $finalmessage = "";
}
else
{
    $finalmessage = "<div style = 'color: red;' class='small'>$time</div>
                    <span style = 'color : black;' class='font-weight-bold'>$message<span>
                    <hr>";
}
    $finalmessage.= $temp;
        }
    }
echo $finalmessage;                   
?>