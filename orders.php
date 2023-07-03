
<?php
session_start();
include("./layout/head.php");
$userName = $_SESSION['fullName'];
?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
      position: relative;
      left:7%;
      text-align: center;
      margin-bottom: 40px;
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
    .receipt th, #fitems td{
      height:20px;
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
    position:absolute;
    top:0;
    left:0;
    z-index:5;
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

</style>







 
<span class='home'><a href='index.php' ><i class='fa-solid fa-circle-arrow-left' style = 'margin-right:5px;'></i> Home </a> Hamro Canteen<a href='index.php'><img src='./assets/logo-yellow.png' alt ="logo"></a></span>
<div class='user'><p>Your Order History</p></div>

<div class='order-table'>
    
 <table class="orders">
<th> Order Date </th> <th> Order ID </th> <th> Amount </th> <th> Payment </th> <th> Status </th> <th>Details</th>





</div>

<div class="blockerr" onclick="closeReceipt()">

</div>



  
    <script src="./scripts/jquery.js"></script>
    <script src="./scripts/order-history-fetch.js"></script>


    <script>
        let div = document.getElementById('receipt_container');
        let btn = document.getElementById('downloadBtn');
        btn.addEventListener("click", function(){
          var opt ={
            margin : 1,
            filename: 'file.pdf',
            image: {type:'jpeg', qulaity:0.98},
            html2canvas: { scale:2 },
            jsPDF: { unit:'in', format:'letter', orientation:'portrait'},
            };
        // }
        html2pdf().from(div).set(opt).save();
    });
    </script>


<?php 
include("./layout/foot.php");
?>