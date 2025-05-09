<?php
require_once("ketnoi.php");

if (isset($_GET['xoa'])) {
    $idxoa = intval($_GET['xoa']);
    $conn->query("DELETE FROM products WHERE id = $idxoa");
    header("Location: capnhatsp.php");
    exit;
}

if (isset($_POST['btnThem'])) {
    $tensp = $_POST['name'];
    $gia = $_POST['price'];
    $thongtin = $_POST['description'];

   
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $conn->query("INSERT INTO products(name, price, image, description) VALUES ('$tensp', '$gia', '$target_file', '$thongtin')");
    header("Location: capnhatsp.php");
    exit;
}


if (isset($_POST['btnCapNhat'])) {
    $id = $_POST['id'];
    $tensp = $_POST['name'];
    $gia = $_POST['price'];
    $thongtin = $_POST['description'];

 if (!empty($_FILES["image"]["name"])) {
        $target_dir = "image/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $conn->query("UPDATE products SET name='$tensp', price='$gia', image='$target_file', description='$thongtin' WHERE id=$id");
    } else {
        $conn->query("UPDATE products SET name='$tensp', price='$gia', description='$thongtin' WHERE id=$id");
    }

    header("Location: capnhatsp.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Danh sách sản phẩm</title>
	<style type="text/css">
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    table {
      width: 90%;
      margin: 20px auto;
      border-collapse: collapse;
      background: #fff;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    .head {
      color: #ccc;
      height: 30px;
      text-align: center;
      line-height: 40px;
      margin-bottom: 10px;
      font-weight: bold;
      font-size: 18px;
      background-color: #003d79;
    }
    .capnhat h3{
      line-height: 40px;
      color: #ccc;
      background-color: #003d79;
      height: 40px;
      text-align: justify;
    }
  </style>
</head>
<body>
	<div class="container">
    <table>
      <tr>
        <th colspan="6" class="head">Danh sách sản phẩm</th>
      </tr>
      <tr>
	      <th>ID</th>
	      <th>Tên sản phẩm</th>
	      <th>Giá</th>
	      <th>Hình ảnh</th>
	      <th>Thông tin</th>
	      <th>Thao tác</th>
	    </tr>
    <!-- Bạn sẽ chèn các hàng dữ liệu bằng PHP ở đây -->
	<?php
        $result = $conn->query("SELECT * FROM products");
        while ($row = $result->fetch_assoc()) {
            echo "<form method='post' enctype='multipart/form-data'>";
            echo "<tr>";
            echo "<td>{$row['id']}<input type='hidden' name='id' value='{$row['id']}'></td>";
            echo "<td><input type='text' name='name' value='{$row['name']}' style='width: 1000px; box-sizing: border-box;'></td>";
            echo "<td><input type='number' name='price' value='{$row['price']}'></td>";
            echo "<td><img src = '../{$row['image']}' alt='img' width='80' height='80'></td>";
            echo "<td><input type='text' name='description' value='{$row['description']}'></td>";
            echo "<td>
                    <button type='submit' name='btnCapNhat'>Cập nhật</button>
                    <a href='capnhatsp.php?xoa={$row['id']}' onclick='return confirm(\"Xoá sản phẩm này?\")'>Xoá</a>
                  </td>";
            echo "</tr>";
            echo "</form>";
        }
    ?>
	  </table>
    <table>
    <tr class="add"><td colspan="6">Thêm sản phẩm mới</td></tr>
    <form method="post" enctype="multipart/form-data">
        <tr>
            <td><input type="text" name="name" placeholder="Tên sản phẩm" required style="width: 200px;"></td>
            <td><input type="number" name="price" placeholder="Giá" required></td>
            <td><input type="file" name="image" required></td>
            <td><input type="text" name="description" placeholder="Thông tin sản phẩm" required style="width: 250px;"></td>
        </tr>
        <tr>
            <td colspan="6" style="text-align: center;">
                <button type="submit" name="btnThem">Thêm sản phẩm</button>
            </td>
        </tr>
    </form>
</table>
	</div>
</body>
</html>