<?php
include('connection.php');
if($_SERVER['REQUEST_METHOD']   == 'POST'){
    if(isset($_POST['submit'])){
      $email = $_POST['email'];
      $sql = "SELECT * FROM user WHERE email = '$email'";
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result) == 0 ) {
            echo '0'; // indicates  email does not exits;
      }
      else{
        if(!isset($_SESSION['start_time'])) {
            $_SESSION['start_time'] = time();
            $OTP =mt_rand(100000, 999999);
            $_SESSION["otp"]=$OTP ;            
        }        
        
      }

    }
    if(isset($_POST['send'])){
         
        $current_time = time();
        $expiration_time = $_SESSION['start_time'] + 59;
        
        if ($current_time >= $expiration_time) {
            echo "0"; // indicates session expired 
            session_destroy();
            exit();
        }

            $sql = "UPDATE user SET password = '$password'";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo 'Password Reset Successful';
            }
        }
    }
 


  ?>
  