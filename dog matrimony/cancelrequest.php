<?php
session_start();
include 'connection.php';
$sentfrom = $_POST['sentfrom'];
$sentto = $_POST['sentto'];
$username = $_SESSION['username'];
$count = 0;
$sql = "SELECT * FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
             {  
                $status = $rows['status'];
                $appointment_sender = $rows['appointment_sender'];
                $appointment_receiver = $rows['appointment_receiver'];
             }
}
if($status == 'confirmed' && ($appointment_receiver == 'booked' || $appointment_sender == 'booked'))
    {
        $sql2 = "SELECT * FROM dogs WHERE dogid = '$sentfrom' AND username = '$username'";
                        if($result2 = $link ->query($sql2))
                        {
                            if ($result2->num_rows > 0)
                            {
                                //request sent by the logged in user
                                if ($appointment_sender == 'booked')
                                {
                                    $count++;
                                    echo "reload";
                                    exit;
                                }
                            }
                            else
                            {
                                $sql3 = "SELECT * FROM dogs WHERE dogid = '$sentto' AND username = '$username'";
                                if($result3 = $link ->query($sql3))
                                {
                                    if ($result3->num_rows > 0)
                                    {
                                        //request sent to the logged in user
                                        if ($appointment_receiver == 'booked')
                                        {
                                            $count++;
                                            echo "reload";
                                            exit;
                                        }
                                    }
                                }
                            }
                        }
        }
if($status !== 'declined' && $count ==0)
{
    $sql = "UPDATE requests SET status = 'cancelled' WHERE fromdogid = '$sentfrom' AND todogid = '$sentto';";
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