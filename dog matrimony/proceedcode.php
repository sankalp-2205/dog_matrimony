<?php
session_start();
include 'connection.php';
$sentfrom =  $_POST['sentfrom'];
$sentto =  $_POST['sentto'];
$username = $_SESSION['username'];
echo $sentfrom;
echo $sentto;
$sql = "SELECT * FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto' AND status = 'confirmed'";
if($result = $link ->query($sql))
                 {
                     while($rows = $result->fetch_array(MYSQLI_ASSOC))
                     {
                         $appointment_sender = $rows['appointment_sender'];
                         $appointment_receiver = $rows['appointment_receiver'];
                     }
                        if ($result->num_rows > 0)
                    {
                        $sql2 = "SELECT * FROM dogs WHERE dogid = '$sentfrom' AND username = '$username'";
                        if($result2 = $link ->query($sql2))
                        {
                            if ($result2->num_rows > 0)
                            {
                                //request sent by the logged in user
                                $sql10 = "UPDATE requests SET appointment_sender ='booked' WHERE fromdogid = '$sentfrom' AND todogid = '$sentto' AND appointment_sender <> 'booked'";
                                if($appointment_receiver == 'booked')
                                {
                                    $sql11 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND appointment_date <> 'NULL'";
                                    if($result11 = $link -> query($sql11))
                                    {
                                        if($result11->num_rows > 0)
                                        {
                                            while($rows11 = $result11->fetch_array(MYSQLI_ASSOC))
                                            {
                                                $appointment_date = $rows11['appointment_date'];
                                                $appointment_time = $rows11['appointment_time'];
                                            }
                                            $message = "<p><strong>Appointment Date:<span style = 'color : green'>$appointment_date</span></p><p>Appointment Time::<span style = 'color : green'>$appointment_time</span></p>";
                                        
                                        }
                                        else
                                        {
                                            $message = "<i class='fa fa-check' aria-hidden='true'></i>  Thanks for booking!The other owner has also booked an appointment. <br> Our representative will contact you in next 24 hours.";
                                        }
                                    }
                                    
                                }
                                else
                                {
                                    $message = "<i class='fa fa-check' aria-hidden='true'></i>  Thanks for booking!The other owner is yet to book an appointment. <br> Our representative will contact you as soon as the other owner books an appointment.";
                                }
                                if(!$link -> query($sql10))
                                        {
                                            echo "echo <div class = 'alert alert-warning'> Cannot update appointment_sender</div>";
                                                exit;
                                        }
                                $sql4 = "SELECT * FROM dogs WHERE dogid = '$sentto'";
                                if($result4 = $link ->query($sql4))
                                {
                                    while ($rows4 = $result4->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $usernametoshow = $rows4['username'];
                                    }
                                    $sql5 = "SELECT * FROM users WHERE username = '$usernametoshow'";
                                    if($result5 = $link ->query($sql5))
                                    {
                                        while ($rows5 = $result5->fetch_array(MYSQLI_ASSOC))
                                        {
                                            $name= $rows5['name'];
                                            $email= $rows5['email'];
                                            $contact= $rows5['contact'];
                                            $state= $rows5['state'];
                                            $city= $rows5['city'];
                                            $locality= $rows5['locality'];
                                            $profilepicture =$rows5['profilepicture'];
                                        }
                                        if($profilepicture ==  "NULL")
                                        {
                                            $message1 =   "<a> <img align='left class='fb-image-profile thumbnail' id = 'profile' src='profilepicture/dummy.png' alt='Profile image example'/></a>";
                                        }
                                        else
                                        {
                                            $message1 = "<a> <img align='left' class='fb-image-profile thumbnail' id = 'profile' src='$profilepicture' alt='Profile image example'/></a>";
                                        }
                                    }
                                    else
                                    {
                                        echo "echo <div class = 'alert alert-warning'>Don't fetch user details in case 1</div>";
                                        exit;
                                    }
                                }
                                else
                                {
                                    echo "echo <div class = 'alert alert-warning'>Cannot fetch dog data in case 1</div>";
                                    exit;
                                }
                            }
                            else
                            {
                                $sql3 = "SELECT * FROM dogs WHERE dogid = '$sentto' AND username = '$username'";
                                if($result3 = $link ->query($sql3))
                                {
                                    if ($result3->num_rows > 0)
                                    {
                                        //request sent by the other user
                                            $sql9 = "UPDATE requests SET appointment_receiver ='booked' WHERE fromdogid = '$sentfrom' AND todogid = '$sentto' AND appointment_receiver <> 'booked'";
                                        if($appointment_sender == 'booked')
                                        {
                                            $sql12 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND appointment_date <> 'NULL'";
                                            if($result12 = $link -> query($sql12))
                                            {
                                                if($result12->num_rows > 0)
                                                {
                                                    while($rows12 = $result12->fetch_array(MYSQLI_ASSOC))
                                                    {
                                                        $appointment_date = $rows12['appointment_date'];
                                                        $appointment_time = $rows12['appointment_time'];
                                                    }
                                                    $message = "<p><strong>Appointment Date:<span style = 'color : green'>$appointment_date</span></p><p>Appointment Time::<span style = 'color : green'>$appointment_time</span></p>";
                                                
                                                }
                                                else
                                                {
                                                    $message = "<i class='fa fa-check' aria-hidden='true'></i>  Thanks for booking!The other owner has also booked an appointment. <br> Our representative will contact you in next 24 hours.";
                                                }
                                            }
                                        }
                                        else
                                        {
                                            $message = "<i class='fa fa-check' aria-hidden='true'></i>  Thanks for booking!The other owner is yet to book an appointment. <br> Our representative will contact you as soon as the other owner books an appointment.";
                                        }
                                        if(!$link -> query($sql9))
                                        {
                                            echo "echo <div class = 'alert alert-warning'>Cannot update appointment_receiver</div>";
                                                exit;
                                        }
                                        $sql6 = "SELECT * FROM dogs WHERE dogid = '$sentfrom'";
                                        if($result6 = $link ->query($sql6))
                                        {
                                             while ($rows6 = $result6->fetch_array(MYSQLI_ASSOC))
                                            {
                                                $usernametoshow = $rows6['username'];
                                            }
                                            $sql7 = "SELECT * FROM users WHERE username = '$usernametoshow'";
                                            if($result7 = $link ->query($sql7))
                                            {
                                                while ($rows7 = $result7->fetch_array(MYSQLI_ASSOC))
                                                {
                                                    $name= $rows7['name'];
                                                    $email= $rows7['email'];
                                                    $contact= $rows7['contact'];
                                                    $state= $rows7['state'];
                                                    $city= $rows7['city'];
                                                    $locality= $rows7['locality'];
                                                    $profilepicture = $rows7['profilepicture'];
                                                }
                                                if($profilepicture == "NULL")
                                                {
                                                    $message1 =   "<a> <img align='left class='fb-image-profile thumbnail' id = 'profile' src='profilepicture/dummy.png' alt='Profile image example'/></a>";
                                                }
                                                else
                                                {
                                                    $message1 = "<a> <img align='left' class='fb-image-profile thumbnail' id = 'profile' src='$profilepicture' alt='Profile image example'/></a>";
                                                }
                                            }
                                            else
                                            {
                                                echo "echo <div class = 'alert alert-warning'>Don't fetch user details in case 2</div>";
                                                exit;
                                            }
                                        }
                                        else
                                        {
                                            echo "echo <div class = 'alert alert-warning'>Cannot fetch dog data in case 2</div>";
                                            exit;
                                        }
                                    }
                                    else
                                    {
                                        echo "echo <div class = 'alert alert-warning'>Don't tamper the URL</div>";
                                        exit;
                                    }
                                }
                                else
                                {
                                    echo "echo <div class = 'alert alert-warning'>Cannot run query to compare logged in user with the dogid sentto</div>";
                                    exit;
                                }
                            }

                        }
                        else
                        {
                            echo "echo <div class = 'alert alert-warning'>Cannot run query to compare logged in user with the dogid sentfrom</div>";
                            exit;
                        }
                    }
                    else
                    {
                        echo "echo <div class = 'alert alert-warning'>Match is not confirmed</div>";
                        exit;
                    }
                }
                else
                {
                    echo "echo <div class = 'alert alert-warning'>Cannot run confirmed query</div>";
                    exit;
                }

