<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
$organisation = $_SESSION['organisation'];
$nousername = "<p><strong>Enter the username</strong></p>";
$usernamealreadyexist = "<p><strong>Username already taken</strong></p>";
$noname = "<p><strong>Enter the name</strong></p>";
$nostate = "<p><strong>Enter the state</strong></p>";
$nocity = "<p><strong>Enter the city</strong></p>";
$nolocality = "<p><strong>Enter the locality</strong></p>";
$noaddress = "<p><strong>Enter the address</strong></p>";
$noorganisation = "<p><strong>Enter the organisation</strong></p>";
if (empty($_POST["username"])) {
    $errors .= $nousername;
}
if (empty($_POST["name"])) {
    $errors .= $noname;
}
if (empty($_POST["state"])) {
    $errors .= $nostate;
}
if (empty($_POST["city"])) {
    $errors .= $nocity;
}
if (empty($_POST["locality"])) {
    $errors .= $nolocality;
}
if (empty($_POST["address"])) {
    $errors .= $noaddress;
}
if (empty($_POST["organisation"])) {
    $errors .= $noorganisation;
}
$usernameafterediting = $_POST['username'];
$name = $_POST['name'];
$state = $_POST['state'];
$city = $_POST['city'];
$locality = $_POST['locality'];
$address = $_POST['address'];
$organisationafterediting = $_POST['organisation'];
if ($errors) {
    $message = "<div class='alert alert-danger'>" . $errors . "</div>";
    echo $message;
 } 
else 
{
    $usernameafterediting = $link->real_escape_string($usernameafterediting);
    $name = $link->real_escape_string($name);
    $state = $link->real_escape_string($state);
    $city = $link->real_escape_string($city);
    $locality = $link->real_escape_string($locality);
    $address = $link->real_escape_string($address);
    $organisation = $link->real_escape_string($organisation);
    if ($username !== $usernameafterediting) {
        $sql = "SELECT * FROM affiliates WHERE affiliation_username = '$usernameafterediting'";
        if ($result = $link->query($sql)) {
            if ($result->num_rows > 0) {
                echo "<div class = 'alert alert-danger'>The username is already in use</div>";
                exit;
            }
                $sql = "UPDATE dogs SET username = '$usernameafterediting' WHERE username = '$username'";
                if (!($link->query($sql))) 
                {
                    echo "<div class = 'alert alert-danger'>Unable to change username in dogs table</div>";
                }
            
        } else {
            echo "<div class = 'alert alert-danger'>Unable to select username from users table</div>";
        }
    }
    if ($organisation !== $organisationafterediting) {
                $sql = "UPDATE dogs SET organisation_name = '$organisationafterediting' WHERE organisation_name = '$organisation'";
                if (!($link->query($sql))) 
                {
                    echo "<div class = 'alert alert-danger'>Unable to change organisation in dogs table</div>";
                    exit;
                }
    }
    $sql = "UPDATE affiliates SET affiliation_username = '$usernameafterediting' , owner_name = '$name' , affiliation_state = '$state' , affiliation_city = '$city' , affiliation_locality = '$locality' , affiliation_address = '$address', organisation_name = '$organisationafterediting'   WHERE affiliation_username = '$username'";
    {
        if($link->query($sql))
        {
            $_SESSION['username'] = $usernameafterediting;
            $username = $usernameafterediting;
            $_SESSION['organisation'] = $organisationafterediting;
            $organisation = $organisationafterediting;
            echo "success";
        }
        else
        {
            echo "<div class = 'alert alert-danger'>Unable to update in affiliation table</div>";
        }
    }

}
?>