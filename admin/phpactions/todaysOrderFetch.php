<?php
include("./connection.php");

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$sql = "SELECT order_items.foodName, SUM(order_items.quantity) AS totalQuantity
    FROM orders
    JOIN order_items ON orders.orderID = order_items.orderID
    WHERE DATE(orders.orderedDate) = CURRENT_DATE
    GROUP BY order_items.foodName;";

$result = $conn->query($sql);

if (!$result) {
    die('Query failed: ' . $conn->error);
}

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}


$conn->close();


echo json_encode($data);
?>
