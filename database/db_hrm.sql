-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th9 20, 2018 lúc 07:28 AM
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
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `ma_hd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaihopdong_id` int(11) NOT NULL DEFAULT '0',
  `ngay_ky` datetime NOT NULL,
  `ngay_co_hieu_luc` datetime NOT NULL,
  `ngay_het_hieu_luc` datetime NOT NULL,
  `luong_can_ban` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luong_tro_cap` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luong_hieu_qua` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hop_dongs`
--

INSERT INTO `hop_dongs` (`id`, `nhansu_id`, `ma_hd`, `ten`, `loaihopdong_id`, `ngay_ky`, `ngay_co_hieu_luc`, `ngay_het_hieu_luc`, `luong_can_ban`, `luong_tro_cap`, `luong_hieu_qua`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 1, 'TP0001/2018/HĐTV-TP', 'Hợp đồng thử việc', 1, '2018-06-11 00:00:00', '2018-06-11 00:00:00', '2018-08-10 00:00:00', '3.800.000', '20.000.000', '30.000.000', 0, NULL, NULL),
(2, 1, 'TP0001/2018/HĐLĐ-TP', 'Hợp đồng lao động', 2, '2018-08-11 00:00:00', '2018-08-11 00:00:00', '2019-08-10 00:00:00', '3.800.000', '40.000.000', '50.000.000', 1, NULL, NULL),
(3, 2, 'TP0002/2018/HĐTV-TP', 'Hợp đồng thử việc', 1, '2017-05-20 00:00:00', '2017-05-20 00:00:00', '2017-07-19 00:00:00', '3.800.000', '6.000.000', '7.150.000', 0, NULL, NULL),
(4, 2, 'TP0002/2018/HĐLĐ-TP', 'Hợp đồng lao động', 2, '2017-07-20 00:00:00', '2017-07-20 00:00:00', '2018-07-19 00:00:00', '3.800.000', '5.000.000', '3.200.000', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ho_sos`
--

