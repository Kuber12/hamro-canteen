<?php
session_start();

$servername = "localhost";
$dbusername = "root";
$password ="";
$dbname = "hamro-canteen";

$userName = $_POST['username'];
$loginPassword = $_POST['password'];


// Create connection
$conn = new mysqli($servername, $dbusername, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Full_Name FROM users WHERE username = '$userName' and password = '$loginPassword'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // storing the session name 

    $_SESSION['fullName'] =   $result->fetch_assoc()['Full_Name'];
  
    header("location:index.php");
  
   

} else {
  echo "0 results";
}
$conn->close();
?>