-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 19, 2022 lúc 12:57 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhangtrangsucdb`
--
CREATE DATABASE IF NOT EXISTS `banhangtrangsucdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `banhangtrangsucdb`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--
-- Tạo: Th6 18, 2022 lúc 09:52 AM
-- Cập nhật lần cuối: Th6 18, 2022 lúc 10:45 PM
--

DROP TABLE IF EXISTS `cthoadon`;
CREATE TABLE `cthoadon` (
  `Id` int(100) NOT NULL,
  `MaHD` int(100) NOT NULL,
  `masp` varchar(20) CHARACTER SET utf8 NOT NULL,
  `soluong` int(100) NOT NULL,
  `GiaSP` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `cthoadon`:
--

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`Id`, `MaHD`, `masp`, `soluong`, `GiaSP`) VALUES
(1, 1, 'SP01', 1, 1500000),
(2, 1, 'SP04', 1, 480000),
(3, 2, 'SP06', 1, 450000),
(4, 3, 'SP03', 2, 2000000),
(5, 4, 'SP04', 2, 960000),
(6, 5, 'SP05', 1, 398000),
(7, 5, 'SP06', 1, 450000),
(8, 6, 'SP02', 1, 2000000),
(9, 6, 'SP05', 1, 398000),
(10, 7, 'SP06', 1, 450000),
(11, 8, 'SP04', 2, 960000),
(12, 9, 'SP05', 2, 796000),
(13, 9, 'SP03', 1, 1000000),
(14, 10, 'SP01', 2, 3000000),
(15, 11, 'SP04', 3, 1440000),
(16, 12, 'SP06', 1, 450000),
(17, 13, 'SP05', 1, 398000),
(18, 14, 'SP03', 1, 1000000),
(19, 15, 'SP06', 1, 450000),
(20, 16, 'SP04', 2, 960000),
(21, 17, 'SP06', 3, 1350000),
(22, 18, 'SP03', 1, 1000000),
(23, 19, 'SP01', 1, 1500000),
(24, 20, 'SP02', 1, 2000000),
(25, 20, 'SP04', 1, 480000),
(26, 20, 'SP03', 1, 1000000),
(27, 21, 'SP01', 1, 1500000),
(28, 21, 'SP04', 1, 480000),
(29, 22, 'SP04', 1, 480000),
(30, 22, 'SP06', 1, 450000),
(31, 23, 'SP04', 1, 480000),
(32, 23, 'SP05', 1, 398000),
(33, 24, 'SP05', 1, 398000),
(34, 24, 'SP02', 1, 2000000),
(35, 25, 'SP02', 2, 4000000),
(36, 26, 'SP04', 1, 480000),
(37, 27, 'SP04', 1, 480000),
(38, 28, 'SP03', 1, 1000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--
-- Tạo: Th6 18, 2022 lúc 08:35 PM
-- Cập nhật lần cuối: Th6 18, 2022 lúc 10:45 PM
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE `hoadon` (
  `MaHD` int(100) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngayhd` date NOT NULL,
  `diachi` varchar(200) CHARACTER SET utf8 NOT NULL,
  `tongtien` float NOT NULL,
  `tinhtrang` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `hoadon`:
--

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `makh`, `ngayhd`, `diachi`, `tongtien`, `tinhtrang`) VALUES
(1, 1, '2022-01-12', 'Thụy thanh, Thái thụy, Thái Bình', 1980000, 'Trả tiền mặt'),
(2, 2, '2022-02-18', 'Thái Bình', 450000, 'Trả tiền mặt'),
(3, 3, '2022-03-18', 'Hải Phòng', 2000000, 'Chuyển khoản'),
(4, 4, '2022-04-18', 'Bắc Giang', 960000, 'Chuyển khoản'),
(5, 5, '2022-05-18', 'Hà nội', 848000, 'Chuyển khoản'),
(6, 6, '2022-06-18', 'Thụy thanh, Thái thụy, Thái Bình', 2398000, 'Trả tiền mặt'),
(7, 7, '2022-07-18', 'Bắc Giang', 450000, 'Trả tiền mặt'),
(8, 8, '2022-08-18', 'Hà nội', 960000, 'Chuyển khoản'),
(9, 9, '2022-09-18', 'Nam Định', 1796000, 'Trả tiền mặt'),
(10, 10, '2022-10-18', 'Thụy thanh, Thái thụy, Thái Bình', 3000000, 'Chuyển khoản'),
(11, 11, '2022-11-18', 'Thanh Hóa', 1440000, 'Chuyển khoản'),
(12, 12, '2022-12-18', 'Thụy thanh, Thái thụy, Thái Bình', 450000, 'Trả tiền mặt'),
(13, 13, '2022-06-05', 'Thái Bình', 398000, 'Chuyển khoản'),
(14, 14, '2022-06-07', 'Láng Hạ, Hà Nội', 1000000, 'Trả tiền mặt'),
(15, 15, '2022-06-08', 'Hải Phòng', 450000, 'Trả tiền mặt'),
(16, 16, '2022-06-09', 'Bắc Giang', 960000, 'Chuyển khoản'),
(17, 17, '2022-06-10', 'Hà nội', 1350000, 'Chuyển khoản'),
(18, 18, '2022-06-11', 'Thái Bình', 1000000, 'Trả Tiền Mặt'),
(19, 19, '2022-06-12', 'Hà nội', 1500000, 'Chuyển khoản'),
(20, 20, '2022-06-13', 'Láng Hạ, Hà Nội', 3480000, 'Trả tiền mặt'),
(21, 21, '2022-06-14', 'Hà nội', 1980000, 'Chuyển khoản'),
(22, 22, '2022-06-15', 'Hà Tây, Hà Nội', 930000, 'Chuyển khoản'),
(23, 23, '2022-06-16', 'Hà nội', 878000, 'Trả tiền mặt'),
(24, 24, '2022-06-17', 'Nam Định', 2398000, 'Trả tiền mặt'),
(25, 25, '2022-06-19', 'Thụy thanh, Thái thụy, Thái Bình', 4000000, 'Chuyển khoản'),
(26, 26, '2022-06-06', 'Thụy thanh, Thái thụy, Thái Bình', 480000, 'Trả tiền mặt'),
(27, 27, '2022-06-18', 'Hà nội', 480000, 'Trả tiền mặt'),
(28, 28, '2022-06-19', 'Hà nội', 1000000, 'Trả tiền mặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang1`
--
-- Tạo: Th6 18, 2022 lúc 09:52 AM
-- Cập nhật lần cuối: Th6 18, 2022 lúc 10:45 PM
--

DROP TABLE IF EXISTS `khachhang1`;
CREATE TABLE `khachhang1` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `gioitinh` varchar(10) NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `matkhau` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `khachhang1`:
--

--
-- Đang đổ dữ liệu cho bảng `khachhang1`
--

INSERT INTO `khachhang1` (`makh`, `tenkh`, `sdt`, `gioitinh`, `ngaysinh`, `diachi`, `Email`, `matkhau`) VALUES
(1, 'Nguyễn Tiến Tuấn Anh', '0362831805', 'nam', '1991-06-02', 'Thụy thanh, Thái thụy, Thái Bình', 'nguyentientuananh2k1@gmail.com', ''),
(2, 'Lan Anh', '0986506533', 'nam', '2001-07-02', 'Thái Bình', 'Lananh@gmail.com', ''),
(3, 'Mai Quỳnh Anh', '098643821', 'nam', '1993-05-04', 'Hải Phòng', 'maianh@gmail.com', ''),
(4, 'Vinh đặng', '0986506544', 'nam', '2001-07-02', 'Bắc Giang', 'Dangving@gmail.com', ''),
(5, 'Dung', '098774747', 'nam', '2001-07-02', 'Hà nội', 'dungdothi@gmail.com', ''),
(6, 'Lê văn Quỳnh', '0986506511', 'nam', '2001-07-02', 'Thụy thanh, Thái thụy, Thái Bình', 'levanquynh@gmail.com', ''),
(7, 'Nguyễn Hữu Toàn', '036564597', 'nam', '2001-07-02', 'Bắc Giang', 'Toan91111@gmail.com', ''),
(8, 'nguyễn thị linh', '099930493', 'nam', '2001-07-02', 'Hà nội', 'nguyenthilinh@gmail.com', ''),
(9, 'Nguyễn Hải Anh', '0365974681', 'nam', '2001-07-02', 'Nam Định', 'nguyenhaianh@gmail.com', ''),
(10, 'Nguyễn Tiến Việt Anh', '0986506533', 'nam', '2001-07-02', 'Thụy thanh, Thái thụy, Thái Bình', 'Vietanh2k1@gmail.com', ''),
(11, 'Thế Anh', '0165874367', 'nam', '2001-07-02', 'Thanh Hóa', 'Theanh@gmail.com', ''),
(12, 'Thanh nguyễn thị', '098643822', 'nam', '2001-07-02', 'Thụy thanh, Thái thụy, Thái Bình', 'thanh@gamil.xn--cm-68s', ''),
(13, 'Phạm đức Trung', '098653641', 'nam', '2001-07-02', 'Thái Bình', 'phamductrung@gmail.com', ''),
(14, 'Phùng thanh khoa', '098774732', 'nam', '2001-07-02', 'Láng Hạ, Hà Nội', 'khoa9999@gmail.com', ''),
(15, 'Nam Anh', '0999304934', 'nam', '2001-07-02', 'Hải Phòng', 'Namanh@gmail.com', ''),
(16, 'Hữu Tú', '0364785471', 'nam', '2001-07-02', 'Bắc Giang', 'Huutu@gmail.com', ''),
(17, 'hoàng hải', '0365741894', 'nam', '2001-07-02', 'Hà nội', 'hoanghai@gmail.com', ''),
(18, 'hải phạm', '0365478249', 'nam', '2001-07-02', 'Thái Bình', 'Phamhai@gmail.com', ''),
(19, 'Phong', '0986506543', 'nam', '2001-07-02', 'Hà nội', 'Phong1991@gmail.com', ''),
(20, 'Phùng thanh khoa', '0989936966', 'nam', '2001-07-02', 'Láng Hạ, Hà Nội', 'khoa9999@gmail.com', ''),
(21, 'Quang An', '098645175', 'nam', '2001-07-02', 'Hà nội', 'Quangan@gamil.com', ''),
(22, 'Chu Tất Đạt', '098645474', 'nam', '2001-07-02', 'Hà Tây, Hà Nội', 'tandat@gmail.com', ''),
(23, 'Trần Hải Đăng', '0362831806', 'nam', '2001-07-02', 'Hà nội', 'tranhaidang@gmail.com', ''),
(24, 'Nguyễn Quốc Huy', '036588415', 'nam', '2001-07-02', 'Nam Định', 'nguyenquochuy@gmail.com', ''),
(25, 'Mạnh Tuấn', '0362831806', 'nam', '2001-07-02', 'Thụy thanh, Thái thụy, Thái Bình', 'manhtuan@gmail.com', ''),
(26, 'Tiến Tuấn', '0362831821', 'nam', '2001-07-02', 'Thụy thanh, Thái thụy, Thái Bình', 'nguyentuanepud14@gmail.com', ''),
(27, 'Ngọc Ánh', '0325794568', 'nam', '2001-07-02', 'Hà nội', 'ngocanh@gmail.com', ''),
(28, 'Nam Hải', '036587945', 'nam', '2001-07-02', 'Hà nội', 'namhai@gmail.com', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--
-- Tạo: Th6 16, 2022 lúc 08:14 PM
--

DROP TABLE IF EXISTS `loaisp`;
CREATE TABLE `loaisp` (
  `maloai` varchar(20) NOT NULL,
  `tenloai` varchar(50) DEFAULT NULL,
  `Mota` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `loaisp`:
--

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`maloai`, `tenloai`, `Mota`) VALUES
('Loai1', 'Nhẫn', 'Nhẫn là một vòng tròn, thường làm bằng kim loại, được đeo như một trang sức ở ngón tay, thỉnh thoảng là ngón chân.Khi người sử dụng nó tôn lên được vẻ đẹp cao quý của quý bà hoặc quý ông  quý sờ tộc thượng lưu\r\n'),
('Loai2', 'Dây chuyền', 'là một loại trang sức đeo ở cổ . Dây chuyền có thể được làm từ rất nhiều loại chất liệu khác nhau dành cho cả nam và nữ được sử dụng từ lâu trong lịch sử. Đây là một loại trang sức được cấu tạo cơ bản bằng một chuỗi hay một dãi đeo quanh cổ để làm đẹp.'),
('loai3', 'Bông tai', 'Bông taiTitan Kim Tự Tháp  trẻ trung dáng dài  phong cách hàn quốc BTZ33\r\nMột trong những món phụ kiện không thể thiếu đối với phái nữ đó chính là trang sức.Là con gái ai cũng muốn mình luôn xinh đẹp và có sức hút trong mắt người đối diện.\r\nBông tai mạ bạc ngọc trai long lanh xinh xắn thời trang BTZ33 bên ngoài mạ lớp vàng sáng viền tam giác bao bọc viên ngọc trai long lanh kiểu dáng thanh lịch trẻ trung sang trọng và quyến rủ phù hợp bạn gái yêu thích thời trang.\r\nCó thể kết hợp với nhiều loại trang phục, phụ kiện đi kèm tôn nét đẹp tinh tế của phái đẹp.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--
-- Tạo: Th6 13, 2022 lúc 02:50 PM
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE `nguoidung` (
  `taikhoan` varchar(40) NOT NULL,
  `matkhau` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `nguoidung`:
--

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`taikhoan`, `matkhau`) VALUES
('admin', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--
-- Tạo: Th6 13, 2022 lúc 02:50 PM
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE `sanpham` (
  `masp` varchar(20) NOT NULL,
  `maloai` varchar(20) DEFAULT NULL,
  `tensp` varchar(100) DEFAULT NULL,
  `soluong` int(30) DEFAULT NULL,
  `gia` float DEFAULT NULL,
  `anh` varchar(30) DEFAULT NULL,
  `mota` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `sanpham`:
--   `maloai`
--       `loaisp` -> `maloai`
--

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `maloai`, `tensp`, `soluong`, `gia`, `anh`, `mota`) VALUES
('SP01', 'loai3', 'Bông tai hình trăng lưỡi liềm', 10, 1500000, 'anhbongtailuoiliem.jpg', 'Một trong những món phụ kiện không thể thiếu đối với phái nữ đó chính là trang sức.Là con gái ai cũng muốn mình luôn xinh đẹp và có sức hút trong mắt người đối diện.\r\nBông tai mạ bạc ngọc trai long lanh xinh xắn thời trang BTZ33 bên ngoài mạ lớp vàng sáng viền tam giác bao bọc viên ngọc trai long lanh kiểu dáng thanh lịch trẻ trung sang trọng và quyến rủ phù hợp bạn gái yêu thích thời trang.\r\nCó thể kết hợp với nhiều loại trang phục, phụ kiện đi kèm tôn nét đẹp tinh tế của phái đẹp.'),
('SP02', 'Loai1', 'Dây chuyền kim tự tháp', 5, 2000000, 'day-chuyen-1.jpg', 'Là sản phẩm hầu như được ưa chuộng vì giá thành vừa đủ mà lại tôn lên được vẻ đẹp vẻ sang cool ngầu của người đeo được thiết kế theo kiểu phổ biến '),
('SP03', 'Loai1', 'Nhẫn vàng hoa văn uốn lượn', 56, 1000000, 'ring-1.jpg', 'Là sản phẩm hầu như được ưa chuộng vì giá thành vừa đủ mà lại tôn lên được vẻ đẹp vẻ sang cool ngầu của người đeo được thiết kế theo kiểu phổ biến '),
('SP04', 'Loai2', 'Vòng cổ mạ vàng', 8, 480000, 'day-chuyen-2.jpg', 'Vòng cổ cho nữ: Đây là loại vòng cổ truyền thống dành cho những ngươi phụ nữ trong nhu cầu làm đẹp, không phân biệt giai cấp, tầng lớp...Nó phù hợp cho tất cả mọi người và vẫn còn nguyên giá trị của mình trong xã hội hiện đại.'),
('SP05', 'Loai1', 'NHẪN CỔ ĐIỂN', 12, 398000, 'ring-5.jpg', 'Đây là kiểu nhẫn được thiết kế theo phong cách cổ điển mới, romantic ở đây đó chính là sự lãng mạn. Được thiết kế với vòng đeo trơn theo lối cổ điển bằng chất liệu vàng ngoại 18k, thêm vào đó là viên kim cương nhỏ được đính vào phần thân chiếc nhẫn tạo ra sự mới mẻ.'),
('SP06', 'Loai1', 'Nhẫn Vàng', 10, 450000, 'ring-4.jpg', 'Vàng là chất liệu làm nhẫn cưới được rất nhiều cặp đôi yêu thích, một là giá thành của nó rẻ hơn, nhưng mặt khác vẫn đảm bảo được chất lượng. Vàng được xem như là của hồi môn cho các đám cưới, màu vàng mang lại sự ấm áp cho người đeo, một cuộc sống hôn nhân ấm áp cho các cặp vợ chồng.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `masp` (`masp`),
  ADD KEY `MaHD` (`MaHD`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `makh` (`makh`);

--
-- Chỉ mục cho bảng `khachhang1`
--
ALTER TABLE `khachhang1`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`taikhoan`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `maloai` (`maloai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `khachhang1`
--
ALTER TABLE `khachhang1`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loaisp` (`maloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
