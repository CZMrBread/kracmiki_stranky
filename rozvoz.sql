-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 17. čen 2022, 13:29
-- Verze serveru: 10.4.24-MariaDB
-- Verze PHP: 8.1.6

drop database rozvoz;
create database rozvoz;
use rozvoz;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `rozvoz`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `kosik`
--

CREATE TABLE `kosik` (
  `idko` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `ido` int(11) NOT NULL,
  `mnozstvi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `kosik`
--

INSERT INTO `kosik` (`idko`, `idp`, `ido`, `mnozstvi`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 5, 1, 1),
(4, 1, 2, 1),
(5, 3, 3, 1),
(6, 4, 3, 1),
(7, 2, 4, 1),
(8, 1, 5, 1),
(9, 2, 5, 1),
(10, 3, 5, 1),
(11, 5, 5, 1),
(20, 0, 6, 0),
(21, 1, 6, 1),
(22, 2, 6, 1),
(23, 3, 6, 1),
(24, 4, 6, 1),
(25, 0, 6, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `kuryr`
--

CREATE TABLE `kuryr` (
  `idk` int(11) NOT NULL,
  `jmeno` varchar(255) NOT NULL,
  `prijmeni` varchar(255) NOT NULL,
  `tel_cislo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `kuryr`
--

INSERT INTO `kuryr` (`idk`, `jmeno`, `prijmeni`, `tel_cislo`) VALUES
(1, 'Filip', 'Kos', 608353156),
(2, 'Václav', 'Frolík', 721123156),
(3, 'Andrej', 'Fiala', 608321513),
(4, 'Alexandr', 'Rychlý', 721753150),
(5, 'Jakub', 'Benda', 777353555),
(6, 'Jan', 'Kracmanov', 7);

-- --------------------------------------------------------

--
-- Struktura tabulky `objednavka`
--

CREATE TABLE `objednavka` (
  `ido` int(11) NOT NULL,
  `typ_platby` enum('Hotove','On-line') NOT NULL,
  `idz` int(11) NOT NULL,
  `cas_vyt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `objednavka`
--

INSERT INTO `objednavka` (`ido`, `typ_platby`, `idz`, `cas_vyt`) VALUES
(1, 'Hotove', 1, '2022-02-01 18:12:56'),
(2, 'On-line', 2, '2022-02-21 21:15:13'),
(3, 'Hotove', 3, '2022-02-11 19:26:08'),
(4, 'On-line', 4, '2022-02-28 17:32:23'),
(5, 'Hotove', 5, '2022-02-16 16:56:42'),
(6, 'Hotove', 0, '2022-06-17 13:27:43');

-- --------------------------------------------------------

--
-- Struktura tabulky `produkt`
--

CREATE TABLE `produkt` (
  `idp` int(11) NOT NULL,
  `nazev` varchar(255) NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `produkt`
--

INSERT INTO `produkt` (`idp`, `nazev`, `cena`) VALUES
(1, 'Svickova', 120),
(2, 'Hamburger', 150),
(3, 'Kebab', 80),
(4, 'Salat', 65),
(5, 'Hranolky', 35),
(6, 'Řízek', 50);

-- --------------------------------------------------------

--
-- Struktura tabulky `zakaznik`
--

CREATE TABLE `zakaznik` (
  `idz` int(11) NOT NULL,
  `jmeno` varchar(255) NOT NULL,
  `prijmeni` varchar(255) DEFAULT NULL,
  `tel_cislo` int(11) NOT NULL,
  `adresa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `zakaznik`
--

INSERT INTO `zakaznik` (`idz`, `jmeno`, `prijmeni`, `tel_cislo`, `adresa`) VALUES
(0, 'admin', 'admin', 0, 'Adresa'),
(1, 'Jan', 'Nový', 608956321, 'Nabrezi 1. Maje 728'),
(2, 'Petr', 'Rychlý', 608156823, 'Na Lipách 16'),
(3, 'Aleš', 'Novotný', 777456315, 'Budovcova 923'),
(4, 'Ondřej', 'Kirián', 777156489, 'Truhlářská 123'),
(5, 'Petr', 'Rychlý', 721789123, 'Smrkovická 32');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `kosik`
--
ALTER TABLE `kosik`
  ADD PRIMARY KEY (`idko`);

--
-- Indexy pro tabulku `kuryr`
--
ALTER TABLE `kuryr`
  ADD PRIMARY KEY (`idk`);

--
-- Indexy pro tabulku `objednavka`
--
ALTER TABLE `objednavka`
  ADD PRIMARY KEY (`ido`);

--
-- Indexy pro tabulku `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`idp`);

--
-- Indexy pro tabulku `zakaznik`
--
ALTER TABLE `zakaznik`
  ADD PRIMARY KEY (`idz`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `kosik`
--
ALTER TABLE `kosik`
  MODIFY `idko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pro tabulku `kuryr`
--
ALTER TABLE `kuryr`
  MODIFY `idk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pro tabulku `objednavka`
--
ALTER TABLE `objednavka`
  MODIFY `ido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pro tabulku `produkt`
--
ALTER TABLE `produkt`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pro tabulku `zakaznik`
--
ALTER TABLE `zakaznik`
  MODIFY `idz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
