<?php
session_start();
include 'connection.php';
if(!array_key_exists("username",$_SESSION))
{
    header("location:http://websh.offyoucode.co.uk/alternate/index.php?logout=1");
}
echo $_SESSION['username'];

//$("#usernameafterlogin").html($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible"
content="IE=edge">
<meta name="viewport" content="width=device-width,
initial-scale=1">
<title>Dog Matrimony</title>
<link href="css/bootstrap.min.css"
rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="mystyling.css" />
<link rel="stylesheet" href="mystyling2.css" />
<link rel="stylesheet" href="notificationstyling.css" />
<style>
    .container
    {
        margin-bottom: 40px;
        margin-top:10px;
    }
    .fb-profile img.fb-image-lg{
    z-index: 0;
    width: 100%;  
    margin-bottom: 10px;
}
#dpbox
{
    margin: -150px 10px 10px 25px;
    max-height: 300px;
    overflow: hidden;
    float :right;
    width: 20%;
    z-index: 9;
}  
.fb-image-profile
{
    margin: 0px 10px 80px 50px;
    z-index: 9;
    width: 100%; 
}
@media (max-width:650px)
{
    #dpbox
{
    margin: -45px 10px 10px 25px;
    max-height: 100px;
    overflow: hidden;
    float :right;
    width: 20%;
    z-index: 9;
}  
.fb-profile-text>h1{
    font-weight: 700;
    font-size:16px;
}
.fb-image-profile
{
    margin: -3px 10px 10px 25px;
    z-index: 9;
    width: 100%; 
}
}
@media (min-width:650px) and (max-width:900px)
{
    #dpbox
{
    margin: -45px 10px 10px 25px;
    max-height: 200px;
    overflow: hidden;
    float :right;
    width: 20%;
    z-index: 9;
}  
.fb-profile-text>h1{
    font-weight: 700;
    font-size:16px;
}
.fb-image-profile
{
    margin: -5px 10px 10px 25px;
    z-index: 9;
    width: 100%; 
}
}
@media (min-width:1370px)
{
#dpbox
{
    margin: -230px 10px 10px 25px;
    max-height: 350px;
    overflow: hidden;
    float :right;
    width: 20%;
    z-index: 9;
}  
.fb-profile-text>h1{
    font-weight: 500;
    font-size:46px;
}

.fb-image-profile
{
    margin: -10px 10px 10px 25px;
    width : 100%;
}
}
.border{
  
    margin-bottom:10px;
  }
  .preview2{
              margin: auto;
              max-width: 50%;
              max-height: 30%;
          }
  .user-profil-part{
    padding-bottom:30px;
    background-color:#FAFAFA;
  }
  
  .user-detail-row{
    margin:0px; 
  }
  .user-detail-section2 p{
    font-size:12px;
    padding: 0px;
    margin: 0px;
  }
  .user-detail-section2{
    margin-top:10px;
  }
  .user-detail-section2 span{
    color:#7CBBC3;
    font-size: 20px;
  }
  .user-detail-section2 small{
    font-size:12px;
    color:#D3A86A;
  }
  
  
  .profile-header-section1 h1{
    font-size: 25px;
    margin: 0px;
  }
  .profile-header-section1 h5{
    color: #0062cc;
  }
  .req-btn{
    height:30px;
    font-size:12px;
  }
  
  .profile-tag p{
    font-size: 12px;
    color:black;
  }
  .profile-tag i{
    color:#ADADAD;
    font-size: 20px;
  }
  #notify
  {
      height: 45px;
      width : 45px;
  }
  #spinner
  {
      opacity : 9999;
  }
 

  .nav-link{
    font-size: 1.2em;    
  }
  .required
  {
      color : red;
  }
  
</style>
<title>Dog Matrimony</title>
  </head>
  <body>
      <div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header" style="margin-top:30px">
            <h3>Options</h3>
        </div>

        <ul class="list-unstyled components">
            <li class = 'active'>
                <a href="http://websh.offyoucode.co.uk/dog%20matrimony/loggedin.php">My Profile</a>
            </li>
             <li>
                <a href = "#adddogmodal" data-toggle = "modal">add dog</a>
            </li>
            <li>
                <a href="http://websh.offyoucode.co.uk/dog%20matrimony/showmydogs.php">My dogs</a>
            </li>
            <li>
                <a href="http://websh.offyoucode.co.uk/dog%20matrimony/receivedrequest.php">Request Received</a>
            </li>
            <li>
                <a href="http://websh.offyoucode.co.uk/dog%20matrimony/requestsentwebpage.php">Request Sent</a>
            </li>
            <li>
                <a href="http://websh.offyoucode.co.uk/dog%20matrimony/confirmedmatches.php">Confirmed Matches</a>
            </li>
            <li>
                <a href="http://websh.offyoucode.co.uk/dog%20matrimony/myappointments.php">My Appointments</a>
            </li>
           
        </ul>

    </nav>
    <!-- Page Content -->
       
