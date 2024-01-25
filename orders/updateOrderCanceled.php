<?php
include("connection.php");

$updateCanceledSql = "UPDATE orders SET status = 'canceled' WHERE status = 'pending'";

if (mysqli_query($conn, $updateCanceledSql)) {
   echo "true";
} else {
    echo "Error updating order statuses: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
