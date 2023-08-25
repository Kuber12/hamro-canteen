<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

      if(isset($_POST['send'])){
         $userOtp = $_POST['otp'];
        $current_time = time();
        $expiration_time = $_SESSION['start_time'] + (2*60);
        
        if ($current_time >= $expiration_time) {
            echo '0'; // indicates session expired 
            session_destroy();
            exit();
        }else{
            if(password_verify($userOtp,$_SESSION['otp'] )){
                $_SESSION['validOTP'] = "true";
                echo 'true';
            }
            else{
                echo 'false';
            } 
            
            
        }
       
        }
// this section handles updatepassword 
        if(isset($_POST['reset'])){
            $password = $_POST['password'];
            $cPassword = $_POST['cPassword'];             
       
            $condition = empty($password) || empty($cPassword) || 
            !preg_match("/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,12}$/", $password)|| 
            $password !== $cPassword;
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            if($condition){
                echo "please enter a valid password";
            }else{
                $email = $_SESSION['email'];
                $sql = "UPDATE users SET password = '$passwordHash' where email = '$email'";
                         $result = mysqli_query($conn, $sql);
                         if($result){
                            session_destroy();
                            echo "<script>";
                            echo "var result = confirm('Password Changed Successfully');";
                            echo "if (result) {";
                            echo "    window.location = '../login.php'";
                            echo "} else {";
                            echo "    alert('You clicked Cancel!');";
                             echo "}";
                             echo "</script>";
                      
                      }else{ 
                        echo "<script>";
                        echo "var result = confirm('Failed to change password');";
                        echo "if (result) {";
                        echo "    window.location = '../login.php'";
                        echo "} else {";
                        echo "    alert('You clicked Cancel!');";
                         echo "}";
                         echo "</script>";
            }
              } 
              unset( $_SESSION['validOTP']);
        
        }
    mysqli_close($conn);
}

  ?>
  