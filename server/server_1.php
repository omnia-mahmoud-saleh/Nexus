<?php include('databaseconn.php')?>
<?php
    //Start a session
    session_start();
    //Registration button Expert
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['button_submit_expert'])){
        //Input sanitization
        $expert_name = filter_input(INPUT_POST, "expert_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $national_id = filter_input(INPUT_POST, "national_id", FILTER_SANITIZE_SPECIAL_CHARS);
        $expert_phone = filter_input(INPUT_POST, "expert_phone", FILTER_SANITIZE_SPECIAL_CHARS);
        $expert_address = filter_input(INPUT_POST, "expert_address", FILTER_SANITIZE_SPECIAL_CHARS);
        $expert_email = filter_input(INPUT_POST, "expert_email", FILTER_SANITIZE_SPECIAL_CHARS);
        $expert_password = filter_input(INPUT_POST, "expert_password", FILTER_SANITIZE_SPECIAL_CHARS);
        $expert_gender = filter_input(INPUT_POST, "expert_gender", FILTER_SANITIZE_SPECIAL_CHARS);
        $expert_bio = filter_input(INPUT_POST, "expert_discription", FILTER_SANITIZE_SPECIAL_CHARS);
        // Get selected tools' id if exists else an empty array
        $tools_selected = $_POST['tools'] ?? [];
        //To Check for empty tools' selection
        if(empty($tools_selected)){
            $_SESSION["message"] = "You must select at least one tool.";
            $_SESSION["message_type"] = "error";
            header("Location: ../expertRegister.php");
            exit();
        }


        //Hash the password:
        $hash = password_hash($expert_password, PASSWORD_DEFAULT);
        
        //Handle file upload:
        $pdf_name = $_FILES["expert_cv"]["name"];
        $pdf_temp = $_FILES["expert_cv"]["tmp_name"];

        // Define the upload directory
        $upload_dir = "uploads/";
        
        // Create the directory if it doesn't exist
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        // Generate a unique file name
        $file_path = $upload_dir . uniqid() . "_" . $pdf_name;

         // Move the uploaded file to the server directory
        if (move_uploaded_file($pdf_temp, $file_path)) {
             // Begin transaction
            $conn->begin_transaction();

            try {
                // Insert into expert table
                $stmt = $conn->prepare("INSERT INTO expert 
                    (Name, National_ID, Phone, Address, Email, Password, Gender, Bio, File_name, File_path) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssssssss", 
                    $expert_name, $national_id, $expert_phone, 
                    $expert_address, $expert_email, $hash, $expert_gender, $expert_bio, 
                    $pdf_name, $file_path);
                $stmt->execute();

                // Get inserted Expert_ID
                $expert_id = $stmt->insert_id;
                $stmt->close();

                // Insert selected tools into expert_tools
                
                $stmt = $conn->prepare("INSERT INTO expert_tool (Expert_ID, Tool_ID) VALUES (?, ?)");
                foreach ($tools_selected as $tool_id) {
                    $stmt->bind_param("ii", $expert_id, $tool_id);
                    $stmt->execute();
                }
                $stmt->close();
                

                $conn->commit(); // all good
                $_SESSION["message"] = "Registration Successful!";
                $_SESSION["message_type"] = "success";
                header("Location: ../expertLOGIN.php");
                exit();

            } catch (mysqli_sql_exception) {
                $conn->rollback(); // rollback all if any fail
                $_SESSION["message"] = "Registration Unsuccessful: ";
                $_SESSION["message_type"] = "error";
                header("Location: ../expertRegister.php");
                exit();
            }
        } else {
            $_SESSION["message"] = "Error Moving the file.";
            $_SESSION["message_type"] = "error";
            header("Location: ../expertRegister.php");
            exit();
        }
}


    //Login button Expert
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['button_login_expert'])){
        //Sanitizing inputs
        $expert_name = filter_input(INPUT_POST, "expert_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $expert_password = filter_input(INPUT_POST, "expert_password", FILTER_SANITIZE_SPECIAL_CHARS);
        //Querying Data
        $stmt = "SELECT * FROM expert WHERE BINARY (Name) = '$expert_name'";
        $result = mysqli_query($conn, $stmt);
        if(mysqli_num_rows($result) > 0){
            while($assoc = mysqli_fetch_assoc($result)){
                $stored_hash = $assoc['Password'];
                //Comparing hash value with password
                if(password_verify($expert_password, $stored_hash)){
                    //To Display a user-friendly notification
                    $_SESSION["message"] = "Logged In Successfully!";
                    $_SESSION["message_type"] = "success";
                    header("Location: ../index.php"); 
                exit();
                }
                else{
                     //To Display a user-friendly notification 
                     $_SESSION["message"] = "Incorrect Password";
                     $_SESSION["message_type"] = "error";
                     header("Location: ../expertLOGIN.php");
                 exit();
                }
            }
        }
        else{
            $_SESSION["message"] = "No User Found or Incorrect username / password";
            $_SESSION["message_type"] = "error";
            header("Location: ../expertLOGIN.php");
        }

    }


    //Registration button User
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register_button_user'])){
        //Input Sanitization
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $national_id = filter_input(INPUT_POST, "national_id", FILTER_SANITIZE_SPECIAL_CHARS);
        $user_phone = filter_input(INPUT_POST, "user_phone", FILTER_SANITIZE_SPECIAL_CHARS);
        $user_address = filter_input(INPUT_POST, "user_address", FILTER_SANITIZE_SPECIAL_CHARS);
        $user_password = filter_input(INPUT_POST, "user_password", FILTER_SANITIZE_SPECIAL_CHARS);
        $user_email = filter_input(INPUT_POST, "user_email", FILTER_SANITIZE_SPECIAL_CHARS);
        //Hash Password
        $hash = password_hash($user_password, PASSWORD_DEFAULT);
        //Upload data into database
        $stmt = "INSERT INTO user (Name, 
        National_ID, 
        Phone, 
        Address, 
        Email, 
        Password) VALUES ('$username', 
        '$national_id', 
        '$user_phone', 
        '$user_address', 
        '$user_email', 
        '$hash')";
        //Execute Query
        try{
            mysqli_query($conn, $stmt);
            //To Display a user-friendly notification
            $_SESSION["message"] = "Registration Successful!";
            $_SESSION["message_type"] = "success";
            header("Location: ../userLOGIN.php");
                exit();
        }
        catch(mysqli_sql_exception){
            //To Display a user-friendly notification
            $_SESSION["message"] = "Username already taken. Please try again.";
            $_SESSION["message_type"] = "error";
            header("Location: ../userRegister.php");
                exit();
            }
    }


    //Button Login User
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['button_login_user'])){
        //Sanitize input
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $user_password = filter_input(INPUT_POST, "user_password", FILTER_SANITIZE_SPECIAL_CHARS);
        //Compare data with database
        $stmt = "SELECT * FROM user WHERE Name = '$username'";
        $result = mysqli_query($conn, $stmt);
        if(mysqli_num_rows($result) > 0){
            while($assoc = mysqli_fetch_assoc($result)){
                $stored_hash = $assoc['Password'];
                if(password_verify($user_password, $stored_hash)){
                    //Declaring a super variable (To indicate logged-in status for the user)
                    $_SESSION["user_logged_in"] = true;
                    //Declaring another super var to store username
                    $_SESSION["user_name"] = $username;
                    //To Display a user-friendly notification
                    $_SESSION["message"] = "Logged In Successfully!";
                    $_SESSION["message_type"] = "success";
                    header("Location: ../index.php");
                exit();
                }
                else{
                    //To Display a user-friendly notification 
                    $_SESSION["message"] = "Incorrect Password";
                    $_SESSION["message_type"] = "error";
                    header("Location: ../userLOGIN.php");
                exit();
                }
            }
        }
        else{
            //To Display a user-friendly notification
            $_SESSION["message"] = "No User Found or Incorrect username / password";
            $_SESSION["message_type"] = "error";
            header("Location: ../userLOGIN.php");
        }
    }
    mysqli_close($conn);
?>
