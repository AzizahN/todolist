-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2021 at 02:11 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17545068_todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tags` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tags`) VALUES
(1, 'High'),
(2, 'Medium'),
(3, 'Low');

-- --------------------------------------------------------

--
-- Table structure for table `todolists`
--

CREATE TABLE `todolists` (
  `id` int(11) NOT NULL,
  `todolist` varchar(200) DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `checklist` varchar(1) DEFAULT NULL,
  `photo` varchar(4) DEFAULT NULL,
  `is_deleted` int(1) NOT NULL,
  `tags_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todolists`
--

INSERT INTO `todolists` (`id`, `todolist`, `deadline`, `created_at`, `updated_at`, `checklist`, `photo`, `is_deleted`, `tags_id`, `users_id`) VALUES
(1, 'nyapu', '2019-01-01 00:00:00', '2021-09-01 00:00:00', '2021-09-07 12:15:41', '1', NULL, 0, 1, 3),
(2, 'Desain UI', '2021-09-02 00:00:00', '2021-08-26 00:00:00', '2021-09-09 19:11:22', '1', NULL, 0, 2, 3),
(3, 'buat makalah', '2021-08-09 00:00:00', '2021-09-07 11:41:57', '2021-09-07 11:49:57', '1', NULL, 0, 2, 3),
(6, 'nyapu', '2019-01-01 00:00:00', '2021-09-07 12:24:12', NULL, '0', NULL, 0, 1, 2),
(7, 'nyapu', '2019-01-01 00:00:00', '2021-09-07 12:24:31', NULL, '0', NULL, 1, 1, 2),
(10, 'cuci', '2019-01-01 00:00:00', '2021-09-07 20:23:23', NULL, '0', NULL, 0, 3, 2),
(11, 'cuci', '2019-01-01 00:00:00', '2021-09-07 20:57:09', NULL, '0', NULL, 0, 3, 2),
(12, 'makan', '2019-01-01 00:00:00', '2021-09-07 21:01:37', NULL, '0', NULL, 0, 3, 2),
(13, 'Desain UI UX', '2021-09-01 00:00:00', '2021-09-07 22:37:07', NULL, '0', NULL, 0, 1, 3),
(15, 'Desain UI UX', '2021-09-01 00:00:00', '2021-09-09 12:35:16', NULL, '0', NULL, 0, 1, 3),
(16, 'Desain UI UX', '2021-09-01 00:00:00', '2021-09-09 12:40:24', NULL, '0', NULL, 0, 1, 3),
(17, 'tidur', '2021-09-01 00:00:00', '2021-09-09 12:40:42', NULL, '0', NULL, 0, 1, 3),
(18, 'belanja', '2000-11-28 00:00:00', '2021-09-09 13:33:19', NULL, '0', NULL, 0, 2, 4),
(19, 'belanja', '2000-11-28 00:00:00', '2021-09-09 13:33:30', NULL, '0', NULL, 0, 3, 4),
(20, 'belanja', '2000-11-28 00:00:00', '2021-09-09 13:33:33', NULL, '0', NULL, 0, 3, 4),
(21, 'golf', '2021-09-09 00:00:00', '2021-09-09 13:44:06', NULL, '0', NULL, 1, 3, 5),
(23, 'Lawak', '2021-09-09 00:00:00', '2021-09-09 13:56:23', NULL, '0', NULL, 1, 2, 5),
(24, 'Be', '2021-09-09 00:00:00', '2021-09-09 13:57:08', NULL, '0', NULL, 1, 1, 5),
(25, 'Seblak', '2021-09-09 00:00:00', '2021-09-09 13:59:00', NULL, '0', NULL, 1, 2, 5),
(26, 'Basket', '2021-09-09 00:00:00', '2021-09-09 13:59:25', NULL, '0', NULL, 1, 2, 5),
(27, 'Jogging', '2021-09-09 00:00:00', '2021-09-09 14:04:32', NULL, '0', NULL, 1, 2, 5),
(28, 'Belajar', '2021-09-09 00:00:00', '2021-09-09 14:39:54', NULL, '0', NULL, 1, 2, 5),
(29, 'belanja', '2000-11-28 00:00:00', '2021-09-09 15:43:02', NULL, '0', NULL, 0, 2, 4),
(30, 'Bekerja', '2021-09-09 00:00:00', '2021-09-09 15:58:08', NULL, '0', NULL, 1, 2, 5),
(31, 'Kkk', '2021-09-09 00:00:00', '2021-09-09 16:18:28', NULL, '0', NULL, 1, 2, 5),
(32, 'Tidur', '2021-09-09 00:00:00', '2021-09-09 16:19:39', NULL, '0', NULL, 1, 3, 5),
(33, 'Mancing', '2021-09-09 00:00:00', '2021-09-09 17:09:45', NULL, '0', NULL, 0, 1, 5),
(34, 'Bioskop', '2021-09-09 00:00:00', '2021-09-09 17:11:29', NULL, '0', NULL, 1, 2, 5),
(35, 'Berkuda', '2021-09-09 00:00:00', '2021-09-09 17:17:22', NULL, '0', NULL, 0, 2, 5),
(37, 'Mengaji', '2021-09-09 00:00:00', '2021-09-09 17:21:51', NULL, '0', NULL, 0, 2, 5),
(38, 'Soto ayam', '2021-09-09 00:00:00', '2021-09-09 17:28:41', NULL, '0', NULL, 0, 2, 5),
(39, 'Donut', '2021-09-09 00:00:00', '2021-09-09 18:51:09', NULL, '0', NULL, 1, 3, 5),
(40, 'Berkebun', '2021-09-09 00:00:00', '2021-09-09 19:08:01', NULL, '0', NULL, 1, 3, 5),
(41, 'Sehat', '2021-09-09 00:00:00', '2021-09-09 19:09:07', NULL, '0', NULL, 1, 2, 5),
(43, 'Dakw', '2021-09-09 00:00:00', '2021-09-09 19:14:44', NULL, '0', NULL, 1, 2, 5),
(44, 'Dakwah', '2021-09-09 00:00:00', '2021-09-09 19:16:17', NULL, '0', NULL, 1, 3, 5),
(45, 'Ziarah', '2021-09-09 00:00:00', '2021-09-09 19:16:38', NULL, '0', NULL, 1, 2, 5),
(46, 'Ngelawak', '2021-09-09 00:00:00', '2021-09-09 19:17:07', NULL, '0', NULL, 1, 3, 5),
(47, 'Uuh', '2021-09-09 00:00:00', '2021-09-09 19:17:29', NULL, '0', NULL, 1, 3, 5),
(48, 'Tert', '2021-09-09 00:00:00', '2021-09-09 19:18:17', NULL, '0', NULL, 1, 3, 5),
(49, 'Pqpq', '2021-09-09 00:00:00', '2021-09-09 19:19:38', NULL, '0', NULL, 1, 3, 5),
(50, 'Qq', '2021-09-09 00:00:00', '2021-09-09 19:21:25', NULL, '0', NULL, 1, 3, 5),
(51, 'Hahay', '2021-09-09 00:00:00', '2021-09-09 19:22:52', NULL, '0', NULL, 1, 3, 5),
(52, 'Qq', '2021-09-09 00:00:00', '2021-09-09 19:29:52', NULL, '0', NULL, 1, 3, 5),
(53, 'Makan', '2021-09-09 00:00:00', '2021-09-09 19:38:19', NULL, '0', NULL, 0, 2, 5),
(54, 'Minu', '2021-09-09 00:00:00', '2021-09-09 19:39:23', NULL, '0', NULL, 1, 3, 5),
(55, 'I', '2021-09-09 00:00:00', '2021-09-09 19:39:45', NULL, '0', NULL, 1, 3, 5),
(56, 'High', '2021-09-09 00:00:00', '2021-09-09 19:40:11', NULL, '0', NULL, 1, 3, 5),
(57, 'Coy', '2021-09-09 00:00:00', '2021-09-09 19:42:11', NULL, '0', NULL, 1, 3, 5),
(58, 'Mi', '2021-09-09 00:00:00', '2021-09-09 19:43:27', NULL, '0', NULL, 1, 2, 5),
(59, 'Oo', '2021-09-09 00:00:00', '2021-09-09 19:43:36', NULL, '0', NULL, 1, 2, 5),
(60, 'Qq', '2021-09-09 00:00:00', '2021-09-09 19:43:48', NULL, '0', NULL, 1, 3, 5),
(61, 'Med', '2021-09-09 00:00:00', '2021-09-09 19:44:20', NULL, '0', NULL, 1, 2, 5),
(62, 'Keras', '2021-09-09 00:00:00', '2021-09-09 19:44:41', NULL, '0', NULL, 1, 3, 5),
(63, 'Desain', '2021-09-02 00:00:00', '2021-09-09 19:49:38', NULL, '0', NULL, 0, 2, 14),
(64, 'Nangis', '2021-09-09 00:00:00', '2021-09-09 20:00:58', NULL, '0', NULL, 0, 2, 5),
(65, 'Futsal', '2021-09-09 00:00:00', '2021-09-09 20:06:45', NULL, '0', NULL, 0, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `role` enum('superadmin','admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `password`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin@gmail.com', 'super', '$2y$10$hD6Tib3qli3Q5V3dokBT4Oum9BiVAz.f0AicLXozwFG8hoi8fcQO6', '2021-09-01 00:00:00', '2021-09-09 17:03:55', 'superadmin'),
(2, 'azizah@gmail.com', 'azizah', '$2a$16$VJsIPmA9F5k08q7C1c5QAuA2W2zjIipjPtbaLJjoRysG/4CZ1SiF2', '2021-09-02 00:00:00', '2021-09-09 17:02:35', 'user'),
(3, 'jessica@gmail.com', 'Jessica', '$2y$10$hD6Tib3qli3Q5V3dokBT4Oum9BiVAz.f0AicLXozwFG8hoi8fcQO6', '2021-09-03 00:00:00', NULL, 'user'),
(4, 'aldi@gmail.com', 'aldianugraaa', '$2a$16$3X08v1QMK4.povaHF4SLT.cj1hUIh6dja2o6dKkr3XOWYNb5Avm0m', '2021-09-06 21:25:00', '2021-09-09 16:21:32', 'admin'),
(5, 'amin@gmail.com', 'amin', '$2a$16$F8CFBzABW.iflXIvZFC3Ou6ychsdiKrg91iOGRmp1a8yH3AeIHehi', '2021-09-07 10:17:12', NULL, 'admin'),
(6, 'useraldi@gmail.com', 'useraldi', '$2a$16$ZapiAder2L47k.2ulcWuD.KsFoPa2mzs3Xyxy9Cn2a9I0cpC5LCIS', '2021-09-07 20:10:35', '2021-09-09 20:54:43', 'user'),
(7, 'user3@gmail.com', 'user1', '$2a$16$16w9L.rrvfE8wMn470yoHecLq.GtjF.tgqmTmLskniuYcqE.Fcq8e', '2021-09-07 20:14:05', NULL, 'user'),
(8, 'jajaj@gmqi.co', 'Jaja', '$2a$16$ZS7wejRluaTJKOal2hfraOqJVzXtaP4PfIzMrHydjxycP8nCQ8ksG', '2021-09-08 10:58:47', NULL, 'user'),
(9, 'user20@email.com', 'user20', '$2a$16$72S9J1cxVXa/MG6VcXMG3eWGkhBFOvzS0h7DiQqjvAdnGY23k6IN2', '2021-09-08 13:37:32', '2021-09-09 19:09:09', 'user'),
(10, 'user30@gmail.com', 'user30@gmail.com', '$2a$16$05U3UGljyLgv7L6gPGjzjeL.fCi/sXityUOABWRo8EwfTshxsOfUS', '2021-09-08 13:40:58', NULL, 'user'),
(11, 'user31@gmail.com', 'user31@gmail.com', '$2a$16$PA6CAY90az21e5KWa2Dklukeq8LeGGWn9x0TE.zUuSRItKiBE5wRS', '2021-09-08 13:42:19', NULL, 'user'),
(12, 'user26@gmai.com', 'user26', '$2a$16$E1rBrH0RHkzdke2GEgVAGe6sGEl8RBb85oC18XRfqXvTgWfBduXYK', '2021-09-08 13:44:48', NULL, 'user'),
(13, 'user21@gmail.com', 'user21', '$2a$16$vtesgJi2trZoXp7dz1eR2uajULt34XjSe6.Vwb8nN1dZRMrkzhPXu', '2021-09-08 13:46:16', NULL, 'user'),
(14, 'azizahh@gmail.com', 'azizahh', '$2a$16$BQTuWo4n8KP31fTsVIb1kuKHheCtSvwNshQABuoQS0RE/09ITpxeW', '2021-09-08 13:52:56', '2021-09-08 14:14:32', 'admin'),
(15, 'user37@gma.c', 'user37', '$2a$16$TFkla4PKv9ljZC1FhBwfce5A5eKJo8gkddarUl.ckHxeHYRL5FCTC', '2021-09-08 13:55:23', NULL, 'user'),
(16, 'user61@gmail.com', 'user61', '$2a$16$5xxSwNOCppaYndea.9pGQu5zm7PrM9rgUb5aZdWD3wYNBAVMDATce', '2021-09-08 13:56:12', NULL, 'user'),
(17, 'user77@gmai.c', 'user77', '$2a$16$dCZ.DblJwiBIzrD2F4lVw.mxC4eKBalhankM2/tYx.1tDy9u1ZaYy', '2021-09-08 13:56:46', NULL, 'user'),
(18, 'user123@gmail.com', 'asdfsdfsdfd', '$2a$16$TFCBbnZsHrEUQ4JkUBv9LeLUk12CAjpQcwFrlKpalGm4PiDFpUFDq', '2021-09-08 13:59:11', NULL, 'user'),
(19, 'asdsf@gmai.c', 'asdfsdfsdf', '$2a$16$kZInXOxnJhgyt8J0RcFiAejOPoHllafsewNkOqqA7XsBlzY89mtuC', '2021-09-08 14:05:20', NULL, 'user'),
(20, 'sdf@dfd.cd', 'sdfdf', '$2a$16$uh5/ibhYAeniINEr1oM9Z.osbVir3HBdcfow2wTj2H58Ncdg/foqe', '2021-09-08 14:14:19', NULL, 'user'),
(21, 'sjsjsj@gmaio.co', 'Sjsjsjj', '$2a$16$jlzcMvWgqU81GMTbYfI14eV3TGG2nxLeGpHxCSRGFdPFAdJnKtvHG', '2021-09-08 14:16:03', NULL, 'user'),
(22, 'sor@sms.r', 'Ueeu', '$2a$16$G0g1S9UN3PcuZdaMSliG4u8LnTlKRAHIGmC06mStVnp5ApQSW6ksa', '2021-09-08 14:29:58', NULL, 'user'),
(23, 'test@gmail.com', 'testing', '$2a$16$uBQDO7cmE4BncWHs6SWXkOeFA3dQRQbouW2/ePKSygbyet8y78TuC', '2021-09-08 20:40:12', '2021-09-09 17:14:29', 'admin'),
(24, 'aldi@aldi.com', 'aldianugra', '$2a$16$wjgp86YGp4bS9dgvseNunucHmF239XuY69x.yynMTgXxT2y6xwhgq', '2021-09-08 20:44:01', '2021-09-09 16:20:08', 'admin'),
(25, 'aldi@aldi.com', 'aldianu', '$2a$16$49S/QFX9T74m.ruPPEdjGOFCiUnh07V5FoFnftzpeXCy7zK5NH1TS', '2021-09-08 20:57:43', NULL, 'admin'),
(26, 'afanda11180007@nusamandiri.ac.id', 'Jember08', '$2a$16$QgNy1iLDDOLuJKj9rw.kPepo8P6MeD/AcQbi.wZwDuJtH0r/5fhRq', '2021-09-08 21:35:57', NULL, 'admin'),
(27, 'ajaj@fk.c', 'Hahah', '$2a$16$SQBzHvxhRNVRiNahBlH7gu07KAblR3uBU/mssAnmL7WIQTHEVTCWO', '2021-09-08 21:51:01', NULL, 'user'),
(28, 'shsh@he.x', 'Ywywy', '$2a$16$.kPLgEfWnik7Rz110yFbF.BBCAyaeSm7919jCikv.SMY/QYf3hPeK', '2021-09-08 21:51:29', NULL, 'user'),
(29, 'coba@js.d', 'Coba', '$2a$16$pH2RgT3ASvzenjQ3y4reweO9g4H3AXga8ewRKL.KdBFyy4rdfcVxG', '2021-09-08 21:56:08', NULL, 'user'),
(30, 'dv@jw.k', 'Debe', '$2a$16$88WVd4HHGJmSQ2QCpO/IiON2SFAgx7/WZVo7uw5zLOSgFep/uGHQ.', '2021-09-08 21:56:34', NULL, 'user'),
(31, 'mumm@eksmc.f', 'Mum', '$2a$16$Uz5m6TyztAXZHcmzYa0gfuy9Eup2PuhbHEHDadS/p7NI.Ze/xhteu', '2021-09-08 23:05:29', NULL, 'user'),
(32, '', '', '$2a$16$9P.WVRjyqmtmFtJdlRRN4.jVSSHPHAkgeRG/GhObyfSoIoayFlPLS', '2021-09-09 04:48:38', NULL, 'user'),
(33, 'afandayu@g.com', 'laksono', '$2a$16$yXdCSOY8NjL4Oe65.KtJ7Os4ma7WkaARnQaPMPWo6/apQqXdq6g.e', '2021-09-09 15:33:51', NULL, 'admin'),
(34, 'jember08@gmail.com', 'dayuafan08', '$2a$16$F9L/0canzRtPamVoO63NGuNYLBcnzHfS9iAGbqqk1En3GHv5NDrfe', '2021-09-09 16:49:37', NULL, 'admin'),
(35, 'baru@gmail.com', 'baru', '$2a$16$6tPkqj2Y8UtQXZkb8YCD/OW.N0LyFKis3fUr30mLCtefzsJGqHIrK', '2021-09-09 17:15:26', NULL, 'admin'),
(36, 'hehe@gmail.com', 'Hehe', '$2a$16$qkbp69aSRizbgFOTHZaeg.T5hEJDhoTd/1yv2l7gJnractMbd/Rpi', '2021-09-09 19:37:55', NULL, 'user'),
(37, 'ukh@k.d', 'Uhk', '$2a$16$o0MT2nIzVk/xnbQuDk218uhOi8Wfxzr2b4eA1N5bchgdlOK6xozAC', '2021-09-09 19:41:57', NULL, 'user'),
(38, 'usi@j.s', 'Usi', '$2a$16$KgpBR82W8.j1PiCYyCrAA.agg89unAGMv.FesS3/Fag03dTISrca2', '2021-09-09 19:53:12', NULL, 'user'),
(39, 'uka@ks.s', 'Uka', '$2a$16$vWz4r8HSwQQMT6ZMilKS3.TL1zRB87Vbo6hx32Cz4S4cneqW1hG2m', '2021-09-09 19:55:07', NULL, 'user'),
(40, 'aminjj@gmail.com', 'amin', '$2a$16$c8/v7qpjkteDjtEDLaoU1uZs21YMLOQjWXlcsBncGJdWYUTqU0K2.', '2021-09-09 20:40:16', NULL, 'user'),
(41, 'vw@x.yz', 'vw', '$2a$16$meIUSR4mKlt.zsW0JzlbKeDr5A45yQ65s.7ACBtZ07tdRjpnLLBC.', '2021-09-09 20:46:04', NULL, 'user'),
(42, 'sadfsadfsda', 'y', '$2a$16$hAy7eCSOG70AxIGxtE1kI.yxkjU5JRgJQJWBurjdmieHqRjXydD9O', '2021-09-09 20:48:53', NULL, 'user'),
(43, 'afan@afan.afan', 'afannnnn', '$2a$16$X/XlCgiBlt3jWfPybvnRne7gGFKTgpsO28FLbYdM4XIwtn2zr3F7a', '2021-09-09 20:53:12', NULL, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todolists`
--
ALTER TABLE `todolists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_todolists_tags_idx` (`tags_id`),
  ADD KEY `fk_todolists_users1_idx` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `todolists`
--
ALTER TABLE `todolists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todolists`
--
ALTER TABLE `todolists`
  ADD CONSTRAINT `fk_todolists_tags` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_todolists_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
