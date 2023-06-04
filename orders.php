<?php
include("./phpactions/connection.php");
$userName = $_SESSION['fullName'];

$sql = "SELECT *From orders where fullName = '$userName'";
$result = $conn->query($sql);
echo "<p style=' display:flex; background-color:red; font-size:32px; align-self:center; width:300px; text-align:center'>Your Order History ($userName)</p>";
echo "<table border = '1px solid black'>";
echo "<th> Order ID </th> <th> Food ID </th> <th> Food Name </th> <th> Quantity</th> <th> Price </th> ";
if ($result->num_rows > 0) {
   while( $row = $result->fetch_assoc()){
    echo "<tr>";
       echo "<td>" .$row["orderID"]. "</td>";
       echo "<td>" .$row["foodID"]. "</td>";
       echo "<td>" .$row["foodName"]. "</td>";
       echo "<td>" .$row["quantity"]. "</td>";
       echo "<td>" .$row["price"]. "</td>";


   }
    exit();
}
echo "</table>";
$conn->close();

