
<?php
session_start();

$servername = "localhost";
$dbusername = "root";
$password ="";
$dbname = "hamro-canteen";

$userName = $_POST['username'];
$loginPassword = $_POST['password'];

try{
// create connection
$conn = new mysqli($servername, $dbusername, $password, $dbname);

}
catch(Exception){

  echo "database connection error" ;
  
  exit();
}

// authentication part

try {



$sql = "SELECT fullName, imageUrl FROM users WHERE username = '$userName' and password = '$loginPassword'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // storing the session name 

    $_SESSION['fullName'] =   $result->fetch_assoc()['fullName'];
    $_SESSION['imageUrl'] =   $result->fetch_assoc()['imageUrl'];
  
    header("Location:index.php");
    exit();
} else {
  header("Location: login.php?msg=incorrect"); 
  
  exit();
  
}
}
catch(Exception) {

  echo "Something is missing in database or table or sql syntax please check sqlQuery and database";
}
$conn->close();
?>
