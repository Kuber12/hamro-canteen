<?php
include("./phpactions/connection.php");
// session_start();
// print_r($_SESSION['cart']) ;
// $sql = "INSERT INTO orders(orderID,foodID,quantity,orderDate) values()";
echo "<p style='text-decoration:none; border: 1px solid black; margin-top:20px;
background-color:green;width:300px; text-align:center;color:white;'>Order successful</p>";
echo "<table border='1px'>";
echo "<th> Food Name</th> <th> price</th> <th>Image</th> <th> quantity</th>";
foreach ($_SESSION['cart'] as $items) {
    echo "<tr>";
   foreach($items  as $item) { 
    echo "<td>".$item. "</td>";
   }
   echo "</tr>";
 
   
}
echo "</table>";
echo "<br><a href='index.php' style='text-decoration:none; border: 1px solid black;padding:5px;
background-color:red; color:white;'>back to home page</a>";