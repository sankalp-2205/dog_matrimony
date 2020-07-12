<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['adminusername'];
$historycard = "";
$active = 0;
$sql = "SELECT * FROM requests";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $history = "";
        $count1 = 0;
        $count2 = 0;
        $requestid = $rows['id'];
        $sentfrom = $rows['fromdogid'];
        $sentto = $rows['todogid'];
        $appointment_sender = $rows['appointment_sender'];
        $appointment_receiver = $rows['appointment_receiver'];
        $organisation = $rows['organisation_handling'];
        $sql2 = "SELECT * FROM request_log WHERE requests_log_sentfrom = '$sentfrom' AND requests_log_sentto = '$sentto'AND request_id = '$requestid'";
        if($result2 = $link ->query($sql2))
        {
                        while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                        {
                            $status = $rows2['requests_log_status'];
                            $appointment_sender = $rows2['requests_log_appointment_sender'];
                            $appointment_receiver = $rows2['requests_log_appointment_receiver'];
                            $organisation = $rows2['requests_log_organisation_handling'];
                            $time = $rows2['requests_log_timing'];
                            $time = strtotime("$time");
                            $timeinindia = $time + 34200;
                            $time = date('d-m-Y H:i:s', $timeinindia);
                $sql5 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentfrom'";
                if($result5 = $link ->query($sql5))
                {
                    while($rows5 = $result5->fetch_array(MYSQLI_ASSOC))
                    {
                        $dognamem = $rows5['dogname'];
                        $senderdog = $dognamem;
                        $dogagem = $rows5['dogage'];
                        $dogbreedm = $rows5['dogbreed'];
                        $dogweightm = $rows5['dogweight'];
                        $doggenderm = $rows5['doggender'];
                        $certificationm = $rows5['certification'];
                        $descriptionm = $rows5['description'];
                        $organisation_namem = $rows5['organisation_name'];
                        if($organisation_namem == "None Of These")
                        {
                            $organisation_namem = "No Organisation";
                        }
                        $namem = $rows5['name'];
                        $contactm = $rows5['contact'];
                        $emailm = $rows5['email'];
                        $localitym = $rows5['locality'];
                        $citym = $rows5['city'];
                        $statem = $rows5['state'];
                        $addressm = $localitym.' '.$citym.' '.$statem;  
                    }
                }
                $sql6 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentto'";
                if($result6 = $link ->query($sql6))
                {
                    while($rows6 = $result6->fetch_array(MYSQLI_ASSOC))
                    {
                        $dognameo = $rows6['dogname'];
                        $recieverdog = $dognameo;
                        $dogageo = $rows6['dogage'];
                        $dogbreedo = $rows6['dogbreed'];
                        $dogweighto = $rows6['dogweight'];
                        $doggendero = $rows6['doggender'];
                        $certificationo = $rows6['certification'];
                        $descriptiono = $rows6['description'];
                        $organisation_nameo = $rows6['organisation_name'];
                        if($organisation_nameo == "None Of These")
                        {
                            $organisation_nameo = "No Organisation";
                        }
                        $nameo = $rows6['name'];
                        $contacto = $rows6['contact'];
                        $emailo = $rows6['email'];
                        $localityo = $rows6['locality'];
                        $cityo = $rows6['city'];
                        $stateo = $rows6['state'];
                        $addresso = $localityo.' '.$cityo.' '.$stateo;                                                   
                    }
                }
                if($status == 'pending')
                {
                    $history.= "<div style = 'color: red;' class='small'>$time</div>
                    <span style = 'color : black;'class='font-weight-bold'>$senderdog sent a request to $recieverdog<span>
                    <hr>";
                }
                if($status == 'declined')
                {
                    $history.= "<div style = 'color: red;' class='small'>$time</div>
                    <span style = 'color : black;'class='font-weight-bold'>$recieverdog declined the request of $senderdog<span>
                    <hr>";
                }
                if($status == 'cancelled')
                {
                    $history.= "<div style = 'color: red;' class='small'>$time</div>
                    <span style = 'color : black;'class='font-weight-bold'>$senderdog cancelled the request for $recieverdog<span>
                    <hr>";
                }
                if($status == 'confirmed')
                {
                    if($appointment_sender == 'pending' && $appointment_receiver == 'pending')
                    {
                        $history.= "<div style = 'color: red;' class='small'>$time</div>
                        <span style = 'color : black;'class='font-weight-bold'>$recieverdog accepted the request of $senderdog<span>
                        <hr>";
                    }
                    if($appointment_sender == 'pending' && $appointment_receiver == 'booked')
                    {
                        $count1++;
                        $history.= "<div style = 'color: red;' class='small'>$time</div>
                        <span style = 'color : black;'class='font-weight-bold'>$recieverdog booked an appointment for $senderdog<span>
                        <hr>";
                    }
                    if($appointment_sender == 'booked' && $appointment_receiver == 'pending')
                    {
                        $count2++;   
                        $history.= "<div style = 'color: red;' class='small'>$time</div>
                        <span style = 'color : black;'class='font-weight-bold'>$senderdog booked an appointment for $recieverdog<span>
                        <hr>";
                    }
                    if($appointment_sender == 'booked' && $appointment_receiver == 'booked')
                    {
                        if($count2 == 1 && $count1 == 0)
                        {
                            $history.= "<div style = 'color: red;' class='small'>$time</div>
                            <span style = 'color : black;'class='font-weight-bold'>$recieverdog booked an appointment for $senderdog<span>
                            <hr>";
                            $count1++;
                        }
                        else if($count1 == 1 && $count2 == 0)
                        {
                            $history.= "<div style = 'color: red;' class='small'>$time</div>
                            <span style = 'color : black;'class='font-weight-bold'>$senderdog booked an appointment for $recieverdog<span>
                            <hr>";
                            $count2++;
                        }
                    }
                }
            }
        }
                            $sql4 = "SELECT * FROM appointment_log WHERE appointment_log_sentfrom = '$sentfrom' AND appointment_log_sentto = '$sentto'";
                            if($result4 = $link ->query($sql4))
                            {
                                if($result4->num_rows > 0)
                                {
                                    while($rows4 = $result4->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $organisation = $rows4['appointment_log_organisation'];
                                        $appointment_date = $rows4['appointment_log_date'];
                                        $appointment_time = $rows4['appointment_log_time'];
                                        $contact_viewed = $rows4['appointment_log_contact_viewed'];
                                        $report_generated = $rows4['appointment_log_report_generated'];
                                        $booking_clicking_time = $rows4['appointment_log_booking_clicking_time'];
                                        $first_booking_time = $rows4['appointment_log_first_booking_time'];
                                        $time = $rows4['appointment_log_timing'];
                                        $time = strtotime("$time");
                                        $timeinindia = $time + 34200;
                                        $time = date('d-m-Y H:i:s', $timeinindia);
                                        
                                        if($contact_viewed == true && $first_booking_time == "NULL")
                                        {
                                            $history.= "<div style = 'color: red;' class='small'>$time</div>
                                            <span style = 'color : black;'class='font-weight-bold'>$organisation viewed the contact details of $senderdog and $recieverdog<span>
                                            <hr>";            
                                        }
                                        if($appointment_date !== "NULL" && $booking_clicking_time == $first_booking_time && $report_generated == false)
                                        {
                                            $history.= "<div style = 'color: red;' class='small'>$time</div>
                                            <span style = 'color : black;'class='font-weight-bold'>$organisation has scheduled an appointment for $senderdog and $recieverdog on $appointment_date between $appointment_time IST<span>
                                            <hr>" ;
                                         }
                                        if($appointment_date !== "NULL" && $booking_clicking_time !== $first_booking_time && $report_generated == false)
                                        {
                                            $history.= "<div style = 'color: red;' class='small'>$time</div>
                                            <span style = 'color : black;'class='font-weight-bold'>$organisation has rescheduled an appointment for $senderdog and $recieverdog on $appointment_date between $appointment_time IST<span>
                                            <hr>"; 
                                        }
                                        if($report_generated == true)
                                        {
                                            $history.= "<div style = 'color: red;' class='small'>$time</div>
                                            <span style = 'color : black;'class='font-weight-bold'>$organisation has generated a report for an appointment between $senderdog and $recieverdog dated $appointment_date<span>
                                            <hr>" ;
                                        }
                                    }
                                }
                            }
    $historycard.= "<div class='card'>
    <div class='card-header' role='tab' id='headingactive".$dogid."_".$sentfrom."_".$sentto."'>
    <a class='collapsed' data-toggle='collapse' data-parent='#accordionEx' href='#collapseactive".$dogid."_".$sentfrom."_".$sentto."'
    aria-expanded='false' aria-controls='collapseactive".$dogid."_".$sentfrom."_".$sentto."'>
    <h5 class='mb-0'>
    $senderdog - $recieverdog (Request ID : $requestid)<i class='fas fa-angle-down rotate-icon'></i>
    </h5>
    </a>
    </div>              
    <div id='collapseactive".$dogid."_".$sentfrom."_".$sentto."' class='collapse' role='tabpanel' aria-labelledby='headingactive".$dogid."_".$sentfrom."_".$sentto."'
    data-parent='#accordionEx'>
    <div class='card-body'>
    <div class='row'>
    <div class='col-lg-6'>       
    <div class='single category'>
    <h3 class='side-title'>Owner 1</h3>
    <ul class='list-unstyled'>
    <li><a href='' title=''>Name: <span class='pull-right'>$dognamem</span></a></li>
    <li><a href='' title=''>Owner Name: <span class='pull-right'>$namem</span></a></li>
            <li><a href='' title=''>Contact: <span class='pull-right'>$contactm</span></a></li>
            <li><a href='' title=''>Email: <span class='pull-right'>$emailm</span></a></li>
            <li><a href='' title=''>Address: <span class='pull-right'>$addressm</span></a></li>
    <li><a href='' title=''>Age(in months):<span class='pull-right'>$dogagem</span></a></li>
    <li><a href='' title=''>Weight(in kg):<span class='pull-right'>$dogweightm</span></a></li>
    <li><a href='' title=''>Breed: <span class='pull-right'>$dogbreedm</span></a></li>
    <li><a href='' title=''>KCI cetified: <span class='pull-right'>$certificationm</span></a></li>
    <li><a href='' title=''>Description: <span class='pull-right'>$descriptionm</span></a></li>
    <li><a href='' title=''>Organisation: <span class='pull-right'>$organisation_namem</span></a></li>
    </ul>
    </div>
    </div> 
    <div class='col-lg-6'>
            <div class='single category'>
            <h3 class='side-title'>Owner 2</h3>
            <ul class='list-unstyled'>
            <li><a href='' title=''>Name: <span class='pull-right'>$dognameo</span></a></li>
            <li><a href='' title=''>Owner Name: <span class='pull-right'>$nameo</span></a></li>
            <li><a href='' title=''>Contact: <span class='pull-right'>$contacto</span></a></li>
            <li><a href='' title=''>Email: <span class='pull-right'>$emailo</span></a></li>
            <li><a href='' title=''>Address: <span class='pull-right'>$addresso</span></a></li>
            <li><a href='' title=''>Age(in months):<span class='pull-right'>$dogageo</span></a></li>
            <li><a href='' title=''>Weight(in kg):<span class='pull-right'>$dogweighto</span></a></li>
            <li><a href='' title=''>Breed: <span class='pull-right'>$dogbreedo</span></a></li>
            <li><a href='' title=''>KCI cetified: <span class='pull-right'>$certificationo</span></a></li>
            <li><a href='' title=''>Description: <span class='pull-right'>$descriptiono</span></a></li>
            <li><a href='' title=''>Organisation: <span class='pull-right'>$organisation_nameo</span></a></li>
        </ul>
       </div>
    </div> 
    </div>
    <div class='row'>
                <div class='col-lg-12'>
            <div class='single category'>
            <h3 class='side-title'>History</h3>
            $history
    </div>
    </div> 
    </div>
    </div>
    </div>     
    </div> ";
                }
            }
echo "<div class='container-fluid'>
<div class='accordion md-accordion accordion-1' id='accordionEx' role='tablist'>
  $historycard
</div>
        </div>";
?>

