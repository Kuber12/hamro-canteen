
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



$sql = "SELECT Full_Name FROM users WHERE username = '$userName' and password = '$loginPassword'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // storing the session name 

    $_SESSION['fullName'] =   $result->fetch_assoc()['Full_Name'];
  
    header("Location:index.php");
    exit();
} else {
  
  header("Location:login.php?incorrect=1");
  
  exit();
  
}
}
catch(Exception) {

  echo "Something is missing in database or table or sql syntax please check sqlQuery and database";
}
$conn->close();
?>
