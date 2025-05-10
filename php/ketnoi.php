<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "ttsp"; 

// Tạo kết nối
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("kết nối CSDL thất bại");

// Kiểm tra kết nối
mysqli_set_charset ($conn,"utf8");
?>