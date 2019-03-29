-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 Nis 2018, 21:07:42
-- Sunucu sürümü: 10.1.26-MariaDB
-- PHP Sürümü: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `inspection`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `inspectionlist`
--

CREATE TABLE `inspectionlist` (
  `studentno` int(30) NOT NULL,
  `lesson` varchar(30) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `inspectionlist`
--

INSERT INTO `inspectionlist` (`studentno`, `lesson`, `date`) VALUES
(12290004, 'COM334', '2017-12-23 21:20:35'),
(12290046, 'COM334', '2017-12-23 21:21:18'),
(13290011, 'COM334', '2017-12-23 21:23:02'),
(13290018, 'COM334', '2017-12-23 21:23:29'),
(13290057, 'COM334', '2017-12-23 21:31:49'),
(14290002, 'COM334', '2017-12-23 21:32:37'),
(14290037, 'COM334', '2017-12-23 21:33:15'),
(14290059, 'COM334', '2017-12-23 21:33:45'),
(14290519, 'COM334', '2017-12-23 21:34:14'),
(13290045, 'COM115', '2017-12-23 21:35:57'),
(14290365, 'COM115', '2017-12-23 21:36:42'),
(16290019, 'COM115', '2017-12-23 21:39:46'),
(15290034, 'COM115', '2017-12-23 21:40:21'),
(15290036, 'BLM437', '2017-12-23 21:42:23'),
(16290549, 'BLM437', '2017-12-23 21:42:47'),
(14290037, 'COM334', '2017-12-24 16:10:03'),
(14290037, 'COM334', '2017-12-28 15:30:47'),
(14290002, 'COM115', '2017-12-29 00:31:47'),
(14290037, 'COM115', '2017-12-31 14:56:28'),
(14290037, 'COM334', '2017-12-31 21:14:14'),
(14290037, 'COM334', '2018-01-01 00:30:06'),
(14290037, 'COM115', '2018-01-01 21:58:49'),
(14290037, 'COM334', '2018-01-11 22:27:40'),
(14290037, 'COM334', '2018-01-12 11:11:37'),
(14290037, 'COM334', '2018-01-14 14:11:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lessonlist`
--

CREATE TABLE `lessonlist` (
  `lesson` varchar(30) NOT NULL,
  `teacheruname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `lessonlist`
--

INSERT INTO `lessonlist` (`lesson`, `teacheruname`) VALUES
('COM334', 'ozgurtanriover'),
('BLM437', 'enverbagci'),
('COM115', 'ozgurtanriover');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `students`
--

CREATE TABLE `students` (
  `studentnumber` int(30) NOT NULL,
  `studentpassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `students`
--

INSERT INTO `students` (`studentnumber`, `studentpassword`) VALUES
(12290004, 'pass654'),
(12290046, 'pass321'),
(13290011, 'pass678'),
(13290018, 'pass012'),
(13290045, 'pass789'),
(13290057, 'pass345'),
(14290002, 'pass456'),
(14290034, 'pass333'),
(14290037, 'pass123'),
(14290059, 'pass901'),
(14290365, 'pass987'),
(14290519, 'pass000'),
(15290034, 'pass791'),
(15290036, 'pass680'),
(16290019, 'pass135'),
(16290549, 'pass024'),
(17290065, 'pass190');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teachers`
--

CREATE TABLE `teachers` (
  `tusername` varchar(30) NOT NULL,
  `tpassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `teachers`
--

INSERT INTO `teachers` (`tusername`, `tpassword`) VALUES
('enverbagci', 'tpass456'),
('ozgurtanriover', 'tpass123');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `lessonlist`
--
ALTER TABLE `lessonlist`
  ADD KEY `teacheruname` (`teacheruname`);

--
-- Tablo için indeksler `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentnumber`);

--
-- Tablo için indeksler `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tusername`);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `lessonlist`
--
ALTER TABLE `lessonlist`
  ADD CONSTRAINT `teacher_fk` FOREIGN KEY (`teacheruname`) REFERENCES `teachers` (`tusername`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
