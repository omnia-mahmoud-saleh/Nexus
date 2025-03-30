<!--Establish Database Connection -->
<?php include('databaseconn.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPERTS</title>
    <link rel="stylesheet" href="../admin/assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/assets/icons/all.min.css">
    <link rel="stylesheet" href="../admin/css/main.css">
</head>
<body>
    <!--Fetch the data from Database -->
    <?php 
        $stmt = "SELECT ID, Name, National_ID, Phone, Address, Email, File_path, Status FROM expert";
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

                // Check if the file exists before displaying the link
                if (file_exists($file_path)) {
                    $file_link = "<a href='$file_path' target='_blank'>View PDF</a>";
                } else {
                    $file_link = "File not found";
                }
                
                echo"<tr>
                <td>{$assoc['ID']}</td>
                <td>{$assoc['Name']}</td>
                <td>{$assoc['National_ID']}</td>
                <td>{$assoc['Phone']}</td>
                <td>{$assoc['Address']}</td>
                <td>{$assoc['Email']}</td>
                <td>$file_link</td>
                <td>
                    <form action='delete_expert.php' method='post' onsubmit='return confirm(\"Are you sure you want to delete this record?\")'>
                        <input type='hidden' name='id' value='{$assoc['ID']}'>
                        <button type='submit' class='btn btn-danger'>Delete</button>
                    </form>
                </td>
                <td>{$assoc['Status']}</td>
                <td>
                    <form action='expert_status.php' method='post' onsubmit='return confirm(\"Confirm Status Change?\")'>
                        <input type='hidden' name='id' value='{$assoc['ID']}'>
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
    <script src="../admin/assets/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../admin/js/main.js"></script>
</body>
</html>
