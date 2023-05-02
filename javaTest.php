
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript</title>
</head>
<body>

    <div >

        <form id="login-form">
            <label>Username:</label>
            <input type="text" name="username">
            <label>Password:</label>
            <input type="password" name="password">
            <button type="submit">Login</button>
          </form>
          
          <div id="result"></div>



    </div>
    <script src="./scripts/jQuery.js"></script>
    <script>
        $(document).ready(function() {
  $('#login-form').submit(function(event) {
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'trash.php',
      data: formData,
      success: function(response) {
        $('#result').html(response);
      }
    });
  });
});
    </script>
  


   
</body>
</html>