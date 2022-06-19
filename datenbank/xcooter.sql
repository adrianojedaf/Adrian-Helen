-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Jun 2022 um 23:00
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `xcooter`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reservierungen`
--

CREATE TABLE `reservierungen` (
  `id` int(200) NOT NULL,
  `user_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `modell` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `startzeit` date NOT NULL,
  `endzeit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `reservierungen`
--

INSERT INTO `reservierungen` (`id`, `user_email`, `modell`, `startzeit`, `endzeit`) VALUES
(24, 'test2@gmail.com', 'Yoga 1', '2022-06-14', '2022-06-08'),
(25, 'test2@gmail.com', 'novalue 2000', '2022-06-20', '2022-06-30');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(200) NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'test1', 'test1@gmail.com', '$2y$10$YHZaIprvq.ndQ3O55QVwPezBv0uJ1dCe3SpG7J20Ohd7ufEsJJNtO'),
(6, 'test2', 'test2@gmail.com', '$2y$10$3L9qn4vdJS10LNiiRt8ZX.PlFI.nvgPFiehH.XMD3/hF2Gxa2uavO'),
(7, 'test3', 'test3@gmail.com', '$2y$10$ExRxvY1Tmtcx3DEB/Wb2.OzBGxfbI.qE/SqHtLjKi9NZfxk9zEqBi');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `reservierungen`
--
ALTER TABLE `reservierungen`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `reservierungen`
--
ALTER TABLE `reservierungen`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
