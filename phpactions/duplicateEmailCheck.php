<?php
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    if(isset($_POST['submit-btn'])){
        $email = $_POST["email"];
        function sanitizeInput($input)
  {
    // Remove HTML and PHP tags
    $sanitizedInput = strip_tags($input);

    // Prevent execution of PHP code
    $sanitizedInput = htmlspecialchars($sanitizedInput);

    return $sanitizedInput;
  }
  $email = sanitizeInput($email);
  include("connection.php");


  $sqlquery = "SELECT * FROM users where email = '$email'";
  $result = mysqli_query($conn, $sqlquery);
  if (mysqli_num_rows($result) > 0) {     
    echo "false";

  } else {
    echo "true";
    }
mysqli_close($conn);
}
}
