<?php
session_start();
include ('connection.php');
//echo ($_COOKIE['remember_me'];
include('logout.php');
include('remember_me.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Dog Matrimony &mdash; </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700, 900|Vollkorn:400i" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <style>
    html,body
{
    /* width: 100%;

    height: 100%;
    margin: 0px;
    padding: 0px; */
    overflow-x: hidden; 
}
    </style>
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" id="home-section">
  

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar js-sticky-header site-navbar-target" role="banner" >

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.html" class="h2 mb-0"><strong>Dog</strong>Matrimony<span class="text-primary">.</span> </a></h1>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#about-section" class="nav-link">About</a></li>
                <li><a href="#trainers-section" class="nav-link">Doctor</a></li>
                <li><a href="#pricing-section" class="nav-link">Guide</a></li>
                <li><a href="#blog-section" class="nav-link">Videos</a></li>
                <li><a href="#services-section" class="nav-link">Things To Know</a></li>
                <li><a href="#contact-section" class="nav-link">Contact</a></li>
                <li><a href="#login-section" class="nav-link">Login</a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>

  
    <section class="site-blocks-cover overflow-hidden bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-5 mr-auto align-self-center text-center text-md-left">
            <div class="intro-text">
              <h1>Find A Mate For Your Dog</h1>
              <p class="mb-4">Find a Perfect Match For Your Dog Without Any Hassle</p>
              <p><a href="#login-section" class="smoothscroll nav-link btn btn-primary">Sign Up</a></p>
            </div>
          </div>
          <div class="col-md-5 align-self-center text-center text-md-right">
            <img src="images/dog_1.jpg" alt="Image" class="img-fluid cover-img">
            <!-- <img src="images/dog_2.jpg" alt="Image" class="img-fluid cover-img2"> -->
          </div>
        </div>
      </div>
    </section> 
      
      

    <section class="site-section" id="about-section">
      <div class="container">
        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-lg-6 text-center heading-section mb-5">
            
            <h2 class="text-black mb-2">Welcome To Our Website</h2>
            <p>Tired of Searching For your Dog's Mate Without Any Result.Here We Are To Solve All Your Problems</p>
          </div>
        </div>

        <div class="row hover-1-wrap mb-5 mb-lg-0">
          <div class="col-12">
            <div class="row">
              <div class="mb-4 mb-lg-0 col-lg-6 order-lg-2" data-aos="fade-left">
                <a href="#" class="rotate10">
                  <img src="images/dog_3.jpg" alt="Image" class="img-fluid">
                </a>
              </div>
              <div class="col-lg-5 mr-auto text-lg-right align-self-center order-lg-1" data-aos="fade-right">
                <h2 class="text-black">What We Do</h2>
                <p class="mb-4">Finding a perfect match for our four legged friend can be real pain sometimes and due to the pet owners tend to ignore it more often than not. Here at dog matrimony we guide you step by step to find a perfect mate for your pet.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row hover-1-wrap mb-5 mb-lg-0">
          <div class="col-12">
            <div class="row">
              <div class="mb-4 mb-lg-0 col-lg-6"  data-aos="fade-right">
                <a href="#" class="rotate-reverse10">
                  <img src="images/dog_4.jpg" alt="Image" class="img-fluid">
                </a>
              </div>
              <div class="col-lg-5 ml-auto align-self-center"  data-aos="fade-left">
                <h2 class="text-black">How We Do</h2>
                <p class="mb-4">We provide you with the bunch of best matches for you dog to choose from and allow you pick the one which suits you best.Once you have made the selection,we will guide you to through till mating is successful.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>


    <section class="site-section bg-light trainers" id="trainers-section">
      <div class="container">
        <div class="row">
         
          <div class="col-md-6" data-aos="fade-right">
            <img class="img-fluid border10 rotate-reverse10" src="images/dog_doctor.jpg" alt="Image">
          </div>
          <div class="col-md-5 ml-auto align-self-center" data-aos="fade-left">
            <h2 class="mb-2 heading mb-4">Our Dog Veterenarians</h2>
            <p>We provide you with the best and the most competent doctors in your city to guide you through the entire process of mating.</p>
            <p>Each of our doctors are well equiped,well experienced and have performed many successful mating under their supervision. </p>
            
          </div>
        </div>
      </div>
    </section>
      
        
   
      

    <section class="site-section" id="pricing-section">
      <div class="container">
        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-lg-7 text-center heading-section mb-5">
            
            <h2 class="mb-2 text-black heading">Guide</h2>
            <p>Get Your Dog A Mate In 5 Easy Steps. So Easy That Evan Your Dog Can Do This.</p>
          </div>
        </div>

          <div class="col-12 col-sm-12 col-md-12  col-lg-12 bg-primary  p-3 p-md-5" data-aos="fade-up" data-aos-delay="200">
            <div class="pricing">
              <span class="icon-paw d-inline-block display-5 text-white mb-3"></span>
              <span class="icon-paw d-inline-block display-5 text-white mb-3"></span>
              <span class="icon-paw d-inline-block display-5 text-white mb-3"></span>
              <h3 class="text-center text-white text-uppercase">5 Step Guide</h3>
              <div class="price mb-4 ">
                <span><span></span>Just Follow These Steps...</span>
              </div>
              <ul class="list-unstyled ul-check success mb-5">
                
                <li>Sign Up And Login</li>
                <li>Add Dog And Find Match</li>
                 <li>Select Your Favourite Match</li>
                <li>Send Request And Wait For The Approval</li>
                <li>Proceed To Book An Appointment</li>
               
              </ul>
              <p class="text-center">
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
      
     <section class="bg-light" id="login-section">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-6">
              <form id="loginform" method = "post" class="p-5 contact-form">
                  <h2 class="h4 mb-5 heading">USER LOGIN</h2>
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
                            <a href= "#forgotpassword" class="pull-right" data-dismiss = "modal" data-toggle = "modal">Forgot Password?</a>
                        </div>
                         </div>
                         <br>
                   
                <div class="col-md-12">
                  <input type="button" id="login" value="LOGIN" class="btn btn-dark btn-md text-white">
                </div>
      </form>
              
               <form id="affiliateloginform" method = "post" class="p-5 contact-form">
                  <h2 class="h4 mb-5 heading">AFFILIATE LOGIN</h2>
                     <div id = "affiliateloginmessage"></div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id = "affiliateloginusername" name = "affiliateloginusername" placeholder="username">
                        <div class="valid-feedback mb3" id = "loginusernameerror" style = "color: red"></div>
                     </div>
                     <div class="form-group">
                     <label for="username">Password:</label>
                        <input type="password" class="form-control" id = "affiliateloginpassword" name = "affiliateloginpassword" placeholder="password">
                        <div class="valid-feedback mb3" id = "loginpassworderror" style = "color: red"></div>
                     </div>
                     <div class="checkbox">
                           <div>
                        <label>
                            <a href= "#forgotpassword" class="pull-right" data-dismiss = "modal" data-toggle = "modal">Forgot Password?</a>
                        </div>
                         </div>
                         <br>
                   
                <div class="col-md-12">
                  <input type="submit" id="affiliateloginsubmit" value="LOGIN" class="btn btn-dark btn-md text-white">
                </div>
      </form>

          </div>
          <div class="col-lg-6">              
              <form id="signupform" method = "post" class="p-5 contact-form">
                  <h2 class="h4 mb-5 heading">SIGN UP</h2>
                     <div id = "signupmessage"></div>
                    <div class="form-group">
                    <label for="username">Username:</label><span class="required">*</span>
                        <input type="text" class="form-control" id = "username" name = "username" placeholder="username">
                        <div class="valid-feedback mb3" id = "usernameerror" style = "color: red">abc</div>
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
            <div class="row form-group">
                <div class="col-md-12">
                  <input type="button" id = "signup" value="SIGN UP" class="btn btn-dark btn-md text-white">
                </div>
              </div>
      </form>  
          </div>
        </div>
      </div>
    </section>
      

    <section class="site-section" id="faq-section">
      <div class="container" id="accordion">
        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-lg-6 text-center heading-section mb-5">
            
            <h2 class="text-black mb-2">Frequently Ask Questions</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit facere quia quas quod at, reprehenderit eaque nam.</p>
          </div>
        </div>
        <div class="row accordion justify-content-center block__76208">
          <div class="col-lg-6 order-lg-1 mb-5 mb-lg-0" data-aos="fade-up"  data-aos-delay="">
            <img src="images/dog_5.jpg" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-lg-5 ml-auto order-lg-2 align-self-center" data-aos="fade-up"  data-aos-delay="100">
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseFive" role="button" aria-expanded="true" aria-controls="collapseFive">Can I Get Money For My Puppies? If Yes Then How Much?<span class="icon"></span></a>
              </h3>
              <div id="collapseFive" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Yes, You Can either keep the puppy or the money. The choice is upto you. The price of the puppy depends on the Breed,Purity And Other Factors</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseSix" role="button" aria-expanded="false" aria-controls="collapseSix">Is The Service Free. <span class="icon"></span></a>
              </h3>
              <div id="collapseSix" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>We Charge A Small Charge Of 500 rupees At The Time Of Booking An Appointment As A Security Deposit Which Will Be Refunded If The Mating Is Turns Out Well.</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseSeven" role="button" aria-expanded="false" aria-controls="collapseSeven">Will I get the puppies?. <span class="icon"></span></a>
              </h3>
              <div id="collapseSeven" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>According To Our Policy We Adopt Two Puppies From The Litter And The Rest Can Be kept By The Two owners According To Their Choice </p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseEight" role="button" aria-expanded="false" aria-controls="collapseEight">How Many Puppies Can Be Kept By The Owner Of Male Dog?<span class="icon"></span></a>
              </h3>
              <div id="collapseEight" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>The Owner Of Male Dog Can Keep One Puppy From The litter And The Rest Of Them (excluding The Two Kept By Dog Matrimony) Goes To The owner Of The Female Dog. The Owners Can Alternatively Get Money For The Puppies Depending On The Breed,Purity And Other Factors</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

          </div>

          
        </div>
      </div>
    </section>

    <section class="site-section bg-light block-13" id="testimonials-section" data-aos="fade">
      <div class="container">
        
        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-lg-6 text-center heading-section mb-5">
            
            <h2 class="text-black mb-2">Happy Customers</h2>
          </div>
        </div>
        <div  data-aos="fade-up" data-aos-delay="200">
          <div class="owl-carousel nonloop-block-13">
            <div>
              <div class="block-testimony-1 text-center">
                
                <blockquote class="mb-4">
                  <p>&ldquo;I have been looking for the partner for my golden retriever for about a year and was not able to find a match.With dog matrimony I found the match instantly and the appointment was fixed without any hassle. I wish I would have found it before&rdquo;</p>
                </blockquote>

                <figure>
                  <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded-circle mx-auto">
                </figure>
                <h3 class="font-size-20 text-black">Medha Agrawal</h3>
              </div>
            </div>

            <div>
              <div class="block-testimony-1 text-center">

                

                <blockquote class="mb-4">
                  <p>&ldquo;The Service is So Promt And Cheap. Previously, I was being charged a lot of money and I had no other option but to go with it. But one day while browzing through the internet I found Dog Matrimony. I would definitely recommend you this if you want to find a match for your dog in one go.&rdquo;</p>
                </blockquote>

                <figure>
                  <img src="images/person_2.jpg" alt="Image" class="img-fluid rounded-circle mx-auto">
                </figure>
                <h3 class="font-size-20 mb-4 text-black">Priyanka Biswas</h3>

                
              </div>
            </div>

            <div>
              <div class="block-testimony-1 text-center">
                

                <blockquote class="mb-4">
                  <p>&ldquo;My Percy Is A High Quality KCI certified Pure Breed Shih Tzu.I was not able to get a female Shih Tzu of same purity and KCI certification. With Dog Matrimony I got Exactly What I Was Looking For. You Should Definitely Try It Out. !&rdquo;</p>
                </blockquote>

                <figure>
                  <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded-circle mx-auto">
                </figure>
                <h3 class="font-size-20 text-black">Naman Gupta</h3>

                
              </div>
            </div>

            <div>
              <div class="block-testimony-1 text-center">

                

                <blockquote class="mb-4">
                  <p>&ldquo;Exactly What I was looking for. A list of options to pick from. So easy to use and time saving. Thanku Dog Matrimony.&rdquo;</p>
                </blockquote>

                <figure>
                  <img src="images/person_2.jpg" alt="Image" class="img-fluid rounded-circle mx-auto">
                </figure>
                <h3 class="font-size-20 mb-4 text-black">Harshita Sinha</h3>

                
              </div>
            </div>


          </div>
        </div>
      </div>
    </section>

    


    <section class="site-section" id="blog-section">
      <div class="container">
        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-lg-6 text-center heading-section mb-5">
            
            <h2 class="text-black mb-2">Videos </h2>
            <p>Still Have Some Doubts? Maybe Jane Can Help Guide You In The Right Direction.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4" data-aos="fade-up"  data-aos-delay="">
            <div class="d-lg-flex blog-entry">
     <div class="embed-responsive embed-responsive-4by3">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/5ShAHWCSgdI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
            </div>
          </div>
          <div class="col-md-6 mb-4" data-aos="fade-up"  data-aos-delay="100">
            <div class="d-lg-flex blog-entry">
<div class="embed-responsive embed-responsive-4by3">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/ML5nOita5Sg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
            </div>
          </div>

        </div>
      </div>
    </section>



    <section class="site-section " id="services-section">
      <div class="container">
        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-lg-6 text-center heading-section mb-5">
            
            <h2 class="text-black mb-2">Things You Should Know</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 col-lg-4" data-aos="fade-up" data-aos-delay="">
            
            <div class="block_service">
              <span class="icon-paw d-block display-3 text-primary mb-3"></span>
              <h3>Preparing To Mate</h3>
              <p>Most canine couples are capable of carrying out a breeding under a watchful eye of our breeders.We observe your bitch for signs of readiness during her heat cycle.We make sure that the stud is in good weight and fed a well balanced diet to maintain peak physical condition.Both dogs should have good dispositions, increasing the chance that the puppies will be the same.</p>
            </div>

          </div>
          <div class="col-md-6 mb-4 col-lg-4" data-aos="fade-up"  data-aos-delay="100">
            <div class="block_service">
              <span class="icon-paw d-block display-3 text-primary mb-3"></span>
              <h3>When To Breed</h3>
              <p>Puberty or sexual maturity in the female dog usually occurs around 9 to 10 months of age. The smaller breeds tend to go into estrus or 'heat' earlier and some females can have their first heat cycle as early as four months of age.However, males become fertile after six months of age and reach full sexual maturity by 12 to 15 months.Adult males are able to mate at any time. </p>
            </div>
          </div>
          <div class="col-md-6 mb-4 col-lg-4" data-aos="fade-up"  data-aos-delay="200">
            <div class="block_service">
              <span class="icon-paw d-block display-3 text-primary mb-3"></span>
              <h3>How Often To Mate</h3>
              <p>The next question is usually, "How many days will a female dog let a male mount her?" Although you cannot solely rely on breeding according to the day of the bitch's season, many successful breedings are carried out over days nine, eleven and thirteen of the cycle. It is only necessary to allow one good breeding each day for two healthy and fertile dogs to produce a litter. </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    
    <section class="bg-light" id="contact-section">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-6">
            <form action="#" class="p-5 contact-form">
              
              <h2 class="h4 mb-5 heading">Contact Form</h2> 

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label for="fname">First Name</label>
                  <input type="text" id="fname" class="form-control">
                </div>
                <div class="col-md-6">
                  <label for="lname">Last Name</label>
                  <input type="text" id="lname" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label for="email">Email</label> 
                  <input type="email" id="email" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label for="subject">Subject</label> 
                  <input type="subject" id="subject" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label for="message">Message</label> 
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-dark btn-md text-white">
                </div>
              </div>

  
            </form>
          </div>
          <div class="col-lg-6">
            <div class="row justify-content-center align-items-center h-100">
              <div class="col-lg-6 text-center heading-section mb-5 align-self-center">
                
                <h2 class=" mb-5 text-black">Contact Us</h2>
                <ul class="list-unstyled text-left address">
                  <li>
                    <span class="d-block">Address:</span>
                    <p>Patna,Bihar,India 800013</p>
                  </li>
                  <li>
                    <span class="d-block">Phone:</span>
                    <p>+(91) 910 2456 679</p>
                  </li>
                  <li>
                    <span class="d-block">Email:</span>
                    <p>agrawalsankalp99@gmail.com</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>Here at dogs matrimony we help you find the perfect match for your dog by providing you with the bunch of different options to choose from and select the one which suits you best.</p>
              </div>
              <div class="col-md-3 ml-auto">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#about-section" class="smoothscroll">About Us</a></li>
                  <li><a href="#trainers-section" class="smoothscroll">Trainers</a></li>
                  <li><a href="#services-section" class="smoothscroll">Explore</a></li>
                  <li><a href="#testimonials-section" class="smoothscroll">Testimonials</a></li>
                  <li><a href="#contact-section" class="smoothscroll">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                <a href="#" class="pl-0 pr-3 social-link"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3 social-link"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3 social-link"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3 social-link"><span class="icon-linkedin"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h2 class="footer-heading mb-4">Links</h2>
            <ul class="list-unstyled">
            <li><a href="becomeaffiliate.php">Become An Affiliate</a></li>
            <li><a href="privacy.php">Privacy Policy</a></li>
            <li><a href="#login-section" class="smoothscroll">Login As Affiliate</a></li>
    </ul>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved |Made
                with <i class="icon-heart-o" aria-hidden="true"></i> by <a>Dog Matrimony</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
        
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  
  <script src="js/main.js"></script>
  <script>
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
    $("#signup").click(function(event){
      console.log("Here");
    event.preventDefault();
    var datatopost = $("#signupform").serializeArray();
    console.log(datatopost);
    $("#usernameerror").text("san");
    $.ajax({
        url: "https://www.care4urdog.com/dog%20matrimony/signup.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data == "nousername") 
                {
                    emptyalltext();
                    $("#usernameerror").text("Please enter the username");
                    $("#usernameerror").show();
                    var y = $(window).scrollTop();  //your current y position on the page
                    $(window).scrollTop(y-600);
                }
                else if(data == "noname") 
                {
                  emptyalltext();
                    $("#nameerror").text("Please Enter the name");
                    $("#nameerror").show();
                    var y = $(window).scrollTop();  //your current y position on the page
                    $(window).scrollTop(y-600);
                }
                else if(data == "noemail") 
                {
                  emptyalltext();
                    $("#emailerror").text("Please Enter the email");
                    $("#emailerror").show();
                    var y = $(window).scrollTop();  //your current y position on the page
                    $(window).scrollTop(y-500);
                }
                else if(data == "invalidemail") 
                {
                  emptyalltext();
                    $("#emailerror").text("Please enter the valid email");
                    $("#emailerror").show();
                    var y = $(window).scrollTop();  //your current y position on the page
                    $(window).scrollTop(y-500);
                }
                else if(data == "nocontact") 
                {
                  emptyalltext();
                    $("#contacterror").text("Please enter the contact");
                    $("#contacterror").show();
                    var y = $(window).scrollTop();  //your current y position on the page
                    $(window).scrollTop(y-400);
                }
                else if(data == "nostate") 
                {
                  emptyalltext();
                    $("#stateerror").text("Please enter the state");
                    $("#stateerror").show();
                } 
                else if(data == "nopassword") 
                {
                    emptyalltext();
                    $("#passworderror").text("Please Enter the password");
                    $("#passworderror").show();
                }
                else if(data == "invalidpassword") 
                {
                  emptyalltext();
                    $("#passworderror").text("Password should contain atleast 6 charecters including atleast 1 digit and atleast one uppercase letter");
                    $("#passworderror").show();
                }
                else if(data == "noconfirmpassword") 
                {
                    emptyalltext();
                    $("#confirmpassworderror").text("Please Enter the confirm password");
                    $("#confirmpassworderror").show();
                }
                else if(data == "nopassword") 
                {
                    emptyalltext();
                    $("#passworderror").text("Please Enter the password");
                    $("#passworderror").show();
                }
                else if(data == "passwordsdidnotmatch") 
                {
                    emptyalltext();
                    $("#confirmpassworderror").text("Passwords did not match");
                    $("#confirmpassworderro").show();
                }
                else if(data == "nocity") 
                {
                    emptyalltext();
                    $("#cityerror").text("Please select the city");
                    $("#cityerror").show();
                }
                else if(data == "nolocality") 
                {
                    emptyalltext();
                    $("#localityerror").text("Please Enter the locality");
                    $("#localityerror").show();
                }
                else if(data == "usernameexists")
                {
                  emptyalltext();
                  $("#usernameerror").text("This username already exists");
                  $("#usernameerror").show();
                  var y = $(window).scrollTop();  //your current y position on the page
                    $(window).scrollTop(y-600);
                }
                else if(data == "emailexists")
                {
                  emptyalltext();
                  $("#emailerror").text("This email is already registered");
                  $("#emailerror").show();
                  var y = $(window).scrollTop();  //your current y position on the page
                    $(window).scrollTop(y-500);
                }
                else if(data == "notinyourstate")
                {
                  emptyalltext();
                  $("#stateerror").text("We are still to serve in your area. We will get our services to you as soon as possible");
                  $("#stateerror").show();
                }
                else if(data == "termsunticked")
                {
                  emptyalltext();
                  $("#termserror").text("You must agree to the terms and conditions");
                  $("#termserror").show();
                }
                else
                {
                  emptyalltext();
                  $("#signupmessage").html(data);
                  var y = $(window).scrollTop();  //your current y position on the page
                  $(window).scrollTop(y-600);
                  sweetAlert("Sign Up Successful", "Plz click on the link sent to your email", "success");
                }

        },
        error: function(){
            $("#signupmessage").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
        }
    });
});

