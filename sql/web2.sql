-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 17, 2023 lúc 03:50 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `IDCTDH` int(11) NOT NULL,
  `maDonHang` int(11) NOT NULL,
  `tenNguoiNhan` varchar(255) NOT NULL,
  `sdtKH` int(11) NOT NULL,
  `ghiChuCuaKhachhang` varchar(255) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `tenSanPham` varchar(255) NOT NULL,
  `soLuongSP` int(11) NOT NULL,
  `sizeSanPham` int(11) NOT NULL,
  `giaSanPham` int(11) NOT NULL,
  `mieuTaSP` varchar(255) NOT NULL,
  `hinhAnhSP` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitietdonhang`
--

INSERT INTO `tbl_chitietdonhang` (`IDCTDH`, `maDonHang`, `tenNguoiNhan`, `sdtKH`, `ghiChuCuaKhachhang`, `maSanPham`, `tenSanPham`, `soLuongSP`, `sizeSanPham`, `giaSanPham`, `mieuTaSP`, `hinhAnhSP`, `diachi`) VALUES
(1, 1, 'Nhân', 359107774, 'ko co j', 5, 'Dép nam MWC - 7600 Dép Kẹp Nam Đế Đúc Nguyên Khối ', 1, 42, 175000, 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao,kiểu dáng basic, phối sọc thể thao thời trang.\r\n\r\nDép có độ dày quai vừa phải, chất liệu da PU cao cấp giúp đôi dép chắc chắn hơ', '1684033843.jpg', '402 an duong vuong phuong 3 quan 5'),
(104, 2, 'Nhân', 359107774, '', 1, 'Dép nam MWC - 7766 Dép Kẹp Nam', 2, 38, 150000, 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao quai dập vân nổi cách điệu.', '1684034795.jpg', 'trên trời ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitiethoadon`
--

