-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 03:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `savarankiskas`
--

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `ID` int(5) NOT NULL,
  `nick` varchar(20) COLLATE utf8_lithuanian_ci NOT NULL,
  `pavadinimas` text COLLATE utf8_lithuanian_ci NOT NULL,
  `aprasymas` text COLLATE utf8_lithuanian_ci NOT NULL,
  `laikas` datetime NOT NULL,
  `adresas` text COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`ID`, `nick`, `pavadinimas`, `aprasymas`, `laikas`, `adresas`) VALUES
(6, 'vartotojas', '1foto', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vestibulum accumsan ligula a blandit. Nam vitae purus sit amet leo finibus placerat scelerisque luctus felis. Maecenas mollis tortor fringilla, vehicula leo id, finibus ligula. Cras malesuada lorem et nibh tempor aliquam. Donec eget efficitur ipsum, sed tincidunt leo. Vestibulum eget.', '2023-01-31 15:24:00', 'uploads/d1.jpg'),
(7, 'vartotojas', '2foto', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dapibus felis et neque vulputate, vel interdum orci dignissim. Maecenas ut orci eget est gravida auctor in eget elit. Sed enim nunc, fringilla at libero at, vehicula elementum sem. Quisque ultrices hendrerit lectus vel consequat. Donec tristique tincidunt justo a tincidunt.', '2023-01-31 15:24:00', 'uploads/d2.jpg'),
(8, 'onyte', '3nuotrauka', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt ipsum nulla, et elementum nunc pellentesque ac. Curabitur fermentum aliquam turpis eu porttitor. Ut mollis, erat vel dignissim pretium, neque ligula interdum diam, vitae commodo justo nisi quis magna. Donec ultrices libero vitae dictum sollicitudin. Duis finibus lorem urna, eget.', '2023-01-31 15:28:00', 'uploads/d8.jpg'),
(9, 'onyte', '4nuotrauka', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt ipsum nulla, et elementum nunc pellentesque ac. Curabitur fermentum aliquam turpis eu porttitor. Ut mollis, erat vel dignissim pretium, neque ligula interdum diam, vitae commodo justo nisi quis magna. Donec ultrices libero vitae dictum sollicitudin. Duis finibus lorem urna, eget.', '2023-01-31 15:28:00', 'uploads/d3.png'),
(10, 'onyte', '5nuotrauka', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce accumsan, lectus eu posuere facilisis, arcu lorem sodales diam, ut tempus justo risus in leo. Nulla id pulvinar purus, sed ornare ipsum. Suspendisse finibus dolor sed ligula pulvinar vehicula. Pellentesque semper diam tincidunt, rhoncus mauris vel, pulvinar ante. Curabitur varius leo.', '2023-01-31 15:36:00', 'uploads/d6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `nickname` varchar(20) COLLATE utf8_lithuanian_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `nickname`, `password`) VALUES
(1, 'jonce', 'psw123'),
(2, 'ghgfh', '123'),
(3, 'ona', '123'),
(4, 'onyte', '123'),
(5, 'aluyzas', '123'),
(6, 'vartotojas', 'slaptazodis'),
(7, 'canon', '987');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `adresas` (`adresas`) USING HASH,
  ADD KEY `nick` (`nick`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`nick`) REFERENCES `user` (`nickname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
