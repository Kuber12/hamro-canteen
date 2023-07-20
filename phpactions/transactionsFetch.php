<?php 
    include("./connection.php");

    $sql = "select username,fullName,phone,payment,status,orderID,orderDate,gtotal from orders inner join users on orders.userID = users.userID order by orderID desc;";
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