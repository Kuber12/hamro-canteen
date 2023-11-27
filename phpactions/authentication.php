<?php
include("connection.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
$email = $_POST['email'];
$password = $_POST['password'];


    $sqlquery = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn, $sqlquery);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['adminName'] = $row['adminName'];
            $_SESSION['usertype'] = "admin";
            $_SESSION['email'] = $email;
            echo "true";
        }else{
            echo "false";
        }
    }else{
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $resultU = mysqli_query($conn, $sql);        
        if (mysqli_num_rows($resultU) > 0) {
            $row = mysqli_fetch_assoc($resultU);
            if (password_verify($password, $row['password'])) {
                $_SESSION['userID'] = $row['userID'];
                $_SESSION['fullName'] = $row["fullName"];
                $_SESSION['imageUrl'] = $row["imageUrl"];
                $_SESSION['email'] = $row["email"];
                $_SESSION['phone'] = $row["phone"];
                $_SESSION['address'] = $row["address"];
                $_SESSION['dob'] = $row["DOB"];
                $_SESSION['gender'] = $row["gender"];
                $_SESSION['amount'] = $row["amount"];
                echo  "true";
            } else{
                echo "false";
            }
        
        }else{
            echo "false";
        }
        
    }
     

}


        mysqli_close($conn);
?>
