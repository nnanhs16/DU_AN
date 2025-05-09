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

       		if(strtolower($user)== 'admin')
       		{
       			header("location:admin.php");
       		}else{
				header("location:trangchu.php");
       		}
			exit;
       	}
	   }else
       	{
			echo "<script>alert('Sai tài khoản hoặc mật khẩu!');</script>";
		}	
?>	
    <div class="Container">
		<div class="from-contain">
			<h2 >Thành viên đăng nhập</h2>
			<form method="post">
				<label for="txtName">Tên khách hàng</label>
				<input type="text" id="txtName" name="txtName"  autocomplete="off">
				<label for="txtPass">Mật khẩu</label>
				<input type="password" id="txtPass" name="txtPass" placeholder="Nhập mật khẩu">
				<input type="submit" value="Đăng nhập" name="btnTK"> 
			</form>
            <p>Chưa có tài khoản? <a href="#" onclick="showRegister()">Đăng Ký</a><p>
		</div>
	</div>
</body>
</html>