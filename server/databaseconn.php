<<<<<<< HEAD
<?php
    $user = "root";
    $server = "localhost";
    $dbname = "ai_nexus";
    $dbpass = "";

    try{
        $conn = mysqli_connect($server, $user, $dbpass, $dbname);
    }
    catch(mysqli_sql_exception){
        echo"Could not connect.";
    }

=======
<?php
    $user = "root";
    $server = "localhost";
    $dbname = "ai_nexus";
    $dbpass = "";

    try{
        $conn = mysqli_connect($server, $user, $dbpass, $dbname);
    }
    catch(mysqli_sql_exception){
        echo"Could not connect.";
    }

>>>>>>> 19fc9b1f51e7babe1c1fd18d699470d9dedf6256
?>