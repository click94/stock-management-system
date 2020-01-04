-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Jan 04. 18:28
-- Kiszolgáló verziója: 10.1.37-MariaDB
-- PHP verzió: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `database`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `quality_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `quality_category`) VALUES
(1, 'FashionFirst', '1'),
(2, 'BeautyFirst', '2'),
(3, 'GameFirst', '1');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `item_number` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,4) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `weight` double(10,4) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `age_group` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `product`
--

INSERT INTO `product` (`id`, `item_number`, `name`, `price`, `brand_id`, `weight`, `type`, `color`, `age_group`) VALUES
(1, 312323, 'woman dress', 10.9900, 1, 1.1200, NULL, 'red', NULL),
(2, 435435, 'cold cream', 5.9900, 2, 0.1200, 2, NULL, NULL),
(3, 435435, 'random board game', 18.9900, 3, 0.5900, NULL, NULL, '9-99');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `stock`
--

INSERT INTO `stock` (`id`, `warehouse_id`, `product_id`, `quantity`) VALUES
(2, 2, 3, 145),
(13, 1, 1, 10),
(17, 1, 1, 130),
(18, 3, 1, 200),
(20, 3, 2, 10),
(21, 1, 1, 10);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`, `title`, `capacity`) VALUES
(1, 'A230', 'A', 230),
(2, 'B150', 'B', 150),
(3, 'C400', 'C', 400);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT a táblához `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