CREATE TABLE `tbl_chitiethoadon` (
  `idHD` int(11) NOT NULL,
  `maHoaDon` int(11) NOT NULL,
  `tenNguoiNhan` varchar(255) NOT NULL,
  `sdtKH` int(11) NOT NULL,
  `ghiChu` varchar(255) NOT NULL,
  `maSP` int(11) NOT NULL,
  `tenSP` varchar(255) NOT NULL,
  `soLuongSP` int(11) NOT NULL,
  `sizeSP` int(11) NOT NULL,
  `giaSP` int(11) NOT NULL,
  `mieuTaSP` varchar(255) NOT NULL,
  `hinhAnhSP` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitiethoadon`
--

INSERT INTO `tbl_chitiethoadon` (`idHD`, `maHoaDon`, `tenNguoiNhan`, `sdtKH`, `ghiChu`, `maSP`, `tenSP`, `soLuongSP`, `sizeSP`, `giaSP`, `mieuTaSP`, `hinhAnhSP`, `diachi`) VALUES
(1, 1, 'Nhân', 359107774, 'ko co j', 5, 'Dép nam MWC - 7600 Dép Kẹp Nam Đế Đúc Nguyên Khối ', 1, 42, 175000, 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao,kiểu dáng basic, phối sọc thể thao thời trang.\r\n\r\nDép có độ dày quai vừa phải, chất liệu da PU cao cấp giúp đôi dép chắc chắn hơ', '1684033843.jpg', '402 an duong vuong phuong 3 quan 5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `maDonHang` int(10) NOT NULL,
  `maKhachHang` int(10) DEFAULT NULL,
  `ngayLapDH` date NOT NULL,
  `tongTienDH` int(10) NOT NULL,
  `trangThaiDH` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`maDonHang`, `maKhachHang`, `ngayLapDH`, `tongTienDH`, `trangThaiDH`) VALUES
(1, 26, '2023-05-17', 175000, 'Đã hoàn thành'),
(2, 26, '2023-05-17', 300000, 'Chưa giao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id_giohang` int(10) NOT NULL,
  `maSanPham` int(20) NOT NULL,
  `soLuongSanPham` int(20) NOT NULL,
  `sessionID` varchar(225) NOT NULL,
  `maLoai` int(10) NOT NULL,
  `tenSanPham` varchar(225) NOT NULL,
  `sizeSanPham` int(10) NOT NULL,
  `mieuTaSanPham` varchar(225) NOT NULL,
  `giaSanPham` int(10) NOT NULL,
  `hinhAnhSanPham` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoadon`
--

CREATE TABLE `tbl_hoadon` (
  `maHoaDon` int(11) NOT NULL,
  `maKhachHang` int(11) NOT NULL,
  `ngayDat` date NOT NULL,
  `giaTriHD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoadon`
--

INSERT INTO `tbl_hoadon` (`maHoaDon`, `maKhachHang`, `ngayDat`, `giaTriHD`) VALUES
(47, 26, '2023-05-17', 175000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `maKhachHang` int(11) NOT NULL,
  `tenDangNhap` varchar(255) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `hoTenKhachHang` varchar(255) NOT NULL,
  `thuDienTuKH` varchar(255) NOT NULL,
  `trangThai` varchar(255) NOT NULL DEFAULT 'Active',
  `ngaySinh` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`maKhachHang`, `tenDangNhap`, `matKhau`, `hoTenKhachHang`, `thuDienTuKH`, `trangThai`, `ngaySinh`) VALUES
(20, 'ducnam1234', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Đức Huy', 'leducnam22250820203@gmail.com', 'Active', '2023-05-12'),
(21, 'ducnam2', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Đức Nam', 'leducnam25028@gmail.com', 'Active', '2023-05-04'),
(22, 'vuong12', 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Thanh Vương1', 'vuong@gmail.com', 'Active', '2023-05-11'),
(23, 'phu123', 'e10adc3949ba59abbe56e057f20f883e', 'Thiên Phú', 'phu@gmail.com', 'Active', '2023-05-04'),
(24, 'huy123', 'e10adc3949ba59abbe56e057f20f883e', 'Đức Huy', 'huy@gmail.com', 'Active', '2023-05-04'),
(25, 'ducnam3', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Đức Nam', 'leducnam22508@gmail.com', 'Active', '2003-08-25'),
(26, 'nhancktv123', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Trọng Nhân', 'letrongnhan@gmail.com', 'Active', '2003-02-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loaisanpham`
--

CREATE TABLE `tbl_loaisanpham` (
  `maLoai` int(11) NOT NULL,
  `tenLoai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_loaisanpham`
--

INSERT INTO `tbl_loaisanpham` (`maLoai`, `tenLoai`) VALUES
(1, 'QUAI NGANG'),
(2, 'KẸP'),
(3, 'SANDAL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_quantri`
--

CREATE TABLE `tbl_quantri` (
  `tenDangNhap` varchar(255) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `tenNguoiQuanTri` varchar(255) NOT NULL,
  `thuDienTuQT` varchar(255) NOT NULL,
  `trangThai` varchar(255) NOT NULL DEFAULT 'Active',
  `maVaiTro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_quantri`
--

INSERT INTO `tbl_quantri` (`tenDangNhap`, `matKhau`, `tenNguoiQuanTri`, `thuDienTuQT`, `trangThai`, `maVaiTro`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com', 'Active', 1),
('nhancktv123', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Trọng Nhân', 'letrongnhan@gmail.com', 'Active', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `maSanPham` int(11) NOT NULL,
  `maLoai` int(11) NOT NULL,
  `tenSanPham` varchar(255) NOT NULL,
  `sizeSanPham` varchar(255) NOT NULL,
  `soLuongSanPham` varchar(255) NOT NULL,
  `mieuTaSanPham` mediumtext NOT NULL,
  `giaSanPham` varchar(255) NOT NULL,
  `trangThaiSanPham` varchar(255) NOT NULL DEFAULT '1',
  `hinhAnhSanPham` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`maSanPham`, `maLoai`, `tenSanPham`, `sizeSanPham`, `soLuongSanPham`, `mieuTaSanPham`, `giaSanPham`, `trangThaiSanPham`, `hinhAnhSanPham`) VALUES
(0, 1, 'Dép nam MWC NADE- 7797 Dép Nam Quai Ngang Phối Chữ Phản Quang', '41', '100', 'Dép được thiết kế với quai ngang là cao su dẻo ,in chữ phản quang thời trang và năng động.', '175000', '1', '1684035255.jpg'),
(1, 2, 'Dép nam MWC - 7766 Dép Kẹp Nam', '38', '120', 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao quai dập vân nổi cách điệu.', '150000', '1', '1684034795.jpg'),
(2, 2, 'Dép nam MWC - 7567 Dép Kẹp Nam Đế Đúc Nguyên Khối', '40', '94', 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao kiểu dáng basic..\r\n\r\nDép sử dụng chất liệu cao cấp tạo cảm giác thoải mái cho bạn trong suốt quá trình vận động.', '179000', '1', '1684033248.jpg'),
(3, 1, 'Dép nam MWC - 7788 Dép Nam Quai Ngang', '40', '92', 'Dép được thiết kế với quai ngang in họa tiết cách điệu phối nút nổi bật ,trẻ trung, cá tính\r\n\r\nDép được sử dụng chất liệu cao cấp chắc chắn, bền & nhẹ tạo cảm giác thoải mái cho bạn trong suốt quá trình vận động.', '195000', '1', '1684033693.jpg'),
(4, 1, 'Dép nam MWC - 7706 Dép Da Nam, Dép Quai Ngang Nam', '41', '99', 'Dép nam phối màu thể thao có kiểu dáng quai ngang cá tính\r\n\r\nDép làm từ chất liệu chắc chắn, bền & nhẹ tạo cảm giác thoải mái cho bạn trong suốt quá trình vận động.', '150000', '1', '1684033800.jpg'),
(5, 2, 'Dép nam MWC - 7600 Dép Kẹp Nam Đế Đúc Nguyên Khối ', '42', '94', 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao,kiểu dáng basic, phối sọc thể thao thời trang.\r\n\r\nDép có độ dày quai vừa phải, chất liệu da PU cao cấp giúp đôi dép chắc chắn hơn,đế làm từ cao su đi rất êm chân,cực kỳ chắc chắn', '175000', '1', '1684033843.jpg'),
(6, 1, 'Dép nam MWC NADE- 7654', '41', '100', 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị  công nghệ cao, phối sọc thể thao thời trang.\r\n\r\nChất liệu da PU cao cấp giúp đôi dép chắc chắn hơn,đế làm từ cao su đi rất êm chân,cực kỳ chắc chắn', '190000', '1', '1684331175.jpg'),
(7, 1, 'Dép nam MWC - 7692 Dép Nam Quai Ngang Phối Caro', '40', '200', 'Dép được thiết kế với quai ngang phối caro nổi bật, sắc nét tạo điểm nhấn cá tính cho đôi dép.', '195000', '1', '1684034260.jpg'),
(8, 2, 'Dép nam MWC NADE- 7802 Dép Nam Quai Kẹp', '41', '99', 'Dép thiết kế xỏ ngón cùng quai da dày dặn với cách phối màu siêu COOL NGẦU cho các bạn cá tính,năng động.', '195000', '1', '1684034296.jpg'),
(9, 1, 'Dép nam MWC - 7774 Dép Nam Quai Ngang', '39', '100', 'Dép được thiết kế với quai ngang kiểu dáng thể thao trẻ trung, cá tính, Logo thể thao được in trên quai dép tạo điểm nhấn.', '150000', '1', '1684034365.jpg'),
(10, 1, 'Dép nam MWC - 7667 Dép Nam Quai Ngang ', '41', '100', 'Dép với thiết kế mới đầy phong cách với phần quai da sành điệu có kiểu dáng quai ngang cá tính.', '185000', '1', '1684034400.jpg'),
(11, 2, 'Dép nam MWC - 7789 Dép Nam Quai Kẹp Phối Caro', '42', '99', 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao xử lý đặc biệt để tạo độ bóng mờ mạnh mẽ và nam tính, thích hợp cho mọi lứa tuổi..', '149000', '1', '1684034841.jpg'),
(12, 1, 'Dép nam MWC - 7787 Dép Nam In Họa Tiết', '40', '100', 'Dép nam có kiểu dáng quai ngang cá tính,sắc nét,in họa tiết siêu cute là 1 điểm cộng cho đôi dép này.', '195000', '1', '1684034889.jpg'),
(13, 1, 'Dép nam MWC - 7763 Dép Nam Quai Ngang Phối Sọc Thể Thao', '41', '1', 'Dép được thiết kế với quai ngang phối sọc thể thao kết hợp họa tiết hiện đại, trẻ trung, cá tính.', '150000', '1', '1684034919.jpg'),
(14, 1, 'Dép nam MWC - 7636 Dép Da Nam, Dép Quai Ngang Nam', '40', '100', 'Dép da nam phối sọc thể thao có kiểu dáng quai ngang cá tính,sọc ngang nổi bật, sắc nét, là 1 điểm cộng cho đôi dép này.', '195000', '1', '1684035210.jpg'),
(15, 2, 'Dép nam MWC NADE- 7762 Dép Kẹp Nam', '42', '100', 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao.', '195000', '1', '1684035625.jpg'),
(16, 1, 'Dép nam MWC NADE- 7743 Dép Nam Quai Ngang', '42', '100', 'Dép nam có kiểu dáng quai ngang cá tính,sắc nét,in họa tiết siêu cute là 1 điểm cộng cho đôi dép này.', '150000', '1', '1684035662.jpg'),
(17, 1, 'Dép nam MWC NADE- 7749 Dép Nam Quai Ngang Phối Sọc Vaỉ Dù Thể Thao', '42', '100', 'Dép được thiết kế với quai ngang vải phối vải dù cách điệu thời trang, trẻ trung, cá tính.', '150000', '1', '1684035721.jpg'),
(18, 1, 'Dép nam MWC - 7634 Dép Nam Quai Ngang Đơn Giản', '40', '100', 'Dép được thiết kế với quai ngang da trơn đơn giản được xử lý đặc biệt để tạo độ bóng mờ mạnh mẽ và nam tính.', '175000', '1', '1684035759.jpg'),
(19, 1, 'Dép nam MWC - 7754 Dép Quai Ngang Nam', '42', '100', 'Dép được thiết kế với kiểu dáng quai ngang cá tính, quai phối sọc màu thể thao nổi bật, sắc nét, là 1 điểm cộng cho đôi dép này', '150000', '1', '1684035796.jpg'),
(20, 1, 'Dép nam MWC - 7734 Dép Nam Quai Ngang Phối Sọc Thể Thao', '42', '100', 'Dép được thiết kế với quai ngang phối soc thể thao được xử lý đặc biệt để tạo độ bóng mờ mạnh mẽ và nam tính.', '195000', '1', '1684035836.jpg'),
(21, 1, 'Dép MWC - 7713 Dép Nam Quai Chéo Phối Vải Dù Viền Chỉ Cách Điệu Phong Cách Cá Tính', '42', '100', 'Dép thiết kế với quai chéo phối vải dù viền chỉ cách điệu.', '150000', '1', '1684035889.jpg'),
(22, 1, 'Dép nam MWC - 7627 Dép Da Nam, Dép Quai Ngang Nam', '43', '100', 'Dép nam phối sọc thể thao có kiểu dáng quai ngang cá tính,sọc ngang nổi bật, sắc nét, là 1 điểm cộng cho đôi dép này.', '195000', '1', '1684035919.jpg'),
(23, 2, 'Dép nam MWC - 7769 Dép Kẹp Nam Phong Cách Cá Tính', '40', '100', 'Dép thiết kế đơn giản với quai kẹp ôm chân, quai vải dù thể thao', '195000', '1', '1684035951.jpg'),
(24, 1, 'Dép nam MWC NADE- 7795 Dép Nam Quai Ngang Phối Chữ Nổi Bật', '39', '100', 'Dép được thiết kế với quai ngang là cao su dẻo ,in chữ nổi phối da màu vô cùng lạ mắt,thời trang và năng động.', '175000', '1', '1684035987.jpg'),
(25, 2, 'Dép nam MWC NADE - 7660 Dép Kẹp Nam Đế Đúc Nguyên Khối Phong ', '39', '100', 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao,kiểu dáng basic.', '150000', '1', '1684036042.jpg'),
(26, 1, 'Dép nam MWC - 7788 Dép Nam Quai Ngang In Họa Tiết Phối Nút Nổi Bật', '41', '100', 'Dép được thiết kế với quai ngang in họa tiết cách điệu phối nút nổi bật ,trẻ trung, cá tính', '175000', '1', '1684036072.jpg'),
(27, 1, 'Dép nam MWC NADE- 7798 Dép Nam Quai Ngang', '42', '100', 'Dép với thiết kế quai bản ngang in hình và chữ , đế đúc vân nổi kiểu dáng thể thao.', '150000', '1', '1684036255.jpg'),
(28, 1, 'Dép nam MWC NADE- 7743 Dép Nam Quai Ngang', '41', '100', 'Dép nam có kiểu dáng quai ngang cá tính,sắc nét,in họa tiết siêu cute là 1 điểm cộng cho đôi dép này.', '175000', '1', '1684036336.jpg'),
(29, 2, 'Dép nam MWC - 7671 Dép Kẹp Nam', '42', '100', 'Dép thiết kế đơn giản với quai kẹp ôm chân quai phối sọc thể thao.', '150000', '1', '1684036372.jpg'),
(30, 1, 'Dép nam MWC NADE - 7630 Dép Quai Ngang Nam', '40', '100', 'Dép da nam phối sọc thể thao có kiểu dáng quai ngang cá tính,sọc ngang nổi bật, sắc nét, là 1 điểm cộng cho đôi dép này.', '150000', '1', '1684036406.jpg'),
(31, 1, 'Dép nam MWC NADE - 7758 Dép Nam Quai Ngang', '38', '100', 'Dép được thiết kế với kiểu dáng quai ngang in họa tiết cách điệu phối màu thanh lịch trẻ trung.', '150000', '1', '1684036443.jpg'),
(32, 1, 'Dép nam MWC - 7759 Dép Nam Quai Ngang', '43', '100', 'Dép được thiết kế với quai ngang phối chữ kết hợp họa tiết hiện đại, trẻ trung, cá tính.', '150000', '1', '1684036475.jpg'),
(33, 1, 'Dép nam MWC - 7690 Dép Da Nam, Dép Quai Ngang Nam', '38', '100', 'Dép có kiểu dáng quai ngang cá tính,sọc thể thao phối màu viền chỉ nổi bật, sắc nét, là 1 điểm cộng cho đôi dép này.', '150000', '1', '1684036615.jpg'),
(34, 1, 'Dép nam MWC - 7776 Dép Da Nam, Dép Quai Ngang Nam', '38', '100', 'Dép được thiết kế kiểu dáng quai ngang phối sọc thể thao cá tính,sọc ngang nổi bật, sắc nét, là 1 điểm cộng cho đôi dép này.', '195000', '1', '1684036690.jpg'),
(35, 1, 'Dép nam MWC - 7705 Dép Nam Quai Ngang Phối Sọc Thể Thao', '39', '100', 'Dép được thiết kế với quai ngang phối màu viền chỉ nổi bật, sắc nét tạo điểm nhấn cá tính cho đôi dép.', '195000', '1', '1684036714.jpg'),
(36, 1, 'ép nam MWC - 7787 Dép Nam In Họa Tiết', '41', '100', 'Dép nam có kiểu dáng quai ngang cá tính,sắc nét,in họa tiết siêu cute là 1 điểm cộng cho đôi dép này.', '195000', '1', '1684036740.jpg'),
(37, 1, 'Dép nam MWC - 7741 Dép Nam Quai Ngang Phối Màu In Chữ Nổi Bật', '42', '100', 'Dép được thiết kế kiểu dáng quai ngang phối màu in chữ độc lạ siêu cool thích hợp cho mọi độ tuổi.', '150000', '1', '1684036768.jpg'),
(38, 1, 'Dép nam MWC - 7767 Dép Da Nam Dép Nam Dập Vân Cách Điệu', '42', '100', 'Thích hợp mọi lứa tuổi', '150000', '1', '1684036814.jpg'),
(39, 2, 'Dép nam MWC - 7750 Dép Kẹp Nam', '42', '100', 'Dép thiết kế đơn giản với quai kẹp ôm chân,quai phối sọc màu thể thao', '150000', '1', '1684036840.jpg'),
(40, 1, 'Dép nam MWC - 7773 Dép Nam Quai Ngang Phối Họa Tiết Nổi Bật Cực Đẹp', '43', '100', 'Dép được thiết kế với quai ngang phối họa tiết cách điệu nổi bật ,trẻ trung, cá tính', '150000', '1', '1684036872.jpg'),
(41, 1, 'Dép nam MWC NADE- 7755 Dép Nam Quai Ngang Phối Sọc Vaỉ Dù Thể Thao', '41', '100', 'Dép được thiết kế với quai ngang phối vải dù cách điệu thời trang, trẻ trung, cá tính.', '195000', '1', '1684036897.jpg'),
(42, 1, 'Dép nam MWC - 7781 Dép Nam Phối Họa Tiết, Dép Quai Ngang Nam', '40', '100', 'Dép nam phối sọc thể thao có kiểu dáng quai ngang cá tính,sọc ngang nổi bật, sắc nét,in họa tiết logo thương hiệu là 1 điểm cộng cho đôi dép này..', '195000', '1', '1684036926.jpg'),
(43, 1, 'Dép MWC 7765 - Dép Nam 3 Quai Ngang Chéo Thời Trang Dép Nam Da Dập Vân', '42', '100', 'Dép thiết kế với 3 quai ngang chéo dập vân cách điệu,da được xử lý đặc biệt để tạo độ bóng mờ mạnh mẽ và nam tính', '195000', '1', '1684036954.jpg'),
(44, 3, 'Dép sandal nam MWC NASD - 7045 Sandal Quai Ngang Thời Trang', '40', '97', 'Được thiết kế với form quai ngang lót dán, dễ dàng tùy chỉnh giày theo size chân, cực cool ngầu nhưng không kém phần tiện lợi.', '195000', '1', '1684065093.jpg'),
(45, 1, 'Dép MWC - 7713 Dép Nam Quai Chéo Phối Vải Dù', '39', '100', 'Dép thiết kế với quai chéo phối vải dù viền chỉ cách điệu.\r\n\r\nDép làm từ chất liệu chắc chắn, bền & nhẹ tạo cảm giác thoải mái cho bạn trong suốt quá trình vận động.', '185000', '1', '1684331368.jpg'),
(46, 2, 'Dép nam MWC - 7689 Dép Kẹp Nam Phong Cách Cá Tính', '38', '100', 'Dép được thiết kế đơn giản với quai kẹp ôm chân,quai vải dù phối sọc màu thể thao, logo nổi in thương hiệu, dép được phối màu cơ bản tinh tế được sản xuất trên thiết bị và kỹ thuật công nghệ cao.', '150000', '1', '1684065987.jpg'),
(47, 2, 'Dép nam MWC NADE - 7691 Dép Kẹp Nam', '44', '100', 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao,kiểu dáng basic, phối viền chỉ tạo sự phá cách.', '175000', '1', '1684066130.jpg'),
(48, 2, 'Dép nam MWC - 7664 Dép Kẹp Nam', '45', '100', 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao,kiểu dáng basic, phối viền chỉ và nút tạo sự phá cách', '195000', '1', '1684066174.jpg'),
(49, 2, 'Dép nam MWC - 7751 Dép Kẹp Nam Phong Cách Cá Tính', '45', '100', 'Dép được thiết kế đơn giản với quai kẹp ôm chân,quai vải dù phối viền màu kết hợp logo nổi in thương hiệu', '150000', '1', '1684066214.jpg'),
(50, 2, 'Dép nam MWC NADE - 7703 Dép Kẹp Nam', '46', '100', 'Dép thiết kế đơn giản với quai kẹp ôm chân,được sản xuất trên thiết bị và kỹ thuật công nghệ cao quai dập vân nổi có kiểu dáng cá tính,trẻ trung, năng động.', '195000', '1', '1684066247.jpg'),
(51, 3, 'Dép sandal nam MWC NASD- 7072 Dép Sandal 3 Quai Ngang Thời Trang', '37', '99', 'Được thiết kế với 3 quai ngang thoáng khí đầy mạnh mẽ và trung hòa,form quai ngang lót dán ôm chân,có khóa cài co giãn dễ dàng tùy chỉnh giày theo size chân.', '175000', '1', '1684066305.jpg'),
(52, 3, 'Dép Sandal Nam MWC - 7043', '38', '100', 'Được thiết kế với 2 quai ngang thoáng khí đầy mạnh mẽ và trung hòa,form quai ngang lót dán ôm chân,có khóa cài co giãn dễ dàng tùy chỉnh giày theo size chân', '215000', '1', '1684066365.jpg'),
(53, 3, 'Dép Sandal Nam MWC - 7052', '39', '100', 'Được thiết kế với 2 quai ngang chéo cách điệu,form quai ngang lót dán ôm chân,co giãn dễ dàng tùy chỉnh giày theo size chân.', '175000', '1', '1684066421.jpg'),
(54, 3, 'Dép sandal nữ MWC NUSD - 2405 Sandal Đế Bằng Phối Chữ Siêu Cute', '40', '100', 'Thiết kế kiểu sandal với quai dán vải ngang phối lưới,có khóa cài , đệm lót may viền,đế cao su dẻo vân nổi thời trang ', '195000', '1', '1684066475.jpg'),
(55, 3, 'Giày Sandal Nam MWC - 7057', '41', '100', 'Được thiết kế với quai ngang phối họa tiết thoáng khí đầy mạnh mẽ và trung hòa,form quai ngang lót dán ôm chân,có khóa cài co giãn dễ dàng tùy chỉnh giày theo size chân', '175000', '1', '1684066510.jpg'),
(56, 3, 'Giày sandal nam MWC NASD- 7073', '42', '98', 'Được thiết kế quai ngang thoáng khí đầy mạnh mẽ và trung hòa,form quai ngang lót dán ôm chân,có khóa cài co giãn dễ dàng tùy chỉnh giày theo size chân.', '195000', '1', '1684066543.jpg'),
(57, 3, 'Giày sandal nam MWC NASD- 7074', '43', '100', 'Được thiết kế 2 quai ngang bằng vải dệt thoáng khí đầy mạnh mẽ và trung hòa,form quai ngang lót dán ôm chân,có khóa cài co giãn dễ dàng tùy chỉnh giày theo size chân.', '175000', '1', '1684066580.jpg'),
(58, 3, 'Giày Sandal Nam MWC - 7062', '44', '100', 'Được thiết kế với 3 quai ngang thoáng khí đầy mạnh mẽ và trung hòa,form quai ngang lót dán ôm chân,có khóa cài co giãn dễ dàng tùy chỉnh giày theo size chân.', '195000', '1', '1684066626.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongtingiaohang1`
--

CREATE TABLE `tbl_thongtingiaohang1` (
  `IDTTGH` int(11) NOT NULL,
  `maKhachHang` int(11) NOT NULL,
  `tenNguoiNhan` varchar(255) NOT NULL,
  `soDienThoai` int(11) NOT NULL,
  `ghiChuKH` varchar(255) NOT NULL,
  `sessionID` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongtingiaohang1`
--

INSERT INTO `tbl_thongtingiaohang1` (`IDTTGH`, `maKhachHang`, `tenNguoiNhan`, `soDienThoai`, `ghiChuKH`, `sessionID`, `diachi`) VALUES
(85, 26, 'Nhân', 359107774, 'ko co j', 'ebra8g4nk2imoaquhn86u37e3q', '402 an duong vuong phuong 3 quan 5'),
(88, 26, 'Nhân', 359107774, '', 'ebra8g4nk2imoaquhn86u37e3q', '402 an duong vuong phuong 3 quan 5'),
(89, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(90, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(91, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(92, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(93, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(94, 26, '', 0, '1', 'ebra8g4nk2imoaquhn86u37e3q', '1'),
(95, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(96, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(97, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(98, 26, '', 0, '', 'ebra8g4nk2imoaquhn86u37e3q', ''),
(99, 26, 'Nhân', 359107774, '', 'ebra8g4nk2imoaquhn86u37e3q', 'trên trời ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_vaitro`
--

CREATE TABLE `tbl_vaitro` (
  `maVaiTro` int(11) NOT NULL,
  `tenVaiTro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_vaitro`
--

INSERT INTO `tbl_vaitro` (`maVaiTro`, `tenVaiTro`) VALUES
(1, 'admin'),
(2, 'manager');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`IDCTDH`);

--
-- Chỉ mục cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  ADD PRIMARY KEY (`idHD`),
  ADD KEY `maHoaDon` (`maHoaDon`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`maDonHang`),
  ADD KEY `maKhachHang` (`maKhachHang`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`id_giohang`),
  ADD KEY `maSanPham` (`maSanPham`);

--
-- Chỉ mục cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD PRIMARY KEY (`maHoaDon`),
  ADD KEY `maKhachHang` (`maKhachHang`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`maKhachHang`);

--
-- Chỉ mục cho bảng `tbl_loaisanpham`
--
ALTER TABLE `tbl_loaisanpham`
  ADD PRIMARY KEY (`maLoai`);

--
-- Chỉ mục cho bảng `tbl_quantri`
--
ALTER TABLE `tbl_quantri`
  ADD PRIMARY KEY (`tenDangNhap`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`maSanPham`),
  ADD KEY `maSanPham` (`maSanPham`),
  ADD KEY `maSanPham_2` (`maSanPham`),
  ADD KEY `maSanPham_3` (`maSanPham`);

--
-- Chỉ mục cho bảng `tbl_thongtingiaohang1`
--
ALTER TABLE `tbl_thongtingiaohang1`
  ADD PRIMARY KEY (`IDTTGH`);

--
-- Chỉ mục cho bảng `tbl_vaitro`
--
ALTER TABLE `tbl_vaitro`
  ADD PRIMARY KEY (`maVaiTro`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  MODIFY `IDCTDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  MODIFY `idHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `maDonHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id_giohang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  MODIFY `maHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `maKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tbl_loaisanpham`
--
ALTER TABLE `tbl_loaisanpham`
  MODIFY `maLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `maSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT cho bảng `tbl_thongtingiaohang1`
--
ALTER TABLE `tbl_thongtingiaohang1`
  MODIFY `IDTTGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `tbl_vaitro`
--
ALTER TABLE `tbl_vaitro`
  MODIFY `maVaiTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD CONSTRAINT `tbl_donhang_ibfk_1` FOREIGN KEY (`maKhachHang`) REFERENCES `tbl_khachhang` (`maKhachHang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
