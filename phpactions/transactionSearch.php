<?php
require("connection.php");
require("../objects/Search.php");

$query = $_GET['query'];

$search = new Search($conn);

$results = $search->searchTable("username,fullName,phone,payment,status,orderID,orderDate,gtotal","orders inner join users on orders.userID = users.userID", $query);

echo json_encode($results);
?>