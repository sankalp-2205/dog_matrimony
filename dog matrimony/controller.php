<?php
session_start();
error_reporting(E_ALL & ~ E_NOTICE);
require ('textlocal.class.php');
include 'connection.php';
class Controller
{
    function __construct() {
        $this->processMobileVerification();
    }
    function processMobileVerification()
    {
        switch ($_POST["action"]) {
            case "send_otp":
                
                $mobile_number = $_POST['mobile_number'];
                
                $apiKey = urlencode('VTr5JxmVa78-vxs3SOMSGrZfcIWPJZStYYGRYoGbNr');
                $Textlocal = new Textlocal(false, false, $apiKey);
                
                $numbers = array(
                    $mobile_number
                );
                $sender = 'TXTLCL';
                $otp = rand(100000, 999999);
                $_SESSION['session_otp'] = $otp;
                $message = "Your One Time Password for registering into DOG MATRIMONY IS  " . $otp;
                
                try{
                    $response = $Textlocal->sendSms($numbers, $message, $sender);
                    // $response = $otp;
                    // echo $response;
                    require_once ("verification-form.php");
                    exit();
                }catch(Exception $e){
                    die('Error: '.$e->getMessage());
                }
                break;
                
            case "verify_otp":
                $otp = $_POST['otp'];
                
                if ($otp == $_SESSION['session_otp']) {
                    unset($_SESSION['session_otp']);
                            echo json_encode(array("type"=>"success", "message"=>"Your account is successfully activated!Redirecting to Login Page....."));
                } else {
                    echo json_encode(array("type"=>"error", "message"=>"Mobile number verification failed"));
                }
                break;
        }
    }
}
$controller = new Controller();
?>