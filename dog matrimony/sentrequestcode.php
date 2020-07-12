<?php
session_start();
include 'connection.php';
$sentfrom =  $_POST['sentfrom'];
$sentto =  $_POST['sentto'];
$username = $_SESSION['username'];
$time = time();
$addressarray = array();
$coordinates = array();
$addressarray1 = array();
$addressarray2 = array();
$distancearray = array();

function midPoint($lat1,$lon1,$lat2,$lon2)
{
    $lon1 = deg2rad($lon1); 
    $lon2 = deg2rad($lon2); 
    $lat1 = deg2rad($lat1); 
    $lat2 = deg2rad($lat2);  
    $dLon = $lon2 - $lon1; 
    $Bx = cos($lat2) * cos($dLon);
    $By = cos($lat2) * sin($dLon);
    $lat3 = atan2(sin($lat1) + sin($lat2), sqrt((cos($lat1) + $Bx) * (cos($lat1) + $Bx) + $By * $By));
    $lon3 = $lon1 + atan2($By, cos($lat1) + $Bx);
    $midlat = rad2deg($lat3);
    $midlon = rad2deg($lon3);
    return array($midlat,$midlon);
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
function geocode($address)
{
    $url = 'https://api.tomtom.com/search/2/geocode/'.urlencode($address).'.json?limit=1&key=7Ri1Qnoxv2uC1FsDwhRRrml9lG4w7orq';
    // $url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/'.urlencode($address).'.json?access_token=pk.eyJ1Ijoic2Fua2FscDIyMDUiLCJhIjoiY2s3dnNybHpnMGZsZDNtbzJoOTR4cnUyNCJ9.ynkqYPpFLahtphPMTOScaQ&limit=1';
    $obj = json_decode(file_get_contents($url), true);
    $latitude = $obj[results][0][position][lat];
    $longitude = $obj[results][0][position][lon];
    // $longitude = ($obj[features][0][center][0]);
    // $latitude = ($obj[features][0][center][1]);
    // $place = ($obj[features][0][place_name]);
    return array($latitude,$longitude);
}
$sql = "SELECT * FROM affiliates WHERE rateperdog <> 0";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $affiliate_username = $rows['affiliation_username'];
        $address = $rows['affiliation_address'];
        $locality = $rows['affiliation_locality'];
        $city = $rows['affiliation_city'];
        $state = $rows['affiliation_state'];
        $zip = $rows['zip'];
        $address = $locality." ".$city." ".$state." ".$zip;
        $addressarray[$affiliate_username] = $address;
    }
}
$sql = "SELECT * FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto'";
 if($result = $link ->query($sql))
                 {
                        if ($result->num_rows > 0)
                    {
                         while($rows = $result->fetch_array(MYSQLI_ASSOC))
                         {
                             $status = $rows['status'];
                            if($status == 'cancelled')
                            {
                                $sql2 = "DELETE FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto' AND status = 'cancelled'";
                                if(!($result2 = $link ->query($sql2)))
                                {
                                    echo "<div class = 'alert alert-warning'>Unable to delete cancelled row</div>";
                                    exit;
                                }
                            }
                            elseif($status == 'declined')
                            {
                                $sql2 = "DELETE FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto' AND status = 'declined'";
                                if(!($result2 = $link ->query($sql2)))
                                {
                                    echo "<div class = 'alert alert-warning'>Unable to delete cancelled row</div>";
                                    exit;
                                }
                            }
                            else
                            {
                                    echo "<div class = 'alert alert-warning'>You have already sent a request to this dog </div>";
                                    exit;
                            }
                        }
                        
                    }
 }
 $sql = "SELECT * FROM requests WHERE fromdogid = '$sentto' AND todogid = '$sentfrom'";

 if($result = $link ->query($sql))
                 {
                        if ($result->num_rows > 0)
                    {
                        while($rows = $result->fetch_array(MYSQLI_ASSOC))
                        {
                            $status = $rows['status'];
                            if($status == 'cancelled')
                            {
                                $sql2 = "DELETE FROM requests WHERE fromdogid = '$sentto' AND todogid = '$sentfrom' AND status = 'cancelled'";
                                if(!($result2 = $link ->query($sql2)))
                                {
                                    echo "<div class = 'alert alert-warning'>Unable to delete cancelled row</div>";
                                    exit;
                                }
                            }
                            elseif($status == 'declined')
                            {
                                $sql2 = "DELETE FROM requests WHERE fromdogid = '$sentto' AND todogid = '$sentfrom' AND status = 'declined'";
                                if(!($result2 = $link ->query($sql2)))
                                {
                                    echo "<div class = 'alert alert-warning'>Unable to delete cancelled row</div>";
                                    exit;
                                }
                            }
                            else
                            {
                                echo "<div class = 'alert alert-warning'>You have already sent a request to this dog </div>";
                            exit;

                            }
                        }
                        
                    }
 }
else
{
    echo "Something went wrong";
    exit;
}
$sql = "SELECT * FROM dogs NATURAL JOIN users  WHERE dogid = '$sentfrom'";
 if($result = $link ->query($sql))
                 {
                        while($rows = $result->fetch_array(MYSQLI_ASSOC))
                        {
                            $organisation1 = $rows['organisation_name'];
                            $locality1 = $rows['locality'];
                            $city1 = $rows['city'];
                            $state1 = $rows['state'];
                            $address1 = $locality1." ".$city1." ".$state1;
                            if($organisation1 == "None Of These")
                            {
                                $rate1 = 0;
                            }
                            else
                            {
                                $sql2 = "SELECT * FROM affiliates WHERE organisation_name = '$organisation1'";
                                if($result2 = $link ->query($sql2))
                                {
                                    echo $result2->num_rows;
                                    while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $rate1 = $rows2['rateperdog'];
                                    }
                                }
                            }        
                        }
                }
