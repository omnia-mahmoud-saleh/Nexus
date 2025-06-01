<?php include('databaseconn.php')?>
<?php
<<<<<<< HEAD
//Start a session
    session_start();
=======
>>>>>>> 19fc9b1f51e7babe1c1fd18d699470d9dedf6256

    //Subscription button 
    if(isset($_POST['subscribe_button'])){
        //Input santization
        $Subscribe_name = filter_input(INPUT_POST, "subscribe_name", FILTER_SANITIZE_SPECIAL_CHARS);
<<<<<<< HEAD
=======
        $Subscribe_email = filter_input(INPUT_POST, "subscribe_email", FILTER_SANITIZE_SPECIAL_CHARS);
        $Subscribe_phone = filter_input(INPUT_POST, "subscribe_phone", FILTER_SANITIZE_SPECIAL_CHARS);
>>>>>>> 19fc9b1f51e7babe1c1fd18d699470d9dedf6256
        $Cardholder_name = filter_input(INPUT_POST, "cardholder_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $Card_number = filter_input(INPUT_POST, "card_number", FILTER_SANITIZE_SPECIAL_CHARS);
        $Expiry_date = filter_input(INPUT_POST, "expiry_date", FILTER_SANITIZE_SPECIAL_CHARS);

            // Upload data into database
            $stmt = "INSERT INTO subscription 
<<<<<<< HEAD
            (Name, Cardholder_name, Card_number, Expiry_date) 
            VALUES 
            ('$Subscribe_name', 
=======
            (Name, Email, Phone, Cardholder_name, Card_number, Expiry_date) 
            VALUES 
            ('$Subscribe_name', 
            '$Subscribe_email', 
            '$Subscribe_phone', 
>>>>>>> 19fc9b1f51e7babe1c1fd18d699470d9dedf6256
            '$Cardholder_name', 
            '$Card_number', 
            '$Expiry_date')";

            //Execute Query
<<<<<<< HEAD
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
=======
            if(mysqli_query($conn, $stmt)){
                    //Notify User
                echo "<script>
                        alert('Your subscription was successful. We will contact you soon.');
                        window.location.href = '../index.php';
                        </script>";
                        exit();
            }
            else {
                echo "<script>
                        alert('Subscription failed. Please check your details and try again.');
                        window.location.href = '../subscribe.php';
                        </script>";
                        exit();
           }
        }

    mysqli_close($conn);

?>
>>>>>>> 19fc9b1f51e7babe1c1fd18d699470d9dedf6256
