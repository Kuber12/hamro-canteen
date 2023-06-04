<?php 
    include("./connection.php");
    if(isset($_REQUEST)){
        if($_FILES['photo']['error'] == UPLOAD_ERR_OK) {
            $filename = $_FILES['photo']['name'];
            $tempname = $_FILES['photo']['tmp_name'];
            $filesize = $_FILES['photo']['size'];
            $filetype = $_FILES['photo']['type'];
            $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
            // Process the file
        } else {
            echo "Error uploading file.";
        }

        $userID = $_POST["userID"];
        $full_name = $_POST['first_name'] ." " . $_POST['middle_name'] ." " . $_POST['last_name'] ;
        $user_name = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $gender = $_POST['gender'];
        $img = $_POST['photo'];
        $dob = $_POST['dob'];
        $phone_number = $_POST['contact'];
        $address = $_POST['address'];
        $sql = "SELECT * FROM users where username = '$user_name'"; 
        
        $result = mysqli_query($conn, $sql);
        $userImage = $user_name .".". $file_extension;

        $tar_dir = "../assets/userimage/" . $userImage;
        move_uploaded_file($tempname, $tar_dir);
        
        $sql = "INSERT INTO users(username, fullName, gender, password, email, phone, DOB , imageUrl, address) VALUES ('$user_name','$full_name','$gender','$password','$email',$phone_number,'$dob','$img', '$address')";
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully.";
            header("location:../menuitem.php");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }