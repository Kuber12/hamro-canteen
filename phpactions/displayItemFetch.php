<?php

// $day = date("D"); 
$day = "Sun";
$today = 'avlbl' . $day; 

 require("./connection.php");
 
 $sql = "select itemID, itemName, itemPrice, itemImg from items where  $today = 1";
 $result = $conn->query($sql);

 if ($conn->connect_error) {
     die('Connection failed: ' . $conn->connect_error);
 }
 
 $data = array();
 while ($row = $result->fetch_assoc()) {
     $data[] = $row;
 }


 $conn->close();

 // Return data as JSON
 echo json_encode($data);
