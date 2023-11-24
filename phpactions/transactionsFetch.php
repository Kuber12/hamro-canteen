<?php
include("./connection.php");

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$sql = "SELECT fullName, phone, payment, status, orderID, orderedTime, gtotal
        FROM orders
        INNER JOIN users ON orders.userID = users.userID
        WHERE status = 'order placed' OR status = 'Delivered'
        ORDER BY orderID DESC";

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
