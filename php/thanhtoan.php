<?php
session_start();
require_once("ketnoi.php");

// Kiểm tra session
if (!isset($_SESSION['khachhang_id']) || !isset($_SESSION['giohang']) || empty($_SESSION['giohang'])) {
    echo "Thông tin không đầy đủ. Vui lòng quay lại giỏ hàng.";
    exit;
}

$khachhang_id = $_SESSION['khachhang_id'];
$query_kh = "SELECT * FROM khachhang WHERE id = $khachhang_id";
$result_kh = mysqli_query($conn, $query_kh);
$khachhang = mysqli_fetch_assoc($result_kh);

// Nếu không tìm thấy thông tin khách hàng
if (!$khachhang) {
    header("location:nhaptt.php");
    exit;
}

// Nếu nhấn nút xác nhận thanh toán
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnXacNhan'])) {
    $hoten = $khachhang['ten']; // Sửa thành $hoten


    $sđt = $khachhang['sđt'];
    $email = $khachhang['email'];
    $diachi = $khachhang['diachi'];
    $thanhtoan = $khachhang['thanhtoan'];



    foreach ($_SESSION['giohang'] as $id => $soluong) {
        $result = mysqli_query($conn,"SELECT * FROM products WHERE id = $id");
        if ($row = mysqli_fetch_assoc($result)) {
            $tensp = $row['tensp']; // Lấy tên sản phẩm vào $sp
            $gia = $row['gia'];
         
     $sql_insert = "INSERT INTO quanlidonhang (hoten, tensp, sđt, soluongdat, thanhtoan, email, diachi, gia)
               VALUES ('$hoten', '$tensp', '$sđt', $soluong, '$thanhtoan', '$email', '$diachi', $gia)";
            mysqli_query($conn,$sql_insert);
        }
    }

    // Xóa giỏ hàng sau khi đặt
    unset($_SESSION['giohang']);

    echo "<script>alert('Đơn hàng đã được đặt thành công!'); window.location.href='trangchu.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="../css/thanhtoan.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="headertop">Xin chào quý khách</div>
        <div class="headermain">
            <div class="container">
                <div class="menu">
                    <div class="logoheader">
                        <a href="/"><img src="../image/logo.png" alt="logo"></a>
                    </div>
                    <div class="chucnang">
                        <ul>
                            <li><a href="trangchu.php">Trang chủ</a></li>
                            <li><a href="truyenthong.php">Truyền Thông</a></li>
                            <li><a href="sp.php">Cửa Hàng</a></li>
                            <li><a href="giohang.php">Giỏ Hàng</a></li>
                            <li><a href="dangxuat.php">Đăng Xuất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="thanhtoan">
    <h2>Thông tin khách hàng</h2>
    <p>Họ tên: <?= $khachhang['ten'] ?></p>
    <p>Điện thoại: <?= $khachhang['sđt'] ?></p>
    <p>Email: <?= $khachhang['email'] ?></p>
    <p>Địa chỉ: <?= $khachhang['diachi'] ?></p>
    <p>Phương thức thanh toán: <?= $khachhang['thanhtoan'] ?></p>

    <h2>Chi tiết đơn hàng</h2>
    <?php
    $tong = 0;
    foreach ($_SESSION['giohang'] as $id => $stock) {
        $result = $conn->query("SELECT * FROM products WHERE id = $id");
        if ($row = mysqli_fetch_assoc($result)) {
            $soluong = $stock;
            $thanhtien = $row['gia'] * $soluong;
            $tong += $thanhtien;
            echo "<p>" . $row['tensp'] . " - Số lượng: $soluong - Thành tiền: " . number_format($thanhtien, 0, ',', '.') . " Đ</p>";
        }
    }
    echo "<h3 style='text-align: right;'>Tổng cộng: " . number_format($tong, 0, ',', '.') . " Đ</h3>";
    ?>

    <form method="post" style="text-align: center; margin-top: 20px;">
        <button type="submit" name="btnXacNhan" style="background-color: #003d79; color: white; padding: 10px 25px; font-size: 16px; border: none; border-radius: 6px;">Xác nhận thanh toán</button>
    </form>
</div>
</body>
</html>