<?php
  include('connection.php');
$today = date("d-m-y");
$userID = $_SESSION['userID'];



if($_SERVER["REQUEST_METHOD"]=="GET"){
    $customer_issue =  $_GET['customer_issue'];
  

    $sql = "INSERT INTO customer_issue(details, userID, date) values('$customer_issue','$userID','$today' )";

    $result = mysqli_query($conn, $sql);

    if($result){
       echo "success";
     

    }
    else{
        echo "error in adding issue";
    }
    mysqli_close($conn);
}

