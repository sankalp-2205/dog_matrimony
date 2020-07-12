<?php
if(array_key_exists('user_id',$_SESSION) && array_key_exists('remember_me',$_COOKIE))
{
    list($authentificator1,$authentificator2) = explode(',',$_COOKIE['remember_me']);
    $authentificator2 = hex2bin($authentificator2);
    $f2authentificator2 = hash("sha256",$authentificator2);
    $sql = "SELECT * FROM remember_me WHERE f2authentificator2 = '$f2authentificator2'";
    if($result = $link->query($sql))
    {
        if($result->num_rows == 1)
        {
            $rows = $result -> fetch_array(MYSQLI_ASSOC);
            if($authentificator1 == $rows['authentificator1'])
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
                        if(!$link -> query($sql))
                        {
                            echo "<div class = 'alert alert-danger'>Unable to store in remember_me table</div>";
                        }
                    }
                    else
                    {
                         echo "xyz";
                         exit;
                    }
                    $_SESSION['user_id'] = $rows['user_id'];
                    header("location:workspace.php");
            }
            else
            {
                echo "<div class = 'alert alert-danger'>Authentificators did not match</div>";
                exit;
            }
        }
        else
        {
            echo "<div class = 'alert alert-danger'>Remember Me process failed</div>";
            exit;
        }
        
        
    }
    else
    {
        echo "<div class = 'alert alert-danger'>Unable to run query </div>";
        exit;
    }
}

?>