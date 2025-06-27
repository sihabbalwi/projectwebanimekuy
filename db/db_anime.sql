-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2025 at 08:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `deskripsi` text NOT NULL,
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
(7, 'Make Heroine ga Oosugiru!', 'Heroine yang tertolak', 'https://cdn.myanimelist.net/images/anime/1332/143513l.jpg', 'Completed', 'drama|romance|school|slice of life'),
(8, 'Sakamoto Days (season 1)', 'Dulu, ada pembunuh bayaran paling ditakuti sekaligus dikagumi oleh banyak orang. Ia adalah Tarou Sakamoto. Suatu hari, Sakamoto yang sedang berbelanja di minimarket bertemu dengan gadis cantik yang tengah menjadi kasir bernama Aoi.\r\nSakamoto pun jatuh cinta pada pandangan pertama kepada Aoi. Karena pertemuannya tersebut, Sakamoto akhirnya memilih meninggalkan jalan sebagai pembunuh bayaran dan kini hidup bersama dengan Aoi sebagai pasangan suami istri hingga tubuhnya sekarang berubah menjadi gendut.\r\nWalau memiliki tubuh besar, kecepatan dan kelincahan Sakamoto masih tetap sama. Sekarang, Sakamoto harus menjalani kehidupannya sembari melindungi keluarganya dari musuh yang ingin membunuhnya.', 'https://screenscore.digitalmama.id/wp-content/uploads/2025/03/MV5BM2MwZDRmYWItNGIzZC00ZWExLWEwNWYtNmM1ZmU3OTA3NmY4XkEyXkFqcGc@._V1_.jpg', 'Completed', 'Action | Comedy | Organized Crime | Shounen'),
(9, 'Solo Leveling (season 1)', 'Sepuluh tahun yang lalu, muncul sebuah Gate yang berisikan para monster. Senjata konvensional seperti pistol tidak bisa melukai monster tersebut. Namun, manusia berkekuatan super yang disebut dengan Hunter berhasil mengalahkan mereka.\r\nPara Hunter pun populer dan menjadi pekerjaan yang menjanjikan uang lebih banyak. Kisah berpusat kepada Shun Mizushino (Jin-Woo Sung) yang memiliki rank E atau Hunter paling lemah.\r\nSuatu hari, Shun yang tengah menjalani sebuah Dungeon bersama dengan teman-temannya terjebak di sebuah ruangan. Dalam posisi yang genting, ia mendapatkan sebuah pesan untuk menaikkan levelnya. Bagaimana kisah lengkapnya?', 'https://i.pinimg.com/736x/00/bf/a5/00bfa50817ba4107538d2f79da3e20c4.jpg', 'Completed', 'Action | Adventure | Fantasy'),
(11, 'Spy x Family (Season 1)', 'Loid Forge atau Twilight, seorang mata-mata yang bekerja untuk organisasi rahasia. Loid dikenal sebagai salah satu mata-mata yang selalu berhasil menyelesaikan misinya. Suatu hari, Loid diberikan tugas oleh atasannya untuk membentuk sebuah keluarga palsu.\r\nTujuannya yakni guna mendekati Desmon Donovan, Pemimpin dari Partai Nasional. Untuk mewujudkan misi tersebut, Loid mengunjungi Panti Asuhan dan memilih mengadopsi seorang anak perempuan bernama Anya.\r\nSetelah mengadopsi seorang anak, Loid diharuskan mencari seorang istri. Untuk itu, Yor, salah satu wanita yang bekerja di pemerintahan bersedia membuat keluarga palsu dengan Loid. Sekarang, apakah misi dari Loid akan berhasil?', 'https://i0.wp.com/asiaon.com.br/wp-content/uploads/2022/04/gallery_visual_06.jpg?resize=650%2C939&ssl=1', 'Completed', 'Action | Comedy | Shounen');

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
(27, 2, 'Wee', '22.22 WIB', 'https://www.youtube.com/embed/7DFlyDYAt1c?si=B5iiBtFnOAw6RKmt', 1),
(28, 8, 'TMS Entertainment', '3.50 PM', 'https://drive.google.com/file/d/1Vn4z57yBWtUhn-wuSMmkqcW6QC0YBv4f/preview', 1),
(29, 9, 'A-1 Pictures', '3.52 PM', 'https://drive.google.com/file/d/1pqsN_l1zqeEbYLHYxOjIwSCsOcVtSSjl/preview', 1),
(30, 11, 'TOHO animation', '3.53 PM', 'https://drive.google.com/file/d/1t5eCnKFqFPygvPH_SNl8_0UyjfBgCSHl/preview', 1),
(31, 8, 'TMS Entertainment', '4.18 PM', 'https://drive.google.com/file/d/1AIP3gsbMwFzCvdVBupwH1AzwLkaGeYye/preview', 2),
(32, 9, 'A-1 Pictures', '4.18 PM', 'https://drive.google.com/file/d/18BUQme3fTFMHuJmL1VdswdHcOoWtela9/preview', 2),
(33, 11, 'TOHO animation', '4.19 PM', 'https://drive.google.com/file/d/1f9u_DtBny2-EpksT5f26gEXP5lYQ5xWV/preview', 2),
(34, 8, 'TMS Entertainment', '4.20 PM', 'https://drive.google.com/file/d/1OxhBtxvhOVtCi8gkKfIpHp6Wt0_chFIm/preview', 3),
(35, 9, 'A-1 Pictures', '4.21 PM', 'https://drive.google.com/file/d/12hwsmNtIK9Br2Bck3YQpW3EymKHD2jP5/preview', 3),
(36, 11, 'TOHO animation', '4.21 PM', 'https://drive.google.com/file/d/1gKF0tlkQ0rWdvNTzcfQyIiZgru62vU5T/preview', 3),
(37, 8, 'TMS Entertainment', '4.22 PM', 'https://drive.google.com/file/d/1ec8PjTwXNKVQk7gOXkDYlVdGnHizcfop/preview', 4),
(38, 9, 'A-1 Pictures', '4.22 PM', 'https://drive.google.com/file/d/1ZKUtMORt2B2_3Lhjv9pJ6eOyLfQslhRJ/preview', 4),
(39, 11, 'TOHO animation', '4.23 PM', 'https://drive.google.com/file/d/1MM7YIS4UUYhjTx3TgK5u6SIdsDjhXWDb/preview', 4),
(40, 8, 'TMS Entertainment', '4.24 PM', 'https://drive.google.com/file/d/1OBvpha42cJAH_gpMIg7nCug6bpl_XCzY/preview', 5),
(41, 9, 'A-1 Pictures', '4.25 PM', 'https://drive.google.com/file/d/1SGRkDde5KINYCzi-VfHpFGuKe_Bjh0q_/preview', 5),
(42, 11, 'TOHO animation', '4.25 PM', 'https://drive.google.com/file/d/1CsdWIzEDBR-5wzG2CADs-VjQmNr6npUi/preview', 5),
(43, 8, 'TMS Entertainment', '4.27 PM', 'https://drive.google.com/file/d/1SNyfwtow1qCZr-2snw0brq2pg2Cs1Yow/preview', 6),
(44, 9, 'A-1 Pictures', '4.27 PM', 'https://drive.google.com/file/d/1_3GQZCPJ50NHEyXy7mo5gupmeTi96OV0/preview', 6),
(45, 11, 'TOHO animation', '4.28 PM', 'https://drive.google.com/file/d/12S_4zeXKQQRm5Xi7caPlFDYqpKbQvidd/preview', 6),
(46, 8, 'TMS Entertainment', '4.28 PM', 'https://drive.google.com/file/d/1gizfmAj7BVxMOS6OPfjNKfxQurxr1AFH/preview', 7),
(47, 9, 'A-1 Pictures', '4.29 PM', 'https://drive.google.com/file/d/1LtN72JaVUdrKvKHEtRD1oK9xTqThsG2h/preview', 7),
(48, 11, 'TOHO animation', '4.29 PM', 'https://drive.google.com/file/d/1TAWdMec4SF7waIcl5weN3hify_DH3tTs/preview', 7),
(49, 8, 'TMS Entertainment', '4.35 PM', 'https://drive.google.com/file/d/1vSZCQLTzO_kHRfrwrgNe7hWX9dtoDzWX/preview', 8),
(50, 9, 'A-1 Pictures', '4.36 PM', 'https://drive.google.com/file/d/1dQy9ZIY-hAv_wEcQAUOMGs0Jq6ULfBu9/preview', 8),
(51, 11, 'TOHO animation', '4.36 PM', 'https://drive.google.com/file/d/1JhtXjHP7pN9I6to-DhkFEFJAAyat4yU-/preview', 8),
(52, 8, 'TMS Entertainment', '4.37 PM', 'https://drive.google.com/file/d/1eZu-Psy5gLR23C8JCdAAYxisFOVJx4QJ/preview', 9),
(53, 9, 'A-1 Pictures', '4.38 PM', 'https://drive.google.com/file/d/1KKEjavUTXsdC2ejgXd0IE_PMoYVrQYvk/preview', 9),
(54, 11, 'TOHO animation', '4.38 PM', 'https://drive.google.com/file/d/1XTGVkRX2mrPdxSknxVlLMU7oJxvln7pG/preview', 9),
(55, 8, 'TMS Entertainment', '4.39 PM', 'https://drive.google.com/file/d/1m-GBw0GgnKd00fxYICdooz5AU2Ty42yf/preview', 10),
(56, 9, 'A-1 Pictures', '4.40 PM', 'https://drive.google.com/file/d/1nt-8_iz5H9TviVfyfJcOg05Jm-WSfIBu/preview', 10),
(57, 11, 'TOHO animation', '4.40 PM', 'https://drive.google.com/file/d/1D-PZSvo7tUG3At3CC_ZGzUJWhBPaqdm7/preview', 10),
(58, 8, 'TMS Entertainment', '4.41 PM', 'https://drive.google.com/file/d/14gkEkri5ksf1tJNDPHfpuQSx_RTBNRmL/preview', 11),
(59, 9, 'A-1 Pictures', '4.41 PM', 'https://drive.google.com/file/d/1JNnH2RhYfyp7DDz9-c9i5udBckPWdNCK/preview', 11),
(60, 11, 'TOHO animation', '4.42 PM', 'https://drive.google.com/file/d/1vL32GlYM77VWJ-wAcF9PHq94jFJxltmI/preview', 11),
(61, 9, 'A-1 Pictures', '4.43 PM', 'https://drive.google.com/file/d/1kHkqhulDrphFS86T-y781w8UF7SUt5GO/preview', 12),
(62, 11, 'TOHO animation', '4.44 PM', 'https://drive.google.com/file/d/1R_MuyDNw5V8Fy2_UEnvPmrFuVJkC6krF/preview', 12);

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
  MODIFY `id_anime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_episode`
--
ALTER TABLE `tb_episode`
  MODIFY `id_episode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
