<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
$age = $_POST['age'];
$age+= 0;
$weight = $_POST['weight'];
$weight+=0;
$description = $_POST['description'];
$kci = $_POST['kci'];
$dogid = $_POST['id']; 
if(empty($_POST['age']))
{
    echo "noage";
    exit;
}
if(!(is_int($age)))
{
    echo "invalidage";
    exit;
}
if($_POST['age']> 130)
{
    echo "invalidage";
    exit;
}
if($age < 1)
{
    echo "invalidage";
    exit;
}
if(empty($_POST['weight']))
{
    echo "noweight";
    exit;
}
if(!(is_int($weight)))
{
    echo "invalidweight";
    exit;
}
if($_POST['weight']> 180)
{
    echo "invalidweight";
    exit;
}
if($_POST['weight']< 1)
{
    echo "invalidweight";
    exit;
}
$sql = "UPDATE dogs SET dogage = '$age',dogweight = '$weight', certification = '$kci',description = '$description' WHERE username = '$username' AND dogid = '$dogid'";
{
    if($link->query($sql))
    {
        echo "success";
    }
    else
    {
        echo "<div class = 'alert alert-danger'>Unable to update in dog table</div>";
    }
}
?>