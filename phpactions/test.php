<?php
include('connection.php');
$email = "shivkumarghimire25@gmail.com";

$sql = "SELECT TimeStamp, OTP FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >= 0) {
        

$row = mysqli_fetch_assoc($result);
$databaseDatetime = $row['TimeStamp'];
echo $databaseDatetime . "<br>";
$databaseOTP = $row['OTP'];

$currentDatetime = date("Y-m-d H:i:s");
echo $currentDatetime. "<br>";


$databaseDateTimeObj = new DateTime($databaseDatetime);
$currentDateTimeObj = new DateTime($currentDatetime);

$timeDifference = $currentDateTimeObj->diff($databaseDateTimeObj);

// Extract minutes from the time difference
$minutesDifference = $timeDifference->days * 24 * 60 + $timeDifference->h * 60 + $timeDifference->i;
echo $minutesDifference;



// if ($minutesDifference > 30 ) {
//     echo 'timeout'; // indicates session expired 
//     session_destroy();
//     exit();
// }else{
//     if($userOtp == $databaseOTP){
//         $_SESSION['validOTP'] = "true";
//         echo 'true';
//     }
//     else{
//         echo 'false';
//     } 
    
    
// }
}

?>