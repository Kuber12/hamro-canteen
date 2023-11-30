<?php 
    include("./connection.php");
    $email = $_REQUEST['email'];
    $sql = "delete from users where email = '$email'";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully.";
        header("location:../userslist.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }