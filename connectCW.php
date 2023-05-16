<?php 
require "database.php";

$db = new DataBase();
$conn = $db-> connect();

$table = "users";
$records = [
    "id" => 101;
    "name" => "ram"
]

$db->insert($conn, "products",  $records);

