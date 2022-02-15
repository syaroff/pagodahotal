/*
 Navicat Premium Data Transfer

 Source Server         : local_konek
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : hotel

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 15/02/2022 22:53:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for booking
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking`  (
  `id_booking` int NOT NULL AUTO_INCREMENT,
  `id_kamar` int NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `check_in` date NULL DEFAULT NULL,
  `check_out` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_booking`) USING BTREE,
  INDEX `id_kamar`(`id_kamar`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `fk_kamar` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES (22, 21, 3, '2022-02-15', '2022-02-17');
INSERT INTO `booking` VALUES (23, 2, 3, '2022-02-15', '2022-02-16');
INSERT INTO `booking` VALUES (24, 12, 3, '2022-02-15', '2022-02-16');

-- ----------------------------
-- Table structure for jenis_kamar
-- ----------------------------
DROP TABLE IF EXISTS `jenis_kamar`;
CREATE TABLE `jenis_kamar`  (
  `id_jenis_kamar` int NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_jenis` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis_kamar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jenis_kamar
-- ----------------------------
INSERT INTO `jenis_kamar` VALUES (1, 'Kelas Ekonomi', '100000', 1);
INSERT INTO `jenis_kamar` VALUES (3, 'Kelas Bisnis', '250000', 1);
INSERT INTO `jenis_kamar` VALUES (5, 'Kelas Utama', '500000', 1);
INSERT INTO `jenis_kamar` VALUES (6, 'Kelas VIP', '750000', 1);

-- ----------------------------
-- Table structure for kamar
-- ----------------------------
DROP TABLE IF EXISTS `kamar`;
CREATE TABLE `kamar`  (
  `id_kamar` int NOT NULL AUTO_INCREMENT,
  `id_jenis_kamar` int NULL DEFAULT NULL,
  `no_kamar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_kamar`) USING BTREE,
  INDEX `fk_jenis`(`id_jenis_kamar`) USING BTREE,
  CONSTRAINT `fk_jenis` FOREIGN KEY (`id_jenis_kamar`) REFERENCES `jenis_kamar` (`id_jenis_kamar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kamar
-- ----------------------------
INSERT INTO `kamar` VALUES (2, 1, 'E1', 0);
INSERT INTO `kamar` VALUES (7, 1, 'E2', 1);
INSERT INTO `kamar` VALUES (8, 1, 'E3', 1);
INSERT INTO `kamar` VALUES (9, 1, 'E4', 1);
INSERT INTO `kamar` VALUES (10, 1, 'E5', 1);
INSERT INTO `kamar` VALUES (12, 3, 'B2', 0);
INSERT INTO `kamar` VALUES (13, 3, 'B3', 1);
INSERT INTO `kamar` VALUES (14, 3, 'B4', 1);
INSERT INTO `kamar` VALUES (15, 3, 'B5', 1);
INSERT INTO `kamar` VALUES (16, 5, 'F1', 1);
INSERT INTO `kamar` VALUES (17, 5, 'F2', 1);
INSERT INTO `kamar` VALUES (18, 5, 'F3', 1);
INSERT INTO `kamar` VALUES (19, 5, 'F4', 1);
INSERT INTO `kamar` VALUES (20, 5, 'F5', 1);
INSERT INTO `kamar` VALUES (21, 6, 'VIP1', 0);
INSERT INTO `kamar` VALUES (22, 6, 'VIP2', 1);
INSERT INTO `kamar` VALUES (23, 6, 'VIP3', 1);
INSERT INTO `kamar` VALUES (24, 6, 'VIP4', 1);
INSERT INTO `kamar` VALUES (25, 6, 'VIP5', 1);

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `id_transaksi` int NOT NULL AUTO_INCREMENT,
  `id_booking` int NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `total_bayar` decimal(32, 0) NOT NULL,
  PRIMARY KEY (`id_transaksi`) USING BTREE,
  INDEX `id_booking`(`id_booking`) USING BTREE,
  CONSTRAINT `fk_booking` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id_booking`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES (14, NULL, '2022-02-10', 100000);
INSERT INTO `transaksi` VALUES (15, NULL, '2022-02-02', 100000);
INSERT INTO `transaksi` VALUES (17, NULL, NULL, 100000);
INSERT INTO `transaksi` VALUES (18, NULL, '2022-02-15', 100000);
INSERT INTO `transaksi` VALUES (19, 22, '2022-02-15', 1500000);
INSERT INTO `transaksi` VALUES (20, 23, '2022-02-15', 100000);
INSERT INTO `transaksi` VALUES (21, 24, '2022-02-15', 250000);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `roles` enum('user','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '');
INSERT INTO `user` VALUES (3, 'budi', 'user', '81dc9bdb52d04dc20036dbd8313ed055', 'budi@wolakwalik.com', '09887632112', 'dlanggu');

-- ----------------------------
-- View structure for bookingvw
-- ----------------------------
DROP VIEW IF EXISTS `bookingvw`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `bookingvw` AS SELECT
	`user`.username, 
	booking.id_booking, 
	booking.check_in, 
	booking.check_out, 
	booking.id_kamar, 
	booking.id_user, 
	kamar.no_kamar, 
	jenis_kamar.nama_jenis, 
	jenis_kamar.harga, 
	transaksi.total_bayar
FROM
	booking
	INNER JOIN
	kamar
	ON 
		booking.id_kamar = kamar.id_kamar
	INNER JOIN
	jenis_kamar
	ON 
		kamar.id_jenis_kamar = jenis_kamar.id_jenis_kamar
	INNER JOIN
	`user`
	ON 
		booking.id_user = `user`.id_user
	INNER JOIN
	transaksi
	ON 
		booking.id_booking = transaksi.id_booking ;

SET FOREIGN_KEY_CHECKS = 1;
