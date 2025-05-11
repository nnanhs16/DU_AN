<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản khách hàng</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/taikhoan.css">
		
</head>
<body>
        <?php
		session_start();
	if(isset($_POST['btnTK']))
	{
		$user = $_POST['txtName'] ;
        $pass = md5($_POST['txtPass']);
       	require_once("ketnoi.php");
       	$sql = "select * from user where username = '$user'and password = '$pass'";
       	$kq = mysqli_query($conn,$sql);

       	if(mysqli_num_rows($kq)>0)
       	{
       		$row = mysqli_fetch_assoc($kq);
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['username'] = $user;

       		if(strtolower($user) == 'admin')
       		{
       			header("location:admin.php");
       		}else{
				header("location:trangchu.php");
       		}
			exit;
	   }else
       	{
			echo "<script>alert('Sai tài khoản hoặc mật khẩu!');</script>";
		}
	}	
?>	
    <div class="Container">
		<div class="from-contain">
			<h2 >Thành Viên Đăng Nhập</h2>
			<form method="post">
				<label for="txtName">Tên khách hàng</label>
				<input type="text" id="txtName" name="txtName"  autocomplete="off">
				<label for="txtPass">Mật khẩu</label>
				<input type="password" id="txtPass" name="txtPass" >
				<input type="submit" value="Đăng nhập" name="btnTK"> 
			</form>
            <p>Chưa có tài khoản? <a href="dk.php" onclick="showRegister()">Đăng Ký</a><p>
		</div>
	</div>
</body>
</html>