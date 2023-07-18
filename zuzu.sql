-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 okt 2022 om 12:56
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zuzu`
--
CREATE DATABASE IF NOT EXISTS `zuzu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `zuzu`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `adress`
--

CREATE TABLE `adress` (
  `adress_id` int(9) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `adress`
--

INSERT INTO `adress` (`adress_id`, `adress`, `zipcode`, `area`) VALUES
(1, 'Tinwerf 16', '1234 AB', 'Den Haag'),
(2, 'we', 'we', 'we');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adress_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sushi`
--

CREATE TABLE `sushi` (
  `orderid` int(11) NOT NULL,
  `komkommer` int(2) NOT NULL,
  `avocado` int(2) NOT NULL,
  `zalm` int(2) NOT NULL,
  `philadelphia` int(2) NOT NULL,
  `spicy_tuna` int(2) NOT NULL,
  `california` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `sushi`
--

INSERT INTO `sushi` (`orderid`, `komkommer`, `avocado`, `zalm`, `philadelphia`, `spicy_tuna`, `california`) VALUES
(1, 1, 1, 0, 5, 0, 7),
(2, 1, 1, 1, 1, 1, 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`adress_id`);

--
-- Indexen voor tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `adress_id_fk` (`adress_id`);

--
-- Indexen voor tabel `sushi`
--
ALTER TABLE `sushi`
  ADD PRIMARY KEY (`orderid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `adress`
--
ALTER TABLE `adress`
  MODIFY `adress_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `sushi`
--
ALTER TABLE `sushi`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `adress_id_fk` FOREIGN KEY (`adress_id`) REFERENCES `adress` (`adress_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
