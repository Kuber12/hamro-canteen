<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        display:flex;
        align-items:center;
        justify-content:center;
        background-color:#eaeaea;
        background:url("./assets/pizza.jpeg");
        background-repeat:no-repeat;
        background-size: cover;
    }
.statusOptions{
    background-color:#e1e1e1ab;
    margin-top:250px;
    display : flex;
    height : 200px;
    width: 300px;
    align-items:center;
    justify-content: space-around;
    padding:0px 40px;
    border-radius:20px;
    z-index:99;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;

}
#blocker{
    position: absolute;
    height: 100vh;
    width:100vw;
    z-index:1;
    opacity:0.7;
}
input {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  border-radius:5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
}
</style>
<body> 
    <div id ="blocker"></div>
    <div class= "statusOptions">
    <form   name = "cancelForm" id = "cancelForm">
        <input type="hidden" name = "orderID" value = "<?php echo $_GET["orderid"]?>">
        <input type="hidden" name = 'cancel' value = "Cancel">
        <input type="submit" name = "submit" value = "Cancel" style="background-color:#df5959">
    </form>

<br>
<br>
    <form   name = "deliveredForm" id = "deliveredForm">
        <input type="hidden" name = "orderID" value = "<?php echo $_GET["orderid"]?>">
        <input type="hidden" name = 'delivered' value = "delivered">
        <input type="submit" name = "delivered" value = "Delivered">
    </form>
</div>

    <script src="./scripts/jquery.js"></script>
    <script>
        $(document).ready(function() {
        $("#cancelForm").submit(function(event) {
         event.preventDefault();
        var formData = $(this).serialize(); 
        $.ajax({
            url: "./phpactions/updateStatus-admin.php",
            method: "POST",
            data: formData,
            dataType: "json",
            
            success: function(response) {
                alert("Done");
}});

});
        // for Delivered
        $("#deliveredForm").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize(); 
                $.ajax({
                    url: "./phpactions/updateStatus-admin.php",
                    method: "POST",
                    data: formData,
                    dataType: "json",
                    
                    success: function(response) {
                        alert("Done");
        }});

        });
});
    </script>
    
</body>
</html>