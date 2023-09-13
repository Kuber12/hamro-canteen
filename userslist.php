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
                <button class="action-button">Add User</button>
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
<!-- <div id="popup-container">
  <form action="edititem.php" method="post">
    <div id="edit-form-contents">
        <div class="left">
            <label for="itemID">Item ID</label>
            <input type="text" name="itemID">
            <label for="itemName">Item Name</label>
            <input type="text" name="itemName">
            <label for="itemPrce">Item Price</label>
            <input type="number" name="itemPrice">
            <div id="form-days">
                <label for="availability">Availability</label><br>
                <div class="day"><input type="checkbox" id="sunday" class="day-input" name="avlbl-sun">Sunday</div>
                <div class="day"><input type="checkbox" id="monday" class="day-input" name="avlbl-mon">Monday</div>
                <div class="day"><input type="checkbox" id="tuesday" class="day-input" name="avlbl-tue">Tuesday</div>
                <div class="day"><input type="checkbox" id="wednesday" class="day-input" name="avlbl-wed">Wednesday</div>
                <div class="day"><input type="checkbox" id="thursday" class="day-input" name="avlbl-thurs">Thursday</div>
                <div class="day"><input type="checkbox" id="friday" class="day-input" name="avlbl-fri">Friday</div>
            </div>
        </div>
        <div class="right">
            <label for="itemImg">Item Image</label>
            <div id="image-upload-container">
                <p id="drag-drop-text" style="padding:0px 20px;margin:40% 0px">
                    Click or Drag and <br>Drop your image here
                </p>
                <div id="preview"></div>
            </div>
            <input id="image-input" style="display:none" type="file" accept="image/*" name="itemImage">

        </div>
    </div>
    <input id="add-edit" type="submit" value="Add/Edit">
  </form>
</div> -->
<!-- <script src="./scripts/menu-item.js"></script> -->
<script src="./scripts/users-fetch.js"></script>
<script src="./scripts/user-search.js"></script>
<?php
    include './layout/foot.php';
?>