<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="../css/sp1.css">
</head>
<body>
    <?php include('../video/menu.html'); ?>

    <?php
    include(__DIR__ . "/connect.php");
    if (!$conn) {
        die("Lỗi kết nối MySQL: " . mysqli_connect_error());
    }
    ?>

    <div class="product-container">
        <?php
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product-card'>";
            echo "<img src='../" . $row['image'] . "' alt='" . $row['name'] . "' class='product-image'>";
            echo "<h3 class='product-name'>" . $row['name'] . "</h3>";
            echo "<p class='product-price'>" . number_format($row['price'], 0, ',', '.') . " đ</p>";

            // Thêm ô nhập số lượng
            echo "<div class='quantity-selector'>";
            echo "<label for='quantity_" . $row['id'] . "'>Số lượng:</label>";
            echo "<input type='number' id='quantity_" . $row['id'] . "' name='quantity_" . $row['id'] . "' value='1' min='1'>";
            echo "</div>";

            echo "<button class='add-to-cart-btn' data-product-id='" . $row['id'] . "'>";
            echo "<img src='../image/cart.png' alt='Giỏ hàng' class='cart-icon'>";
            echo "</button>";
            echo "</div>";
        }

        mysqli_close($conn);
        ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    console.log('Nút Thêm vào giỏ hàng được nhấp!'); // Dòng này đã được thêm

                    const productId = this.dataset.productId;
                    const quantityInput = document.getElementById(`quantity_${productId}`);
                    const quantity = quantityInput.value;

                    fetch('themvaogiohang.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `product_id=${productId}&quantity=${quantity}`,
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data);
                        alert('Đã thêm sản phẩm vào giỏ hàng!');
                    })
                    .catch((error) => {
                        console.error('Lỗi:', error);
                        alert('Có lỗi xảy ra khi thêm vào giỏ hàng.');
                    });
                });
            });
        });
    </script>
</body>
</html>