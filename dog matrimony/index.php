//<?php
session_start();
include ('connection.php');
//echo ($_COOKIE['remember_me'];
include('logout.php');
include('remember_me.php');
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
<link rel="stylesheet" href="mystyling.css" />
<style>
 .icon
{
    height: 150px;
    width: 140px;
    margin-top: 30px;
    padding: 10px;
    
}
.required
{
  color : red;
}

@media screen and (max-width:500px)
{
    #cs
    {
        height: 200px;
        
    };
   p
    {
        color: black;
        font-weight: bolder;
    };
}    
</style>
    <link rel="stylesheet" 
          type="text/css" 
          href="/css/result-light.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Gotu&family=raleway&family=Merriweather:wght@700&display=swap" rel="stylesheet">
    <script type="text/javascript" 
            src= 
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"> 
  </script> 
    <link rel="stylesheet" 
          type="text/css" 
          href= 
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> 
    <link rel="stylesheet" 
          type="text/css" 
          href= 
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

      <!-- navbar -->
              <nav class="navbar navbar-custom navbar-fixed-top">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class = "navbar-brand" href="#">Dog Matrimony</a>
    <button type = "button" class = "navbar-toggle" data-target = "#navbarcollapse " data-toggle="collapse">
        <span class = "sr-only">Toggle navigation</span>
        <span class = "icon-bar"></span>
        <span class = "icon-bar"></span>
        <span class = "icon-bar"></span>
    </button>
    </div>
    <div class="navbar-collapse collapse" id="navbarcollapse">
        <ul class = "nav navbar-nav">
        <li class="active"><a href = "#">Home</a></li>
        <li><a href = "#">About</a></li>
        </ul>
        <ul class = "nav navbar-nav navbar-right">
        <li><a href = "#login" data-toggle = "modal">Login</a></li>
        </ul>
    </div>
    </div>  
    </nav>
      <br>
      <br>
      
      
  <!-- create a bootstrap card in a container-->
    <div class="containercarousel"> 
        <!--Bootstrap card with slider class-->
        <div id="carousel-top" class="carousel slide" data-ride="carousel"> 
            <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
            <div class="carousel-inner"> 
                <div class="item active"> 
                    <img id="cs" src= "dog1.jpg" style="width:100%; "> 
                </div> 
                <div class="item"> 
                    <img id="cs" src= "dog4.jpg" style="width:100%; ">
                </div> 
                <div class="item"> 
                    <img id="cs" src= "dog3.jpg" style="width:100%; ">
                </div> 
            </div> 
            <!--slider control for card-->
            <a class="left carousel-control" href="#carousel-top" data-slide="prev"> 
                <span class="glyphicon glyphicon-chevron-left"> </span> 
            </a> 
            <a class="right carousel-control" href="#carousel-top" data-slide="next"> 
                <span class="glyphicon glyphicon-chevron-right"> </span> 
            </a> 
        </div> 
    </div>
      
      
      <!--Sign up form -->
      <form id="signupform" method = "post">
        
          <div class="container-fluid">
              <div class="row">
              <div class="col-xs-12">
                   <div id="signup" class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
                <div id="header" class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                    <h4><strong> Sign up for free</strong></h4>
                </div>
                 <div class="modal-body">
                     <div id = "signupmessage"></div>
                    <div class="form-group">
                    <label for="username">Username:</label><span class="required">*</span>
                        <input type="text" class="form-control" id = "username" name = "username" placeholder="username">
                        <div class="valid-feedback mb3" id = "usernameerror" style = "color: red"></div>
                     </div>
                     <div class="form-group">
                     <label for="name">Name:</label><span class="required">*</span>
                        <input type="text" class="form-control" name = "name" placeholder="Name">
                        <div class="valid-feedback mb3" id = "nameerror" style = "color: red"></div>
                     </div>
                     <div class="form-group">
                     <label for="email">Email:</label><span class="required">*</span>
                        <input type="text" class="form-control" name = "email" placeholder="email">
                        <div class="valid-feedback mb3" id = "emailerror" style = "color: red"></div>
                     </div>
                     <div class="form-group">
                     <label for="password">Password:</label><span class="required">*</span>
                        <input type="password" id = "password" class="form-control" name = "password" placeholder="password">
                        <div class="valid-feedback mb3" id = "passworderror" style = "color: red"></div>
                     
                     </div>
                     <div class="form-group">
                     <label for="confirm password">Confirm Password:</label><span class="required">*</span>
                        <input type="password" class="form-control" id = "confirmpassword" name = "password2" placeholder="confirm password"> 
                        <div class="valid-feedback mb3" id = "confirmpassworderror" style = "color: red"></div>
                     </div>
                     <div class="form-group">
                     <label for="contact">Contact Number:</label><span class="required">*</span>
                        <input type="number" class="form-control" name = "contact" placeholder="contact number">
                        <div class="valid-feedback mb3" id = "contacterror" style = "color: red"></div>
                     </div>
                     <div class="form-group">
                     <label for="state">State:</label><span class="required">*</span>
                        <select id="state" class="form-control state" name = "state">
                        <option selected>Select state</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Ladakh</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Puducherry">Puducherry</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