</div>
</div>
    
      <!-- navbar -->
    <nav class="navbar navbar-custom navbar-fixed-top">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class = "navbar-brand" href="#"> <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button type="button" id="sidebarCollapse" class="btn btn-light" style = "background-color:#1b1f21; margin-top:-5px;" >
                    <i class="fa fa-bars" style="color:white;"></i>
                </button>
        </nav></a>
    <a class = "navbar-brand" href="#" style= "margin-left: -15px;">Dog Matrimony</a>
    <button type = "button" class = "navbar-toggle" data-target = "#navbarcollapse " data-toggle="collapse">
        <span class = "sr-only">Toggle navigation</span>
        <span class = "icon-bar"><i id = "bell" class="fa fa-bell" style="font-size:18px; display:none; color:#B97745;"></i></span>
        <span class = "icon-bar"></span>
        <span class = "icon-bar"></span>
    </button>
    </div>
    <div class="navbar-collapse collapse" id="navbarcollapse">
        <ul class = "nav navbar-nav">
        </ul>
        <ul class = "nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" id = 'numberofnotifications' data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" onclick = "notification()">Notification</a>
          <ul class="dropdown-menu notify-drop">
            <div class="notify-drop-title">
            	<div class="row">
            		<div class="col-md-6 col-sm-6 col-xs-6">Notifications</div>
            	</div>
            </div>
            <div class="drop-content">
                </li>
                <div id = 'notifications'></div>
            </div>
          </ul>
        </li>
        <li><a href = "#">Hi <span id = "usernameafterlogin"> </span></a></li>
        <li><a href = "http://websh.offyoucode.co.uk/alternate/index.php?logout=1">Log out</a></li>
        </ul>
    </div>
    </div>  
    </nav>
                <div id= "editprofile"></div>
                <div id = "myprofile"></div>
      <!--Workarea -->
      

    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contact">Contactarme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p for="msj">Se enviará este mensaje a la persona que desea contactar, indicando que te quieres comunicar con el. Para esto debes de ingresar tu información personal.</p>
                    </div>
                    <div class="form-group">
                        <label for="txtFullname">Nombre completo</label>
                        <input type="text" id="txtFullname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtEmail">Email</label>
                        <input type="text" id="txtEmail" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtPhone">Teléfono</label>
                        <input type="text" id="txtPhone" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" (click)="openModal()" data-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>

      
<!--      add dog-->
            <form id="adddogform" method = "post">
          <div class="container-fluid">
              <div class="row">
              <div class="col-xs-12">
                   <div id="adddogmodal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
                <div id="header" class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                    <h4><strong> Add Dog Form:</strong></h4>
                </div>
                 <div class="modal-body">
                     <div id = "add_dog_message"></div>
                     <div class="form-group">
                     <label for="name">Pet Name:</label><span class="required">*</span>
            <input type="text" name="name" placeholder="dog name" class="form-control">
            <div class="valid-feedback mb3" id = "nameerror" style = "color: red"></div>
             </div>
            <div class="form-group">
            <label for="age">Age(in months):</label><span class="required">*</span>
            <input type="number_format" name="age" placeholder="dog age" class="form-control">
            <div class="valid-feedback mb3" id = "ageerror" style = "color: red"></div>
             </div>
                   <div class="form-group">
                   <label for="breed">Breed(If your dog is mixed breed,select the main breed):</label><span class="required">*</span>
                   <select id="breed" class="form-control" name = "breed">
                   <option selected>Select breed</option>
