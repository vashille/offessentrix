-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 07:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitcoin_order`
--

CREATE TABLE `bitcoin_order` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `variant_name` varchar(255) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `bitcoin_addr` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  `paid_status` int(2) NOT NULL,
  `gencode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `code` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `sessionId` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `code`, `address`, `total_price`, `status`, `sessionId`) VALUES
(77, 'Y0vVRdnM7NyeKzF84PvTQHsLO', 'bc1qn6hcgjmj9a40595ynakh0nn0v5h748un956nr5', 550, 2, '40ncdem4m639dddbvd6mehu42n'),
(78, '05KaSr4VFjWwdTX8Nfr70Z7Mq', 'bc1q3zxjup9a64c4r8v7kdy7qapnlxy8dpfuxc8epa', 715, -1, '40ncdem4m639dddbvd6mehu42n');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `txid` varchar(256) NOT NULL,
  `addr` varchar(256) NOT NULL,
  `total_price_value` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `txid`, `addr`, `total_price_value`, `status`) VALUES
(41, 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'bc1qaw892mnk7hnw02a2nk4h5v37rxv4ju098frvyk', 15801, 2),
(42, 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'bc1qm3qnz7hhrldmhl6mct33n8lj7g86k7celm03xf', 15782, 2),
(43, 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'bc1qk4q4w92ngdfu9q2tp6vxsqksts2hy0p6wj7udw', 15797, 2),
(44, 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'bc1qa2vjvpdkdf2hwz20l8yr32xlfn96qytkl9udp4', 15797, 2),
(45, 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'bc1qrjg40w4qw73xk6hc626vmmcqdl0849m5fkx6sj', 31568, 2),
(46, 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'bc1qcnt8pf2yvlxqggv8alndj006wm82wtx9q3hzwc', 78918, 2),
(47, 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'bc1qn6hcgjmj9a40595ynakh0nn0v5h748un956nr5', 51192, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `otp` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPassword`, `level`, `otp`) VALUES
(2, 'ADMIN', 'Admin', 'tenrator@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, 246827);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_archive`
--

CREATE TABLE `tbl_archive` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `variant_name` varchar(255) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `MOP` varchar(50) NOT NULL,
  `transaction_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_archive`
--

INSERT INTO `tbl_archive` (`id`, `cmrId`, `productId`, `productName`, `variant_name`, `size_name`, `quantity`, `price`, `image`, `date`, `MOP`, `transaction_id`) VALUES
(58, 30, 2087521603, 'Vintage Tee \"Vibe City\" (Limited Edition)', 'Black', 'Large', 1, 550, 'uploads/3c35d5d1ea.jpg', '2023-03-10 19:44:58', 'Bitcoin', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gencode` varchar(256) NOT NULL,
  `size_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`, `gencode`, `size_id`, `variant_id`) VALUES
(85, '65vs3memj5b1k6ru0jbijub3s2', 514985542, 'this is it', 200.00, 1, 'uploads/0dc4807716.jpg', 'bc1qhvds42l8vdh0ftxy696fa6nxmkhzegjepterxq', 568732821, 842995051),
(88, '6soo986fostfqsct2m5ssqh03p', 514985542, 'this is it', 200.00, 1, 'uploads/0dc4807716.jpg', 'bc1qrff9gfqfrlqag25eulc90f4uu9xyy2twad9erz', 391084729, 1041428554),
(123, '40ncdem4m639dddbvd6mehu42n', 2087521603, 'Vintage Tee \"Vibe City\" (Limited Edition)', 550.00, 1, 'uploads/3c35d5d1ea.jpg', 'bc1q3zxjup9a64c4r8v7kdy7qapnlxy8dpfuxc8epa', 47210055, 824951668);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(7, 'MASKS'),
(8, 'CAPS'),
(9, 'SHORTS'),
(10, 'TOPS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_compare`
--

INSERT INTO `tbl_compare` (`id`, `cmrId`, `productId`, `productName`, `price`, `image`) VALUES
(11, 30, 1315708566, 'Classic Net Caps', 300.00, 'uploads/b3b9a7c20a.jpg'),
(12, 30, 193761537, 'The GOAT', 550.00, 'uploads/740578b29e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `otp` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`, `otp`) VALUES
(30, 'Justin Wearv', '15 Dona Carmen', 'Quezon City', 'Philippines', '1121', '09958253439', 'justengoogle@yahoo.com', '2dac4904e45e0e32bff9dda19e105da8', 162571);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emailgencode`
--

CREATE TABLE `tbl_emailgencode` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `gencode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `variant_name` varchar(255) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `Mop` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `variant_name`, `size_name`, `quantity`, `price`, `image`, `date`, `status`, `Mop`) VALUES
(83, 26, 193761537, 'The GOAT', 'White', 'Free Size', 1, 550, 'uploads/740578b29e.jpg', '2023-03-09 12:26:34', 1, 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paypal_order_details`
--

CREATE TABLE `tbl_paypal_order_details` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `variant_name` varchar(255) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `transaction_id` varchar(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_paypal_order_details`
--

INSERT INTO `tbl_paypal_order_details` (`id`, `cmrId`, `productId`, `productName`, `variant_name`, `size_name`, `quantity`, `price`, `image`, `date`, `transaction_id`, `status`) VALUES
(10, 30, 2087521603, 'Vintage Tee \"Vibe City\" (Limited Edition)', 'Black', 'Large', 1, 550, 'uploads/3c35d5d1ea.jpg', '2023-03-10 19:34:07', '7X4293610N132231E', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paypal_payment`
--

CREATE TABLE `tbl_paypal_payment` (
  `transaction_id` varchar(255) NOT NULL,
  `payer_name` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `currency` char(5) NOT NULL,
  `total_paid` int(11) NOT NULL,
  `business_email` varchar(255) NOT NULL,
  `transaction_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_paypal_payment`
--

INSERT INTO `tbl_paypal_payment` (`transaction_id`, `payer_name`, `payer_email`, `payer_id`, `currency`, `total_paid`, `business_email`, `transaction_date`) VALUES
('7X4293610N132231E', 'Ugh Ugh', 'ponypony@gmail.com', 'D4CAZSMPWEK2Q', 'PHP', 715, 'sb-jngub25180423@business.example.com', '2023-03-10T11:31:50Z');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `body`, `price`, `image`, `type`) VALUES
(29804582, 'OG OFF Shorts', 9, '<p><span>*100% Polyester *Mesh Fabric *2 side pockets *Above the knee shorts *Sublimation process</span></p>', 600, 'uploads/165af8b56d.jpg', 1),
(181978842, 'OG OFF Shorts', 9, '<p><span>*100% Polyester *Mesh Fabric *2 side pockets *Above the knee shorts *Sublimation process</span></p>', 600, 'uploads/86f9b03ad4.jpg', 1),
(193761537, 'The GOAT', 10, '<p><span>*Oversized crew neck tees *80% cotton 20% polyester *Comes with silkscreen prints (Full print &amp; back print) *Perfect wear for everywhere *100% Quality shirt * With free sticker hangtags</span></p>', 550, 'uploads/740578b29e.jpg', 1),
(386245037, 'Classic Striped Tee', 10, '<p><span>*Oversized crew neck tees *80% cotton 20% polyester *Comes with silkscreen prints (Full print &amp; back print) *Perfect wear for everywhere *100% Quality shirt *With free sticker hangtags</span></p>', 550, 'uploads/92e8318ddf.jpg', 1),
(728801078, 'CLASSIC CREAM (Money Cannot Buy Vibes)', 10, '<p><span>*Oversized crew neck tees *80% cotton 20% polyester *Comes with silkscreen prints (Full print &amp; back print) *Perfect wear for everywhere *100% Quality shirt *With free sticker hangtags</span></p>', 550, 'uploads/6a765fd134.jpg', 1),
(1011050146, 'Classic Tee', 10, '<p><span>*Oversized crew neck tees *80% cotton 20% polyester *Comes with silkscreen prints (Full print &amp; back print) *Perfect wear for everywhere *100% Quality shirt *With free sticker hangtags</span></p>', 550, 'uploads/4b2a708fef.jpg', 1),
(1315708566, 'Classic Net Caps', 8, '<p><span>*Embroidered Off Essentrix Logo Front &amp; Side *100% Polyester *Quality-Focused Material *Available in Dominant Black &amp; Camouflage</span></p>', 300, 'uploads/b3b9a7c20a.jpg', 1),
(1564313191, 'The WORM', 10, '<p><span>*Oversized crew neck tees *80% cotton 20% polyester *Comes with silkscreen prints (Full print &amp; back print) *Perfect wear for everywhere *100% Quality shirt *With free sticker hangtags</span></p>', 629, 'uploads/6b9ce7c396.jpg', 1),
(2087521603, 'Vintage Tee \"Vibe City\" (Limited Edition)', 10, '<p><span>*Oversized crew neck tees *80% cotton 20% polyester *Comes with silkscreen prints (Full print &amp; back print) *Perfect wear for everywhere *100% Quality shirt *With free sticker hangtags</span></p>', 550, 'uploads/3c35d5d1ea.jpg', 1),
(2101908812, 'OFF Mask', 7, '<p><span>*Neoprene Fabric (2 Ply) *Full Bleed Sublimation *Durable Fabric *Non Faded print *Washable &amp; Reusable</span></p>', 100, 'uploads/597e490722.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `body` text NOT NULL,
  `rating` int(9) NOT NULL,
  `cmrId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`id`, `productId`, `productName`, `image`, `body`, `rating`, `cmrId`) VALUES
(10, 193761537, 'The GOAT', 'uploads/740578b29e.jpg', 'kk', 5, 1),
(11, 2087521603, 'Vintage Tee', 'uploads/3c35d5d1ea.jpg', 'zs', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sizes`
--

CREATE TABLE `tbl_sizes` (
  `sizeid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `sizename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sizes`
--

INSERT INTO `tbl_sizes` (`sizeid`, `productid`, `sizename`) VALUES
(47210055, 2087521603, 'Large'),
(65005321, 650761215, 'Free Size'),
(173327925, 386245037, 'Medium'),
(184317670, 1956752304, 'XXL'),
(263977803, 1780459443, 'Free Size'),
(363195891, 616215321, 'Free Size'),
(395592010, 2101908812, 'Medium'),
(443511244, 918719339, 'XXL'),
(448756587, 426465527, 'XXL'),
(465399435, 918719339, 'Medium'),
(493564233, 973336451, 'Free Size'),
(523028159, 918719339, 'Free Size'),
(544113010, 1956752304, 'Free Size'),
(627230365, 130127517, 'Free Size'),
(651251939, 2087521603, 'Medium'),
(662262727, 181978842, 'Small'),
(671892090, 1011050146, 'Large'),
(757888096, 1956752304, 'Medium'),
(799598411, 426465527, 'Extra Large'),
(811277484, 426465527, 'Medium'),
(918677597, 1315708566, 'Free Size'),
(924579943, 1564313191, 'Medium'),
(926113572, 918719339, 'Extra Large'),
(971516376, 88272169, 'Free Size'),
(1012274554, 423069957, 'Free Size'),
(1040165597, 1956752304, 'Large'),
(1147957689, 1564313191, 'Small'),
(1178583537, 344577233, 'Free Size'),
(1215416246, 760691076, 'Free Size'),
(1231929111, 1956752304, 'Small'),
(1250285472, 728801078, 'Large'),
(1257510907, 426465527, 'Free Size'),
(1261860706, 29804582, 'Medium'),
(1268874382, 728801078, 'Medium'),
(1280999243, 1011050146, 'Medium'),
(1335930295, 29804582, 'Small'),
(1513489472, 918719339, 'Large'),
(1521076262, 386245037, 'Large'),
(1679788953, 188876275, 'Meduim'),
(1681824272, 426465527, 'Large'),
(1699206653, 1037821703, 'Free Size'),
(1712832255, 833511005, 'Small'),
(1786818924, 193761537, 'Free Size'),
(1800053280, 918719339, 'Small'),
(1805566055, 426465527, 'Small'),
(1866270762, 2123869811, 'Free Size'),
(1885000836, 24854979, 'Free Size'),
(1932295115, 1956752304, 'Extra Large'),
(2012138584, 392106894, 'Free Size'),
(2061307608, 181978842, 'Medium'),
(2119717924, 754057333, 'Free Size');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stocks`
--

CREATE TABLE `tbl_stocks` (
  `stock_id` int(11) NOT NULL,
  `stock_productid` int(11) NOT NULL,
  `stock_count` int(11) NOT NULL,
  `stock_type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_variant`
--

CREATE TABLE `tbl_variant` (
  `variant_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_name` varchar(255) NOT NULL,
  `stocks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_variant`
--

INSERT INTO `tbl_variant` (`variant_id`, `size_id`, `product_id`, `variant_name`, `stocks`) VALUES
(46696253, 1257510907, 426465527, 'FREE SIZE2', 2),
(48798694, 1250285472, 728801078, 'Orange', 10),
(81829798, 263977803, 1780459443, 'check mo to 1', 3),
(125229343, 1681824272, 426465527, 'large1', 1),
(127217273, 1280999243, 1011050146, 'Black', 10),
(133364086, 1268874382, 728801078, 'Khaki', 10),
(137415364, 1805566055, 426465527, 'small 2', 2),
(162757991, 1231929111, 1956752304, 'small 1', 1),
(164409163, 924579943, 1564313191, 'Black', 10),
(198156426, 1800053280, 918719339, 'small 1', 1),
(202647946, 1178583537, 344577233, 'z', 10),
(252550334, 1513489472, 918719339, 'large  5', 5),
(255914182, 1932295115, 1956752304, 'XL1', 1),
(286413397, 184317670, 1956752304, 'XXL1', 1),
(298694747, 662262727, 181978842, 'Maroon', 10),
(318308709, 443511244, 918719339, 'XXL2', 2),
(330944672, 1012274554, 423069957, '', 10),
(331308484, 465399435, 918719339, 'dito ka lang', 2),
(339169686, 811277484, 426465527, 'meduim2', 2),
(379129386, 1147957689, 1564313191, 'Black', 10),
(448806326, 799598411, 426465527, 'XL2', 2),
(468296112, 1215416246, 760691076, '', 10),
(481995084, 671892090, 1011050146, 'White', 10),
(500079311, 2012138584, 392106894, 'ito you 2', 4),
(553383126, 173327925, 386245037, 'Green and White', 10),
(583112582, 1521076262, 386245037, 'Black and Yellow', 10),
(585367384, 523028159, 918719339, 'wer', 2),
(603056298, 2119717924, 754057333, '', 10),
(675298703, 1261860706, 29804582, 'White', 10),
(708387212, 1257510907, 426465527, 'FREE SIZE1', 1),
(763937405, 926113572, 918719339, 'xl 1', 1),
(777973583, 1040165597, 1956752304, 'large1', 1),
(824951668, 47210055, 2087521603, 'Black', 8),
(890272913, 918677597, 1315708566, 'Camouflage', 10),
(907125839, 544113010, 1956752304, 'FREE SIZE2', 2),
(921887871, 1786818924, 193761537, 'White', 9),
(946856107, 1681824272, 426465527, 'Large size 9', 2),
(965276672, 184317670, 1956752304, 'XXL2', 2),
(972528774, 493564233, 973336451, 'boobob 1', 3),
(973887680, 1012274554, 423069957, '', 10),
(987870264, 1712832255, 833511005, 'this small 1', 1),
(1009100551, 1178583537, 344577233, 'z', 10),
(1050595620, 1268874382, 728801078, 'Orange', 10),
(1057415842, 671892090, 1011050146, 'Black', 10),
(1065756814, 1250285472, 728801078, 'Blue', 10),
(1101967185, 1231929111, 1956752304, 'small 2', 2),
(1129493926, 971516376, 88272169, '', 10),
(1129620110, 651251939, 2087521603, 'Black', 10),
(1163410363, 2061307608, 181978842, 'Maroon', 10),
(1185731622, 1679788953, 188876275, 'this med 2', 3),
(1191629435, 65005321, 650761215, 'gutom na ko 2', 10),
(1233039905, 448756587, 426465527, 'XXL2', 2),
(1243616232, 799598411, 426465527, 'XL1', 1),
(1283730052, 1885000836, 24854979, '', 10),
(1304435857, 1699206653, 1037821703, '', 10),
(1307278125, 1268874382, 728801078, 'Blue', 10),
(1374580468, 1866270762, 2123869811, 'qwerty 1', 2),
(1396504667, 465399435, 918719339, 'try 1', 3),
(1433507243, 544113010, 1956752304, 'FREE SIZE1', 1),
(1459351084, 1178583537, 344577233, 'z', 10),
(1492477853, 627230365, 130127517, '', 10),
(1509354368, 757888096, 1956752304, 'meduim2', 2),
(1557541747, 1513489472, 918719339, 'large  2', 3),
(1562055067, 1521076262, 386245037, 'Green and White', 10),
(1568976236, 493564233, 973336451, 'boobob 2', 3),
(1597463612, 1679788953, 188876275, 'this med 1', 2),
(1633691618, 448756587, 426465527, 'XXL1', 1),
(1666436283, 263977803, 1780459443, 'check mo to 2', 5),
(1679406725, 1805566055, 426465527, 'small 1', 1),
(1692453454, 2012138584, 392106894, 'ito you 1', 2),
(1710680648, 363195891, 616215321, '', 10),
(1714151031, 65005321, 650761215, 'gutom na ko 1', 7),
(1744606775, 1932295115, 1956752304, 'XL2', 2),
(1757950372, 395592010, 2101908812, 'Black', 10),
(1801016849, 1513489472, 918719339, 'large  1', 1),
(1805761118, 926113572, 918719339, 'xl 2', 2),
(1815477238, 811277484, 426465527, 'Meduim1', 1),
(1821050843, 1335930295, 29804582, 'White', 10),
(1828553263, 1885000836, 24854979, '', 10),
(1835283820, 523028159, 918719339, 'white', 8),
(1865113144, 757888096, 1956752304, 'meduim1', 1),
(1888096437, 1800053280, 918719339, 'small 2', 2),
(1896477981, 918677597, 1315708566, 'Black', 10),
(1911585141, 1178583537, 344577233, 's', 10),
(1955834231, 443511244, 918719339, 'XXL1', 1),
(1962607335, 523028159, 918719339, 'puti', 15),
(1987008572, 1280999243, 1011050146, 'White', 10),
(1993949191, 1040165597, 1956752304, 'large2', 2),
(1999323225, 173327925, 386245037, 'Black and Yellow', 10),
(2018565252, 1712832255, 833511005, 'this small 2', 2),
(2113976767, 1866270762, 2123869811, 'qwerty2', 5),
(2135755432, 1250285472, 728801078, 'Khaki', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wlist`
--

CREATE TABLE `tbl_wlist` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(275) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_wlist`
--

INSERT INTO `tbl_wlist` (`id`, `cmrId`, `productId`, `productName`, `price`, `image`) VALUES
(12, 0, 514985542, 'this is it', 200, 'uploads/0dc4807716.jpg'),
(13, 25, 514985542, 'this is it', 200, 'uploads/0dc4807716.jpg'),
(14, 28, 514985542, 'this is it', 200, 'uploads/0dc4807716.jpg'),
(29, 30, 1315708566, 'Classic Net Caps', 300, 'uploads/b3b9a7c20a.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bitcoin_order`
--
ALTER TABLE `bitcoin_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_archive`
--
ALTER TABLE `tbl_archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_emailgencode`
--
ALTER TABLE `tbl_emailgencode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_paypal_order_details`
--
ALTER TABLE `tbl_paypal_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_paypal_payment`
--
ALTER TABLE `tbl_paypal_payment`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sizes`
--
ALTER TABLE `tbl_sizes`
  ADD PRIMARY KEY (`sizeid`);

--
-- Indexes for table `tbl_stocks`
--
ALTER TABLE `tbl_stocks`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_variant`
--
ALTER TABLE `tbl_variant`
  ADD PRIMARY KEY (`variant_id`);

--
-- Indexes for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bitcoin_order`
--
ALTER TABLE `bitcoin_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_archive`
--
ALTER TABLE `tbl_archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_emailgencode`
--
ALTER TABLE `tbl_emailgencode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_paypal_order_details`
--
ALTER TABLE `tbl_paypal_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_stocks`
--
ALTER TABLE `tbl_stocks`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
