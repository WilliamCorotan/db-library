-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 03:17 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'becca', 'chua', 'qq@gmail.com', '$2y$10$bTvxkL5SKWCxqA8yt2uW2un1sHGJ2PWR1xEqKqQSvoywKLXLYy/zO', 1, '2023-05-31 08:12:36', '2023-06-05 07:24:45'),
(2, '1', 'user', 'u1@gmail.com', '$2y$10$1ptq1v6rMrXhZHPEIX19QuN1GXn2j0t6IIRHSFTrD8lSGyb1kpIWa', 1, '2023-06-05 09:12:09', '2023-06-05 09:12:09'),
(3, '2', 'user', 'u2@gmail.com', '$2y$10$s6KyvDmR4G8GeNjJWhGWou0cOyg2/Tq/oCy4bNK.lJ/hFhDkG75yC', 1, '2023-06-05 09:12:36', '2023-06-05 09:12:36'),
(4, '3', 'user', 'u3@gmail.com', '$2y$10$kQNzRLHSA1Z7XoRob5ZvKuJ/TR9VDOAxoccuZdXlKxB1BidBkvC3W', 1, '2023-06-05 09:12:58', '2023-06-05 09:12:58'),
(5, '4', 'user', 'u4@gmail.com', '$2y$10$jC7hPF6KSXiInlFWuSv7a.RPfB9i06XsKOZi.HLuyCvxxEW2Abb0m', 1, '2023-06-05 09:13:22', '2023-06-05 09:13:22'),
(6, '5', 'user', 'u5@gmail.com', '$2y$10$qgUS5osl0y57Ak5pWUo8A.Z56i5zCCngE7b5GKaxp5qB9ObeUmg2K', 1, '2023-06-05 09:13:35', '2023-06-05 09:13:35'),
(7, '6', 'user ', 'u6@gmail.com', '$2y$10$M8OH6CBM3AWQsK5eIl1QK.i1/Looo1XnnhY5Tb.8ZVpusUNIpFi4e', 1, '2023-06-05 09:13:52', '2023-06-05 09:13:52'),
(8, '7', 'user', 'u7@gmail.com', '$2y$10$FtLPGoagVtoNnhc8vzTiBek0kzVQveEwRk/lgEOzp2b9LEtrIQGs2', 1, '2023-06-05 09:14:25', '2023-06-05 09:14:25'),
(9, '8', 'user', 'u8@gmail.com', '$2y$10$KhaGmESxWTESvd6tsEFEG.1FVPhZk7yEKlsJaJNu11v50fE0EWIe.', 1, '2023-06-05 09:14:48', '2023-06-05 09:14:48'),
(10, '9', 'user', 'u9@gmail.com', '$2y$10$lzkxFv8EbGu2.wn2VqcTSulJNh0rjE.fHm/vNlAZMT0FNARr.Y7AK', 1, '2023-06-05 09:15:08', '2023-06-05 09:15:08'),
(11, '10 ', 'user ', 'u10@gmail.com', '$2y$10$LSvByTd0KPoZ8Wsqx/g/ruGabzxJFRdk/pRoHvzxti9fVhwNnPkFi', 1, '2023-06-05 09:15:21', '2023-06-05 09:15:21'),
(12, '11', 'user', 'u11@gmail.com', '$2y$10$XQ7abuKMQ5Ig4IQgbLVBHuquQAkV1hGKWALk5lR7WykFK9h.KGjFW', 1, '2023-06-05 09:15:44', '2023-06-05 09:15:44'),
(13, '12', 'user', 'u12@gmail.com', '$2y$10$1vUtc5FqKIVMgVqPFoNZ1ezLpDu.MCYzgMXtTWWfRqR5DkY4fmOvK', 1, '2023-06-05 09:16:31', '2023-06-05 09:16:31'),
(14, '13', 'user', 'u13@gmail.com', '$2y$10$eU/8Ko3MU8bo42vPXT23GeP8qISTWzPh3UcUy6fHkEo60UVflYUrG', 1, '2023-06-05 09:17:05', '2023-06-05 09:17:05'),
(15, '14', 'user', 'u14@gmail.com', '$2y$10$ggIiQVyrN1rHT9jvhFZPJuil02BEiqE8Bv3sLAp6NIvaYawN.qcRW', 1, '2023-06-05 09:34:16', '2023-06-05 09:34:16'),
(16, '15', 'user', 'u15@gmail.com', '$2y$10$ii9k4L70A5nMCXuxftJZyuX6iXNB6pDamJGkCvcKPaQScVCrV1j8S', 1, '2023-06-05 09:34:37', '2023-06-05 09:34:37'),
(17, '16', 'user', 'u16@gmail.com', '$2y$10$BVgelqE6AIa/IhSbqnWsUON5DL66pmYbDLyymxb//EGkj66ijUXLO', 1, '2023-06-05 09:35:04', '2023-06-05 09:35:04'),
(18, '17', 'user', 'y17@gmail.com', '$2y$10$Ax8dfZxlNlZqjHtCl9LZP.o4pqJmgG8PazevstxizFIQ2f/C3.Lxi', 1, '2023-06-05 09:35:24', '2023-06-05 09:35:24'),
(19, '18', 'user', 'u18@gmail.com', '$2y$10$FjIp4vODB8X9htabtSrM9edLzvglWZdtw/dRcPSlvlbSyF.SGUAOi', 1, '2023-06-05 09:36:34', '2023-06-05 09:36:34'),
(20, '19', 'user', 'u19@gmail.com', '$2y$10$nwY02bHwmA7ZvxF6kTBZbuEfTt2R1do4nIrD8pw2uxvQQST.OjWe6', 1, '2023-06-05 09:37:24', '2023-06-05 09:37:24'),
(21, '20', 'user', 'u20@gmail.com', '$2y$10$LvPSmPy9g7hmzBx6YijjROOyBCFAE4a42uReXVVHu4N5X2L8qi/le', 1, '2023-06-05 09:37:45', '2023-06-05 09:37:45'),
(22, '21', 'user', 'user21@gmail.com', '$2y$10$JbMb3U3/hC9xxaRhzjhbieRdQdhiFTfWSlFfgtwxUJChv1ktEgXqi', 1, '2023-06-05 09:38:10', '2023-06-05 09:38:10'),
(23, '22', 'user', 'u22@gmail.com', '$2y$10$TR4QtISNKKqNgSZDKHvJ.uVtRCM0FaqYm95NlUKqyXZMqic0tREcm', 1, '2023-06-06 02:36:24', '2023-06-06 02:36:24'),
(24, '23', 'user', 'u23@gmail.com', '$2y$10$.dQsK9ATi77eoSurQ3I0BOUpH8QDzD6n.YBZpH9IUKGIEsce5NCgi', 1, '2023-06-06 02:37:08', '2023-06-06 02:37:08'),
(26, '25', 'user ', 'u25@gmail.com', '$2y$10$6dWSa.xxEArf3u70h9wBAeNH7a8DdfOBqagUmj5QwNTdfs6kp5G2C', 1, '2023-06-06 02:37:47', '2023-06-06 02:37:47'),
(27, '26', 'user', 'u26@gmail.com', '$2y$10$TCu9.e29U1dObTYYJOWkOeRfAe/gQLJHX/.a8YQ/QTENlHaz3V/9K', 1, '2023-06-06 02:38:18', '2023-06-06 02:38:18'),
(28, '27', 'user', 'u27@gmail.com', '$2y$10$Vc0eUu76JWsgIWojPlAmA.c7agUcjxwfPimTLuKGFNmrH5DNh431m', 1, '2023-06-06 02:38:35', '2023-06-06 02:38:35'),
(29, '28', 'user', 'u28@gmail.com', '$2y$10$jk2J3L6wvU6G.ndv34.YwO7nGPmNkmvmJMGSn2AsqwbcW/62s/uxO', 1, '2023-06-06 02:40:54', '2023-06-06 02:40:54'),
(30, '29', 'user', 'u29@gmail.com', '$2y$10$HG7CzK4d41NXXDwCDCrk0ecA.kwV37RTWhM/c9ncxLM0i1AcnCk9y', 1, '2023-06-06 02:41:05', '2023-06-06 02:41:05'),
(33, '32', 'user', 'u32@gmail.com', '$2y$10$XtbKoVbHIE377rB4mumX2.RecpfmUqLnRmJAzdKLmNg50oOnSfr8a', 1, '2023-06-06 05:08:48', '2023-06-06 05:08:48'),
(34, '33', 'user', 'u33@gmail.com', '$2y$10$eUQiNtpV/gKi6yvUHAGwrO7MHhB7higQuDG3XtSPXmV1cU5.AIHma', 1, '2023-06-06 05:09:02', '2023-06-06 05:09:02'),
(35, '34', 'user', 'u34@gmail.com', '$2y$10$GxLoRwBZgW4nkNwtFP4wT.uL/fVJ9uP.ewXDiyMJu7T9dTdTUoM9C', 1, '2023-06-06 05:09:13', '2023-06-06 05:09:13'),
(36, '36', 'user ', 'user36@gmail.com', '$2y$10$pJoucJuCeI1skxae0kLXwOJtpMBi.iIdZaIsXgU5zB1olJUeNo14S', 1, '2023-06-06 05:36:38', '2023-06-06 05:36:38'),
(37, '35', 'user', 'u35@gmail.com', '$2y$10$8vzK0apyhzJ1xuLbHoGF7uzvi3zCZihi1l.RxBKi91crdw96XjpLO', 1, '2023-06-06 05:36:54', '2023-06-06 05:36:54'),
(43, 'William', 'Corotan', 'will@gmail.com', '$2y$10$mNsDKsIuPURVDMo0jO6fCuoI9Q/MURceaOoiRMtiHJE16XPXQZ5hm', 1, '2023-06-07 07:39:14', '2023-06-16 09:11:24'),
(50, '56', 'user', 'u56@gmail.com', '$2y$10$Lt8PQnAAocnasbzpR5kDZOE0IsaVxGRkD/zfTCpuYrea6eKhgpbjO', 1, '2023-06-14 06:03:32', '2023-06-14 06:03:32'),
(51, '57', 'user', 'u57@gmail.com', '$2y$10$rYAKv.lTqiAIofy0k1uoKuHN0gRlTs3cPfd.ExCjiL7xDwudr2.pm', 1, '2023-06-14 06:03:54', '2023-06-14 06:03:54'),
(52, '58', 'user', 'user58@gmail.com', '$2y$10$ykFPyn7OaHHP.KiLOylFr.ra0qpBFWUMDBFeTK9kvU5eLo.pgb8ee', 1, '2023-06-14 06:04:28', '2023-06-16 09:11:28'),
(55, '61', 'user', 'u61@gmail.com', '$2y$10$a.zaEZ4FeSy0NNxuYiIJ0e8AA9R8441MIwORob1GB.meaFGyVvQy6', 1, '2023-06-14 06:07:30', '2023-06-14 06:07:30'),
(56, '62', 'user', 'u62@gmail.com', '$2y$10$O4/guVSD4QLy0/pv/Gm/dulB4ORP32e/IMooEDV17lnsLc3ev2m/y', 1, '2023-06-14 06:08:17', '2023-06-14 06:08:17'),
(57, '63', 'user', 'u63@gmail.com', '$2y$10$gcqO5NtAsUOViEgx5kTfl.qhrUJYofm.qGxmBol8LdALZqKN9OQta', 1, '2023-06-14 06:09:20', '2023-06-14 06:09:20'),
(58, '64', 'user', 'u64@gmail.com', '$2y$10$pexL4xVG2/QJDzGVlU6ANelNG.l.yqajd2Stsj5Y9saMMwblY6gPC', 1, '2023-06-14 06:09:41', '2023-06-14 06:09:41'),
(59, '65', 'user', 'u65@gmail.com', '$2y$10$XG47XtYhdYrfUAajVeg3QueaOLRdi053mTrOnG0rrL7grJBl8Bjcq', 1, '2023-06-14 06:10:58', '2023-06-16 08:06:34'),
(60, '69', 'user', 'u69@gmail.com', '$2y$10$HR7snoXDiXkJ/2dpZqzd3uPqKvfMslLVr5DSR4XxNWGSEq5EGM.6C', 1, '2023-06-14 06:18:06', '2023-06-14 06:18:06'),
(61, 'u', 'u', 'uu@gmail.com', '$2y$10$eRREv7WavabzuZ3/4bqxvu2ddhJYeKbRI7tlM8L86tKEUbFt.PhHe', 1, '2023-06-14 06:22:00', '2023-06-14 06:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`) VALUES
(1, 'Stephen King'),
(2, 'George Orwell'),
(3, 'Ernest Hemingway'),
(4, 'Charles Dickens'),
(5, 'Mark Twain'),
(6, 'J. K. Rowling'),
(7, 'Virginia Woolf'),
(8, 'Agatha Christie'),
(9, 'C. S. Lewis'),
(10, 'J. R. R. Tolkien'),
(11, 'Roald Dahl'),
(12, 'Arthur Conan Doyle'),
(13, 'Kurt Vonnegut'),
(14, 'F. Scott Fitzgerald'),
(15, 'Leo Tolstoy'),
(16, 'Lewis Carroll'),
(17, 'Jane Austen'),
(18, 'J. D. Salinger'),
(19, 'James Joyce'),
(20, 'William Faulkner'),
(21, 'Franz Kafka'),
(22, 'John Steinbeck'),
(23, 'William Shakespeare'),
(24, 'Albert Camus'),
(25, 'Victor Hugo'),
(26, 'Riza Oribe'),
(27, 'Will'),
(28, 'anthony'),
(29, 'Author 1'),
(30, 'Author 2'),
(41, 'Author 3'),
(42, 'William'),
(43, 'Author 4');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext,
  `cover_image` varchar(255) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `call_number` varchar(255) DEFAULT NULL,
  `publish_date` varchar(8) DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `borrow_status_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `description`, `cover_image`, `author_id`, `subject_id`, `call_number`, `publish_date`, `publisher_id`, `borrow_status_id`, `created_at`, `updated_at`) VALUES
(24, 'BS for Bootstrap', 'Book about bootstrap', '8c9ccac1fb1926db73eb516ffa5f87b0.png', 29, 51, '523-878-712-9', '2017', 22, 2, '2023-06-13 08:44:03', '2023-06-19 05:19:22'),
(25, 'Php in PHP', 'Book about PHP', '746f312a6ba65835d256c48406484c27.png', 43, 51, '728-852-143-1', '2019', 23, 2, '2023-06-13 08:46:03', '2023-06-19 03:32:03'),
(26, 'book 1', 'test book', '01-no-cover.jpg', 10, 8, '113-1-2-132-2', '1920', 15, 2, '2023-06-13 08:46:49', '2023-06-19 02:02:57'),
(27, 'book 2', 'test book 2', '01-no-cover.jpg', 2, 18, '682-214-522-0', '2001', 15, 2, '2023-06-13 08:47:37', '2023-06-19 03:33:02'),
(28, 'book 3', 'test book 3', '01-no-cover.jpg', 18, 7, '923-522-153-8', '1872', 24, 2, '2023-06-13 08:49:09', '2023-06-19 05:24:29'),
(29, 'book 4', 'neat book!', '01-no-cover.jpg', 43, 1, '098-251-288-9', '2001', 15, 2, '2023-06-14 06:30:26', '2023-06-19 05:25:06'),
(32, 'bookkk', 'test', '01-no-cover.jpg', 43, 1, '111-222-333-1', '2023', 15, 2, '2023-06-14 06:54:00', '2023-06-19 05:26:09'),
(33, 'Demo Book', 'demo book', '01-no-cover.jpg', 41, 1, '222-323-142-1', '2022', 19, 2, '2023-06-14 10:04:06', '2023-06-19 05:28:07'),
(34, 'Askaban', 'demo book', '7d78305526aadd21e2e0f95831735bc0.jpg', 6, 8, '412-451-233-5', '1999', 25, 2, '2023-06-14 10:05:55', '2023-06-19 05:30:58'),
(36, 'Pilgrimages', 'test description', '01-no-cover.jpg', 41, 8, '204-212-344-1', '2012', 19, 2, '2023-06-16 01:14:46', '2023-06-19 05:44:18'),
(37, 'a updated 1', 'a', '01-no-cover.jpg', 43, 1, 'a', '2012', 19, 2, '2023-06-16 01:17:55', '2023-06-19 05:45:53'),
(38, 'asd', 'a', '01-no-cover.jpg', 28, 2, 'a', 'a', 19, 2, '2023-06-16 01:18:32', '2023-06-19 05:49:31'),
(39, 'A day in a life...', 'a', '01-no-cover.jpg', 7, 2, 'a', 'a', 19, 2, '2023-06-16 01:19:59', '2023-06-19 06:39:47'),
(40, 'test', 'test ', '01-no-cover.jpg', 22, 19, '000-000-000-0', '2019', 15, 2, '2023-06-19 06:05:37', '2023-06-19 06:43:45'),
(41, '2', '2', '01-no-cover.jpg', 30, 1, '222-123-412-5', '2012', 15, 2, '2023-06-19 06:07:15', '2023-06-19 06:45:09'),
(42, 'q', 'q', '01-no-cover.jpg', 3, 1, '123-223-332-1', '2011', 15, 2, '2023-06-19 06:47:11', '2023-06-19 06:51:42'),
(43, 'S', 'S', '01-no-cover.jpg', 1, 1, '123-132-123-1', '2023', 15, 1, '2023-06-19 06:53:34', '2023-06-20 08:23:34'),
(44, 'd', 'd', '01-no-cover.jpg', 11, 3, '123-123-123-2', '2022', 15, 1, '2023-06-19 06:55:55', '2023-06-20 08:22:52'),
(45, 'book 7', 'test', '01-no-cover.jpg', 5, 51, '223-244-151-4', '2001', 15, 1, '2023-06-19 07:03:10', '2023-06-20 09:00:59'),
(46, 'e', 'e', '01-no-cover.jpg', 3, 1, '111-111-111-1', '2012', 15, 1, '2023-06-19 08:52:59', '2023-06-19 08:52:59'),
(47, 'test book', 'test', '01-no-cover.jpg', 8, 1, '444-444-444-4', '2013', 19, 1, '2023-06-20 06:19:09', '2023-06-20 06:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_status`
--

CREATE TABLE `borrow_status` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `borrow_status`
--

INSERT INTO `borrow_status` (`id`, `code`) VALUES
(1, 'available'),
(2, 'borrowed');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `name`) VALUES
(15, 'ABC'),
(16, 'SDF'),
(17, 'SDF'),
(18, 'SDF'),
(19, 'ASD'),
(20, 'QWE'),
(21, 'JSC'),
(22, 'BSMD'),
(23, 'PHPC'),
(24, 'GCF'),
(25, 'Bloomsbury');

