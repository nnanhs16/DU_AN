<?php
session_start();
require_once("ketnoi.php");


if (!isset($_SESSION['khachhang_id']) || !isset($_SESSION['giohang']) || empty($_SESSION['giohang'])) {
    echo "Thông tin không đầy đủ. Vui lòng quay lại giỏ hàng.";
    exit;
}


$khachang_id = $_SESSION['khachhang_id'];
$query_kh = "SELECT * FROM khachhang WHERE id = $khachhang_id";
$result_kh = mysqli_query($conn, $query_kh);
$khachhang = mysqli_fetch_assoc($result_kh);

if (!$khachhang) {
    header("location:nhaptt.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnXacNhan'])) {
    $fullname = $khachhang['ten'];
    $sdt = $khachhang['sdt'];
    $email = $khachhang['email'];
    $address = $khachhang['dc']; 
    $pay = $khachhang['pttt'];
    $day = date('Y-m-d');

    foreach ($_SESSION['giohang'] as $id => $stock) {
        $result = mysqli_query($conn,"SELECT * FROM products WHERE id = $id");
        if ($row = mysqli_fetch_assoc($result)) {
            $product = $row['product'];
            $price = $row['price'];

            
            $sql_insert = "INSERT INTO information (fullname, product, sdt, stock, day, pay, email, address, price)
                           VALUES ('$fullname', '$procduct', '$sdt', $stock, '$day', '$pay', '$email', '$address', $price)";
            mysqli_query($conn,$sql_insert);
        }
    }

    unset($_SESSION['giohang']);

    echo "<script>alert('Đơn hàng đã được đặt thành công!'); window.location.href='menu.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thanh toán</title>
</head>
<body>
    <h2>Thông tin khách hàng</h2>
    <p>Họ tên: <?= htmlspecialchars($khachhang['name']) ?></p>
    <p>Điện thoại: <?= htmlspecialchars($khachhang['sdt']) ?></p>
    <p>Email: <?= htmlspecialchars($khachhang['email']) ?></p>
    <p>Địa chỉ: <?= htmlspecialchars($khachhang['Address']) ?>, <?= htmlspecialchars($khachhang['tt']) ?>, <?= htmlspecialchars($khachhang['quocgia']) ?>, <?= htmlspecialchars($khachhang['mbc']) ?></p>
    <p>Phương thức thanh toán: <?= htmlspecialchars($khachhang['pttt']) ?></p>

    <h2>Chi tiết đơn hàng</h2>
    <?php
    $tong = 0;
    foreach ($_SESSION['giohang'] as $id => $stock) {
        $result = $conn->query("SELECT * FROM products WHERE id = $id");
        if ($row = mysqli_fetch_assoc($result_kh)) {
            $thanhtien = $row['price'] * $stock;
            $tong += $thanhtien;
            echo "<p>" . htmlspecialchars($row['product']) . " - Số lượng: $soluong - Thành tiền: " . number_format($thanhtien, 0, ',', '.') . " Đ</p>";
        }
    }
    echo "<h3>Tổng cộng: " . number_format($tong, 0, ',', '.') . " Đ</h3>";
    ?>

    <form method="post">
        <button type="submit" name="btnXacNhan">Xác nhận thanh toán</button>
    </form>
</body>
</html>
