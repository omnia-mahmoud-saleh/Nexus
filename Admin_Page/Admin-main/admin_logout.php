<<<<<<< HEAD
<?php
    // Check if admin is logged in, else redirect to login page
    if (!isset($_SESSION['admin_logged_in'])) {
        header('Location: admin_login.php');
    }
    // Destroy the session
    session_start();
    session_destroy();
    //To Display an admin-friendly notification
    session_start();
    $_SESSION["message"] = "Logged Out Successfully";
    $_SESSION["message_type"] = "success";
=======
<?php
    // Check if admin is logged in, else redirect to login page
    if (!isset($_SESSION['admin_logged_in'])) {
        header('Location: admin_login.php');
    }
    // Destroy the session
    session_start();
    session_destroy();
    //To Display an admin-friendly notification
    session_start();
    $_SESSION["message"] = "Logged Out Successfully";
    $_SESSION["message_type"] = "success";
>>>>>>> 19fc9b1f51e7babe1c1fd18d699470d9dedf6256
    header("location: admin_login.php");