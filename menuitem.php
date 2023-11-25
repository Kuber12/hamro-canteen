<?php
    include './layout/head.php';
    include './layout/admin-sidebar.php';
    require './phpactions/adminVerification.php';
?>
<script>
    function validateForm() {
        var itemID = document.forms["myForm"]["itemID"].value;
        var itemName = document.forms["myForm"]["itemName"].value;
        var itemPrice = document.forms["myForm"]["itemPrice"].value;

        // Validate Item ID (length 5)
        if (itemID.length > 5) {
            return false;
        }

        // Validate Item Name (length 20)
        if (itemName.length > 20) {
            return false;
        }

        // Validate Item Price (decimal with 6,2 format)
        var pricePattern = /^\d+(\.\d{1,2})?$/;
        if (!pricePattern.test(itemPrice)) {
            alert("Item Price must be a decimal number with a maximum of 2 decimal places.");
            return false;
        }

        return true; // The form is valid
    }
</script>
<div class="dashboard-container leftpad20">
    <div class="dashboard-middle-container">
        <div class="dashboard-heading">
            <h2 class="dashboard-heading-text">Menu Items</h2>
            <div class="dashboard-heading-right">
                <input type="text" name="item-search" id="search">
                <button class="action-button">Add Item</button>
            </div>
        </div>
        <div class="menu-content">
            <table class="styled-table" border="1" cellspacing="0">
                <tr>
                    <th>Food ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </table>
            
        </div>
    </div>
</div>
<div id="popup-container">
  <form id="menu-form" action="./phpactions/addOrEditItem.php" method="post" enctype="multipart/form-data" onsubmit= "return validateForm()">
    <span style="font-size:1.2rem;font-weight:800">Add / Edit Items</span>
    <i class="fa-solid fa-circle-xmark fa-2xl closepopup" style="color: #000000;position:absolute;right:10px;top:25px"></i>
    <div id="edit-form-contents">
        <div class="left">
            <label for="itemID">Item ID</label>
            <input type="hidden" name="itemID" required maxlength="5">
            <label for="itemName">Item Name</label>
            <input type="text" name="itemName" required>
            <label for="itemPrce">Item Price</label>
            <input type="number" name="itemPrice" required>
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
                <p id="drag-drop-text">
                    Click or Drag and <br>Drop your image here
                </p>
                <div id="preview"></div>
            </div>
            <input id="image-input" type="file" accept="image/*" name="itemImage">
        </div>
    </div>
    <input id="add-edit" type="submit" value="Add/Edit">
  </form>
</div>
<script src="./scripts/menu-item-fetch.js"></script>
<script src="./scripts/item-search.js"></script>
<script src="./scripts/menu-item.js"></script>
<?php
    include './layout/foot.php';
?>
<link rel="stylesheet" href="./styles/dashboard-tables.css">