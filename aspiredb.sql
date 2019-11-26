/*
 Navicat Premium Data Transfer

 Source Server         : Gomez Mysql
 Source Server Type    : MySQL
 Source Server Version : 50728
 Source Host           : localhost:3306
 Source Schema         : aspiredb

 Target Server Type    : MySQL
 Target Server Version : 50728
 File Encoding         : 65001

 Date: 26/11/2019 08:47:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `remember_token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `updated_at` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'Aspire Admin', 'admin', '$2y$10$hqT/LSI9tAIKX7wSRbQUxOLTSuByakdU9MphERMw9kFtOfzPL6juO', 'pBcsMBZqxTawzL117k5y7UbBwGRgkSMCtfCd1ceg7b1PrRpj9CEP95l8AOM2', '2019-05-06 17:31:07', '2019-05-19 12:23:19');
INSERT INTO `admin` VALUES (2, 'Admin Steve', 'steve', '$2y$10$fHs0rJ1.m/kDMP7PdSt4w.IFrDfcpkswEyFAD29UMNU4/BCh0bYzy', 'r2C7LRuiTBuaohN1qncHIisOkdZQY6oLoXATXLFjs2ZDXXDUzSiEeH2ihob2', '2017-03-30 14:38:31', '2019-05-10 09:39:08');

-- ----------------------------
-- Table structure for apis
-- ----------------------------
DROP TABLE IF EXISTS `apis`;
CREATE TABLE `apis`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fields` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of apis
-- ----------------------------
INSERT INTO `apis` VALUES (1, 'http://www.maybank2u.com/secure/api', 'JSON', 'account,amount,type', '2019-05-26 07:04:20', '2019-05-26 07:04:20');

-- ----------------------------
-- Table structure for currencies
-- ----------------------------
DROP TABLE IF EXISTS `currencies`;
CREATE TABLE `currencies`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `deleted_at` datetime(0) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of currencies
-- ----------------------------
INSERT INTO `currencies` VALUES (1, 'MYR', 1, '0000-00-00 00:00:00', '2017-01-09 11:04:54', '2019-05-06 12:49:03');
INSERT INTO `currencies` VALUES (2, 'USD', 1, '0000-00-00 00:00:00', '2017-01-09 11:05:21', '2019-05-06 12:49:31');
INSERT INTO `currencies` VALUES (4, 'INR', 50, '2017-03-15 14:53:10', '2017-01-09 11:26:43', '2017-03-15 16:53:10');

-- ----------------------------
-- Table structure for deposit_packages
-- ----------------------------
DROP TABLE IF EXISTS `deposit_packages`;
CREATE TABLE `deposit_packages`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `currency_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `installment` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `fine` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of deposit_packages
-- ----------------------------
INSERT INTO `deposit_packages` VALUES (1, 'Deposit1', 1, 50000, 10000, 10, 5, 100, 2, '2017-03-27 18:07:49', '2017-03-27 18:11:36');
INSERT INTO `deposit_packages` VALUES (2, 'Deposit2', 1, 750000, 10000, 10, 6, 150, 3, '2017-03-27 18:12:13', '2017-03-27 18:12:13');
INSERT INTO `deposit_packages` VALUES (3, 'Deposit3', 1, 80000, 1200, 12, 6, 130, 2, '2017-03-30 05:34:56', '2017-03-30 05:34:56');
INSERT INTO `deposit_packages` VALUES (4, 'Deposit4', 1, 95000, 1200, 15, 8, 150, 2, '2017-03-30 05:35:17', '2017-03-30 05:35:17');

-- ----------------------------
-- Table structure for depositors
-- ----------------------------
DROP TABLE IF EXISTS `depositors`;
CREATE TABLE `depositors`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `depositor_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `spouse_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `present_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `permanent_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emergency_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emergency_relationship` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emergency_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emergency_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `depositor_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nid_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of depositors
-- ----------------------------
INSERT INTO `depositors` VALUES (5, 1, 1, '88458DC1D7E09E35159', 'Hasan ', 'Anni', 'Hasan', 'anni@gmail.com', '01716199668', 'Habibur Rahman', 'Hasna Rahman', '22-03-2017', 'Mirpur, Dhaka 1230', 'Mirpur, Dhaka 1230', 'Abir Khan', 'Brother', 'Mirpur, Dhaka 1230', '01716155555', '1490820476h1.jpg', '1490820476h2.jpg', '2017-03-30 04:47:58', '2017-03-30 04:47:58');

-- ----------------------------
-- Table structure for general_settings
-- ----------------------------
DROP TABLE IF EXISTS `general_settings`;
CREATE TABLE `general_settings`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `paypal_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `top_text` blob NOT NULL,
  `facebook` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `google_plus` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `footer_text` blob NOT NULL,
  `footer_bottom_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of general_settings
-- ----------------------------
INSERT INTO `general_settings` VALUES (1, 'Aspire Loan Management', 'logo.png', '15428c', '123 Jalan 45/6', 'aspire@ezzyremit.com', 'aspire@ezzyremit.com', '01716199668', 0x546865204E657720417370697265204C6F616E204D616E6167656D656E742073797374656D, 'www.facebook.com/aspire', 'www.twitter/aspire', 'linkdin.com/aspire', 'plus.google.com/aspire', 'youtube.com/aspire', 0x417370697265204C6F616E204D616E6167656D656E742073797374656D2E2E204C656164696E672074686520776179, '© All copyright Reserved By <a href=\"http://aspire.ezzyremit.com\" target=\"_blank\" rel=\"nofollow\">Aspire Loans</a>', NULL, '2019-05-10 09:42:04');

-- ----------------------------
-- Table structure for loan_packages
-- ----------------------------
DROP TABLE IF EXISTS `loan_packages`;
CREATE TABLE `loan_packages`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `currency_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `installment` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `fine` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of loan_packages
-- ----------------------------
INSERT INTO `loan_packages` VALUES (4, 'Loan1', 1, 50000, 10000, 10, 5, 100, 2, '2017-03-27 05:03:01', '2017-03-27 17:59:18');
INSERT INTO `loan_packages` VALUES (5, 'Loan2', 1, 75000, 10000, 12, 6, 100, 3, '2017-03-27 18:00:23', '2017-03-27 18:03:08');
INSERT INTO `loan_packages` VALUES (6, 'Loan3', 1, 80000, 12000, 15, 8, 150, 2, '2017-03-30 05:19:31', '2017-03-30 05:19:31');
INSERT INTO `loan_packages` VALUES (7, 'Loan4', 1, 90000, 13000, 15, 10, 150, 2, '2017-03-30 05:19:59', '2017-03-30 05:19:59');

-- ----------------------------
-- Table structure for loners
-- ----------------------------
DROP TABLE IF EXISTS `loners`;
CREATE TABLE `loners`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `loaner_number` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `spouse_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `present_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `permanent_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emergency_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emergency_relationship` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emergency_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emergency_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `loaner_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nid_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `salary` float NOT NULL DEFAULT 0,
  `other_income` float NOT NULL DEFAULT 0,
  `salary_spouse` float NOT NULL DEFAULT 0,
  `other_income_spouse` float NOT NULL DEFAULT 0,
  `rating` float NULL DEFAULT 0.82,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of loners
-- ----------------------------
INSERT INTO `loners` VALUES (13, 5, 1, '10958DC1D27BEF10465', 'Hasan ', 'Rahman', 'Hasan', 'anni@gmail.com', '01716199668', 'Habibur Rahman', 'Hasna Rahman', '22-03-2017', 'Mirpur, Dhaka 1230', 'Mirpur, Dhaka 1230', 'Abir Khan', 'Brother', 'Mirpur, Dhaka 1230', '01716155555', '1490820390h1.jpg', '1490820391h2.jpg', 7500, 0, 5000, 0, 0.82, '2017-03-30 04:46:31', '2017-03-30 04:46:43');
INSERT INTO `loners` VALUES (15, 7, 2, '6635CD4E38EF0544240', 'Some', 'One', 'Girl Friend', 'admin3@axihost.net', '60193416532', 'Dad', 'Mum', '22-03-1980', '32 jalan Street', '32 jalan Street', 'Mum', 'Mother', '123 home', '60123456789', '1557455758h1.png', '1557455758h2.png', 10000, 0, 2500, 0, 0.768, '2019-05-10 10:35:58', '2019-05-10 10:35:58');

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` blob NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'About US', 0x3C6469763E3C68323E576861742069732053697661204368616E643F3C2F68323E4C6F72656D20497073756D266E6273703B69732073696D706C792064756D6D792074657874206F6620746865207072696E74696E6720616E64207479706573657474696E6720696E6475737472792E204C6F72656D20497073756D20686173206265656E2074686520696E6475737472792773207374616E646172642064756D6D79207465787420657665722073696E6365207468652031353030732C207768656E20616E20756E6B6E6F776E207072696E74657220746F6F6B20612067616C6C6579206F66207479706520616E6420736372616D626C656420697420746F206D616B65206120747970652073706563696D656E20626F6F6B2E20497420686173207375727669766564206E6F74206F6E6C7920666976652063656E7475726965732C2062757420616C736F20746865206C65617020696E746F20656C656374726F6E6963207479706573657474696E672C2072656D61696E696E6720657373656E7469616C6C7920756E6368616E6765642E2049742077617320706F70756C61726973656420696E207468652031393630732077697468207468652072656C65617365206F66204C657472617365742073686565747320636F6E7461696E696E67204C6F72656D20497073756D2070617373616765732C20616E64206D6F726520726563656E746C792077697468206465736B746F70207075626C697368696E6720736F667477617265206C696B6520416C64757320506167654D616B657220696E636C7564696E672076657273696F6E73206F66204C6F72656D20497073756D2E3C2F6469763E3C6469763E3C68323E57687920646F207765207573652069743F3C2F68323E49742069732061206C6F6E672065737461626C6973686564206661637420746861742061207265616465342077696C6C206265206469737472616374656420627920746865207265616461626C6520636F6E74656E74206F6620612070616765207768656E206C6F6F6B696E6720617420697473206C61796F75742E2054686520706F696E74206F66207573696E67204C6F72656D20497073756D2069732074686174206974206861732061206D6F72652D6F722D6C657373206E6F726D616C20646973747269627574696F6E206F66206C6574746572732C206173206F70706F73656420746F207573696E672027436F6E74656E7420686572652C20636F6E74656E742068657265272C206D616B696E67206974206C6F6F6B206C696B65207265616461626C6520456E676C6973682E204D616E79206465736B746F70207075626C697368696E67207061636B6167657320616E6420776562207061676520656469746F7273206E6F7720757365204C6F72656D20497073756D2061732074686569722064656661756C74206D6F64656C20746578742C20616E6420612073656172636820666F7220276C6F72656D20697073756D272077696C6C20756E636F766572206D616E7920776562207369746573207374696C6C20696E20746865697220696E66616E63792E20566172696F75732076657273696F6E7320686176652065766F6C766564206F766572207468652079656172732C20736F6D6574696D6573206279206163636964656E742C20736F6D6574696D6573206F6E20707572706F73652028696E6A65637465642068756D6F757220616E6420746865206C696B65292E3C2F6469763E3C62723E3C6469763E3C68323E576865726520646F657320697420636F6D652066726F6D3F3C2F68323E436F6E747261727920746F20706F70756C61722062656C6965662C204C6F72656D20497073756D206973206E6F742073696D706C792072616E646F6D20746578742E2049742068617320726F6F747320696E2061207069656365206F6620636C6173736963616C204C6174696E206C6974657261747572652066726F6D2034352042432C206D616B696E67206974206F7665722032303030207965617273206F6C642E2052696368617264204D63436C696E746F636B2C2061204C6174696E2070726F666573736F722061742048616D7064656E2D5379646E657920436F6C6C65676520696E2056697267696E69612C206C6F6F6B6564207570206F6E65206F6620746865206D6F7265206F627363757265204C6174696E20776F7264732C20636F6E73656374657475722C2066726F6D2061204C6F72656D20497073756D20706173736167652C20616E6420676F696E67207468726F75676820746865206369746573206F662074686520776F726420696E20636C6173736963616C206C6974657261747572652C20646973636F76657265642074686520756E646F75627461626C6520736F757263652E204C6F72656D20497073756D20636F6D65732066726F6D2073656374696F6E7320312E31302E333220616E6420312E31302E3333206F66202264652046696E6962757320426F6E6F72756D206574204D616C6F72756D2220285468652045787472656D6573206F6620476F6F6420616E64204576696C292062792043696365726F2C207772697474656E20696E2034352042432E205468697320626F6F6B2069732061207472656174697365206F6E20746865207468656F7279206F66206574686963732C207665727920706F70756C617220647572696E67207468652052656E61697373616E63652E20546865206669727374206C696E65206F66204C6F72656D20497073756D2C20224C6F72656D20697073756D20646F6C6F722073697420616D65742E2E222C20636F6D65732066726F6D2061206C696E6520696E2073656374696F6E20312E31302E33322E546865207374616E64617264206368756E6B206F66204C6F72656D20497073756D20757365642073696E63652074686520313530307320697320726570726F64756365642062656C6F7720666F722074686F736520696E74657265737465642E2053656374696F6E7320312E31302E333220616E6420312E31302E33332066726F6D202264652046696E6962757320426F6E6F72756D206574204D616C6F72756D222062792043696365726F2061726520616C736F20726570726F647563656420696E207468656972206578616374206F726967696E616C20666F726D2C206163636F6D70616E69656420627920456E676C6973682076657273696F6E732066726F6D207468652031393134207472616E736C6174696F6E20627920482E205261636B68616D2E3C2F6469763E, '2017-01-11 16:28:02', '2019-05-26 08:07:45');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `migration` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES ('2017_03_20_190335_create_rooms_table', 1);
INSERT INTO `migrations` VALUES ('2017_03_22_161949_create_dates_table', 2);
INSERT INTO `migrations` VALUES ('2017_03_22_185603_create_orders_table', 3);
INSERT INTO `migrations` VALUES ('2017_03_24_001744_create_methods_table', 4);
INSERT INTO `migrations` VALUES ('2017_03_24_010432_create_payments_table', 5);
INSERT INTO `migrations` VALUES ('2017_03_26_163109_create_loan_packages_table', 6);
INSERT INTO `migrations` VALUES ('2017_03_27_020534_create_deposit_packages_table', 7);
INSERT INTO `migrations` VALUES ('2017_03_27_023657_create_types_table', 8);
INSERT INTO `migrations` VALUES ('2017_03_27_162516_create_staff_table', 9);
INSERT INTO `migrations` VALUES ('2017_03_27_190333_create_loners_table', 10);
INSERT INTO `migrations` VALUES ('2017_03_27_233934_create_schedules_table', 11);
INSERT INTO `migrations` VALUES ('2017_03_28_202021_create_depositors_table', 12);
INSERT INTO `migrations` VALUES ('2019_05_06_155021_create_transactions_table', 13);
INSERT INTO `migrations` VALUES ('2019_05_26_065020_create_apis_table', 13);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  INDEX `password_resets_email_index`(`email`) USING BTREE,
  INDEX `password_resets_token_index`(`token`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for schedules
-- ----------------------------
DROP TABLE IF EXISTS `schedules`;
CREATE TABLE `schedules`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `loner_id` int(11) NOT NULL,
  `loner_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` int(1) NOT NULL,
  `date` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pay_status` int(1) NOT NULL,
  `paid_status` int(2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 289 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of schedules
-- ----------------------------
INSERT INTO `schedules` VALUES (267, 13, '10958DC1D27BEF10465', 1, '06-04-2017', 2, 1, 1, '2017-03-30 04:46:49', '2017-03-30 04:51:37');
INSERT INTO `schedules` VALUES (268, 13, '10958DC1D27BEF10465', 1, '13-04-2017', 1, 0, 1, '2017-03-30 04:46:49', '2017-03-30 04:50:28');
INSERT INTO `schedules` VALUES (269, 13, '10958DC1D27BEF10465', 1, '20-04-2017', 0, 0, 0, '2017-03-30 04:46:49', '2017-03-30 04:46:49');
INSERT INTO `schedules` VALUES (270, 13, '10958DC1D27BEF10465', 1, '27-04-2017', 0, 0, 0, '2017-03-30 04:46:49', '2017-03-30 04:46:49');
INSERT INTO `schedules` VALUES (271, 13, '10958DC1D27BEF10465', 1, '04-05-2017', 0, 0, 0, '2017-03-30 04:46:49', '2017-03-30 04:46:49');
INSERT INTO `schedules` VALUES (272, 13, '10958DC1D27BEF10465', 1, '11-05-2017', 0, 0, 0, '2017-03-30 04:46:49', '2017-03-30 04:46:49');
INSERT INTO `schedules` VALUES (273, 13, '10958DC1D27BEF10465', 1, '18-05-2017', 0, 0, 0, '2017-03-30 04:46:49', '2017-03-30 04:46:49');
INSERT INTO `schedules` VALUES (274, 13, '10958DC1D27BEF10465', 1, '25-05-2017', 0, 0, 0, '2017-03-30 04:46:49', '2017-03-30 04:46:49');
INSERT INTO `schedules` VALUES (275, 13, '10958DC1D27BEF10465', 1, '01-06-2017', 0, 0, 0, '2017-03-30 04:46:49', '2017-03-30 04:46:49');
INSERT INTO `schedules` VALUES (276, 13, '10958DC1D27BEF10465', 1, '08-06-2017', 0, 0, 0, '2017-03-30 04:46:49', '2017-03-30 04:46:49');
INSERT INTO `schedules` VALUES (277, 13, '10958DC1D27BEF10465', 1, '15-06-2017', 0, 0, 0, '2017-03-30 04:46:49', '2017-03-30 04:46:49');
INSERT INTO `schedules` VALUES (278, 13, '10958DC1D27BEF10465', 1, '22-06-2017', 0, 0, 0, '2017-03-30 04:46:50', '2017-03-30 04:46:50');
INSERT INTO `schedules` VALUES (279, 5, '88458DC1D7E09E35159', 2, '06-04-2017', 1, 0, 1, '2017-03-30 04:48:03', '2017-03-30 04:49:42');
INSERT INTO `schedules` VALUES (280, 5, '88458DC1D7E09E35159', 2, '13-04-2017', 2, 1, 1, '2017-03-30 04:48:03', '2017-03-30 04:49:58');
INSERT INTO `schedules` VALUES (281, 5, '88458DC1D7E09E35159', 2, '20-04-2017', 0, 0, 0, '2017-03-30 04:48:03', '2017-03-30 04:48:03');
INSERT INTO `schedules` VALUES (282, 5, '88458DC1D7E09E35159', 2, '27-04-2017', 0, 0, 0, '2017-03-30 04:48:03', '2017-03-30 04:48:03');
INSERT INTO `schedules` VALUES (283, 5, '88458DC1D7E09E35159', 2, '04-05-2017', 0, 0, 0, '2017-03-30 04:48:04', '2017-03-30 04:48:04');
INSERT INTO `schedules` VALUES (284, 5, '88458DC1D7E09E35159', 2, '11-05-2017', 0, 0, 0, '2017-03-30 04:48:04', '2017-03-30 04:48:04');
INSERT INTO `schedules` VALUES (285, 5, '88458DC1D7E09E35159', 2, '18-05-2017', 0, 0, 0, '2017-03-30 04:48:04', '2017-03-30 04:48:04');
INSERT INTO `schedules` VALUES (286, 5, '88458DC1D7E09E35159', 2, '25-05-2017', 0, 0, 0, '2017-03-30 04:48:04', '2017-03-30 04:48:04');
INSERT INTO `schedules` VALUES (287, 5, '88458DC1D7E09E35159', 2, '01-06-2017', 0, 0, 0, '2017-03-30 04:48:04', '2017-03-30 04:48:04');
INSERT INTO `schedules` VALUES (288, 5, '88458DC1D7E09E35159', 2, '08-06-2017', 0, 0, 0, '2017-03-30 04:48:04', '2017-03-30 04:48:04');

-- ----------------------------
-- Table structure for sliders
-- ----------------------------
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `text` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sliders
-- ----------------------------
INSERT INTO `sliders` VALUES (19, 'Welcome To Aspire Loans', '1558850433.jpg', '2019-05-26 06:00:33', '2019-05-26 06:00:33');
INSERT INTO `sliders` VALUES (20, 'Start your new Journey Today', '1558851994.jpg', '2019-05-26 06:26:34', '2019-05-26 06:26:34');

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES (1, 'Chand Singh', 'chand@ezzyremit.com', 'chand1', '01716199668', '$2y$10$YaB7WB4baNF1RUokav/FReZDZ.PX3KhIDR2aMsuk9cpPVFwUJwpgy', '', 1, '2017-03-27 18:35:17', '2019-05-10 09:56:43');
INSERT INTO `staff` VALUES (2, 'Doc Siva', 'doc@ezzyremit.com', 'docsiva', '01110987654', '$2y$10$uPDGe9niak.TN5lJOGXXI.FWuf3gs2ctdFo7SYjmZZNDz/NvCswXy', '', 1, '2017-03-27 19:32:22', '2019-05-10 09:56:31');

-- ----------------------------
-- Table structure for testimonials
-- ----------------------------
DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of testimonials
-- ----------------------------
INSERT INTO `testimonials` VALUES (2, 'Habiba Himu', 'lorem ipsum dolor sit amet, consectetur adipisicing elit. quos sint voluptatum sit, perspiciatis ipsa, velit possimus dignissimos magni cum illo ab, dolore consectetur asperiores repellat atque', '2017-03-16 19:43:50', '2017-03-16 21:20:30');
INSERT INTO `testimonials` VALUES (3, 'Hasan Rahman', 'lorem ipsum dolor sit amet, consectetur adipisicing elit. quos sint voluptatum sit, perspiciatis ipsa, velit possimus dignissimos magni cum illo ab, dolore consectetur asperiores repellat atque', '2017-03-16 19:43:55', '2017-03-16 19:43:55');
INSERT INTO `testimonials` VALUES (4, 'Tanzila Anni', 'lorem ipsum dolor sit amet, consectetur adipisicing elit. quos sint voluptatum sit, perspiciatis ipsa, velit possimus dignissimos magni cum illo ab, dolore consectetur asperiores repellat atque', '2017-03-16 19:44:00', '2017-03-16 21:20:40');
INSERT INTO `testimonials` VALUES (5, 'Zannatun Naime', 'lorem ipsum dolor sit amet, consectetur adipisicing elit. quos sint voluptatum sit, perspiciatis ipsa, velit possimus dignissimos magni cum illo ab, dolore consectetur asperiores repellat atque', '2017-03-16 19:44:05', '2017-03-16 21:20:55');
INSERT INTO `testimonials` VALUES (6, 'Ridoy Candro Modok', 'lorem ipsum dolor sit amet, consectetur adipisicing elit. quos sint voluptatum sit, perspiciatis ipsa, velit possimus dignissimos magni cum illo ab, dolore consectetur asperiores repellat atque', '2017-03-16 19:44:08', '2017-03-16 21:21:06');
INSERT INTO `testimonials` VALUES (7, 'Abir Khan', 'lorem ipsum dolor sit amet, consectetur adipisicing elit. quos sint voluptatum sit, perspiciatis ipsa, velit possimus dignissimos magni cum illo ab, dolore consectetur asperiores repellat atque', '2017-03-16 21:21:23', '2017-03-16 21:21:23');
INSERT INTO `testimonials` VALUES (8, 'Rex Rifat', 'lorem ipsum dolor sit amet, consectetur adipisicing elit. quos sint voluptatum sit, perspiciatis ipsa, velit possimus dignissimos magni cum illo ab, dolore consectetur asperiores repellat atque', '2017-03-16 21:21:34', '2017-03-16 21:21:34');
INSERT INTO `testimonials` VALUES (9, 'Anik Mahbub', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2017-03-20 20:09:36', '2017-03-20 20:09:36');

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `day` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES (1, 'Day', 1, '2017-03-27 04:39:10', '2017-03-27 04:53:34');
INSERT INTO `types` VALUES (2, 'Weekly', 7, '2017-03-27 04:53:48', '2017-03-27 04:53:48');
INSERT INTO `types` VALUES (3, 'Bi-monthly', 15, '2017-03-27 04:54:30', '2017-03-27 04:54:30');
INSERT INTO `types` VALUES (4, 'Monthly', 30, '2017-03-27 04:54:45', '2017-03-27 04:54:45');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
