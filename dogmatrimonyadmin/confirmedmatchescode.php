<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['adminusername'];
$confirmedcard = "";
$sql = "SELECT * FROM requests WHERE status = 'confirmed'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $requestid = $rows['id'];
        $sentfrom = $rows['fromdogid'];
        $sentto = $rows['todogid'];
        $sql2 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND report_generated = true ";
        if($result2 = $link ->query($sql2))
        {
            if($result2->num_rows == 0)
            {
                $appointment_sender = $rows['appointment_sender'];
                $appointment_receiver = $rows['appointment_receiver'];
                $organisation = $rows['organisation_handling'];
                $status = $rows['status'];
                $sql3 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND report_generated = false";
                if($result3 = $link ->query($sql3))
                {
                    if($result3->num_rows == 1)
                    {
                        while($rows3 = $result3->fetch_array(MYSQLI_ASSOC))
                        {
                            $appointment_date = $rows3['appointment_date'];
                            $appointment_time = $rows3['appointment_time'];
                        }
                        if($appointment_date == "NULL")
                        {
                            $appointment_date = "N/A";
                            $appointment_time = "N/A";
                        }
                    }
                    else {
                        $appointment_date = "N/A";
                        $appointment_time = "N/A";      
                    }
                }
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
                            
    $confirmedcard.= "<div class='card'>
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
    <h3 class='side-title'>Owner 1(Sender)</h3>
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
            <h3 class='side-title'>Owner 2(Receiver)</h3>
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
            <h3 class='side-title'>Progress</h3>
            <ul class='list-unstyled'>
            <li><a href='' title=''>Status: <span class='pull-right'>$status</span></a></li>
            <li><a href='' title=''>Booking Sender: <span class='pull-right'>$appointment_sender</span></a></li>
            <li><a href='' title=''>Booking Receiver: <span class='pull-right'>$appointment_receiver</span></a></li>
            <li><a href='' title=''>Appointment Date: <span class='pull-right'>$appointment_date</span></a></li>
            <li><a href='' title=''>Appointment Time: <span class='pull-right'>$appointment_time</span></a></li>     
        </ul>
    </div>
    </div> 
    </div>
    </div>
    </div>     
    </div> ";
                }
            }
        }
    }
echo "<div class='container-fluid'>
<div class='accordion md-accordion accordion-1' id='accordionEx' role='tablist'>
  $confirmedcard
</div>
        </div>";
?>

