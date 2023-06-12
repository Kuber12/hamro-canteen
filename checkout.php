<?php
include("./phpactions/connection.php");
$Date = date("Y-m-d");
// session_start();
$user = $_SESSION['fullName'];




// Prepare the SQL statement
$sql = "INSERT INTO orders( foodID,foodName,quantity,price,orderDate, fullName) VALUES (?,?,?, ?, ?, ?)";


$stmt = mysqli_prepare($conn, $sql);

foreach ($_SESSION['cart'] as $key => $value) {
mysqli_stmt_bind_param($stmt, "ssiiss", $value['foodID'],$value['foodName'], $value['quantity'], $value['price'] , $Date,$user);


// Execute the statement
if (mysqli_stmt_execute($stmt)) {    
    
} else {
    echo "Failed to insert data:";
}
}
echo "<p style='text-decoration:none; border: 1px solid black; margin-top:20px;
background-color:green;width:300px; text-align:center;color:white;'>Order successful</p>";

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
echo "Your Order";
echo "<table border='1px'>";
echo "<th> Food ID</th> <th> Food Name</th><th> quantity</th> <th> price</th>";
$total = 0;
foreach ($_SESSION['cart'] as $key => $value) {
    
   echo "<tr><td>". $value['foodID']. "</td>" ."<td>". $value['foodName']."</td>". "<td>". $value['quantity'].  "<td>". $value['price']."</td></tr>";
   $total = $total + ($value['price']* $value['quantity']);
}
echo "</table>";
echo "<p>Total Price : ".$total."</p>";
echo "<br><a href='index.php' style='text-decoration:none; border: 1px solid black;padding:5px;
background-color:red; color:white;'>back to home page</a>";
unset($_SESSION['cart']);