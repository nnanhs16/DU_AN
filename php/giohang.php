<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách sản phẩm</title>
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
        }
        table, th, td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>

    <h2>Danh sách sản phẩm</h2>

    <?php
    // 1. Kết nối đến CSDL
    $servername = "localhost";
    $username = "your_username"; // Thay bằng username của bạn
    $password = "your_password"; // Thay bằng password của bạn
    $database = "ttsp"; // Tên database

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    // 2. Truy vấn lấy dữ liệu
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);

    // 3. Hiển thị dữ liệu
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Mô tả</th>
                <th>Số lượng kho</th>
              </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . number_format($row["price"], 2, ',', '.') . "</td>"; // Định dạng giá
            echo "<td><img src='" . $row["image"] . "' alt='" . $row["name"] . "'></td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>" . $row["stock"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Không có sản phẩm nào.";
    }

    // 4. Đóng kết nối
    mysqli_close($conn);
    ?>

</body>
</html>