<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" type="text/css" href="../css/thanhtoan.css">
</head>
<body>
<?php include('../video/menu.html'); ?>

    <div class="thanh-toan-wrapper">  <div class="container thanh-toan-content"> <h1 class="thanh-toan-title">Thanh toán đơn hàng</h1> <?php
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                // Hiển thị thông tin giỏ hàng (tùy bạn muốn giữ hay bỏ)
                echo "<div class='thong-tin-gio-hang'>"; 
                echo "";
                echo "</div>";

                echo "<div class='thong-tin-giao-hang khung-thong-tin'>";
                echo "<h2 class='form-title'>Thông tin giao hàng</h2>";  echo "<form action='xulythanhtoan.php' method='post'>";
                echo "<div class='form-group'>";
                echo "<label for='name'>Họ và tên:</label><input type='text' id='name' name='name' required></div>";
                echo "<div class='form-group'>";
                echo "<label for='address'>Địa chỉ giao hàng:</label><textarea id='address' name='address' rows='4' required></textarea></div>";
                echo "<div class='form-group'>";
                echo "<label for='phone'>Số điện thoại:</label><input type='tel' id='phone' name='phone' required></div>";
                echo "</div>";

                echo "<div class='phuong-thuc-thanh-toan khung-thong-tin'>";
                echo "<h2 class='form-title'>Phương thức thanh toán</h2>";  echo "<div class='form-group'>";
                echo "<input type='radio' id='cash' name='payment_method' value='cash' checked>";
                echo "<label for='cash'>Thanh toán khi nhận hàng</label></div>";
                // Thêm các phương thức thanh toán khác nếu cần
                echo "</div>";

                echo "<br><button type='submit' class='dat-hang-btn'>Đặt hàng</button>";  echo "</form>";
            } else {
                echo "<p>Giỏ hàng của bạn đang trống. Vui lòng thêm sản phẩm trước khi thanh toán.</p>";
                echo "<p><a href='../video/sp.php'>Tiếp tục mua hàng</a></p>";
            }
            ?>
        </div>
    </div>
</body>
</html>