-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2024 at 04:41 PM
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
-- Database: `szkola`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klasa`
--

CREATE TABLE `klasa` (
  `id` int(11) NOT NULL DEFAULT 0,
  `nazwa` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `klasa`
--

INSERT INTO `klasa` (`id`, `nazwa`) VALUES
(1, '1a'),
(2, '1b'),
(3, '2a'),
(4, '2b');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczen`
--

CREATE TABLE `uczen` (
  `id` int(2) NOT NULL DEFAULT 0,
  `Nazwisko` varchar(11) DEFAULT NULL,
  `Imie` varchar(11) DEFAULT NULL,
  `Srednia_ocen` float NOT NULL,
  `id_klasy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `uczen`
--

INSERT INTO `uczen` (`id`, `Nazwisko`, `Imie`, `Srednia_ocen`, `id_klasy`) VALUES
(1, 'Kluska', 'Zenon', 4.5, 1),
(2, 'Zawada', 'Zbigniew', 3.6, 1),
(3, 'Cap', 'Antoni', 3.5, 2),
(4, 'Kowalski', 'Sebastian', 4, 3),
(5, 'Dawid', 'Andrzej', 4.5, 2),
(6, 'Kaczmarek', 'Marta', 3, 4),
(7, 'Kowalski', 'Jan', 3.5, 4),
(8, 'Polak', 'Maria', 4.8, 2),
(9, 'Michalak', 'Paweł', 4, 3),
(10, 'Góral', 'Łukasz', 3.6, 4),
(11, 'Nowak', 'Jan', 4.8, 4),
(12, 'Kowalski', 'Łukasz', 4.5, 1),
(13, 'Markiewicz', 'Damian', 3.5, 3),
(14, 'Baryła', 'Zenon', 4, 2),
(15, 'Gota', 'Anna', 3, 4),
(16, 'Małek', 'Justyna', 3.6, 1),
(17, 'Rysik', 'Magda', 4.8, 3),
(18, 'Szary', 'Tomasz', 3, 1),
(19, 'Bury', 'Łukasz', 4.5, 3),
(20, 'Rudy', 'Wojciech', 3.5, 2),
(21, 'Kowalska', 'Janina', 3, 2),
(22, 'Nowak', 'Jan', 4.5, 1),
(23, 'Kowalik', 'Stanisława', 4, 3),
(24, 'Nowakowski', 'Grzegorz', 3.6, 1),
(25, 'Kwiatkowska', 'Jolanta', 3.5, 2),
(26, 'Konarski', 'Krzysztof', 4.5, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wychowawca`
--

CREATE TABLE `wychowawca` (
  `id` int(11) NOT NULL DEFAULT 0,
  `imie` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nazwisko` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_klasy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wychowawca`
--

INSERT INTO `wychowawca` (`id`, `imie`, `nazwisko`, `id_klasy`) VALUES
(0, '0', '0', 0),
(1, 'Jan', 'Bogucki', 1),
(2, 'Michał', 'Więcek', 2),
(3, 'Bożena', 'Michalska', 3),
(4, 'Krystyna', 'Piętkiewicz', 4),
(5, 'Maciej', 'Stasiak', 5);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klasa`
--
ALTER TABLE `klasa`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uczen`
--
ALTER TABLE `uczen`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wychowawca`
--
ALTER TABLE `wychowawca`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
