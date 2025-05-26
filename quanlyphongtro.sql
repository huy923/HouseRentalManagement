-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2025 at 03:59 AM
-- Server version: 11.7.2-MariaDB
-- PHP Version: 8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlyphongtro`
--
create database quanlyphongtro;
use quanlyphongtro;
-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--
 
INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Trọ thường'),
(2, 'Trọ khép kín'),
(3, 'Chung cư mini'),
(4, 'Chung cư');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `near_dhv` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `near_dhv`) VALUES
(1, 'Bến Thủy', 1),
(2, 'Trung Đô', 1),
(3, 'Hồng Sơn', 0),
(4, 'Hưng Dũng', 1),
(5, 'Hưng Lộc', 0),
(6, 'Quán Bàu', 0),
(7, 'Trường Thi', 1),
(8, 'Lê Lợi', 0),
(9, 'Lê Mao', 0);

-- --------------------------------------------------------

--
-- Table structure for table `motel`
--

CREATE TABLE `motel` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `count_view` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latlng` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `districts_id` int(11) NOT NULL,
  `utilities` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(255) NOT NULL,
  `approve` int(11) NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motel`
--

INSERT INTO `motel` (`id`, `title`, `description`, `price`, `area`, `count_view`, `address`, `latlng`, `images`, `user_id`, `category_id`, `districts_id`, `utilities`, `created_at`, `phone`, `approve`, `status`) VALUES
(5, 'Cho thuê phòng trọ sinh viên', '', 1500000, 15, 2, '22 Ngõ 2A Võ Thị Sáu', 'https://www.google.com/maps/dir//DUC+HUY+HOUSE,+22+V%C4%83n+Dung,+B%E1%BA%BFn+Th%E1%BB%A7y,+Vinh,+Ngh%E1%BB%87+An+460000,+Vi%E1%BB%87t+Nam/@18.6623265,105.5557734,21954m/data=!3m1!1e3!4m8!4m7!1m0!1m5!1m1!1s0x3139cdcd62798c33:0xa8d16b4971bd570e!2m2!1d105.6', '../uploads/67554dc4c6521.jpg', 1, 2, 1, 'Không chung cổng chủ, wifi miễn phí, nóng lạnh, điều hòa lắp đặt sẵn', '2023-12-09 04:15:53', '0249857298', 2, 0),
(6, 'Phòng trọ thường giá rẻ', '', 500000, 15, 2, '15 Ngõ 6 Nguyễn Văn Trỗi', 'https://www.google.com/maps/dir//DUC+HUY+HOUSE,+22+V%C4%83n+Dung,+B%E1%BA%BFn+Th%E1%BB%A7y,+Vinh,+Ngh%E1%BB%87+An+460000,+Vi%E1%BB%87t+Nam/@18.6623265,105.5557734,21954m/data=!3m1!1e3!4m8!4m7!1m0!1m5!1m1!1s0x3139cdcd62798c33:0xa8d16b4971bd570e!2m2!1d105.6', '../uploads/67554e5343e41.jpg', 1, 1, 1, 'Có tủ quần áo ', '2024-12-08 23:38:37', '02353476', 1, 0),
(7, 'Chung cư mini giá rẻ', '', 2000000, 30, 7, 'Trung Đô', 'https://www.google.com/maps/dir//DUC+HUY+HOUSE,+22+V%C4%83n+Dung,+B%E1%BA%BFn+Th%E1%BB%A7y,+Vinh,+Ngh%E1%BB%87+An+460000,+Vi%E1%BB%87t+Nam/@18.6623265,105.5557734,21954m/data=!3m1!1e3!4m8!4m7!1m0!1m5!1m1!1s0x3139cdcd62798c33:0xa8d16b4971bd570e!2m2!1d105.6', '../uploads/67555fcfbc2bf.jpg', 1, 3, 2, 'Tiện nghi đầy đủ, an ninh tốt, mở cửa bằng vân tay ', '2024-12-08 23:38:29', '0386167597', 1, 0),
(8, 'Cho thuê căn hộ chung cư tầng 3 chung cư HTX Bến Thủy', 'Chung cư hợp tác xã Bến Thủy là một sản phẩm bất động sản cao cấp mới trong chuỗi thương hiệu DVCIQ4 làm chủ đầu tư và thi công. Tọa lạc ở đường Khánh Hội và Vĩnh Hội ngay trung tâm Quận 4 và sở hữu phong cách thiết kế kết tinh hài hòa giữa kiến trúc quốc tế và nét riêng biệt của văn hóa Việt Nam, Chung cư Khánh Hội kiến tạo nên không gian sang trọng, riêng tư bậc nhất cho cuộc sống vững bền theo thời gian.', 5000000, 35, 19, 'Đường Nguyễn Du', '', '../uploads/6756930f53361.jpg', 1, 4, 1, 'wifi 6 miễn phí, nội thất trong nhà tiện nghi đầy đủ, an ninh tốt...', '2024-12-10 06:57:06', '0327646223', 1, 0),
(9, 'Cho thuê phòng trọ gác xếp gần Đại học Vinh ', 'Phòng trọ gác xếp với 2 tầng sinh hoạt riêng biệt, rộng rãi , thoải mái phù hợp cho các bạn sinh viên ở 2 người.', 1800000, 20, 4, 'Trần Thủ Độ', '', '../uploads/675693eaec174.jpg', 1, 2, 7, 'Phòng trọ ốp gạch sạch sẽ, có nóng lạnh, điều hòa, bếp ga, tủ quần áo đầy đủ', '2024-12-09 03:33:56', '0647453456', 1, 0),
(10, 'Duc Huy House còn phòng trọ cho thuê, các bạn sinh viên liên hệ ngay nhé, phòng tốt, giá rẻ', 'Duc Huy House là ngôi nhà 5 ở khối 7 phường Bến Thủy, phòng trọ ở đây rộng rãi, ốp gạch sạch sẽ, chủ trọ thân thiện dễ tính', 1300000, 15, 14, 'Võ Thị Sáu', 'https://www.google.com/maps/dir//DUC+HUY+HOUSE,+22+V%C4%83n+Dung,+B%E1%BA%BFn+Th%E1%BB%A7y,+Vinh,+Ngh%E1%BB%87+An+460000,+Vi%E1%BB%87t+Nam/@18.6623265,105.5557734,21954m/data=!3m1!1e3!4m8!4m7!1m0!1m5!1m1!1s0x3139cdcd62798c33:0xa8d16b4971bd570e!2m2!1d105.6', '../uploads/6756959820266.jpg', 1, 2, 1, 'Phòng trọ ốp gạch sạch sẽ, có nóng lạnh, điều hòa', '2024-12-10 06:45:22', '0647453456', 1, 1),
(11, 'Cho thuê phòng trọ thường giá rẻ, phù hợp cho các bạn sinh viên có điều kiện kinh tế khó khăn', 'Phòng rộng khoảng 13m^2, thoáng mát, không chung cổng chủ', 800000, 13, 60, 'Nguyễn Thiếp', '', '../uploads/67569654732e3.jpeg', 1, 1, 7, 'Wifi miễn phí, gần trường đại học Vinh', '2024-12-10 06:49:42', '0647453456', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `avartar` varchar(255) NOT NULL,
  `login_attempts` int(11) NOT NULL DEFAULT 0,
  `last_attempts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `role`, `phone`, `avartar`, `login_attempts`, `last_attempts`) VALUES
