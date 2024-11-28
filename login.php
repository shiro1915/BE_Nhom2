<?php
/*
include 'config.php'; 
include 'login.html'; 
include 'database/db.php'; 
include 'database/user.php'; 
$userObj = new user();
$users = $userObj->getAlluser(); 
$userFound = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
    $password = trim($_POST['password']); 
    if (empty($email) || empty($password)) {
        echo "Vui lòng nhập đầy đủ email và mật khẩu.";
        exit;
    }
    foreach ($users as $user) {
        if ($user['email'] == $email) {
            $userFound = true;
            if (password_verify($password, $user['password'])) {
                session_regenerate_id(); 
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                header("Location: product.php");
                exit;
            } else {
                echo "Mật khẩu không đúng.";
            }
            break;
        }
    }
    if (!$userFound) {
        echo "Không tìm thấy tài khoản với email này.";
    }
}

include 'config.php'; 
include 'login.html'; 
include 'database/db.php'; 
include 'database/user.php'; 
$userObj = new user();
$users = $userObj->getAlluser(); 
$userFound = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Làm sạch và lấy dữ liệu từ form
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
    $password = trim($_POST['password']); 

    // Kiểm tra nếu email hoặc password để trống
    if (empty($email) || empty($password)) {
        echo "Vui lòng nhập đầy đủ email và mật khẩu.";
        exit;
    }

    // Kiểm tra nếu người dùng tồn tại
    if ($users) {
        // Kiểm tra mật khẩu
        if (password_verify($password, $users['password'])) {
            // Đăng nhập thành công, lưu thông tin vào session
            session_regenerate_id(); 
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            // Điều hướng người dùng đến trang sản phẩm
            header("Location: product.php");
            exit;
        } else {
            // Mật khẩu sai
            echo "Mật khẩu không đúng.";
        }
    } else {
        // Người dùng không tồn tại
        echo "Không tìm thấy tài khoản với email này.";
    }
}
*/

include 'config.php'; 
include 'login.html'; 
include 'database/db.php'; 
include 'database/user.php'; 

// Tạo đối tượng user
$userObj = new user();

// Lấy tất cả người dùng
$users = $userObj->getAlluser();
$userFound = false;

// Kiểm tra xem yêu cầu là POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Làm sạch và lấy dữ liệu từ form
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
    $password = trim($_POST['password']); 

    // Kiểm tra nếu email hoặc password để trống
    if (empty($email) || empty($password)) {
        echo "Vui lòng nhập đầy đủ email và mật khẩu.";
        exit;
    }

    // Duyệt qua tất cả người dùng để kiểm tra email
    foreach ($users as $user) {
        if ($user['email'] == $email) {
            $userFound = true; // Đánh dấu là tìm thấy người dùng

            // Kiểm tra mật khẩu
            if (password_verify($password, $user['password'])) {
                // Đăng nhập thành công, lưu thông tin vào session
                session_regenerate_id(); 
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];

                // Điều hướng người dùng đến trang sản phẩm
                header("Location: product.php");
                exit;
            } else {
                // Mật khẩu sai
                echo "Mật khẩu không đúng.";
            }
            break; // Thoát vòng lặp sau khi tìm thấy người dùng
        }
    }

    // Nếu không tìm thấy người dùng
    if (!$userFound) {
        echo "Không tìm thấy tài khoản với email này.";
    }
}














