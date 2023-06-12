
<?php
session_start();
include("./layout/head.php");
$userName = $_SESSION['fullName'];
?>

<style>
    body{
        font-family: Nunito Sans;
        width:98vw;
        height: 100vh;
        background: linear-gradient(rgba(0, 0, 0, 0.52), rgba(0, 0, 0, 0.5)),
        url("./assets/pizza.jpeg");
        background-repeat: no-repeat;
        background-size: cover;
   
    }
    
 
       

    th, td {
        width :180px;
        text-align: left;
        padding: 5px;
        font-size:14px;
        font-weight:600;      
       
    }
    th{
        background-color:#eaeaea;
        top:0;
        position: sticky;
        height:24px;
        font-size: 16px;
       
    }
    tr{
        margin-bottom:25px; 
    }
    a{
        text-decoration:none;
        color:white;
        padding-left:5px;
        padding-right:5px;
       

    }
  
    .home{      
        text-align: left;
        color:white;
        display:flex;
        justify-content: space-between;
        align-items: center;
        margin-left:63px;
        margin-right:30px;
        font-size: 30px;
        font-weight: 600;

    

    }
    .user{
      
        position:absolute;
        top:13%;
        font-size:18px;
        font-weight:600;
        text-align: left;
        margin-left:70px;
        color:white;
        z-index:5;
        margin-bottom: 40px;
       

       

    }
    .order-table{
        top:20%;
        position:absolute;        
        width: 90vw;   
        height: 78vh; 
        background-color:white;       
        overflow:scroll;
        margin-left:5vw;
        z-index:0;
        
     
       
    }
    img{
        margin-top: 20px;
        width:80px;   
      
    }
 
    .details{
    
        
        gap :10px;
        position:absolute;
        height:300px;
        width:300px;
        border:1px solid #BD271B;
        background-color: white;
    }
    .name{
        border:1px solid #BD271B;
    }
    /* for receipt */
    body {
      font-family: Arial, sans-serif;
    }
    
    .receipt_container {
      display: none;
      max-width: 500px;
      height: 500px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      background-color:white;
      position:absolute;
      top:50%;
      left:50%;
      transform: translate(-50%,-50%);
      z-index:6;

    }
    
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    
    .info {
      margin-bottom: 10px;
      display: grid;
      grid-template-columns: auto auto;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    
    .receipt  th, .receipt td {
      padding: 5px;
      border-bottom: 1px solid #ccc;
      text-align: center;
    }
    
   .receipt th {
      background-color: #f2f2f2;
    }
    
    .footer {
      margin-top: 20px;
      display: flex;
      justify-content: space-between;
      
    }
   .blockerr{
    display:none;
    width:100vw;
    height: 100vh;
    background-color:black;
    position:absolute;
    top:0;
    left:0;
    z-index:5;
    opacity:0.8;
   }

</style>






 
<span class='home'><a href='index.php' ><i class='fa-solid fa-circle-arrow-left' style = 'margin-right:5px;'></i> Home </a> Hamro Canteen<a href='index.php'><img src='./assets/logo-yellow.png' alt ="logo"></a></span>
<div class='user'><p>Your Order History</p></div>

<div class='order-table'>
    
    <table>
<th> Order Date </th> <th> Order ID </th> <th> Amount </th> <th> Payment </th> <th> Status </th> <th style="background-color:white;"></th>

</table>
</div>



</div>
<div class="blockerr" onclick="closeReceipt()">

</div>

<div class="receipt_container">
  

</div>




<script src="./scripts/jquery.js"> </script>
<script src="./scripts/order-history-fetch.js">

</script>
<?php 
include("./layout/foot.php");
?>