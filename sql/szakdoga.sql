-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Feb 08. 13:08
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `szakdoga`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `arajanlat`
--

CREATE TABLE `arajanlat` (
  `arajanlat_id` int(4) NOT NULL,
  `kuldo_id` int(4) NOT NULL,
  `fogado_id` int(4) NOT NULL,
  `keszult` date NOT NULL,
  `hatarido` date NOT NULL,
  `statusz` int(1) DEFAULT NULL,
  `statuszvaltozasi_datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ceg`
--

CREATE TABLE `ceg` (
  `ceg_id` int(4) NOT NULL,
  `telepules_id` int(4) NOT NULL,
  `szekhely` varchar(40) NOT NULL,
  `kategoria` varchar(20) NOT NULL,
  `adoszam` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoria`
--

CREATE TABLE `kategoria` (
  `kategoria_id` int(4) NOT NULL,
  `kategoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szolgaltatasok`
--

CREATE TABLE `szolgaltatasok` (
  `szolgaltatasok_id` int(4) NOT NULL,
  `szolgaltatasok` varchar(30) NOT NULL,
  `oradij` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szolgaltatas_kosar`
--

CREATE TABLE `szolgaltatas_kosar` (
  `arajanlat_id` int(4) NOT NULL,
  `szolgaltatas_id` int(4) NOT NULL,
  `szukseges_ido` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `telepules`
--

CREATE TABLE `telepules` (
  `telepules_id` int(4) NOT NULL,
  `irsz` int(4) NOT NULL,
  `telepules_nev` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tetelek`
--

CREATE TABLE `tetelek` (
  `tetel_id` int(4) NOT NULL,
  `tetel` varchar(30) NOT NULL,
  `darabár` int(10) NOT NULL,
  `kategoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tetel_kosar`
--

CREATE TABLE `tetel_kosar` (
  `arajanlat_id` int(4) NOT NULL,
  `tetel_id` int(4) NOT NULL,
  `mennyiseg` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `user_id` int(4) NOT NULL,
  `nev` varchar(30) NOT NULL,
  `telefon` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`user_id`, `nev`, `telefon`, `email`, `password`) VALUES
(2, '', '', 'dsadasd@co.co', 'dasdadaA67');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `arajanlat`
--
ALTER TABLE `arajanlat`
  ADD PRIMARY KEY (`arajanlat_id`),
  ADD KEY `kuldo_id` (`kuldo_id`,`fogado_id`),
  ADD KEY `fogado_id` (`fogado_id`);

--
-- A tábla indexei `ceg`
--
ALTER TABLE `ceg`
  ADD PRIMARY KEY (`ceg_id`),
  ADD KEY `telepules_id` (`telepules_id`);

--
-- A tábla indexei `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`kategoria_id`);

--
-- A tábla indexei `szolgaltatasok`
--
ALTER TABLE `szolgaltatasok`
  ADD PRIMARY KEY (`szolgaltatasok_id`);

--
-- A tábla indexei `szolgaltatas_kosar`
--
ALTER TABLE `szolgaltatas_kosar`
  ADD PRIMARY KEY (`arajanlat_id`),
  ADD KEY `szolgaltatas_id` (`szolgaltatas_id`);

--
-- A tábla indexei `telepules`
--
ALTER TABLE `telepules`
  ADD PRIMARY KEY (`telepules_id`);

--
-- A tábla indexei `tetelek`
--
ALTER TABLE `tetelek`
  ADD PRIMARY KEY (`tetel_id`),
  ADD KEY `kategoria_id` (`kategoria_id`);

--
-- A tábla indexei `tetel_kosar`
--
ALTER TABLE `tetel_kosar`
  ADD PRIMARY KEY (`arajanlat_id`),
  ADD KEY `tetel_id` (`tetel_id`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `arajanlat`
--
ALTER TABLE `arajanlat`
  MODIFY `arajanlat_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `ceg`
--
ALTER TABLE `ceg`
  MODIFY `ceg_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `kategoria_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `telepules`
--
ALTER TABLE `telepules`
  MODIFY `telepules_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `tetelek`
--
ALTER TABLE `tetelek`
  MODIFY `tetel_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `arajanlat`
--
ALTER TABLE `arajanlat`
  ADD CONSTRAINT `arajanlat_ibfk_1` FOREIGN KEY (`fogado_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `arajanlat_ibfk_2` FOREIGN KEY (`kuldo_id`) REFERENCES `ceg` (`ceg_id`);

--
-- Megkötések a táblához `ceg`
--
ALTER TABLE `ceg`
  ADD CONSTRAINT `ceg_ibfk_1` FOREIGN KEY (`telepules_id`) REFERENCES `telepules` (`telepules_id`);

--
-- Megkötések a táblához `szolgaltatas_kosar`
--
ALTER TABLE `szolgaltatas_kosar`
  ADD CONSTRAINT `szolgaltatas_kosar_ibfk_1` FOREIGN KEY (`arajanlat_id`) REFERENCES `arajanlat` (`arajanlat_id`),
  ADD CONSTRAINT `szolgaltatas_kosar_ibfk_2` FOREIGN KEY (`szolgaltatas_id`) REFERENCES `szolgaltatasok` (`szolgaltatasok_id`);

--
-- Megkötések a táblához `tetelek`
--
ALTER TABLE `tetelek`
  ADD CONSTRAINT `tetelek_ibfk_1` FOREIGN KEY (`kategoria_id`) REFERENCES `kategoria` (`kategoria_id`);

--
-- Megkötések a táblához `tetel_kosar`
--
ALTER TABLE `tetel_kosar`
  ADD CONSTRAINT `tetel_kosar_ibfk_1` FOREIGN KEY (`tetel_id`) REFERENCES `tetelek` (`tetel_id`),
  ADD CONSTRAINT `tetel_kosar_ibfk_2` FOREIGN KEY (`arajanlat_id`) REFERENCES `arajanlat` (`arajanlat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
