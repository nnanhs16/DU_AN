<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_item'])) {
    $productIdToRemove = $_POST['product_id_to_remove'];
    unset($_SESSION['cart'][$productIdToRemove]);
}

header("Location: giohang.php");
exit();
?>