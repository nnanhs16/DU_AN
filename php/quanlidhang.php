<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản Lý Đơn Hàng</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/menu.css"> 
	<style>
		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}
		body {
			font-family: 'Times New Roman', Times, serif;
			background-image: url('https://i.pinimg.com/736x/8d/95/f0/8d95f0098999bad95645970afc1810d5.jpg');
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			height: 100vh;
		}
		h2 {
			text-align: center;
			color: white;
			margin-bottom: 20px;
		}
		table {
			border-collapse: collapse;
			width: 95%;
			margin: 0 auto;
			background-color: rgba(255,255,255,0.9);
		}
		th, td {
			padding: 10px;
			border: 1px solid #333;
			text-align: center;
		}
		th {
			background-color: rgba(255,255,255,0.85);
		}
		form {
			display: inline;
		}
		button {
			padding: 6px 10px;
			background-color: lightseagreen;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		button:hover {
			background-color: darkcyan;
		}
	</style>
</head>
<body>

	<h2>DANH SÁCH ĐƠN HÀNG</h2>

	<table>
		<tr>
			<th>ID</th>
			<th>Tên Khách Hàng</th>
			<th>Tên sản Phẩm</th>
			<th>Số Điện Thoại</th>
			<th>Số Lượng</th>
			<th>Phương Thức Thanh Toán</th>
			<th>Email</th>
			<th>Địa Chỉ</th>
		</tr>

		<?php 
			require_once("ketnoi.php");

			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
				$id = intval($_POST['delete_id']);
				mysqli_query($conn,"DELETE FROM quanlidonhang WHERE id = $id");
			}

			$ketqua = mysqli_query($conn, "SELECT * FROM quanlidonhang");


			if ($ketqua->num_rows > 0) {
				while ($row = mysqli_fetch_assoc($ketqua)) {
					echo "<tr>
						<td>{$row['id']}</td>
						<td>{$row['hoten']}</td>
						<td>{$row['tensp']}</td>
						<td>{$row['sđt']}</td>
						<td>{$row['soluongdat']}</td>
						<td>{$row['thanhtoan']}</td>
						<td>{$row['email']}</td>
						<td>{$row['diachi']}</td>
						<td>
							<form method='post' onsubmit=\"return confirm('Bạn có chắc muốn xác nhận và xóa đơn hàng này?');\">
								<input type='hidden' name='delete_id' value='{$row['id']}'>
								<button type='submit'>Xác nhận</button>
							</form>
						</td>
					</tr>";
				}
			} else {
				echo "<tr><td colspan='10'>Không có đơn hàng.</td></tr>";
			}

			$conn->close(); 
		?>
	</table>

</body>
</html>
