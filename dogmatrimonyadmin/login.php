<?php
session_start();
include ('connection.php');
date_default_timezone_set("Asia/Kolkata");
if(empty($_POST["username"]))
    {
        echo "nousername";
        exit;
    }
if(empty($_POST["password"]))
        {
            echo "nopassword";
            exit;
        }
$username = $_POST["username"];
$password = $_POST["password"];
        $username = $link ->real_escape_string($username); 
        $password = $link ->real_escape_string($password);
        $sql = "SELECT * FROM admin WHERE admin_username = '$username' AND admin_password ='$password'";
        if($result = $link ->query($sql))
        {
             if($result->num_rows == 1)
             {
                $rows = $result -> fetch_array(MYSQLI_ASSOC);
                $_SESSION['adminusername'] = $rows['admin_username'];
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
                            $_SESSION['adminusername'] = $_POST['admin_username']; 
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
?>