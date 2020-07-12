<?php
session_start();
include 'connection.php';
$sentfrom =  $_POST['sentfrom'];
$sentto =  $_POST['sentto'];
$username = $_SESSION['username'];
$sql = "SELECT * FROM affiliates WHERE affiliation_username = '$username'";

if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {  
        $organisation_name = $rows['organisation_name'];
    }
}
else
{
    echo "Cannot fetch organisation name";
    exit;
}
$sql = "SELECT * FROM requests WHERE fromdogid = '$sentfrom' AND todogid = '$sentto' AND status = 'confirmed' AND appointment_sender = 'booked' AND appointment_receiver = 'booked' AND organisation_handling = '$organisation_name'";
if($result = $link ->query($sql))
{
    if ($result->num_rows == 0)
        {
            echo "failure";
            exit;
        }
}
$sql = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND appointment_date <> 'NULL'";
if($result = $link ->query($sql))
{
    if ($result->num_rows > 0)
    {
        echo "failure";
        exit;
    }
}
else
{
    echo "Cannot run appointments query";
}
$sql = "DELETE FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$sentto' AND contact_viewed = true AND organisation_name = '$organisation_name' AND appointment_date = 'NULL'";
if(!($result = $link ->query($sql)))
{
    echo "Cannot delete data from appointments table";
    exit;
}
$sql = "INSERT INTO appointments (sentfrom,sentto,contact_viewed ,organisation_name,appointment_date,appointment_time,first_booking_time,report_generated) VALUES ('$sentfrom','$sentto', true, '$organisation_name','NULL','NULL','NULL',false)";
if(!($result = $link ->query($sql)))
{
    echo "Cannot insert data in appointments table";
    exit;
}
$sql3 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentfrom'";
if($result3 = $link ->query($sql3))
{
    while ($rows3 = $result3->fetch_array(MYSQLI_ASSOC))
    {
        $dogid1 = $rows3['dogid'];
        $dogname1 = $rows3['dogname'];
        $dogbreed1 = $rows3['dogbreed'];
        $doggender1 = $rows3['doggender'];
        $name1 = $rows3['name'];
        $state1 = $rows3['state'];
        $city1 = $rows3['city'];
        $contact1 = $rows3['contact'];
        $email1 = $rows3['email'];
        $profilepicture1 = $rows3['profilepicture'];
        $locality1 = $rows3['locality'];
        $organisation_name1 = $rows3['organisation_name'];
        if($profilepicture1 == "NULL")
        {
            $picture1 = "<img alt='User Pic' src='https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg' id='profile-image1' class='img-circle img-responsive'>";
        }
        else
        {
            $picture1 = "<img alt='User Pic' src='$profilepicture1' id='profile-image1' class='img-circle img-responsive'> ";
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
        $dogbreed2 = $rows3['dogbreed'];
        $doggender2 = $rows3['doggender'];
        $name2 = $rows3['name'];
        $state2 = $rows3['state'];
        $city2 = $rows3['city'];
        $contact2 = $rows3['contact'];
        $email2 = $rows3['email'];
        $profilepicture2 = $rows3['profilepicture'];
        $locality2 = $rows3['locality'];
        $organisation_name1 = $rows3['organisation_name'];
        if($profilepicture2 == "NULL")
        {
            $picture2 = "<img alt='User Pic' src='https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg' id='profile-image1' class='img-circle img-responsive'> ";
        }
        else
        {
            $picture2 = "<img alt='User Pic' src='$profilepicture2' id='profile-image1' class='img-circle img-responsive'> ";
        }
    }
}
echo "<div class='container'>
	<div class='row' >  
       <div class=' col-md-6'>
<div class='panel panel-default' style = 'margin-top: 30px;'>
  <div class='panel-heading'>  <h4 >Owner Profile</h4></div>
   <div class='panel-body'> 
    <div class='box box-info'>
            <div class='box-body'>
                     <div class='col-sm-6'>
                     <div  align='center'> $picture1
                <input id='profile-image-upload' class='hidden' type='file'>          
                     </div>
              <br>
            </div>
            <div class='col-sm-6'>
            <h4 style='color:#00b1b1;'>$name1 </h4></span>
              <span><p>Owner 1</p></span>            
            </div>
            <div class='clearfix'></div>
            <hr style='margin:5px 0 5px 0;'>           
<div class='col-sm-5 col-xs-6 tital ' >Name:</div><div class='col-sm-7'>$name1</div>
     <div class='clearfix'></div>
<div class='bot-border'></div>
<div class='col-sm-5 col-xs-6 tital ' >Contact:</div><div class='col-sm-7'>$contact1</div>
  <div class='clearfix'></div>
<div class='bot-border'></div>
<div class='col-sm-5 col-xs-6 tital ' >Email:</div><div class='col-sm-7'>$email1</div>
  <div class='clearfix'></div>
<div class='bot-border'></div>
<div class='col-sm-5 col-xs-6 tital ' >Address:</div><div class='col-sm-7'> $locality1, $city1</div>
  <div class='clearfix'></div>
<div class='bot-border'></div>
<div class='col-sm-5 col-xs-6 tital ' >Pet Name:</div><div class='col-sm-7'>$dogname1</div>
  <div class='clearfix'></div>
<div class='bot-border'></div>
<div class='col-sm-5 col-xs-6 tital ' >About Dog:</div><div class='col-sm-7'>$dogbreed1,$doggender1</div>
  <div class='clearfix'></div>
<div class='bot-border'></div>
          </div>
        </div>
</div>
</div>
       
</div>  
<div class='col-md-6'>

<div class='panel panel-default' style = 'margin-top: 30px;'>
  <div class='panel-heading'>  <h4 >Owner Profile</h4></div>
   <div class='panel-body'>
       
    <div class='box box-info'>
        
            <div class='box-body'>
                     <div class='col-sm-6'>
                     <div  align='center'> $picture2
                     </div>              
              <br>
    
            
            </div>
            <div class='col-sm-6'>
            <h4 style='color:#00b1b1;'>$name2 </h4></span>
              <span><p>Owner 2</p></span>            
            </div>
            <div class='clearfix'></div>
            <hr style='margin:5px 0 5px 0;'>
    
              
<div class='col-sm-5 col-xs-6 tital ' >Name:</div><div class='col-sm-7'>$name2</div>
     <div class='clearfix'></div>
<div class='bot-border'></div>

<div class='col-sm-5 col-xs-6 tital ' >Contact:</div><div class='col-sm-7'>$contact2</div>
  <div class='clearfix'></div>
<div class='bot-border'></div>

<div class='col-sm-5 col-xs-6 tital ' >Email:</div><div class='col-sm-7'>$email2</div>
  <div class='clearfix'></div>
<div class='bot-border'></div>

<div class='col-sm-5 col-xs-6 tital ' >Address:</div><div class='col-sm-7'> $locality2, $city2</div>
  <div class='clearfix'></div>
<div class='bot-border'></div>

<div class='col-sm-5 col-xs-6 tital ' >Pet Name:</div><div class='col-sm-7'>$dogname2</div>

  <div class='clearfix'></div>
<div class='bot-border'></div>

<div class='col-sm-5 col-xs-6 tital ' >About Dog:</div><div class='col-sm-7'>$dogbreed2,$doggender2</div>

  <div class='clearfix'></div>
<div class='bot-border'></div>


           
          </div>
         

        </div>
       
</div>  
    </div> 
    </div>
</div>
<div class='container' id = 'appointment'>
            <div class='row' style = 'margin-left: -30px; margin-bottom: 40px;'>
                <div class='col-md-12'>
                    <div class='well-block'>
                        <div class='well-title'>
                            <h2>Schedule Appointment</h2>
                        </div>
                        <form id = 'scheduleform'>
                            <!-- Form start -->
                            <div class='row'>
                                <!-- Text input-->
                                <div class='col-lg-6'>
                                <div class='form-group'>
                                <label class='control-label' for='date'>Date</label>
                                <input name = 'date' type='text' class='form-control'>
                                <div class='valid-feedback mb3' id = 'dateerror' style = 'color: red'></div>
                                </div>
                                </div>
                                <!-- Select Basic -->
                                <div class='col-lg-6'>
                                    <div class='form-group'>
                                        <label class='control-label' for='time'>Time</label>
                                        <select id='time' name='time' class='form-control'>
                                            <option value='10:00 to 11:00'>10:00 to 11:00</option>
                                            <option value='11:00 to 12:00'>11:00 to 12:00</option>
                                            <option value='12:00 to 13:00'>12:00 to 13:00</option>
                                            <option value='13:00 to 14:00'>13:00 to 14:00</option>
                                            <option value='14:00 to 15:00'>14:00 to 15:00</option>
                                            <option value='15:00 to 16:00'>15:00 to 16:00</option>
                                            <option value='16:00 to 17:00'>16:00 to 17:00</option>
                                            <option value='17:00 to 18:00'>17:00 to 18:00</option>
                                            <option value='18:00 to 19:00'>18:00 to 19:00</option>
                                            <option value='19:00 to 20:00'>19:00 to 20:00</option>
                                            <option value='20:00 to 21:00'>20:00 to 21:00</option>
                                        </select>
                                    </div>
                                    <div class='valid-feedback mb3' id = 'timeerror' style = 'color: red'></div>
                                </div>
                                <div class='col-xs-12 col-md-3'>
                                    <div class='form-group'>
                                        <button  id='schedule' name='schedule[$dogid1][$dogid2]' class='btn btn-success form-control'>Schedule</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>"

?>