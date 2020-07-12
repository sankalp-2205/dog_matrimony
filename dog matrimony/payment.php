<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
$sentfrom = $_POST['sentfrom'];
$sentto = $_POST['sentto'];
$username = $_SESSION['username'];
// header("Location: http://websh.offyoucode.co.uk/dog%20matrimony/proceed.php?sentfrom=$sentfrom&sentto=$sentto");
$returnUrl = "success"; 
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
if($status !== "confirmed")
{
    echo "reload";
    exit;
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
                                    echo "repayment";
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
                                            echo "repayment";
                                            exit;
                                        }
                                    }
                                }
                            }
                        }
        }
$sql = "SELECT * FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto'";
if($result = $link ->query($sql))
        {
             while($rows = $result->fetch_array(MYSQLI_ASSOC))
             {  
                 $requestId = $rows['id'];
                //  $orderId = $rows['id'];
                //  $orderAmount = 2000;
             }
        }
    $orderId = $unique_id = time() . mt_rand() . $requestId;

    $orderDetails = array();
    $orderDetails["returnUrl"] = $returnUrl;
    $userDetails = getuserdetails($username,$link);
    $order = getorderdetails($requestId,$orderId,$link,$username,$sentfrom,$sentto);
    echo $orderId;
    $orderDetails["customerName"] = $userDetails["customerName"];
    $orderDetails["customerEmail"] = $userDetails["customerEmail"];
    $orderDetails["customerPhone"] = $userDetails["customerPhone"];
    $orderDetails["orderId"] = $order["orderId"];
    $orderDetails["orderAmount"] = $order["orderAmount"];
    $orderDetails["orderNote"] = $order["orderNote"];
    $orderDetails["orderCurrency"] = $order["orderCurrency"];
    var_dump($orderDetails);

    function getuserdetails($username,$link)
    {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        if($result = $link ->query($sql))
        {
             while($rows = $result->fetch_array(MYSQLI_ASSOC))
             { 
                 $name = $rows['name'];
                 $email = $rows['email'];
                 $contact = $rows['contact'];
             }
        }
        return array(
            "customerName" => "$name",
            "customerEmail" => "$email",
            "customerPhone" => "$contact"
        );

    }
   
    function getorderdetails($requestId,$orderId,$link,$username,$sentfrom,$sentto)
    {
        echo $username;
        echo $sentto;
        $sql = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentfrom' OR dogid = '$sentto'";
        if($result = $link ->query($sql))
        {
             while($rows = $result->fetch_array(MYSQLI_ASSOC))
             { 
                 $dogname = $rows['$dogname'];
                 $dogbreed = $rows['$dogbreed'];
                 $doggender = $rows['$doggender'];
                 echo $dogname;
             }
        }
        else
        {
            echo "cant";
        }
        return array(
            "orderId" => "$orderId",
            "orderAmount" => "2000",
            "orderNote" => "Payment for Request ID: $requestId",
            "orderCurrency" => "INR"
        );

    }
    


?>