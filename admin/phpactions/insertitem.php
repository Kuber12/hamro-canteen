<?php 
    include("./connection.php");
    $sql = "insert into items(itemName,itemPrice,itemImg,avlblSun,avlblMon,avlblTue,avlblWed,avlblThu,avlblFri)";

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    
    if(isset($_REQUEST)){
        require_once('../Item.php');
        $item = new Item($_REQUEST['itemName'],$_REQUEST['itemPrice'],$_REQUEST['itemImage'],$_REQUEST['avlblSun'],$_REQUEST['avlblMon'],$_REQUEST['avlblTue'],$_REQUEST['avlblWed'],$_REQUEST['avlblThu'],$_REQUEST['avlblFri']);
    }
    // Close database connection
    $conn->close();
    