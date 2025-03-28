<?php include('databaseconn.php')?>
<?php
    //Registration button Expert
    if(isset($_POST['button_submit_expert'])){
        //Input santization
        $expert_name = filter_input(INPUT_POST, "expert_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $national_id = filter_input(INPUT_POST, "national_id", FILTER_SANITIZE_SPECIAL_CHARS);
        $expert_phone = filter_input(INPUT_POST, "expert_phone", FILTER_SANITIZE_SPECIAL_CHARS);
        $expert_address = filter_input(INPUT_POST, "expert_address", FILTER_SANITIZE_SPECIAL_CHARS);
        $expert_email = filter_input(INPUT_POST, "expert_email", FILTER_SANITIZE_SPECIAL_CHARS);
        $expert_password = filter_input(INPUT_POST, "expert_password", FILTER_SANITIZE_SPECIAL_CHARS);


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
            // Upload data into database
            $stmt = "INSERT INTO expert 
            (Name, National_ID, Phone, Address, Email, Password, File_name, File_path) 
            VALUES 
            ('$expert_name', 
            '$national_id', 
            '$expert_phone', 
            '$expert_address', 
            '$expert_email', 
            '$hash', 
            '$pdf_name', 
            '$file_path')";
            //Execute Query
            mysqli_query($conn, $stmt);
            //Notify User
            echo "<script>
                        alert('Profile has been successfully created.');
                        window.location.href = '../index.php';
                    </script>";
                exit();
        }
        else {
            echo "<script>
                        alert('Error moving the file.');
                        window.location.href = '../expertRegister.html';
                    </script>";
                exit();
        }
    }


    //Login button Expert
    if(isset($_POST['button_login_expert'])){
        //Sanitizing inputs
        $expert_name = filter_input(INPUT_POST, "expert_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $expert_password = filter_input(INPUT_POST, "expert_password", FILTER_SANITIZE_SPECIAL_CHARS);
        //Querying Data
        $stmt = "SELECT * FROM expert WHERE (Name) = '$expert_name'";
        $result = mysqli_query($conn, $stmt);
        if(mysqli_num_rows($result) > 0){
            while($assoc = mysqli_fetch_assoc($result)){
                $stored_hash = $assoc['Password'];
                //Comparing hash value with password
                if(password_verify($expert_password, $stored_hash)){
                    echo "<script>
                        alert('Logged in Successfully');
                        window.location.href = '../index.php';
                    </script>";
                exit();
                }
                else{
                    echo "<script>
                        alert('Incorrect Password');
                        window.location.href = '../expertLOGIN.html';
                    </script>";
                exit();
                }
            }
        }
        else{
            die("<script>
                   alert('No User Found or Incorrect username / password');
                   window.location.href = '../expertLOGIN.html';
                 </script>");
        }

    }


    //Registration button User
    if(isset($_POST['register_button_user'])){
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
        if(mysqli_query($conn, $stmt)){
            echo "<script>
                        alert('Registration Successful');
                        window.location.href = '../index.php';
                    </script>";
                exit();
            //header("location: http://localhost/Grad_Project/Ai-Tools/userLOGIN.html");
        }
        else{
            echo "<script>
                        alert('Registration Unsuccessful');
                        window.location.href = '../userRegister.html';
                    </script>";
                exit();
            }

    }


    //Button Login User
    if(isset($_POST['button_login_user'])){
        //Santize input
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $user_password = filter_input(INPUT_POST, "user_password", FILTER_SANITIZE_SPECIAL_CHARS);
        //Compare data with database
        $stmt = "SELECT * FROM user WHERE Name = '$username'";
        $result = mysqli_query($conn, $stmt);
        if(mysqli_num_rows($result) > 0){
            while($assoc = mysqli_fetch_assoc($result)){
                $stored_hash = $assoc['Password'];
                if(password_verify($user_password, $stored_hash)){
                    echo "<script>
                        alert('Logged in Successfully');
                        window.location.href = '../index.php';
                    </script>";
                exit();
                }
                else{ 
                    echo "<script>
                        alert('Incorrect Password');
                        window.location.href = '../userLOGIN.html';
                    </script>";
                exit();
                }
            }
        }
        else{
            die("<script>
                   alert('No User Found or Incorrect username / password');
                   window.location.href = '../userLOGIN.html';
                 </script>");
        }
    }
    mysqli_close($conn);
?>