<option>Affenpinscher</option>
<option>Afghan Hound</option>
<option>Airedale Terrier</option>
<option>Akita</option>
<option>Alaskan Malamute</option>
<option>American English Coonhound</option>
<option>American Eskimo Dog</option>
<option>American Foxhound</option>
<option>American Hairless Terrier</option>
<option>American Leopard Hound</option>
<option>American Pitbull Terrier</option>
<option>American Staffordshire Terrier</option>
<option>American Water Spaniel</option>
<option>Anatolian Shepherd Dog</option>
<option>Appenzeller Sennenhunde</option>
<option>Australian Cattle Dog</option>
<option>Australian Shepherd</option>
<option>Australian Terrier</option>
<option>Azawakh</option>
<option>Barbet</option>
<option>Basenji</option>
<option>Basset Fauvre de Bretagne</option>
<option>Basset Hound</option>
<option>Beagle</option>
<option>Bearded Coolie</option>
<option>Beauceron</option>
<option>Bedlington Terrier</option>
<option>Belgian Laekenois</option>
<option>Belgian Malinois</option>
<option>Belgian Sheepdog</option>
<option>Belgian Tervuren</option>
<option>Bergamasco</option>
<option>Berger Picard</option>
<option>Bernese Mountain Dog</option>
<option>Bichon Frise</option>
<option>Biewer Terrier</option>
<option>Black and Tan Coon Hound</option>
<option>Black Russian Terrier</option>
<option>Bloodhound</option>
<option>Bluetick Coonhound</option>
<option>Boerboel</option>
<option>Bolognese</option>
<option>Border Collie</option>
<option>Border Terrier</option>
<option>Borzoi</option>
<option>Boston Terrier</option>
<option>Bouvier de Flandres</option>
<option>Boxer</option>
<option>Boykin Spaniel</option>
<option>Bracco Italiano</option>
<option>Braque du Bourbonnais</option>
<option>Briard</option>
<option>Brittany</option>
<option>Broholmer</option>
<option>Brussels Griffon</option>
<option>Bull Terrier</option>
<option>Bull Terrier miniature</option>
<option>Bulldog</option>
<option>Bullmastiff</option>
<option>Cairn Terrier</option>
<option>Canaan Dog</option>
<option>Cane Corso</option>
<option>Cardinal Welsh Corgi</option>
<option>Catahoula Leopard Dog</option>
<option>Caucasian Ovcharka</option>
<option>Cavalier king Charles Spaniel</option>
<option>Central Asian Shepherd Dog</option>
<option>Cesky Terrier</option>
<option>Chesapeake Bay Retriever</option>
<option>Chihuahua</option>
<option>Chinese Crested Dog</option>
<option>Chinese Shar-Pei</option>
<option>Chinook</option>
<option>Chow Chow</option>
<option>Cirneco Dell' Etna</option>
<option>Clumber Spaniel</option>
<option>Cocker Spaniel</option>
<option>Collie</option>
<option>Coton de Tulear</option>
<option>Curly-Coated Retriever</option>
<option>Czechoslovakian Vlcak</option>
<option>Dachshund</option>
<option>Dalmatian</option>
<option>Dandie Dinmont Terrier</option>
<option>Danish-Swedish Farm Dog</option>
<option>Deutscher Wachtelhund</option>
<option>Doberman Pinscher</option>
<option>Dogo Argentino</option>
<option>Dogo Canario</option>
<option>Dogue de Bordeaux</option>
<option>Drever</option>
<option>Dutch Shepherd</option>
<option>Dventsche Patrijshond</option>
<option>English Cocker Spaniel</option>
<option>English Foxhound</option>
<option>English Setter</option>
<option>English Springer Spaniel</option>
<option>English Toy Spaniel</option>
<option>Entlebucher Mountain Dog</option>
<option>Estrela Mountain Dog</option>
<option>Eurasier</option>
<option>Field Spaniel</option>
<option>Finnish Lapphund</option>
<option>Finnish Spitz</option>
<option>Flat-Coated Retriever</option>
<option>French Bulldog</option>
<option>French Spaniel</option>
<option>German Longhaired Pointer</option>
<option>German Pinscher</option>
<option>German Shepherd Dog</option>
<option>German shorthaired Pointer</option>
<option>German Spitz</option>
<option>German wirehaired Pointer</option>
<option>Giant Schnauzer</option>
<option>Glen of Imaal Terrier</option>
<option>Golden Retriever</option>
<option>Gordon Setter</option>
<option>Grand Basset Griffon Vendeen</option>
<option>Great Dane</option>
<option>Great Pyrenees</option>
<option>Greater Swiss Mountain Dog</option>
<option>Greyhound</option>
<option>Hamiltonstovare</option>
<option>Harrier</option>
<option>Havanese</option>
<option>Hovawart</option>
<option>Ibizan Hound</option>
<option>Iceland Sheepdog</option>
<option>Irish Red and White Setter</option>
<option>Irish Setter</option>
<option>Irish Terrier</option>
<option>Irish Water Spaniel</option>
<option>Irish Wolfhound</option>
<option>Italian Greyhound</option>
<option>Jagd Terrier</option>
<option>Japanese Chin</option>
<option>Jindo</option>
<option>Kai Ken</option>
<option>Karelian Bear Dog</option>
<option>Keeshond</option>
<option>Kerry Blue Terrier</option>
<option>Kishu Ken</option>
<option>Komondor</option>
<option>Kooikerhondje</option>
<option>Kuvasz</option>
<option>Labrador Retriever</option>
<option>Lagotto Romagnolo</option>
<option>Lakeland Terrier</option>
<option>Lancashire Heeler</option>
<option>Lasha Apso</option>
<option>Leonberger</option>
<option>Lowchen</option>
<option>Maltese</option>
<option>Manchester Terrier</option>
<option>Mastiff</option>
<option>Miniature American Shepherd</option>
<option>Miniature Bull Terrier</option>
<option>Miniature Pinscher</option>
<option>Miniature Schnauzer</option>
<option>Mudi</option>
<option>Neapolitan Mastiff</option>
<option>Newfoundland</option>
<option>Norfolk Terrier</option>
<option>Norrbottenspets</option>
<option>Norwegian Buhund</option>
<option>Norwegian Elkhound</option>
<option>Norwegian Lundehund</option>
<option>Norwich Terrier</option>
<option>Nova Scotia Duck-Tolling Retriever</option>
<option>Old English Sheepdog</option>
<option>Otterhound</option>
<option>Papillon</option>
<option>Parson Russel Terrier</option>
<option>Pekingese</option>
<option>Pembroke Welsh Corgi</option>
<option>Perro de Presa Canario</option>
<option>Peruvian Luca Orchid</option>
<option>Petit Basset Griffon Vendeen</option>
<option>Pharaoh Hound</option>
<option>Plott</option>
<option>Pointer</option>
<option>Polish Lowland Sheepdog</option>
<option>Pomeranian</option>
<option>Poodle</option>
<option>Portugese Podengo Pequeno</option>
<option>Portugese Pointer</option>
<option>Portugese Sheepdog</option>
<option>Portugese Water Dog</option>
<option>Pug</option>
<option>Puli</option>
<option>Pyrenean Mastiff</option>
<option>Pyrenean Shepherd</option>
<option>Rafeiro do Alentejo</option>
<option>Rat Terrier</option>
<option>Redbone Coonhound</option>
<option>Rhodesian Ridgeback</option>
<option>Rottweiler</option>
<option>Russel Terrier</option>
<option>Russian Toy</option>
<option>Russian Tsvetnaya Bolonka</option>
<option>Saluki</option>
<option>Samoyed</option>
<option>Schapendoes</option>
<option>Schipperke</option>
<option>Scottish Deerhound</option>
<option>Scottish Terrier</option>
<option>Sealyham Terrier</option>
<option>Shetland Sheepdog</option>
<option>Shiba Inu</option>
<option>Shih Tzu</option>
<option>Shikoku</option>
<option>Siberian Husky</option>
<option>Silky Terrier</option>
<option>Skye Terrier</option>
<option>Sloughi</option>
<option>Small Munsterlander Pointer</option>
<option>Smooth Fox Terrier</option>
<option>Soft Coated Wheaten Terrier</option>
<option>Spanish Mastiff</option>
<option>Spanish Water Dog</option>
<option>Spinone Italiano</option>
<option>St. Bernard</option>
<option>Stabyhoun</option>
<option>Staffordshire Bull Terrier</option>
<option>Standard Schnauzer</option>
<option>Sussex Spaniel</option>
<option>Swedish Lapphund</option>
<option>Swedish Vallhound</option>
<option>Thai Ridgeback</option>
<option>Tibetan Mastiff</option>
<option>Tibetan Spaniel</option>
<option>Tibetan Terrier</option>
<option>Tornjak</option>
<option>Tosa</option>
<option>Toy Fox Terrier</option>
<option>Treeing Tennessee Brindle</option>
<option>Treeing Walker Coonhound</option>
<option>Vizsla</option>
<option>Weimaraner</option>
<option>Welsh Springer Spaniel</option>
<option>Welsh Terrier</option>
<option>West Highland White Terrier</option>
<option>Whippet</option>
<option>Wire Fox Terrier</option>
<option>Wirehaired Pointing Griffon</option>
<option>Wirehaired Vizsla</option>
<option>Working Kelpie</option>
<option>Xoloitzcuintli</option>
<option>Yorkshire Terrier</option>
</select>
            </select>
            <div class="valid-feedback mb3" id = "breederror" style = "color: red"></div>
             </div>
            <div class="form-group">
            <label for="weight">Weight(in kg):</label><span class="required">*</span>
            <input type="number_format" name="weight" placeholder="dog weight" class="form-control">
            <div class="valid-feedback mb3" id = "weighterror" style = "color: red"></div>
             </div>
             <div class="form-group">
             <label for="breed">Gender:</label><span class="required">*</span>
                <select id="gender" class="form-control" name = "gender">
                   <option selected>Select gender</option>
                    <option>Male</option>
                <option>Female</option>
            </select>
            <div class="valid-feedback mb3" id = "gendererror" style = "color: red"></div>
             </div>
             <div class="form-group">
             <label for="weight">Recommended By:</label><span class="required">*</span>
            <select id="inputState" class="form-control" name = "organisation">
            <?php
            $options = "";
            $sql = "SELECT * FROM affiliates";
            if($result = $link ->query($sql))
            {
                while($rows = $result->fetch_array(MYSQLI_ASSOC))
                {
                    $organisation = $rows['organisation_name'];
                    $options.= "<option>$organisation</option>";
                }
            }
            ?>
            <option selected>Recommended By</option>
            <?php echo $options ?>
            <!-- <option>Just Dogs Patna</option>
            <option>Dog Care Centre</option>
            <option>Antra Pet Shop</option> -->
            <option>None Of These</option>
            </select>
            <div class="valid-feedback mb3" id = "organisationerror" style = "color: red"></div>
            </div>
            <div class="form-group">
             <label for="weight">Kennel Club Certified:</label><span class="required">*</span>
            <select id="kci" class="form-control" name = "kci">
            <option selected>Kennel Club Certified</option>
            <option>Yes</option>
            <option>No</option>
            </select>
            <div class="valid-feedback mb3" id = "certificationerror" style = "color: red"></div>
            </div>
            <div class="form-group">
            <label for="description">Description</label>
            <textarea maxlength = "100" name = "description" class="form-control rounded-0" id="description" rows="3"></textarea>
            </div>
                 <br>
             </div>
                   
                 <div class="modal-footer">
                     <button class="btn green">
                    Submit
                    </button>
                    <button class="btn btn-default" data-dismiss="modal">
                    Cancel
                    </button>
                </div>
              </div>      
        </div>
          </div>          
                  </div>
              </div>
        </div>
      </form>

      <!-- change password modal -->

      <div class='modal fade' id='changepasswordmodal' tabindex='-1' role='dialog' aria-labelledby='changepasswordmodalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
    <div class='modal-content'>
        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
            <h4 class='modal-title' id='myModalLabel'>Change Password</h4>
            </div>
        <div class='modal-body'>
        <div class="container">
