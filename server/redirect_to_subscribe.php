<<<<<<< HEAD
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
=======
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
>>>>>>> 19fc9b1f51e7babe1c1fd18d699470d9dedf6256
?>