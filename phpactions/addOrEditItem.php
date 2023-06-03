<?php 
    include("./connection.php");
    if(isset($_REQUEST)){
        if($_FILES['itemImage']['error'] == UPLOAD_ERR_OK) {
            $filename = $_FILES['itemImage']['name'];
            $tempname = $_FILES['itemImage']['tmp_name'];
            $filesize = $_FILES['itemImage']['size'];
            $filetype = $_FILES['itemImage']['type'];
            $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
            // Process the file
        } else {
            echo "Error uploading file.";
        }

        $itemID = $_REQUEST["itemID"];
        $itemName = $_REQUEST['itemName'];
        $itemPrice = $_REQUEST['itemPrice'];
        $itemImage = $itemID .".". $file_extension;

        $avlSun = isset($_REQUEST["avlbl-sun"])?1:0;
        $avlMon = isset($_REQUEST["avlbl-mon"])?1:0;
        $avlTue = isset($_REQUEST["avlbl-tue"])?1:0;
        $avlWed = isset($_REQUEST["avlbl-wed"])?1:0;
        $avlThu = isset($_REQUEST["avlbl-thurs"])?1:0;
        $avlFri = isset($_REQUEST["avlbl-fri"])?1:0;

        $tar_dir = "../assets/itemimage/" . $itemImage;
        move_uploaded_file($tempname, $tar_dir);

        $sql = "select * from items where itemID = '$itemID'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            echo "updating";
            $sql = "update items set itemName = '$itemName', itemPrice = '$itemPrice', itemImg = '$itemImage', avlblSun = '$avlSun', avlblMon = '$avlMon', avlblTue = '$avlTue', avlblWed = '$avlWed', avlblThu = '$avlThu', avlblFri = '$avlFri' where itemID = '$itemID'";
            if (mysqli_query($conn, $sql)) {
                echo "Record updated successfully.";
                header("location:../menuitem.php");
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }else{
            $sql = "insert into items(itemID,itemName,itemPrice,itemImg,avlblSun,avlblMon,avlblTue,avlblWed,avlblThu,avlblFri) values('$itemID','$itemName','$itemPrice','$itemImage','$avlSun','$avlMon','$avlTue','$avlWed','$avlThu','$avlFri')";
        
            if ($result = mysqli_query($conn, $sql)) {
                echo "success";
                header("location:../menuitem.php");
            }else{
                echo "fail";
            }
        }
    }