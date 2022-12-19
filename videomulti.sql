-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 06:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videomulti`
--

-- --------------------------------------------------------

--
-- Table structure for table `draft`
--

CREATE TABLE `draft` (
  `draft_id` int(100) NOT NULL,
  `video_urls` varchar(1000) NOT NULL,
  `noofvideos` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `draft`
--

INSERT INTO `draft` (`draft_id`, `video_urls`, `noofvideos`, `user_id`, `date`) VALUES
(10, 'https://www.youtube.com/watch?v=o9PY6NsB3_E$https://www.youtube.com/watch?v=J7MYJ8Kxhwc', 2, 1, '06/30/2020 12:50:41'),
(12, 'https://www.youtube.com/watch?v=o9PY6NsB3_E$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J5iyBxIkEMk', 4, 1, '06/30/2020 05:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `likesdislikes`
--

CREATE TABLE `likesdislikes` (
  `like_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `video_id` int(100) NOT NULL,
  `likes` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likesdislikes`
--

INSERT INTO `likesdislikes` (`like_id`, `user_id`, `video_id`, `likes`) VALUES
(1, 1, 14, 0),
(2, 1, 37, 1),
(3, 1, 34, 0),
(4, 1, 29, 1),
(5, 1, 25, 0),
(6, 1, 26, 1),
(7, 1, 27, 1),
(8, 10, 37, 0),
(9, 10, 29, 1),
(10, 10, 27, 1),
(11, 1, 54, 1),
(12, 1, 21, 1),
(13, 1, 44, 0);

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE `urls` (
  `id` int(11) NOT NULL,
  `url1` varchar(100) NOT NULL,
  `url2` varchar(100) NOT NULL,
  `url3` varchar(100) NOT NULL,
  `url4` varchar(100) NOT NULL,
  `url5` varchar(100) NOT NULL,
  `url6` varchar(100) NOT NULL,
  `url7` varchar(100) NOT NULL,
  `url8` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `urls`
--

INSERT INTO `urls` (`id`, `url1`, `url2`, `url3`, `url4`, `url5`, `url6`, `url7`, `url8`, `user_id`) VALUES
(1, 'https://www.youtube.com/watch?v=l02aJVKJoLs', 'https://www.youtube.com/watch?v=l02aJVKJoLs', 'https://www.youtube.com/watch?v=l02aJVKJoLs', 'https://www.youtube.com/watch?v=l02aJVKJoLs', 'https://www.youtube.com/watch?v=l02aJVKJoLs', 'https://www.youtube.com/watch?v=l02aJVKJoLs', 'https://www.youtube.com/watch?v=l02aJVKJoLs', 'https://www.youtube.com/watch?v=l02aJVKJoLs', 0),
(3, 'https://www.youtube.com/watch?v=raYnzbIyOfE', '', '', '', '', '', '', '', 0),
(4, 'https://www.youtube.com/watch?v=raYnzbIyOfE', '', '', '', '', '', '', '', 0),
(5, '', '', '', '', '', '', '', '', 1),
(6, '', '', '', '', '', '', '', '', 1),
(7, 'https://www.youtube.com/watch?v=raYnzbIyOfE', '', '', '', '', '', '', '', 1),
(8, '', '', '', '', '', '', '', '', 1),
(9, '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `aboutme` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `name`, `email`, `phone`, `password`, `address`, `city`, `country`, `aboutme`, `image`, `age`) VALUES
(1, '@arsalanak', 'Arsalan', 'admin@admin.com', '12345678', '1234', 'abc', 'abc', 'abc', 'abc', '../images/photo.png', '2000-07-28'),
(10, '@arsalan', 'Arsalan', 'user@user.com', '12345678', '123', 'abcsdasdas', 'abcsadasd', 'abc', 'abcsadsad', '../images/9.jpg', '2006-07-28'),
(11, '@ali', 'ali', 'ali@ali.com', '12345678', '123', 'abc', 'abc', 'abc', 'abc', '../images/photo.png', '2000-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `userviews`
--

CREATE TABLE `userviews` (
  `view_id` int(100) NOT NULL,
  `video_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userviews`
--

INSERT INTO `userviews` (`view_id`, `video_id`, `user_id`) VALUES
(10, 14, 1),
(11, 37, 1),
(12, 37, 11),
(13, 30, 11),
(14, 43, 11),
(15, 20, 11),
(16, 44, 1),
(17, 27, 1),
(18, 25, 1),
(19, 28, 1),
(20, 54, 1),
(21, 21, 1),
(22, 16, 1),
(23, 26, 1),
(24, 22, 1),
(25, 34, 1),
(26, 46, 1),
(27, 45, 1),
(28, 49, 1),
(29, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `video_urls` varchar(500) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `restriction` varchar(100) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `noofvideos` varchar(100) NOT NULL,
  `views` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `user_id`, `video_urls`, `title`, `description`, `tags`, `restriction`, `thumbnail`, `status`, `date`, `noofvideos`, `views`) VALUES
(14, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc', 'songs', 'Awesom', '#songs #gha #gha #gha', '18 Plus', 'images/photo.png', 'public', '06/26/2020 11:00:45', '2', 1),
(16, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'sasdasa', '#songs #gha #gha #gha', '18 Plus', 'images/img-01.png', 'public', '06/26/2020 12:31:08', '8', 2),
(19, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'sadasd', '#songs #gha #gha #gha', '18 Plus', 'images/img-01.png', 'public', '06/26/2020 12:34:00', '4', 1),
(20, 1, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'sadasd', '#songs #gha #gha #gha', '18 Plus', 'images/img-01.png', 'public', '06/26/2020 12:34:00', '4', 2),
(21, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'sasdasa', '#songs #gha #gha #gha', '18 Plus', 'images/img-01.png', 'public', '06/26/2020 12:31:08', '8', 2),
(22, 1, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'awesom', '#songs #gha #gha #gha', '18 Plus', 'images/img-03.png', 'public', '06/26/2020 01:14:35', '7', 2),
(23, 1, 'https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'asdas', '#songs #gha #gha #gha', '18 Plus', 'images/img-03.png', 'public', '06/26/2020 01:15:12', '6', 1),
(25, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'sasdasa', '#songs #gha #gha #gha', '18 Plus', 'images/img-01.png', 'public', '06/26/2020 12:31:08', '8', 2),
(26, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'awesom', '#songs #gha #gha #gha', '18 Plus', 'images/img-03.png', 'public', '06/26/2020 01:14:35', '7', 2),
(27, 10, 'https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'asdas', '#songs #gha #gha #gha', '18 Plus', 'images/img-03.png', 'public', '06/26/2020 01:15:12', '6', 2),
(28, 1, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', '5-split songs', 'awesome', '#songs #gha #gha #gha', '18 Plus', 'images/img-03.png', 'public', '06/26/2020 01:23:28', '5', 2),
(29, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', '5-split songs', 'awesome', '#songs #gha #gha #gha', '18 Plus', 'images/img-03.png', 'public', '06/26/2020 01:23:28', '5', 1),
(31, 1, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=ZqJZyxVdLZA', 'songs', 'awesom', '#songs #gha #gha #gha', '18 Plus', 'images/photo.png', 'public', '06/29/2020 02:39:05', '3', 1),
(34, 1, 'https://www.youtube.com/watch?v=o9PY6NsB3_E$https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=hoNb6HuNmU0', 'Awesome Songs', 'How are yoiii hh ash', '#songs #gha #gha #gha', '18 Plus', 'images/photo.png', 'public', '06/29/2020 02:25:30', '3', 2),
(35, 1, 'https://www.youtube.com/watch?v=ktf4y-sYboE$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'sadas', '#songs #gha #gha #gha', '18 plus', 'images/photo.png', 'private', '06/29/2020 02:31:44', '2', 1),
(36, 1, 'https://www.youtube.com/watch?v=o9PY6NsB3_E$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA', 'songs', 'adsad', '#songs #gha #gha #gha', '18 Plus', 'images/photo.png', 'public', '06/30/2020 11:58:49', '3', 1),
(37, 1, 'https://www.youtube.com/watch?v=o9PY6NsB3_E$https://www.youtube.com/watch?v=J7MYJ8Kxhwc', 'songs', 'saadas', '#songs #gha #gha #gha', '18 Plus', 'images/photo.png', 'public', '06/30/2020 11:59:52', '2', 3),
(38, 1, 'https://www.youtube.com/watch?v=o9PY6NsB3_E$https://www.youtube.com/watch?v=J7MYJ8Kxhwc', 'songs', 'sadas', '#songs #gha #gha #gha', '18 plus', 'images/photo.png', 'private', '06/30/2020 12:02:09', '2', 1),
(41, 1, 'https://www.youtube.com/watch?v=o9PY6NsB3_E$https://www.youtube.com/watch?v=J7MYJ8Kxhwc', 'songs', 'asdas', '#songs #gha #gha #gha', '18 plus', 'images/photo.png', 'private', '06/30/2020 12:24:04', '2', 1),
(42, 1, 'https://www.youtube.com/watch?v=o9PY6NsB3_E$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'sadas', '#songs #gha #gha #gha', '18 plus', 'images/photo.png', 'private', '06/30/2020 12:35:20', '6', 1),
(43, 1, 'https://www.youtube.com/watch?v=o9PY6NsB3_E$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA', 'songs', 'sdasd', '#songs #gha #gha #gha', '18 plus', 'images/photo.png', 'public', '06/30/2020 02:26:40', '3', 2),
(44, 1, 'https://www.youtube.com/watch?v=o9PY6NsB3_E$https://www.youtube.com/watch?v=J7MYJ8Kxhwc', 'songs', 'asdsd', '#songs #gha #gha #gha', 'under 18', 'images/photo.png', 'public', '06/30/2020 03:37:49', '2', 2),
(45, 1, 'https://www.youtube.com/watch?v=CLk2ol_AAi8$https://www.youtube.com/watch?v=g6BprD_IIl4$https://www.youtube.com/watch?v=ZEPIu4GA5So$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', '5 split', '#songs #gha #gha #gha', 'under 18', 'images/photo.png', 'public', '07/01/2020 11:36:09', '5', 1),
(46, 1, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'sadasd', '#songs #gha #gha #gha', '18 Plus', 'images/img-01.png', 'public', '06/26/2020 12:34:00', '4', 3),
(47, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'sadasd', '#songs #gha #gha #gha', '18 Plus', 'images/img-01.png', 'public', '06/26/2020 12:34:00', '4', 1),
(48, 1, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', '5-split songs', 'awesome', '#songs #gha #gha #gha', '18 Plus', 'images/img-03.png', 'public', '06/26/2020 01:23:28', '5', 2),
(49, 1, 'https://www.youtube.com/watch?v=o9PY6NsB3_E$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'sadas', '#songs #gha #gha #gha', '18 Plus', 'images/photo.png', 'public', '07/01/2020 11:42:01', '6', 2),
(50, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'awesom', '#songs #gha #gha #gha', '18 Plus', 'images/img-03.png', 'public', '06/26/2020 01:14:35', '7', 2),
(51, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'awesom', '#songs #gha #gha #gha', '18 Plus', 'images/img-03.png', 'public', '06/26/2020 01:14:35', '7', 1),
(52, 1, 'https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'asdas', '#songs #gha #gha #gha', '18 Plus', 'images/img-03.png', 'public', '06/26/2020 01:15:12', '6', 1),
(53, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc$https://www.youtube.com/watch?v=ZqJZyxVdLZA$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk$https://www.youtube.com/watch?v=J5iyBxIkEMk', 'songs', 'sasdasa', '#songs #gha #gha #gha', '18 Plus', 'images/img-01.png', 'public', '06/26/2020 12:31:08', '8', 2),
(54, 1, 'https://www.youtube.com/watch?v=o9PY6NsB3_E$https://www.youtube.com/watch?v=J7MYJ8Kxhwc', 'songs', '2 split', '#songs #gha #gha #gha', 'under 18', 'images/photo.png', 'public', '07/01/2020 11:47:32', '2', 1),
(57, 1, 'https://www.youtube.com/watch?v=o9PY6NsB3_E$https://www.youtube.com/watch?v=J7MYJ8Kxhwc', 'songs', '2 split', '#songs #gha #gha #gha', 'under 18', 'images/stylist-2.jpg', 'public', '07/01/2020 05:26:47', '2', 0),
(58, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc', 'songs', 'Awesom', '#songs #gha #gha #gha', '18 Plus', 'images/photo.png', 'public', '06/26/2020 11:00:45', '2', 1),
(59, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc', 'songs', 'Awesom', '#songs #gha #gha #gha', '18 Plus', 'images/photo.png', 'public', '06/26/2020 11:00:45', '2', 1),
(60, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc', 'songs', 'Awesom', '#songs #gha #gha #gha', '18 Plus', 'images/photo.png', 'public', '06/26/2020 11:00:45', '2', 1),
(61, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc', 'songs', 'Awesom', '#songs #gha #gha #gha', '18 Plus', 'images/photo.png', 'public', '06/26/2020 11:00:45', '2', 1),
(62, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc', 'songs', 'Awesom', '#songs #gha #gha #gha', '18 Plus', 'images/photo.png', 'public', '06/26/2020 11:00:45', '2', 1),
(63, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc', 'songs', 'Awesom', '#songs #gha #gha #gha', '18 Plus', 'images/photo.png', 'public', '06/26/2020 11:00:45', '2', 1),
(64, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc', 'songs', 'Awesom', '#songs #gha #gha #gha', '18 Plus', 'images/photo.png', 'public', '06/26/2020 11:00:45', '2', 1),
(65, 10, 'https://www.youtube.com/watch?v=hoNb6HuNmU0$https://www.youtube.com/watch?v=J7MYJ8Kxhwc', 'songs', 'Awesom', '#songs #gha #gha #gha', '18 Plus', 'images/photo.png', 'public', '06/26/2020 11:00:45', '2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `draft`
--
ALTER TABLE `draft`
  ADD PRIMARY KEY (`draft_id`);

--
-- Indexes for table `likesdislikes`
--
ALTER TABLE `likesdislikes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `userviews`
--
ALTER TABLE `userviews`
  ADD PRIMARY KEY (`view_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `draft`
--
ALTER TABLE `draft`
  MODIFY `draft_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `likesdislikes`
--
ALTER TABLE `likesdislikes`
  MODIFY `like_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `userviews`
--
ALTER TABLE `userviews`
  MODIFY `view_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
