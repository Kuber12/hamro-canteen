
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
        color:black;
   
    } 
    tr{
      
      box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
    }
 
       

    th, td {
        width :180px;
        text-align: left;
        font-size:14px;
        font-weight:600;  
       padding-left:20px; 
             
      }
    td{
       height:60px;

       
    }
    th{
        background-color:#eaeaea;
        top:0;
        position: sticky;
        height:50px;
        font-size: 16px;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        
       
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
    width: 500px;
      height: 500px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      background-color:white;
      position:fixed;
      top:50%;
      left:50%;
      transform: translate(-50%,-50%);
      z-index:6;
      
    }
    tbody{
     overflow:scroll;
    }
    .header {
      text-align: center;
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
    .receipt th, .receipt td{
      height:10px;
    }
    
    #footer {
      position: absolute;
      bottom: 20px;
      margin-top:25px;
      width:90%;
      display: flex;
      justify-content: space-between; 
      
    }
   .blockerr{
    display:none;
    width:100vw;
    height: 100vh;
    background-color:black;
    position:fixed;
    top:0;
    left:0;
    z-index:3;
    opacity:0.8;
   }
   #odate{
    text-align:right;
   }
   .view_btn{
    background: none;
    border:none;
    color:orange;
   }
#header_img{
  position: fixed;
  left:23%;
  top:7%;
}
#close_receipt{
  position:absolute;
  top:12px;
  right:0;
}
.download-button{
  color:black;
}
@media screen and (max-width: 700px) {
  .home-text{
    display:none;
  }
  .receipt_container{
    width:90%;
    height:90%;
  }
  .order-table{    
        width: 100vw;   
        margin-left:0;
    }
}


</style>







 
<span class='home'><a href='index.php' ><i class='fa-solid fa-circle-arrow-left' style = 'margin-right:5px;'></i> <span class="home-text">Home</span> </a> Hamro Canteen<a href='index.php'><img src='./assets/logo-yellow.png' alt ="logo"></a></span>
<div class='user'><p>Your Order History</p></div>

<div class='order-table'>
    
 <table class="orders">
<th> Order Date </th> <th> Order ID </th> <th> Amount </th> <th> Payment </th> <th> Status </th> <th>Details</th> <th>Cancel</th>
</table>
<div id="receipt_container" class="receipt_container">
        <span id="orderID">Order ID: ${orderID}</span>
        <i class="fa-solid fa-circle-xmark fa-xl" id="close_receipt" onclick="closeReceipt();"></i>
        <div class="header">
            <img src="./assets/logo.png" alt="logo">
            <u style="display:block;font-size:22px;margin-bottom:10px">Order Receipt</u>
            
        </div>
        <div class="info">
            <span id="cName">Name:<?php echo " " . $userName ?> </span>
            <span id="odate">Order Date: </span>
        </div>
        <table class="receipt">
          <thead>
            <tr>
                    <th>S.N</th>
                    <th>Food Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
            </tr>
            </thead>
            <tbody>
              
            </tbody>
        </table>
</div>

<div class="blockerr" onclick="closeReceipt()">

</div>

    <script src="./scripts/jquery.js"></script>
    <script src="./scripts/order-history-fetch.js"></script>

<?php 
include("./layout/foot.php");
?>