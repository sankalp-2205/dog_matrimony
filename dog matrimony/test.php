<?php 
session_start();
include 'connection.php';
$username = $_SESSION['username'];
$sentfrom = $_GET['sentfrom'];
$sentto = $_GET['sentto'];
$sql = "SELECT * FROM affiliates WHERE affiliation_username = '$username'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {  
        $organisation_name = $rows['organisation_name'];
    }
}
$sql = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND organisation_name = '$organisation_name' AND report_generate = false";
if($result = $link ->query($sql))
{
    if($result ->num_rows == 0)
    {
        exit;
    }
}
$sql = "UPDATE appointments SET report_generated = true  WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND organisation_name = '$organisation_name'";
if(!($result = $link ->query($sql)))
{
    echo "Cannot set report generated to true";
}
$file = 'report_'.$sentfrom.'_'.$sentto.'.pdf'; 
$filename = 'report_'.$sentfrom.'_'.$sentto.'.pdf'; 
header('Content-type: application/pdf'); 
header('Content-Disposition: inline; filename="' . $filename . '"'); 
header('Content-Transfer-Encoding: binary'); 
header('Accept-Ranges: bytes'); 
// Read the file 
@readfile($file); 
?>