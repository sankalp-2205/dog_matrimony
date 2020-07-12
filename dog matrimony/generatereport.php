<?php
session_start();
include 'connection.php';
require('fpdf/fpdf.php');
date_default_timezone_set('Asia/Kolkata');
$sentfrom =  $_POST['sentfrom'];
$sentto =  $_POST['sentto'];
$username = $_SESSION['username'];
$outcome = $_POST['outcome'];
$date = $_POST['date2'];
$litter = $_POST['litter'];
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {  
        $organisation_name = $rows['organisation_name'];
        $acity = $rows['affiliation_city'];
        $alocality = $rows['affiliation_locality'];
        $aaddress = $rows['affiliation_address'];
        $acontact = $rows['affiliation_contact'];
    }
}
$sql = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {  
        $appointment_date = $rows['appointment_date'];
    }
}
$sql = "SELECT * FROM affiliates WHERE affiliation_username = '$username'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {  
        $organisation_name = $rows['organisation_name'];
        $acity = $rows['affiliation_city'];
        $alocality = $rows['affiliation_locality'];
        $aaddress = $rows['affiliation_address'];
        $acontact = $rows['affiliation_contact'];
    }
}
$sql2 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentfrom'";
    if($result2 = $link ->query($sql2))
    {
        while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
        { 
                        $dogid = $rows2['dogid'];
                        $dogname = $rows2['dogname'];
                        $dogage = $rows2['dogage'];
                        $dogbreed = $rows2['dogbreed'];
                        $dogweight = $rows2['dogweight'];
                        $doggender = $rows2['doggender'];
                        $certification = $rows2['certification'];
                        $name = $rows2['name'];
                        $state = $rows2['state'];
                        $city = $rows2['city'];
                        $locality = $rows2['locality'];
                        $contact = $rows2['contact'];
                        $email = $rows2['email'];
        }
    }
    $sql2 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentto'";
    if($result2 = $link ->query($sql2))
    {
        while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
        { 
                        $dogid2 = $rows2['dogid'];
                        $dogname2 = $rows2['dogname'];
                        $dogage2 = $rows2['dogage'];
                        $dogbreed2 = $rows2['dogbreed'];
                        $dogweight2 = $rows2['dogweight'];
                        $doggender2 = $rows2['doggender'];
                        $certification2 = $rows2['certification'];
                        $name2 = $rows2['name'];
                        $state2 = $rows2['state'];
                        $city2 = $rows2['city'];
                        $locality2 = $rows2['locality'];
                        $contact2 = $rows2['contact'];
                        $email2 = $rows2['email'];
        }
    }

