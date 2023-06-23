<?php 
if(isset($_POST['orderID'])) {
    $orderID = $_POST['orderID'];

    include("./connection.php");
    $username = $_SESSION['userID'];
 

    $sql = "select * from order_items where orderID = '$orderID'";
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
}