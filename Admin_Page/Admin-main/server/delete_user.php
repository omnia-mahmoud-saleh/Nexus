<<<<<<< HEAD
<?php include('../../../server/databaseconn.php')?>
<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id'])){
        //Ensure integer value [More secure]
        $id = intval($_POST['id']);
        //Execute query
        $stmt = "DELETE FROM user WHERE User_ID = '$id'";
        if(mysqli_query($conn, $stmt)){
            echo "<script>
            alert('Record Deleted Successfully!'); window.location.href='users.php';
            </script>";
        }
        else{
            echo "<script>
            alert('Error Deleting Record.'); window.location.href='users.php';
            </script>";
        }
        mysqli_close($conn);
    }
    else{
        echo "<script>
        alert('Invalid Request Method'); window.location.href='users.php';
        </script>";
    }
=======
<?php include('../../../server/databaseconn.php')?>
<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id'])){
        //Ensure integer value [More secure]
        $id = intval($_POST['id']);
        //Execute query
        $stmt = "DELETE FROM user WHERE User_ID = '$id'";
        if(mysqli_query($conn, $stmt)){
            echo "<script>
            alert('Record Deleted Successfully!'); window.location.href='users.php';
            </script>";
        }
        else{
            echo "<script>
            alert('Error Deleting Record.'); window.location.href='users.php';
            </script>";
        }
        mysqli_close($conn);
    }
    else{
        echo "<script>
        alert('Invalid Request Method'); window.location.href='users.php';
        </script>";
    }
>>>>>>> 19fc9b1f51e7babe1c1fd18d699470d9dedf6256
?>