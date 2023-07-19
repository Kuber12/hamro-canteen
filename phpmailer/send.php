<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include('../phpactions/connection.php');

if(isset($_POST['submit'])){
    $email = $_POST['email'];
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result) == 0 ) {
         echo 'false'; 
  }
  else{
    
        $_SESSION['start_time'] = time();
        $OTP =mt_rand(100000, 999999);         
        $otpHash = password_hash($OTP, PASSWORD_DEFAULT);         
        $_SESSION["otp"]=$otpHash; 
        $_SESSION['email'] = $email;
       
        //Load Composer's autoloader
        require 'Exception.php';
        require 'PHPMailer.php';
        require 'SMTP.php';

//Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
                          //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'shivkumarghimire25@gmail.com';                     //SMTP username
            // $mail->Username   = 'kubershakya123@gmail.com';                     //SMTP username
            $mail->Password   = 'uvophahlpjzlykjk';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('shivkumarghimire25@gmail.com', 'From');
            // $mail->setFrom('kubershakya123@gmail.com', 'From');
            $mail->addAddress($email, 'Dear User,');     //Add a recipient
        



            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'OTP';
            $mail->Body    = $OTP;


            $mail->send();
            echo 'true';
            mysqli_close($conn);
        } catch (Exception $e) {
            echo "0";
        }                
     
        
        }
        }  