-- --------------------------------------------------------

--
-- Table structure for table `return_status`
--

CREATE TABLE `return_status` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_status`
--

INSERT INTO `return_status` (`id`, `code`) VALUES
(1, 'Not Returned'),
(2, 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `code`) VALUES
(1, 'active'),
(2, 'in-active');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`) VALUES
(1, 'arts_architecture'),
(2, 'arts_art_history'),
(3, 'arts_design'),
(4, 'arts_fashion'),
(5, 'arts_film'),
(6, 'arts_graphic_design'),
(7, 'arts_music'),
(8, 'fiction_fantasy'),
(9, 'fiction_historical_fiction'),
(10, 'fiction_horror'),
(11, 'fiction_magic'),
(12, 'fiction_mystery'),
(13, 'fiction_romance'),
(14, 'fiction_science_fiction'),
(15, 'fiction_thriller'),
(16, 'science_biology'),
(17, 'science_chemistry'),
(18, 'science_physics'),
(19, 'science_technology'),
(20, 'mathematics_calculus'),
(21, 'mathematics_statistics'),
(22, 'mathematics_trigonometry'),
(23, 'mathematics_geometry'),
(25, 'mathematics_algebra'),
(26, 'mathematics_arithmetic'),
(27, 'business_and_finance_management'),
(28, 'business_and_finance_entrepreneurship'),
(29, 'business_and_finance_economics'),
(30, 'business_and_finance_finance'),
(31, 'children_kid_books'),
(32, 'children_baby_books'),
(33, 'children_bedtime_books'),
(34, 'children_picture_books'),
(35, 'history_archeology'),
(36, 'history_anthropology'),
(37, 'history_social_life_and_customs'),
(38, 'social_science_anthropology'),
(39, 'social_science_religion'),
(40, 'social_science_political_science'),
(41, 'social_science_psychology'),
(42, 'textbooks_history'),
(43, 'textbooks_mathematics'),
(44, 'textbooks_geography'),
(45, 'textbooks_psychology'),
(46, 'textbooks_algebra'),
(47, 'textbooks_education'),
(48, 'textbooks_business_and_economics'),
(49, 'textbooks_science'),
(50, 'textbooks_language_and_literature'),
(51, 'textbooks_computer_science'),
(52, ''),
(53, 'dasd'),
(54, ''),
(55, ''),
(56, ''),
(57, ''),
(58, ''),
(59, ''),
(60, ''),
(61, ''),
(62, ''),
(63, ''),
(64, ''),
(65, ''),
(66, ''),
(67, ''),
(68, ''),
(69, ''),
(70, ''),
(71, ''),
(72, ''),
(73, ''),
(74, ''),
(75, '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `return_status_id` int(11) DEFAULT '1',
  `borrow_date` timestamp NULL DEFAULT NULL,
  `due_date` timestamp NULL DEFAULT NULL,
  `return_date` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(16) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `book_id`, `return_status_id`, `borrow_date`, `due_date`, `return_date`, `user_id`, `first_name`, `last_name`, `contact_number`, `street`, `barangay`, `city`, `province`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 25, 1, '2023-06-18 16:00:00', '2023-06-25 16:00:00', NULL, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-19 03:23:27', '2023-06-19 03:23:27'),
(2, 25, 1, '2023-06-18 16:00:00', '2023-06-25 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 03:27:44', '2023-06-19 03:27:44'),
(3, 25, 1, '2023-06-18 16:00:00', '2023-06-25 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 03:32:03', '2023-06-19 03:32:03'),
(4, 27, 1, '2023-06-18 16:00:00', '2023-06-25 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 03:33:02', '2023-06-19 03:33:02'),
(5, 24, 1, '2023-06-18 16:00:00', '2023-06-25 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 05:19:22', '2023-06-19 05:19:22'),
(6, 28, 1, '2023-06-20 16:00:00', '2023-06-27 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 05:24:29', '2023-06-19 05:24:29'),
(7, 29, 1, '2023-06-20 16:00:00', '2023-06-27 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 05:25:06', '2023-06-19 05:25:06'),
(8, 32, 1, '2023-06-19 16:00:00', '2023-06-26 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 05:26:09', '2023-06-19 05:26:09'),
(9, 33, 1, '2023-06-19 16:00:00', '2023-06-26 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 05:28:07', '2023-06-19 05:28:07'),
(10, 34, 1, '2023-06-21 16:00:00', '2023-06-28 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 05:30:58', '2023-06-19 05:30:58'),
(11, 36, 1, '2023-06-20 16:00:00', '2023-06-27 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 05:44:18', '2023-06-19 05:44:18'),
(12, 37, 1, '2023-06-20 16:00:00', '2023-06-21 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 05:45:53', '2023-06-19 05:45:53'),
(13, 38, 1, '2023-06-19 16:00:00', '2023-06-28 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 05:49:31', '2023-06-19 05:49:31'),
(14, 39, 1, '2023-06-18 16:00:00', '2023-06-25 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 06:39:47', '2023-06-19 06:39:47'),
(19, 40, 1, '2023-06-19 16:00:00', '2023-06-19 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 06:43:45', '2023-06-19 06:43:45'),
(20, 41, 1, '2023-06-19 16:00:00', '2023-06-26 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 06:45:09', '2023-06-19 06:45:09'),
(21, 42, 1, '2023-06-26 16:00:00', '2023-06-28 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 06:51:42', '2023-06-19 06:51:42'),
(22, 43, 2, '2023-07-05 16:00:00', '2023-07-06 16:00:00', NULL, 25, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 06:54:15', '2023-06-20 08:23:34'),
(23, 44, 2, '2023-06-22 16:00:00', '2023-06-29 16:00:00', NULL, 25, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 06:56:19', '2023-06-20 08:22:52'),
(24, 45, 2, '2023-06-28 16:00:00', '2023-06-29 16:00:00', NULL, 24, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2023-06-19 07:03:28', '2023-06-20 08:22:43'),
(25, 45, 2, '2023-06-19 16:00:00', '2023-06-26 16:00:00', NULL, 22, 'emma', 'watson', '09123456789', 'street', 'barangay', 'city', 'province', '1001', '2023-06-20 08:26:59', '2023-06-20 08:41:26'),
(26, 45, 2, '2023-06-19 16:00:00', '2023-06-26 16:00:00', NULL, 22, 'emma', 'watson', '09123456789', 'street', 'barangay', 'city', 'province', '1001', '2023-06-20 09:00:12', '2023-06-20 09:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(16) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_id` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `contact_number`, `email`, `password`, `created_at`, `updated_at`, `status_id`) VALUES
(5, 'quiyana', 'ww', '09123456789', 'qq@gmail.com', '$2y$10$HovspGi67Li0VKK6K4ll7efICXrLnc5yS9eLm5YzGGEU9KvhrJoLW', '2023-06-02 02:04:46', '2023-06-16 05:22:50', 1),
(6, 'firstname', 'lastname', '09123456789', 'test@gmail.com', '$2y$10$2fC40iorXpNlNhoP8Oigx.6ivUz6pXZL.5IuPjEMhMgy3BnDfxbIy', '2023-06-02 02:50:00', '2023-06-19 02:19:01', 2),
(7, NULL, NULL, NULL, 't@gmail.com', '$2y$10$eCUNPCEgYo5sh1kUbP.xD.0nGORLXl9QnGWnrkNMKJsmJvYahXx0y', '2023-06-02 07:55:16', '2023-06-07 05:24:38', 2),
(8, NULL, NULL, NULL, 'test2@gmail.com', '$2y$10$mNCxC5C8GlSrKQQBldFPvufGnXBshpabOPmkogQegVLfeP.8wmCea', '2023-06-02 08:53:09', '2023-06-07 05:24:14', 1),
(9, NULL, NULL, NULL, 'a@gmail.com', '$2y$10$Ng9CvElX/N.4XfKJdzxD3OS8O47CRibUBtUNjvlz.3uJAcP3Fgdzm', '2023-06-02 09:41:42', '2023-06-07 05:24:40', 2),
(10, 'mary', 'cruz', '09123456789', 'maryjane@gmail.copm', '$2y$10$HvTd3zRinT28TxUXqh3K0ewfAIaBDvvd25N3d/4jeWeUmAtOO.eWG', '2023-06-02 10:02:14', '2023-06-07 05:24:15', 1),
(11, NULL, NULL, NULL, 'test1@gmail.com', '$2y$10$mIf.oKQv9gSdYoayPL.6uOHY0ihg1rX9PyS.F6/MXlpu.CyWF7m5m', '2023-06-05 01:18:19', '2023-06-07 05:24:56', 2),
(12, NULL, NULL, NULL, 'test5@gmail.com', '$2y$10$CLq5CFCy7/xllCSsKnno2u7BOvaORQl5Lbi3Q/nLxvzoiUyyUSruK', '2023-06-05 06:40:26', '2023-06-07 05:24:46', 2),
(13, NULL, NULL, NULL, 'test12@gmail.com', '$2y$10$O6BSvQmbO7yNXkAIc4jrreop4XuisfYNejoGtJoIjBMQsa2Fv5FuK', '2023-06-05 06:41:12', '2023-06-07 05:24:44', 2),
(14, NULL, NULL, NULL, 'a12@gmail.com', '$2y$10$4ec2eSRM0X7EHHvRutXpDe9Wm.WPFyXi.VUvTnoq7URu86OSA250S', '2023-06-05 06:41:40', '2023-06-07 05:24:16', 1),
(15, NULL, NULL, NULL, 'qwe@gmail.com', '$2y$10$t6yQn5.GE0BHF4Pi9NqbieKAe2J7MUe1NOPH5IPnYp6tptUtZynH.', '2023-06-05 06:42:19', '2023-06-07 05:25:00', 2),
(16, NULL, NULL, NULL, 'tsx@gmail.com', '$2y$10$vHhtQwjVOUk9VNg8FoU7HezNvzEeCAZ/b0nLCsEDfTJbfKphZH9wK', '2023-06-05 07:28:31', '2023-06-07 05:24:17', 1),
(17, NULL, NULL, NULL, 'test11@gmail.com', '$2y$10$fx78GBWn4URoja/ft5V7aOkjzGyEwIryK6XHvb3aYauC5zaSRuluG', '2023-06-07 09:45:36', '2023-06-07 09:45:36', 1),
(18, NULL, NULL, NULL, 'test122@gmail.com', '$2y$10$9juhwPTLs7PRVZbKKnREouwykowi5cwMLV6lpJK.v5Pmk7aVmjaxS', '2023-06-07 09:50:14', '2023-06-07 09:50:14', 1),
(19, NULL, NULL, NULL, 'test222@gmail.com', '$2y$10$uvm3wULYUFGX01I6FSfju.X3aOgbZTX3rw.5wP8LkaiH6trN1qO76', '2023-06-07 09:51:11', '2023-06-07 09:51:11', 1),
(20, NULL, NULL, NULL, 'qqq@gmail.com', '$2y$10$afrLTJ1Zxjjkf88wlE3K2OOKU5jpqVfWwQkeSycpCXZJlbJ4Fv/Ta', '2023-06-08 05:46:00', '2023-06-14 06:53:27', 1),
(21, 'Stella', 'Mei', '09123456789', 'ww@gmail.com', '$2y$10$Snw8BILT/esQtdJftMmzUeYtW55bMGdeSmNuZmmwPlWm0mPetbdBu', '2023-06-16 05:41:29', '2023-06-16 08:31:44', 1),
(22, 'emma', 'watson', '09123456789', 'asd@gmail.com', '$2y$10$wTv0pt0ASBLpwCMmIwyu1OZpGoqGIXszPl8OFOVczXnQ3OfiIgToW', '2023-06-16 09:01:31', '2023-06-16 09:03:54', 1),
(23, 'q', 'q', 'q', 'we@gmail.com', '$2y$10$xLLc1fzfrPSjjjWJ6Adz7u0Mhompetm7qMKNQ8AsF93kYjo0YtM6u', '2023-06-19 01:59:18', '2023-06-19 03:16:51', 1),
(24, 'q', 'q', 'q', 'wwe@gmail.com', '$2y$10$DcJqp5Ix7/oYlbpSCiTkfeX0GV.p8zyFGsSXpXIkODfVHdKCmTmtq', '2023-06-19 03:21:22', '2023-06-19 03:32:03', 1),
(25, 'q', 'q', 'q', 'qw@gmail.com', '$2y$10$XoabbStErzH1Choi0DACl.gdhN/OTSj89CmGdzt9Cro5kFakaFFQS', '2023-06-19 06:43:09', '2023-06-19 06:54:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `street` longtext,
  `barangay` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `street`, `barangay`, `city`, `province`, `zip_code`) VALUES
(2, 10, 'apple', 'sta ana', 'taytay', 'rizal', '1920'),
(3, 5, 'street', 'barangay', 'city', 'province', '1001'),
(4, 5, 'street', 'barangay', 'city', 'province', '1001'),
(5, 21, 'street', 'barangay', 'city', 'province', '1001'),
(6, 6, 'street', 'barangay', 'city', 'province', '1001'),
(7, 23, 'q', 'q', 'q', 'q', 'q'),
(8, 23, 'q', 'q', 'q', 'q', 'q'),
(9, 23, 'q', 'q', 'q', 'q', 'q'),
(10, 23, 'q', 'q', 'q', 'q', 'q'),
(11, 24, 'q', 'q', 'q', 'q', 'q'),
(13, 25, 'q', 'q', 'q', 'q', 'q'),
(14, 22, 'street', 'barangay', 'city', 'province', '1001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `author_id` (`author_id`) USING BTREE,
  ADD KEY `subject_id` (`subject_id`) USING BTREE,
  ADD KEY `publisher_id` (`publisher_id`) USING BTREE,
  ADD KEY `borrow_status_id` (`borrow_status_id`) USING BTREE;

--
-- Indexes for table `borrow_status`
--
ALTER TABLE `borrow_status`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `return_status`
--
ALTER TABLE `return_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `return_status_id` (`return_status_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `borrow_status`
--
ALTER TABLE `borrow_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `return_status`
--
ALTER TABLE `return_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`),
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
  ADD CONSTRAINT `book_ibfk_4` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`),
  ADD CONSTRAINT `book_ibfk_5` FOREIGN KEY (`borrow_status_id`) REFERENCES `borrow_status` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`return_status_id`) REFERENCES `return_status` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
