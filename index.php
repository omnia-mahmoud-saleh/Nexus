<?php session_start();?>
<<<<<<< HEAD
<!--New addition -->
<?php 
    include('server/databaseconn.php');
    $sql = "SELECT category_ID, Name, category_icon FROM category WHERE is_deleted = 0";
    $result = $conn->query($sql);?>
<!-- -->
<!DOCTYPE html> 
=======
<!DOCTYPE html>
>>>>>>> 19fc9b1f51e7babe1c1fd18d699470d9dedf6256
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>CONNEX</title>
=======
    <title>AI Nexus</title>
>>>>>>> 19fc9b1f51e7babe1c1fd18d699470d9dedf6256
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
                        <p>
                          <!-- To Display a notification to user-->
<<<<<<< HEAD
                          <?php 
=======
                          <?php
>>>>>>> 19fc9b1f51e7babe1c1fd18d699470d9dedf6256
                          if (isset($_SESSION['message'])) {
                              // $type = $_SESSION['message_type']; // success, error, etc.
                              echo "{$_SESSION['message']}";
                              unset($_SESSION['message']);
                              unset($_SESSION['message_type']);
                          }
                          ?>
                          <!-- <i class="fa-solid fa-phone"></i>+012 345 6789 -->
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
<<<<<<< HEAD
              <a class="navbar-brand" href="#">CONNEX</a>
=======
              <a class="navbar-brand" href="#">AI Nexus</a>
>>>>>>> 19fc9b1f51e7babe1c1fd18d699470d9dedf6256
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
                  <li class="nav-item">
                    <a class="nav-link" href="#all-boxes">category</a>
                  </li>
                  <!--To Show Log in button on condition -->
                  <?php if(!isset($_SESSION["user_logged_in"])):?>
                  <li class="nav-item" id="login">  
                    <a class="nav-link"  href="./userLOGIN.php">Log in </a>
                  </li>
                  <!--To show Log Out on condition -->
                  <?php else:?>
                  <!--Log out button-->
                  <li class="nav-item">
                    <a class="nav-link" href="./server/logout.php">Log Out</a>
                  </li>
                  <?php endif;?>
                </ul>
              </div>  
            </div>
          </nav>
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
<<<<<<< HEAD
            <section class="sec-1" id="ourtools">
              <div class="container" id="all-boxes">
                <div class="d-lg-flex flex-wrap justify-content-center gap-4">
                  <?php while($row = $result->fetch_assoc()): ?>
                    <div class="col-lg-4 col-sm-10 ai-box">
                      <a href="category_details.php?id=<?php echo $row['category_ID']; ?>">
                        <i class="<?php echo $row['category_icon'];?>"></i><br>
                        <?php echo htmlspecialchars($row['Name']); ?>
                      </a>
                    </div>
                  <?php endwhile; ?>
                </div>
              </div>
            </section>
=======

         <section class="sec-1" id="ourtools">
          <div class="container" id="all-boxes">
          
              <div class="d-lg-flex d-sm-block" id="row-1">
                <div class="col-lg-4 col-sm-10 ai-box"><a href="tools.html"><i class="fa-solid fa-brain"></i><br>AI Tools</a> </div>
                <div class="col-lg-4 col-sm-10 ai-box"><a href="innermiroc.html"><i class="fa-brands fa-windows"></i><br>Microsoft Office</a> </div>
                <div class="col-lg-4 col-sm-10 ai-box"><a href="analysis.html"><i class="fa-solid fa-magnifying-glass-chart"></i><br>System Analysis</a> </div>
              </div>

              <div class="d-lg-flex d-sm-block" id="row-2">
                <div class="col-lg-6 col-sm-10 ai-box"><a href="management.html"><i class="fa-solid fa-people-roof"></i><br>Project Management</a> </div>
                <div class="col-lg-6 col-sm-10 ai-box"><a href="./mobileApp.html"><i class="fa-solid fa-mobile-screen-button"></i><br>Mobile Application</a> </div>
              </div>

              <div class="d-lg-flex d-sm-block" id="row-3">
                <div class="col-lg-4 col-sm-10 ai-box"><a href="webApplication.html"><i class="fa-solid fa-laptop"></i><br>Web Application</a> </div>
                <div class="col-lg-4 col-sm-10 ai-box"><a href="./UiUX.html"><i class="fa-solid fa-palette"></i><br>UI/UX</a> </div>
                <div class="col-lg-4 col-sm-10 ai-box"><a href="./cybersecurity.html"><i class="fa-solid fa-user-lock"></i><br>Cyber-Security</a> </div>
              </div>
          </div>
         </section>
>>>>>>> 19fc9b1f51e7babe1c1fd18d699470d9dedf6256

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
<<<<<<< HEAD
</html>
<?php $conn->close(); ?>
=======
</html>
>>>>>>> 19fc9b1f51e7babe1c1fd18d699470d9dedf6256
