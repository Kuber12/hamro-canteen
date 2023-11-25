<?php

include("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $password = $_POST['password'];
    $email = $_SESSION['email'];
    $sqlquery = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn, $sqlquery);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            
            echo json_encode("success");
        }else{
            echo json_encode("false");
        }
}else{
  echo json_encode("email not found");
}
mysqli_close($conn);
}
?>
