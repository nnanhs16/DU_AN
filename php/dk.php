<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản khách hàng</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/dangky.css">
    
</head>
<body>
<?php
      if (isset($_POST['btnDK'])) 
      {  
      	  $user = $_POST['txtName'] ;
      	  $pass = md5($_POST['txtPass']);
      	  $email = $_POST['txtEmail'] ; 
      	  require_once("ketnoi.php");
      	  $sql="insert into user(username, password, email)
      	  					values('$user','$pass','$email')";
      	  $kq = mysqli_query($conn,$sql);
      	  if ($kq) {
      	  	mysqli_close($conn);
      	  	header("location:tk.php");
      	  }
      	  else
      	  {
      	  	echo"Đăng ký không thành công".mysqli_errno($conn);
      	  }
       }
?>	
    <div class="Container">
		<div class="from-contain">
			<h1>ĐĂNG KÝ KHÁCH HÀNG</h1>
			<form method="post">
				<label for="txtName">Tên khách hàng</label>
				<input type="text" name="txtName" placeholder="vd:Lê Hải Linh">
                <label for="txtEmail">Email</label>
				<input type="email" id="txtEmail" name="txtEmail" placeholder="vd: abc@gmail.com">
				<label for="txtPass">Mật khẩu</label>
				<input type="password" name="" placeholder="Nhập mật khẩu">
                <label>Nhập lại mật khẩu</label>
				<input type="password" name="" placeholder="Nhập lại mật khẩu">
				<input type="submit" name="btnDK" value="Đăng ký">
			</form>
		</div>
	</div>
</body>
</html>