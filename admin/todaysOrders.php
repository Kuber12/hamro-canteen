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
            <h2 class="dashboard-heading-text">Today's Orders</h2>
        </div>
        <div class="menu-content">
            <table class="styled-table transaction-table" border="1" cellspacing="0">
                <tr>
                    <th>S.N</th>
                    <th>Item</th>
                    <th>Quantity</th>
                </tr>
            </table>
        </div>
    </div>
</div>

<script src="./scripts/todays-order-fetch.js"></script>

<?php
    include './layout/foot.php';
?>