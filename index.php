<?php
// Connect with Database
session_start();
include("databaseconn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ai Tools</title>
    <link rel="icon" href="./assets/imgs/pexels-fwstudio-33348-129733.jpg">
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/icons/all.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playwrite+IT+Moderna:wght@100..400&display=swap" rel="stylesheet">
</head>
<body>
    <div class="nav-parent">
        <div class="navbar0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 d-flex" id="nav0-content">
                        <p><i class="fa-solid fa-location-dot"></i>123 Street, Egypt, Maadi
                        </p>
                        <p><i class="fa-regular fa-clock"></i>Mon - Fri : 09.00 AM - 09.00 PM</p>
                    </div>
                    <div class="col-lg-5 col-md-5 d-flex" id="nav0-content2"  >
                        <p><i class="fa-solid fa-phone"></i>+012 345 6789
                        </p>
                        <div class="i">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-linkedin-in"></i>
                        <i class="fa-brands fa-instagram"></i>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">AI Nexus</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link " href="#"><span style="color: var(--maincolor);">home</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">about</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">why us</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      category
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">ai</a></li>
                      <li><a class="dropdown-item" href="#">web application</a></li>
                      <li><a class="dropdown-item" href="#">project management</a></li>
                      <li><a class="dropdown-item" href="#">system analysis</a></li>
                    </ul>
                  </li>
                  <li class="nav-item" id="login">  
                    <a type="submit" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Log in </a>
                  </li>
                </ul>
              </div>  
            </div>
          </nav>
        </div>
        <div class="d-flex " role="search">
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="container">
                      <div class="row">
                          <div class="col-sm-12 " id="modal1-1">
                           <form>
                              <i class="fa-solid fa-robot"></i> <br>
                              <!-- <input type="text" placeholder="User Name " class="col-sm-12 mb-3">
                              <input type="password" placeholder="Password" class="col-sm-12 mb-3"> -->
                              <a href="userLOGIN.html" class="text-center model-login"> Are You A User ?</a> <br> <h3>OR</h3> <br>
                           </form>

                           <div class="modal-footer">
                              <a href="expertLOGIN.html" class="text-center" > Are You A Consultant?</a>
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


          <div class="caption">
            <div class="cap d-flex justify-content-center align-items-center">
            <div class="container  d-flex flex-column justify-content-center align-items-center text-center ">
                 <p> Our AI-powered platform provides expert technology consultations,<br> helping you navigate the latest innovations with ease.</p>
                 <button class="home-btn"> EXPLORE NOW</button>
              </div> 
            </div>
          </div>

         <section class="sec-1">
          <div class="container" id="all-boxes">
          
              <div class="d-lg-flex d-sm-block" id="row-1">
                <div class="col-lg-4 col-sm-10 ai-box"><a href="#"><i class="fa-solid fa-brain"></i><br>AI Tools</a> </div>
                <div class="col-lg-4 col-sm-10 ai-box"><a href="innermiroc.html"><i class="fa-brands fa-windows"></i><br>Microsoft Office</a> </div>
                <div class="col-lg-4 col-sm-10 ai-box"><a href="#"><i class="fa-solid fa-magnifying-glass-chart"></i><br>System Analysis</a> </div>
              </div>

              <div class="d-lg-flex d-sm-block" id="row-2">
                <div class="col-lg-6 col-sm-10 ai-box"><a href="#"><i class="fa-solid fa-people-roof"></i><br>Project Management</a> </div>
                <div class="col-lg-6 col-sm-10 ai-box"><a href="#"><i class="fa-solid fa-mobile-screen-button"></i><br>Mobile Application</a> </div>
              </div>

              <div class="d-lg-flex d-sm-block" id="row-3">
                <div class="col-lg-4 col-sm-10 ai-box"><a href="#"><i class="fa-solid fa-laptop"></i><br>Web Application</a> </div>
                <div class="col-lg-4 col-sm-10 ai-box"><a href="#"><i class="fa-solid fa-palette"></i><br>UI/UX</a> </div>
                <div class="col-lg-4 col-sm-10 ai-box"><a href="#"><i class="fa-solid fa-user-lock"></i><br>Cyber-Security</a> </div>
              </div>
          </div>
         </section>

         <!-- Footer -->
         <div class="section10">
          <div class="container">
            <div class="d-lg-flex d-sm-block">
              <div class="col-lg-2 col-md-5" id="sec10-1">
                 <h3>Address</h3>
                 <p><i class="fa-solid fa-location-dot"></i> 123 Street, Egypt, Maadi</p>
                 <p><i class="fa-solid fa-phone"></i>+012 345 67890</p>
                 <p><i class="fa-solid fa-envelope"></i>ainexus@gmail.com</p>
                 <div class="d-flex" id="first">
                  <i class="fa-brands fa-facebook-f"></i>
                  <i class="fa-brands fa-twitter"></i>
                  <i class="fa-brands fa-linkedin-in"></i>
                  <i class="fa-brands fa-youtube"></i>
                 </div>
              </div>
              <div class="col-lg-2 col-md-5" id="sec10-2">
                  <h3>Services</h3>
                  <p><i class="fa-solid fa-chevron-right"></i> Software Development</p>
                  <p><i class="fa-solid fa-chevron-right"></i> Marketing & Content Creation</p>
                  <p><i class="fa-solid fa-chevron-right"></i> Finance & Investment</p>
                  <p><i class="fa-solid fa-chevron-right"></i> Cybersecurity</p>
                  <p><i class="fa-solid fa-chevron-right"></i> Education & Learning</p>
              </div>
              <div class="col-lg-2 col-md-5" id="sec10-2">
                  <h3>Quick Links</h3>
                  <p><i class="fa-solid fa-chevron-right"></i> About Us</p>
                  <p><i class="fa-solid fa-chevron-right"></i> Contact Us</p>
                  <p><i class="fa-solid fa-chevron-right"></i> Our Services</p>
                  <p><i class="fa-solid fa-chevron-right"></i> Category</p>
                  <p><i class="fa-solid fa-chevron-right"></i> Support</p>
              </div>
              <div class="col-lg-2 col-md-5" id="sec10-3">
                 <h3>Feedback</h3>
                 <p>IF You have any comment. Let me know</p>
                 <div class="d-flex" id="second">
                  <input type="text" placeholder="Your Commment">
                  <button>Submit</button>
                 </div>
              </div>
            </div>
              <hr>
              <div class=" text-center" id="third">
                <p>© AI Nexus, All Right Reserved.</p>
              </div>
          </div>
        </div>



     <script src="./assets/bootstrap/bootstrap.bundle.min.js"></script>
     <script src="./js/main.js"></script>
</body>
</html>