function validatePasswordMatch() {
    var password = $("#password").val();
    if(!password.match(/^(?=.*\d)(?=.*[A-Z])(?=.*[A-Z])[0-9a-zA-Z!_@#\$%\^\&*]{7,}$/))
    {
      $("#passworderror").text("Password should contain atleast 7 charecters including atleast 1 digit and atleast 1 uppercase letter");
      $("#passworderror").show();
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
      $("#confirmpassworderror").show();
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


$(document).ready(function(){
    $("select.state").change(function(){
      console.log("Selected State")
        var selectedstate = $(".state option:selected").val();
        console.log(selectedstate);
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
            url: "https://www.care4urdog.com/dog%20matrimony/getcities.php",
            data: { state : selectedstate } 
            }).done(function(data){
            $(".city").html(data);
            });
        }
        else
        {
          $("#stateerror").text("We are still to serve in your area. We will get our services to you as soon as possible");
          $("#stateerror").show();
        }
    });
});

$("#login").click(function(event){
    event.preventDefault();
    var datatopost = $("#loginform").serializeArray();
    console.log(datatopost);
    $.ajax({
        url: "https://www.care4urdog.com/dog%20matrimony/login.php",
        type: "POST",
        data: datatopost,
        success: function(data){
                    if(data == "nologinusername")
                    {
                      $("#loginusernameerror").text("Please enter the username");
                      $("#loginusernameerror").show();
                      $("#loginpassworderror").text("");
                      $("#loginmessage").html("");
                    }
                    else if(data == "nologinpassword")
                    {
                      $("#loginusernameerror").text("");
                      $("#loginpassworderror").text("Please enter the password");
                      $("#loginpassworderror").show();
                      $("#loginmessage").html("");
                    }
                    else if(data == "success")
                        {
                            sweetAlert("Login Successful", "Redirecting", "success");
                            window.location = "https://www.care4urdog.com/dog%20matrimony/loggedin.php";
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

$(document).on("click", "#affiliateloginsubmit", function(event){
    event.preventDefault();
    var datatopost = $('#affiliateloginform').serializeArray();
    $.ajax({
        url: "https://www.care4urdog.com/dog%20matrimony/affiliatelogin.php",
        type: "POST",
        data: datatopost,
        success: function(data){
                    if(data == "success")
                        {
                          sweetAlert("Login Successful", "Redirecting", "success");
                            window.location = "https://www.care4urdog.com/dog%20matrimony/affiliateloggedin.php";
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
</script>

  
  </body>
</html>