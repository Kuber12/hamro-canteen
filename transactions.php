<?php
    include './layout/head.php';
    include './layout/admin-sidebar.php';
    require './phpactions/adminVerification.php';
?>
<link rel="stylesheet" href="./styles/dashboard-tables.css">
<link rel="stylesheet" href="./styles/receipt.css">
<div class="dashboard-container leftpad20">
  <div class="dashboard-middle-container">
        <div class="dashboard-heading">
            <h2 class="dashboard-heading-text">Transations</h2>
            <div class="dashboard-heading-right">
                <button id="sort-by" class="action-button">
                    <i class="fa-solid fa-sort"></i>
                </button>
                <select name="order-by" id="order-by">
                    <option value="orders.orderId">Date</option>
                    <option value="users.fullName">Name</option>
                    <option value="orders.gtotal">Total</option>
                    <option value="orders.status">Status</option>
                    <option value="orders.payment">Payment</option>
                </select>
                <input type="text" name="user-search" id="search">
            </div>
        </div>
        <div class="menu-content">
            <table class="styled-table transaction-table" border="1" cellspacing="0">
                <tr>
                    <th>Order Date</th>
                    <th>Order ID</th>
                    <th>Full Name</th>
                    <th>Phone</th>
                    <th>Payment</th>
                    <th>Total</th>  
                    <th>Status</th>
                    <th>View</th>
                </tr>
            </table>
        </div>
    </div>
</div>
<div id="receipt_container" class="receipt_container">
        <span id="orderID">Order ID: </span>
        <i class="fa-solid fa-circle-xmark fa-xl" id="close_receipt" onclick="closeReceipt();"></i>
        <div class="header">
            <img id="header_img" src="./assets/logo.png" alt="logo">
            <h2>Hamro Canteen</h2>
            <h4><u>Order Receipt</u></h4>
            
        </div>
        <div class="info">
            <span id="cName">Name: </span>
            <span id="odate">Order Date: </span>
        </div>
        <table class="receipt" id="receipt">
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
        <!-- <button id="downloadPDF">Download as PDF</button> -->
</div>

<div class="blockerr" onclick="closeReceipt()">

<script src="./scripts/transactions-fetch.js"></script>
<script src="./scripts/transactions-search.js"></script>
<script src="./scripts/user-search.js"></script>
<?php
    include './layout/foot.php';
?>