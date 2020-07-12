<?php
session_start();
include 'connection.php';
$username = $_SESSION['username'];
$sql = "SELECT * FROM affiliates WHERE affiliation_username = '$username'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {  
        $organisation_name = $rows['organisation_name'];
    }
}
$sql = "SELECT * FROM dogs NATURAL JOIN users WHERE organisation_name = '$organisation_name' AND deleted = false";
if($result = $link ->query($sql))
{
    if($result->num_rows > 0)
    {
        while($rows = $result->fetch_array(MYSQLI_ASSOC))
        {     
                        $dogid = $rows['dogid'];
                        $dogname = $rows['dogname'];
                        $dogage = $rows['dogage'];
                        $dogbreed = $rows['dogbreed'];
                        $dogweight = $rows['dogweight'];
                        $dogprofilepicture = $rows['dogprofilepicture'];
                        $doggender = $rows['doggender'];
                        $certification = $rows['certification'];
                        $description = $rows['description'];
                        $name = $rows['name'];
                        $state = $rows['state'];
                        $city = $rows['city'];
                        $locality = $rows['locality'];
                        $contact = $rows['contact'];
                        $email = $rows['email'];
                        if($dogprofilepicture == "NULL")
                        {
                            $dogpic =  "<img src='profilepicture/dummydog.jpg' alt = 'dummy dog picture'>";
                        }
                        else
                        {
                            $dogpic = "<img src='$dogprofilepicture' alt = 'dog profile picture'>";
                        }
echo  "<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'>
<div class='container profile-page' >
    <div class='row'>
        <div class='col-md-12'>
            <div class='card profile-header'>
                <div class='body'>
                    <div class='row'>
                        <div class='col-xs-offset-4 col-md-offset-0 col-lg-4 col-md-4 col-12'>
                            <div class='profile-image float-md-right'> $dogpic </div>
                        </div>
                        <div class='col-lg-8 col-md-8 col-sm-8 col-12'>
                            <h2 class='m-t-0 m-b-0'><strong>$dogname</strong></h2>
                            <p><strong>$dogbreed</strong></p>
                            <p><i class='fa fa-address-book'></i><strong>Owner Name: </strong>$name</p>
                            <p><i class='fa fa-phone' aria-hidden='true'></i><strong>Contact: </strong>$contact</p>
                            <p><i class='fas fa-envelope'></i></i><strong>Email: </strong>$email</p>
                            <p><i class='fas fa-weight'></i><strong>Weight(in kg): </strong>$dogweight</p>
                            <p><i class='fas fa-birthday-cake'></i><strong>Age(in months): </strong>$dogage</p>
                            <p><i class='fas fa-venus-mars'></i><strong>Gender: </strong>$doggender</p>
                            <p><i class='fa fa-certificate' aria-hidden='true'></i><strong>KCI Certification:</strong>$certification</p>
                            <p><i class='fas fa-info-circle'></i><strong>Description: </strong>$description</p>
                            <p><i class='fas fa-map-marker-alt'></i><strong>Lives In: </strong>$locality, $city, $state</p>
                        </div>                
                    </div>
                </div>                    
            </div>
        </div>
        
        
	</div>
</div>";
                    }
                }
                else
            {
                echo "<div class='container'>
                <div class='row'>
                    <div class='col-sm-offset-4 col-sm-7 col-lg-offset-3 col-lg-6'>
                     <div class='well profile' style = 'background-color: transparent; border-color: transparent;'>
                        <div class='col-xs-12'>
                            <div class='col-xs-12 col-sm-8'>
                            </div>             
                            <div class='col-xs-12 text-center'>
                                <figure>
                                    <img src='noresponse.jpg' alt='' class='img-square img-responsive'>
                                </figure>
                            </div>
                        </div>            
                        <div class='col-xs-12 divider text-center'>
                            <div class='col-xs-12 emphasis'>
                                <p>You do not have any dog listed</p>
                            </div>
                        </div>
                     </div>                 
                    </div>
                </div>
            </div>";
            }
        }
        else
        {
            echo "Cannot run affiliates query";
        }
?>