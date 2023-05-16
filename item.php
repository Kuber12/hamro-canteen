
<?php
session_start();

$servername = "localhost";
$dbusername = "root";
$password ="";
$dbname = "hamro_canteen";



// how to connect php with database?


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



$sql = "SELECT * FROM users WHERE ablblsun = 1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // storing the session name 
    $row = $result->fetch_assoc();
    $_SESSION['fullName'] = $row["fullName"];
    $_SESSION['imageUrl'] = $row["imageUrl"];
    $_SESSION['email'] = $row["email"];
    $_SESSION['phone'] = $row["phone"];
    $_SESSION['address'] = $row["address"];

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
