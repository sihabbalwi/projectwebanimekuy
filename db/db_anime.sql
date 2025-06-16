-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2025 at 03:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_anime`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_anime`
--

CREATE TABLE `tb_anime` (
  `id_anime` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_anime`
--

INSERT INTO `tb_anime` (`id_anime`, `judul`, `deskripsi`, `image`, `status`, `genre`) VALUES
(2, 'Video Meme', 'Meme random ', 'https://th.bing.com/th/id/OIP.EX4y_UA1jMehXj-JW9WQIgHaFi?rs=1&pid=ImgDetMain', 'Ongoing', 'meme|politik|drama|komedi|game|random|'),
(3, 'Anime Page', 'Anime random ', 'https://th.bing.com/th/id/OIP.f0CkEgggNHBHc_P5UIjHagHaEK?rs=1&pid=ImgDetMain', 'Ongoing', 'isekai|adventure|fantasy|romance|demons|magic|action|komedi|'),
(4, 'Dr Stone', 'Dr Stone', 'https://th.bing.com/th/id/OIP.uKphc6U5KlSytiBmrdAUhwHaLH?rs=1&pid=ImgDetMain', 'Completed', 'komedi|drama'),
(5, 'Naruto', 'Naruto', 'https://th.bing.com/th/id/R.12c5319798636a7e627c98bf5af718d5?rik=kurhOq6o0YdA2g&riu=http%3a%2f%2fwallpapercave.com%2fwp%2fvgK96jl.jpg&ehk=DrDF4MryI6%2fHrBefn2l%2bafIhq5CiPTfBAXuT7LU3B6o%3d&risl=&pid=ImgRaw&r=0', 'Complete', 'action|drama'),
(7, 'Make Heroine ga Oosugiru!', 'Heroine yang tertolak', 'https://cdn.myanimelist.net/images/anime/1332/143513l.jpg', 'Completed', 'drama|romance|school|slice of life');

-- --------------------------------------------------------

--
-- Table structure for table `tb_episode`
--

CREATE TABLE `tb_episode` (
  `id_episode` int(11) NOT NULL,
  `id_anime` int(11) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `video` varchar(222) NOT NULL,
  `episode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_episode`
--

INSERT INTO `tb_episode` (`id_episode`, `id_anime`, `publisher`, `waktu`, `video`, `episode`) VALUES
(5, 3, 'unknown', '20.01', 'https://youtu.be/4K5sK4Pl53s?si=w7BsUa1sESeL49F7', 1),
(11, 5, 'UDFFU', '08.03', 'https://drive.google.com/file/d/1dlD6cpqmSQAXFAlyJBLkfCS5qEIWeeXU/preview', 1),
(12, 5, 'AFEF', '08.07', 'https://pixeldrain.com/u/UuANZMyB', 2),
(13, 7, 'Wee', '21.42 WIB', 'https://drive.google.com/file/d/1gYHCWBhTv7qZiOX3NF_pTgK2tda6I_a4/preview', 1),
(14, 7, 'Wee', '21.43 WIB', 'https://drive.google.com/file/d/1rhcJvvcWHCihezvqJn2H_1lTaRZ3fQEB/preview', 2),
(15, 7, 'Wee', '21.56 WIB', 'https://drive.google.com/file/d/13TIqBAKTD1vwy3cU043js4EsIY4klQ2c/preview', 3),
(16, 7, 'Wee', '21.56 WIB', 'https://drive.google.com/file/d/1bajKQDOHme8KrOSZTDLjDHUs7RJnQhUc/preview', 4),
(17, 7, 'Wee', '22.03 WIB', 'https://drive.google.com/file/d/1yNnjrc4Vzf0sJ6U2ZVqBQg2JvYBDA56f/preview', 5),
(18, 7, 'Wee', '22.04 WIB', 'https://drive.google.com/file/d/1H-lf9qT5J15YS149KlavTbKODfF9uWIV/preview', 6),
(19, 7, 'Wee', '22.06 WIB', 'https://drive.google.com/file/d/1W6tOghenNNjt68g7nrsxEojeIivR2TRz/preview', 7),
(20, 7, 'Wee', '22.07 WIB', 'https://drive.google.com/file/d/1EHuYZO7bySRu0EQFSrS1RCaycRGCMBvd/preview', 8),
(23, 7, 'Wee', '22.09 WIB', 'https://drive.google.com/file/d/12yBwgE6xJqBBA95YWc51vzTGh1EHLx1B/preview', 9),
(24, 7, 'Wee', '22.10 WIB', 'https://drive.google.com/file/d/1vdqu5IPG8PA9TUk6p3oVSYzkjvTBcYWg/preview', 10),
(25, 7, 'Wee', '22.11 WIB', 'https://drive.google.com/file/d/1ZdTa0gV3eZhQUpsEFNlENyzi_RZlLwEo/preview', 11),
(26, 7, 'Wee', '22.12 WIB', 'https://drive.google.com/file/d/1-gZT3nw3SI3_CnfvpRKgU3_o6nEQM4ot/preview', 12),
(27, 2, 'Wee', '22.22 WIB', 'https://www.youtube.com/embed/7DFlyDYAt1c?si=B5iiBtFnOAw6RKmt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_genre`
--

CREATE TABLE `tb_genre` (
  `genre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_genre`
--

INSERT INTO `tb_genre` (`genre`) VALUES
('action'),
('adventure'),
('anime'),
('demons'),
('drama'),
('fantasy'),
('game'),
('harem'),
('history'),
('horror'),
('isekai'),
('komedi'),
('magic'),
('martial art'),
('meme'),
('musical'),
('mystery'),
('parody'),
('politik'),
('pyschologycal'),
('random'),
('romance'),
('school'),
('slice of life'),
('sports');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_anime`
--
ALTER TABLE `tb_anime`
  ADD PRIMARY KEY (`id_anime`);

--
-- Indexes for table `tb_episode`
--
ALTER TABLE `tb_episode`
  ADD PRIMARY KEY (`id_episode`),
  ADD KEY `remove_on_delete` (`id_anime`);

--
-- Indexes for table `tb_genre`
--
ALTER TABLE `tb_genre`
  ADD UNIQUE KEY `genre` (`genre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_anime`
--
ALTER TABLE `tb_anime`
  MODIFY `id_anime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_episode`
--
ALTER TABLE `tb_episode`
  MODIFY `id_episode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_episode`
--
ALTER TABLE `tb_episode`
  ADD CONSTRAINT `remove_on_delete` FOREIGN KEY (`id_anime`) REFERENCES `tb_anime` (`id_anime`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