echo "<div class='fb-profile'>
<img align='left' class='fb-image-lg' src='proceedcover.jpg' alt='Profile image example'/>
<div id = 'dpbox'>
        $message1
        </div>
<div class='fb-profile-text'>
    <h1>$name</h1>
</div>
</div>
<br>

    <div class='container main-secction'>
        <div class='row'>
                <div class='col-md-offset-2 col-md-8 col-xs-12 pull-right profile-right-section'>
                    <div class='row profile-right-section-row'>
                        <div class='col-md-12 profile-header'>
                            <div class='row'>
                                <div class='col-md-8 col-xs-offset-2 col-md-offset-0 col-xs-8  profile-header-section1 pull-left'>
                                    <h1>Owner's Profile</h1>
                                    <br>
                                </div>
                
                            </div>
                        </div>
                        <div class='col-md-12'>
                            <div class='row'>
                                <div class='col-md-8'>
                                <div class='content'>
                                                <div id='profile'>
                                                            <div class='row'>
                                                            <div class='col-md-8 col-xs-offset-2 col-xs-8 col-md-offset-0'>
                                                                    <h4><label>Name: <span style='color: gray';>$name</span></label></h4>
                                                                </div>
                                                            </div>
                            
                                                            <div class='row'>
                                                            <div class='col-md-8 col-xs-offset-2 col-xs-8 col-md-offset-0'>
                                                                    <h4><label>Email: <span style='color: gray';>Hidden</span></label></h4>
                                                                </div>
                                                                </div>
                                                            <div class='row'>
                                                            <div class='col-md-8 col-xs-offset-2 col-xs-8 col-md-offset-0'>
                                                                    <h4><label>Contact: <span style='color: gray';>Hidden</span></h4>
                                                                </div>
                                                                </div>
                                                            
                                                            <div class='row'>
                                                            <div class='col-md-8 col-xs-offset-2 col-xs-8 col-md-offset-0'>
                                                                    <h4><label>State: <span style='color: gray';>$state</span></h4>
                                                                </div>
                                                                </div>
                                                            
                                                            <div class='row'>
                                                            <div class='col-md-8 col-xs-offset-2 col-xs-8 col-md-offset-0'>
                                                                    <h4><label>City: <span style='color: gray';>$city</span></label></h4>
                                                                </div>
                                                                </div>

                                                                <div class='row'>
                                                                <div class='col-md-8 col-xs-offset-2 col-xs-8 col-md-offset-0'>
                                                                        <h4><label>Locality: <span style='color: gray';>$locality</span></label></h4>
                                                                    </div>
                                                                    </div>      
                                                </div>
                                              </div>          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row profile-right-section-row'>
                <div class='col-md-12 profile-header'>
                    <div class='row'>
                        <div class='col-md-8 col-xs-offset-2 col-md-offset-4 col-xs-8  profile-header-section1 pull-left'>
                            <h4 style = 'color : green;'>$message</h4>
                        </div>
        
                    </div>
                </div>
            </div>
        </div>
    </div>";
    $sql = "SELECT * FROM users NATURAL JOIN dogs WHERE dogs.dogid = $sentfrom;";
    if($result = $link ->query($sql))
    {
        while ($rows = $result->fetch_array(MYSQLI_ASSOC))
        {
            $dognamef= $rows['dogname'];
            $breedf= $rows['dogbreed'];
            $weightf= $rows['dogweight'];
            $genderf= $rows['doggender'];
            $agef= $rows['dogage'];
            $organisationnamef = $rows['organisation_name'];
            $picturef = $rows['dogprofilepicture'];
            if($picturef == "NULL")
            {
                $messagef = "<img src='profilepicture/dummydog.jpg' alt='dummypic' class='img-circle img-responsive'  width='320' height='320' border='0' style = 'margin : auto;'>";
                $message1f = "<img src='profilepicture/dummydog.jpg' alt='dummypic' width='140' height='140' border='0' class='img-circle'>";
            }
            else
            {
               $messagef = "<img src='$picturef' alt='profilepic' class='img-circle img-responsive'  width='320' height='320' border='0' style = 'margin : auto;'>";
               $message1f = "<img src='$picturef' alt='profilepic' width='140' height='140' border='0' class='img-circle'>";
            }
        }
    }
    else
    {
        echo "echo <div class = 'alert alert-warning'>Cannot fetch details of dog sent from</div>";
                    exit;
    }
    $sql = "SELECT * FROM users NATURAL JOIN dogs WHERE dogs.dogid = $sentto;";
    if($result = $link ->query($sql))
    {
        while ($rows = $result->fetch_array(MYSQLI_ASSOC))
        {
            $dognamet= $rows['dogname'];
            $breedt= $rows['dogbreed'];
            $weightt= $rows['dogweight'];
            $gendert= $rows['doggender'];
            $aget= $rows['dogage'];
            $organisationnamet = $rows['organisation_name'];
            $picturet = $rows['dogprofilepicture'];
            if($picturet == "NULL")
            {
                $messaget = "<img src='profilepicture/dummydog.jpg' alt='dummypic' class='img-circle img-responsive'  width='320' height='320' border='0' style = 'margin : auto;'>";
                $message1t = "<img src='profilepicture/dummydog.jpg' alt='dummypic' width='140' height='140' border='0' class='img-circle'>";
            }
            else
            {
               $messaget = "<img src='$picturet' alt='profilepic' class='img-circle img-responsive'  width='320' height='320' border='0' style = 'margin : auto;'>";
               $message1t = "<img src='$picturet' alt='profilepic' width='140' height='140' border='0' class='img-circle'>";
            }
        }
    }
    else
    {
        echo "echo <div class = 'alert alert-warning'>Cannot fetch details of dog sent to</div>";
                    exit;
    }

    // if($organisationnamef !== 'None Of These' && $organisationnamet !== 'None Of These')
    // {
    //     $sql = "SELECT * FROM affiliates WHERE organisation_name = '$organisationnamef'";
    //     if($result= $link ->query($sql))
    //     {
    //         while ($rows = $result->fetch_array(MYSQLI_ASSOC))
    //         {
    //             $contact1 = $rows['affiliation_contact'];
    //             $state1 = $rows['affiliation_state'];
    //             $city1 = $rows['affiliation_city'];
    //             $locality1 = $rows['affiliation_locality'];
    //             $address1 = $rows['affiliation_address'];
    //             $rate1 = $rows['rateperdog'];
    //         }
    //     }
    //     else
    //     {
    //         echo "echo <div class = 'alert alert-warning'>Cannot run 'organisation_from' </div>";
    //         exit;
    //     }
    //     $sql = "SELECT * FROM affiliates WHERE organisation_name = '$organisationnamet'";
    //     if($result= $link ->query($sql))
    //     {
    //         while ($rows = $result->fetch_array(MYSQLI_ASSOC))
    //         {
    //             $contact2 = $rows['affiliation_contact'];
    //             $state2 = $rows['affiliation_state'];
    //             $city2 = $rows['affiliation_city'];
    //             $locality2 = $rows['affiliation_locality'];
    //             $address2 = $rows['affiliation_address'];
    //             $rate2 = $rows['rateperdog'];
    //         }
    //     }
    //     else
    //     {
    //         echo "echo <div class = 'alert alert-warning'>Cannot run 'organisation_to' </div>";
    //         exit;
    //     }
    //     if($rate1 >= $rate2)
    //     {
    //         $contact = $contact1; $state = $state1; $city = $city1; $locality = $locality1; $address = $address1 ;$organisation = $organisationnamef; 
    //     }
    //     else
    //     {
    //         $contact = $contact2; $state = $state2; $city = $city2; $locality = $locality2; $address = $address2; $organisation = $organisationnamet; 
    //     }
    // }
    // elseif($organisationnamef !== 'None Of These')
    // {
    //     $sql = "SELECT * FROM affiliates WHERE organisation_name = '$organisationnamef'";
    //     if($result= $link ->query($sql))
    //     {   
    //         while ($rows = $result->fetch_array(MYSQLI_ASSOC))
    //         {
    //             $contact = $rows['affiliation_contact'];
    //             $state = $rows['affiliation_state'];
    //             $city = $rows['affiliation_city'];
    //             $locality = $rows['affiliation_locality'];
    //             $address = $rows['affiliation_address'];
    //             $rate = $rows['rateperdog'];
    //             $organisation = $organisationnamef;
    //             $zip = $rows['zip'];
    //         }
            
    //     }
    //     else
    //     {
    //         echo "echo <div class = 'alert alert-warning'>Cannot run 'organisation_to' </div>";
    //         exit;
    //     }
    // }
    // elseif($organisationnamet !== 'None Of These')
    // {
    //     $sql = "SELECT * FROM affiliates WHERE organisation_name = '$organisationnamet'";
    //     if($result= $link ->query($sql))
    //     {
    //         while ($rows = $result->fetch_array(MYSQLI_ASSOC))
    //         {
    //             $contact = $rows['affiliation_contact'];
    //             $state = $rows['affiliation_state'];
    //             $city = $rows['affiliation_city'];
    //             $locality = $rows['affiliation_locality'];
    //             $address = $rows['affiliation_address'];
    //             $rate = $rows['rateperdog'];
    //             $organisation = $organisationnamet;
    //             $zip = $rows['zip'];
    //         }
    //     }
    //     else
    //     {
    //         echo "echo <div class = 'alert alert-warning'>Cannot run 'organisation_to' </div>";
    //         exit;
    //     }

    // }
    // if($organisationnamef == "None Of These" && $organisationnamet == "None Of These")
        $sql = "SELECT * FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto' AND status = 'confirmed'";
        if($result= $link ->query($sql))
        {
            while ($rows = $result->fetch_array(MYSQLI_ASSOC))
            {
                $organisation_handling = $rows['organisation_handling'];
                echo $organisation_handling;
            }
        }
            $sql = "SELECT * FROM affiliates WHERE organisation_name = '$organisation_handling'";
            if($result= $link ->query($sql))
            {
                while ($rows = $result->fetch_array(MYSQLI_ASSOC))
                {
                    $contact = $rows['affiliation_contact'];
                    $state = $rows['affiliation_state'];
                    $city = $rows['affiliation_city'];
                    $locality = $rows['affiliation_locality'];
                    $address = $rows['affiliation_address'];
                    $rate = $rows['rateperdog'];
                    $zip = $rows['zip'];
                    $organisation = $organisation_handling;
                }
            }    
    echo "
        <div class='row' style = 'margin-bottom: 60px;'>
            <div class='col-xs-offset-1 col-xs-10 col-sm-5 '>
             <div class='well profile'>
                <div class='col-xs-12'>
                    <div class='col-xs-12 col-sm-8'; style= 'text-align : justify'>
                        <div id='dogrequestmessage'></div>
                        <p><strong>Sent From: </strong> $dognamef </p>
                        <p><strong>Breed: </strong> $breedf </p>
                        <p><strong>Weight(in kg): </strong> $weightf </p>
                        <p><strong>Gender: </strong> $genderf </p>
                        <p><strong>Age:(in months): </strong> $agef </p>
                    </div>             
                    <div class='col-xs-12 col-sm-4 text-center'>
                        <figure>
                            $messagef
                        </figure>
                    </div>
                </div>            
             </div>                 
            </div>
            <div class='col-sm-5 col-xs-offset-1 col-xs-10 col-sm-offset-0'>
             <div class='well profile'>
                <div class='col-xs-12'>
                    <div class='col-xs-12 col-sm-8'>
                        <div id='dogrequestmessage'></div>
                        <p><strong>Sent To: </strong> $dognamet </p>
                        <p><strong>Breed: </strong> $breedt </p>
                        <p><strong>Weight(in kg): </strong> $weightt </p>
                        <p><strong>Gender: </strong> $gendert </p>
                        <p><strong>Age:(in months): </strong> $aget </p>
                    </div>             
                    <div class='col-xs-12 col-sm-4 text-center'>
                        <figure>
                            $messaget
                        </figure>
                    </div>
                </div>            
             </div>                 
        </div>
        </div>
        </div>";

      
      echo  "<div class='container' style = 'margin-botton: 70px;'>
<h1>Appointment Address</h1><br>
	<div class='row text-center'>
    <div class='col-xs-12 second-box'>
        <h1><span class='glyphicon glyphicon-home'></span></h1>
        <h3>Location</h3>
        <p><strong>$organisation</strong></p>
        <p>$address</p>
        <p>$locality</p>
        <p>$city</p>
        <p>$state $zip</p>
    </div>
	</div>
</div>
</div>
<br>
<br>";





?>