$description = $_POST['description'];
$description = str_split($description, 80);
$reportdate = time();
$reportdate = date('d-m-Y', $reportdate);
if($outcome == "success[$sentfrom][$sentto]")
{
    if(empty($_POST['litter']))
    {
        echo "nolitter";
        exit;
    }
    if(empty($_POST['date2']))
    {
        echo "nodob";
        exit;
    }
    if(empty($_POST['description']))
    {
        echo "nodescription";
        exit;
    }
    function Date_validate($date, $format = 'd-m-Y')
    {
        $date_obj = DateTime::createFromFormat($format, $date);
        if($date_obj && $date_obj->format($format) == $date)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
$validity = Date_validate($date);
if($validity == false)
{
    echo "invaliddate";
    exit;
}
    if($litter > 25 || $litter < 1)
    {
        echo "invalidlitter";
        exit;
    }
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
     $pdf->Cell(130 ,5,$organisation_name,0,0);
     $pdf->Cell(59 ,5,'REPORT',0,1);
     $pdf->SetFont('Arial','',12);
     $pdf->Cell(130 ,5,$aaddress.', '.$alocality,0,0);
     $pdf->SetTextColor(0,128,0);
     $pdf->Cell(59 ,5,'SUCCESSFUL',0,1);
     $pdf->SetTextColor(0,0,0);
     $pdf->Cell(130 ,5,'['.$acity.',800013]',0,0);
     $pdf->Cell(25 ,5,'Date',0,0);
     $pdf->Cell(34 ,5,$reportdate,0,1);
     $pdf->Cell(130 ,5,$acontact,0,0);
     $pdf->Cell(25 ,5,'SENT TO',0,0);
     $pdf->Cell(34 ,5,'DOG MATRIMONY',0,1);
     $pdf->Cell(189 ,10,'',0,1);
     $pdf->Cell(100 ,5,'APPOINTMENT DETAILS:( '.$appointment_date.' )',0,1);
     $pdf->Cell(10 ,5,'',0,0);
     $pdf->Cell(90 ,5,'Owner 1 : '.$name,0,0);
     $pdf->Cell(25 ,5,'Owner 2 : '.$name2,0,1);
     $pdf->Cell(10 ,5,'',0,0);
     $pdf->Cell(90 ,5,'Contact : '.$contact,0,0);
     $pdf->Cell(25 ,5,'Contact : '.$contact2,0,1);
     $pdf->Cell(10 ,5,'',0,0);
     $pdf->Cell(90 ,5,'Email : '.$email,0,0);
     $pdf->Cell(25 ,5,'Email : '.$email2,0,1);
     $pdf->Cell(10 ,5,'',0,0);
     $pdf->Cell(90 ,5,'Pet : '.$dogname,0,0);
     $pdf->Cell(25 ,5,'Pet : '.$dogname2,0,1);
     $pdf->Cell(10 ,5,'',0,0);
     $pdf->Cell(90 ,5,'Breed : '.$dogbreed,0,0);
     $pdf->Cell(25 ,5,'Breed: '.$dogbreed2,0,1);
     $pdf->Cell(10 ,5,'',0,0);
     $pdf->Cell(90 ,5,'Gender : '.$doggender,0,0);
     $pdf->Cell(25 ,5,'Gender : '.$doggender2,0,1);
     $pdf->Cell(10 ,5,'',0,0);
     $pdf->Cell(90 ,5,'Address : '.$locality.' '.$city,0,0);
     $pdf->Cell(25 ,5,'Address : '.$locality2.' '.$city2,0,1);
     $pdf->Cell(189 ,10,'',0,1);
     $pdf->SetFont('Arial','B',12);
     $pdf->Cell(10 ,5,'',0,0);
     $pdf->Cell(80 ,5,'Number of Puppies in the litter',1,0,'C');
     $pdf->Cell(55 ,5,'Date Of Delivery',1,1,'C');
     $pdf->SetFont('Arial','',12); 
     $pdf->Cell(10 ,5,'',0,0);
     $pdf->Cell(80 ,5,$litter,1,0,'C');
     $pdf->Cell(55 ,5,$date,1,1,'C');
     $pdf->Cell(130 ,5,'',0,1);
     $pdf->Cell(100 ,10,'DESCRIPTION:',0,1);
     $pdf->Cell(130 ,5,'',0,1);
     for ($i = 0; $i < count($description); $i++)
     {
        $pdf->Cell(150 ,5,$description[$i],0,1);
     } 
    $pdf->Cell(150 ,5,$newtext,0,1);
    $pdf->Output("report_".$dogid."_".$dogid2.".pdf",'F');
    echo "success";
}
else
{
    if(empty($_POST['description']))
    {
        echo "nodescription";
        exit;
    }
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
     $pdf->Cell(130 ,5,$organisation_name,0,0);
     $pdf->Cell(59 ,5,'REPORT',0,1);//end of line
     $pdf->SetFont('Arial','',12);
     $pdf->Cell(130 ,5,$aaddress.', '.$alocality,0,0);
     $pdf->SetTextColor(128,0,0);
     $pdf->Cell(59 ,5,'DID NOT WORK OUT',0,1);
     $pdf->SetTextColor(0,0,0);
     $pdf->Cell(130 ,5,'['.$acity.',800013]',0,0);
     $pdf->Cell(25 ,5,'Date',0,0);
     $pdf->Cell(34 ,5,$reportdate,0,1);//end of line
     $pdf->Cell(130 ,5,'Phone : '.$acontact,0,0);
     $pdf->Cell(25 ,5,'SENT TO',0,0);
     $pdf->Cell(34 ,5,'DOG MATRIMONY',0,1);
     $pdf->Cell(189 ,10,'',0,1);
     $pdf->Cell(100 ,5,'APPOINTMENT DETAILS',0,1);//end of line
     $pdf->Cell(130 ,5,'',0,1);
     $pdf->Cell(10 ,5,'',0,0);
     $pdf->Cell(90 ,5,'Owner 1 : '.$name,0,0);
     $pdf->Cell(25 ,5,'Owner 2 : '.$name2,0,1);
     $pdf->Cell(10 ,5,'',0,0);
     $pdf->Cell(90 ,5,'Contact : '.$contact,0,0);
     $pdf->Cell(25 ,5,'Contact : '.$contact2,0,1);
     $pdf->Cell(10 ,5,'',0,0);
     $pdf->Cell(90 ,5,'Email : '.$email,0,0);
     $pdf->Cell(25 ,5,'Email : '.$email2,0,1);
     $pdf->Cell(10 ,5,'',0,0);
     $pdf->Cell(90 ,5,'Pet : '.$dogname,0,0);
     $pdf->Cell(25 ,5,'Pet : '.$dogname2,0,1);
     $pdf->Cell(10 ,5,'',0,0);
     $pdf->Cell(90 ,5,'Breed : '.$dogbreed,0,0);
     $pdf->Cell(25 ,5,'Breed: '.$dogbreed2,0,1);
     $pdf->Cell(10 ,5,'',0,0);
     $pdf->Cell(90 ,5,'Gender : '.$doggender,0,0);
     $pdf->Cell(25 ,5,'Gender : '.$doggender2,0,1);
     $pdf->Cell(10 ,5,'',0,0);
     $pdf->Cell(90 ,5,'Address : '.$locality.' '.$city,0,0);
     $pdf->Cell(25 ,5,'Address : '.$locality2.' '.$city2,0,1);
     $pdf->Cell(189 ,10,'',0,1);
     $pdf->Cell(100 ,10,'DESCRIPTION:',0,1);
     $pdf->Cell(130 ,5,'',0,1);
     for ($i = 0; $i < count($description); $i++)
     {
        $pdf->Cell(150 ,5,$description[$i],0,1);
     } 
    $pdf->Cell(150 ,5,$newtext,0,1);
    $pdf->Output("report_".$dogid."_".$dogid2.".pdf",'F');
    echo "success";
}
?>