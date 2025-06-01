<?php include('databaseconn.php')?>
<?php
//Start a session
    session_start();

    //Subscription button 
    if(isset($_POST['subscribe_button'])){
        //Input santization
        $Subscribe_name = filter_input(INPUT_POST, "subscribe_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $Cardholder_name = filter_input(INPUT_POST, "cardholder_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $Card_number = filter_input(INPUT_POST, "card_number", FILTER_SANITIZE_SPECIAL_CHARS);
        $Expiry_date = filter_input(INPUT_POST, "expiry_date", FILTER_SANITIZE_SPECIAL_CHARS);

            // Upload data into database
            $stmt = "INSERT INTO subscription 
            (Name, Cardholder_name, Card_number, Expiry_date) 
            VALUES 
            ('$Subscribe_name', 
            '$Cardholder_name', 
            '$Card_number', 
            '$Expiry_date')";

            //Execute Query
            try{
            mysqli_query($conn, $stmt);
            //To Display a user-friendly notification
            $_SESSION["message"] = "Your subscription is successful. We will contact you soon.";
            $_SESSION["message_type"] = "success";
            header("Location: ../index.php");
                exit();
        }
        catch(mysqli_sql_exception $e){
            //To Display a user-friendly notification
            $_SESSION["message"] = "Subscription failed. Please check your details and try again.";
            $_SESSION["message_type"] = "error";
            header("Location: ../subscribe.php");
                exit();
            }
        }
    mysqli_close($conn);

?> 