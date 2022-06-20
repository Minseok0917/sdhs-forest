-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 22-06-20 04:19
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
-- 테이블 구조 `comments_tbl`
--

CREATE TABLE `comments_tbl` (
  `sn` int(11) NOT NULL,
  `list_sn` int(11) NOT NULL,
  `owner` text NOT NULL,
  `deep` int(11) NOT NULL,
  `comments` text NOT NULL,
  `comments_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `parent_sn` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `comments_tbl`
--

-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `comments_tbl`
--
ALTER TABLE `comments_tbl`
  ADD PRIMARY KEY (`sn`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `comments_tbl`
--
ALTER TABLE `comments_tbl`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
