<?php
session_start();
include 'connection.php';
$sentfrom = $_POST['sentfrom'];
$sentto = $_POST['sentto'];
$sql = "SELECT * FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
             {  
                $status = $rows['status'];
             }
}
if($status == 'pending') 
{
    $sql = "UPDATE requests SET status = 'confirmed' WHERE fromdogid = '$sentfrom' AND todogid = '$sentto';";
    
    if($result = $link ->query($sql))
    {
        echo "success";
    }
    else
    {
        echo "Cannot run query. Plz try again later";
    }
}
else
{
    echo "reload";
}

?>