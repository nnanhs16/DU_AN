<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
    if (isset($_POST['quantity']) && is_array($_POST['quantity'])) {
        foreach ($_POST['quantity'] as $productId => $quantity) {
            if ($quantity > 0) {
                $_SESSION['cart'][$productId] = $quantity;
            } else {
                // Nếu số lượng là 0 hoặc âm, xóa sản phẩm khỏi giỏ hàng
                unset($_SESSION['cart'][$productId]);
            }
        }
    }
}

header("Location: giohang.php");
exit();
?>