</select>
                        <div class="valid-feedback mb3" id = "stateerror" style = "color: red"></div>
                     </div>
                     <div class="form-group city"></div>
                     <div class="form-group">
                  <div class="form-group">
                  <input type="checkbox" value="" id="invalidCheck">
                  <label for="invalidCheck">
                  Agree to terms and conditions
                </label>
                <div class="valid-feedback mb3" id = "termserror" style = "color: red"></div>
              </div>
              </div>
                 <div class="modal-footer">
                  <button class="btn green">
                    Sign-Up
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
      <!--Login form -->
      
      <form id="loginform" method = "post">
          <div class="container-fluid">
              <div class="row">
              <div class="col-xs-12">
                   <div id="login" class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
                <div id="header" class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                    <h4><strong> Login:</strong></h4>
                </div>
                 <div class="modal-body">
                     <div id = "loginmessage"></div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id = "loginusername" name = "loginusername" placeholder="username">
                        <div class="valid-feedback mb3" id = "loginusernameerror" style = "color: red"></div>
                     </div>
                     <div class="form-group">
                     <label for="username">Password:</label>
                        <input type="password" class="form-control" id = "loginpassword" name = "loginpassword" placeholder="password">
                        <div class="valid-feedback mb3" id = "loginpassworderror" style = "color: red"></div>
                     </div>
                     <div class="checkbox">
                           <div>
                        <label>
                        <input type = "checkbox" id = "rememberme" name="rememberme">
                            Remember Me
                               
                        </label>
                            <a href= "#forgotpassword" class="pull-right" data-dismiss = "modal" data-toggle = "modal">Forgot Password?</a>
                        </div>
                         </div>
                   
                 <div class="modal-footer">
                  <button class="btn green">
                    Login
                    </button>
                    <button class="btn btn-default" data-dismiss="modal">
                    Cancel
                    </button>
                     <button class="btn btn-default pull-left" data-dismiss="modal" data-target= "#signup" data-toggle ="modal" >
                    Register
                    </button>
                </div>
              </div>      
        </div>
          </div>          
                  </div>
              </div>
        </div>
          </div>
      </form>

      <!-- Login form for affiliate -->
      <form id="affiliateloginform" method = "post">
          <div class="container-fluid">
              <div class="row">
              <div class="col-xs-12">
                   <div id="affiliatelogin" class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
                <div id="header" class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                    <h4><strong>Affiliate Login:</strong></h4>
                </div>
                 <div class="modal-body">
                     <div id = "affiliateloginmessage"></div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name = "affiliateloginusername" placeholder="username">
                     </div>
                     <div class="form-group">
                     <label for="username">Password:</label>
                        <input type="password" class="form-control" name = "affiliateloginpassword" placeholder="password">
                     </div>
                     <div class="checkbox">
                           <div>
                        <label>
                        <input type = "checkbox" id = "rememberme" name="rememberme">
                            Remember Me
                               
                        </label>
                            <a href= "#forgotpassword" class="pull-right" data-dismiss = "modal" data-toggle = "modal">Forgot Password?</a>
                        </div>
                         </div>
                   
                 <div class="modal-footer">
                  <button type='button' id='affiliateloginsubmit' class="btn green">
                    Login
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
          </div>
      </form>
              
            <!--Forgot Password -->
      
        <form id="forgotpasswordform" method = "post">
          <div class="container-fluid">
              <div class="row">
              <div class="col-xs-12">
                   <div id="forgotpassword" class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
                <div id="header" class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                    <h4><strong> Please Enter your registered Email</strong></h4>
                </div>
                 <div class="modal-body">
                     <div id = "forgotpasswordmessage"></div>
                    <div class="form-group">
                        <input type="text" class="form-control" name = "forgotemail" placeholder="Email">
                     </div>
                   
                 <div class="modal-footer">
                  <button class="btn green">
                    Submit
                    </button>
                    <button class="btn btn-default" data-dismiss="modal">
                    Cancel
                    </button>
                     <button class="btn btn-default pull-left" data-dismiss="modal" data-target= "#signup" data-toggle ="modal" >
                    Register
                    </button>
                </div>
              </div>      
        </div>
          </div>          
                  </div>
              </div>
        </div>
          </div>
      </form>
              
      <!--Jumbotron -->
         <div class="jumbotron" id="about" style="background-color: white; margin-top: -50px;">
      <div class="container-fluid">
          <div>
            <div class="row">
              <div class="col-md-4">
                <img class="icon" src="what.jpg">
                  <h3 style="font-family: 'Merriweather', serif;">What We Do</h3>
                  <p align = "justify" style="font-size : medium; font-weight:bold; font-family: 'Gotu', sans-serif;">Finding a perfect match for our four legged friend can be real pain sometimes and due to the pet owners tend to ignore it more often than not. Here at dog matrimony we guide you step by step to find a perfect mate for your pet</p>
                
                </div>
                 <div class="col-md-4">
                <img class="icon" src="how.jpg">
                  <h3 style="font-family: 'Merriweather', serif;">How We Do</h3>
                     <p align = "justify" style="font-size : medium; font-weight:bold;font-family: 'Gotu', sans-serif; ">We provide you with the bunch of best matches for you dog to choose from and allow you pick the one which suits you best.Once you have made the selection,we will guide you to through till mating is successful.</p>
                </div>
                 <div class="col-md-4">
                <img class="icon" src="why.jpg">
                  <h3 style="font-family: 'Merriweather', serif;">Why We Do</h3>
                  <p align = "justify" style="font-size : medium; font-weight:bold; font-family: 'Gotu', sans-serif;">The pet owners will never want their bestfriend to show symtoms of deprievation which can lead to untamed aggression.So here at dog matrimony  we try to make things easier for the owners and merrier for your dog </p>
                </div>
              </div>
       
          
        </div>

        
              <div class="row">
                  <div class="col-sm-12">
            <div class="jumbotron">
                <h1>Dog's Matrimony</h1>
                <p></p>
                <p> </p>
                <button type="button" class="button btn-lg green spacing" data-target="#signup" data-toggle="modal">Sign-up. It's free</button> 
          </div>
                      
                      
                      </div>
      </div>

      <div class="jumbotron" id="about" style="background-color: white; margin-top: -50px;">
      <div class="container-fluid">
          <div>
          <h2 class="text-black mb-2">Things You Should Know</h2>
            <div class="row">
              <div class="col-md-4">
                <img class="icon" src="claw.png">
                  <h3 style="font-family: 'Merriweather', serif;">Preparing To Mate</h3>
                  <p align = "justify" style="color: black; font-size : medium; font-weight:bold; font-family: 'Gotu', sans-serif;">Most canine couples are capable of carrying out a breeding under a watchful eye of our breeders.We observe your bitch for signs of readiness during her heat cycle.We make sure that the stud is in good weight and fed a well balanced diet to maintain peak physical condition.Both dogs should have good dispositions, increasing the chance that the puppies will be the same.</p>
                
                </div>
                 <div class="col-md-4">
                <img class="icon" src="claw.png">
                  <h3 style="font-family: 'Merriweather', serif;">When To Mate</h3>
                     <p align = "justify" style="color: black; font-size : medium; font-weight:bold;font-family: 'Gotu', sans-serif; ">Puberty or sexual maturity in the female dog usually occurs around 9 to 10 months of age. The smaller breeds tend to go into estrus or 'heat' earlier and some females can have their first heat cycle as early as four months of age.However, males become fertile after six months of age and reach full sexual maturity by 12 to 15 months.Adult males are able to mate at any time. </p>
                </div>
                 <div class="col-md-4">
                <img class="icon" src="claw.png">
                  <h3 style="font-family: 'Merriweather', serif;">How Often To Mate</h3>
                  <p align = "justify" style="color: black; font-size : medium; font-weight:bold; font-family: 'Gotu', sans-serif;">The next question is usually, "How many days will a female dog let a male mount her?" Although you cannot solely rely on breeding according to the day of the bitch's season, many successful breedings are carried out over days nine, eleven and thirteen of the cycle. It is only necessary to allow one good breeding each day for two healthy and fertile dogs to produce a litter.</p>
                </div>
              </div>
       
          
        </div>

        </div>
        </div>
   