(1, 'Trần Văn Hùng', 'tranhung2906', 'hung43501@gmail.com', '$2y$10$B586FK9rd27BSNujJdy1aOHDlgLrGak0YJtei3XReDQpBZ.vkvuRe', 1, '064745345', '../uploads/675454eb11a07.jpg', 0, '2024-12-18 08:47:27'),
(5, 'Nguyễn Tất Quốc', 'quoc123', 'quoc123@gmail.com', '$2y$10$tuWPZ2W6kBRImrOSjuik3eD3NSI2fpTRyI58pGuQih5/1.HtVlaNu', 0, '02353476345', 'uploads/team_2.jpg', 0, '2024-12-18 08:32:34'),
(6, 'Nguyễn Văn Nhâm', 'vnham', 'nham123@gmail.com', '123', 0, '04745674345', '../uploads/testimonial-1.jpg', 1, '2025-01-14 02:38:56'),
(7, 'Trần Văn Hùng', 'tranhung', 'tranhung296203@gmail.com', '$2y$10$vAX9KTcsZ60Ac35xFPFK3OfVLLVtMdszCE.inJC2R60kYs1r7VKQy', 0, '0386167597', '../uploads/675454eb11a07.jpg', 0, '2024-12-17 04:21:23'),
(10, 'admin', 'admin', 'test@gmail.com', '$2y$12$fMAnUpa0SQfUdXm1/ak/IeQBmELoIOqa3P6X765.QPR//8E4NLRiK', 0, '0987654321', '', 0, '2025-05-26 01:56:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motel`
--
ALTER TABLE `motel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`),
  ADD KEY `fk_districts` (`districts_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `motel`
--
ALTER TABLE `motel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `motel`
--
ALTER TABLE `motel`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `fk_districts` FOREIGN KEY (`districts_id`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
