-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 02, 2023 lúc 06:16 PM
-- Phiên bản máy phục vụ: 10.3.39-MariaDB-cll-lve
-- Phiên bản PHP: 8.1.16
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Cơ sở dữ liệu: `accrecom_cs`
--
-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `accounts`
--
CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `groups` varchar(255) DEFAULT NULL,
  `account` text DEFAULT NULL,
  `chitiet` text DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `listimg` longtext DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `bank`
--
CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `stk` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `bank_name` text DEFAULT NULL,
  `chi_nhanh` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `ghichu` text DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `bank_auto`
--
CREATE TABLE `bank_auto` (
  `id` int(11) NOT NULL,
  `tid` varchar(64) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `amount` int(11) DEFAULT 0,
  `cusum_balance` int(11) DEFAULT 0,
  `time` datetime DEFAULT NULL,
  `bank_sub_acc_id` varchar(64) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `deletedate` varchar(255) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `cards`
--
CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `code` varchar(32) DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `loaithe` varchar(32) NOT NULL,
  `menhgia` int(11) NOT NULL,
  `thucnhan` int(11) DEFAULT 0,
  `seri` mediumtext NOT NULL,
  `pin` mediumtext NOT NULL,
  `createdate` datetime NOT NULL,
  `status` varchar(32) NOT NULL,
  `note` mediumtext NOT NULL,
  `deletedate` varchar(255) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `cards`
--
INSERT INTO
  `cards` (
    `id`,
    `code`,
    `username`,
    `loaithe`,
    `menhgia`,
    `thucnhan`,
    `seri`,
    `pin`,
    `createdate`,
    `status`,
    `note`,
    `deletedate`
  )
VALUES
  (
    1,
    '777903336',
    'admin',
    'VIETTEL',
    50000,
    0,
    '10002626263636',
    '281615151515199',
    '2023-11-24 20:09:05',
    'thatbai',
    '',
    NULL
  ),
  (
    2,
    '302289172',
    'admin',
    'VIETTEL',
    50000,
    0,
    '10002626263639',
    '281615151515198',
    '2023-12-02 18:07:41',
    'thatbai',
    '',
    NULL
  );

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `category`
--
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `category`
--
INSERT INTO
  `category` (`id`, `title`, `display`, `img`)
VALUES
  (
    8,
    'Free Fire',
    'SHOW',
    'https://i.imgur.com/kleCz0K.gif'
  ),
  (
    9,
    'Liên Quân Mobile',
    'SHOW',
    'https://i.imgur.com/zUiIRUp.gif'
  ),
  (
    10,
    'Acc FiFa',
    'SHOW',
    'https://i.imgur.com/dAt4la8.gif'
  ),
  (
    11,
    'Roblox',
    'SHOW',
    'https://i.imgur.com/Xzpue6S.gif'
  ),
  (
    12,
    'PUBG',
    'SHOW',
    'https://i.imgur.com/wx8vOqk.gif'
  ),
  (
    13,
    'LMTC',
    'SHOW',
    'https://i.imgur.com/tvWNLVy.gif'
  ),
  (
    14,
    'Zingspeed Mobile',
    'SHOW',
    'https://i.imgur.com/WyYBL2k.gif'
  ),
  (
    15,
    'DLS',
    'SHOW',
    'https://i.imgur.com/4qooeyk.gif'
  );

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `category_caythue`
--
CREATE TABLE `category_caythue` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `luuy` longtext DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `category_caythue`
--
INSERT INTO
  `category_caythue` (`id`, `title`, `display`, `img`, `luuy`)
VALUES
  (
    53,
    'Cày Thuê Liên Quân',
    'SHOW',
    '/assets/storage/images/category_VNABYOPR146H.png',
    ''
  ),
  (
    54,
    'Cày Thuê FiFa',
    'SHOW',
    '/assets/storage/images/category_540RQIAOC2UT.png',
    ''
  ),
  (
    56,
    'Cày thuê Ngọc Rồng',
    'SHOW',
    '/assets/storage/images/category_QXDNS2JMGK05.png',
    ''
  ),
  (
    57,
    'Cày Thuê Blox Fruits',
    'SHOW',
    '/assets/storage/images/category_O7JYHET0CV91.png',
    ''
  );

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `dongtien`
--
CREATE TABLE `dongtien` (
  `id` int(11) NOT NULL,
  `sotientruoc` int(11) DEFAULT NULL,
  `sotienthaydoi` int(11) DEFAULT NULL,
  `sotiensau` int(11) DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `dongtien`
--
INSERT INTO
  `dongtien` (
    `id`,
    `sotientruoc`,
    `sotienthaydoi`,
    `sotiensau`,
    `thoigian`,
    `noidung`,
    `username`
  )
VALUES
  (
    161,
    0,
    1000000,
    1000000,
    '2023-09-07 07:09:58',
    'Admin cộng tiền (gg)',
    'admin'
  ),
  (
    162,
    1029000,
    29000,
    1000000,
    '2023-09-07 07:10:26',
    'Thực hiện (VÒNG QUAY MP40 MÃNG XÀ)',
    'admin'
  ),
  (
    163,
    1000000,
    29000,
    971000,
    '2023-09-07 07:10:35',
    'Thực hiện (VÒNG QUAY MP40 MÃNG XÀ)',
    'admin'
  ),
  (
    164,
    962000,
    20000,
    942000,
    '2023-09-07 07:42:12',
    'Thực hiện (Vòng Quay M4A1 Hoả Ngục)',
    'admin'
  ),
  (
    165,
    942000,
    20000,
    922000,
    '2023-09-07 07:42:19',
    'Thực hiện (Vòng Quay M4A1 Hoả Ngục)',
    'admin'
  ),
  (
    166,
    922000,
    20000,
    902000,
    '2023-09-07 07:42:19',
    'Thực hiện (Vòng Quay M4A1 Hoả Ngục)',
    'admin'
  ),
  (
    167,
    882000,
    111111,
    993111,
    '2023-09-07 07:43:33',
    'Admin cộng tiền ()',
    'admin'
  ),
  (
    168,
    1003110,
    9999,
    993111,
    '2023-11-26 09:30:32',
    'Thực hiện (VÒNG QUAY THIÊN THẦN BẠCH KIM)',
    'admin'
  ),
  (
    169,
    993111,
    9999,
    983112,
    '2023-11-26 09:30:39',
    'Thực hiện (VÒNG QUAY THIÊN THẦN BẠCH KIM)',
    'admin'
  ),
  (
    170,
    1002113,
    29000,
    973113,
    '2023-11-26 09:30:54',
    'Thực hiện (VÒNG QUAY MP40 MÃNG XÀ)',
    'admin'
  ),
  (
    171,
    973113,
    29000,
    944113,
    '2023-11-26 09:31:03',
    'Thực hiện (VÒNG QUAY MP40 MÃNG XÀ)',
    'admin'
  );

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `groups`
--
CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `chitiet` longtext DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `groups_caythue`
--
CREATE TABLE `groups_caythue` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  `money` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `mini_game`
--
CREATE TABLE `mini_game` (
  `id` int(11) NOT NULL,
  `name` varchar(999) DEFAULT NULL,
  `price` varchar(999) DEFAULT '0',
  `sudung` varchar(999) DEFAULT '0',
  `thumb` varchar(999) DEFAULT '0',
  `image` varchar(999) DEFAULT '0',
  `status` varchar(255) DEFAULT 'true',
  `time` int(255) DEFAULT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mini_game`
--
INSERT INTO
  `mini_game` (
    `id`,
    `name`,
    `price`,
    `sudung`,
    `thumb`,
    `image`,
    `status`,
    `time`
  )
VALUES
  (
    8,
    'VÒNG QUAY THIÊN THẦN BẠCH KIM',
    '9999',
    '24',
    'https://i.imgur.com/NJva0Qm.gif',
    'https://i.imgur.com/8s1jtRs.png',
    'true',
    1691588660
  ),
  (
    6,
    'Vòng Quay M4A1 Hoả Ngục',
    '20000',
    '48',
    'https://i.imgur.com/3vtMWcj.gif',
    'https://i.imgur.com/iFYvvQO.png',
    'true',
    1691474994
  ),
  (
    7,
    'VÒNG QUAY MP40 MÃNG XÀ',
    '29000',
    '8',
    'https://i.imgur.com/NjxnKc1.gif',
    'https://i.imgur.com/BovtqyP.png',
    'true',
    1691586184
  ),
  (
    9,
    'VÒNG QUAY BÃI BIỂN',
    '20000',
    '0',
    'https://i.imgur.com/sl3Q7OT.gif',
    'https://i.imgur.com/EzAf3ZJ.png',
    'true',
    1691589808
  );

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `mini_game_gift`
--
CREATE TABLE `mini_game_gift` (
  `id` int(11) NOT NULL,
  `id_vongquay` int(255) NOT NULL,
  `item_1` varchar(999) NOT NULL,
  `item_2` varchar(999) NOT NULL,
  `item_3` varchar(999) NOT NULL,
  `item_4` varchar(999) NOT NULL,
  `item_5` varchar(999) NOT NULL,
  `item_6` varchar(999) NOT NULL,
  `item_7` varchar(999) NOT NULL,
  `item_8` varchar(999) NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mini_game_gift`
--
INSERT INTO
  `mini_game_gift` (
    `id`,
    `id_vongquay`,
    `item_1`,
    `item_2`,
    `item_3`,
    `item_4`,
    `item_5`,
    `item_6`,
    `item_7`,
    `item_8`
  )
VALUES
  (
    1,
    5,
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG RANDOM KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"25\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 110 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"110\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 688 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"688\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 3000 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"3000\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 5000 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"5000\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 7000 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"7000\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 9999 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"9999\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 6666 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"6666\",\"tyle\":\"100\"}'
  ),
  (
    2,
    6,
    '{\"text\":\"Ch\\u00fac m\\u1eebng b\\u1ea1n \\u0111\\u00e3 quay tr\\u00fang random kim c\\u01b0\\u01a1ng\",\"kimcuong\":\"10\",\"tyle\":\"100\"}',
    '{\"text\":\"Ch\\u00fac m\\u1eebng b\\u1ea1n \\u0111\\u00e3 quay tr\\u00fang 100 kim c\\u01b0\\u01a1ng\",\"kimcuong\":\"100\",\"tyle\":\"100\"}',
    '{\"text\":\"Ch\\u00fac m\\u1eebng b\\u1ea1n \\u0111\\u00e3 quay tr\\u00fang 500 kim c\\u01b0\\u01a1ng\",\"kimcuong\":\"500\",\"tyle\":\"100\"}',
    '{\"text\":\"Ch\\u00fac m\\u1eebng b\\u1ea1n \\u0111\\u00e3 quay tr\\u00fang 1500 kim c\\u01b0\\u01a1ng\",\"kimcuong\":\"1500\",\"tyle\":\"100\"}',
    '{\"text\":\"Ch\\u00fac m\\u1eebng b\\u1ea1n \\u0111\\u00e3 quay tr\\u00fang 2500 kim c\\u01b0\\u01a1ng\",\"kimcuong\":\"2500\",\"tyle\":\"100\"}',
    '{\"text\":\"Ch\\u00fac m\\u1eebng b\\u1ea1n \\u0111\\u00e3 quay tr\\u00fang 4500 kim c\\u01b0\\u01a1ng\",\"kimcuong\":\"4500\",\"tyle\":\"100\"}',
    '{\"text\":\"Ch\\u00fac m\\u1eebng b\\u1ea1n \\u0111\\u00e3 quay tr\\u00fang 6500 kim c\\u01b0\\u01a1ng\",\"kimcuong\":\"6500\",\"tyle\":\"100\"}',
    '{\"text\":\"Ch\\u00fac m\\u1eebng b\\u1ea1n \\u0111\\u00e3 quay tr\\u00fang 12999 kim c\\u01b0\\u01a1ng\",\"kimcuong\":\"12999\",\"tyle\":\"100\"}'
  ),
  (
    3,
    7,
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG RANDOM KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"10\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 99 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"99\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 368 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"368\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 688 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"688\",\"tyle\":\"99\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 1000 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"1000\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 1500 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"1500\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 1800 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"1800\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 2999 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"2999\",\"tyle\":\"100\"}'
  ),
  (
    4,
    8,
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG RANDOM KIM C\",\"kimcuong\":\"20\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 99 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"99\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 368 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"368\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 688 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"688\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 1000 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"1000\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 1500 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"1500\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 1800 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"1800\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 2999 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"2999\",\"tyle\":\"100\"}'
  ),
  (
    5,
    9,
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG RANDOM KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"25\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 110 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"110\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 688 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"688\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 3000 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"3000\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 5000 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"5000\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 7000 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"7000\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 9999 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"9999\",\"tyle\":\"100\"}',
    '{\"text\":\"CH\\u00daC M\\u1eeaNG B\\u1ea0N \\u0110\\u00c3 QUAY TR\\u00daNG 6666 KIM C\\u01af\\u01a0NG\",\"kimcuong\":\"6666\",\"tyle\":\"100\"}'
  );

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `momo`
--
CREATE TABLE `momo` (
  `id` int(11) NOT NULL,
  `request_id` varchar(64) DEFAULT NULL,
  `tranId` text DEFAULT NULL,
  `partnerId` text DEFAULT NULL,
  `partnerName` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `status` varchar(32) DEFAULT 'xuly',
  `deletedate` varchar(255) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `options`
--
CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` longtext DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `options`
--
INSERT INTO
  `options` (`id`, `name`, `value`)
VALUES
  (1, 'tenweb', 'shopnick'),
  (
    2,
    'mota',
    'Website bán acc game tự động giá rẻ uy tín chất lượng'
  ),
  (3, 'tukhoa', ''),
  (4, 'logo', 'https://i.imgur.com/trVPGza.png'),
  (5, 'email', ''),
  (6, 'pass_email', ''),
  (11, 'noidung_naptien', 'naptien '),
  (
    12,
    'thongbao',
    '<div style=\"text-align: center;\"><u style=\"font-size: 1rem; font-weight: bolder; background-color: rgb(255, 255, 0);\"><font color=\"#ff00ff\">**SHOP  KHAI TRƯƠNG**--Bạn nạp qua phương thức Ví Momo sẽ được hưởng lợi sau: </font></u><br></div><div style=\"text-align: center;\"><p class=\"MsoNormal\" style=\"line-height: normal;\"><span times=\"\" new=\"\" roman\";=\"\" background-color:=\"\" rgb(255,=\"\" 0,=\"\" 255);\"=\"\" style=\"background-color: rgb(255, 255, 0);\"><span style=\"font-weight: bolder;\"><u><font color=\"#ff00ff\">+20% giá trị trong shop </font></u></span></span></p><p class=\"MsoNormal\" style=\"line-height: normal;\"><span times=\"\" new=\"\" roman\";=\"\" background-color:=\"\" rgb(255,=\"\" 0,=\"\" 255);\"=\"\" style=\"background-color: rgb(255, 255, 0);\"><span style=\"font-weight: bolder;\"><u><font color=\"#ff00ff\">Top 0 : 50k</font></u></span></span></p><p class=\"MsoNormal\" style=\"line-height: normal;\"><font color=\"#ff00ff\"><span style=\"background-color: rgb(255, 255, 0);\"><b><u>Top 1 : 40k</u></b></span></font></p><p class=\"MsoNormal\" style=\"line-height: normal;\"><font color=\"#ff00ff\"><span style=\"background-color: rgb(255, 255, 0);\"><b><u>Top 3 : 30k</u></b></span></font></p><p class=\"MsoNormal\" style=\"line-height: normal;\"><span times=\"\" new=\"\" roman\";=\"\" background-color:=\"\" rgb(255,=\"\" 0,=\"\" 255);\"=\"\"><span style=\"font-weight: bolder;\"><u><span style=\"background-color: rgb(255, 156, 0);\">*</span><span style=\"color: rgb(255, 255, 255); background-color: rgb(255, 156, 0);\">*lưu ý: khi nạp qua hình thức Ví Momo  cần chuyển đúng stk, phần nội dung chuyển khoản khi chuyển là TÊN TÀI KHOẢN SHOP của bạn.  Các giá trị nạp chỉ nhận: 10k,20k,50k,100k,200k,500k,1000k( tiền sẽ được cộng vào sau 5p-1 tiếng vì đây không phải auto mà chính admin chuyển tiền cho bạn nên vui lòng kiên nhẫn.)</span></u></span></span></p><p class=\"MsoNormal\" style=\"line-height: normal;\"><span times=\"\" new=\"\" roman\";=\"\" background-color:=\"\" rgb(255,=\"\" 0,=\"\" 255);\"=\"\" style=\"background-color: rgb(255, 0, 255);\"><span style=\"font-weight: bolder;\"><u><font color=\"#00ff00\">Nạp Card Duyệt Nhanh 5-10 giây</font></u></span></span></p><p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"background-color: rgb(255, 0, 0);\"><span times=\"\" new=\"\" roman\";=\"\" background-color:=\"\" rgb(255,=\"\" 0,=\"\" 255);\"=\"\"><span style=\"font-weight: bolder;\"><font color=\"#ffffff\"><u>﻿</u></font></span></span></span></p></div>'
  ),
  (13, 'anhbia', 'https://i.imgur.com/IYx0ShM.png'),
  (14, 'favicon', 'https://i.imgur.com/IYx0ShM.png'),
  (17, 'baotri', 'ON'),
  (
    18,
    'chinhsach',
    '<p>BẰNG VIỆC SỬ DỤNG C&Aacute;C DỊCH VỤ HOẶC MỞ MỘT T&Agrave;I KHOẢN, BẠN CHO BIẾT RẰNG BẠN CHẤP NHẬN, KH&Ocirc;NG R&Uacute;T LẠI, C&Aacute;C ĐIỀU KHOẢN DỊCH VỤ N&Agrave;Y. NẾU BẠN KH&Ocirc;NG ĐỒNG &Yacute; VỚI C&Aacute;C ĐIỀU KHOẢN N&Agrave;Y, VUI L&Ograve;NG KH&Ocirc;NG SỬ DỤNG C&Aacute;C DỊCH VỤ CỦA CH&Uacute;NG T&Ocirc;I HAY TRUY CẬP TRANG WEB. NẾU BẠN DƯỚI 18 TUỔI HOẶC &quot;ĐỘ TUỔI TRƯỞNG TH&Agrave;NH&quot;PH&Ugrave; HỢP Ở NƠI BẠN SỐNG, BẠN PHẢI XIN PH&Eacute;P CHA MẸ HOẶC NGƯỜI GI&Aacute;M HỘ HỢP PH&Aacute;P ĐỂ MỞ MỘT T&Agrave;I KHOẢN V&Agrave; CHA MẸ HOẶC NGƯỜI GI&Aacute;M HỘ HỢP PH&Aacute;P PHẢI ĐỒNG &Yacute; VỚI C&Aacute;C ĐIỀU KHOẢN DỊCH VỤ N&Agrave;Y. NẾU BẠN KH&Ocirc;NG BIẾT BẠN C&Oacute; THUỘC &quot;ĐỘ TUỔI TRƯỞNG TH&Agrave;NH&quot; Ở NƠI BẠN SỐNG HAY KH&Ocirc;NG, HOẶC KH&Ocirc;NG HIỂU PHẦN N&Agrave;Y, VUI L&Ograve;NG KH&Ocirc;NG TẠO T&Agrave;I KHOẢN CHO ĐẾN KHI BẠN Đ&Atilde; NHỜ CHA MẸ HOẶC NGƯỜI GI&Aacute;M HỘ HỢP PH&Aacute;P CỦA BẠN GI&Uacute;P ĐỠ. NẾU BẠN L&Agrave; CHA MẸ HOẶC NGƯỜI GI&Aacute;M HỘ HỢP PH&Aacute;P CỦA MỘT TRẺ VỊ TH&Agrave;NH NI&Ecirc;N MUỐN TẠO MỘT T&Agrave;I KHOẢN, BẠN PHẢI CHẤP NHẬN C&Aacute;C ĐIỀU KHOẢN DỊCH VỤ N&Agrave;Y THAY MẶT CHO TRẺ VỊ TH&Agrave;NH NI&Ecirc;N Đ&Oacute; V&Agrave; BẠN SẼ CHỊU TR&Aacute;CH NHIỆM ĐỐI VỚI TẤT CẢ HOẠT ĐỘNG SỬ DỤNG T&Agrave;I KHOẢN HAY C&Aacute;C DỊCH VỤ, BAO GỒM C&Aacute;C GIAO DỊCH MUA H&Agrave;NG DO TRẺ VỊ TH&Agrave;NH NI&Ecirc;N THỰC HIỆN, CHO D&Ugrave; T&Agrave;I KHOẢN CỦA TRẺ VỊ TH&Agrave;NH NI&Ecirc;N Đ&Oacute; ĐƯỢC MỞ V&Agrave;O L&Uacute;C N&Agrave;Y HAY ĐƯỢC TẠO SAU N&Agrave;Y V&Agrave; CHO D&Ugrave; TRẺ VỊ TH&Agrave;NH NI&Ecirc;N C&Oacute; ĐƯỢC BẠN GI&Aacute;M S&Aacute;T TRONG GIAO DỊCH MUA H&Agrave;NG Đ&Oacute; HAY KH&Ocirc;NG.</p>\r\n'
  ),
  (27, 'min_ruttien', '100000'),
  (28, 'ck_con', '3'),
  (29, 'phi_chuyentien', '500'),
  (30, 'status_chuyentien', 'ON'),
  (31, 'hotline', ''),
  (32, 'facebook', ''),
  (33, 'theme_color', '#01578B'),
  (34, 'modal_thongbao', ''),
  (42, 'api_bank', ''),
  (43, 'status_napbank', 'OFF'),
  (44, 'status_demo', 'OFF'),
  (
    45,
    'api_card',
    'CDEGexRWklBVPfmjQTXMFSZHgqzNhJcdwpKIYobnratvLyAsiUOu'
  ),
  (
    46,
    'luuy_naptien',
    '<ul style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; border: 0px; list-style-position: inside; color: rgb(51, 51, 51); font-family: roboto, Arial, Tahoma, sans-serif, arial, Helvetica; font-size: 14px;\"><li style=\"padding: 0px; margin: 0px; outline: 0px; border: 0px;\">Hệ thống xử lý 5s 1 thẻ.</li><li style=\"padding: 0px; margin: 0px; outline: 0px; border: 0px;\">Vui lòng gửi đúng mệnh giá, sai mệnh giá thực nhận mệnh giá bé nhất.</li><li style=\"padding: 0px; margin: 0px; outline: 0px; border: 0px;\">Ví dụ mệnh giá thực là 100k, quý khách nạp 100k thực nhận 100k.</li></ul><p style=\"padding: 0px; margin: 0px; outline: 0px; border: 0px;\">Ví dụ mệnh giá thực là 100k quý khách nạp 50k thực nhận 45k.</p>'
  ),
  (47, 'id_video_youtube', 'co2q_hGNIXo'),
  (48, 'ck_bank', '0'),
  (
    49,
    'luuy_napbank',
    '<p>STK MOMO :&nbsp;</p><p>CHỦ TÀI KHOẢN :&nbsp;</p><p>STK MBBANK:&nbsp;</p><p>CHỦ TÀI KHOẢN :&nbsp;</p><p><font color=\"#e64d4d\"><span style=\"caret-color: rgb(230, 77, 77);\"><span style=\"font-weight: bolder;\">NẠP QUA Ví MoMo VÀ MBbank ĐƯỢC CỘNG THÊM 20%</span></span></font></p><p><font color=\"#e64d4d\"><span style=\"caret-color: rgb(230, 77, 77);\"><span style=\"font-weight: bolder;\">VÍ DỤ BẠN NẠP 100K QUA BANK THÌ SẼ CÓ 120K TRONG WEB</span></span></font></p><p><font color=\"#e64d4d\"><span style=\"caret-color: rgb(230, 77, 77);\"><span style=\"font-weight: bolder;\">200K QUA BANK THÌ CÓ 240K TRONG WEB</span></span></font></p><p><br></p>'
  ),
  (50, 'check_time_cron', '1670307002'),
  (51, 'api_momo', ''),
  (52, 'stk_bank', ''),
  (53, 'mk_bank', ''),
  (54, 'check_time_cron_bank', '1650418673'),
  (55, 'html_footer', ''),
  (56, 'text_left_footer', 'Ahi hi free'),
  (57, 'text_center_footer', ''),
  (58, 'email_admin', ''),
  (59, 'button_buy', '1'),
  (60, 'block_f12', 'ON'),
  (
    61,
    'license_key',
    '4a866766abc63ffdf5b30e6d4ce07a'
  ),
  (62, 'btnSaveLicense', ''),
  (63, 'ck_card', '0'),
  (
    64,
    'logo_dark',
    'assets/storage/theme/logo_dark4D9.png'
  ),
  (
    65,
    'background',
    'assets/storage/theme/backgroundZM2.png'
  ),
  (66, 'Partner_ID', ''),
  (67, 'Partner_Key', ''),
  (68, 'youtube', ''),
  (69, 'discord', '');

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `orders_caythue`
--
CREATE TABLE `orders_caythue` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `dichvu` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `money` int(11) NOT NULL,
  `tk` varchar(255) NOT NULL,
  `mk` varchar(255) NOT NULL,
  `createdate` datetime NOT NULL,
  `updatedate` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `ghichu` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `orders_withdraw`
--
CREATE TABLE `orders_withdraw` (
  `id` int(11) NOT NULL,
  `username` varchar(999) NOT NULL,
  `id_game` int(255) NOT NULL,
  `action` int(255) NOT NULL,
  `status` varchar(99) NOT NULL,
  `time` int(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_withdraw`
--
INSERT INTO
  `orders_withdraw` (
    `id`,
    `username`,
    `id_game`,
    `action`,
    `status`,
    `time`
  )
VALUES
  (4, 'admin', 232323233, 100, 'huy', 1694070647),
  (
    5,
    'admin',
    2147483647,
    200,
    'hoantat',
    1694072568
  );

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `users`
--
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `money` int(11) NOT NULL DEFAULT 0,
  `item` bigint(20) DEFAULT 0,
  `level` varchar(255) DEFAULT NULL,
  `banned` int(11) NOT NULL DEFAULT 0,
  `createdate` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ref` varchar(255) DEFAULT NULL,
  `daily` int(11) DEFAULT 0,
  `otp` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `chietkhau` float DEFAULT 0,
  `time` varchar(255) DEFAULT NULL,
  `chitieu` int(11) NOT NULL DEFAULT 0,
  `total_money` int(11) NOT NULL DEFAULT 0,
  `ctv` int(11) DEFAULT 0,
  `ctvacc` int(11) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `users`
--
INSERT INTO
  `users` (
    `id`,
    `username`,
    `password`,
    `token`,
    `money`,
    `item`,
    `level`,
    `banned`,
    `createdate`,
    `email`,
    `ref`,
    `daily`,
    `otp`,
    `ip`,
    `chietkhau`,
    `time`,
    `chitieu`,
    `total_money`,
    `ctv`,
    `ctvacc`
  )
VALUES
  (
    8,
    'admin',
    '21232f297a57a5a743894a0e4a801fc3',
    'QRXbxEUnMjAlZvzqTDNampIyidCOkfYoFrgPWsGhVBwJLuHceKSt',
    915113,
    17804,
    'admin',
    0,
    '2023-08-14 12:32:33',
    '',
    NULL,
    0,
    '',
    '14.254.126.39',
    0,
    '1692016353',
    0,
    0,
    0,
    0
  );

--
-- Chỉ mục cho các bảng đã đổ
--
--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE
  `accounts`
ADD
  PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `bank`
--
ALTER TABLE
  `bank`
ADD
  PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `bank_auto`
--
ALTER TABLE
  `bank_auto`
ADD
  PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `cards`
--
ALTER TABLE
  `cards`
ADD
  PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE
  `category`
ADD
  PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `category_caythue`
--
ALTER TABLE
  `category_caythue`
ADD
  PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `dongtien`
--
ALTER TABLE
  `dongtien`
ADD
  PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE
  `groups`
ADD
  PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `groups_caythue`
--
ALTER TABLE
  `groups_caythue`
ADD
  PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `mini_game`
--
ALTER TABLE
  `mini_game`
ADD
  PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mini_game_gift`
--
ALTER TABLE
  `mini_game_gift`
ADD
  PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `momo`
--
ALTER TABLE
  `momo`
ADD
  PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE
  `options`
ADD
  PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `orders_caythue`
--
ALTER TABLE
  `orders_caythue`
ADD
  PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `orders_withdraw`
--
ALTER TABLE
  `orders_withdraw`
ADD
  PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--
--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE
  `accounts`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bank`
--
ALTER TABLE
  `bank`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT cho bảng `bank_auto`
--
ALTER TABLE
  `bank_auto`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cards`
--
ALTER TABLE
  `cards`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE
  `category`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 16;

--
-- AUTO_INCREMENT cho bảng `category_caythue`
--
ALTER TABLE
  `category_caythue`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 58;

--
-- AUTO_INCREMENT cho bảng `dongtien`
--
ALTER TABLE
  `dongtien`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 172;

--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE
  `groups`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 28;

--
-- AUTO_INCREMENT cho bảng `groups_caythue`
--
ALTER TABLE
  `groups_caythue`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 594;

--
-- AUTO_INCREMENT cho bảng `mini_game`
--
ALTER TABLE
  `mini_game`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 10;

--
-- AUTO_INCREMENT cho bảng `mini_game_gift`
--
ALTER TABLE
  `mini_game_gift`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT cho bảng `momo`
--
ALTER TABLE
  `momo`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE
  `options`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 70;

--
-- AUTO_INCREMENT cho bảng `orders_caythue`
--
ALTER TABLE
  `orders_caythue`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT cho bảng `orders_withdraw`
--
ALTER TABLE
  `orders_withdraw`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE
  `users`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 9;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;