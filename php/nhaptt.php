<?php
session_start();
include("ketnoi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten = $_POST['ten'];
    $sđt = $_POST['sđt'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $thanhtoan = $_POST['thanhtoan'];
    

    
    $sql_insert_khachhang = "INSERT INTO khachhang (ten, sđt, email, diachi, thanhtoan)
                                  VALUES ('$ten', '$sđt', '$email', '$diachi', '$thanhtoan')";

    if (mysqli_query($conn, $sql_insert_khachhang)) {
        $khachhang_id = mysqli_insert_id($conn); 

        
        $_SESSION['khachhang_id'] = $khachhang_id;

        
        header("Location: thanhtoan.php");
        exit;
    } else {
        echo "Lỗi: " . mysqli_error($conn);
       
    }
} 
?>
        <link rel="stylesheet" href="../css/nhaptt.css">
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/base.css">
<!DOCTYPE html>
<html>
<head>
    <title>VUI LÒNG NHẬP THÔNG TIN CỦA </title>
</head>
<body>
    <header class="header">
    <div class="headertop">xinchaoquykhach</div>
    <div class="headermain">
        <div class="container">
            <div class="menu">
                <div class="logoheader">
                    <a href="/">
                        <img src="../image/logo.png" alt="logo">
                    </a>
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

    <h2>Nhập thông tin khách hàng</h2>
    <form method="post">
        <label for="ten">Họ tên:</label><input type="text" id="ten" name="ten" required><br>
        <label for="sđt">Số điện thoại:</label><input type="text" id="sđt" name="sđt" required><br>
        <label for="email">Email:</label><input type="email" id="email" name="email" required><br>
        <label for="diachi">Địa chỉ:</label><input type="text" id="diachi" name="diachi" required><br>

        <label for="thanhtoan">Phương thức thanh toán:</label>
        <select name="thanhtoan">
            <option value="cod">Thanh toán khi nhận hàng</option>
            <option value="transfer">Chuyển khoản</option>
            </select><br>
        <input type="submit" value="Tiếp tục">
    </form>
</body>
</html>