<?php
require("connection.php");
require("../objects/Search.php");

$query = $_GET['query'];

$search = new Search($conn);

$results = $search->searchTable("users","fullName", $query);

echo json_encode($results);
?>