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
                $username = $rows['username']; 
                $name = $rows['name'];
                $email = $rows['email'];
                $contact = $rows['contact'];
                $state = $rows['state'];
                $city = $rows['city'];
                $locality = $rows['locality'];
                $profilepicture = $rows['profilepicture'];
             }
             if($profilepicture == "NULL")
             {
                 $message =   "<a> <img align='right' class='fb-image-profile thumbnail' id = 'profile' src='profilepicture/dummy.png' data-toggle ='modal' data-target = '#updateprofile' alt='Profile image example'/></a>";
             }
             else
             {
                 $message = "<a> <img align='right' class='fb-image-profile thumbnail' id = 'profile' src='$profilepicture' data-toggle ='modal' data-target = '#updateprofile' alt='Profile image example'/></a>";
             }
        echo "<div class='modal fade' id='editmodal' tabindex='-1' role='dialog' aria-labelledby='editmodalLabel' aria-hidden='true'>
<div class='modal-dialog'>
    <div class='modal-content'>
        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
            <h4 class='modal-title' id='myModalLabel'>Change Username</h4>
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
<label class='col-sm-2 control-label' for='username'>New Username</label>  
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
<br>
<div class='text-center'>
<button class='btn green' type='button' id = 'submiteditform'><span class='glyphicon glyphicon-thumbs-up'></span>
                    Submit
                    </button>
                    <button class='btn btn-danger' data-dismiss='modal'><span class='glyphicon glyphicon-remove-sign'></span>
                    Cancel
                    </button>
                    </div>


</fieldset>

</div>

</div>
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
                                <div class='col-md-8 col-xs-offset-2 col-sm-offset-4 col-md-offset-0 col-xs-8  profile-header-section1 pull-left'>
                                    <h1>Your Profile</h1>
                                    <br>
                                </div>
                                <div class='col-md-4 col-xs-6 col-sm-4 col-sm-offset-4 col-xs-offset-2 col-md-offset-0 profile-header-section1 text-right pull-rigth'>
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
                                                                <div class='col-md-8 col-xs-offset-2 col-sm-offset-4 col-xs-8 col-md-offset-0'>
                                                                    <h4><label>Username: <span style='color: gray';>$username</span>&nbsp;&nbsp;<span style = 'cursor : pointer;' data-toggle='modal' data-target='#editmodal'><i class='fa fa-pencil-square-o'></i></span></label></h4>
                                                                </div>
                                            
                                                            </div>
                                                            <div class='row'>
                                                            <div class='col-md-8 col-xs-offset-2 col-sm-offset-4 col-xs-8 col-md-offset-0'>
                                                                    <h4><label>Name: <span style='color: gray';>$name</span></label></h4>
                                                                </div>
                                                            </div>
                            
                                                            <div class='row'>
                                                            <div class='col-md-8 col-xs-offset-2 col-sm-offset-4 col-xs-8 col-md-offset-0'>
                                                                    <h4><label>Email: <span style='color: gray';>$email</span></label></h4>
                                                                </div>
                                                                </div>
                                                            <div class='row'>
                                                            <div class='col-md-8 col-xs-offset-2 col-xs-8  col-sm-offset-4 col-md-offset-0'>
                                                                    <h4><label>Contact: <span style='color: gray';>$contact</span></h4>
                                                                </div>
                                                                </div>
                                                            
                                                            <div class='row'>
                                                            <div class='col-md-8 col-xs-offset-2 col-xs-8 col-sm-offset-4 col-md-offset-0'>
                                                                    <h4><label>State: <span style='color: gray';>$state</span></h4>
                                                                </div>
                                                                </div>
                                                            
                                                            <div class='row'>
                                                            <div class='col-md-8 col-xs-offset-2 col-xs-8 col-sm-offset-4 col-md-offset-0'>
                                                                    <h4><label>City: <span style='color: gray';>$city</span></label></h4>
                                                                </div>
                                                                </div>

                                                                <div class='row'>
                                                                <div class='col-md-8 col-xs-offset-2 col-xs-8 col-sm-offset-4 col-md-offset-0'>
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