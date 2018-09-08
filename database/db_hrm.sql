-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th9 08, 2018 lúc 08:02 AM
-- Phiên bản máy phục vụ: 5.7.19
-- Phiên bản PHP: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_hrm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bo_phans`
--

CREATE TABLE `bo_phans` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phongban_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bo_phans`
--

INSERT INTO `bo_phans` (`id`, `ten`, `phongban_id`, `created_at`, `updated_at`) VALUES
(1, 'Thiết Kế', 1, NULL, NULL),
(2, 'IT', 1, NULL, NULL),
(3, 'Bảo Trì', 1, NULL, NULL),
(4, 'Xưởng', 1, NULL, NULL),
(5, 'Kế Toán', 3, NULL, NULL),
(6, 'Cung Ứng', 3, NULL, NULL),
(7, 'Kho', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hop_dongs`
--

CREATE TABLE `hop_dongs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nhansu_id` int(11) NOT NULL,
  `ma_hd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaihopdong_id` int(11) NOT NULL DEFAULT '0',
  `ngay_ky` datetime NOT NULL,
  `ngay_co_hieu_luc` datetime NOT NULL,
  `ngay_het_hieu_luc` datetime NOT NULL,
  `luong_can_ban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luong_tro_cap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luong_hieu_qua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hop_dongs`
--

INSERT INTO `hop_dongs` (`id`, `nhansu_id`, `ma_hd`, `ten`, `loaihopdong_id`, `ngay_ky`, `ngay_co_hieu_luc`, `ngay_het_hieu_luc`, `luong_can_ban`, `luong_tro_cap`, `luong_hieu_qua`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 1, 'TP0001/2018/HĐTV-TP', 'Hợp đồng thử việc', 1, '2018-06-11 00:00:00', '2018-06-11 00:00:00', '2018-08-10 00:00:00', '3.800.000', '1.000.000', '1.150.000', 0, NULL, NULL),
(2, 1, 'TP0001/2018/HĐLĐ-TP', 'Hợp đồng lao động', 2, '2018-08-11 00:00:00', '2018-08-11 00:00:00', '2019-08-10 00:00:00', '3.800.000', '1.000.000', '2.200.000', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ho_sos`
--

CREATE TABLE `ho_sos` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ho_sos`
--

INSERT INTO `ho_sos` (`id`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'Phiếu thông tin ứng viên', NULL, NULL),
(2, 'Giảm trừ gia cảnh', NULL, NULL),
(3, 'Sơ yếu lý lịch', NULL, NULL),
(4, 'Đơn xin việc', NULL, NULL),
(5, 'Chứng minh nhân dân', NULL, NULL),
(6, 'Giấy khám sức khỏe', NULL, NULL),
(7, 'Giấy khai sinh', NULL, NULL),
(8, 'Bằng chính (ĐH, CĐ, TC)', NULL, NULL),
(9, 'Chứng chỉ', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_hop_dongs`
--

CREATE TABLE `loai_hop_dongs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_hop_dongs`
--

INSERT INTO `loai_hop_dongs` (`id`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'Hợp đồng thử việc', NULL, NULL),
(2, 'Hợp đồng xác định thời hạn', NULL, NULL),
(3, 'Hợp đồng không xác định thời hạn', NULL, NULL),
(4, 'Hợp đồng đào tạo nghề', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(57, '2014_10_12_000000_create_users_table', 1),
(58, '2014_10_12_100000_create_password_resets_table', 1),
(59, '2018_08_30_075551_create_phong_bans_table', 1),
(60, '2018_08_30_075711_create_bo_phans_table', 1),
(61, '2018_08_30_084129_create_nhan_sus_table', 1),
(62, '2018_08_30_162233_create_ho_sos_table', 1),
(63, '2018_09_05_142047_create_hop_dongs_table', 1),
(64, '2018_09_05_143038_create_loai_hop_dongs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_sus`
--

CREATE TABLE `nhan_sus` (
  `id` int(10) UNSIGNED NOT NULL,
  `ma_nv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL DEFAULT '1',
  `ngay_sinh` datetime NOT NULL,
  `so_cmnd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_cap_cmnd` datetime DEFAULT NULL,
  `noi_cap_cmnd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_chi_thuong_tru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi_lien_he` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dien_thoai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trinh_do` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `truong_tot_nghiep` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nam_tot_nghiep` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_bat_dau_lam` datetime DEFAULT NULL,
  `chuc_danh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phongban_id` int(11) NOT NULL DEFAULT '0',
  `bophan_id` int(11) NOT NULL DEFAULT '0',
  `chung_chi` text COLLATE utf8mb4_unicode_ci,
  `hoso_id` text COLLATE utf8mb4_unicode_ci,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_sus`
--

INSERT INTO `nhan_sus` (`id`, `ma_nv`, `ho_ten`, `gioi_tinh`, `ngay_sinh`, `so_cmnd`, `ngay_cap_cmnd`, `noi_cap_cmnd`, `dia_chi_thuong_tru`, `dia_chi_lien_he`, `dien_thoai`, `email`, `trinh_do`, `truong_tot_nghiep`, `nam_tot_nghiep`, `ngay_bat_dau_lam`, `chuc_danh`, `phongban_id`, `bophan_id`, `chung_chi`, `hoso_id`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'TP0001', 'Phạm Đức Chí Thiện', 1, '1991-05-17 00:00:00', '225477220', '2008-03-22 00:00:00', 'CA. Khánh Hòa', '5 An Dương Vương, P.Phước Tân, Nha Trang, Khánh Hòa', '5 An Dương Vương, P.Phước Tân, Nha Trang, Khánh Hòa', '0905160320', 'chithien175@gmail.com', 'Cao đẳng', 'CĐ sư phạm Nha Trang', '2015', '2018-06-11 00:00:00', 'Nhân viên', 1, 2, NULL, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\"]', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_bans`
--

CREATE TABLE `phong_bans` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong_bans`
--

INSERT INTO `phong_bans` (`id`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'Phòng Kỹ Thuật', NULL, NULL),
(2, 'Phòng Dự Án', NULL, NULL),
(3, 'Phòng Tài Chính - Kế Toán', NULL, NULL),
(4, 'Phòng Hành Chính - Nhân Sự', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-avatar.jpg',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `role`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Thiện Phạm', 'chithien175@gmail.com', '$2y$10$mrpwKtpEKeqv52Q0l04RIeJcflMLBAaxlo/4txeNC1CPD3wyro.qu', 'default-avatar.jpg', 'superadmin', 1, NULL, NULL, NULL),
(2, 'Test 1', 'test1@gmail.com', '$2y$10$lDb0DTJ2aCuOtRxyIEIxBuYZBlS9P4AOkuoJGw6VTbJcqxsg3pnxS', 'default-avatar.jpg', 'admin', 1, NULL, NULL, NULL),
(3, 'Test 2', 'test2@gmail.com', '$2y$10$c0WWtk2RWSEwCfnODUukaeX/SukADYLbSYsnZmZ7qm3excGzpzB3S', 'default-avatar.jpg', 'user', 1, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bo_phans`
--
ALTER TABLE `bo_phans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hop_dongs`
--
ALTER TABLE `hop_dongs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hop_dongs_ma_hd_unique` (`ma_hd`);

--
-- Chỉ mục cho bảng `ho_sos`
--
ALTER TABLE `ho_sos`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_hop_dongs`
--
ALTER TABLE `loai_hop_dongs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhan_sus`
--
ALTER TABLE `nhan_sus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nhan_sus_ma_nv_unique` (`ma_nv`),
  ADD UNIQUE KEY `nhan_sus_so_cmnd_unique` (`so_cmnd`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `phong_bans`
--
ALTER TABLE `phong_bans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bo_phans`
--
ALTER TABLE `bo_phans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hop_dongs`
--
ALTER TABLE `hop_dongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `ho_sos`
--
ALTER TABLE `ho_sos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `loai_hop_dongs`
--
ALTER TABLE `loai_hop_dongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `nhan_sus`
--
ALTER TABLE `nhan_sus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `phong_bans`
--
ALTER TABLE `phong_bans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
