<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>đăng kí</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/base.css">
	<link rel="stylesheet" href="../css/admin.css">

</head>
<body>
<?php
	if(isset($_POST['btnLogin']))
	{
		$user=$_POST['txtName'];
		/*$pass=md5($_POST['txtPass']);*/
		$pass=$_POST['txtPass'];

		/*kiểm tra có tồn tại tài khoản như trên ở trong bảng user*/
		/*B1: Kết nối CSDL example*/
		require_once("ketnoi.php");
		/*B2: viết câu lệnh sql tìm kiếm hàng chứa thông tin ứng với $user và $pass ở trên*/
		$sql = "select * from user where username = '$user'";
		/*B3: thực thi câu lệnh $sql và trả về $kq -> là 1 table chỉ có 1 hàng hoặc ko có hàng nào hết*/
		$kq = mysqli_query($conn,$sql);
		/*dùng hàm mysqli_num_rows($kq*) để đếm bảng $kq có bao nhiêu hàng*/
		if(mysqli_num_rows($kq)>0)
		{
			//tồn tại người dùng có username nhập vào 
			//lấy hàng chứa username đó
			$row = mysqli_fetch_assoc($kq);
			//lấy password đã hash ở trong csdl tương ứng với username nhập vào
			$pass_hash = $row["password"];
			if(password_verify($pass,$pass_hash))
			{
				//khớp password->đăng nhập thành công

				//đăng nhập thành công
				/*tạo phiên làm việc*/
				$_SESSION["username"] = $user;
				$_SESSION["role"]=1;
				mysqli_close($conn);
				header("location:admin.php");
			}
			else
			{
				echo "Đăng nhập không thành công " .mysqli_error($conn);	
			}
		}
		else
		{
			echo "không tồn tại username trong hệ thống " .mysqli_error($conn);
		}
	}
?>

	<!-- Các nội dung khác của trang -->
	<script>
		fetch('menu.html')
			.then(response => response.text())
			.then(data => {
				document.getElementById('menu').innerHTML = data;
			});
	</script>

    <div class="Container">
		<div class="from-contain">
			<h2 >Chào mừng tới trang của Admin</h2>
			<form method="post">
				<label for="txtname" id="id101">Truy cập nhanh</label>
				<input type="submit" value="Trang chủ" name="txtHome">
                <input type="submit" value="Sản phẩm" name="txtProduct">
                <input type="submit" value="Đơn đặt" name="txtPut">
                <input type="submit" value="Tin nhắn" name="txtMes">
                <input type="submit" value="Quản lý TK" name="">
			</form>
            
		</div>
	</div>
</body>
</html>