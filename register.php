<?php
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, PORT);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Đăng ký thành công!";
        header("Location: index.html"); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

include 'config.php'; 
include 'login.html'; 
include 'database/db.php'; 
include 'database/user.php'; 
$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

// Kiểm tra nếu username và password không trống
if ($username && $password) {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME,PORT);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Thực hiện truy vấn đăng ký
    $sql = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $sql->bind_param("ss", $username, $password);

    if ($sql->execute()) {
        header("Location: product.php"); 
        exit;
    } else {
        echo "Lỗi: " . $conn->error;
    }

    $sql->close();
    $conn->close();
}
*/

include 'config.php'; 
include 'login.html'; 
include 'database/db.php'; 
include 'database/user.php'; 
$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
if ($username && $password) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, PORT);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    $sql = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $sql->bind_param("ss", $username, $hashedPassword);
    if ($sql->execute()) {
        header("Location: product.php"); 
        exit;
    } else {
        echo "Lỗi: " . $conn->error;
    }
    $sql->close();
    $conn->close();
} else {
    echo "Vui lòng nhập đầy đủ thông tin.";
}








