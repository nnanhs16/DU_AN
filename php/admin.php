<?php
session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Lý Admin</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/admin.css">	
</head>
<body>
	
    <div class="container">
        <h1>Chào mừng đến với trang <?php echo $_SESSION['username']; ?>!</h1>
        <div class="TCN">Truy cập nhanh</div>
        <div>
            <a href="trangchu.php" class="cacquyen">Trang chủ</a>
            <a href="capnhatsp.php" class="cacquyen">Quản Lý Sản phẩm</a>
            <a href="quanlitk.php" class="cacquyen">Quản lý tài khoản</a>
            <a href="quanlidhang.php" class="cacquyen">Quản lý đơn hàng</a>
            <a href="dangxuat.php" class="cacquyen">Đăng xuất</a>
        </div>
    </div>
</body>
</html>