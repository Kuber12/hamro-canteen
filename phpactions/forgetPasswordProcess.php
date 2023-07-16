<?php
include('connection.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
      $sql = "SELECT * FROM users WHERE email = '$email'";
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result) == 0 ) {
             echo 'false'; 
      }
      else{
        
            $_SESSION['start_time'] = time();
            // $OTP =mt_rand(100000, 999999);
            $OTP =666666;
            $otpHash = password_hash($OTP, PASSWORD_DEFAULT);         
            $_SESSION["otp"]=$otpHash; 
            $_SESSION['email'] = $email;  
               
        echo 'true';      
       
      }
    
       
    }  



    if(isset($_POST['send'])){
         $userOtp = $_POST['otp'];
        $current_time = time();
        $expiration_time = $_SESSION['start_time'] + 59;
        
        if ($current_time >= $expiration_time) {
            echo '0'; // indicates session expired 
            session_destroy();
            exit();
        }else{
            if(password_verify($userOtp,$_SESSION['otp'] )){
                echo 'true';
            }
            else{
                echo 'false';
            }  
            
        }
        }

        if(isset($_POST['reset'])){
            $password = $_POST['password'];
            $cPassword = $_POST['cPassword'];

            $condition = empty($password) || empty($cPassword) || 
            !preg_match("/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,12}$/", $password)|| 
            $password !== $cPassword;
            if($condition){
                echo '0'; // indicates  password validation failed
            }else{
                $email = $_SESSION['email'];
                $sql = "UPDATE users SET password = '$password' where email = '$email'";
                         $result = mysqli_query($conn, $sql);
                         if($result){
                         echo 'true';
                      }else{ 
                        echo 'false';                    
            }
              } 
        }
    
    mysqli_close($conn);
}

  ?>
  