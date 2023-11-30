<?php
include("connection.php");

$orderID = $_POST['orderID'];

if(isset($_POST['delivered'])){

    $updateCanceledSql = "UPDATE orders SET status = 'Delivered' WHERE orderID = '$orderID'";

    if (mysqli_query($conn, $updateCanceledSql)) {
        echo "true";
     } else {
         echo "Error updating order statuses: " . mysqli_error($conn);
     }
}
if(isset($_POST['cancel'])){

    $sql = "UPDATE orders SET status = 'Canceled' WHERE orderID = '$orderID'";

    if (mysqli_query($conn, $sql)) {
        echo "true";
     } else {
         echo "Error updating order statuses: " . mysqli_error($conn);
     }
}




mysqli_close($conn);
?>

