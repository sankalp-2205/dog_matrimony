<?php
session_start();
include ('connection.php');
$username = $_SESSION['username'];
$noname = "<p><strong>Enter the name</strong></p>";
$noage = "<p><strong>Enter the age</strong></p>";
$nobreed = "<p><strong>Enter the dog breed</strong></p>";
$noweight = "<p><strong>Enter the dog weight</strong></p>";
$nogender = "<p><strong>Enter the dog gender</strong></p>";
$invalidage = "<p><strong>Age not valid</strong></p>";
$noorganisation = "<p><strong>Enter the organisation</strong></p>";
$nocertification = "<p><strong>Enter the certification</strong></p>";
$invalidweight = "<p><strong>Weight not valid</strong></p>";
if(empty($_POST["name"]))
{
    $errors .= $noname;
    echo "noname";
    exit;
}
else
{
    $name = filter_var($_POST["name"],FILTER_SANITIZE_STRING);
}
  if(empty($_POST["age"]))
    {
        $errors.= $noage;
        echo "noage";
        exit;
    }
    else
    {
        if(!(is_numeric($_POST["age"])))
        {
            $errors .= $invalidage;
            echo "invalidage";
            exit;
        }
    }   
    if(($_POST["breed"] == "Select breed"))
    {
        $errors .= $nobreed;
        echo "nobreed";
        exit;
    }
        if(empty($_POST["weight"]))
        {
            $errors .= $noweight;
            echo "noweight";
            exit;
        }
    else
    {
         if(!(is_numeric($_POST["weight"])))
        {
            $errors .= $invalidweight;
            echo "invalidweight";
            exit;
        }      
        }
 if($_POST["gender"] == "Select gender")
        {
            $errors .= $nogender;
            echo "nogender";
            exit;
        }
if(($_POST["organisation"] == "Recommended By"))
{
    $errors .= $noorganisation;
    echo "noorganisation";
    exit;
}
if(($_POST["kci"] == "Kennel Club Certified"))
{
    $errors .= $nocertification;
    echo "nocertification";
    exit;
}
    $name = $_POST["name"];
    $age = $_POST["age"];
    $weight = $_POST["weight"];
$breed = $_POST["breed"];
$gender = $_POST["gender"];
$organisation = $_POST["organisation"];
$kci = $_POST["kci"];
$description = $_POST["description"];
    
    if($errors)
    {
        $message = "<div class='alert alert-danger'>" .$errors. "</div>"; 
        echo $message;
    }

        // no errors 
      else
        {
       $age = $link ->real_escape_string($age); 
        $name = $link ->real_escape_string($name);
           $weight = $link ->real_escape_string($weight);
           $breed = $link ->real_escape_string($breed);
        $gender = $link ->real_escape_string($gender);
        $organisation = $link ->real_escape_string($organisation);
        $kci = $link ->real_escape_string($kci);
        $description = $link ->real_escape_string($description);
        $username = $_SESSION['username'];
            
            // verifying existing username
        $sql = "SELECT * FROM dogs WHERE dogname = '$name' AND username = '$username' AND deleted = false";
        if($result = $link ->query($sql))
        {
            if($result->num_rows > 0)
            {
                echo "<div class = 'alert alert-danger'>Your have already enlisted this dog</div>";
            exit;
            }
        }
        else
        {
            echo "<div class = 'alert alert-danger'>Unable to run username query</div>";
            exit;
        }
           $sql = "INSERT INTO dogs (dogname, username, dogage,dogbreed,dogweight,doggender,dogprofilepicture,certification,description,organisation_name,deleted) VALUES ('$name','$username','$age', '$breed', '$weight','$gender','NULL','$kci','$description','$organisation',false)";
            if($link->query($sql))
            {
                        echo "success";
            }
                    else
                    {
                        echo "<div class = 'alert alert-danger'>Unable to add dog.Plz try later</div>";
                        exit;
                    }
                
            }
?>