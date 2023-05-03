<?php
    include './layout/head.php';
    include './layout/admin-sidebar.php';
?>
<link rel="stylesheet" href="./styles/dashboard-tables.css">
<div class="dashboard-container leftpad20">
  <div class="dashboard-middle-container">
        <div class="menu-heading">
            <h2 class="menu-text">Item's availabe</h2>
        </div>
        <div class="menu-content">
            <table class="styled-table" border="1" cellspacing="0">
                <tr>
                    <th>Food ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Sunday</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Edit</th>
                </tr>
            </table>
            <button class="action-button" id="add-item">Add Item</button>
        </div>
        <div id="popupContainer">
            <div id="popupContent">

            </div>
        </div>
    </div>
</div>
<!-- <script src="./scripts/menu-items.js"></script> -->
<script src="./scripts/menu-item-fetch.js"></script>
<?php
    include './layout/foot.php';
?>