<!-- 16:9 aspect ratio -->
<div class="row">
  <div class="col-xs-12 col-sm-4 col-sm-offset-2 form-group">
    <div class="embed-responsive embed-responsive-4by3">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/5ShAHWCSgdI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>
  <div class="col-xs-12 col-sm-4 form-group">
    <div class="embed-responsive embed-responsive-4by3">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/ML5nOita5Sg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>
      </div>
</div>
</div>

      </div>     
      
<!-- Footer -->
<footer class="page-footer font-small unique-color-dark" style = "background-color:  #1b1f21 ; color:white; padding-bottom: 20px; padding-top: 20px">

  <div style="background-color: #1b1f21;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">


        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fa fa-facebook fa-lg white-text"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fa fa-twitter fa-lg white-text "> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fa fa-google-plus fa-lg white-text "> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fa fa-linkedin-in fa-lg white-text "> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fa fa-instagram fa-lg white-text"> </i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5" style = "background-color: #1b1f21; color:white;">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Dog Matrimony</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Here at dogs matrimony we help you find the perfect match for your dog by providing you with the bunch of 
          different options to choose from and select the one which suits you best.
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Options</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="#!">About</a>
        </p>
        <p>
          <a href="#!">Help</a>
        </p>
        <p>
          <a href="#!">FAQ</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Useful links</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="#!">Your Account</a>
        </p>
        <p>
          <a href="#affiliatelogin" data-toggle = "modal">LogIn as an Affiliate</a>
        </p>
        <p>
          <a href="#!">Become an Affiliate</a>
        </p>
      </div>
     
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p >
          <i class="fa fa-map-marker mr-3"></i> Patna, 800013, INDIA</p>
        <p>
          <i class="fa fa-envelope-o mr-3"></i> agrawalsankalp99@gmail.com</p>
        <p>
          <i class="fa fa-phone mr-3"></i> + 91 910 245 6679 </p>
    </div>
  </div>
  <br>
  <div class="footer-copyright text-center py-3">© 2020 Copyright: Sankalp Agrawal
  </div>


