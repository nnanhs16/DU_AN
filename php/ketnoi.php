<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "ttsp"; 


$conn = mysqli_connect($servername, $username, $password, $dbname) or die("kết nối CSDL thất bại");

mysqli_set_charset ($conn,"utf8");
?>