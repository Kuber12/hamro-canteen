<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <link rel="stylesheet" href="./styles/bill.css"> -->
</head>
<body>
<div id="receipt_container" class="receipt_container" style="color:red; position:absolute">
        <span id="orderID">Order ID: ${orderID}</span>
        <i class="fa-solid fa-circle-xmark fa-xl" id="close_receipt" onclick="closeReceipt();"></i>
        <div class="header">
            <img id="header_img" src="./assets/logo.png" alt="logo">
            <h2>Hamro Canteen</h2>
            <h4><u>Order Receipt</u></h4>
            
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
            <tbody id="fitems">

            </tbody>
        </table>
    <button id='downloadBtn'>Download </button>
    
</body>
<!-- <script src="./scripts/jquery.js"></script>
    <script src="./scripts/order-history-fetch.js"></script> -->
<script>
       let div = document.getElementById('receipt_container');
        let btn = document.getElementById('downloadBtn');
        btn.addEventListener("click", function(){
        // html2pdf().from(div);
        var opt= {
            margin : 0,
            filename: 'file.pdf',
            image: {type:'jpeg', quality:1},
            html2canvas:{ scale:2 },
            jsPDF: { unit:'in', format:'letter', orientation:'portrait'}
            }
        // }
        html2pdf().from(div).set(opt).save();
    });
       
</script>

</html>