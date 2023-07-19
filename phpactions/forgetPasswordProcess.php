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
                $_SESSION['passwordTime'] = time();
                echo 'true';
            }
            else{
                echo 'false';
            } 
            
            
        }
        unset($_SESSION['email']); 
        }

        if(isset($_POST['reset'])){
            $password = $_POST['password'];
            $cPassword = $_POST['cPassword'];

            $current_time = time();
            $expiration_time = $_SESSION['passwordTime'] + (1*60);            

            if ($current_time >= $expiration_time) {
                echo '1'; // indicates session expired 
                session_destroy();
                exit();
            }else{
            $condition = empty($password) || empty($cPassword) || 
            !preg_match("/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,12}$/", $password)|| 
            $password !== $cPassword;
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            if($condition){
                echo '0'; // indicates  password validation failed
            }else{
                $email = $_SESSION['email'];
                $sql = "UPDATE users SET password = '$passwordHash' where email = '$email'";
                         $result = mysqli_query($conn, $sql);
                         if($result){
                         echo 'true';
                         session_destroy();
                      }else{ 
                        echo 'false';                    
            }
              } 
              unset( $_SESSION['validOTP']);
        }
        }
    mysqli_close($conn);
}

  ?>
  