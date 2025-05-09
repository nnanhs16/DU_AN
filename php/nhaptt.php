<?php
session_start();
require_once("ketnoi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnChot'])) {
    $name     = $_POST['txtName'];
    $sdt     = $_POST['txtSdt'];
    $pay   = $_POST['txtPay'];
    $address      = $_POST['txtAddress'];

    $sql = "INSERT INTO khachhang(name, sdt, pay, address)
            VALUES ('$name', '$sdt', 'pay', 'address')";
    $kq = mysqli_query($conn, $sql);

    if ($kq) {
        $_SESSION['ttkh_id'] = mysqli_insert_id($conn); // Ghi lại ID khách hàng 
        mysqli_close($conn);
        header("Location: thanhtoan.php");
        exit;
    } else {
        echo "Lỗi khi lưu thông tin khách hàng: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thông Tin Khách Hàng</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Quicksand', sans-serif;
            background-image: url('https://png.pngtree.com/background/20210709/original/pngtree-hand-drawn-milk-banner-background-picture-image_927636.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-box {
            width: 500px;
            border: 2px solid #ff4500;
            padding: 30px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Lobster', cursive;
            color: #ff4500;
        }
        table td {
            padding: 10px;
            font-size: 16px;
        }
        table input, table select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .buttons {
            text-align: center;
            margin-top: 20px;
        }
        .buttons input, .buttons button {
            padding: 10px 20px;
            margin: 5px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .submit-btn {
            background-color: #ff4500;
            color: white;
        }
        .submit-btn:hover {
            background-color: #e03e00;
        }
        .back-btn {
            background-color: gray;
            color: white;
        }
        .back-btn:hover {
            background-color: #5a5a5a;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Thông Tin Khách Hàng</h2>
        <form method="post">
            <table>
                <tr>
                    <td>Họ và tên:</td>
                    <td><input type="text" name="txtName" required></td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td><input type="text" name="txtSdt" required></td>
                </tr>
                <tr>
                    <td>Hình thức thanh toán:</td>
                    <td>
                        <select name="txtPt" required>
                            <option value="Chuyển Khoản Ngân hàng">Chuyển Khoản Ngân hàng</option>
                            <option value="Thanh Toán Khi Giao Hàng">Thanh Toán Khi Giao Hàng</option>
                            <option value="Thanh Toán Online">Thanh Toán Online</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><input type="text" name="txtAddress" required></td>
                </tr>
                <tr>
                    
            </table>
            <div class="buttons">
                <input class="submit-btn" type="submit" name="btnChot" value="Mua Hàng">
                <a href="giohang.php"><button type="button" class="back-btn">Quay lại</button></a>
            </div>
        </form>
    </div>
</body>
</html>