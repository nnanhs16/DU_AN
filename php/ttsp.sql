-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2025 at 05:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id` int(25) NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `giathanh` int(255) NOT NULL,
  `sl` int(11) NOT NULL,
  `tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `sđt` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `thanhtoan` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `ten`, `sđt`, `email`, `thanhtoan`, `diachi`) VALUES
(21, 'admin', '123456', 'vietquang217123123@gmail.com', 'Chuyển Khoản Ngân hàng', '123abc'),
(48, 'linh', '0255554216', 'aab@gmail.com', 'cod', 'Đà Nẵng'),
(49, 'thùy linh', '0255554216', 'aaa@gmail.com', 'cod', 'Đà Nẵng'),
(51, 'thùy linh', '0255554216', 'aba@gmail.com', 'cod', 'Đà Nẵng'),
(52, 'ngoc', '0444332233', 'hhh@gmail.com', 'cod', 'Đà Nẵng'),
(53, 'thùy linh', '0444332233', 'uuuu@gmail.com', 'cod', 'ume'),
(54, 'ngocâ', '0255554216', 'add@gmai.com', 'cod', 'datlak'),
(55, 'tuấn', '0444332233', 'iii@gmail.com', 'cod', 'Đà Nẵng'),
(56, 'linh', '0255554216', 'maaa@gmail.com', 'cod', 'Gia Lai'),
(57, 'linh', '0255554216', 'aai@gmail.com', 'cod', 'Gia Lai'),
(58, 'tuấn anh', '0444332233', 'khaa@gmail.com', 'cod', 'datlak');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `gia` int(30) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `ttsp` text NOT NULL,
  `sluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `tensp`, `gia`, `hinhanh`, `ttsp`, `sluong`) VALUES
(1, 'SỮA TƯƠI TIỆT TRÙNG TỰ NHIÊN', 35000, 'image/suatuoitiettrung.jpg', 'Sữa Tươi Tiệt Trùng Vị Tự Nhiên TH true MILK GOLD là sản phẩm sữa tươi với công thức dinh dưỡng cho người lớn đầu tiên tại Việt Nam nhằm hỗ trợ nâng cao sức khoẻ tổng thể. ', 0),
(2, 'SỮA CHUA TỰ NHIÊN TH TRUE MILK YOGURT 100G ', 52000, 'image/th1.png\r\n', 'Sữa chua Tự Nhiên TH true YOGURT sử dụng hoàn toàn sữa tươi sạch nguyên chất của trang trại TH, lên men tự nhiên. Sản xuất trên dây chuyền hiện đại với công nghệ khép kín, giữ trọn vẹn dinh dưỡng tự nhiên từ sữa tươi sạch.', 0),
(3, 'KEM THƯỢNG HẠNG 3 HƯƠNG – VANILLA, SÔ CÔ LA, TRÀ XANH', 15000, 'image/kem.png', 'Kem thượng hạng 3 hương – sự kết hợp hoàn hảo giữa vanilla, sô cô la và trà xanh, mang đến trải nghiệm tuyệt vời cho mọi khẩu vị. Chất kem mịn màng, tan chảy ngay trong miệng, cùng hương vị thơm ngon, tự nhiên.', 0),
(4, 'TH TRUE JUICE MILK SỮA CHUA VỊ DÂU 300ML', 38000, 'image/suachuadau.png', 'Đây là nước uống sữa trái cây tự nhiên với dung tích 300 ml. Trên chai có hình ảnh quả dâu tây, tạo cảm giác tươi mát và hấp dẫn. Sản phẩm thuộc thương hiệu TH true MILK, một thương hiệu nổi tiếng về sữa sạch và tự nhiên.', 0),
(10, 'TH sữa chua ', 23000, 'image/sp2.jpg', 'mát lạnh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quanlidonhang`
--

CREATE TABLE `quanlidonhang` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sđt` int(15) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `soluongdat` int(20) NOT NULL,
  `gia` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `thanhtoan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quanlidonhang`
--

INSERT INTO `quanlidonhang` (`id`, `hoten`, `sđt`, `email`, `diachi`, `tensp`, `soluongdat`, `gia`, `ngaydat`, `thanhtoan`) VALUES
(13, 'thùy linh', 255554216, 'aaa@gmail.com', 'Đà Nẵng', 'SỮA TƯƠI TIỆT TRÙNG TỰ NHIÊN', 1, 35000, '0000-00-00', 'cod'),
(16, 'ngoc', 444332233, 'hhh@gmail.com', 'Đà Nẵng', 'KEM THƯỢNG HẠNG 3 HƯƠNG – VANILLA, SÔ CÔ LA, TRÀ XANH', 2, 15000, '0000-00-00', 'cod'),
(18, 'tuấn', 444332233, 'iii@gmail.com', 'Đà Nẵng', 'SỮA TƯƠI TIỆT TRÙNG TỰ NHIÊN', 2, 35000, '0000-00-00', 'cod'),
(19, 'tuấn', 444332233, 'iii@gmail.com', 'Đà Nẵng', 'KEM THƯỢNG HẠNG 3 HƯƠNG – VANILLA, SÔ CÔ LA, TRÀ XANH', 1, 15000, '0000-00-00', 'cod'),
(20, 'linh', 255554216, 'maaa@gmail.com', 'Gia Lai', 'SỮA CHUA TỰ NHIÊN TH TRUE MILK YOGURT 100G ', 1, 52000, '0000-00-00', 'cod'),
(21, 'linh', 255554216, 'maaa@gmail.com', 'Gia Lai', 'TH TRUE JUICE MILK SỮA CHUA VỊ DÂU 300ML', 1, 38000, '0000-00-00', 'cod'),
(22, 'linh', 255554216, 'aai@gmail.com', 'Gia Lai', 'SỮA TƯƠI TIỆT TRÙNG TỰ NHIÊN', 1, 35000, '0000-00-00', 'cod'),
(23, 'linh', 255554216, 'aai@gmail.com', 'Gia Lai', 'KEM THƯỢNG HẠNG 3 HƯƠNG – VANILLA, SÔ CÔ LA, TRÀ XANH', 2, 15000, '0000-00-00', 'cod'),
(24, 'tuấn anh', 444332233, 'khaa@gmail.com', 'datlak', 'SỮA TƯƠI TIỆT TRÙNG TỰ NHIÊN', 2, 35000, '0000-00-00', 'cod'),
(25, 'tuấn anh', 444332233, 'khaa@gmail.com', 'datlak', 'SỮA CHUA TỰ NHIÊN TH TRUE MILK YOGURT 100G ', 1, 52000, '0000-00-00', 'cod');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(15, 'admin', '202cb962ac59075b964b07152d234b70', 'gfdgfemail@gmail.com'),
(16, 'linhh', '202cb962ac59075b964b07152d234b70', 'hii@gmail.com'),
(17, 'user', '202cb962ac59075b964b07152d234b70', 'abb@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quanlidonhang`
--
ALTER TABLE `quanlidonhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quanlidonhang`
--
ALTER TABLE `quanlidonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