<div class="row">
<div class="col-md-10">
<form method="post" id="passwordForm" class = "form-horizontal">
<div class='form-group'>
<div class='col-sm-9 col-md-7'>
<div id='errormessage'>
</div>
</div>
</div>
<div class='form-group'>
<label class='col-sm-2 control-label' for='currentpassword'>Current password:</label> 
<div class='col-xs-10 col-sm-4'>
<div class='input-group'>
<input id='currentpassword' name='currentpassword' type='password' placeholder='Current Password' class='form-control input-md'>
<div class="valid-feedback mb3" id = "currentpassworderror" style = "color: red">
</div>
</div>
</div>
</div>
<div class='form-group'>
<label class='col-sm-2 control-label' for='password'>New password:</label> 
<div class='col-xs-10 col-sm-4'>
<div class='input-group'>
<input id='password1' name='password1' type='password' placeholder='New Password' class='form-control input-md'>
<div class="col-sm-6">
<span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 7 Characters Long<br>
<span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
</div>
<div class="col-sm-6">
<span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
<span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Digit
</div>
<div class="valid-feedback mb3" id = "newpassworderror" style = "color: red"></div>
</div>
</div>
</div>
<div class='form-group'>
<label class='col-sm-2 control-label' for='password2'>Confirm password:</label>  
<div class='col-xs-12 col-sm-4'>
<div class='input-group'>
<input type="password" class="input-md form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off">
<div class="col-sm-12">
<span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
</div>
<div class="valid-feedback mb3" id = "confirmpassworderror" style = "color: red"></div>
</div>
</div>
</div>
<div class='text-center'>
<button class='btn green' type='button' id = 'changepasswordform'><span class='glyphicon glyphicon-thumbs-up'></span>
                    Submit
 </button>
 <button class='btn btn-danger' data-dismiss='modal'><span class='glyphicon glyphicon-remove-sign'></span>
                    Cancel
                    </button>
