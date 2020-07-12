
<?php
session_start();
include ('connection.php');
$email= $_POST['email'];
$sql = "UPDATE users SET activation = 'active' WHERE email = '$email'";
if($result = $link->query($sql))
{
    echo "success";
}
?>