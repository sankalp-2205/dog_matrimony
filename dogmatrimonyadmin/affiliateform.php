<?php
session_start();
include 'connection.php';
if(!array_key_exists("adminusername",$_SESSION))
{
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add Affiliate</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/accordionstyling.css" rel="stylesheet">
  <style>
  @import "font-awesome.min.css";
@import "font-awesome-ie7.min.css";
.error {
    font-size: small;
  color: #a94442;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}
/* Space out content a bit */
body {
  padding-top: 20px;
  padding-bottom: 20px;
}

/* Everything but the jumbotron gets side spacing for mobile first views */
.header,
.marketing,
.footer {
  padding-right: 15px;
  padding-left: 15px;
}

/* Custom page header */
.header {
  border-bottom: 1px solid #e5e5e5;
}
/* Make the masthead heading the same height as the navigation */
.header h3 {
  padding-bottom: 19px;
  margin-top: 0;
  margin-bottom: 0;
  line-height: 40px;
}

/* Custom page footer */
.footer {
  padding-top: 19px;
  color: #777;
  border-top: 1px solid #e5e5e5;
}

/* Customize container */
@media (min-width: 768px) {
  .container {
    max-width: 730px;
  }
}
.container-narrow > hr {
  margin: 30px 0;
}

/* Main marketing message and sign up button */
.jumbotron {
  text-align: center;
  border-bottom: 1px solid #e5e5e5;
}
.jumbotron .btn {
  padding: 14px 24px;
  font-size: 21px;
}

/* Supporting marketing content */
.marketing {
  margin: 40px 0;
}
.marketing p + h4 {
  margin-top: 28px;
}

/* Responsive: Portrait tablets and up */
@media screen and (min-width: 768px) {
  /* Remove the padding we set earlier */
  .header,
  .marketing,
  .footer {
    padding-right: 0;
    padding-left: 0;
  }
  /* Space out the masthead */
  .header {
    margin-bottom: 30px;
  }
  /* Remove the bottom border on the jumbotron for visual effect */
  .jumbotron {
    border-bottom: 0;
  }
}
      </style>

</head>
  <!-- Page Wrapper -->
  <body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="http://websh.offyoucode.co.uk/dogmatrimonyadmin/loggedin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="http://websh.offyoucode.co.uk/dogmatrimonyadmin/users.php">
          <i class="fa fa-child"></i>
          <span>Users</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://websh.offyoucode.co.uk/dogmatrimonyadmin/users.php">
          <i class="fa fa-users"></i>
          <span>Affiliates</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://websh.offyoucode.co.uk/dogmatrimonyadmin/dogs.php">
          <i class="fas fa-dog"></i>
          <span>Dogs</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://websh.offyoucode.co.uk/dogmatrimonyadmin/allactiverequests.php">
          <i class="fas fa-comments"></i>
          <span>Active Requests</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://websh.offyoucode.co.uk/dogmatrimonyadmin/allactiveappointments.php">
          <i class="fa fa-calendar"></i>
          <span>Active appointments</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://websh.offyoucode.co.uk/dogmatrimonyadmin/requesthistory.php">
        <i class="fas fa-check-square"></i>
          <span>Request History</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://websh.offyoucode.co.uk/dogmatrimonyadmin/appointmenthistory.php">
        <i class="fa fa-history"></i>
          <span>Appointment History</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://websh.offyoucode.co.uk/dogmatrimonyadmin/overdue.php">
        <i class="fa fa-spinner"></i>
          <span>Overdue appointments</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://websh.offyoucode.co.uk/dogmatrimonyadmin/pendingrequests.php">
        <i class="fas fa-clock"></i>
          <span>Pending Requests</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://websh.offyoucode.co.uk/dogmatrimonyadmin/confirmedmatches.php">
          <i class="fa fa-check-circle"></i>
          <span>Confirmed Matches</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="http://websh.offyoucode.co.uk/dogmatrimonyadmin/cancelled_declined_requests.php">
          <i class="fa fa-times"></i>
          <span>Cancelled/Declined Requests</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="http://websh.offyoucode.co.uk/dogmatrimonyadmin/viewed_unattended_matches.php">
          <i class = "fas fa-eye"></i>
          <span>Viewed Unattended Matches</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="http://websh.offyoucode.co.uk/dogmatrimonyadmin/unviewedmatches.php">
        <i class="fas fa-hourglass"></i>
          <span>Unviewed Matches</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://websh.offyoucode.co.uk/dogmatrimonyadmin/allreports.php">
          <i class="fa fa-file"></i>
          <span>Reports</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Sankalp Agrawal</span>
                <img class="img-profile rounded-circle" src="admin.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
      
        <div class="container">
    <h1 class="well">Add Affiliate Form</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form id = 'addaffiliate'>
							<div id = "signupmessage"></div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-12 form-group">
								<label>Full Name</label>
								<input type="text" name = "name" placeholder="Enter Full Name Here.." class="form-control">
							</div>
						</div>					
						<div class="form-group">
							<label>Address</label>
							<textarea placeholder="Enter Address Here.."  name = "address" rows="3" class="form-control"></textarea>
						</div>	
                        <div class="form-group">
								<label>Locality</label>
								<input type="text"  name = "locality" placeholder="Enter Locality Here.." class="form-control">
							</div>
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text"  name = "city" placeholder="Enter City Name Here.." class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label>State</label>
								<input type="text"  name = "state" placeholder="Enter State Name Here.." class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label>Zip</label>
								<input type="number"  name = "zip" placeholder="Enter Zip Code Here.." class="form-control">
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Affiliation Username</label>
								<input type="text"   name = "username" placeholder="Enter Username Here.." class="form-control">
							</div>		
							<div class="col-sm-6 form-group">
								<label>Organisation</label>
								<input type="text"  name = "organisation" placeholder="Enter Organisation Name Here.." class="form-control">
							</div>	
						</div>						
					<div class="form-group">
						<label>Phone Number</label>
						<input type="number"  name = "contact" placeholder="Enter Phone Number Here.." class="form-control">
          </div>	
          <div class = "row">
          <div class="col-sm-6 form-group">
						<label>Category</label>
						<select class="form-control" name = "category">
              <option>gold</option>
              <option>silver</option>
              <option>bronze</option>
            </select>
					</div>		
                    <div class="col-sm-6 form-group">
						<label>Rate</label>
						<input type="number"  name = "rate" placeholder="Rate/Dog.." class="form-control">
          </div>		
          </div>
					<div class="form-group">
						<label>Email Address</label>
						<input type="email"  name = "email" placeholder="Enter Email Address Here.." class="form-control">
					</div>	
					<div class="form-group">
						<label>Password</label>
                        <i class="fas fa-cogs" id= 'generate_password' style = "cursor: pointer;" title="Generate Random Password"></i>
						<input type="password" id = 'password' name = 'password' placeholder="Enter Password.." class="form-control">
					</div>
					<button type="submit" name = 'add' class="btn btn-lg btn-info">Add</button>					
					</div>
                    <br>
				</form> 
				</div>
	</div>
	</div>
                    </div> <!--/.next-form-->
                </form>
            </div>
        </div>
    </div>
</div>
        
        <!-- /.container-fluid -->

      </div>
</div>
</div>
</div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>&copy; All rights reserved by Sankalp</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index.php?logout=1">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <div style = "z-index = 999;" id = 'spinner'>
            <img src = 'ajax-loader.gif' height = '64' width = '64' />
            <br>
            Loading...
            </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
$(function() {
  $("#addaffiliate").validate({
    rules: {
      name: "required",
      address: "required",
      locality: "required",
      city: "required",
      state: "required",
      zip: "required",
      username: "required",
      organisation: "required",
      contact: "required",
      category: "required",
      rate : 'required',
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 8
      }
    },
    messages: {
        name: "Please Enter The Name",
      address: "Please Enter The Address",
      locality: "Please Enter The Locality",
      city: "Please Enter The City",
      state: "Please Enter The State",
      zip: "Please Enter The Zip",
      username: "Please Enter The Username",
      organisation: "Please Enter The Organisation",
      contact: "Please Enter The Phone Number",
      rate: "Please Enter The Rate Per Dog",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
      },
      email: "Please enter a valid email address"
    },
    submitHandler: function(form) {
        event.preventDefault();
        var datatopost = $("#addaffiliate").serializeArray();
        console.log(datatopost);
        $.ajax({
        url: "affiliateformcode.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data == 'usernameexists')
            {
                $("#signupmessage").html("<div class = 'alert alert-danger'>This username is already taken </div>");
                $(window).scrollTop(0);
            }
            else
                {
                    $("#signupmessage").html(data);
                    $(window).scrollTop(0);
                    form.submit();
                }

        },
        error: function(){
            $("#signupmessage").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
    }
  });
});

$("#generate_password").click(function(){
   var result           = '';
   var characters       = 'ABCDEF&GHIJKLMNOPQRSTU0123456789VWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < 8; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   $("#password").val(result);
})

</script>


</body>

</html>
