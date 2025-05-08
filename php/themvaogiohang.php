<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }

    echo 'success';
} else {
    echo 'invalid request';
}
?>