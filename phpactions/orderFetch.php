<?php
include("./connection.php");
$userID = $_SESSION['userID'];

$sql = "SELECT * FROM orders WHERE userID = '$userID' ORDER BY orderID desc";
$result = $conn->query($sql);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close database connection
$conn->close();

// Return data as JSON
echo json_encode($data);
?>
