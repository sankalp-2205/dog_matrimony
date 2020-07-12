<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
$nocurrentpassword = "<p><strong>Please Enter the current password</strong></p>";
$nonewpassword = "<p><strong>Please Enter the new password</strong></p>";
$noconfirmpassword = "<p><strong>Please Enter the current password</strong></p>";
$invalidpassword = "<p><strong>The password must be of 7 charecters including atleast 1 upppercase,atleast 1 lower case and atleast one number.</strong></p>";
$passwordsdidnotmatch = "<p><strong>The passwords did not match</strong></p>";
$wrongcurrentpassword = "<p><strong>The current password is incorrect</strong></p>";
if(empty($_POST["currentpassword"]))
    {
        $errors .= $nocurrentpassword;
        echo "nocurrentpassword";
        exit;
    }
if(empty($_POST["password1"]))
        {
            $errors .= $nonewpassword;
            echo "nonewpassword";
            exit;
        }
 elseif(!(strlen($_POST["password1"])>6 and preg_match('/[A-Z]/',$_POST["password1"]) and preg_match('/[a-z]/',$_POST["password1"]) and preg_match('/[0-9]/',$_POST["password1"])))
    {
        $errors .= $invalidpassword;
        echo "invalidpassword";
        exit;
    }
    else
    {
        if(empty($_POST["password2"]))
        {
            $errors .= $noconfirmpassword;
            echo "noconfirmpassword";
            exit;
        }
            elseif($_POST["password1"] !== $_POST["password2"])
             {
                 $errors .= $passworddidnotmatch;
                 echo "passwordsdidnotmatch";
                 exit;
             }
        }
$currentpassword =  $_POST['currentpassword'];
$newpassword = $_POST['password1'];
$confirmpassword =  $_POST['password2'];
// $currentpassword = md5($currentpassword);
// $newpassword = md5($newpassword);
// $confirmpassword = md5($confirmpassword);
if($errors)
    {
        $message = "<div class='alert alert-danger'>" .$errors. "</div>"; 
        echo $message;
        exit;
    }
$currentpassword = $link ->real_escape_string($currentpassword); 
$newpassword = $link ->real_escape_string($newpassword); 
$confirmpassword = $link ->real_escape_string($confirmpassword);
$sql = "SELECT * FROM affiliates WHERE affiliation_username = '$username' AND affiliation_password = '$currentpassword' AND affiliation_activation = 'active'";
        if($result = $link ->query($sql))
        {
             if($result->num_rows == 0)
             {
                echo "incorrectpassword";
                exit;
             }
             else
             {
                $sql = "UPDATE affiliates SET affiliation_password = '$newpassword' WHERE affiliation_username = '$username'";
                if($result = $link ->query($sql))
                {
                    echo "success";
                }
                else
                {
                    echo "<div class = 'alert alert-warning'>Cannot change password right now. Please try later</div>";
                    exit;
                }
             }
        }

?>