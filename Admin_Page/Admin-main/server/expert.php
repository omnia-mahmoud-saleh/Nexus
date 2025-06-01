<!--Establish Database Connection -->
<?php include('../../../server/databaseconn.php')?>
<?php
session_start();

// Check if admin is logged in, else redirect to login page
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../admin_login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPERTS</title>
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/icons/all.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <!--Fetch the data from Database -->
    <?php 
        $stmt = "SELECT Expert_ID, Name, National_ID, Phone, Address, Email, File_path, Status FROM expert";
        $result = mysqli_query($conn, $stmt);
        if(mysqli_num_rows($result) > 0){
            echo "<table border = '1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>National ID</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Email</th>
                <th>CV File</th>
                <th>Control</th>
                <th>Current Status</th>
                <th>Status Control</th>
            </tr>
            ";
            while($assoc = mysqli_fetch_assoc($result)){
                $file_path = $assoc['File_path'];
                // Redirect file path to dir uploads
                $updated_file_path = "../../../server/" . $file_path;
                // Check if the file exists before displaying the link
                if (file_exists($updated_file_path)) {
                    $file_link = "<a href='$updated_file_path' target='_blank'>View PDF</a>";
                } else {
                    $file_link = "File not found";
                }
                
                echo"<tr>
                <td>{$assoc['Expert_ID']}</td>
                <td>{$assoc['Name']}</td>
                <td>{$assoc['National_ID']}</td>
                <td>{$assoc['Phone']}</td>
                <td>{$assoc['Address']}</td>
                <td>{$assoc['Email']}</td>
                <td>$file_link</td>
                <td>
                    <form action='delete_expert.php' method='post' onsubmit='return confirm(\"Are you sure you want to delete this record?\")'>
                        <input type='hidden' name='id' value='{$assoc['Expert_ID']}'>
                        <button type='submit' class='btn btn-danger'>Delete</button>
                    </form>
                </td>
                <td>{$assoc['Status']}</td>
                <td>
                    <form action='expert_status.php' method='post' onsubmit='return confirm(\"Confirm Status Change?\")'>
                        <input type='hidden' name='id' value='{$assoc['Expert_ID']}'>
                        <button type='submit' name='accept_button_expert'>Accept</button>
                        <button type='submit' name='reject_button_expert'>Reject</button>
                    </form>
                </td>
                </tr>
                ";
            }
            echo "</table>";
        }
        else{
            echo 'No Records Found.';
        }
        mysqli_close($conn);
    ?>
    <br>
    <button><a href="../dashboard.php">Go Home</a></button>
    <script src="../assets/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>