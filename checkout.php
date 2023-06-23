<?php
include("./phpactions/connection.php");
$Date = date("Y-m-d");
$userID = $_SESSION['userID'];
$orderID = 0;
$gtotal = $_SESSION['gtotal'];

$payment = "Cash";
$status = "pending";
$sql0 = "SELECT * FROM orders ORDER BY orderID DESC LIMIT 1";
$result1 = $conn->query($sql0);

if ($result1->num_rows > 0) {
    $row = $result1->fetch_assoc();
    $orderID = $row['orderID'];
    $orderID += 1;
} else {
    echo "error";
}

$sql1 = "INSERT INTO orders(orderID, userID, payment, status, orderDate, gtotal) VALUES ('$orderID', '$userID','$payment','$status','$Date', '$gtotal')";
if (mysqli_query($conn, $sql1)) {
    $cart = $_SESSION['cart'];

    foreach ($cart as $item) {
        $foodName = mysqli_real_escape_string($conn, $item['foodName']);
        $qty = mysqli_real_escape_string($conn, $item['quantity']);
        $price = mysqli_real_escape_string($conn, $item['price']);
        $total = $qty * $price;
        $sql = "INSERT INTO order_items(orderID, foodName, quantity, price, total) VALUES ('$orderID', '$foodName', '$qty', '$price', '$total')";

        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}
unset($_SESSION['cart']);

mysqli_close($conn);

header('location:orders.php');

?>
