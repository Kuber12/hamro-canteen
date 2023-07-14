<?php
include("connection.php");

$userName = $_POST['username'];
$loginPassword = md5($_POST['password']);

try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $userName, $loginPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['userID'] = $row['userID'];
        $_SESSION['fullName'] = $row["fullName"];
        $_SESSION['username'] = $row["username"];
        $_SESSION['imageUrl'] = $row["imageUrl"];
        $_SESSION['email'] = $row["email"];
        $_SESSION['phone'] = $row["phone"];
        $_SESSION['address'] = $row["address"];
        $_SESSION['dob'] = $row["DOB"];
        header("Location: ../index.php");
        exit();
    } else {
        header("Location: ../login.php?msg=incorrect");
        exit();
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>
