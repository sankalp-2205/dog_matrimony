<?php
session_start();
include 'connection.php';
$sql = "SELECT * FROM requests WHERE status = 'confirmed'";
$count == 0;
if($result = $link ->query($sql))
{
    if($result->num_rows == 0)
    {
        echo "0";
        exit;
    }
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $sentfrom = $rows['fromdogid'];
        $sentto = $rows['todogid'];
        $sql2 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND report_generated = true";
        if($result2 = $link ->query($sql2))
        {
            if($result2->num_rows == 0)
            {
                $count++;
            }
        }
    }
    echo $count;
}
?>