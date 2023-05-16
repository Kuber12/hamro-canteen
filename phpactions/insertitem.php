<?php 
    include("./connection.php");
    $sql = "insert into items(itemID,itemName,itemPrice,itemImg,avlblSun,avlblMon,avlblTue,avlblWed,avlblThurs,avlblFri)";

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    
    if(isset($_REQUEST)){
        require_once('../Item.php');
        $item = new Item($_REQUEST['itemID'],$_REQUEST['itemName'],$_REQUEST['itemPrice'],$_REQUEST['itemImage'],$_REQUEST['avlblSun'],$_REQUEST['avlblMon'],$_REQUEST['avlblTue'],$_REQUEST['avlblWed'],$_REQUEST['avlblThurs'],$_REQUEST['avlblFri']);
    }
    // Close database connection
    $conn->close();