$sql = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentto'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $organisation2 = $rows['organisation_name'];
        $locality2 = $rows['locality'];
        $city2 = $rows['city'];
        $state2 = $rows['state'];
        $address2 = $locality2." ".$city2." ".$state2;
        if($organisation2 == "None Of These")
        {
            $rate2 = 0;
        }
        else
        {
            $sql2 = "SELECT * FROM affiliates WHERE organisation_name = '$organisation2'";
                                if($result2 = $link ->query($sql2))
                                {
                                    while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $rate2 = $rows2['rateperdog'];
                                    }
                                }
        }
    }
}
if($rate1 == 0 && $rate2 == 0)
{
    foreach ($addressarray as $key => $value) {
        list($latitude,$longitude) = geocode($value);
        $coordinates[$key]['latitude'] = $latitude;
        $coordinates[$key]['longitude'] = $longitude;
    }
    list($latitude1,$longitude1) = geocode($address1);
    list($latitude2,$longitude2) = geocode($address2);
    $addressarray1['latitude'] = $latitude1;
    $addressarray2['latitude'] = $latitude2;
    $addressarray1['longitude'] = $longitude1;
    $addressarray2['longitude'] = $longitude2;
    $distance = (twopoints_on_earth( $latitude1, $longitude1,$latitude2,$longitude2));
    list($midlat,$midlon) = midPoint($latitude1,$longitude1,$latitude2,$longitude2);
    foreach ($coordinates as $key => $value) {
        $organisation = $key;
        $lat =  $value[latitude];
        $lon = $value[longitude];
        $distance =twopoints_on_earth($midlat,$midlon,$lat,$lon);
        $distance = $distance * 1.60934;
        $distancearray[$key] = $distance;
    }
    $distance = $distance * 1.6093;
    $dis = 1000000;
    $nearest_organisation = "";
    foreach ($distancearray as $key => $value) {
        if($value < $dis)
        {
            $nearest_organisation = $key;
            $dis = $value;
        }
    }
    echo $nearest_organisation;
    $sql6 = "SELECT * FROM affiliates WHERE affiliation_username = '$nearest_organisation'";
    if($result6 = $link ->query($sql6))
    {
        while($rows6 = $result6->fetch_array(MYSQLI_ASSOC))
        {
            $organisation_handling = $rows6['organisation_name'];                            
        }
    }
}
else
{
    if($rate1 > $rate2)
    {
        $organisation_handling = $organisation1;
    }
    else
    {
        $organisation_handling = $organisation2;
    }
}
$sql = "INSERT INTO requests (fromdogid, todogid, status , appointment_sender , appointment_receiver, organisation_handling)VALUES ('$sentfrom', '$sentto', 'pending' , 'pending' , 'pending', '$organisation_handling')";
if($link ->query($sql))
{
    $sql = "SELECT * FROM requests";
     if($result = $link ->query($sql))
        {
             while($rows = $result->fetch_array(MYSQLI_ASSOC))
             {  
                $sentfrom = $rows['fromdogid']; 
                $sentto = $rows['todogid'];
                $status = $rows['status'];
                 $sql2 = "SELECT * FROM dogs WHERE dogid = '$sentfrom' AND username ='$username'";          
                if($result2 = $link ->query($sql2))
                 {
                    if($result2->num_rows == 1)
                    {
//                     $rows2 = $result2->fetch_array(MYSQLI_ASSOC);
                        $sql4 = "SELECT * FROM dogs WHERE dogid = '$sentfrom'";
                        if($result4 = $link ->query($sql4))
                        {
                            while ($rows4 = $result4->fetch_array(MYSQLI_ASSOC))
                            {
                                $namesentfrom = $rows4['dogname'];
                            }
                        }
                         $sql3 = "SELECT * FROM dogs NATURAL JOIN WHERE dogid = '$sentto'";
                             if($result3 = $link ->query($sql3))
            {           
               while ($rows3 = $result3->fetch_array(MYSQLI_ASSOC))
             
               { $name = $rows3['dogname'];
                $age = $rows3['dogage'];
                $weight = $rows3['dogweight'];
                $breed = $rows3['dogbreed'];
                $gender = $rows3['doggender'];
                $id = $rows3['dogid'];
                $picture = $rows3['dogprofilepicture'];
                $city = $rows3['city'];
                $certification = $rows3['certification'];
                $description = $rows3['description'];
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
                if($result5 = $link ->query($sql5))
                {
                    while ($rows5 = $result5->fetch_array(MYSQLI_ASSOC))
                    {
                        $status = $rows5['status'];
                    }
                }
                echo "Sending";
            if($status=="confirmed")
            {
                echo "Sending";
            }
            else
            {
                echo "Sending";
            }
                             }
        }
                     else
                     {
                         echo "<div class = 'alert alert-warning'>Cannot fetch dog using to query</div>";
                         
                     }
                }
                         
     }
                 else
                     {
                         echo "<div class = 'alert alert-warning'>Cannot fetch dog using from query</div>";
                         
                     }

        }
                 
             }
            else
            {
                echo "<div class = 'alert alert-warning'>Not you fault.Error on our side.We will fix it asap.</div>";
                exit;                           
            }
}
else
{
    echo "<div class = 'alert alert-warning'>Not you fault.Error on our side.We will fix it right away.</div>"; 
}
                     
                 
?>