<?php 
    include("./connection.php");
    if(isset($_REQUEST)){
        $itemID = $_REQUEST["itemID"];
        if($_FILES['itemImage']['error'] == UPLOAD_ERR_OK) {
            $filename = $_FILES['itemImage']['name'];
            $tempname = $_FILES['itemImage']['tmp_name'];
            $filesize = $_FILES['itemImage']['size'];
            $filetype = $_FILES['itemImage']['type'];
            $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
            $itemImage = $itemID .".". $file_extension;
            $tar_dir = "../assets/itemimage/" . $itemImage;
            move_uploaded_file($tempname, $tar_dir);
            // Process the file
            $imageUploaded = true;
        } else {
            $imageUploaded = false;
        }
        $itemName = $_REQUEST['itemName'];
        $itemPrice = $_REQUEST['itemPrice'];
        
        $avlSun = isset($_REQUEST["avlbl-sun"])?1:0;
        $avlMon = isset($_REQUEST["avlbl-mon"])?1:0;
        $avlTue = isset($_REQUEST["avlbl-tue"])?1:0;
        $avlWed = isset($_REQUEST["avlbl-wed"])?1:0;
        $avlThu = isset($_REQUEST["avlbl-thurs"])?1:0;
        $avlFri = isset($_REQUEST["avlbl-fri"])?1:0;

        

        // $sql = "select * from items where itemID = '$itemID'";
        // $result = mysqli_query($conn, $sql);
        if ($itemID) {
            echo "updating";
            if($imageUploaded === false){
                $sql = "update items set itemName = '$itemName', itemPrice = '$itemPrice', avlblSun = '$avlSun', avlblMon = '$avlMon', avlblTue = '$avlTue', avlblWed = '$avlWed', avlblThu = '$avlThu', avlblFri = '$avlFri' where itemID = '$itemID'";
            }else{
                $sql = "update items set itemName = '$itemName', itemPrice = '$itemPrice', itemImg = '$itemImage', avlblSun = '$avlSun', avlblMon = '$avlMon', avlblTue = '$avlTue', avlblWed = '$avlWed', avlblThu = '$avlThu', avlblFri = '$avlFri' where itemID = '$itemID'";
            }
            if (mysqli_query($conn, $sql)) {
                echo "Record updated successfully.";
                header("location:../menuitem.php");
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }else{
            if($imageUploaded){
                $sql = "insert into items(itemName,itemPrice,itemImg,avlblSun,avlblMon,avlblTue,avlblWed,avlblThu,avlblFri) values('$itemName','$itemPrice','$itemImage','$avlSun','$avlMon','$avlTue','$avlWed','$avlThu','$avlFri')";
            }else{
                $sql = "insert into items(itemName,itemPrice,avlblSun,avlblMon,avlblTue,avlblWed,avlblThu,avlblFri) values('$itemName','$itemPrice','$avlSun','$avlMon','$avlTue','$avlWed','$avlThu','$avlFri')";
            }
            
            if ($result = mysqli_query($conn, $sql)) {
                echo "success";
                header("location:../menuitem.php");
            }else{
                echo "fail";
            }
        }
    }