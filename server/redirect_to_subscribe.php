<?php
    session_start();
    if(isset($_SESSION["user_logged_in"]) && $_SESSION["user_logged_in"] === true){
        //Head to subscribe.php if condition is met
        header("Location: ../subscribe.php");
        exit();
    }
    else{
        //Head to Login if conditions unmet
        header("Location: ../userLOGIN.php?message=login_required");
        exit();
    }
?>