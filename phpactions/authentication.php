<?php
include("connection.php");

$userName = $_POST['username'];
$loginPassword = $_POST['password'];

try {

$sql = "SELECT fullName, imageUrl FROM users WHERE username = '$userName' and password = '$loginPassword'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // storing the session name 
    $row = $result->fetch_assoc();
    $_SESSION['fullName'] = $row["fullName"];
    $_SESSION['imageUrl'] = $row["imageUrl"];
    header("Location:../index.php");
    exit();
} else {
  header("Location: ../login.php?msg=incorrect"); 
  exit();
}
}
catch(Exception) {

  echo "Something is missing in database or table or sql syntax please check sqlQuery and database";
}
$conn->close();
?>