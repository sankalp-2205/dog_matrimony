<?php
session_start();
include ('connection.php');
date_default_timezone_set("Asia/Kolkata");

//errors
$nousername ="<p><strong>Enter the username</strong></p>";
$nopassword = "<p><strong>Enter the password</strong></p>";
if(empty($_POST["affiliateloginusername"]))
    {
        $errors .= $nousername;
    }
if(empty($_POST["affiliateloginpassword"]))
        {
            $errors .= $nopassword;
        }
$loginpassword = $_POST["affiliateloginpassword"];
$loginusername = $_POST["affiliateloginusername"];
  if($errors)
    {
        $message = "<div class='alert alert-danger'>" .$errors. "</div>"; 
        echo $message;
    }
   else
    {
        $loginusername = $link ->real_escape_string($loginusername); 
        $loginpassword = $link ->real_escape_string($loginpassword);
        $sql = "SELECT * FROM affiliates WHERE affiliation_username = '$loginusername' AND affiliation_password = '$loginpassword' AND affiliation_activation = 'active'";
        if($result = $link ->query($sql))
        {
             if($result->num_rows == 1)
             {
                $rows = $result -> fetch_array(MYSQLI_ASSOC);
                $_SESSION['username'] = $rows['affiliation_username'];
                $_SESSION['organisation'] = $rows['organisation_name'];
                if(empty($_POST['rememberme']))
                {
                    echo "success";
                }
                 // remember me
                else
                {
                    $authentificator1 = bin2hex(openssl_random_pseudo_bytes(10));
                    $authentificator2 = openssl_random_pseudo_bytes(20);
                    function setcookievariable($a , $b)
                    {
                        $c = $a . "," . bin2hex($b);
                        return $c;
                    }
                    function f2($a)
                    {
                        $b = hash('sha256',$a);
                        return $b;
                    }
                    $cookie_value = setcookievariable($authentificator1, $authentificator2);
                    $f2authentificator2 = f2($authentificator2);
                    setcookie(
                        "remember_me",
                        $cookie_value,
                        time() + 1296000
                    );
                    if(array_key_exists("remember_me",$_COOKIE))
                    {
                        $user_id = $_SESSION['user_id'];
                        $expiration = date('Y-m-d H:i:s', time() + 1296000);
                        $sql = "INSERT INTO remember_me (authentificator1, f2authentificator2, user_id, expires) VALUES ('$authentificator1','$f2authentificator2', '$user_id', '$expiration')";
                        if($link -> query($sql))
                        {
                            $_SESSION['username'] = $_POST['affiliation_username']; 
                            echo "success";
                        }
                        else
                        {
                            echo "<div class='alert alert-danger'>Error remembering you. Plz try later</div>";
                        } 
                    }
                    else
                    {
                        echo "xyz";
                        exit;
                    }
                }
             }
             else{
                echo "<div class='alert alert-danger'>Enter correct user id and password</div>";
            }
        }
       else
       {
           echo "<div class='alert alert-danger'>Could not run the query</div>";
       }
   }
?>