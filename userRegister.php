<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registeration</title>
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/icons/all.min.css">
    <link rel="stylesheet" href="./css/login.css">
</head>
<<<<<<< HEAD
<body> 
=======
<body>
>>>>>>> 19fc9b1f51e7babe1c1fd18d699470d9dedf6256
  <!--To Display a user-friendly notification -->
  <?php
    if (isset($_SESSION['message'])) {
        $type = $_SESSION['message_type']; // success, error, etc.
        echo "<div class='alert $type'>{$_SESSION['message']}</div>";
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
  ?>
  <div class="back-home">
    <a href="index.php"><i class="fa-solid fa-arrow-up-right-from-square fa-rotate-270"></i></a>
  </div>
  <!-- <h1>AI Nexus</h1> -->
  <div class="hero">
    <h1 class="ms-5">
      User Registeration
   </h1>
    <!-- <button> <a href="index.php">Back to home page</a></button> -->
  </div>
    <div class="container mt-4">
        <div class="col-lg-10">
            <form action= server/server_1.php method="post">
                <div class="d-lg-flex d-sm-inline" id="consult-input">
                    <input type="text" placeholder=" Name " class="col-lg-4 col-sm-12  mb-3" id="user_name" name="username" required>
                    <input type="number" placeholder=" National ID " class="col-lg-4 col-sm-12  mb-3 ms-3" id="regist-id" name="national_id" required>
                  </div>
                  <div class="d-lg-flex d-sm-inline" id="consult-input">
                    <input type="text" placeholder=" Phone " class="col-lg-4 col-sm-12  mb-3" id="regist-phone" name="user_phone" required>
                    <input type="text" placeholder="Address " class="col-lg-4 col-sm-12  mb-3 ms-3" id="regist-address" name="user_address" required>
                  </div>
                  <div class="d-lg-flex d-sm-inline" id="consult-input">
                    <input type="password" placeholder=" Password " class="col-lg-4 col-sm-12  mb-3" id="user_password" name="user_password" required>
                    <input type="email" placeholder="Email" class=" col-lg-4 col-sm-12  mb-3 ms-3" id="regist-email" name="user_email" required>
                  </div>
                  <div class="d-lg-block d-sm-inline">
                    <!-- <BUtton>Register</BUtton> -->
                    <label class=" log-link">you have an account ?<a href="userLOGIN.php">Log in</a></label>
                    </div>

                    <div class="regist">
                        <button class="btn" type="submit" name="register_button_user">Register</button>
                    </div>
            </form>
        </div>
    </div>
</body>
</body>
</html>