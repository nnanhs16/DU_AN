<?php
$servername = "localhost";
$username = "root"; // Tài khoản mặc định của XAMPP
$password = ""; // Mặc định XAMPP không có mật khẩu
$dbname = "ttsp"; // Thay bằng tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
