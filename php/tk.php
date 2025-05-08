<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản khách hàng</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/taikhoan.css">
		
</head>
<body>
	<div id="menu"></div> <!-- Chỗ này sẽ hiện menu -->
    
        <!-- Các nội dung khác của trang -->
        <script>
            fetch('menu.html')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('menu').innerHTML = data;
                });
        </script>
        <?php
	if(isset($_POST['btnLogin']))
	{
		$user = $_POST['txtName'] ;
        $pass = $_POST['txtPass'];
       	require_once("ketnoi.php");
       	$sql = "select*from user where username = '$user'";
       	$kq = mysqli_query($conn,$sql);
       	if(mysqli_num_rows($kq)>0)
       	{
       		$row = mysqli_fetch_assoc($kq);
       		$pass_hash=$row["password"];
       		if(password_verify($pass, $pass_hash))
       		{
       			$_SESSION["username"]=$user;
       		mysqli_close($conn);
       		header("location:sp.php");
       		}
       		else
       		{
       			echo "Sai mật khẩu".mysqli_error($conn);
       		}
       	}
       	else
       	{
       		echo "Không tồn tại username trong hệ thống".mysqli_error($conn);
       	}
	}
?>	
    <div class="Container">
		<div class="from-contain">
			<h1 >ĐĂNG NHẬP KHÁCH HÀNG</h1>
			<form method="post">
				<label for="txtname">Tên khách hàng</label>
				<input type="text" name="" placeholder="Tên đăng nhập">
				<label>Mật khẩu</label>
				<input type="password" name="" placeholder="Nhập mật khẩu">
				<input type="submit" value="Đăng nhập" name="">
			</form>
            <p>Chưa có tài khoản? <a href="dangky.html">Đăng ký</a></p>
		</div>
	</div>
</body>
</html>