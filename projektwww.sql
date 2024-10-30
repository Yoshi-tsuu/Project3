-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 30, 2024 at 06:10 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projektwww`
--
CREATE DATABASE IF NOT EXISTS `projektwww` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projektwww`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gry`
--

CREATE TABLE `gry` (
  `ID` int(11) NOT NULL,
  `nazwa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gry`
--

INSERT INTO `gry` (`ID`, `nazwa`) VALUES
(1, 'Minecraft'),
(2, 'Lethal Company');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `modID` int(11) NOT NULL,
  `tresc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentarze`
--

INSERT INTO `komentarze` (`ID`, `userID`, `modID`, `tresc`) VALUES
(1, 1, 1, 'Przykladowy komentarz'),
(2, 1, 1, 'Inny naprawde chyba nawet dlugi komentarz'),
(3, 1, 1, 'Test'),
(4, 1, 1, 'asw'),
(7, 1, 4, 'asw'),
(19, 1, 6, 'o co chodzi'),
(20, 1, 6, 'a teraz dziala'),
(21, 1, 6, 'sigma'),
(22, 1, 6, 'hm?'),
(24, 1, 7, 'Komentarz\n');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mody`
--

CREATE TABLE `mody` (
  `ID` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `opis` text NOT NULL,
  `userID` int(11) NOT NULL,
  `graID` int(11) NOT NULL,
  `obrazek` text NOT NULL,
  `repo` text NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mody`
--

INSERT INTO `mody` (`ID`, `nazwa`, `opis`, `userID`, `graID`, `obrazek`, `repo`, `verified`) VALUES
(1, 'Example Mod', 'Example mod created for testing', 1, 1, 'test.png', 'test', 1),
(2, 'vvv', 'ddd', 1, 1, '', 'w3', 0),
(4, 'Example Mod2', 'Example mod created for testing', 1, 1, 'test.png', 'test', 1),
(6, 'TestersMod', 'Jakis tam do testow', 2, 2, '', 'RealneRepo', 1),
(7, 'Test', 'inny plik', 1, 1, 'Zrzutekranu2024-10-22232849.png', 'hihi', 1),
(8, 'Test2', 'dont verify', 1, 1, 'Zrzutekranu2024-10-22232849.png', 'xd', 0),
(9, 'Test2', 'dont verify', 1, 1, 'Zrzutekranu2024-10-22232849.png', 'xd', 0),
(10, 'Test2', 'dont verify', 1, 1, 'Zrzutekranu2024-10-22232849.png', 'xd', 0),
(11, 'Test2', 'dont verify', 1, 1, 'Zrzutekranu2024-10-22232849.png', 'xd', 0),
(12, 'Test2', 'dont verify', 1, 1, 'Zrzutekranu2024-10-22232849.png', 'xd', 0),
(13, 'Test2', 'dont verify', 1, 1, 'Zrzutekranu2024-10-22232849.png', 'xd', 0),
(15, 'Test2', 'dont verify', 1, 1, 'Zrzutekranu2024-10-22232849.png', 'xd', 0),
(16, 'Test2', 'dont verify', 1, 1, 'Zrzutekranu2024-10-22232849.png', 'xd', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `polubienia`
--

CREATE TABLE `polubienia` (
  `modID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `polubienia`
--

INSERT INTO `polubienia` (`modID`, `userID`) VALUES
(1, 1),
(4, 2),
(6, 1),
(7, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `ID` int(11) NOT NULL,
  `login` text NOT NULL,
  `haslo` text NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`ID`, `login`, `haslo`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Tester', '098f6bcd4621d373cade4e832627b4f6', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `gry`
--
ALTER TABLE `gry`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `modID` (`modID`);

--
-- Indeksy dla tabeli `mody`
--
ALTER TABLE `mody`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `graID` (`graID`),
  ADD KEY `userID` (`userID`);

--
-- Indeksy dla tabeli `polubienia`
--
ALTER TABLE `polubienia`
  ADD KEY `modID` (`modID`),
  ADD KEY `userID` (`userID`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gry`
--
ALTER TABLE `gry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mody`
--
ALTER TABLE `mody`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentarze`
--
ALTER TABLE `komentarze`
  ADD CONSTRAINT `komentarze_ibfk_1` FOREIGN KEY (`modID`) REFERENCES `mody` (`ID`),
  ADD CONSTRAINT `komentarze_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `uzytkownicy` (`ID`);

--
-- Constraints for table `mody`
--
ALTER TABLE `mody`
  ADD CONSTRAINT `mody_ibfk_1` FOREIGN KEY (`graID`) REFERENCES `gry` (`ID`),
  ADD CONSTRAINT `mody_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `uzytkownicy` (`ID`);

--
-- Constraints for table `polubienia`
--
ALTER TABLE `polubienia`
  ADD CONSTRAINT `polubienia_ibfk_1` FOREIGN KEY (`modID`) REFERENCES `mody` (`ID`),
  ADD CONSTRAINT `polubienia_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `uzytkownicy` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
