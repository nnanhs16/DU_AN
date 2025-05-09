-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 05:41 PM
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
  `idSp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dongia` int(255) NOT NULL,
  `slDat` int(11) NOT NULL,
  `Thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `sluong`) VALUES
(1, 'SỮA TƯƠI TIỆT TRÙNG TỰ NHIÊN', 35000, 'image/suatuoitiettrung.jpg', 'Sữa Tươi Tiệt Trùng Vị Tự Nhiên TH true MILK GOLD là sản phẩm sữa tươi với công thức dinh dưỡng cho người lớn đầu tiên tại Việt Nam nhằm hỗ trợ nâng cao sức khoẻ tổng thể. ', 0),
(2, 'SỮA CHUA TỰ NHIÊN TH TRUE MILK YOGURT 100G ', 52000, 'image/th1.png\r\n', 'Sữa chua Tự Nhiên TH true YOGURT sử dụng hoàn toàn sữa tươi sạch nguyên chất của trang trại TH, lên men tự nhiên. Sản xuất trên dây chuyền hiện đại với công nghệ khép kín, giữ trọn vẹn dinh dưỡng tự nhiên từ sữa tươi sạch.', 0),
(3, 'KEM THƯỢNG HẠNG 3 HƯƠNG – VANILLA, SÔ CÔ LA, TRÀ XANH', 15000, 'image/kem.png', 'Kem thượng hạng 3 hương – sự kết hợp hoàn hảo giữa vanilla, sô cô la và trà xanh, mang đến trải nghiệm tuyệt vời cho mọi khẩu vị. Chất kem mịn màng, tan chảy ngay trong miệng, cùng hương vị thơm ngon, tự nhiên.', 0),
(4, 'TH TRUE JUICE MILK SỮA CHUA VỊ DÂU 300ML', 38000, 'image/suachuadau.png', 'Đây là nước uống sữa trái cây tự nhiên với dung tích 300 ml. Trên chai có hình ảnh quả dâu tây, tạo cảm giác tươi mát và hấp dẫn. Sản phẩm thuộc thương hiệu TH true MILK, một thương hiệu nổi tiếng về sữa sạch và tự nhiên.', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(25) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quanlidonhang`
--
ALTER TABLE `quanlidonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
