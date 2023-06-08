/*
 Navicat Premium Data Transfer

 Source Server         : PHP 5.6
 Source Server Type    : MariaDB
 Source Server Version : 100134
 Source Host           : localhost:3306
 Source Schema         : db_library

 Target Server Type    : MariaDB
 Target Server Version : 100134
 File Encoding         : 65001

 Date: 08/06/2023 17:58:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `status_id`(`status_id`) USING BTREE,
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'becca', 'chua', 'qq@gmail.com', '$2y$10$bTvxkL5SKWCxqA8yt2uW2un1sHGJ2PWR1xEqKqQSvoywKLXLYy/zO', 1, '2023-05-31 16:12:36', '2023-06-05 15:24:45');
INSERT INTO `admin` VALUES (2, '1', 'user', 'u1@gmail.com', '$2y$10$1ptq1v6rMrXhZHPEIX19QuN1GXn2j0t6IIRHSFTrD8lSGyb1kpIWa', 1, '2023-06-05 17:12:09', '2023-06-05 17:12:09');
INSERT INTO `admin` VALUES (3, '2', 'user', 'u2@gmail.com', '$2y$10$s6KyvDmR4G8GeNjJWhGWou0cOyg2/Tq/oCy4bNK.lJ/hFhDkG75yC', 1, '2023-06-05 17:12:36', '2023-06-05 17:12:36');
INSERT INTO `admin` VALUES (4, '3', 'user', 'u3@gmail.com', '$2y$10$kQNzRLHSA1Z7XoRob5ZvKuJ/TR9VDOAxoccuZdXlKxB1BidBkvC3W', 1, '2023-06-05 17:12:58', '2023-06-05 17:12:58');
INSERT INTO `admin` VALUES (5, '4', 'user', 'u4@gmail.com', '$2y$10$jC7hPF6KSXiInlFWuSv7a.RPfB9i06XsKOZi.HLuyCvxxEW2Abb0m', 1, '2023-06-05 17:13:22', '2023-06-05 17:13:22');
INSERT INTO `admin` VALUES (6, '5', 'user', 'u5@gmail.com', '$2y$10$qgUS5osl0y57Ak5pWUo8A.Z56i5zCCngE7b5GKaxp5qB9ObeUmg2K', 1, '2023-06-05 17:13:35', '2023-06-05 17:13:35');
INSERT INTO `admin` VALUES (7, '6', 'user ', 'u6@gmail.com', '$2y$10$M8OH6CBM3AWQsK5eIl1QK.i1/Looo1XnnhY5Tb.8ZVpusUNIpFi4e', 1, '2023-06-05 17:13:52', '2023-06-05 17:13:52');
INSERT INTO `admin` VALUES (8, '7', 'user', 'u7@gmail.com', '$2y$10$FtLPGoagVtoNnhc8vzTiBek0kzVQveEwRk/lgEOzp2b9LEtrIQGs2', 1, '2023-06-05 17:14:25', '2023-06-05 17:14:25');
INSERT INTO `admin` VALUES (9, '8', 'user', 'u8@gmail.com', '$2y$10$KhaGmESxWTESvd6tsEFEG.1FVPhZk7yEKlsJaJNu11v50fE0EWIe.', 1, '2023-06-05 17:14:48', '2023-06-05 17:14:48');
INSERT INTO `admin` VALUES (10, '9', 'user', 'u9@gmail.com', '$2y$10$lzkxFv8EbGu2.wn2VqcTSulJNh0rjE.fHm/vNlAZMT0FNARr.Y7AK', 1, '2023-06-05 17:15:08', '2023-06-05 17:15:08');
INSERT INTO `admin` VALUES (11, '10 ', 'user ', 'u10@gmail.com', '$2y$10$LSvByTd0KPoZ8Wsqx/g/ruGabzxJFRdk/pRoHvzxti9fVhwNnPkFi', 1, '2023-06-05 17:15:21', '2023-06-05 17:15:21');
INSERT INTO `admin` VALUES (12, '11', 'user', 'u11@gmail.com', '$2y$10$XQ7abuKMQ5Ig4IQgbLVBHuquQAkV1hGKWALk5lR7WykFK9h.KGjFW', 1, '2023-06-05 17:15:44', '2023-06-05 17:15:44');
INSERT INTO `admin` VALUES (13, '12', 'user', 'u12@gmail.com', '$2y$10$1vUtc5FqKIVMgVqPFoNZ1ezLpDu.MCYzgMXtTWWfRqR5DkY4fmOvK', 1, '2023-06-05 17:16:31', '2023-06-05 17:16:31');
INSERT INTO `admin` VALUES (14, '13', 'user', 'u13@gmail.com', '$2y$10$eU/8Ko3MU8bo42vPXT23GeP8qISTWzPh3UcUy6fHkEo60UVflYUrG', 1, '2023-06-05 17:17:05', '2023-06-05 17:17:05');
INSERT INTO `admin` VALUES (15, '14', 'user', 'u14@gmail.com', '$2y$10$ggIiQVyrN1rHT9jvhFZPJuil02BEiqE8Bv3sLAp6NIvaYawN.qcRW', 1, '2023-06-05 17:34:16', '2023-06-05 17:34:16');
INSERT INTO `admin` VALUES (16, '15', 'user', 'u15@gmail.com', '$2y$10$ii9k4L70A5nMCXuxftJZyuX6iXNB6pDamJGkCvcKPaQScVCrV1j8S', 1, '2023-06-05 17:34:37', '2023-06-05 17:34:37');
INSERT INTO `admin` VALUES (17, '16', 'user', 'u16@gmail.com', '$2y$10$BVgelqE6AIa/IhSbqnWsUON5DL66pmYbDLyymxb//EGkj66ijUXLO', 1, '2023-06-05 17:35:04', '2023-06-05 17:35:04');
INSERT INTO `admin` VALUES (18, '17', 'user', 'y17@gmail.com', '$2y$10$Ax8dfZxlNlZqjHtCl9LZP.o4pqJmgG8PazevstxizFIQ2f/C3.Lxi', 1, '2023-06-05 17:35:24', '2023-06-05 17:35:24');
INSERT INTO `admin` VALUES (19, '18', 'user', 'u18@gmail.com', '$2y$10$FjIp4vODB8X9htabtSrM9edLzvglWZdtw/dRcPSlvlbSyF.SGUAOi', 1, '2023-06-05 17:36:34', '2023-06-05 17:36:34');
INSERT INTO `admin` VALUES (20, '19', 'user', 'u19@gmail.com', '$2y$10$nwY02bHwmA7ZvxF6kTBZbuEfTt2R1do4nIrD8pw2uxvQQST.OjWe6', 1, '2023-06-05 17:37:24', '2023-06-05 17:37:24');
INSERT INTO `admin` VALUES (21, '20', 'user', 'u20@gmail.com', '$2y$10$LvPSmPy9g7hmzBx6YijjROOyBCFAE4a42uReXVVHu4N5X2L8qi/le', 1, '2023-06-05 17:37:45', '2023-06-05 17:37:45');
INSERT INTO `admin` VALUES (22, '21', 'user', 'user21@gmail.com', '$2y$10$JbMb3U3/hC9xxaRhzjhbieRdQdhiFTfWSlFfgtwxUJChv1ktEgXqi', 1, '2023-06-05 17:38:10', '2023-06-05 17:38:10');
INSERT INTO `admin` VALUES (23, '22', 'user', 'u22@gmail.com', '$2y$10$TR4QtISNKKqNgSZDKHvJ.uVtRCM0FaqYm95NlUKqyXZMqic0tREcm', 1, '2023-06-06 10:36:24', '2023-06-06 10:36:24');
INSERT INTO `admin` VALUES (24, '23', 'user', 'u23@gmail.com', '$2y$10$.dQsK9ATi77eoSurQ3I0BOUpH8QDzD6n.YBZpH9IUKGIEsce5NCgi', 1, '2023-06-06 10:37:08', '2023-06-06 10:37:08');
INSERT INTO `admin` VALUES (25, '24', 'user', 'u24@gmail.com', '$2y$10$1mpINzbiC6nnaXYtb8zJeODt4lc2ZqO1wiEbSydLT9bzxgnGdS4mO', 1, '2023-06-06 10:37:27', '2023-06-06 10:37:27');
INSERT INTO `admin` VALUES (26, '25', 'user ', 'u25@gmail.com', '$2y$10$6dWSa.xxEArf3u70h9wBAeNH7a8DdfOBqagUmj5QwNTdfs6kp5G2C', 1, '2023-06-06 10:37:47', '2023-06-06 10:37:47');
INSERT INTO `admin` VALUES (27, '26', 'user', 'u26@gmail.com', '$2y$10$TCu9.e29U1dObTYYJOWkOeRfAe/gQLJHX/.a8YQ/QTENlHaz3V/9K', 1, '2023-06-06 10:38:18', '2023-06-06 10:38:18');
INSERT INTO `admin` VALUES (28, '27', 'user', 'u27@gmail.com', '$2y$10$Vc0eUu76JWsgIWojPlAmA.c7agUcjxwfPimTLuKGFNmrH5DNh431m', 1, '2023-06-06 10:38:35', '2023-06-06 10:38:35');
INSERT INTO `admin` VALUES (29, '28', 'user', 'u28@gmail.com', '$2y$10$jk2J3L6wvU6G.ndv34.YwO7nGPmNkmvmJMGSn2AsqwbcW/62s/uxO', 1, '2023-06-06 10:40:54', '2023-06-06 10:40:54');
INSERT INTO `admin` VALUES (30, '29', 'user', 'u29@gmail.com', '$2y$10$HG7CzK4d41NXXDwCDCrk0ecA.kwV37RTWhM/c9ncxLM0i1AcnCk9y', 1, '2023-06-06 10:41:05', '2023-06-06 10:41:05');
INSERT INTO `admin` VALUES (31, '30', 'user', 'u30@gmail.com', '$2y$10$n8baqdxYqwzeTK5FZtN65eUg1ZuDUPaq19/tucIFvHthDTjhH/64a', 2, '2023-06-06 10:41:19', '2023-06-06 16:30:49');
INSERT INTO `admin` VALUES (32, '31', 'user', 'u31@gmail.com', '$2y$10$NHHoch58Ip42rTnTJ8JHRuTxAd79LTqVOm8.bU1fTkqvOlTinWUFa', 2, '2023-06-06 10:42:52', '2023-06-06 18:15:21');
INSERT INTO `admin` VALUES (33, '32', 'user', 'u32@gmail.com', '$2y$10$XtbKoVbHIE377rB4mumX2.RecpfmUqLnRmJAzdKLmNg50oOnSfr8a', 1, '2023-06-06 13:08:48', '2023-06-06 13:08:48');
INSERT INTO `admin` VALUES (34, '33', 'user', 'u33@gmail.com', '$2y$10$eUQiNtpV/gKi6yvUHAGwrO7MHhB7higQuDG3XtSPXmV1cU5.AIHma', 1, '2023-06-06 13:09:02', '2023-06-06 13:09:02');
INSERT INTO `admin` VALUES (35, '34', 'user', 'u34@gmail.com', '$2y$10$GxLoRwBZgW4nkNwtFP4wT.uL/fVJ9uP.ewXDiyMJu7T9dTdTUoM9C', 1, '2023-06-06 13:09:13', '2023-06-06 13:09:13');
INSERT INTO `admin` VALUES (36, '36', 'user ', 'user36@gmail.com', '$2y$10$pJoucJuCeI1skxae0kLXwOJtpMBi.iIdZaIsXgU5zB1olJUeNo14S', 1, '2023-06-06 13:36:38', '2023-06-06 13:36:38');
INSERT INTO `admin` VALUES (37, '35', 'user', 'u35@gmail.com', '$2y$10$8vzK0apyhzJ1xuLbHoGF7uzvi3zCZihi1l.RxBKi91crdw96XjpLO', 1, '2023-06-06 13:36:54', '2023-06-06 13:36:54');
INSERT INTO `admin` VALUES (38, '37', 'user ', 'u37@gmail.com', '$2y$10$O4n7hihcvq6xIelgDc5o1O5a9Lb2g.xSZaM8uds14GETzbX/hKhwe', 1, '2023-06-06 13:37:11', '2023-06-06 13:37:11');
INSERT INTO `admin` VALUES (39, '38', 'user', 'u38@gmail.com', '$2y$10$gDcTeLwuy5Ojt2gMokXsmusSdLcxfOPMFcf9Kr39DbHhiZ0hPdB0u', 1, '2023-06-06 13:37:23', '2023-06-06 13:37:23');
INSERT INTO `admin` VALUES (40, '39', 'user', 'u39@gmail.com', '$2y$10$aYT5UkNZbn92yoXI2dLvWO5E6yzw2jZtkCEB3gLlgCKkkTQzBBZ.a', 2, '2023-06-06 13:37:42', '2023-06-06 16:30:42');
INSERT INTO `admin` VALUES (41, 'kit', 'calag', 'kc@gmail.com', '$2y$10$cOC8WmiLNZw8MTqarILK6uGp3cacbnMEiefc/h72FbbrPpDyCL4AG', 1, '2023-06-06 16:31:12', '2023-06-06 16:31:12');
INSERT INTO `admin` VALUES (42, 'will', 'will', 'w@gmail.com', '$2y$10$bS2JwjcvjfpFTHJzQmDXfOgMmbw66cHQ5SfbIWhJjG0YejFQNQ/Gm', 1, '2023-06-06 18:15:35', '2023-06-08 17:43:07');
INSERT INTO `admin` VALUES (43, 'William', 'Corotan', 'will@gmail.com', '$2y$10$1aqNPYp59iykll9pxanr0.3O0HLgei0UqFxqUpZDBwQhNPZqCqZlm', 2, '2023-06-07 15:39:14', '2023-06-07 18:10:04');

-- ----------------------------
-- Table structure for author
-- ----------------------------
DROP TABLE IF EXISTS `author`;
CREATE TABLE `author`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of author
-- ----------------------------

-- ----------------------------
-- Table structure for book
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `cover_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `author_id` int(11) NULL DEFAULT NULL,
  `subject_id` int(11) NULL DEFAULT NULL,
  `call_number` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `publish_date` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `publisher_id` int(11) NULL DEFAULT NULL,
  `borrow_status_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `author_id`(`author_id`) USING BTREE,
  INDEX `subject_id`(`subject_id`) USING BTREE,
  INDEX `publisher_id`(`publisher_id`) USING BTREE,
  INDEX `borrow_status_id`(`borrow_status_id`) USING BTREE,
  CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `book_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `book_ibfk_4` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `book_ibfk_5` FOREIGN KEY (`borrow_status_id`) REFERENCES `borrow_status` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of book
-- ----------------------------

-- ----------------------------
-- Table structure for borrow_status
-- ----------------------------
DROP TABLE IF EXISTS `borrow_status`;
CREATE TABLE `borrow_status`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of borrow_status
-- ----------------------------

-- ----------------------------
-- Table structure for publisher
-- ----------------------------
DROP TABLE IF EXISTS `publisher`;
CREATE TABLE `publisher`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of publisher
-- ----------------------------

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (1, 'active');
INSERT INTO `status` VALUES (2, 'in-active');

-- ----------------------------
-- Table structure for subject
-- ----------------------------
DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 66 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of subject
-- ----------------------------
INSERT INTO `subject` VALUES (1, 'arts_architecture');
INSERT INTO `subject` VALUES (2, 'arts_art_history');
INSERT INTO `subject` VALUES (3, 'arts_design');
INSERT INTO `subject` VALUES (4, 'arts_fashion');
INSERT INTO `subject` VALUES (5, 'arts_film');
INSERT INTO `subject` VALUES (6, 'arts_graphic_design');
INSERT INTO `subject` VALUES (7, 'arts_music');
INSERT INTO `subject` VALUES (8, 'fiction_fantasy');
INSERT INTO `subject` VALUES (9, 'fiction_historical_fiction');
INSERT INTO `subject` VALUES (10, 'fiction_horror');
INSERT INTO `subject` VALUES (11, 'fiction_magic');
INSERT INTO `subject` VALUES (12, 'fiction_mystery');
INSERT INTO `subject` VALUES (13, 'fiction_romance');
INSERT INTO `subject` VALUES (14, 'fiction_science_fiction');
INSERT INTO `subject` VALUES (15, 'fiction_thriller');
INSERT INTO `subject` VALUES (16, 'science_biology');
INSERT INTO `subject` VALUES (17, 'science_chemistry');
INSERT INTO `subject` VALUES (18, 'science_physics');
INSERT INTO `subject` VALUES (19, 'science_technology');
INSERT INTO `subject` VALUES (20, 'mathematics_calculus');
INSERT INTO `subject` VALUES (21, 'mathematics_statistics');
INSERT INTO `subject` VALUES (22, 'mathematics_trigonometry');
INSERT INTO `subject` VALUES (23, 'mathematics_geometry');
INSERT INTO `subject` VALUES (25, 'mathematics_algebra');
INSERT INTO `subject` VALUES (26, 'mathematics_arithmetic');
INSERT INTO `subject` VALUES (27, 'business_and_finance_management');
INSERT INTO `subject` VALUES (28, 'business_and_finance_entrepreneurship');
INSERT INTO `subject` VALUES (29, 'business_and_finance_economics');
INSERT INTO `subject` VALUES (30, 'business_and_finance_finance');
INSERT INTO `subject` VALUES (31, 'children_kid_books');
INSERT INTO `subject` VALUES (32, 'children_baby_books');
INSERT INTO `subject` VALUES (33, 'children_bedtime_books');
INSERT INTO `subject` VALUES (34, 'children_picture_books');
INSERT INTO `subject` VALUES (35, 'history_archeology');
INSERT INTO `subject` VALUES (36, 'history_anthropology');
INSERT INTO `subject` VALUES (37, 'history_social_life_and_customs');
INSERT INTO `subject` VALUES (38, 'social_science_anthropology');
INSERT INTO `subject` VALUES (39, 'social_science_religion');
INSERT INTO `subject` VALUES (40, 'social_science_political_science');
INSERT INTO `subject` VALUES (41, 'social_science_psychology');
INSERT INTO `subject` VALUES (42, 'textbooks_history');
INSERT INTO `subject` VALUES (43, 'textbooks_mathematics');
INSERT INTO `subject` VALUES (44, 'textbooks_geography');
INSERT INTO `subject` VALUES (45, 'textbooks_psychology');
INSERT INTO `subject` VALUES (46, 'textbooks_algebra');
INSERT INTO `subject` VALUES (47, 'textbooks_education');
INSERT INTO `subject` VALUES (48, 'textbooks_business_and_economics');
INSERT INTO `subject` VALUES (49, 'textbooks_science');
INSERT INTO `subject` VALUES (50, 'textbooks_language_and_literature');
INSERT INTO `subject` VALUES (51, 'textbooks_computer_science');
INSERT INTO `subject` VALUES (52, '');
INSERT INTO `subject` VALUES (53, 'dasd');
INSERT INTO `subject` VALUES (54, '');
INSERT INTO `subject` VALUES (55, '');
INSERT INTO `subject` VALUES (56, '');
INSERT INTO `subject` VALUES (57, '');
INSERT INTO `subject` VALUES (58, '');
INSERT INTO `subject` VALUES (59, '');
INSERT INTO `subject` VALUES (60, '');
INSERT INTO `subject` VALUES (61, '');
INSERT INTO `subject` VALUES (62, '');
INSERT INTO `subject` VALUES (63, '');
INSERT INTO `subject` VALUES (64, '');
INSERT INTO `subject` VALUES (65, '');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `contact_number` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_id` int(11) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `status_id`(`status_id`) USING BTREE,
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (5, NULL, NULL, NULL, 'qq@gmail.com', '$2y$10$cZXj5Q7ZIhf76l51J6UdP.88UTQ/gzVYahOEoQWe6Pif5BJv4I2f6', '2023-06-02 10:04:46', '2023-06-07 13:24:12', 1);
INSERT INTO `user` VALUES (6, NULL, NULL, NULL, 'test@gmail.com', '$2y$10$2fC40iorXpNlNhoP8Oigx.6ivUz6pXZL.5IuPjEMhMgy3BnDfxbIy', '2023-06-02 10:50:00', '2023-06-07 13:24:59', 2);
INSERT INTO `user` VALUES (7, NULL, NULL, NULL, 't@gmail.com', '$2y$10$eCUNPCEgYo5sh1kUbP.xD.0nGORLXl9QnGWnrkNMKJsmJvYahXx0y', '2023-06-02 15:55:16', '2023-06-07 13:24:38', 2);
INSERT INTO `user` VALUES (8, NULL, NULL, NULL, 'test2@gmail.com', '$2y$10$mNCxC5C8GlSrKQQBldFPvufGnXBshpabOPmkogQegVLfeP.8wmCea', '2023-06-02 16:53:09', '2023-06-07 13:24:14', 1);
INSERT INTO `user` VALUES (9, NULL, NULL, NULL, 'a@gmail.com', '$2y$10$Ng9CvElX/N.4XfKJdzxD3OS8O47CRibUBtUNjvlz.3uJAcP3Fgdzm', '2023-06-02 17:41:42', '2023-06-07 13:24:40', 2);
INSERT INTO `user` VALUES (10, 'mary', 'cruz', '09123456789', 'maryjane@gmail.copm', '$2y$10$HvTd3zRinT28TxUXqh3K0ewfAIaBDvvd25N3d/4jeWeUmAtOO.eWG', '2023-06-02 18:02:14', '2023-06-07 13:24:15', 1);
INSERT INTO `user` VALUES (11, NULL, NULL, NULL, 'test1@gmail.com', '$2y$10$mIf.oKQv9gSdYoayPL.6uOHY0ihg1rX9PyS.F6/MXlpu.CyWF7m5m', '2023-06-05 09:18:19', '2023-06-07 13:24:56', 2);
INSERT INTO `user` VALUES (12, NULL, NULL, NULL, 'test5@gmail.com', '$2y$10$CLq5CFCy7/xllCSsKnno2u7BOvaORQl5Lbi3Q/nLxvzoiUyyUSruK', '2023-06-05 14:40:26', '2023-06-07 13:24:46', 2);
INSERT INTO `user` VALUES (13, NULL, NULL, NULL, 'test12@gmail.com', '$2y$10$O6BSvQmbO7yNXkAIc4jrreop4XuisfYNejoGtJoIjBMQsa2Fv5FuK', '2023-06-05 14:41:12', '2023-06-07 13:24:44', 2);
INSERT INTO `user` VALUES (14, NULL, NULL, NULL, 'a12@gmail.com', '$2y$10$4ec2eSRM0X7EHHvRutXpDe9Wm.WPFyXi.VUvTnoq7URu86OSA250S', '2023-06-05 14:41:40', '2023-06-07 13:24:16', 1);
INSERT INTO `user` VALUES (15, NULL, NULL, NULL, 'qwe@gmail.com', '$2y$10$t6yQn5.GE0BHF4Pi9NqbieKAe2J7MUe1NOPH5IPnYp6tptUtZynH.', '2023-06-05 14:42:19', '2023-06-07 13:25:00', 2);
INSERT INTO `user` VALUES (16, NULL, NULL, NULL, 'tsx@gmail.com', '$2y$10$vHhtQwjVOUk9VNg8FoU7HezNvzEeCAZ/b0nLCsEDfTJbfKphZH9wK', '2023-06-05 15:28:31', '2023-06-07 13:24:17', 1);
INSERT INTO `user` VALUES (17, NULL, NULL, NULL, 'test11@gmail.com', '$2y$10$fx78GBWn4URoja/ft5V7aOkjzGyEwIryK6XHvb3aYauC5zaSRuluG', '2023-06-07 17:45:36', '2023-06-07 17:45:36', 1);
INSERT INTO `user` VALUES (18, NULL, NULL, NULL, 'test122@gmail.com', '$2y$10$9juhwPTLs7PRVZbKKnREouwykowi5cwMLV6lpJK.v5Pmk7aVmjaxS', '2023-06-07 17:50:14', '2023-06-07 17:50:14', 1);
INSERT INTO `user` VALUES (19, NULL, NULL, NULL, 'test222@gmail.com', '$2y$10$uvm3wULYUFGX01I6FSfju.X3aOgbZTX3rw.5wP8LkaiH6trN1qO76', '2023-06-07 17:51:11', '2023-06-07 17:51:11', 1);
INSERT INTO `user` VALUES (20, NULL, NULL, NULL, 'qqq@gmail.com', '$2y$10$ZnZrjS4wheaspHe0p.Bl2.a5mZ6w3psrNE102LMf4QbSvYT9RC1Ju', '2023-06-08 13:46:00', '2023-06-08 13:46:00', 1);

-- ----------------------------
-- Table structure for user_address
-- ----------------------------
DROP TABLE IF EXISTS `user_address`;
CREATE TABLE `user_address`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `street` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `barangay` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `province` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `zip_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_address
-- ----------------------------
INSERT INTO `user_address` VALUES (2, 10, 'apple', 'sta ana', 'taytay', 'rizal', '1920');

SET FOREIGN_KEY_CHECKS = 1;