</div>
</form>
</div> 
</div>
</div>
</div>
</div>
</div>
</div> 


     
      <form id="updateprofileform" method = "post" enctype = "multipart/form-data">
          <div class="container-fluid">
              <div class="row">
              <div class="col-xs-12">
                   <div id="updateprofile" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
                <div id="header" class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                    <h4><strong> Add Profile Picture:</strong></h4>
                </div>
                 <div class="modal-body">
                     <div id = "updatepicturemessage"></div>
                     <div><img class = "preview2" id = "profilepic" src = "dummy.png"/></div>
                     <div class="form-group">
            <label for = 'picture'>Select Picture</label>
            <input type="file" name="picture" id = 'picture'>
             </div>
                 <br>
             </div>
                   
                 <div class="modal-footer">
                     <button class="btn green" id = 'updateprofilebutton'>
                    Submit
                    </button>
                    <button class="btn btn-default" data-dismiss="modal">
                    Cancel
                    </button>
                </div>
              </div>      
        </div>
          </div>          
                  </div>
      </form>
<!--      -->
      <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
      <br>
      <div id="mydogs">
    
      </div>

                  <div class="footer">
                      <p>&copy All rights reserved by Sankalp</p>
            </div> 

            
            <div id = 'spinner'>
            <img src = 'ajax-loader.gif' height = '64' width = '64' />
            <br>
            Loading...
            </div>

            <audio style = "display: none;" class="audios" id="audio" controls preload="none"> 
   <source src="audio.mp3" type="audio/mpeg">
