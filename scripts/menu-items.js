let fetchedResponse;

$(document).ready(function() {
    $("#add-item").click(function() {
        $("#popupContent").html(`
            <form method='post' action='./phpactions/insertItem.php'>
                <div class="add-item-id">
                    <label>Food item ID</label><br>
                    <input type="text" name="itemID">
                </div>
                <div class="add-item-name">
                    <label>Food item Name</label><br>
                    <input type="text" name="itemName">
                </div>
                <div class="add-item-price">
                    <label>Food item Price</label><br>
                    <input type="text" name="itemPrice">
                </div>
                <div class="add-item-image">
                    <label>Food item Image</label><br>
                    <img id="imagePreview" src="#" alt="Image Preview" style="display:none;">
                    <p id="fileName"></p>
                    <div id="fileUploadDiv">
                        <input type="file" id="fileInput" name="itemImage">
                    </div>
                </div>
                <div class="add-item-days"><br>
                    <div class="weekDays-selector">
                        <input type="checkbox" id="weekday-sun" class="weekday" name="days[]" value="avlblSun"/>
                        <label for="sun">Sunday</label>
                        <input type="checkbox" id="weekday-mon" class="weekday" name="days[]" value="avlblMon"/>
                        <label for="mon">Monday</label>
                        <input type="checkbox" id="weekday-tue" class="weekday" name="days[]" value="avlblTue"/>
                        <label for="tue">Tuesday</label>
                        <input type="checkbox" id="weekday-wed" class="weekday" name="days[]" value="avlblWed"/>
                        <label for="wed">Wednesday</label>
                        <input type="checkbox" id="weekday-thu" class="weekday" name="days[]" value="avlblThurs"/>
                        <label for="thu">Thursday</label>
                        <input type="checkbox" id="weekday-fri" class="weekday" name="days[]" value="avlblFri"/>
                        <label for=fri">Friday</label>
                    </div>
                </div>
                <div class="add-item-submit">
                    <input type= "submit" >
                </div>
            </form>
        `);
        $("#popupContainer").fadeIn();
    });
    $("#closePopupBtn").click(function() {
        $("#popupContainer").fadeOut();
    });
    // close on click outside
    $(document).on("click", function(event) {
        if ($(event.target).closest("#popupContent").length === 0 && $(event.target).attr("id") !== "add-item") {
            $("#popupContainer").fadeOut();
        }
    });
    // image preview
    $(document).on('change','#fileInput',function(){
        var file = this.files[0];
        var fileName = file.name;
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').attr('src', e.target.result).show();
        };
        reader.readAsDataURL(file);
    })
});