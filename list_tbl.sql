-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 22-06-15 03:16
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
  `list_title` varchar(100) NOT NULL,
  `list_content` text NOT NULL,
  `list_img` text NOT NULL,
  `owner` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `list_tbl`
--

INSERT INTO `list_tbl` (`sn`, `list_title`, `list_content`, `list_img`, `owner`) VALUES
(1, '첫번째 글', '이글은 2022년 06월 15일 작성된 글 입니다.', '1_1&1_2', 'wnsdn'),
(2, '두번빼 글', '이글도 2022년 06월 15일 작성되었습니다.', '2_1&2_2', 'wnsdn'),
(3, '세번째 글', '이글 역시 오늘 작성됨', '', 'wnsdn'),
(4, '깁급 공지', '내가 여기 짱이다. 다 덤벼 이 시키들아', '', 'admin'),
(5, '여러분에게 할 중요한 얘기가 있어요...', '어쩔티비', '', 'wnsdn2');

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