</audio>
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/j
query.min.js"></script>
<script src="js/bootstrap.min.js"></script>
      
    <script>

    //change password

    $("input[type=password]").keyup(function(){
    var ucase = new RegExp("[A-Z]+");
	var lcase = new RegExp("[a-z]+");
	var num = new RegExp("[0-9]+");
	
	if($("#password1").val().length >= 7){
		$("#8char").removeClass("glyphicon-remove");
		$("#8char").addClass("glyphicon-ok");
		$("#8char").css("color","#00A41E");
	}else{
		$("#8char").removeClass("glyphicon-ok");
		$("#8char").addClass("glyphicon-remove");
		$("#8char").css("color","#FF0004");
	}
	
	if(ucase.test($("#password1").val())){
		$("#ucase").removeClass("glyphicon-remove");
		$("#ucase").addClass("glyphicon-ok");
		$("#ucase").css("color","#00A41E");
	}else{
		$("#ucase").removeClass("glyphicon-ok");
		$("#ucase").addClass("glyphicon-remove");
		$("#ucase").css("color","#FF0004");
	}
	if(lcase.test($("#password1").val())){
		$("#lcase").removeClass("glyphicon-remove");
		$("#lcase").addClass("glyphicon-ok");
		$("#lcase").css("color","#00A41E");
	}else{
		$("#lcase").removeClass("glyphicon-ok");
		$("#lcase").addClass("glyphicon-remove");
		$("#lcase").css("color","#FF0004");
	}
	if(num.test($("#password1").val())){
		$("#num").removeClass("glyphicon-remove");
		$("#num").addClass("glyphicon-ok");
		$("#num").css("color","#00A41E");
	}else{
		$("#num").removeClass("glyphicon-ok");
		$("#num").addClass("glyphicon-remove");
		$("#num").css("color","#FF0004");
	}
	
	if($("#password1").val() == $("#password2").val()){
		$("#pwmatch").removeClass("glyphicon-remove");
		$("#pwmatch").addClass("glyphicon-ok");
		$("#pwmatch").css("color","#00A41E");
	}else{
		$("#pwmatch").removeClass("glyphicon-ok");
		$("#pwmatch").addClass("glyphicon-remove");
		$("#pwmatch").css("color","#FF0004");
	}
});  

    //js code for loading profile

    $(function(){ 
        $("#spinner").show(); 
        $("#myprofile").fadeOut();
          $.ajax({
        url: "loggedincode.php",
        type: "POST",
        success: function(data){
                    if(data)
                        {
                            $("#spinner").hide(); 
                             $("#myprofile").html(data);
                             $("#myprofile").fadeIn();
                        }
        },
        error: function(){
            $("#spinner").hide(); 
            $("#myprofile").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
            $("#myprofile").fadeIn();
        }
    });
     });
        // notification box

        function notification()
     {
         console.log("clicked");
        $.ajax({
        url: "buttonclicked.php",
        type: "POST",
        success: function(data){
                    if(data)
                    {
                        $("#notifications").html(data);
                    }
        },
        error: function(){
            $("#notifications").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
            $("#numberofnotifications").css("background-color","transparent");
            $("#bell").hide();
     }

     $(document).ready(function(){
        interval = setInterval(() => {
            $("#notifications").load("notification2.php")
        },2000)
    })


       $(document).ready(function () {

$(document).ready(function () {
var open = false
 $('#sidebarCollapse').on('click', function () {
     if(open == false)
     {$('#sidebar').toggleClass('active');
     $("#toggleclass").removeClass("fa fa-bars");
     $("#toggleclass").addClass("fa fa-times");
     }
     
 });
});

});
        // js code for show all my dogs ajax call-->
       
//<!-- js code for add dog ajax call-->
      
                $("#adddogform").submit(function(event){
                    $("#spinner").show();
    event.preventDefault();
    var datatopost = $("#adddogform").serializeArray();
    $.ajax({
        url: "adddog.php",
        type: "POST",
        data: datatopost,
        success: function(data){
                    if(data == "noname")
                    {
                        $("#certificationerror").text("");
                        $("#organisationerror").text(""); 
                        $("#gendererror").text("");
                        $("#weighterror").text("");
                        $("#weighterror").text("");
                        $("#breederror").text("");
                        $("#ageerror").text("");
                        $("#ageerror").text("");
                        $("#spinner").hide();
                        $("#nameerror").text("Enter the name");
                    }
                    if(data == "noage")
                    {
                        $("#nameerror").text("");
                        $("#certificationerror").text("");
                        $("#organisationerror").text(""); 
                        $("#gendererror").text("");
                        $("#weighterror").text("");
                        $("#weighterror").text("");
                        $("#breederror").text("");
                        $("#ageerror").text("");
                        $("#spinner").hide();
                        $("#ageerror").text("Enter the age");
                    }
                    if(data == "invalidage")
                    { 
                        $("#ageerror").text("");
                        $("#nameerror").text("");
                        $("#certificationerror").text("");
                        $("#organisationerror").text(""); 
                        $("#gendererror").text("");
                        $("#weighterror").text("");
                        $("#weighterror").text("");
                        $("#breederror").text("");
                        $("#spinner").hide();
                        $("#ageerror").text("Age is not Valid. Make Sure you enter only the numeric value");
                    }
                    if(data == "nobreed")
                    {
                        $("#ageerror").text("");
                        $("#ageerror").text("");
                        $("#nameerror").text("");
                        $("#certificationerror").text("");
                        $("#organisationerror").text(""); 
                        $("#gendererror").text("");
                        $("#weighterror").text("");
                        $("#weighterror").text("");
                        $("#spinner").hide();
                        $("#breederror").text("Please select the breed");
                    }
                    if(data == "noweight")
                    {
                        $("#ageerror").text("");
                        $("#ageerror").text("");
                        $("#nameerror").text("");
                        $("#breederror").text("");
                        $("#certificationerror").text("");
                        $("#organisationerror").text(""); 
                        $("#gendererror").text("");
                        $("#weighterror").text("");
                        $("#spinner").hide();
                        $("#weighterror").text("Please enter the weight");
                    }
                    if(data == "invalidweight")
                    {
                        $("#ageerror").text("");
                        $("#ageerror").text("");
                        $("#nameerror").text("");
                        $("#breederror").text("");
                        $("#weighterror").text("");
                        $("#certificationerror").text("");
                        $("#organisationerror").text(""); 
                        $("#gendererror").text("");
                        $("#spinner").hide();
                        $("#weighterror").text("Weight invalid. Make sure to enter only the numeric value");
                    }
                    if(data == "nogender")
                    {
                        $("#ageerror").text("");
                        $("#ageerror").text("");
                        $("#nameerror").text("");
                        $("#breederror").text("");
                        $("#weighterror").text("");
                        $("#weighterror").text("");
                        $("#certificationerror").text("");
                        $("#organisationerror").text(""); 
                        $("#spinner").hide();
                        $("#gendererror").text("Please enter the gender");
                    }
                    if(data == "noorganisation")
                    {
                        $("#ageerror").text("");
                        $("#ageerror").text("");
                        $("#nameerror").text("");
                        $("#breederror").text("");
                        $("#weighterror").text("");
                        $("#weighterror").text("");
                        $("#gendererror").text("");
                        $("#certificationerror").text("");
                        $("#spinner").hide();
                        $("#organisationerror").text("Please select the organisation the gender"); 
                    }
                    if(data == "nocertification")
                    {
                        $("#ageerror").text("");
                        $("#ageerror").text("");
                        $("#nameerror").text("");
                        $("#breederror").text("");
                        $("#weighterror").text("");
                        $("#weighterror").text("");
                        $("#gendererror").text("");
                        $("#organisationerror").text("");
                        $("#spinner").hide();
                        $("#certificationerror").text("Please enter the certification")
                    }
                    if(data == "success")
                        {
                            $("#spinner").hide();
                            $("#add_dog_message").html("<div class = 'alert alert-success'>Your dog has been added successfully </div>");
                            location.reload(true);
                        }
        },
        error: function(){
            $("#add_dog_message").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
});

//edit profile modal
$(document).on("click", "#submiteditform", function(event){
        var datatopost = $('#editform').serializeArray();
        $.ajax({
        url: "editprofile.php",
        type: "POST",
        data: datatopost,
        success: function(data){
                    if(data)
                        {
                            if(data == "success")
                            {
                                location.reload(true);
                            }
                            else
                            {
                                $("#editmessage").html(data);
                            }
                        }
        },
        error: function(){
            $("#editmessage").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
});  

function emptyalltext()
{
    $("#currentpassworderror").text("");
    $("#newpassworderror").text("");
    $("#confirmpassworderror").text("");

}

//edit password modal
$(document).on("click", "#changepasswordform", function(event){
        console.log("here");
        var datatopost = $('#passwordForm').serializeArray();
        $.ajax({
        url: "changepassword.php",
        type: "POST",
        data: datatopost,
        success: function(data){
                    if(data)
                        {
                            if(data == "nocurrentpassword")
                            {
                                emptyalltext();
                                $("#currentpassworderror").text("Please Enter the Current Password");
                            }
                            else if(data == "nonewpassword")
                            {
                                emptyalltext();
                                $("#newpassworderror").text("Enter the New Password");
                            }
                            else if(data == "noconfirmpassword")
                            {
                                emptyalltext();
                                $("#confirmpassworderror").text("Please Enter the Confirm Password");
                            }
                            else if(data == "invalidpassword")
                            {
                                emptyalltext();
                                $("#newpassworderror").text("Please Enter the Valid Password");
                            }
                            else if(data == "passwordsdidnotmatch")
                            {
                                emptyalltext();
                                $("#confirmpassworderror").text("Passwords did not match");
                            }
                            else if(data == "incorrectpassword")
                            {
                                emptyalltext();
                                $("#currentpassworderror").text("The password is incorrect");
                            }
                            else if(data == "success")
                            {
                                emptyalltext();
                                $("#errormessage").html("<div class = 'alert alert-success'>Password successfully updates</div>");
                                location.reload(true);
                            }
                            else
                            {
                                $("#errormessage").html(data);
                            }
                        }
        },
        error: function(){
            $("#errormessage").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
});  

//changing profile pic

var file;
var imageType;
$(document).on("change","#picture",function(){
    file = this.files[0];
    console.log(file);
    imageType = file.type;
    imageSize = file.size;
    var match= ["image/jpeg","image/png","image/jpg"];
    if($.inArray(imageType, match) == -1){
        $("#updatepicturemessage").html("<div class='alert alert-danger'>Wrong file format!</div>");
        return false;
    }
    if(imageSize > 3*1024*1024)
    {
        $("#updatepicturemessage").html("<div class='alert alert-danger'>File too big!</div>");
        return false;
    }
        var reader = new FileReader();
        reader.onload = updatePreview;
        reader.readAsDataURL(this.files[0]);
})

function updatePreview(event)
{
    $("#profilepic").attr("src",event.target.result);
}

$(document).on("click","#updateprofilebutton" , function(event){
    event.preventDefault();
    if(!file)
    {
        $("#updatepicturemessage").html("<div class='alert alert-danger'>Please upload a picture</div>");
        return false; 
    }
    var match= ["image/jpeg","image/png","image/jpg"];
    if($.inArray(imageType, match) == -1){
        $("#updatepicturemessage").html("<div class='alert alert-danger'>Wrong file format!</div>");
        return false;
    }
    if(imageSize > 3*1024*1024)
    {
        $("#updatepicturemessage").html("<div class='alert alert-danger'>File too big!</div>");
        return false;
    }
    $("#updatepicturemessage").html("<div style = 'color : green;'>Updating....</div>");
    $.ajax({
        url: "profilepic.php",
        type: "POST",
        data: new FormData(document.getElementById("updateprofileform")),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
                location.reload(true);
            },
        error: function(){
            $("#updatepicturemessage").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
});
      
</script>

    
</body>
</html>