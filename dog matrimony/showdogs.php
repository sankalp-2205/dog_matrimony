<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$username'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    { 
        $city = $rows['city'];
    }
}
$sql = "SELECT * FROM dogs WHERE username = '$username' AND deleted = false";
if($result = $link ->query($sql))
   {
        if ($result->num_rows == 0)
        {
            echo "<div class = 'alert alert-warning'>No dog has been added to your profile</div>";
        }
        else
        {
            while($rows = $result->fetch_array(MYSQLI_ASSOC))
            {   
                $name = $rows['dogname'];
                $age = $rows['dogage'];
                $weight = $rows['dogweight'];
                $breed = $rows['dogbreed'];
                $gender = $rows['doggender'];
                //$time = date("F d,Y H:i:s",$time);
                $id = $rows['dogid'];
                $picture = $rows['dogprofilepicture'];
                $certification = $rows['certification'];
                $description = $rows['description'];
                $organisation = $rows['organisation_name'];
                if(strlen($description) < 5)
                {
                    $description = "No description provided";
                }
                if($picture == "NULL")
             {
                 $message = "<img src='profilepicture/dummydog.jpg' name= 'dogprofileimage_$id' alt='dummypic' class='img-circle img-responsive'  width='320' height='320' border='0' style = 'margin : auto;' data-toggle = 'modal' data-target = '#updatedogpic_$id'>";
                 $message1 = "<img src='profilepicture/dummydog.jpg' name='dogmodalimage_$id' width='140' height='140' border='0' class='img-circle'>";
                 $message2 = "<img src='profilepicture/dummydog.jpg' name='dogmodalimage_$id' width='60' height='60' border='0' class='img-circle' data-toggle = 'modal' data-target = '#updatedogpic_$id'>";
             }
             else
             {
                $message = "<img src='$picture' alt='dummypic' name= 'dogprofileimage_$id' class='img-circle img-responsive'  width='320' height='320' border='0' style = 'margin : auto;' data-toggle = 'modal' data-target = '#updatedogpic_$id'>";
                $message1 = "<img src='$picture' name='dogmodalimage_$id' width='140' height='140' border='0' class='img-circle'>";
                $message2 = "<img src='$picture' name='dogmodalimage_$id' width='60' height='60' border='0' class='img-circle'  data-toggle = 'modal' data-target = '#updatedogpic_$id'>";
             }


                echo "<div class='modal fade' id='myModal_$id' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
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
                    <p class='text-left'><strong>Age(in months): </strong> $age
                        </p>
                        <p class='text-left'><strong>Weight(in kg): </strong>
                        $weight.</p>
                        <p class='text-left'><strong>Recommended By: </strong>
                        $organisation.</p>
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
    </div>


    <form id = 'editdogform_$id' method = 'post'>
    <div class='modal fade' id='editModal_$id' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
                    <h4 class='modal-title' id='editModalLabel'>Edit $name</h4>
                    </div>
                <div class='modal-body'>
                    <center>
                    $message2
                    <h3 class='media-heading'>$name <small>$city</small></h3>
                    <hr>
                    </center>
                    <div id = 'editdogmessage_$id'></div>
                    <div class = 'row'>
                    <div class = 'col-xs-6'>
                    <div class='form-group'>
                    <label for='age'>Age(in months):</label><span class='required'>*</span>
                    <input type='number_format' name='age' placeholder='dog age' class='form-control' value='$age'>
                    <div class='valid-feedback mb3' id = 'ageerror_$id' style = 'color: red'></div>
                     </div>
                     </div>
                     <div class = 'col-xs-6'>
                     <div class='form-group'>
                     <label for='weight'>Weight(in kg):</label><span class='required'>*</span>
                     <input type='number_format' name='weight' placeholder='dog weight' class='form-control' value='$weight'>
                     <div class='valid-feedback mb3' id = 'weighterror_$id' style = 'color: red'></div>
                      </div>
                      </div>
                      </div>
                      <div class='form-group'>
                      <label for='age'>Breed:</label><span class='required'>*</span>
                      <input type='text' name='breed' placeholder='dog breed' class='form-control' value='$breed' disabled>
                      <div class='valid-feedback mb3' id = 'breederror_$id' style = 'color: red'></div>
                       </div>
                       <div class = 'row'>
                       <div class = 'col-xs-6'>
                       <div class='form-group'>
                       <label for='age'>Recommended By:</label><span class='required'>*</span>
                       <input type='text' name='organisation' placeholder='recommendation' class='form-control' value='$organisation' disabled>
                       <div class='valid-feedback mb3' id = 'breederror_$id' style = 'color: red'></div>
                        </div>
                        </div>
                        <div class = 'col-xs-6'>
                       <div class='form-group'>
                       <label for='age'>Gender:</label><span class='required'>*</span>
                       <input type='text' name='gender' placeholder='dog gender' class='form-control' value='$gender' disabled>
                       <div class='valid-feedback mb3' id = 'gendererror_$id' style = 'color: red'></div>
                        </div>
                        </div>
                        </div>
                        <div class='form-group'>
                        <label for='certification'>Kennel Club Certified:</label><span class='required'>*</span>
                       <select id='kci' class='form-control' name = 'kci'>
                       <option selected>$certification</option>
                       <option>Yes</option>
                       <option>No</option>
                       </select>
                       <div class='valid-feedback mb3' id = 'certificationerror_$id' style = 'color: red'></div>
                       </div>
                       <div class='form-group'>
                       <label for='description'>Description</label>
                       <textarea maxlength = '100' name = 'description' class='form-control rounded-0' id='description' rows='3'>$description</textarea>
                       </div>
                    <br>
                    <center>
                    <button type='button'  id='editdog' name = 'editdog[$id]' class='btn btn-success btn-lg'>Edit</button>
                    </center>
                    </form>
                </div>
                <div class='modal-footer'>
                    
                </div>
            </div>
        </div>
    </div>
               
                <div class='container'>
	<div class='row'>
		<div class='col-sm-offset-4 col-sm-7 col-lg-offset-3 col-lg-6'>
    	 <div class='well profile'>
            <div class='col-xs-12'>
                <div class='col-xs-12 col-sm-8'>
                    <div id='dogrequestmessage'></div>
                    <h2 style = 'display: inline'>$name </h2> &nbsp;<div style = 'display: inline'><span id = 'delete' name = 'delete[$id]' style = 'color:red; cursor: pointer;'  class='fa fa-minus-circle' title = 'Delete'></span></div>
                    <p><strong>Breed: </strong> $breed </p>
                    <p><strong>Weight(in kg): </strong> $weight </p>
                    <p><strong>Gender: </strong> $gender </p>
                    <p><strong>Age:(in months): </strong> $age </p>
                </div>             
                <div class='col-xs-12 col-sm-4 text-center' style = 'cursor : pointer;'>
                    <figure>
                        $message
                    </figure>
                </div>
            </div>            
            <div class='col-xs-12 divider text-center'>
                <div class='col-xs-12 col-sm-4 emphasis'>
                    <button class='btn btn-success btn-block' name = 'findmatch[$id]' id = 'find_match' ><span class='fa fa-plus-circle'></span> Find Match </button>
                </div>
                <div class='col-xs-12 col-sm-4 emphasis'>
                    <button type = 'button' class='btn btn-info btn-block' data-toggle='modal' data-target='#myModal_$id' name = 'viewprofile[$id]' id= 'view_profile'><span class='fa fa-user'></span>Profile </button>
                </div>
                <div class='col-xs-12 col-sm-4 emphasis'>
                <button type = 'button' class='btn btn-warning btn-block' data-toggle='modal' data-target='#editModal_$id' name = 'editprofile[$id]' id= 'edit_profile'><span class='fa fa-pencil-square-o'> </span>Edit</button>
            </div>
            </div>
    	 </div>                 
		</div>
	</div>
</div>
<form id='updatedogprofileform_$id' method = 'post' enctype = 'multipart/form-data'>
                <div class='container-fluid'>
                    <div class='row'>
                    <div class='col-xs-12'>
                         <div id='updatedogpic_$id' class='modal fade'>
                <div class='modal-dialog'>
                  <div class='modal-content'>
                      <div id='header' class='modal-header'>
                      <button class='close' data-dismiss='modal'>&times;</button>
                          <h4><strong> Update picture:</strong></h4>
                      </div>
                       <div class='modal-body'>
                           <div id = 'updatedogpicmessage_$id'></div>
                           <div><img  id = 'dogprofilepic_$id' name = 'dogprofilepic[$id]' class = 'preview2' src='profilepicture/dummy.png'/></div>
                           <div class='form-group'>
                  <label for = 'dogpicture'>Select Picture</label>
                  <input type='file' name='dogpicture[$id]' id = 'dogpicture'>
                   </div>
                       <br>
                   </div>
                         
                       <div class='modal-footer'>
                           <button class='btn green' name = 'updatedogprofilebutton[$id]' id = 'updatedogprofilebutton'>
                          Submit
                          </button>
                          <button class='btn btn-default' data-dismiss='modal'>
                          Cancel
                          </button>
                      </div>
                    </div>      
              </div>
                </div>          
                        </div>
            </form>";
            }
            
        }
}
else
{
      echo "<div class = 'alert alert-warning'>Not you fault.Error on our side.Don't worry your notes are safe.</div>";
            exit;                           
}

?>