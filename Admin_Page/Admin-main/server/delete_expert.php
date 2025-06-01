<?php include('../../../server/databaseconn.php')?>
<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id'])){
        //Ensure integer value [More secure]
        $id = intval($_POST['id']);
        //Execute query
        $stmt = "DELETE FROM expert WHERE Expert_ID = '$id'";
        if(mysqli_query($conn, $stmt)){
            echo "<script>
            alert('Record Deleted Successfully!'); window.location.href='expert.php';
            </script>";
        }
        else{
            echo "<script>
            alert('Error Deleting Record.'); window.location.href='expert.php';
            </script>";
        }
        mysqli_close($conn);
    }
    else{
        echo "<script>
        alert('Invalid Request Method'); window.location.href='expert.php';
        </script>";
    }
?>