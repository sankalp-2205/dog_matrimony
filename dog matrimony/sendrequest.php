<?php
session_start();
include 'connection.php';
$dogid =  $_POST['dogid'];
echo $dogid;
$count = 0;
function geocode($address)
{
    $url = 'https://api.tomtom.com/search/2/geocode/'.urlencode($address).'.json?limit=1&key=7Ri1Qnoxv2uC1FsDwhRRrml9lG4w7orq';
    $obj = json_decode(file_get_contents($url), true);
    $latitude = $obj[results][0][position][lat];
    $longitude = $obj[results][0][position][lon];
    return array($latitude,$longitude);
}
function twopoints_on_earth($latitudeFrom, $longitudeFrom, 
$latitudeTo,  $longitudeTo) 
{ 
    $long1 = deg2rad($longitudeFrom); 
    $long2 = deg2rad($longitudeTo); 
    $lat1 = deg2rad($latitudeFrom); 
    $lat2 = deg2rad($latitudeTo);  
    $dlong = $long2 - $long1; 
    $dlati = $lat2 - $lat1; 
    $val = pow(sin($dlati/2),2)+cos($lat1)*cos($lat2)*pow(sin($dlong/2),2); 
    $res = 2 * asin(sqrt($val)); 
    $radius = 3958.756; 
    return ($res*$radius); 
}
$sql = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$dogid' AND deleted = false";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {  
        $username = $rows['username'];      
        $breedgiven = $rows['dogbreed'];
        $gendergiven = $rows['doggender']; 
        $localitygiven = $rows['locality'];
        $citygiven = $rows['city'];
        $stategiven = $rows['state'];
        $addressgiven = $localitygiven." ".$citygiven." ".$stategiven;
        list($latitudegiven,$longitudegiven) = geocode($addressgiven);
    }
}
    $sql = "SELECT * FROM dogs NATURAL JOIN users WHERE username <> '$username' AND deleted = 'false'";
    if($result = $link ->query($sql))
    {
        while($rows = $result->fetch_array(MYSQLI_ASSOC))
            {  
                $gender = $rows['doggender'];
                $breed = $rows['dogbreed'];
                if($breed == $breedgiven && $gender !== $gendergiven)
                {
                    $locality = $rows['locality'];
                    $city = $rows['city'];
                    $state = $rows['state'];
                    $address = $locality." ".$city." ".$state;
                    list($latitude,$longitude) = geocode($address);
                    $distance = (twopoints_on_earth( $latitude, $longitude,  $latitudegiven,  $longitudegiven));
                    $distance = $distance * 1.60934;
                    if($distance < 60)
                    {
                        $distance = round($distance,1);
                        $name = $rows['dogname'];
                        $age = $rows['dogage'];
                        $weight = $rows['dogweight'];
                        $breed = $rows['dogbreed'];
                        $gender = $rows['doggender'];
                        $id = $rows['dogid'];
                        $picture = $rows['dogprofilepicture'];
                        $city = $rows['city'];
                        $certification = $rows['certification'];
                        $description = $rows['description'];
                        if(strlen($description) < 5)
                        {
                            $description = "No description provided";
                        }
                        if($picture == "NULL")
                        {
                            $message = "<img src='profilepicture/dummydog.jpg' alt='dummypic' class='img-circle img-responsive'  width='320' height='320' border='0' style = 'margin : auto;'>";
                            $message1 = "<img src='profilepicture/dummydog.jpg' alt='dummypic' width='140' height='140' border='0' class='img-circle'>";
                        }
                         else
                        {
                            $message = "<img src='$picture' alt='profilepic' class='img-circle img-responsive'  width='320' height='320' border='0' style = 'margin : auto;'>";
                            $message1 = "<img src='$picture' alt='profilepic' width='140' height='140' border='0' class='img-circle'>";
                        }
                        echo "
                            <div class='modal fade' id='myModal_$id' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                            <div class='modal-content'>
                            <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
                            <h4 class='modal-title' id='myModalLabel'>More About $name</h4>
                            </div>
                            <div class='modal-body'>
                            <center>
                            $message1
                            <h3 class='media-heading'>$name <small>$city</small></h3>
                            <hr>
                            <center>
                            <p class='text-left'><strong>Lives in: </strong> $locality,$city
                            </p>
                            <p class='text-left'><strong>Age(in months): </strong> $age
                                </p>
                                <p class='text-left'><strong>Weight(in kg): </strong>
                                $weight.</p>
                                <p class='text-left'><strong>Breed: </strong>
                              $breed.</p>
                                <p class='text-left'><strong>Gender: </strong>
                                $gender.</p>
                                <p class='text-left'><strong>KCI certification: </strong>
                                $certification</p>
                            <p class='text-left'><strong>Description: </strong><br>
                                $description
                            <br>
                            </center>
                        </div>
                        <div class='modal-footer'>
                            <center>
                            <button type='button' class='btn btn-default' data-dismiss='modal'>Know enough about $name</button>
                            </center>
                        </div>
                        </div>
                        </div>
                        </div>";
                        $sql2 = "SELECT * FROM requests WHERE fromdogid = '$dogid' AND todogid = '$id' AND status <> 'declined' AND status <> 'cancelled'";
                        if($result2 = $link ->query($sql2))
                        {
                            if ($result2->num_rows == 0)
                            {
                                $sql3 = "SELECT * FROM requests WHERE fromdogid = '$id' AND todogid = '$dogid' AND status <> 'declined' AND status <> 'cancelled'";
                                if($result3 = $link ->query($sql3))
                                {
                                    if ($result3->num_rows == 0)
                                    {
                                        $count++;
                                        echo "<div class='container'>
                                        <div class='row'>
                                        <div class='col-sm-offset-4 col-sm-7 col-lg-offset-3 col-lg-6'>
                                        <div class='well profile'>
                                         <div class='col-xs-12'>
                                         <div class='col-xs-12 col-sm-8'>
                                         <div id='dogrequestmessage'></div>
                                         <h2>$name</h2>
                                         <p><strong>Breed: </strong> $breed </p>
                                         <p><strong>Weight(in kg): </strong> $weight </p>
                                         <p><strong>Gender: </strong> $gender </p>
                                         <p><strong>Age:(in months): </strong> $age </p>
                                         </div>             
                                         <div class='col-xs-12 col-sm-4 text-center'>
                                             <figure>
                                                 $message
                                             </figure>
                                         </div>
                                         </div>            
                                         <div class='col-xs-12 divider text-center'>
                                         <div class='col-xs-12 col-sm-4 emphasis'>
                                             <button class='btn btn-success btn-block' name = 'sendrequest[$id]' id = 'send_request'><span class='fa fa-plus-circle'></span> Send Request </button>
                                         </div>
                                         <div class='col-xs-12 col-sm-4 emphasis'>
                                         <button type = 'button' class='btn btn-info btn-block' data-toggle='modal' data-target='#myModal_$id' name = 'viewprofile[$id]' id= 'view_profile'><span class='fa fa-user'></span>Profile </button>
                                         </div>
                                         </div>
                                         </div>                 
                                        </div>
                                         </div>
                                         </div>";
                                    }
                                }
                               
                            }
                           
                        }
                        else
                        {
                            echo "<div class = 'alert alert-warning'>Cannot fetch available dogs</div>";
                            exit;
                        }
                    }
                }
            }
        }
        if($count == 0)
        {
            echo "
            <div class='container'>
<div class='row'>
    <div class='col-sm-offset-4 col-sm-7 col-lg-offset-4 col-lg-6'>
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
                <p>Sorry,No match is currently available near you. Plz try after few days </p>
            </div>
        </div>
     </div>                 
    </div>
</div>
</div>";
        }
?>