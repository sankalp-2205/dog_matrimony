<?php
session_start();
include ('connection.php');
$sql = "SELECT * FROM request_log ORDER BY requests_log_timing DESC";
$username = $_SESSION['username'];
$file = "$username.txt";
$count = 0;
$recordarray = array();
$notification = "";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {  
        $requestid = $rows['request_id'];
        $sentfrom = $rows['requests_log_sentfrom']; 
        $sentto = $rows['requests_log_sentto'];
        $status = $rows['requests_log_status'];
        $appointment_sender = $rows['requests_log_appointment_sender'];
        $appointment_receiver = $rows['requests_log_appointment_receiver'];
        $time = $rows['requests_log_timing'];
        $time = strtotime("$time");
        $timeinindia = $time + (34200);
        $time = date('m/d/Y H:i:s', $timeinindia);
        $sql4 = "SELECT * FROM dogs WHERE dogid = '$sentfrom'";
        if($result4 = $link ->query($sql4))
        {
            while($rows4 = $result4->fetch_array(MYSQLI_ASSOC))
            {
                $dognamefrom = $rows4['dogname'];
            }   
        }
        else
        {
            echo "<div class = 'alert alert-warning'>Cannot fetch name of the dog sent from</div>";   
            exit;
        }
        $sql4 = "SELECT * FROM dogs WHERE dogid = '$sentto'";
        if($result4 = $link ->query($sql4))
        {
            while($rows4 = $result4->fetch_array(MYSQLI_ASSOC))
            {
                $dognameto = $rows4['dogname'];
            }   
        }
        else
        {
            echo "<div class = 'alert alert-warning'>Cannot fetch name of the dog sent to</div>";   
            exit;
        }
        $sql2 = "SELECT * FROM dogs WHERE dogid = '$sentfrom' AND username ='$username'"; 
        if($result2 = $link ->query($sql2))
        { 
            if($result2->num_rows == 1)
            {
                // request sent by the logged in user
                if($status == 'confirmed') 
                {
                    if($appointment_sender == 'pending' && $appointment_receiver == 'pending')
                    {
                        $count++;
                        $notification .= "<a href = 'http://websh.offyoucode.co.uk/dog%20matrimony/confirmedmatches.php' style = 'background-color : transparent;'><li style = 'color :#B97745;'>
                        <div class='col-md-3 col-sm-3 col-xs-3'><div class='notify-img'><img id = 'notify' src='dogicon.jpg' alt=''></div></div>
                        <div class='col-md-9 col-sm-9 col-xs-9 pd-l0'>The owner of $dognameto has accepted your request for $dognamefrom
                        <p class='time'>$time</p>
                        </div>
                        </li></a>";
                    }
                    if($appointment_sender == 'pending' && $appointment_receiver == 'booked')
                    {
                        $count++;
                        $notification .= "<a href = 'http://websh.offyoucode.co.uk/dog%20matrimony/confirmedmatches.php' style = 'background-color : transparent;'><li style = 'color : #B97745;'>
                        <div class='col-md-3 col-sm-3 col-xs-3'><div class='notify-img'><img id = 'notify' src='dogicon.jpg' alt=''></div></div>
                        <div class='col-md-9 col-sm-9 col-xs-9 pd-l0'>The owner of $dognameto has proceeded to book an appointment for $dognamefrom (Request ID : $requestid)
                        <p class='time'>$time</p>
                        </div>
                        </li></a>";
                        $recordarray["$request_id"."r"] = "receiverbooked";
                    }
                    if($appointment_sender == 'booked' && $appointment_receiver == 'booked')
                    {
                        $senderproceeded = 0;
                        $receiverproceeded = 0;
                        foreach ($recordarray as $key=>$value){ 
                            if($key == $request_id."r" && $value == "receiverbooked")
                        {
                            $receiverproceeded++;
                        }
                    }
                        if($receiverproceeded == 0)
                        {
                            $count++;
                            $notification .= "<a href = 'http://websh.offyoucode.co.uk/dog%20matrimony/confirmedmatches.php' style = 'background-color : transparent;'><li style = 'color : #B97745;'>
                                <div class='col-md-3 col-sm-3 col-xs-3'><div class='notify-img'><img id = 'notify' src='dogicon.jpg' alt=''></div></div>
                                <div class='col-md-9 col-sm-9 col-xs-9 pd-l0'>The owner of $dognameto has proceeded to book an appointment for $dognamefrom (Request ID : $requestid)
                                <p class='time'>$time</p>
                                </div>
                                </li></a>";
                            $recordarray["$request_id"."r"] = "receiverbooked";
                        }
                        else
                        {
                            $message = "";
                        }        
                    }
                }
                if($status == 'declined')
                {
                    $count++;
                    $notification .= "<a href = 'http://websh.offyoucode.co.uk/dog%20matrimony/requestsentwebpage.php' style = 'background-color : transparent;'><li style = 'color : #B97745;'>
                    <div class='col-md-3 col-sm-3 col-xs-3'><div class='notify-img'><img id = 'notify' src='dogicon.jpg' alt=''></div></div>
                    <div class='col-md-9 col-sm-9 col-xs-9 pd-l0'>The owner of $dognameto has declined your request for $dognamefrom
                    <p class='time'>$time</p>
                    </div>
                    </li></a>";
                } 
            }
            else
            {
                $sql3 = "SELECT * FROM dogs WHERE dogid = '$sentto' AND username ='$username'"; 
                if($result3 = $link ->query($sql3))
                { 
                    // request sent by others 
                    if($result3->num_rows == 1)
                    {
                            if($status == 'confirmed') 
                            {
                                if($appointment_sender == 'booked' && $appointment_receiver == 'pending')
                                {
                                    $count++;
                                    $notification .= "<a href = 'http://websh.offyoucode.co.uk/dog%20matrimony/confirmedmatches.php' style = 'background-color : transparent;'><li style = 'color :#B97745;'>
                                    <div class='col-md-3 col-sm-3 col-xs-3'><div class='notify-img'><img id = 'notify' src='dogicon.jpg' alt=''></div></div>
                                    <div class='col-md-9 col-sm-9 col-xs-9 pd-l0'>The owner of $dognamefrom has proceeded to book an appointment for $dognameto (Request ID : $requestid)
                                    <p class='time'>$time</p>
                                    </div>
                                    </li></a>";
                                    $recordarray["$request_id"."s"] = "senderbooked";
                                }
                                if($appointment_sender == 'booked' && $appointment_receiver == 'booked')
                                {
                                    $senderproceeded = 0;
                                    $receiverproceeded = 0;
                                    foreach ($recordarray as $key=>$value){ 
                                        if($key == $request_id."s" && $value == "senderbooked")
                                    {
                                        $senderproceeded++;
                                    }
                                }
                                    if($senderproceeded == 0)
                                    {
                                        $count++;
                                        $notification .= "<a href = 'http://websh.offyoucode.co.uk/dog%20matrimony/confirmedmatches.php' style = 'background-color : transparent;'><li style = 'color : #B97745;'>
                                            <div class='col-md-3 col-sm-3 col-xs-3'><div class='notify-img'><img id = 'notify' src='dogicon.jpg' alt=''></div></div>
                                            <div class='col-md-9 col-sm-9 col-xs-9 pd-l0'>The owner of $dognamefrom has proceeded to book an appointment for $dognameto (Request ID : $requestid)
                                            <p class='time'>$time</p>
                                            </div>
                                            </li></a>";
                                        $recordarray["$request_id"."s"] = "senderbooked";
                                    }
                                    else
                                    {
                                        $message = "";
                                    }        
                                }
                            }
                            if($status == 'pending')
                            {
                                $count++;
                                $notification .= "<a href = 'http://websh.offyoucode.co.uk/dog%20matrimony/receivedrequest.php' style = 'background-color : transparent;'><li style = 'color :#B97745;'>
                                <div class='col-md-3 col-sm-3 col-xs-3'><div class='notify-img'><img id = 'notify' src='dogicon.jpg' alt=''></div></div>
                                <div class='col-md-9 col-sm-9 col-xs-9 pd-l0'> You have a new request for $dognameto
                                <p class='time'>$time</p>
                                </div>
                                </li></a>";
                            } 
                            if($status == 'cancelled')
                            {
                                $count++;
                                $notification .= "<a href = 'http://websh.offyoucode.co.uk/dog%20matrimony/receivedrequest.php' style = 'background-color : transparent;'><li style = 'color :#B97745;'>
                                <div class='col-md-3 col-sm-3 col-xs-3'><div class='notify-img'><img id = 'notify' src='dogicon.jpg' alt=''></div></div>
                                <div class='col-md-9 col-sm-9 col-xs-9 pd-l0'>The owner of $dognamefrom has cancelled his request for $dognameto
                                <p class='time'>$time</p>
                                </div>
                                </li></a>";
                            } 
                        }
                    }
                        else
                        {
                            echo "<div class = 'alert alert-warning'>Cannot fetch dogs when you are the receiver</div>";   
                            exit;
                        }      
                    }
                }
                else
                {
                    echo "<div class = 'alert alert-warning'>Cannot fetch dogs when you are the sender</div>";   
                    exit;
                }
            }
        }
        else
        {
            echo "<div class = 'alert alert-warning'>Cannot fetch from request log</div>";   
            exit;
        }
        echo $notification;
        if($notification !== file_get_contents("./$username.txt"))
{
    file_put_contents("./$username.txt", $notification);
    $_SESSION['notificationclicked'] = false;
    echo $_SESSION['notificationclicked'];
    $sql = "UPDATE users SET notification_clicked = false WHERE username = '$username'";
    if(!($result = $link ->query($sql)))
    {
        echo "Cannot run query for notification clicked ";
        exit;
    }
        echo "
        <script>
        $(function(){
        $('#numberofnotifications').css('background-color','#B97745');
                    $('#bell').show();
                    $('#audio').trigger('play');         
        })
        </script>";
}
elseif($_SESSION['notificationclicked'] == false)
{
    echo "<script>$('#numberofnotifications').css('background-color','#B97745');
    $('#bell').show();</script>";
}
 
?>