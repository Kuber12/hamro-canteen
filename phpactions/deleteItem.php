<?php 
    include("./connection.php");
    $itemID = $_REQUEST['itemID'];
    $sql = "delete from items where itemID = '$itemID'";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully.";
        header("location:../menuitem.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }