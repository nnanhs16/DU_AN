<?php
session_start();

// SỬA TÊN BIẾN Ở ĐÂY (chỉ khi không sửa sp.php)
$id = $_POST['product_id']; // Thay đổi từ $_POST['id'] thành $_POST['product_id']
$soluong = $_POST['quantity']; // Thay đổi từ $_POST['soluong'] thành $_POST['quantity']

if (!is_numeric($id) || !is_numeric($soluong)) {
  exit("Dữ liệu không hợp lệ.");
}

if (!isset($_SESSION['giohang'])) {
  $_SESSION['giohang'] = [];
}

if (isset($_SESSION['giohang'][$id])) {
  $_SESSION['giohang'][$id] += $soluong;
} else {
  $_SESSION['giohang'][$id] = $soluong;
}

echo "OK";
?>