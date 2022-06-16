-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 22-06-16 09:48
-- 서버 버전: 10.4.24-MariaDB
-- PHP 버전: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `sdhsforest`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `list_tbl`
--

CREATE TABLE `list_tbl` (
  `sn` int(11) NOT NULL,
  `list_title` text NOT NULL,
  `list_content` text NOT NULL,
  `list_img` text NOT NULL,
  `owner` text NOT NULL,
  `list_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `list_tbl`
--

INSERT INTO `list_tbl` (`sn`, `list_title`, `list_content`, `list_img`, `owner`, `list_date`) VALUES
(1, '제목1', 'ㄷㅈㄱㅁㄷㄴㄹㅇㅁㄴㄹㅇㅁㄴㄹㅇ', '1_1&1_2', 'wnsdn', '2022-06-16 04:08:16'),
(3, 'rqwerwqe', 'werqrweqrqw', '', 'wnsdn2', '2022-06-16 06:58:53'),
(5, 'ewq', 'ewqewqeqw', '', 'wnsdn2', '2022-06-16 07:33:46');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `list_tbl`
--
ALTER TABLE `list_tbl`
  ADD PRIMARY KEY (`sn`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `list_tbl`
--
ALTER TABLE `list_tbl`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
