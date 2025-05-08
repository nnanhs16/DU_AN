<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng của bạn</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/giohang.css">
</head>
<body>
<?php include('../video/menu.html'); ?>

    <div class="gio-hang-page"> <div class="container">
            <h1>Giỏ hàng của bạn</h1>
            <?php
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $totalPrice = 0;
                echo "<form action='capnhatgiohang.php' method='post'>";
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Sản phẩm</th>";
                echo "<th>Giá</th>";
                echo "<th>Số lượng</th>";
                echo "<th>Thành tiền</th>";
                echo "<th>Thao tác</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                // Kết nối database để lấy thông tin sản phẩm
                include(__DIR__ . "/connect.php");
                if (!$conn) {
                    die("Lỗi kết nối MySQL: " . mysqli_connect_error());
                }

                foreach ($_SESSION['cart'] as $productId => $quantity) {
                    $sql = "SELECT * FROM products WHERE id = " . $productId;
                    $productResult = mysqli_query($conn, $sql);

                    if ($productResult && mysqli_num_rows($productResult) > 0) {
                        $product = mysqli_fetch_assoc($productResult);
                        $itemPrice = $product['price'];
                        $subtotal = $itemPrice * $quantity;
                        $totalPrice += $subtotal;

                        echo "<tr>";
                        echo "<td>" . $product['name'] . "<img src='../" . $product['image'] . "' alt='" . $product['name'] . "' style='width: 50px; margin-left: 10px;'></td>";
                        echo "<td>" . number_format($itemPrice, 0, ',', '.') . " đ</td>";
                        echo "<td><input type='number' name='quantity[" . $productId . "]' value='" . $quantity . "' min='1' style='width: 50px;'></td>";
                        echo "<td>" . number_format($subtotal, 0, ',', '.') . " đ</td>";
                        echo "<td>";
                        echo "<button type='submit' name='update_cart'>Cập nhật</button>";
                        // Form riêng cho nút Xóa
                        echo "<form action='xoagiohang.php' method='post' style='display: inline;'>";
                        echo "<input type='hidden' name='product_id_to_remove' value='" . $productId . "'>";
                        echo "<button type='submit' name='remove_item'>Xóa</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }

                mysqli_close($conn);

                echo "</tbody>";
                echo "<tfoot>";
                echo "<tr>";
                echo "<td colspan='3' style='text-align: right;'><strong>Tổng tiền:</strong></td>";
                echo "<td><strong>" . number_format($totalPrice, 0, ',', '.') . " đ</strong></td>";
                echo "<td></td>";
                echo "</tr>";
                echo "</tfoot>";
                echo "</table>";

                echo "<button type='submit' name='update_cart'>Cập nhật giỏ hàng</button>";
                echo "<a href='thanhtoan.php'><button type='button'>Tiến hành thanh toán</button></a>";
                echo "</form>";
            } else {
                echo "<p>Giỏ hàng của bạn đang trống.</p>";
                echo "<p><a href='../php/sp.php'>Tiếp tục mua hàng</a></p>";
            }
            ?>
        </div>
    </div> </body>
</html>