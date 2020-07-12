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

  <title>Active Requests</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/accordionstyling.css" rel="stylesheet">
  <style>
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
      <li class="nav-item active">
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
      
        <div class="container-fluid">

        <div id = "allactiverequests"></div>
        
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
  <script>
$(function(){ 
        $("#spinner").show();
        $("#allactiverequests").fadeOut();
          $.ajax({
        url: "allactiverequestscode.php",
        type: "POST",
        success: function(data){
                    if(data)
                        {
                          $("#spinner").hide();
                             $("#allactiverequests").html(data);
                             $("#allactiverequests").slideDown();
                        }
        },
        error: function(){
          $("#spinner").hide();
            $("#allactiverequests").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
            $("#allactiverequests").slideDown();
        }
    });
  });
</script>

</body>

</html>
