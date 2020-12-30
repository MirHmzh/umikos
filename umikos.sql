/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 100147
 Source Host           : localhost:3306
 Source Schema         : umikos

 Target Server Type    : MySQL
 Target Server Version : 100147
 File Encoding         : 65001

 Date: 30/12/2020 19:01:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_indekos
-- ----------------------------
DROP TABLE IF EXISTS `tb_indekos`;
CREATE TABLE `tb_indekos`  (
  `id_kos` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_kos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lat_kos` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lng_kos` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tarif_kos` decimal(25, 0) NULL DEFAULT NULL,
  `lebar_kos` int(3) NOT NULL,
  `panjang_kos` int(3) NOT NULL,
  `f_kamar_mandi` int(2) NOT NULL COMMENT '1-Dalam, 2-Luar',
  `f_gender` int(2) NOT NULL COMMENT '1-Pria,2-Wanita,3-Pasutri',
  `f_listrik` int(2) NOT NULL COMMENT '1-Include,2-Exclude',
  `f_ac` int(2) NOT NULL COMMENT '1-Include,2-Exclude',
  `f_lain` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `attachment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_pemilik` int(3) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kos`) USING BTREE,
  INDEX `id_pemilik`(`id_pemilik`) USING BTREE,
  CONSTRAINT `id_pemilik` FOREIGN KEY (`id_pemilik`) REFERENCES `tb_pemilik` (`id_pemilik`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_indekos
-- ----------------------------
INSERT INTO `tb_indekos` VALUES (2, 'Kos Bougenville', 'Jl. Bougenville No. 12', '-7.446517872442689', '112.71878242492677', 20000, 5, 4, 1, 2, 1, 1, '[{\"Cafeteria\":\"Ya\"}]', '[\"ae664fcd-94b6-426f-bd44-8ce73208b290.jpg\",\"1194b0c6-59f5-4f67-9766-924d0d6fe91f.jpg\"]', 1);
INSERT INTO `tb_indekos` VALUES (3, 'Kos Anggrek', 'Jl. Anggrek No. 12', '-7.492600785641781', '112.71127223968507', 300000, 5, 5, 0, 1, 0, 1, '[{\"Furniture\":\"Ya\"}]', '[]', 2);
INSERT INTO `tb_indekos` VALUES (4, 'Kos Mawar', 'Jl. Mawar No. 15', '-7.4479221326478795', '112.66350746154787', 340000, 7, 7, 0, 3, 1, 0, '[{\"Hairdryer\":\"Ya\"}]', '[]', 3);

-- ----------------------------
-- Table structure for tb_kampus
-- ----------------------------
DROP TABLE IF EXISTS `tb_kampus`;
CREATE TABLE `tb_kampus`  (
  `id_kampus` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kampus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat_kampus` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `lat_kampus` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lng_kampus` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kampus`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_kampus
-- ----------------------------
INSERT INTO `tb_kampus` VALUES (1, 'Universitas Muhammadiyah Sidoarjo Kampus 1', 'Jl. Mojopahit No.666 B, Sidowayah, Celep, Kec. Sidoarjo, Kabupaten Sidoarjo', '-7.4667543241513785', '112.71683491492696');
INSERT INTO `tb_kampus` VALUES (2, 'Universitas Muhammadiyah Sidoarjo Kampus 2', 'Jl. Raya Gelam No.222, Pagerwaja, Gelam, Kec. Candi, Kabupaten Sidoarjo', '-7.491520754718945', '112.71111231052176');
INSERT INTO `tb_kampus` VALUES (3, 'Universitas Muhammadiyah Sidoarjo Kampus 3', 'Jl. Raya Lebo No.4, Rame, Pilang, Kec. Wonoayu, Kabupaten Sidoarjo', '-7.44651112708437', '112.66428366651883');

-- ----------------------------
-- Table structure for tb_pemilik
-- ----------------------------
DROP TABLE IF EXISTS `tb_pemilik`;
CREATE TABLE `tb_pemilik`  (
  `id_pemilik` int(5) NOT NULL AUTO_INCREMENT,
  `nama_pemilik` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `notelp_pemilik` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_pemilik` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int(3) NOT NULL,
  PRIMARY KEY (`id_pemilik`) USING BTREE,
  INDEX `id_user`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_pemilik
-- ----------------------------
INSERT INTO `tb_pemilik` VALUES (1, 'John Doe', '082257228502', 'Jl. Mandala 418', 2);
INSERT INTO `tb_pemilik` VALUES (2, 'Timothy Ronald', '082257228502', 'Jl. Mandala 410', 6);
INSERT INTO `tb_pemilik` VALUES (3, 'Julius Caesar', '082257228502', 'Jl. Mandala 421', 7);

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` int(2) NULL DEFAULT NULL COMMENT '1-Pemilik,2-Admin',
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (1, 'admin', 'bismillah', 1);
INSERT INTO `tb_user` VALUES (2, 'john@mail.co', 'bismillah', 2);
INSERT INTO `tb_user` VALUES (6, 'timothy@mail.co', 'bismillah', 2);
INSERT INTO `tb_user` VALUES (7, 'julius@mail.co', 'bismillah', 2);

SET FOREIGN_KEY_CHECKS = 1;
