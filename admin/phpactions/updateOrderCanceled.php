<?php
include("connection.php");

$interval = 1; // minutes

$updateCanceledSql = "UPDATE orders SET status = 'canceled' WHERE status = 'pending' AND TIMESTAMPDIFF(MINUTE, OrderedTime, NOW()) <= $interval";

if (mysqli_query($conn, $updateCanceledSql)) {
   echo "true";
} else {
    echo "Error updating order statuses: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
