/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 100506
 Source Host           : localhost:3306
 Source Schema         : umikos

 Target Server Type    : MySQL
 Target Server Version : 100506
 File Encoding         : 65001

 Date: 01/12/2020 17:04:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_indekos
-- ----------------------------
DROP TABLE IF EXISTS `tb_indekos`;
CREATE TABLE `tb_indekos` (
  `id_kos` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kos` varchar(50) NOT NULL,
  `alamat_kos` text NOT NULL,
  `lat_kos` varchar(20) NOT NULL,
  `lng_kos` varchar(20) NOT NULL,
  `tarif_kos` decimal(25,0) DEFAULT NULL,
  `lebar_kos` int(3) NOT NULL,
  `panjang_kos` int(3) NOT NULL,
  `f_kamar_mandi` int(2) NOT NULL COMMENT '1-Dalam, 2-Luar',
  `f_gender` int(2) NOT NULL COMMENT '1-Pria,2-Wanita,3-Pasutri',
  `f_listrik` int(2) NOT NULL COMMENT '1-Include,2-Exclude',
  `f_ac` int(2) NOT NULL COMMENT '1-Include,2-Exclude',
  `f_lain` text DEFAULT NULL,
  `attachment` text DEFAULT NULL,
  `id_pemilik` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_kos`),
  KEY `id_pemilik` (`id_pemilik`),
  CONSTRAINT `id_pemilik` FOREIGN KEY (`id_pemilik`) REFERENCES `tb_pemilik` (`id_pemilik`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_indekos
-- ----------------------------
BEGIN;
INSERT INTO `tb_indekos` VALUES (1, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
INSERT INTO `tb_indekos` VALUES (2, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
INSERT INTO `tb_indekos` VALUES (3, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
INSERT INTO `tb_indekos` VALUES (4, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
INSERT INTO `tb_indekos` VALUES (5, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
INSERT INTO `tb_indekos` VALUES (6, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
INSERT INTO `tb_indekos` VALUES (7, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
INSERT INTO `tb_indekos` VALUES (8, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
INSERT INTO `tb_indekos` VALUES (9, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
INSERT INTO `tb_indekos` VALUES (10, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
INSERT INTO `tb_indekos` VALUES (11, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
INSERT INTO `tb_indekos` VALUES (12, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
INSERT INTO `tb_indekos` VALUES (13, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
INSERT INTO `tb_indekos` VALUES (14, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
INSERT INTO `tb_indekos` VALUES (15, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
INSERT INTO `tb_indekos` VALUES (16, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
INSERT INTO `tb_indekos` VALUES (17, 'Kos Bougenville', 'Jl. Mandala 420', '0', '0', 200000, 9, 8, 1, 1, 1, 1, '{}', 'null.jpg', 1);
COMMIT;

-- ----------------------------
-- Table structure for tb_kampus
-- ----------------------------
DROP TABLE IF EXISTS `tb_kampus`;
CREATE TABLE `tb_kampus` (
  `id_kampus` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kampus` varchar(255) DEFAULT NULL,
  `alamat_kampus` text DEFAULT NULL,
  `lat_kampus` varchar(50) DEFAULT NULL,
  `lng_kampus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kampus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_kampus
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tb_pemilik
-- ----------------------------
DROP TABLE IF EXISTS `tb_pemilik`;
CREATE TABLE `tb_pemilik` (
  `id_pemilik` int(5) NOT NULL AUTO_INCREMENT,
  `nama_pemilik` varchar(150) NOT NULL,
  `notelp_pemilik` varchar(16) NOT NULL,
  `alamat_pemilik` text NOT NULL,
  `user_id` int(3) NOT NULL,
  PRIMARY KEY (`id_pemilik`),
  KEY `id_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_pemilik
-- ----------------------------
BEGIN;
INSERT INTO `tb_pemilik` VALUES (1, 'amirudeen', '082257228502', 'Jl. Mandala 418', 2);
COMMIT;

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` int(2) DEFAULT NULL COMMENT '1-Pemilik,2-Admin',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
BEGIN;
INSERT INTO `tb_user` VALUES (1, 'admin', 'bismillah', 1);
INSERT INTO `tb_user` VALUES (2, 'owner', 'bismillah', 2);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
