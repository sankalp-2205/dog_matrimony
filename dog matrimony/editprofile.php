<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
$nousername = "<p><strong>Enter the username</strong></p>";
$usernamealreadyexist = "<p><strong>Username already taken</strong></p>";
$usernameafterediting = $_POST['username'];
if(empty($_POST['username']))
{
    $errors .= "<div class = 'alert alert-danger'>Please enter the username</div>";
}
if ($errors) {
    $message = "<div class='alert alert-danger'>" . $errors . "</div>";
    echo $message;
 } 
else 
{
    $usernameafterediting = $link->real_escape_string($usernameafterediting);
    $name = $link->real_escape_string($name);
    if ($username !== $usernameafterediting) {
        $sql = "SELECT * FROM users WHERE username = '$usernameafterediting'";
        if ($result = $link->query($sql)) {
            if ($result->num_rows > 0) {
                echo "<div class = 'alert alert-danger'>The username is already in use</div>";
                exit;
            }
                  $file = fopen("$username.txt", 'rb');
                 $newfile = fopen("$usernameafterediting.txt", 'wb');
                while(($line = fgets($file)) !== false) {
                    if(strpos($line, 'user.php') !== false) {
                fputs($newfile, $line);
                }
        }
    fclose($newfile);
    fclose($file);
                $sql = "UPDATE dogs SET username = '$usernameafterediting' WHERE username = '$username'";
                if (!($link->query($sql))) 
                {
                    echo "<div class = 'alert alert-danger'>Unable to change username in dogs table</div>";
                }
            
        } else {
            echo "<div class = 'alert alert-danger'>Unable to select username from users table</div>";
        }
    }
    $sql = "UPDATE users SET username = '$usernameafterediting' WHERE username = '$username'";
    {
        if($link->query($sql))
        {
            $_SESSION['username'] = $usernameafterediting;
            $username = $usernameafterediting;
            echo "success";
        }
        else
        {
            echo "<div class = 'alert alert-danger'>Unable to update in users table</div>";
        }
    }

}
?>