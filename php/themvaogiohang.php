<?php
session_start();


$id = $_POST['product_id']; 
$soluong = $_POST['quantity'];

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