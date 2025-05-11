<?php
require_once("ketnoi.php");

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM user WHERE id = $id";
    if (mysqli_query($conn,$sql) === TRUE) {
        echo "<script>alert('Xóa tài khoản thành công!');</script>";
    } else {
        echo "<script>alert('Lỗi: " . mysqli_error($conn) . "');</script>";
    }
}


$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Tài Khoản</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/base.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            font-family:'Montserrat', sans-serif;
            background-image: url('https://i.pinimg.com/736x/8d/95/f0/8d95f0098999bad95645970afc1810d5.jpg');
            background-size: cover;
            background-position: center; 
            height: 100vh; 
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 160px; 
        }
        
        h1 {
            margin-bottom: 20px;
            color: white;
            font-size: 28px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }
        table {
            width: 90%;
            max-width: 800px;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            font-size: 16px;
        }
        table th {
            background-color: white;
            color: black;
            font-weight: bold;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        .btn-danger {
            padding: 8px 12px;
            color: #fff;
            background-color: #003d79;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-danger:hover {
            background-color: #a71d2a;
        }
    </style>
</head>
<body>

    <h1>Quản Lý Tài Khoản</h1>
    <table>
        <thead>
            <tr>
                <th>Tên Người Dùng</th>
                <th>Email</th>
                <th>Mật Khẩu</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td>
                    <a href="?delete_id=<?php echo $row['id']; ?>" class="btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">Xóa</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>