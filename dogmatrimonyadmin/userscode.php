<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['adminusername'];
$userscard = "";
$count = 0;
$sql = "SELECT * FROM users WHERE activation = 'active' ORDER BY username";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    { 
        $dogs = "";
        $dogarray = array();
        $dogscard = "";
        $activecards = "";
        $totalactive = 0;
        $username = $rows['username'];
        $sql2 = "SELECT * FROM dogs WHERE username = '$username' AND deleted = false";
        if($result2 = $link ->query($sql2))
        {
            while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
            {
                $dogid = $rows2['dogid'];
                $dogname = $rows2['dogname'];
                $dogage = $rows2['dogage'];
                $dogbreed = $rows2['dogbreed'];
                $dogweight = $rows2['dogweight'];
                $doggender = $rows2['doggender'];
                $certification = $rows2['certification'];
                $description = $rows2['description'];
                $organisation_name = $rows2['organisation_name'];
                if($organisation_name == "None Of These")
                {
                    $organisation_name = "No Organisation";
                }
                $sql3 = "SELECT * FROM requests WHERE (fromdogid = '$dogid' OR todogid = '$dogid') AND status <> 'cancelled' AND status <> 'declined'";
                if($result3 = $link ->query($sql3))
                {
                        while($rows3 = $result3->fetch_array(MYSQLI_ASSOC))
                        {
                            $active = 0;
                            $sentfrom = $rows3['fromdogid'];
                            $sentto = $rows3['todogid'];
                            if($sentfrom == $dogid)
                            {
                                //the mentioned dog is sender
                                $sql4 = "SELECT * FROM appointments WHERE sentfrom = '$dogid' AND sentto = '$sentto' AND report_generated = true";
                                    if($result4 = $link ->query($sql4))
                                    {
                                        if($result4->num_rows == 0)
                                        {
                                            $sql7 = "SELECT * FROM appointments WHERE sentfrom = '$dogid' AND sentto = '$sentto' AND report_generated = false";
                                            if($result7 = $link ->query($sql7))
                                            {
                                                if($result7->num_rows == 1)
                                                {
                                                    while($rows7 = $result7->fetch_array(MYSQLI_ASSOC))
                                                    {
                                                        $appointment_date = $rows7['appointment_date'];
                                                        $appointment_time = $rows7['appointment_time'];
                                                    }
                                                }
                                                else {
                                                    $appointment_date = "N/A";
                                                    $appointment_time = "N/A";
                                                }
                                            }
                                            //THIS MATCH IS CURRENTLY ACTIVE
                                            $active++;
                                            $totalactive++;
                                            $status = $rows3['status'];
                                            $appointment_sender = $rows3['appointment_sender'];
                                            $appointment_receiver = $rows3['appointment_receiver'];
                                            $organisation = $rows3['organisation_handling'];
                                            // mentioned dog
                                            $sql5 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentfrom'";
                                            if($result5 = $link ->query($sql5))
                                            {
                                                while($rows5 = $result5->fetch_array(MYSQLI_ASSOC))
                                                {
                                                    $dognamem = $rows5['dogname'];
                                                    $senderdog = $dognamem;
                                                    $dogagem = $rows5['dogage'];
                                                    $dogbreedm = $rows5['dogbreed'];
                                                    $dogweightm = $rows5['dogweight'];
                                                    $doggenderm = $rows5['doggender'];
                                                    $certificationm = $rows5['certification'];
                                                    $descriptionm = $rows5['description'];
                                                    $organisation_namem = $rows5['organisation_name'];
                                                    if($organisation_namem == "None Of These")
                                                    {
                                                        $organisation_namem = "No Organisation";
                                                    }
                                                }
                                            }
                                            $sql6 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentto'";
                                            if($result6 = $link ->query($sql6))
                                            {
                                                while($rows6 = $result6->fetch_array(MYSQLI_ASSOC))
                                                {
                                                    $dognameo = $rows6['dogname'];
                                                    $recieverdog = $dognameo;
                                                    $dogageo = $rows6['dogage'];
                                                    $dogbreedo = $rows6['dogbreed'];
                                                    $dogweighto = $rows6['dogweight'];
                                                    $doggendero = $rows6['doggender'];
                                                    $certificationo = $rows6['certification'];
                                                    $descriptiono = $rows6['description'];
                                                    $organisation_nameo = $rows6['organisation_name'];
                                                    if($organisation_nameo == "None Of These")
                                                    {
                                                        $organisation_nameo = "No Organisation";
                                                    }
                                                    $nameo = $rows6['name'];
                                                    $contacto = $rows6['contact'];
                                                    $emailo = $rows6['email'];
                                                    $localityo = $rows6['locality'];
                                                    $cityo = $rows6['city'];
                                                    $stateo = $rows6['state'];
                                                    $addresso = $localityo.' '.$cityo.' '.$stateo;                                                   
                                                }
                                            }
                                        }
                                    }
                                }
                                elseif ($sentto == $dogid) 
                                {
                                //the mentioned dog is receiver
                                    $sql4 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$dogid' AND report_generated = true";
                                    if($result4 = $link ->query($sql4))
                                    {
                                        if($result4->num_rows == 0)
                                        {
                                            //THIS MATCH IS CURRENTLY ACTIVE
                                            $sql7 = "SELECT * FROM appointments WHERE sentfrom = '$sentfrom' AND sentto = '$dogid' AND report_generated = false";
                                            if($result7 = $link ->query($sql7))
                                            {
                                                if($result7->num_rows == 1)
                                                {
                                                    while($rows7 = $result7->fetch_array(MYSQLI_ASSOC))
                                                    {
                                                        $appointment_date = $rows7['appointment_date'];
                                                        $appointment_time = $rows7['appointment_time'];
                                                    }
                                                }
                                                else {
                                                    $appointment_date = "N/A";
                                                    $appointment_time = "N/A";
                                                }
                                            }
                                            $active++;
                                            $totalactive++;
                                            $status = $rows3['status'];
                                            $appointment_sender = $rows3['appointment_sender'];
                                            $appointment_receiver = $rows3['appointment_receiver'];
                                            $organisation = $rows3['organisation_handling'];
                                            //MENTIONED DOG
                                            $sql5 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentto'";
                                            if($result5 = $link ->query($sql5))
                                            {
                                                while($rows5 = $result5->fetch_array(MYSQLI_ASSOC))
                                                {
                                                    $dognamem = $rows5['dogname'];
                                                    $recieverdog = $dognamem;
                                                    $dogagem = $rows5['dogage'];
                                                    $dogbreedm = $rows5['dogbreed'];
                                                    $dogweightm = $rows5['dogweight'];
                                                    $doggenderm = $rows5['doggender'];
                                                    $certificationm = $rows5['certification'];
                                                    $descriptionm = $rows5['description'];
                                                    $organisation_namem = $rows5['organisation_name'];
                                                    if($organisation_namem == "None Of These")
                                                    {
                                                        $organisation_namem = "No Organisation";
                                                    }
                                                }
                                            }
                                            // OTHER DOG
                                            $sql6 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentfrom'";
                                            if($result6 = $link ->query($sql6))
                                            {
                                                while($rows6 = $result6->fetch_array(MYSQLI_ASSOC))
                                                {
                                                    $dognameo = $rows6['dogname'];
                                                    $senderdog = $dognameo;
                                                    $dogageo = $rows6['dogage'];
                                                    $dogbreedo = $rows6['dogbreed'];
                                                    $dogweighto = $rows6['dogweight'];
                                                    $doggendero = $rows6['doggender'];
                                                    $certificationo = $rows6['certification'];
                                                    $descriptiono = $rows6['description'];
                                                    $organisation_nameo = $rows6['organisation_name'];
                                                    if($organisation_nameo == "None Of These")
                                                    {
                                                        $organisation_nameo = "No Organisation";
                                                    }
                                                    $nameo = $rows6['name'];
                                                    $contacto = $rows6['contact'];
                                                    $emailo = $rows6['email'];
                                                    $localityo = $rows6['locality'];
                                                    $cityo = $rows6['city'];
                                                    $stateo = $rows6['state'];
                                                    $addresso = $localityo.' '.$cityo.' '.$stateo;                                                   
                                                }
                                            }
                                        }
                                    }
                                }
                if($active !== 0 && $totalactive !== 0)
                {
                    $activecards.= "<div class='card'>
                    <div class='card-header' role='tab' id='headingactive".$dogid."_".$sentfrom."_".$sentto."'>
                      <a class='collapsed' data-toggle='collapse' data-parent='#accordionEx".$username."' href='#collapseactive".$dogid."_".$sentfrom."_".$sentto."'
                        aria-expanded='false' aria-controls='collapseactive".$dogid."_".$sentfrom."_".$sentto."'>
                        <h5 class='mb-0'>
                          $senderdog - $recieverdog<i class='fas fa-angle-down rotate-icon'></i>
                        </h5>
                      </a>
                    </div>
    
                  
                    <div id='collapseactive".$dogid."_".$sentfrom."_".$sentto."' class='collapse' role='tabpanel' aria-labelledby='headingactive".$dogid."_".$sentfrom."_".$sentto."'
                      data-parent='#accordionEx".$username."'>
                      <div class='card-body'>
                      <div class='row'>
                <div class='col-lg-6'>
           
            <div class='single category'>
            <h3 class='side-title'>Profile</h3>
            <ul class='list-unstyled'>
                <li><a href='' title=''>Name: <span class='pull-right'>$dognamem</span></a></li>
                <li><a href='' title=''>Age(in months):<span class='pull-right'>$dogagem</span></a></li>
                <li><a href='' title=''>Weight(in kg):<span class='pull-right'>$dogweightm</span></a></li>
                <li><a href='' title=''>Breed: <span class='pull-right'>$dogbreedm</span></a></li>
                <li><a href='' title=''>KCI cetified: <span class='pull-right'>$certificationm</span></a></li>
                <li><a href='' title=''>Description: <span class='pull-right'>$descriptionm</span></a></li>
                <li><a href='' title=''>Organisation: <span class='pull-right'>$organisation_namem</span></a></li>
            </ul>
       </div>
    </div> 
    <div class='col-lg-6'>
         
            <div class='single category'>
            <h3 class='side-title'>Progress</h3>
            <ul class='list-unstyled'>
                <li><a href='' title=''>Status: <span class='pull-right'>$status</span></a></li>
                <li><a href='' title=''>Appointment Sender($senderdog):<span class='pull-right'>$appointment_sender</span></a></li>
                <li><a href='' title=''>Appointment Receiver($recieverdog):<span class='pull-right'>$appointment_receiver</span></a></li>
                <li><a href='' title=''>Appointment Date: <span class='pull-right'>$appointment_date</span></a></li>
                <li><a href='' title=''>Appointment Time: <span class='pull-right'>$appointment_time</span></a></li>
                <li><a href='' title=''>Organisation: <span class='pull-right'>$organisation</span></a></li>
            </ul>
       </div>
    </div> 
    </div>
    <div class='row'>
                <div class='col-lg-12'>
            <div class='single category'>
            <h3 class='side-title'>Profile(Other User)</h3>
            <ul class='list-unstyled'>
                <li><a href='' title=''>Name: <span class='pull-right'>$dognameo</span></a></li>
                <li><a href='' title=''>Owner Name: <span class='pull-right'>$nameo</span></a></li>
                <li><a href='' title=''>Contact: <span class='pull-right'>$contacto</span></a></li>
                <li><a href='' title=''>Email: <span class='pull-right'>$emailo</span></a></li>
                <li><a href='' title=''>Address: <span class='pull-right'>$addresso</span></a></li>
                <li><a href='' title=''>Age(in months):<span class='pull-right'>$dogageo</span></a></li>
                <li><a href='' title=''>Weight(in kg):<span class='pull-right'>$dogweighto</span></a></li>
                <li><a href='' title=''>Breed: <span class='pull-right'>$dogbreedo</span></a></li>
                <li><a href='' title=''>KCI cetified: <span class='pull-right'>$certificationo</span></a></li>
                <li><a href='' title=''>Description: <span class='pull-right'>$descriptiono</span></a></li>
                <li><a href='' title=''>Organisation: <span class='pull-right'>$organisation_nameo</span></a></li>
            </ul>
    </div>
    </div> 
    </div>
    </div>
    </div>     
    </div> ";
                }
            }
        }

                array_push($dogarray,$dogname);
                $dogscard.= "<div class='card'>
              
                <div class='card-header' role='tab' id='headingdog".$dogid."'>
                  <a data-toggle='collapse' data-parent='#accordiondog".$username."' href='#collapsedog".$dogid."' aria-expanded='true'
                    aria-controls='collapsedog".$dogid."'>
                    <h5 class='mb-0'>
                      $dogname <i class='fas fa-angle-down rotate-icon'></i>
                    </h5>
                  </a>
                </div>

                
                <div id='collapsedog".$dogid."' class='collapse' role='tabpanel' aria-labelledby='headingdog".$dogid."'
                  data-parent='#accordiondog".$username."'>
                  <div class='card-body'>
                  <div class='row'>
        <div class='col-sm-12'>
	   
	    <div class='single category'>
		<h3 class='side-title'>Profile</h3>
		<ul class='list-unstyled'>
            <li><a href='' title=''>Name : <span class='pull-right'>$dogname</span></a></li>
            <li><a href='' title=''>Age(in months) :<span class='pull-right'>$dogage</span></a></li>
			<li><a href='' title=''>Weight(in kg) :<span class='pull-right'>$dogweight</span></a></li>
            <li><a href='' title=''>Breed: <span class='pull-right'>$dogbreed</span></a></li>
            <li><a href='' title=''>Gender : <span class='pull-right'>$doggender</span></a></li>
            <li><a href='' title=''>Organisation: <span class='pull-right'>$organisation_name</span></a></li>
			<li><a href='' title=''>KCI cetification: <span class='pull-right'>$certification</span></a></li>
			<li><a href='' title=''>Description: <span class='pull-right'>$description</span></a></li>
		</ul>
   </div>
</div> 
</div>
                  </div>
                </div>
              </div>";
            }
        }
        if($totalactive == 0)
        {
            $button = "<button style = 'margin-top:3px;' type='button' class='btn btn-success btn-disabled' data-toggle='modal' data-target='#modalRequests".$username."' disabled>Show Active Request</button>";
        }
        else
        {
            $button = "<button style = 'margin-top:3px;' type='button' class='btn btn-success' data-toggle='modal' data-target='#modalRequests".$username."'>Show Active Request</button>";
        }
        
        for ($i = 0; $i < count($dogarray); $i++)  {
            if($i<1)
            {
                $dogs.= $dogarray[$i];
            }
            else
            {
                $dogs.= ", ".$dogarray[$i] ;
            }
        }
        $name = $rows['name'];
        $contact = $rows['contact'];
        $email = $rows['email'];
        $locality = $rows['locality'];
        $city = $rows['city'];
        $state = $rows['state'];
        $address = $locality.' '.$city.' '.$state;

        $usercards .="<div class='card'>
    <div class='card-header blue lighten-3 z-depth-1' role='tab' id='heading".$count."'>
      <h5 class='text-uppercase mb-0 py-1'>
        <a class='white-text font-weight-bold ' data-toggle='collapse' href='#collapse".$count."' aria-expanded='true'
          aria-controls='collapse".$count."'>
          $username($name)
        </a>
      </h5>
    </div>
    <div id='collapse".$count."' class='collapse' role='tabpanel' aria-labelledby='heading".$count."'
      data-parent='#accordionEx23'>
      <div class='card-body'>
      <div class='row my-4'>
      <div class='col-md-8'>
        <h2 class='font-weight-bold mb-3 black-text'>$name</h2>
        <div class='row'>
    <div class='col-sm-12'>
    <div class='single category'>
    <h3 class='side-title'>Profile</h3>
    <ul class='list-unstyled'>
        <li style = 'text-transform: uppercase;'><a href='' title=''>Name: <span class='pull-right'>$name</span></a></li>
        <li><a href='' title=''>USERNAME:<span class='pull-right'>$username</span></a></li>
        <li><a href='' title=''>EMAIL:<span class='pull-right'>$email</span></a></li>
        <li style = 'text-transform: uppercase;'><a href='' title=''>Contact: <span class='pull-right'>$contact</span></a></li>
        <li style = 'text-transform: uppercase;'><a href='' title=''>Active Requests: <span class='pull-right'>$totalactive</span></a></li>
        <li style = 'text-transform: uppercase;'><a href='' title=''>Address: <span class='pull-right'>$address</span></a></li>
        <li style = 'text-transform: uppercase;'><a href='' title=''>Dogs: <span class='pull-right'>$dogs</span></a></li>
    </ul>
</div>
</div> 
</div>
      </div>
      <div class='col-md-4 mt-3 pt-2'>
        <div class= 'text-center'>
        <button type='button' class='btn btn-warning mr-1' data-toggle='modal' data-target='#modalQuickView".$username."'>Show Dogs</button>
        $button
</div>

<div class='modal fade' id='modalQuickView".$username."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel2'
  aria-hidden='true'>
  <div class='modal-dialog modal-lg' role='document'>
    <div class='modal-content'>
      <div class='modal-body'>
          <div class='col-lg-12'>
          
            <div class='accordion md-accordion' id='accordiondog".$username."' role='tablist' aria-multiselectable='true'>
           $dogscard
            </div>
            <div class='card-body'>
              <div class='text-center'>

                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class='modal fade' id='modalRequests".$username."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
  aria-hidden='true'>
  <div class='modal-dialog modal-lg' role='document'>
    <div class='modal-content'>
      <div class='modal-body'>
          <div class='col-lg-12'>
        
            <div class='accordion md-accordion' id='accordionEx".$username."' role='tablist' aria-multiselectable='true'>  
                $activecards
        </div>
        <div class='card-body'>
                  <div class='text-center'>
    
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                  </div>
                </div>
        </div>
        </div> 

      </div>
    

          </div>
        </div>

      
  

    </div>
    </div>
  </div>
</div>
</div>";
$count++;
    }

}

echo "<div class='container-fluid'>
<div class='accordion md-accordion accordion-1' id='accordionEx23' role='tablist'>
  $usercards
</div>
        </div>";
?>

