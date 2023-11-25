<?php
    include './layout/head.php';
    include './layout/admin-sidebar.php';
    require './phpactions/adminVerification.php';
?>
<link rel="stylesheet" href="./styles/dashboard-tables.css">
<div class="dashboard-container leftpad20">
  <div class="dashboard-middle-container">
        <div class="dashboard-heading">
            <h2 class="dashboard-heading-text">Users</h2>
            <div class="dashboard-heading-right">
                <input type="text" name="user-search" id="search">
                <!-- <button class="action-button">Add User</button> -->
            </div>
        </div>
        <div class="menu-content">
            <table class="styled-table" border="1" cellspacing="0">
                <tr>
                    <th>S.no</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>User Image</th>
                </tr>
            </table>
        </div>
    </div>
</div>
<script src="./scripts/users-fetch.js"></script>
<script src="./scripts/user-search.js"></script>
<?php
    include './layout/foot.php';
?>