CREATE TABLE `ho_sos` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(9, 'Chứng chỉ', NULL, NULL),
(10, 'Hộ khẩu', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_hop_dongs`
--

CREATE TABLE `loai_hop_dongs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_hop_dongs`
--

INSERT INTO `loai_hop_dongs` (`id`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'Thử việc', NULL, NULL),
(2, 'Xác định thời hạn', NULL, NULL),
(3, 'Không xác định thời hạn', NULL, NULL),
(4, 'Đào tạo nghề', NULL, NULL);

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
(293, '2014_10_12_000000_create_users_table', 1),
(294, '2014_10_12_100000_create_password_resets_table', 1),
(295, '2018_08_30_075551_create_phong_bans_table', 1),
(296, '2018_08_30_075711_create_bo_phans_table', 1),
(297, '2018_08_30_084129_create_nhan_sus_table', 1),
(298, '2018_08_30_162233_create_ho_sos_table', 1),
(299, '2018_09_05_142047_create_hop_dongs_table', 1),
(300, '2018_09_05_143038_create_loai_hop_dongs_table', 1),
(301, '2018_09_19_093224_laratrust_setup_tables', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_sus`
--

CREATE TABLE `nhan_sus` (
  `id` int(10) UNSIGNED NOT NULL,
  `ma_nv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL DEFAULT '1',
  `ngay_sinh` datetime NOT NULL,
  `so_cmnd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_cap_cmnd` datetime DEFAULT NULL,
  `noi_cap_cmnd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_chi_thuong_tru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi_lien_he` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dien_thoai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trinh_do` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `truong_tot_nghiep` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nam_tot_nghiep` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_bat_dau_lam` datetime DEFAULT NULL,
  `ngay_lam_viec_cuoi` datetime DEFAULT NULL,
  `chuc_danh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `nhan_sus` (`id`, `ma_nv`, `ho_ten`, `gioi_tinh`, `ngay_sinh`, `so_cmnd`, `ngay_cap_cmnd`, `noi_cap_cmnd`, `dia_chi_thuong_tru`, `dia_chi_lien_he`, `dien_thoai`, `email`, `trinh_do`, `truong_tot_nghiep`, `nam_tot_nghiep`, `ngay_bat_dau_lam`, `ngay_lam_viec_cuoi`, `chuc_danh`, `phongban_id`, `bophan_id`, `chung_chi`, `hoso_id`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'TP0001', 'Phạm Đức Chí Thiện', 1, '1991-05-17 00:00:00', '225477220', '2008-03-22 00:00:00', 'CA. Khánh Hòa', '5 An Dương Vương, P.Phước Tân, Nha Trang, Khánh Hòa', '5 An Dương Vương, P.Phước Tân, Nha Trang, Khánh Hòa', '0905160320', 'chithien175@gmail.com', 'Cao đẳng', 'CĐ sư phạm Nha Trang', '2015', '2018-06-11 00:00:00', NULL, 'Nhân viên', 1, 2, NULL, '1,3,4,5,8,10', 1, NULL, NULL),
(2, 'TP0002', 'Nguyễn Văn A', 1, '1993-07-20 00:00:00', '225477222', '2010-07-03 00:00:00', 'CA. Phú Yên', '01 Trần Phú, Lộc Thọ, Nha Trang, Khánh Hòa', '01 Trần Phú, Lộc Thọ, Nha Trang, Khánh Hòa', '0905123321', 'nguyenvana@gmail.com', 'Đại học', 'ĐH Nha Trang', '2014', '2017-05-20 00:00:00', NULL, 'Trưởng Phòng', 1, 3, NULL, '1,2,3,4,5,6,7,8,9', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'read-dashboard', 'Read Dashboard', 'Read Dashboard', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(2, 'create-users', 'Create Users', 'Create Users', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(3, 'read-users', 'Read Users', 'Read Users', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(4, 'update-users', 'Update Users', 'Update Users', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(5, 'delete-users', 'Delete Users', 'Delete Users', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(6, 'create-acl', 'Create Acl', 'Create Acl', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(7, 'read-acl', 'Read Acl', 'Read Acl', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(8, 'update-acl', 'Update Acl', 'Update Acl', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(9, 'delete-acl', 'Delete Acl', 'Delete Acl', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(10, 'read-profile', 'Read Profile', 'Read Profile', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(11, 'update-profile', 'Update Profile', 'Update Profile', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(12, 'create-nhan-su', 'Create Nhan-su', 'Create Nhan-su', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(13, 'read-nhan-su', 'Read Nhan-su', 'Read Nhan-su', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(14, 'update-nhan-su', 'Update Nhan-su', 'Update Nhan-su', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(15, 'delete-nhan-su', 'Delete Nhan-su', 'Delete Nhan-su', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(16, 'create-hop-dong', 'Create Hop-dong', 'Create Hop-dong', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(17, 'read-hop-dong', 'Read Hop-dong', 'Read Hop-dong', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(18, 'update-hop-dong', 'Update Hop-dong', 'Update Hop-dong', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(19, 'delete-hop-dong', 'Delete Hop-dong', 'Delete Hop-dong', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(20, 'update-company', 'Update Company', 'Update Company', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(21, 'update-file-manager', 'Update File-manager', 'Update File-manager', '2018-09-20 07:27:40', '2018-09-20 07:27:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(1, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(1, 3),
(10, 3),
(11, 3),
(13, 3),
(17, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_bans`
--

CREATE TABLE `phong_bans` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong_bans`
--

INSERT INTO `phong_bans` (`id`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'Kỹ Thuật', NULL, NULL),
(2, 'Dự Án', NULL, NULL),
(3, 'Tài Chính - Kế Toán', NULL, NULL),
(4, 'Hành Chính - Nhân Sự', NULL, NULL),
(5, 'Kinh Doanh', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadministrator', 'Superadministrator', 'Superadministrator', '2018-09-20 07:27:40', '2018-09-20 07:27:40'),
(2, 'administrator', 'Administrator', 'Administrator', '2018-09-20 07:27:41', '2018-09-20 07:27:41'),
(3, 'user', 'User', 'User', '2018-09-20 07:27:42', '2018-09-20 07:27:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(3, 3, 'App\\User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-avatar.jpg',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadministrator', 'superadministrator@app.com', '$2y$10$nUNxOxhi3cE3KT1fSC6lWeweGjXXZmc5AvJVtwIEpWqCkzWL2t1GG', 'default-avatar.jpg', 1, NULL, '2018-09-20 07:27:41', '2018-09-20 07:27:41'),
(2, 'Administrator', 'administrator@app.com', '$2y$10$AQKakC2D73rkQ7I.bu2x0uY/khhb82Sk0wJIc5Lmtt1OjPVYttYYy', 'default-avatar.jpg', 1, NULL, '2018-09-20 07:27:42', '2018-09-20 07:27:42'),
(3, 'User', 'user@app.com', '$2y$10$MRaqtippu88k0PuSgOWGNespqTMYjr2Ryh.Rwj00Eb3QZSZH0gTea', 'default-avatar.jpg', 1, NULL, '2018-09-20 07:27:42', '2018-09-20 07:27:42');

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
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Chỉ mục cho bảng `phong_bans`
--
ALTER TABLE `phong_bans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ho_sos`
--
ALTER TABLE `ho_sos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `loai_hop_dongs`
--
ALTER TABLE `loai_hop_dongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT cho bảng `nhan_sus`
--
ALTER TABLE `nhan_sus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `phong_bans`
--
ALTER TABLE `phong_bans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
