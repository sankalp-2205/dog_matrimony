<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
$sql = "SELECT * FROM affiliates";
$i = 0;
$addressarray = array();
$confirmationtime = "";
$deadline = "";
$bookingtime = "";
$first_booking_time = "";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    { 
        $locality = $rows['affiliation_locality'];
        $city = $rows['affiliation_city'];
        $state = $rows['affiliation_state'];
        $address = $locality.' '.$city.' '.$state;
        $addressarray[] = $address;
    }
}
$sql = "SELECT * FROM affiliates WHERE affiliation_username = '$username'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {  
        $organisation_name = $rows['organisation_name'];
        $category = $rows['category'];
    }
}
else
{
    echo "Cannot fetch organisation name";
    exit;
}
if($category !== "bronze")
{
$sql = "SELECT * FROM dogs WHERE organisation_name = '$organisation_name'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {  
        $dogid = $rows['dogid'];
        $sql2 = "SELECT * FROM requests WHERE (fromdogid = '$dogid' OR todogid = '$dogid') AND status = 'confirmed' ORDER BY time DESC";
        if($result2 = $link ->query($sql2))
        { 
            if($result2->num_rows > 0)
            {
                while ($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                {
                    $sentfrom = $rows2['fromdogid']; 
                    $sentto = $rows2['todogid'];
                    $appointment_sender = $rows2['appointment_sender'];
                    $appointment_receiver = $rows2['appointment_receiver'];
                    $organisation_handling = $rows2['organisation_handling'];
                $sql3 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentfrom'";
                if($result3 = $link ->query($sql3))
                {
                    while ($rows3 = $result3->fetch_array(MYSQLI_ASSOC))
                    {
                        $dogid1 = $rows3['dogid'];
                        $dogname1 = $rows3['dogname'];
                        $dogage1 = $rows3['dogage'];
                        $dogbreed1 = $rows3['dogbreed'];
                        $dogweight1 = $rows3['dogweight'];
                        $dogprofilepicture1 = $rows3['dogprofilepicture'];
                        $doggender1 = $rows3['doggender'];
                        $certification1 = $rows3['certification'];
                        $description1 = $rows3['description'];
                        $name1 = $rows3['name'];
                        $state1 = $rows3['state'];
                        $city1 = $rows3['city'];
                        $zip1 = $rows3['zip'];
                        $profilepicture1 = $rows3['profilepicture'];
                        $locality1 = $rows3['locality'];
                        $organisation_name1 = $rows3['organisation_name'];
                        if($profilepicture1 == "NULL")
                        {
                            $picture1 = "<img src='profilepicture/dummy.png' alt='dummypic>";
                        }
                        else
                        {
                            $picture1 = "<img src='$profilepicture1' alt='profilepic>";
                        }
                        if($dogprofilepicture1 == "NULL")
                        {
                            $modalpic1 =  "<img src='profilepicture/dummydog.jpg' width='60' height='60' border='0' class='img-circle'>";
                        }
                        else
                        {
                            $modalpic1 =  $picturemodal1 = "<img src='$dogprofilepicture1' width='60' height='60' border='0' class='img-circle'>";
                        }
                    }
                }
                $sql3 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentto'";
                if($result3 = $link ->query($sql3))
                {
                    while ($rows3 = $result3->fetch_array(MYSQLI_ASSOC))
                    {
                        $dogid2 = $rows3['dogid'];
                        $dogname2 = $rows3['dogname'];
                        $dogage2 = $rows3['dogage'];
                        $dogbreed2 = $rows3['dogbreed'];
                        $dogweight2 = $rows3['dogweight'];
                        $dogprofilepicture2 = $rows3['dogprofilepicture'];
                        $doggender2 = $rows3['doggender'];
                        $certification2 = $rows3['certification'];
                        $description2 = $rows3['description'];
                        $name2 = $rows3['name'];
                        $state2 = $rows3['state'];
                        $city2 = $rows3['city'];
                        $zip2 = $rows3['zip'];
                        $profilepicture2 = $rows3['profilepicture'];
                        $locality2 = $rows3['locality'];
                        $organisation_name2 = $rows3['organisation_name'];
                        if($profilepicture2 == "NULL")
                        {
                            $picture2 = "<img src='profilepicture/dummy.png' alt='dummypic>";
                        }
                        else
                        {
                            $picture2 = "<img src='$profilepicture2' alt='profilepic>";
                        }
                        if($dogprofilepicture2 == "NULL")
                        {
                            $modalpic2 =  "<img src='profilepicture/dummydog.jpg' width='60' height='60' border='0' class='img-circle'>";
                        }
                        else
                        {
                            $modalpic2 = "<img src='$dogprofilepicture2' width='60' height='60' border='0' class='img-circle'>";
                        }
                    }
                }
                    $sql6 = "SELECT * FROM appointments WHERE sentfrom = '$dogid1' AND sentto = '$dogid2' AND organisation_name = '$organisation_name' AND appointment_date <> 'NULL'";
                    if($result6 = $link ->query($sql6))
                    {
                        if($result6->num_rows == 1)
                        {
                            $bookedbyloggedinorganisation = true;
                            $bookedbyotherorganisation = false;
                        }
                        else
                        {
                            $sql6 = "SELECT * FROM appointments WHERE sentfrom = '$dogid1' AND sentto = '$dogid2' AND organisation_name <> '$organisation_name' AND appointment_date <> 'NULL'";
                             if($result6 = $link ->query($sql6))
                            {
                                 if($result6->num_rows == 1)
                                {
                                    $bookedbyotherorganisation = true;
                                    $bookedbyloggedinorganisation = false;
                                }
                                else
                                {
                                    $bookedbyotherorganisation = false;
                                    $bookedbyloggedinorganisation = false;
                                }
                            }
                        }
                    }
                    if($organisation_name1 !== "None Of These" && $organisation_name2!== "None Of These")
                    {
                        $sql4 = "SELECT * FROM affiliates WHERE organisation_name = '$organisation_name1'";
                        if($result4 = $link ->query($sql4))
                        { 
                                while ($rows4 = $result4->fetch_array(MYSQLI_ASSOC))
                                {
                                    $rateperdog1 = $rows4['rateperdog'];
                                }
                        }
                        $sql5 = "SELECT * FROM affiliates WHERE organisation_name = '$organisation_name2'";
                        if($result5 = $link ->query($sql5))
                        { 
                                while ($rows5 = $result5->fetch_array(MYSQLI_ASSOC))
                                {
                                    $rateperdog2 = $rows5['rateperdog'];
                                }
                        }
                        if($organisation_name == $organisation_name1 && $rateperdog1 >= $rateperdog2)
                        {
                            if($appointment_receiver == 'booked' && $appointment_sender == 'booked')
                            {
                                $sql8 = "SELECT * FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto'";
                                if($result8 = $link ->query($sql8))
                                { 
                                    while ($rows8 = $result8->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $time = $rows8['time'];
                                        $time = strtotime("$time");
                                        $timeinindia = $time + (34200);
                                        $deadline = $timeinindia + (86400);
                                        $confirmationtime = date('d-m-Y H:i:s', $timeinindia);
                                        $deadline = date('d-m-Y H:i:s', $deadline);
                                    }
                                }
                                    $sql9 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND appointment_date <> 'NULL'";
                                    if($result9 = $link ->query($sql9))
                                    {
                                        if($result9->num_rows > 0)
                                        {
                                            while ($rows9 = $result9->fetch_array(MYSQLI_ASSOC))
                                            {
                                                $booking_time = $rows9['booking_clicking_time'];
                                                $first_booking_time = $rows9['first_booking_time'];
                                            } 
                                        }
                                    }
                                if($bookedbyloggedinorganisation == 'true')
                                {
                                    $button = "<button type = 'button' style = 'border: 2px solid #4CAF50;' id = 'meeting' name = 'meeting[$dogid1][$dogid2]' class='btn btn-dark btn-lg disabled' disabled>Scheduled</button>";
                                }
                                else
                                {
                                    $button = "<button type = 'button' id = 'meeting' name = 'meeting[$dogid1][$dogid2]' class='btn btn-success btn-lg'>Create Meeting</button>";
                                }
                            }
                            else
                            {
                                $button = "<button type = 'button' id = 'meeting' name = 'meeting[$dogid1][$dogid2]' class='btn btn-success btn-lg disabled' disabled>Create Meeting</button>";
                            }
                        }
                        else if($organisation_name == $organisation_name1 && $rateperdog1 < $rateperdog2)
                        {
                            if($appointment_receiver == 'booked' && $appointment_sender == 'booked')
                            {
                                $sql8 = "SELECT * FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto'";
                                if($result8 = $link ->query($sql8))
                                { 
                                    while ($rows8 = $result8->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $time = $rows8['time'];
                                        $time = strtotime("$time");
                                        $timeinindia = $time + (34200);
                                        $deadline = $timeinindia + (86400);
                                        $confirmationtime = date('d-m-Y H:i:s', $timeinindia);
                                        $deadline = date('d-m-Y H:i:s', $deadline);
                                    }
                                }
                                $sql9 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND appointment_date <> 'NULL'";
                                if($result9 = $link ->query($sql9))
                                {
                                    if($result9->num_rows > 0)
                                    {
                                        while ($rows9 = $result9->fetch_array(MYSQLI_ASSOC))
                                        {
                                            $booking_time = $rows9['booking_clicking_time'];
                                            $first_booking_time = $rows9['first_booking_time'];
                                        } 
                                    }
                                }
                            }
                            if($bookedbyotherorganisation == 'true')
                            {
                                $button = "<p style = 'color : green;'>The meeting of this match has been created </p>";
                            }
                            else
                            {
                                $button = "<p>You cannot create meeting for this match</p>";
                            }
                        }
                        else if($organisation_name == $organisation_name2 && $rateperdog1 >= $rateperdog2 )
                        {
                            if($appointment_receiver == 'booked' && $appointment_sender == 'booked')
                            {
                                $sql8 = "SELECT * FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto'";
                                if($result8 = $link ->query($sql8))
                                { 
                                    while ($rows8 = $result8->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $time = $rows8['time'];
                                        $time = strtotime("$time");
                                        $timeinindia = $time + (34200);
                                        $deadline = $timeinindia + (86400);
                                        $confirmationtime = date('d-m-Y H:i:s', $timeinindia);
                                        $deadline = date('d-m-Y H:i:s', $deadline);
                                    }
                                }
                                $sql9 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND appointment_date <> 'NULL'";
                                if($result9 = $link ->query($sql9))
                                {
                                    if($result9->num_rows > 0)
                                    {
                                        while ($rows9 = $result9->fetch_array(MYSQLI_ASSOC))
                                        {
                                            $booking_time = $rows9['booking_clicking_time'];
                                            $first_booking_time = $rows9['first_booking_time'];
                                        } 
                                    }
                                }
                            if($bookedbyotherorganisation == 'true')
                            {
                                $button = "<p style = 'color : green;'>The meeting of this match has been created </p>";
                            }
                            else
                            {
                                $button = "<p>You cannot create meeting for this match</p>";
                            }
                        }
                    }
                    
                        else if($organisation_name == $organisation_name2 && $rateperdog1 < $rateperdog2)
                        {
                            if($appointment_receiver == 'booked' && $appointment_sender == 'booked')
                            {
                                $sql8 = "SELECT * FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto'";
                                if($result8 = $link ->query($sql8))
                                { 
                                    while ($rows8 = $result8->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $time = $rows8['time'];
                                        $time = strtotime("$time");
                                        $timeinindia = $time + (34200);
                                        $deadline = $timeinindia + (86400);
                                        $confirmationtime = date('d-m-Y H:i:s', $timeinindia);
                                        $deadline = date('d-m-Y H:i:s', $deadline);
                                    }
                                }
                                $sql9 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND appointment_date <> 'NULL'";
                                if($result9 = $link ->query($sql9))
                                {
                                    if($result9->num_rows > 0)
                                    {
                                        while ($rows9 = $result9->fetch_array(MYSQLI_ASSOC))
                                        {
                                            $booking_time = $rows9['booking_clicking_time'];
                                            $first_booking_time = $rows9['first_booking_time'];
                                        } 
                                    }
                                }
                                if($bookedbyloggedinorganisation == 'true')
                                {
                                    $button = "<button type = 'button' style = 'border: 2px solid #4CAF50;' id = 'meeting' name = 'meeting[$dogid1][$dogid2]' class='btn btn-dark btn-lg disabled' disabled>Scheduled</button>";
                                }
                                else
                                {
                                    $button = "<button type = 'button' id = 'meeting' name = 'meeting[$dogid1][$dogid2]' class='btn btn-success btn-lg'>Create Meeting</button>";
                                }
                            }
                            else
                            {
                                $button = "<button type = 'button' id = 'meeting' name = 'meeting[$dogid1][$dogid2]' class='btn btn-success btn-lg disabled' disabled>Create Meeting</button>";
                            }
                        }
                    }
                    
                     else
                     {
                        if($appointment_receiver == 'booked' && $appointment_sender == 'booked')
                        {
                            $sql8 = "SELECT * FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto'";
                            if($result8 = $link ->query($sql8))
                            { 
                                while ($rows8 = $result8->fetch_array(MYSQLI_ASSOC))
                                {
                                    $time = $rows8['time'];
                                    $time = strtotime("$time");
                                    $timeinindia = $time + (34200);
                                    $deadline = $timeinindia + (86400);
                                    $confirmationtime = date('d-m-Y H:i:s', $timeinindia);
                                    $deadline = date('d-m-Y H:i:s', $deadline);
                                }
                            }
                            $sql9 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND appointment_date <> 'NULL'";
                            if($result9 = $link ->query($sql9))
                            {
                                if($result9->num_rows > 0)
                                {
                                    while ($rows9 = $result9->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $booking_time = $rows9['booking_clicking_time'];
                                        $first_booking_time = $rows9['first_booking_time'];
                                    } 
                                }
                            }
                            if($bookedbyloggedinorganisation == 'true')
                                {
                                    $button = "<button type = 'button' style = 'border: 2px solid #4CAF50;' id = 'meeting' name = 'meeting[$dogid1][$dogid2]' class='btn btn-dark btn-lg disabled' disabled>Scheduled</button>";
                                }
                                else
                                {
                                    $button = "<button type = 'button' id = 'meeting' name = 'meeting[$dogid1][$dogid2]' class='btn btn-success btn-lg'>Create Meeting</button>";
                                }
                        }
                        else
                        {
                            $button = "<button type = 'button' id = 'meeting' name = 'meeting[$dogid1][$dogid2]' class='btn btn-success btn-lg disabled' disabled>Create Meeting</button>";
                        }
                     }
                     if(strlen($confirmationtime) == 0 || ($confirmationtime == "01-01-1970 15:00:00") )
                     {
                        $confirmationtime = "--/--";
                        $deadline = "--/--";
                     }
                     if(strlen($booking_time) == 0)
                     {
                        $booking_time = "--/--";
                     }
                     else
                     {
                        $booking_time = strtotime("$booking_time");
                        $first_booking_time = strtotime("$first_booking_time");
                        $booking_time= $booking_time + (34200);
                        $first_booking_time= $first_booking_time + (34200);
                        $booking_time = date('d-m-Y H:i:s', $booking_time);
                        $first_booking_time = date('d-m-Y H:i:s', $first_booking_time);
                        if(strtotime("$booking_time") == 34200)
                        {
                            $booking_time = "--/--";
                        }
                        else
                        {
                            if(strtotime("$first_booking_time") > strtotime("$deadline"))
                            {
                                if($first_booking_time !== $booking_time)
                                {
                                    $booking_time = "<span style = 'color : red';><strong>$booking_time(Rescheduled)</strong></span>";
                                }
                                else
                                {
                                    $booking_time = "<span style = 'color : red';><strong>$booking_time</strong></span>";
                                }
                            }
                            else
                            {
                                if($first_booking_time !== $booking_time)
                                {
                                    $booking_time = "<span style = 'color : green';><strong>$booking_time(Rescheduled)</strong></span>";
                                }
                                else
                                {
                                    $booking_time = "<span style = 'color : green';><strong>$booking_time</strong></span>";
                                }

                            }
                        }
                     }
                    echo "<div class='modal fade' id='myModal_$dogid1' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
                                <h4 class='modal-title' id='myModalLabel'>Know About $dogname1</h4>
                                </div>
                            <div class='modal-body'>
                                <center>
                                $modalpic1
                                <h3 class='media-heading'>$dogname1</h3>
                                <hr>
                                <center>
                                <p class='text-left'><strong>Age(in months): </strong> $dogage1
                                    </p>
                                    <p class='text-left'><strong>Weight(in kg): </strong>
                                    $dogweight1.</p>
                                    <p class='text-left'><strong>Breed: </strong>
                                  $dogbreed1.</p>
                                    <p class='text-left'><strong>Gender: </strong>
                                    $doggender1.</p>
                                    <p class='text-left'><strong>KCI certification: </strong>
                                    $certification1</p>
                                <p class='text-left'><strong>Description: </strong><br>
                                    $description1
                                <br>
                                </center>
                            </div>
                            <div class='modal-footer'>
                                <center>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Know enough about $dogname1</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='modal fade' id='myModal_$dogid2' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
                                <h4 class='modal-title' id='myModalLabel'>More About $dogname2</h4>
                                </div>
                            <div class='modal-body'>
                                <center>
                                $modalpic2
                                <h3 class='media-heading'>$dogname2</h3>
                                <hr>
                                <center>
                                <p class='text-left'><strong>Age(in months): </strong> $dogage2
                                    </p>
                                    <p class='text-left'><strong>Weight(in kg): </strong>
                                    $dogweight2.</p>
                                    <p class='text-left'><strong>Breed: </strong>
                                  $dogbreed2.</p>
                                    <p class='text-left'><strong>Gender: </strong>
                                    $doggender2.</p>
                                    <p class='text-left'><strong>KCI certification: </strong>
                                    $certification2</p>
                                <p class='text-left'><strong>Description: </strong><br>
                                    $description2
                                <br>
                                </center>
                            </div>
                            <div class='modal-footer'>
                                <center>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Know enough about $dogname2</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            <div class='container' style = 'margin-top : 30px; margin-bottom: 50px;'>
               <div style='border: 2px solid black'  class='row userMain'>
            <br>
            <div class='col-xs-6'>
                <div class='userBlock'>
                    <div class='backgrounImg'>
                        <img src='https://preview.ibb.co/miQjb7/photography4.jpg'>
                    </div>
                    <div class='userImg'>
                        $picture1
                    </div>
                    <div class='userDescription'>
                        <h5>$name1</h5>
                        <p>$locality1, $city1</p>
                        <p>Pet: $dogname1</p>
                        <p>$dogbreed1</p>
                        <p>$doggender1</p>
                        
                         <div class='followrs'>
                             <span id='status'>$appointment_sender</span>
                         </div>
                             <button type = 'button' class='btn bt-block' data-toggle='modal' data-target='#myModal_$dogid1'>View Profile</button>
                    </div>
                   
                </div>
            </div>
            <div class='col-xs-6'>
                <div class='userBlock'>
                    <div class='backgrounImg'>
                        <img src='https://preview.ibb.co/cqEz9S/photography3.jpg'>
                    </div>
                    <div class='userImg'>
                        $picture2
                    </div>
                    <div class='userDescription'>
                        <h5>$name2</h5>
                        <p>$locality2, $city2</p>
                        <p>Pet:$dogname2</p>
                        <p>$dogbreed2</p>
                        <p>$doggender2</p>
                        
                        
                        <div class='followrs'>
                             <span id='status'>$appointment_receiver</span>
                         </div>
                             <button  class='btn' data-toggle = 'modal' data-target = '#myModal_$dogid2'>View Profile</button>
                    </div>
                  
                </div>
            </div>
            <div class = 'text-center'>
            $button
            <br>
            <br>
            <p><strong>Confirmed At:</strong> $confirmationtime </p>
            <p><strong>Deadline :</strong> $deadline </p>
            <p><strong>Booked At :</strong> $booking_time</p>            
             </div>
             <br>
             </div>
            </div>";
            }
        }
        else
        {
            echo "No confirmed matches";
        }
    }
            
        else
        {
            echo "Cannot fetch request";
            exit;
        }
    }
}
    else
        {
            echo "Cannot fetch dogs";
            exit;
        }
        echo "here";
        $sql2 = "SELECT * FROM requests WHERE status = 'confirmed' AND organisation_handling = '$organisation_name' ORDER BY time DESC";
        if($result2 = $link ->query($sql2))
        {
            echo "here";
                while ($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                {
                    $bookedbyloggedinorganisation = false;
                    $sentfrom = $rows2['fromdogid']; 
                    $sentto = $rows2['todogid'];
                    $appointment_sender = $rows2['appointment_sender'];
                    $appointment_receiver = $rows2['appointment_receiver'];
                    $sql = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid= '$sentfrom'";
                    if($result = $link ->query($sql))
                    {
                        while($rows = $result->fetch_array(MYSQLI_ASSOC))
                        { 
                            $dogid1 = $rows['dogid'];
                            $dogname1 = $rows['dogname'];
                            $dogage1 = $rows['dogage'];
                            $dogbreed1 = $rows['dogbreed'];
                            $dogweight1 = $rows['dogweight'];
                            $dogprofilepicture1 = $rows['dogprofilepicture'];
                            $doggender1 = $rows['doggender'];
                            $certification1 = $rows['certification'];
                            $description1 = $rows['description'];
                            $name1 = $rows['name'];
                            $state1 = $rows['state'];
                            $city1 = $rows['city'];
                            $zip1 = $rows['zip'];
                            $profilepicture1 = $rows['profilepicture'];
                            $locality1 = $rows['locality'];
                            $organisation_name1 = $rows['organisation_name'];
                            $sql11 = "SELECT * FROM affiliates WHERE organisation_name = '$organisation_name1'";
                            if($result11 = $link ->query($sql11))
                            {
                                while ($rows11 = $result11->fetch_array(MYSQLI_ASSOC))
                                {
                                    $category1 = $rows11['category'];

                                }
                            }
                            if($profilepicture1 == "NULL")
                            {
                                $picture1 = "<img src='profilepicture/dummy.png' alt='dummypic>";
                            }
                            else
                            {
                                $picture1 = "<img src='$profilepicture1' alt='profilepic>";
                            }
                            if($dogprofilepicture1 == "NULL")
                            {
                                $modalpic1 =  "<img src='profilepicture/dummydog.jpg' width='60' height='60' border='0' class='img-circle'>";
                            }
                            else
                            {
                                $modalpic1 = "<img src='$dogprofilepicture1' width='60' height='60' border='0' class='img-circle'>";
                            }
                        }
                    }
                    $sql = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid= '$sentto'";
                    if($result = $link ->query($sql))
                    {
                        while($rows = $result->fetch_array(MYSQLI_ASSOC))
                        {  
                            $dogid2 = $rows['dogid'];
                            $dogname2 = $rows['dogname'];
                            $dogage2 = $rows['dogage'];
                            $dogbreed2 = $rows['dogbreed'];
                            $dogweight2 = $rows['dogweight'];
                            $dogprofilepicture2 = $rows['dogprofilepicture'];
                            $doggender2 = $rows['doggender'];
                            $certification2 = $rows['certification'];
                            $description2 = $rows['description'];
                            $name2 = $rows['name'];
                            $state2 = $rows['state'];
                            $city2 = $rows['city'];
                            $zip2 = $rows['zip'];
                            $profilepicture2 = $rows['profilepicture'];
                            $locality2 = $rows['locality'];
                            $organisation_name2 = $rows['organisation_name'];
                            $sql11 = "SELECT * FROM affiliates WHERE organisation_name = '$organisation_name2'";
                            if($result11 = $link ->query($sql11))
                            {
                                while ($rows11 = $result11->fetch_array(MYSQLI_ASSOC))
                                {
                                    $category2 = $rows11['category'];

                                }
                            }
                            if($profilepicture2 == "NULL")
                            {
                                $picture2 = "<img src='profilepicture/dummy.png' alt='dummypic>";
                            }
                            else
                            {
                                $picture2 = "<img src='$profilepicture2' alt='profilepic>";
                            }
                            if($dogprofilepicture2 == "NULL")
                            {
                                $modalpic2 =  "<img src='profilepicture/dummydog.jpg' width='60' height='60' border='0' class='img-circle'>";
                            }
                            else
                            {
                                $modalpic2 = "<img src='$dogprofilepicture2' width='60' height='60' border='0' class='img-circle'>";
                            }
                        }
                    }
                    if(($organisation_name1 == 'None Of These' && $organisation_name2 == 'None Of These') || ($organisation_name1 == 'None Of These' && $category2 == 'bronze') || ($category1 == 'bronze' && $category2 == 'bronze') || ($category1 == 'bronze' && $organisation_name2 == 'None Of These') )
                    {
                        $address1 = $locality1.' '.$city1.' '.$state1.' '.$zip1;
                        $address2 = $locality2.' '.$city2.' '.$state2.' '.$zip2;
                            echo "here";
                            $sql10 = "SELECT * FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto'";
                            if($result10 = $link ->query($sql10))
                            { 
                                while ($rows10 = $result10->fetch_array(MYSQLI_ASSOC))
                                {
                                    $nearest_organisation = $rows10['organisation_handling'];
                                }
                            }
                            if($organisation_name == $nearest_organisation)
                            {
                                if($appointment_receiver == 'booked' && $appointment_sender == 'booked')
                                {
                                    $sql8 = "SELECT * FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto'";
                                    if($result8 = $link ->query($sql8))
                                     { 
                                        while ($rows8 = $result8->fetch_array(MYSQLI_ASSOC))
                                        {
                                            $time = $rows8['time'];
                                            $time = strtotime("$time");
                                            $timeinindia = $time + (34200);
                                            $deadline = $timeinindia + (86400);
                                            $confirmationtime = date('d-m-Y H:i:s', $timeinindia);
                                            $deadline = date('d-m-Y H:i:s', $deadline);
                                        }
                                    }
                                    $sql9 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND appointment_date <> 'NULL'";
                                    if($result9 = $link ->query($sql9))
                                    {
                                        if($result9->num_rows > 0)
                                        {
                                            while ($rows9 = $result9->fetch_array(MYSQLI_ASSOC))
                                            {
                                                $booking_time = $rows9['booking_clicking_time'];
                                                $first_booking_time = $rows9['first_booking_time'];
                                            } 
                                        }
                                    }
                                    $sql6 = "SELECT * FROM appointments WHERE sentfrom = '$dogid1' AND sentto = '$dogid2' AND organisation_name = '$organisation_name' AND appointment_date <> 'NULL'";
                                    if($result6 = $link ->query($sql6))
                                    {
                                        if($result6->num_rows == 1)
                                        {
                                            $bookedbyloggedinorganisation = true;
                                        }
                                    }
                                    if($bookedbyloggedinorganisation == 'true')
                                    {
                                        $button = "<button type = 'button' style = 'border: 2px solid #4CAF50;' id = 'meeting' name = 'meeting[$dogid1][$dogid2]' class='btn btn-dark btn-lg disabled' disabled>Scheduled</button>";
                                    }
                                    else
                                    {
                                         $button = "<button type = 'button' id = 'meeting' name = 'meeting[$dogid1][$dogid2]' class='btn btn-success btn-lg'>Create Meeting</button>";
                                    }
                                }
                            else
                            {
                                $confirmationtime = "--/--";
                                $deadline = "--/--";
                                $booking_time = "--/--";
                                 $button = "<button type = 'button' id = 'meeting' name = 'meeting[$dogid1][$dogid2]' class='btn btn-success btn-lg disabled' disabled>Create Meeting</button>";
                            }
                            if(strlen($confirmationtime) == 0 || ($confirmationtime == "01-01-1970 15:00:00") )
                     {
                        $confirmationtime = "--/--";
                        $deadline = "--/--";
                     }
                     if(strlen($booking_time) == 0)
                     {
                        $booking_time = "--/--";
                     }
                     else
                     {
                        $booking_time = strtotime("$booking_time");
                        $first_booking_time = strtotime("$first_booking_time");
                        $booking_time= $booking_time + (34200);
                        $first_booking_time= $first_booking_time + (34200);
                        $booking_time = date('d-m-Y H:i:s', $booking_time);
                        $first_booking_time = date('d-m-Y H:i:s', $first_booking_time);
                        if(strtotime("$booking_time") == 34200)
                        {
                            $booking_time = "--/--";
                        }
                        else
                        {
                            if(strtotime("$first_booking_time") > strtotime("$deadline"))
                            {
                                if($first_booking_time !== $booking_time)
                                {
                                    $booking_time = "<span style = 'color : red';><strong>$booking_time(Rescheduled)</strong></span>";
                                }
                                else
                                {
                                    $booking_time = "<span style = 'color : red';><strong>$booking_time</strong></span>";
                                }
                            }
                            else
                            {
                                if($first_booking_time !== $booking_time)
                                {
                                    $booking_time = "<span style = 'color : green';><strong>$booking_time(Rescheduled)</strong></span>";
                                }
                                else
                                {
                                    $booking_time = "<span style = 'color : green';><strong>$booking_time</strong></span>";
                                }

                            }
                        }
                     }
                            echo "<div class='modal fade' id='myModal_$dogid1' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
                                        <h4 class='modal-title' id='myModalLabel'>Know About $dogname1</h4>
                                        </div>
                                    <div class='modal-body'>
                                        <center>
                                        $modalpic1
                                        <h3 class='media-heading'>$dogname1</h3>
                                        <hr>
                                        <center>
                                        <p class='text-left'><strong>Age(in months): </strong> $dogage1
                                            </p>
                                            <p class='text-left'><strong>Weight(in kg): </strong>
                                            $dogweight1.</p>
                                            <p class='text-left'><strong>Breed: </strong>
                                          $dogbreed1.</p>
                                            <p class='text-left'><strong>Gender: </strong>
                                            $doggender1.</p>
                                            <p class='text-left'><strong>KCI certification: </strong>
                                            $certification1</p>
                                        <p class='text-left'><strong>Description: </strong><br>
                                            $description1
                                        <br>
                                        </center>
                                    </div>
                                    <div class='modal-footer'>
                                        <center>
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Know enough about $dogname1</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='modal fade' id='myModal_$dogid2' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
                                        <h4 class='modal-title' id='myModalLabel'>More About $dogname2</h4>
                                        </div>
                                    <div class='modal-body'>
                                        <center>
                                        $modalpic2
                                        <h3 class='media-heading'>$dogname2</h3>
                                        <hr>
                                        <center>
                                        <p class='text-left'><strong>Age(in months): </strong> $dogage2
                                            </p>
                                            <p class='text-left'><strong>Weight(in kg): </strong>
                                            $dogweight2.</p>
                                            <p class='text-left'><strong>Breed: </strong>
                                          $dogbreed2.</p>
                                            <p class='text-left'><strong>Gender: </strong>
                                            $doggender2.</p>
                                            <p class='text-left'><strong>KCI certification: </strong>
                                            $certification2</p>
                                        <p class='text-left'><strong>Description: </strong><br>
                                            $description2
                                        <br>
                                        </center>
                                    </div>
                                    <div class='modal-footer'>
                                        <center>
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Know enough about $dogname2</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class='container' style = 'margin-top : 30px; margin-bottom: 50px;'>
                       <div style='border: 2px solid black'  class='row userMain'>
                    <br>
                    <div class='col-xs-6'>
                        <div class='userBlock'>
                            <div class='backgrounImg'>
                                <img src='https://preview.ibb.co/miQjb7/photography4.jpg'>
                            </div>
                            <div class='userImg'>
                                $picture1
                            </div>
                            <div class='userDescription'>
                                <h5>$name1</h5>
                                <p>$locality1, $city1</p>
                                <p>Pet: $dogname1</p>
                                <p>$dogbreed1</p>
                                <p>$doggender1</p>
                                
                                 <div class='followrs'>
                                     <span id='status'>$appointment_sender</span>
                                 </div>
                                     <button type = 'button' class='btn bt-block' data-toggle='modal' data-target='#myModal_$dogid1'>View Profile</button>
                            </div>
                           
                        </div>
                    </div>
                    <div class='col-xs-6'>
                        <div class='userBlock'>
                            <div class='backgrounImg'>
                                <img src='https://preview.ibb.co/cqEz9S/photography3.jpg'>
                            </div>
                            <div class='userImg'>
                                $picture2
                            </div>
                            <div class='userDescription'>
                                <h5>$name2</h5>
                                <p>$locality2, $city2</p>
                                <p>Pet:$dogname2</p>
                                <p>$dogbreed2</p>
                                <p>$doggender2</p>
                                
                                
                                <div class='followrs'>
                                     <span id='status'>$appointment_receiver</span>
                                 </div>
                                     <button  class='btn' data-toggle = 'modal' data-target = '#myModal_$dogid2'>View Profile</button>
                            </div>
                          
                        </div>
                    </div>
                    <div class = 'text-center'>
                    $button
                    <br>
                    <br>
                    <p><strong>Confirmed At:</strong> $confirmationtime </p>
                    <p><strong>Deadline :</strong> $deadline </p>
                    <p><strong>Booked At :</strong> $booking_time</p>            
                     </div>
                     <br>
                     </div>
                    </div>";
                    }
                }
            }
        }
    }
    else
    {
        $count = 0;
        $sql = "SELECT * FROM dogs WHERE organisation_name = '$organisation_name'";
        if($result = $link ->query($sql))
        {
            while($rows = $result->fetch_array(MYSQLI_ASSOC))
            {  
                $dogid = $rows['dogid'];
                $sql2 = "SELECT * FROM requests WHERE (fromdogid = '$dogid' OR todogid = '$dogid') AND status = 'confirmed' ORDER BY time DESC";
                if($result2 = $link ->query($sql2))
                {        
                    if($result2->num_rows > 0)
                    {
                        $count++;
                        while ($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                        {
                            $sentfrom = $rows2['fromdogid']; 
                            $sentto = $rows2['todogid'];
                            $appointment_sender = $rows2['appointment_sender'];
                            $appointment_receiver = $rows2['appointment_receiver'];
                            $organisation_handling = $rows2['organisation_handling'];
                            $sql3 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentfrom'";
                            if($result3 = $link ->query($sql3))
                            {
                                while ($rows3 = $result3->fetch_array(MYSQLI_ASSOC))
                                {
                                    $dogid1 = $rows3['dogid'];
                                    $dogname1 = $rows3['dogname'];
                                    $dogage1 = $rows3['dogage'];
                                    $dogbreed1 = $rows3['dogbreed'];
                                    $dogweight1 = $rows3['dogweight'];
                                    $dogprofilepicture1 = $rows3['dogprofilepicture'];
                                    $doggender1 = $rows3['doggender'];
                                    $certification1 = $rows3['certification'];
                                    $description1 = $rows3['description'];
                                    $name1 = $rows3['name'];
                                    $state1 = $rows3['state'];
                                    $city1 = $rows3['city'];
                                    $zip1 = $rows3['zip'];
                                    $profilepicture1 = $rows3['profilepicture'];
                                    $locality1 = $rows3['locality'];
                                    $organisation_name1 = $rows3['organisation_name'];
                                    if($profilepicture1 == "NULL")
                                    {
                                        $picture1 = "<img src='profilepicture/dummy.png' alt='dummypic>";
                                    }
                                    else
                                    {
                                        $picture1 = "<img src='$profilepicture1' alt='profilepic>";
                                    }
                                    if($dogprofilepicture1 == "NULL")
                                    {
                                        $modalpic1 =  "<img src='profilepicture/dummydog.jpg' width='60' height='60' border='0' class='img-circle'>";
                                    }
                                    else
                                    {
                                        $modalpic1 =  $picturemodal1 = "<img src='$dogprofilepicture1' width='60' height='60' border='0' class='img-circle'>";
                                    }   
                                }
                            }
                            $sql3 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentto'";
                            if($result3 = $link ->query($sql3))
                            {
                                while ($rows3 = $result3->fetch_array(MYSQLI_ASSOC))
                                {
                                    $dogid2 = $rows3['dogid'];
                                    $dogname2 = $rows3['dogname'];
                                    $dogage2 = $rows3['dogage'];
                                    $dogbreed2 = $rows3['dogbreed'];
                                    $dogweight2 = $rows3['dogweight'];
                                    $dogprofilepicture2 = $rows3['dogprofilepicture'];
                                    $doggender2 = $rows3['doggender'];
                                    $certification2 = $rows3['certification'];
                                    $description2 = $rows3['description'];
                                    $name2 = $rows3['name'];
                                    $state2 = $rows3['state'];
                                    $city2 = $rows3['city'];
                                    $zip2 = $rows3['zip'];
                                    $profilepicture2 = $rows3['profilepicture'];
                                    $locality2 = $rows3['locality'];
                                    $organisation_name2 = $rows3['organisation_name'];
                                    if($profilepicture2 == "NULL")
                                    {
                                        $picture2 = "<img src='profilepicture/dummy.png' alt='dummypic>";
                                    }
                                     else
                                    {
                                        $picture2 = "<img src='$profilepicture2' alt='profilepic>";
                                    }
                                    if($dogprofilepicture2 == "NULL")
                                    {
                                        $modalpic2 =  "<img src='profilepicture/dummydog.jpg' width='60' height='60' border='0' class='img-circle'>";
                                    }
                                    else
                                    {
                                        $modalpic2 = "<img src='$dogprofilepicture2' width='60' height='60' border='0' class='img-circle'>";
                                    }
                                }
                            }
                            echo "Here";
                            $sql6 = "SELECT * FROM appointments WHERE sentfrom = '$dogid1' AND sentto = '$dogid2' AND appointment_date <> 'NULL'";
                            if($result6 = $link ->query($sql6))
                            {
                                if($result6->num_rows == 1)
                                {
                                    $appointmentbooked = true;
                                    while ($rows6 = $result6->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $report = $rows6['report_generated'];
                                    }
                                    if($report == false)
                                    {
                                        $button = "<p style = 'color : green;'>The meeting for this match has been created </p>";
                                    }
                                    else
                                    {
                                        $button = "<p>Meeting Complete. Report Generated </p>";
                                    }
                                }
                                else
                                {
                                    $appointmentbooked = false;
                                    if($appointment_receiver == 'booked' && $appointment_sender == 'booked')
                                    {
                                        $button = "<p style = 'color : green;'>The match is confirmed .You will be notified once the meeting is created for this match </p>";
                                    }
                                    else
                                    {
                                        $button = "<p style = 'color : green;'>This match is yet to be proceeded by the owners. </p>";
                                    }              
                                }
                            }
                            if($appointment_receiver == 'booked' && $appointment_sender == 'booked')
                            {
                                $sql8 = "SELECT * FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto'";
                                if($result8 = $link ->query($sql8))
                                { 
                                    while ($rows8 = $result8->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $time = $rows8['time'];
                                        $time = strtotime("$time");
                                        $timeinindia = $time + (34200);
                                        $deadline = $timeinindia + (86400);
                                        $confirmationtime = date('d-m-Y H:i:s', $timeinindia);
                                        $deadline = date('d-m-Y H:i:s', $deadline);
                                    }
                                }
                                $sql9 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND appointment_date <> 'NULL'";
                                if($result9 = $link ->query($sql9))
                                {
                                    if($result9->num_rows > 0)
                                    {
                                        while ($rows9 = $result9->fetch_array(MYSQLI_ASSOC))
                                        {
                                            $booking_time = $rows9['booking_clicking_time'];
                                            $first_booking_time = $rows9['first_booking_time'];
                                        } 
                                    }
                                }
                                if(strlen($booking_time) == 0)
                                {
                                    $booking_time = "--/--";
                                }
                                else
                                {
                                    $booking_time = strtotime("$booking_time");
                                    $first_booking_time = strtotime("$first_booking_time");
                                    $booking_time= $booking_time + (34200);
                                    $first_booking_time= $first_booking_time + (34200);
                                    $booking_time = date('d-m-Y H:i:s', $booking_time);
                                    $first_booking_time = date('d-m-Y H:i:s', $first_booking_time);
                                    if(strtotime("$booking_time") == 34200)
                                    {
                                        $booking_time = "--/--";
                                    }
                                    else
                                    {
                                        if(strtotime("$first_booking_time") > strtotime("$deadline"))
                                        {
                                            if($first_booking_time !== $booking_time)
                                            {
                                                $booking_time = "<span style = 'color : red';><strong>$booking_time(Rescheduled)</strong></span>";
                                            }
                                            else
                                            {
                                                $booking_time = "<span style = 'color : red';><strong>$booking_time</strong></span>";
                                            }
                                        }
                                        else
                                        {
                                            if($first_booking_time !== $booking_time)
                                            {
                                                $booking_time = "<span style = 'color : green';><strong>$booking_time(Rescheduled)</strong></span>";
                                            }
                                            else
                                            {
                                                $booking_time = "<span style = 'color : green';><strong>$booking_time</strong></span>";
                                            }
                                        }
                                    }
                                }

                            }
                            else
                            {
                                    $confirmationtime = "--/--";
                                    $deadline = "--/--";
                                    $booking_time = "--/--";
                            }
                        echo "<div class='modal fade' id='myModal_$dogid1' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
                                    <h4 class='modal-title' id='myModalLabel'>Know About $dogname1</h4>
                                    </div>
                                <div class='modal-body'>
                                    <center>
                                    $modalpic1
                                    <h3 class='media-heading'>$dogname1</h3>
                                    <hr>
                                    <center>
                                    <p class='text-left'><strong>Age(in months): </strong> $dogage1
                                        </p>
                                        <p class='text-left'><strong>Weight(in kg): </strong>
                                        $dogweight1.</p>
                                        <p class='text-left'><strong>Breed: </strong>
                                      $dogbreed1.</p>
                                        <p class='text-left'><strong>Gender: </strong>
                                        $doggender1.</p>
                                        <p class='text-left'><strong>KCI certification: </strong>
                                        $certification1</p>
                                    <p class='text-left'><strong>Description: </strong><br>
                                        $description1
                                    <br>
                                    </center>
                                </div>
                                <div class='modal-footer'>
                                    <center>
                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Know enough about $dogname1</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='modal fade' id='myModal_$dogid2' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
                                    <h4 class='modal-title' id='myModalLabel'>More About $dogname2</h4>
                                    </div>
                                <div class='modal-body'>
                                    <center>
                                    $modalpic2
                                    <h3 class='media-heading'>$dogname2</h3>
                                    <hr>
                                    <center>
                                    <p class='text-left'><strong>Age(in months): </strong> $dogage2
                                        </p>
                                        <p class='text-left'><strong>Weight(in kg): </strong>
                                        $dogweight2.</p>
                                        <p class='text-left'><strong>Breed: </strong>
                                      $dogbreed2.</p>
                                        <p class='text-left'><strong>Gender: </strong>
                                        $doggender2.</p>
                                        <p class='text-left'><strong>KCI certification: </strong>
                                        $certification2</p>
                                    <p class='text-left'><strong>Description: </strong><br>
                                        $description2
                                    <br>
                                    </center>
                                </div>
                                <div class='modal-footer'>
                                    <center>
                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Know enough about $dogname2</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class='container' style = 'margin-top : 30px; margin-bottom: 50px;'>
                   <div style='border: 2px solid black'  class='row userMain'>
                <br>
                <div class='col-xs-6'>
                    <div class='userBlock'>
                        <div class='backgrounImg'>
                            <img src='https://preview.ibb.co/miQjb7/photography4.jpg'>
                        </div>
                        <div class='userImg'>
                            $picture1
                        </div>
                        <div class='userDescription'>
                            <h5>$name1</h5>
                            <p>$locality1, $city1</p>
                            <p>Pet: $dogname1</p>
                            <p>$dogbreed1</p>
                            <p>$doggender1</p>
                            
                             <div class='followrs'>
                                 <span id='status'>$appointment_sender</span>
                             </div>
                                 <button type = 'button' class='btn bt-block' data-toggle='modal' data-target='#myModal_$dogid1'>View Profile</button>
                        </div>
                       
                    </div>
                </div>
                <div class='col-xs-6'>
                    <div class='userBlock'>
                        <div class='backgrounImg'>
                            <img src='https://preview.ibb.co/cqEz9S/photography3.jpg'>
                        </div>
                        <div class='userImg'>
                            $picture2
                        </div>
                        <div class='userDescription'>
                            <h5>$name2</h5>
                            <p>$locality2, $city2</p>
                            <p>Pet:$dogname2</p>
                            <p>$dogbreed2</p>
                            <p>$doggender2</p>
                            
                            
                            <div class='followrs'>
                                 <span id='status'>$appointment_receiver</span>
                             </div>
                                 <button  class='btn' data-toggle = 'modal' data-target = '#myModal_$dogid2'>View Profile</button>
                        </div>
                      
                    </div>
                </div>
                <div class = 'text-center'>
                $button
                <br>
                <br>
                <p><strong>Confirmed At:</strong> $confirmationtime </p>
                <p><strong>Deadline :</strong> $deadline </p>  
                <p><strong>Booking Time :</strong> $booking_time </p>       
                 </div>
                 <br>
                 </div>
                </div>";
                        }
                    }
                }
            }
        }
        if($count == 0)
        {
            echo "No confirmed matches";
        }   
    }
    
?>