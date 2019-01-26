/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MariaDB
 Source Server Version : 100136
 Source Host           : localhost:3306
 Source Schema         : sampel_database

 Target Server Type    : MariaDB
 Target Server Version : 100136
 File Encoding         : 65001

 Date: 12/01/2019 00:38:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES (1, 'Admin');
INSERT INTO `type` VALUES (2, 'User');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gender` int(255) NULL DEFAULT NULL COMMENT '1=laki-laki, 2=Perempuan, 3=Lainnya',
  `tanggal_lahir` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Admin Test', 1, 'admin@admin.id', NULL, 1, '2019-01-12');
INSERT INTO `user` VALUES (2, 'A', 2, 'a@a.id', NULL, 2, '2019-01-12');
INSERT INTO `user` VALUES (3, 'B', 1, 'b@b.id', NULL, 1, '2019-01-12');
INSERT INTO `user` VALUES (4, 'C', 2, 'c@c.id', NULL, 2, '2018-12-01');
INSERT INTO `user` VALUES (5, 'D', 1, 'd@d.id', NULL, 1, '2018-12-01');
INSERT INTO `user` VALUES (6, 'E', 2, 'e@e.id', NULL, 2, '2018-12-01');
INSERT INTO `user` VALUES (7, 'F', 1, 'f@f.id', NULL, 1, '2018-12-01');

-- ----------------------------
-- View structure for vuser
-- ----------------------------
DROP VIEW IF EXISTS `vuser`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `vuser` AS SELECT
`user`.id,
`user`.nama,
`user`.type_id,
`user`.email,
`user`.`password`,
`user`.gender,
type.type_name,
`user`.tanggal_lahir
FROM
`user`
INNER JOIN type ON `user`.type_id = type.id ;

-- ----------------------------
-- View structure for vusers
-- ----------------------------
DROP VIEW IF EXISTS `vusers`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `vusers` AS SELECT
vuser.id,
vuser.nama,
vuser.type_id,
vuser.email,
vuser.`password`,
vuser.gender,
vuser.type_name,
vuser.tanggal_lahir,
MONTH(`vuser`.tanggal_lahir) as bulan,
YEAR(`vuser`.tanggal_lahir) as tahun,
DAY(`vuser`.tanggal_lahir) as tanggal
FROM
vuser ;

SET FOREIGN_KEY_CHECKS = 1;
