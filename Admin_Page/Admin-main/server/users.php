<!--Establish Database Connection -->
<?php include('../../../server/databaseconn.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERS</title>
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/icons/all.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <!--Fetch Data From Database -->
    <?php
        $stmt = "SELECT User_ID, Name, National_ID, Phone, Email, Address FROM user ";
        $result = mysqli_query($conn, $stmt);
        if(mysqli_num_rows($result) > 0){
            echo "<table border = '1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>National ID</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Control</th>
            </tr>
            ";
            while($assoc = mysqli_fetch_assoc($result)){
                echo "<tr>
                    <td>{$assoc['User_ID']}</td>
                    <td>{$assoc['Name']}</td>
                    <td>{$assoc['National_ID']}</td>
                    <td>{$assoc['Phone']}</td>
                    <td>{$assoc['Email']}</td>
                    <td>{$assoc['Address']}</td>
                    <td>
                        <form action='delete_user.php' method='post' onsubmit='return confirm(\"Are you sure you want to delete this record?\")'>
                            <input type='hidden' name='id' value='{$assoc['User_ID']}'>
                            <button type='submit' class='btn btn-danger'>Delete</button>
                        </form>
                    </td>
                </tr>";
        }
        echo "</table>";
    }
    else {
        echo "No Records Found";
    }
    mysqli_close($conn);
    ?>
    <br>
    <button><a href="../index.html">Go Home</a></button>
    <script src="../assets/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>