<?php
$username = $_POST['username'];
$password = $_POST['password'];

// check the username and password in the database
// replace this with your own code
if ($username == 'admin' && $password == 'password') {
   echo "correct";
    // $mg = "correct";
    // echo json_encode($mg);
} else {
    echo "incorrect";
//     $msg = "incorrect";
//   echo json_encode($msg);
}
?>