<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- nomalize css -->
<style>    

            
        body{
            /* background-color: cornflowerblue; */
        }
        table{
            font-size: 18px;

        }
        th{
            width:100px;
            background-color:#BD271B;
        }
        .center{
            display: flex;
            align-self: center;
            justify-content: center;
            width :100vw;           
            border :none;
            
        }
        a{
            text-decoration: none;
            font-size: 18px;
        }
        .order{
            font-size: 24px;
            
            display: flex;
            align-self: center;
            justify-content: center;
            width :100vw;           
            border :none;
        }
        p{
            width : 350px;
            background-color: #F5C13F;
        }
    
</style>
<?php
include("./phpactions/connection.php");

$userName = $_SESSION['fullName'];

$sql = "SELECT *From orders where fullName = '$userName'";
$result = $conn->query($sql);

echo "    <h1><a href='index.php'><i class='fa-solid fa-circle-arrow-left' style = 'margin-right:20px; color:black;'></i>Back to Home page</a></h1>
<div class='order'><p>Your Order History ($userName)</p></div><div class = 'center'>";
echo "<table border = '1px solid black'>";
echo "<th> Order ID </th> <th> Food ID </th> <th> Food Name </th> <th> Quantity</th> <th> Price </th><th> Total </th><th> Order Date </th>  ";
if ($result->num_rows > 0) {
   while( $row = $result->fetch_assoc()){
    echo "<tr>";
       echo "<td>" .$row["orderID"]. "</td>";
       echo "<td>" .$row["foodID"]. "</td>";
       echo "<td>" .$row["foodName"]. "</td>";
       echo "<td>" .$row["quantity"]. "</td>";
       echo "<td>" .$row["price"]. "</td>";
       echo "<td>" .$row["price"]*$row["quantity"]. "</td>";
       echo "<td>" .$row["orderDate"]. "</td>";


   }
    exit();
}
echo "</table></div>";
$conn->close();
?>


