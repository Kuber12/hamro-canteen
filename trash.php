<?php

$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];


$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "schoolDb";
$tableName = "students";
$sql = "INSERT INTO $tableName (id, name, age, eamil,  phone) values ($id, $name, $age, $email, $phone);  


$conn = new mysqli($servername,$username, $password);

if($conn->connect_error){

    die("error");


}
else{
    echo "connected successfully";
}

