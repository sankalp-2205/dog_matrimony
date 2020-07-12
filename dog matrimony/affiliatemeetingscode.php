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
echo "
<div class = 'container' style = 'margin-top: 30px;'>
<div class = 'row'>
<div class = 'col-md-3'>
<div class='form-check mb-4'>
<input class='form-check-input' name='filter' type='radio' id='all' value='all' onClick = 'update()' checked>
<label class='form-check-label'>All dates</label>
</div>
</div>
<div class = 'col-md-3'>
<div class='form-check mb-4'>
<input class='form-check-input' name='filter' type='radio' id='select' value='select' onClick = 'update()'>
<label class='form-check-label'>Filter By Date</label>
</div>
</div>
<div class = 'col-md-3'>
<div class='form-group'>
<input name = 'filterdate' id = 'filterdate' type='text' class='form-control' value = 'All Dates' disabled>
</div>
</div>
</div>
</div>";
$sql = "SELECT * FROM appointments WHERE organisation_name = '$organisation_name' AND appointment_date <> 'NULL'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {  
        $sentfrom = $rows['sentfrom'];
        $sentto = $rows['sentto'];
        $time = $rows['appointment_time'];
        $date = $rows['appointment_date'];
        $report_generated = $rows['report_generated'];
        $currenttime = time() + 34200;
        $appointmenttimestamp = strtotime($date);
    $sql2 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentfrom'";
    if($result2 = $link ->query($sql2))
    {
        while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
        { 
                        $dogid1 = $rows2['dogid'];
                        $dogname1 = $rows2['dogname'];
                        $dogage1 = $rows2['dogage'];
                        $dogbreed1 = $rows2['dogbreed'];
                        $dogweight1 = $rows2['dogweight'];
                        $dogprofilepicture1 = $rows2['dogprofilepicture'];
                        $doggender1 = $rows2['doggender'];
                        $certification1 = $rows2['certification'];
                        $description1 = $rows2['description'];
                        $name1 = $rows2['name'];
                        $state1 = $rows2['state'];
                        $city1 = $rows2['city'];
                        $profilepicture1 = $rows2['profilepicture'];
                        $locality1 = $rows2['locality'];
                        $contact1 = $rows2['contact'];
                        $email1 = $rows2['email'];
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
    $sql2 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentto'";
    if($result2 = $link ->query($sql2))
    {
        while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
        { 
                        $dogid2 = $rows2['dogid'];
                        $dogname2 = $rows2['dogname'];
                        $dogage2 = $rows2['dogage'];
                        $dogbreed2 = $rows2['dogbreed'];
                        $dogweight2 = $rows2['dogweight'];
                        $dogprofilepicture2 = $rows2['dogprofilepicture'];
                        $doggender2 = $rows2['doggender'];
                        $certification2 = $rows2['certification'];
                        $description2 = $rows2['description'];
                        $name2 = $rows2['name'];
                        $state2 = $rows2['state'];
                        $city2 = $rows2['city'];
                        $profilepicture2 = $rows2['profilepicture'];
                        $locality2 = $rows2['locality'];
                        $contact2 = $rows2['contact'];
                        $email2 = $rows2['email'];
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
    if($currenttime < $appointmenttimestamp+86400)
    {
        $button = "<button type='button' data-toggle='modal' data-target='#edit_$dogid1"."_"."$dogid2' data-uid='1' class='update btn btn-warning btn-sm'><span class='glyphicon glyphicon-pencil'></span></button>";
        $heading = "Modify"; 
    }
    else
    {
        if($report_generated == false)
        {
            $button =  "<button type='button' data-toggle='modal' data-target='#report_$dogid1"."_"."$dogid2' data-uid='1' class='update btn btn-warning btn-sm'>Generate</button>";
        }
        else
        {
            $button =  "<button type='button' id = 'download_report' name = 'download[$dogid1][$dogid2]'  class='update btn btn-warning btn-sm'>Download</button>";
        }
        $heading = "Report";
    }
echo "
<div class='modal fade right' id='report_$dogid1"."_"."$dogid2' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
  aria-hidden='true' data-backdrop='false'>
  <div class='modal-dialog modal-full-height modal-right modal-notify modal-info' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <p class='heading lead'><strong>Appointment Report</strong><button type='button' class='close' data-dismiss='modal' aria-label='Close'>
        <span aria-hidden='true' class='white-text'>×</span></p>
     </button><br>$dogname1 - $dogname2<br>Dated : $date
      </div>
      <div class='modal-body'>
        <form id = 'reportform_$dogid1"."_"."$dogid2' method = 'post'>
          <label>Appointment Outcome:<span style = 'color : red;' id = 'star'>*<span></label>
        <div class='form-check mb-4'>
          <input class='form-check-input' name='outcome' type='radio' id='success' value='success[$dogid1][$dogid2]' onClick='displayForm(success)' checked>
          <label class='form-check-label' style = 'color: green;'>Successful</label>
        </div>

        <div class='form-check mb-4'>
          <input class='form-check-input' name='outcome' type='radio' id='failure' value='failure[$dogid1][$dogid2]' onClick='displayForm(failure)'>
          <label class='form-check-label' style = 'color: red;'>Did Not work Out</label>
        </div>
        <br>
        <div class = 'form-group' id = 'littersize_$dogid1"."_"."$dogid2'>
        <label> Number Of puppies in the litter:<span style = 'color : red;' id = 'star'>*<span></label>
        <input class='form-control' name = 'litter' type='number' min = '1' id='litter'>
        <div class='valid-feedback mb3' id = 'littererror_$dogid1"."_"."$dogid2' style = 'color: red'></div>
        </div>
        <div class='form-group' id = 'birthdate_$dogid1"."_"."$dogid2'>
            <label class='control-label' for='date2'>Date Of Delivery:<span style = 'color : red;' id = 'star'>*<span></label>
            <input name = 'date2' type='text' class='form-control'>
            <div class='valid-feedback mb3' id = 'dateerror2_$dogid1"."_"."$dogid2' style = 'color: red'></div>
            </div>
         <label>Description<span style = 'color : red;' id = 'star'>*<span></label>
        <div class='md-form'>
          <textarea type='text' name = 'description' id='description' class='md-textarea form-control' rows='5'></textarea>
        </div>
        <div class='valid-feedback mb3' id = 'descriptionerror_$dogid1"."_"."$dogid2' style = 'color: red'></div>
      </div>
</form>
      <div class='modal-footer justify-content-center'>
        <button name = 'report[$dogid1][$dogid2]' id = 'report' type='button' class='btn btn-primary waves-effect waves-light'>Generate
        <i class='fas fa-paper-plane'></i>
        </button>
        <a type='button' class='btn btn-outline-primary waves-effect' data-dismiss='modal'>Cancel</a>
      </div>
    </div>
  </div>
</div>

<hr>
<div class='container bootstrap snippet' style = 'margin-top: -40px; margin-bottom : 50px;'>
<div class='modal fade' id='myModal_$dogid1' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
                                <h4 class='modal-title' id='myModalLabel'>More Details</h4>
                                </div>
                            <div class='modal-body'>
                                <center>
                                $modalpic1
                                <h3 class='media-heading'>$dogname1</h3>
                                <br>$contact1
                                <br>$email1
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
                                <h4 class='modal-title' id='myModalLabel'>More Details</h4>
                                </div>
                            <div class='modal-body'>
                                <center>
                                $modalpic2
                                <h3 class='media-heading'>$dogname2</h3>
                                <br>$contact2
                                <br>$email2
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
                        <p>$contact1</p>
                        <p>$dogname1</p>
                        <p>$dogbreed1</p>
                        <p>$doggender1</p>
                             <button type = 'button' class='btn bt-block' data-toggle='modal' data-target='#myModal_$dogid1'>More Details</button>
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
                        <p>$contact2</p>
                        <p>$dogname2</p>
                        <p>$dogbreed2</p>
                        <p>$doggender2</p>
                             <button  class='btn' data-toggle = 'modal' data-target = '#myModal_$dogid2'>More Details</button>
                    </div>
                  
                </div>
            </div>
            <div class = 'text-center'>
    <div class='row'>
    	<div class='col-xs-12'>
              <div class='table-responsive'>
                <table class='table table-hover'>
                  <thead>
                    <tr>
                      <th style = 'text-align:center'>Date</th>
                      <th style = 'text-align:center'>Time</th>
                      <th style = 'text-align:center'>$heading</th>
                    </tr>
                  </thead>
                  <tbody id='items'>
                    <tr data-toggle='collapse' data-target='#demo1' class='accordion-toggle '>
                      <td>$date</td>
                      <td>$time</td>
                      <td>$button</td>

                    </tr>
                       </div>
                </table>
                </div>
             </div>
        </div>
    </div>
</div>
                               </hr>
</div>
</div>
                    
              <div id='edit_$dogid1"."_"."$dogid2' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>×</button>
        <h4 class='modal-title'>Modify Appointment</h4>
      </div>
      <div class='modal-body'>
            <form id = 'modifyform_$dogid1"."_"."$dogid2'>
             <div class='form-group'>
            <label class='control-label' for='date'>Date</label>
            <input name = 'date' type='text' class='form-control'>
            <div class='valid-feedback mb3' id = 'dateerror_$dogid1"."_"."$dogid2' style = 'color: red'></div>
            </div>
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
      </div>
      <div class='modal-footer'>
        <button type='button' id = 'modify' name='modify[$dogid1][$dogid2]' class='btn btn-success'>Modify</button>
        <button type='button' class='btn btn-danger' data-dismiss='modal'>Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>  
          ";
    }
}
?>