</footer>
<!-- Footer -->


          
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/j
query.min.js"></script>
<script src="js/bootstrap.min.js"></script>
      
      
<script>
    $('.carousel').carousel();

    // password validating at the time of input
    function validatePasswordMatch() {
    var password = $("#password").val();
    if(!password.match(/^(?=.*\d)(?=.*[A-Z])(?=.*[A-Z])[0-9a-zA-Z!_@#\$%\^\&*]{7,}$/))
    {
      $("#passworderror").text("Password should contain atleast 7 charecters including atleast 1 digit and atleast 1 uppercase letter");
    }
    else
    {
      $("#passworderror").text("");
    }
}

function checkPasswordMatch() {
    var password = $("#password").val();
    var password2 = $("#confirmpassword").val();
    if(!(password == password2))
    {
      $("#confirmpassworderror").text("Passwords did not match");
    }
    else
    {
      $("#confirmpassworderror").text("");
    }
}

$(document).ready(function () {
   $("#password").keyup(validatePasswordMatch);
   $("#confirmpassword").keyup(checkPasswordMatch);
});


function emptyalltext()
{
                    $("#nameerror").text("");
                    $("#termserror").text("");
                    $("#emailerror").text("");
                    $("#passworderror").text("");
                    $("#confirmpassworderror").text("");
                    $("#contacterror").text("");
                    $("#stateerror").text("");
                    $("#cityerror").text("");
                    $("#localityerror").text("");
                    $("#usernameerror").text("");
}

        // js code for sign up ajax 
    $("#signupform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data == "nousername") 
                {
                    emptyalltext();
                    $("#usernameerror").text("Please enter the username");
                }
                else if(data == "noname") 
                {
                  emptyalltext();
                    $("#nameerror").text("Please Enter the name");
                }
                else if(data == "noemail") 
                {
                  emptyalltext();
                    $("#emailerror").text("Please Enter the email");
                }
                else if(data == "invalidemail") 
                {
                  emptyalltext();
                    $("#emailerror").text("Please enter the valid email");
                }
                else if(data == "nocontact") 
                {
                  emptyalltext();
                    $("#contacterror").text("Please enter the contact");
                }
                else if(data == "nostate") 
                {
                  emptyalltext();
                    $("#stateerror").text("Please enter the state");
                } 
                else if(data == "nopassword") 
                {
                    emptyalltext();
                    $("#passworderror").text("Please Enter the password");
                }
                else if(data == "invalidpassword") 
                {
                  emptyalltext();
                    $("#passworderror").text("Password should contain atleast 6 charecters including atleast 1 digit and atleast one uppercase letter");
                }
                else if(data == "noconfirmpassword") 
                {
                    emptyalltext();
                    $("#confirmpassworderror").text("Please Enter the confirm password");
                }
                else if(data == "nopassword") 
                {
                    emptyalltext();
                    $("#passworderror").text("Please Enter the password");
                }
                else if(data == "passwordsdidnotmatch") 
                {
                    emptyalltext();
                    $("#confirmpassworderror").text("Passwords did not match");
                }
                else if(data == "nocity") 
                {
                    emptyalltext();
                    $("#cityerror").text("Please select the city");
                }
                else if(data == "nolocality") 
                {
                    emptyalltext();
                    $("#localityerror").text("Please Enter the locality");
                }
                else if(data == "usernameexists")
                {
                  emptyalltext();
                  $("#usernameerror").text("This username already exists");
                }
                else if(data == "emailexists")
                {
                  emptyalltext();
                  $("#emailerror").text("This email is already registered");
                }
                else if(data == "notinyourstate")
                {
                  emptyalltext();
                  $("#stateerror").text("We are still to serve in your area. We will get our services to you as soon as possible");
                }
                else if(data == "termsunticked")
                {
                  emptyalltext();
                  $("#termserror").text("You must agree to the terms and conditions");
                }
                else
                {
                  emptyalltext();
                  $("#signupmessage").html(data);
                  $("#signup").scrollTop(0);
                }

        },
        error: function(){
            $("#signupmessage").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
});
    //ajax call for generating cities
    $(document).ready(function(){
    $("select.state").change(function(){
        var selectedstate = $(".state option:selected").val();
        emptyalltext();
          $("#city").hide();
          $("#locality").hide();
          $("#citylabel").hide();
          $("#localitylabel").hide();
          $("#citylabelstar").hide();
          $("#localitylabelstar").hide();
        if(selectedstate == "Bihar" || selectedstate == "Delhi" || selectedstate == "Uttar Pradesh" || selectedstate == "Haryana")
        {
          $("#stateerror").text("");
          $.ajax({
            type: "POST",
            url: "getcities.php",
            data: { state : selectedstate } 
            }).done(function(data){
            $(".city").html(data);
            });
        }
        else
        {
          $("#stateerror").text("We are still to serve in your area. We will get our services to you as soon as possible");
        }
    });
});



            // js code for login ajax 
          $("#loginform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function(data){
                    if(data == "nologinusername")
                    {
                      $("#loginusernameerror").text("Please enter the username");
                      $("#loginpassworderror").text("");
                      $("#loginmessage").html("");
                    }
                    else if(data == "nologinpassword")
                    {
                      $("#loginusernameerror").text("");
                      $("#loginpassworderror").text("Please enter the password");
                      $("#loginmessage").html("");
                    }
                    else if(data == "success")
                        {
                            window.location = "loggedin.php";
                        }
                    else
                        {
                            $("#loginmessage").html(data);
                            $("#loginmessage").hide();
                            $("#loginmessage").fadeIn();
                            $("#loginusername").val("");
                            $("#loginpassword").val("");
                            $("#loginusernameerror").text("");
                            $("#loginpassworderror").text("");
                        }
        },
        error: function(){
            $("#loginmessage").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
            $("#loginmessage").hide();
            $("#loginmessage").fadeIn();
        }
    });
});

         // js code for affiliate login ajax 
         $(document).on("click", "#affiliateloginsubmit", function(event){
    event.preventDefault();
    var datatopost = $('#affiliateloginform').serializeArray();
    $.ajax({
        url: "affiliatelogin.php",
        type: "POST",
        data: datatopost,
        success: function(data){
                    if(data == "success")
                        {
                            window.location = "affiliateloggedin.php";
                        }
                    else
                        {
                            $("#affiliateloginmessage").html(data);
                        }
        },
        error: function(){
            $("#affiliateloginmessage").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
});
    
             // js code for forgot password ajax 
          $("#forgotpasswordform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "forgot_password.php",
        type: "POST",
        data: datatopost,
        success: function(data){
                    if(data)
                        {
                            $("#forgotpasswordmessage").html(data);
                        }
        },
        error: function(){
            $("#forgotpasswordmessage").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
});
      </script>
</body>
</html>