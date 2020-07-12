<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['adminusername'];
$dogcard = "";
$count = 0;
$sql = "SELECT * FROM dogs NATURAL JOIN users WHERE deleted = false ORDER BY dogname";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    { 
                $dogid = $rows['dogid'];
                $username = $rows['username'];
                $name = $rows['name'];
                $contact = $rows['contact'];
                $email = $rows['email'];
                $locality = $rows['locality'];
                $city = $rows['city'];
                $state = $rows['state'];
                $address = $locality.' '.$city.' '.$state;
                $dogname = $rows['dogname'];
                $dogage = $rows['dogage'];
                $dogbreed = $rows['dogbreed'];
                $dogweight = $rows['dogweight'];
                $doggender = $rows['doggender'];
                $certification = $rows['certification'];
                $description = $rows['description'];
                $organisation_name = $rows['organisation_name'];
                if($organisation_name == "None Of These")
                {
                    $organisation_name = "No Organisation";
                }
                
        $dogcard .="<div class='card'>
    <div class='card-header blue lighten-3 z-depth-1' role='tab' id='heading".$dogid."'>
      <h5 class='text-uppercase mb-0 py-1'>
        <a class='white-text font-weight-bold ' data-toggle='collapse' href='#collapse".$dogid."' aria-expanded='true'
          aria-controls='collapse".$dogid."'>
          $dogname($name)
        </a>
      </h5>
    </div>
    <div id='collapse".$dogid."' class='collapse' role='tabpanel' aria-labelledby='heading".$dogid."'
      data-parent='#accordionEx23'>
      <div class='card-body'>
      <div class='row my-4'>
      <div class='col-md-8'>
        <h2 class='font-weight-bold mb-3 black-text'>$dogname</h2>
        <div class='row'>
    <div class='col-sm-12'>
    <div class='single category'>
    <h3 class='side-title'>Profile</h3>
    <ul class='list-unstyled'>
        <li style = 'text-transform: uppercase;'><a href='' title=''>Name: <span class='pull-right'>$dogname</span></a></li>
        <li><a href='' title=''>OWNER NAME:<span class='pull-right'>$name</span></a></li>
        <li><a href='' title=''>EMAIL:<span class='pull-right'>$email</span></a></li>
        <li style = 'text-transform: uppercase;'><a href='' title=''>Contact: <span class='pull-right'>$contact</span></a></li>
        <li style = 'text-transform: uppercase;'><a href='' title=''>Address: <span class='pull-right'>$address</span></a></li>
        <li style = 'text-transform: uppercase;'><a href='' title=''>Dog Breed: <span class='pull-right'>$dogbreed</span></a></li>
        <li style = 'text-transform: uppercase;'><a href='' title=''>Dog Age(in months): <span class='pull-right'>$dogage</span></a></li>
        <li style = 'text-transform: uppercase;'><a href='' title=''>Dog Weight(in Kg): <span class='pull-right'>$dogweight</span></a></li>
        <li style = 'text-transform: uppercase;'><a href='' title=''>Dog Gender: <span class='pull-right'>$doggender</span></a></li>
        <li style = 'text-transform: uppercase;'><a href='' title=''>Organisation: <span class='pull-right'>$organisation_name</span></a></li>
        <li style = 'text-transform: uppercase;'><a href='' title=''>Certification: <span class='pull-right'>$certification</span></a></li>
        <li style = 'text-transform: uppercase;'><a href='' title=''>Description: <span class='pull-right'>$description</span></a></li>
    </ul>
</div>
</div> 
</div>
      </div>
    </div>
    </div>
    </div>";

    }

}

echo "<div class='container-fluid'>
<div class='accordion md-accordion accordion-1' id='accordionEx23' role='tablist'>
  $dogcard
</div>
        </div>";
?>

