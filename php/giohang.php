<?php
session_start();
include("ketnoi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btnThanhToan'])) {
        if (isset($_SESSION['ttkh_id'])) {
            header("Location: thanhtoan.php");
            exit;
        } else {
            header("Location: nhaptt.php");
            exit;
        }
    }

    if (isset($_POST['btnXoa'])) {
        $idXoa = $_POST['idXoa'];
        if (isset($_SESSION['giohang'][$idXoa])) {
            unset($_SESSION['giohang'][$idXoa]);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/giohang.css">
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

    <h2>Giỏ Hàng</h2>

    <?php
    if (!isset($_SESSION['giohang']) || count($_SESSION['giohang']) == 0) {
        echo "<p style='text-align:center;'>Giỏ hàng trống.</p>";
        exit;
    }

    $tong = 0;
    echo "<table>
        <tr>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
            <th>Hành động</th>
        </tr>";

    foreach ($_SESSION['giohang'] as $id => $soluong) {
        $sql = "SELECT * FROM products WHERE id = $id";
        $kq = mysqli_query($conn, $sql);
        if ($dong = mysqli_fetch_assoc($kq)) {
            $ten = $dong['name'];
            $gia = $dong['price'];
            $hinhanh = $dong['image'];
            $thanhtien = $gia * $soluong;
            $tong += $thanhtien;

            echo "<tr>
                    <td><img src='../$hinhanh' alt='$ten'></td>
                    <td>$ten</td>
                    <td>$soluong</td>
                    <td>" . number_format($gia, 0, ',', '.') . " đ</td>
                    <td>" . number_format($thanhtien, 0, ',', '.') . " đ</td>
                    <td>
                        <form method='post'>
                            <input type='hidden' name='idXoa' value='$id'>
                            <input class='btn-xoa' type='submit' name='btnXoa' value='Xóa'>
                        </form>
                    </td>
                </tr>";
        }
    }

    echo "</table>";
    echo "<p class='tongcong'>Tổng cộng: " . number_format($tong, 0, ',', '.') . " đ</p>";
    ?>

    <form method="post" class="checkout">
        <button type="submit" name="btnThanhToan" class="btn-checkout">Thanh toán</button>
    </form>
</body>
</html>
