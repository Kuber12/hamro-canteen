<?php

include("connection.php");
$orderID = $_POST['id'];

$sql = "UPDATE orders SET status = 'canceled' where orderID = '$orderID'";

if(mysqli_query($conn, $sql)){
          echo "true";
    
}else{
    echo "failed";
}
mysqli_close($conn);