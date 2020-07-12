<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
$sql = "SELECT * FROM affiliates WHERE affiliation_username = '$username'";
if($result = $link ->query($sql))
        {
             while($rows = $result->fetch_array(MYSQLI_ASSOC))
             {  
                $username = $rows['affiliation_username']; 
                $name = $rows['owner_name'];
                $email = $rows['affiliation_email'];
                $contact = $rows['affiliation_contact'];
                $organisation = $rows['organisation_name'];
                $state = $rows['affiliation_state'];
                $city = $rows['affiliation_city'];
                $locality = $rows['affiliation_locality'];
                $address = $rows['affiliation_address'];
                $profilepicture = $rows['profile_picture'];
                if($profilepicture == "NULL")
                {
                    $message =   "<a> <img align='right' class='fb-image-profile thumbnail' id = 'profile' src='profilepicture/dummy.png' data-toggle ='modal' data-target = '#updateprofile' alt='Profile image example'/></a>";
                }
                else
                {
                    $message = "<a> <img align='right' class='fb-image-profile thumbnail' id = 'profile' src='$profilepicture' data-toggle ='modal' data-target = '#updateprofile' alt='Profile image example'/></a>";
                }
             }
        echo "<div class='modal fade' id='editmodal' tabindex='-1' role='dialog' aria-labelledby='editmodalLabel' aria-hidden='true'>
<div class='modal-dialog'>
    <div class='modal-content'>
        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
            <h4 class='modal-title' id='myModalLabel'>Edit Profie</h4>
            </div>
        <div class='modal-body'>
        <div class='container'>
<div class='row'>
<div class='col-md-10'>
<form class='form-horizontal' id='editform' method='post'>
<fieldset>
<div class='form-group'>
<div class='col-sm-9 col-md-7'>
<div id='editmessage'>
</div>
</div>
</div>
<div class='form-group'>
<label class='col-sm-2 control-label' for='username'>Username</label>  
<div class='col-sm-4'>
<div class='input-group'>
<div class='input-group-addon'>
<i class='fa fa-user'>
</i>
</div>
<input id='username' name='username' type='text' placeholder='Username' value='$username' class='form-control input-md'>
</div>
</div>
</div>
<div class='form-group'>
<label class='col-sm-2 control-label' for='Name (Full name)'>Name (Full name)</label>  
<div class='col-sm-4'>
<div class='input-group'>
<div class='input-group-addon'>
<i class='fa fa-user'>
</i>
</div>
<input id='Name (Full name)' name='name' type='text' placeholder='Name (Full name)' value='$name'' class='form-control input-md'>
</div>
</div>
</div>
<div class='form-group'>
<label class='col-sm-2 control-label' for='Organisation Name'>Organisation</label>  
<div class='col-sm-4'>
<div class='input-group'>
<div class='input-group-addon'>
<i class='fa fa-user'>
</i>
</div>
<input id='organisation' name='organisation' type='text' placeholder='Organisation' value='$organisation' class='form-control input-md'>
</div>


</div>


</div>


<div class='form-group'>
<label class='col-sm-2 control-label col-xs-12' for='Permanent Address'>Permanent Address</label>  
<div class='col-sm-2  col-xs-4'>
<input id='state' name='state' type='text' placeholder='State' value='$state' class='form-control input-md'>
</div>

<div class='col-sm-2 col-xs-4'>

<input id='city' name='city' type='text' placeholder='City' value='$city' class='form-control input-md'>
</div>


</div>

<div class='form-group'>
<label class='col-sm-2 control-label' for='Permanent Address'></label>  
<div class='col-sm-2  col-xs-4'>
<input id='locality' name='locality' type='text' value= '$locality' placeholder='locality' class='form-control input-md'>
</div>
</div>
<div class='form-group'>
  <label class='col-sm-2 control-label' for='Phone number'>Phone number </label>  
  <div class='col-sm-4'>
  <div class='input-group'>
       <div class='input-group-addon'>
     <i class='fa fa-phone'></i>   
       </div>
    <input id='Phone number' name='contact' type='number' value='$contact' placeholder='Phone number' class='form-control input-md' disabled>
</div>
  </div>
</div>
<!-- Text input-->
<div class='form-group'>
  <label class='col-sm-2 control-label' for='Email Address'>Email Address</label>  
  <div class='col-sm-4'>
  <div class='input-group'>
       <div class='input-group-addon'>
     <i class='fa fa-envelope-o'></i>
        
       </div>
    <input id='Email Address' name='email' type='email'value = '$email' placeholder='Email Address' class='form-control input-md' disabled>
    
      </div>
  
  </div>
</div>
<div class='form-group'>
<label class='col-sm-2 control-label' for='Address'>Address</label>  
<div class='col-sm-4'>
<div class='input-group'>
<div class='input-group-addon'>
<i class='fa fa-user'>
</i>
</div>
<input id='address' name='address' type='text' placeholder='Address' value='$address' class='form-control input-md'>
</div>


</div>


</div>
<button class='btn green' type='button' id = 'submiteditform'><span class='glyphicon glyphicon-thumbs-up'></span>
                    Submit
                    </button>
                    <button class='btn btn-danger' data-dismiss='modal'><span class='glyphicon glyphicon-remove-sign'></span>
                    Cancel
                    </button>


</fieldset>

</div>

</div>
   </div>
                </div>
                
                    <div class='modal-footer'>
                  
                </div>
            </div>
        </div>
    </div>
                </div>
                </form>
        <div class='fb-profile'>
        <img align='right' class='fb-image-lg' src='cover.jpg' alt='Profile image example'/>
        <div id = 'dpbox' style = 'cursor: pointer;'>
        $message
        </div>
        <div align = 'right' class='fb-profile-text'>
            <h1>$organisation</h1>
            <p>AFFILIATE</P>

        </div>
    </div>
    <br>

    <div class='container main-secction'>
        <div class='row'>
                <div class='col-md-offset-2 col-md-8 col-xs-12 pull-right profile-right-section'>
                    <div class='row profile-right-section-row'>
                        <div class='col-md-12 profile-header'>
                            <div class='row'>
                                <div class='col-md-8 col-xs-offset-2 col-sm-offset-4 col-md-offset-0 col-xs-8  profile-header-section1 pull-left'>
                                    <h1>Your Profile</h1>
                                    <br>
                                </div>
                                <div class='col-md-4 col-xs-4 col-xs-offset-2 col-sm-offset-4 col-md-offset-0 profile-header-section1 text-right pull-rigth'>
                                    <a href='#' id='editprofile' class='btn btn-primary btn-block' data-toggle='modal' data-target='#editmodal'>Edit</a>
                                    <br>
                                </div>
                                <div class='col-md-4 col-xs-4 col-sm-4 col-sm-offset-4 col-xs-offset-2 col-md-offset-0 profile-header-section1 text-right pull-rigth'>
                                <a href='#' id='changepassword' class='btn btn-primary btn-block' data-toggle='modal' data-target='#changepasswordmodal'><i class='fa fa-pencil-square-o'></i>&nbsp;Password</a>
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
                                                                <div class='col-md-8 col-xs-offset-2 col-sm-offset-4 col-xs-8 col-md-offset-0 pull-left'>
                                                                    <h4><label>Username: <span style='color: gray';>$username</span></label></h4>
                                                                </div>
                                            
                                                            </div>
                                                            <div class='row'>
                                                            <div class='col-md-8 col-xs-offset-2 col-sm-offset-4 col-xs-8 col-md-offset-0'>
                                                                    <h4><label>Name: <span style='color: gray';>$name</span></label></h4>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <div class='row'>
                                                            <div class='col-md-8 col-xs-offset-2 col-sm-offset-4 col-xs-8 col-md-offset-0'>
                                                                    <h4><label>Organisation: <span style='color: gray';>$organisation</span></label></h4>
                                                                </div>
                                                            </div>
                            
                                                            <div class='row'>
                                                            <div class='col-md-8 col-xs-offset-2 col-sm-offset-4 col-xs-8 col-md-offset-0'>
                                                                    <h4><label>Email: <span style='color: gray';>$email</span></label></h4>
                                                                </div>
                                                                </div>
                                                            <div class='row'>
                                                            <div class='col-md-8 col-xs-offset-2 col-sm-offset-4 col-xs-8 col-md-offset-0'>
                                                                    <h4><label>Contact: <span style='color: gray';>$contact</span></h4>
                                                                </div>
                                                                </div>
                                                            
                                                            <div class='row'>
                                                            <div class='col-md-8 col-xs-offset-2 col-sm-offset-4 col-xs-8 col-md-offset-0'>
                                                                    <h4><label>State: <span style='color: gray';>$state</span></h4>
                                                                </div>
                                                                </div>
                                                            
                                                            <div class='row'>
                                                            <div class='col-md-8 col-xs-offset-2 col-sm-offset-4 col-xs-8 col-md-offset-0'>
                                                                    <h4><label>City: <span style='color: gray';>$city</span></label></h4>
                                                                </div>
                                                                </div>

                                                                <div class='row'>
                                                                <div class='col-md-8 col-xs-offset-2 col-sm-offset-4 col-xs-8 col-md-offset-0'>
                                                                        <h4><label>Locality: <span style='color: gray';>$locality</span></label></h4>
                                                                    </div>
                                                                    </div>
                                                                    <div class='row'>
                                                                    <div class='col-md-8 col-xs-offset-2 col-sm-offset-4 col-xs-8 col-md-offset-0'>
                                                                            <h4><label>Address: <span style='color: gray';>$address</span></label></h4>
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
        }
else
{
    echo "<div class = 'alert alert-warning'>Not you fault.Error on our side.We will fix it asap.</div>";
    exit;
}
?>