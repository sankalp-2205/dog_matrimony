<?php
session_start();
include 'connection.php';
date_default_timezone_set('Asia/Kolkata');
$username = $_SESSION['username'];
$sql = "SELECT * FROM requests ORDER BY time DESC";
$count = 0;
if($result = $link ->query($sql))
        {
             while($rows = $result->fetch_array(MYSQLI_ASSOC))
             {  
                $sentfrom = $rows['fromdogid']; 
                $sentto = $rows['todogid'];
                 $sql2 = "SELECT * FROM dogs WHERE dogid = '$sentto' AND username ='$username'";          
                if($result2 = $link ->query($sql2))
                 {
                     
                    if($result2->num_rows == 1)
                    {
                        
                        $sql4 = "SELECT * FROM dogs WHERE dogid = '$sentto'";
                        if($result4 = $link ->query($sql4))
                        {
                            while ($rows4 = $result4->fetch_array(MYSQLI_ASSOC))
                            {
                                $fordogname = $rows4['dogname'];
                            }
                        }
//                     $rows2 = $result2->fetch_array(MYSQLI_ASSOC);
                         $sql3 = "SELECT * FROM dogs NATURAL JOIN users WHERE dogid = '$sentfrom'";


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
                $sql5 = "SELECT * FROM requests WHERE fromdogid = '$id' AND todogid = '$sentto'";
                        if($result5 = $link ->query($sql5))
                        {
                            while ($rows5 = $result5->fetch_array(MYSQLI_ASSOC))
                            {
                                $requestid = $rows5['id'];
                                $status = $rows5['status'];
                            }
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
                    <p class='text-left'><strong>Request Received For: </strong> $fordogname.
                        </p>
                    <p class='text-left'><strong>Age(in months): </strong> $age.
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
    if($status == "pending")
    {
        $count++;
        echo "     <div class='container'>
        <div class='row'>
            <div class='col-sm-offset-4 col-sm-7 col-lg-offset-3 col-lg-6'>
             <div class='well profile'>
                <div class='col-xs-12'>
                    <div class='col-xs-12 col-sm-8'>
                        <div id='dogrequestmessage'></div>
                        <h2>$name</h2>
                        <p><strong>Request ID: </strong> $requestid </p>
                        <p><strong>Request Received For: </strong> $fordogname </p>
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
                        <button class='btn btn-success btn-block' name = 'accept[$id][$sentto]' id = 'accept_request'><span class='fa fa-plus-circle'></span> Accept </button>
                    </div>
                    <div class='col-xs-12 col-sm-4 emphasis'>
                        <button class='btn btn-danger btn-block'  name = 'decline[$id][$sentto]' id = 'decline_request'><span class='fa fa-plus-circle'></span> Decline </button>
                    </div>
                    <div class='col-xs-12 col-sm-4 emphasis'>
                        <button class='btn btn-info btn-block' data-toggle='modal' data-target='#myModal_$id' name = 'viewprofile[$id]' id= 'view_profile'><span class='fa fa-user'></span>Profile </button>
                    </div>
                </div>
             </div>                 
            </div>
        </div>
    </div>";
    }
    else
    {
        $count++;
        echo " <div class='container'>
        <div class='row'>
            <div class='col-sm-offset-4 col-sm-7 col-lg-offset-3 col-lg-6'>
             <div class='well profile'>
                <div class='col-xs-12'>
                    <div class='col-xs-12 col-sm-8'>
                        <div id='dogrequestmessage'></div>
                        <h2>$name</h2>
                        <p><strong>Request ID: </strong> $requestid </p>
                        <p><strong>Request Received For: </strong> $fordogname </p>
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
                        <button class='btn btn-default btn-block disabled'  name = 'status[$id][$sentto]' id = 'status'><span class='fa fa-plus-circle'></span>$status </button>
                    </div>
                    <div class='col-xs-12 col-sm-4 emphasis'>
                        <button class='btn btn-info btn-block' data-toggle='modal' data-target='#myModal_$id' name = 'viewprofile[$id]' id= 'view_profile'><span class='fa fa-user'></span>Profile </button>
                    </div>
                </div>
             </div>                 
            </div>
        </div>
    </div>";
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
     if($count == 0)
            {
                echo "
                <div class='container'>
	<div class='row'>
		<div class='col-sm-offset-4 col-sm-7 col-lg-offset-3 col-lg-6'>
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
                    <p>You have not received any request yet</p>
                </div>
            </div>
    	 </div>                 
		</div>
	</div>
</div>";
                 
             }
}
            else
            {
                echo "<div class = 'alert alert-warning'>Not you fault.Error on our side.We will fix it asap.</div>";
                exit;                           
            }

?>