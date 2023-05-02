<?php 
    include("./connection.php");

    $sql = "select * from items";
    $result = $conn->query($sql);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Close database connection
    $conn->close();

    // Return data as JSON
    echo json_encode($data);
    // if ($result->num_rows > 0) {
    //     // output data of each row
    //     $days = array("avlblSun","avlblMon","avlblTue","avlblWed","avlblThurs","avlblFri");
    //     while($row = $result->fetch_assoc()) {
    //         echo '
    //         <tr>
    //             response.forEach(el => {
            // let markup = `
            // <td>${response[itemID]}</td>
            // <td class="dashboard-items-td"><img class="dashboard-items-img" src= "assets/fooditems/'${response[itemImg]}.'"</td>
            // <td>${response[itemName]}</td>
            // <td>${response[itemPrice]}</td>';
            // foreach($days as $day){
            //     if($row[$day]){
            //         echo '<td><input type="checkbox" checked></td>';
            //     }else{
            //         echo '<td><input type="checkbox"></td>';
            //     }
            // }
                // <td><input type="checkbox" '.$row["avlblSun"].'></td>
                // <td><input type="checkbox" '.$row["avlblMon"].'></td>
                // <td><input type="checkbox" '.$row["avlblTue"].'></td>
                // <td><input type="checkbox" '.$row["avlblWed"].'></td>
                // <td><input type="checkbox" '.$row["avlblThurs"].'></td>
                // <td><input type="checkbox" '.$row["avlblFri"].'></td>
            // echo ' <td><button>Edit</button></td></tr>`;
            
    //     }
    // } else {
    //     echo "No Products availabe";
    // }