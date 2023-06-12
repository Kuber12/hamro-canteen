<?php 
    include("./connection.php");
    $username = $_SESSION['fullName'];
 

    $sql = "select * from orders where fullName = '$username'";
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
 
