<?php
if (isset($_POST['orderID'])) {
    $orderID = $_POST['orderID'];

    include("./connection.php");
    // $username = $_SESSION['userID'];

    // Validate and sanitize the input
    $orderID = mysqli_real_escape_string($conn, $orderID);

    $sql = "SELECT * FROM order_items WHERE orderID = '$orderID'";
    $result = $conn->query($sql);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Close the database connection
    $conn->close();

    echo json_encode($data);
}
?>
