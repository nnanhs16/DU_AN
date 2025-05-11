<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $paymentMethod = $_POST['payment_method'];

    
    include(__DIR__ . "/ketnoi.php");
    if (!$conn) {
        die("Lỗi kết nối MySQL: " . mysqli_connect_error());
    }

 
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "    <meta charset='UTF-8'>";
    echo "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "    <title>Đặt hàng thành công</title>";
    echo "    <link rel='stylesheet' type='text/css' href='../css/style.css'>";
    echo "</head>";
    echo "<body>";

    echo "<div class='container don-hang-thanh-cong'>"; 

    echo "<h1>Đặt hàng thành công!</h1>";
    echo "<p>Cảm ơn bạn đã mua hàng.</p>";

    echo "<div class='thong-tin-don-hang'>";

    echo "<h2>Thông tin khách hàng</h2>";
    echo "<p><strong>Họ và tên:</strong> " . htmlspecialchars($name) . "</p>";
    echo "<p><strong>Địa chỉ giao hàng:</strong> " . htmlspecialchars($address) . "</p>";
    echo "<p><strong>Số điện thoại:</strong> " . htmlspecialchars($phone) . "</p>";
    echo "<p><strong>Phương thức thanh toán:</strong> " . htmlspecialchars($paymentMethod) . "</p>";

    echo "<h2>Thông tin sản phẩm</h2>";
    echo "<table>";
    echo "<thead>";
    echo "<tr><th>Sản phẩm</th><th>Số lượng</th><th>Giá</th><th>Thành tiền</th></tr>";
    echo "</thead>";
    echo "<tbody>";

    $totalPrice = 0;
    foreach ($_SESSION['cart'] as $productId => $quantity) {
        $sql = "SELECT * FROM products WHERE id = " . $productId;
        $productResult = mysqli_query($conn, $sql);

        if ($productResult && mysqli_num_rows($productResult) > 0) {
            $product = mysqli_fetch_assoc($productResult);
            $itemPrice = $product['price'];
            $subtotal = $itemPrice * $quantity;
            $totalPrice += $subtotal;

            echo "<tr>";
            echo "<td>" . $product['name'] . "<img src='../" . $product['image'] . "' alt='" . $product['name'] . "' style='width: 50px; margin-left: 5px;'></td>";
            echo "<td>" . $quantity . "</td>";
            echo "<td>" . number_format($itemPrice, 0, ',', '.') . " đ</td>";
            echo "<td>" . number_format($subtotal, 0, ',', '.') . " đ</td>";
            echo "</tr>";
        }
    }

    echo "</tbody>";
    echo "<tfoot>";
    echo "<tr><td colspan='3' style='text-align: right;'><strong>Tổng tiền:</strong></td><td><strong>" . number_format($totalPrice, 0, ',', '.') . " đ</strong></td></tr>";
    echo "</tfoot>";
    echo "</table>";

    echo "</div>"; 

    echo "<p><a href='../video/sp.php'>Tiếp tục mua hàng</a></p>";

    echo "</div>";

    echo "</body>";
    echo "</html>";

    mysqli_close($conn);
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>