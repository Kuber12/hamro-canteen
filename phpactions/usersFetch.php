<?php 
    include("./connection.php");

    $sql = "select * from users";
    $result = $conn->query($sql);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

 
    $conn->close();

  
    echo json_encode($data);