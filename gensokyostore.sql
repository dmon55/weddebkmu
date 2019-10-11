-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 02:01 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gensokyostore`
--

-- --------------------------------------------------------

--
-- Table structure for table `gamelist`
--

CREATE TABLE `gamelist` (
  `gid` int(5) NOT NULL,
  `gname` varchar(100) NOT NULL,
  `ginfo` text NOT NULL,
  `price` int(5) NOT NULL,
  `type` varchar(100) NOT NULL,
  `gimg` text NOT NULL,
  `glink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gamelist`
--

INSERT INTO `gamelist` (`gid`, `gname`, `ginfo`, `price`, `type`, `gimg`, `glink`) VALUES
(1, 'Touhou 6: Koumakyou ~ The Embodiment of Scarlet Devil', 'A thick scarlet mist is covering Gensokyo; it blocks out the sun, which causes affected areas to become cold. Our heroines believe the culprit lives in the newly materialized Scarlet Devil Mansion, and so they depart with the goal of questioning those who live there.\r\n\r\nUnique Gameplay Mechanics\r\n* This is the only Windows game where you cannot see your hitbox while focusing.', 300000, 'Classic', 'TH6sample.jpg', 'https://dl.moriyashrine.org/official-games/Touhou%206%20~%20The%20Embodiment%20of%20Scarlet%20Devil.zip'),
(2, 'Touhou 7: Youyoumu - Perfect Cherry Blossom', 'Somebody\'s somehow collecting springtime energy from Gensokyo (unbeknownst to our heroines, the purpose is to revive a giant sakura tree). This is making things unseasonably cold in Gensokyo - it feels like winter! However, when the girls go to investigate, they discover that the hidden objective behind this tree\'s revival may threaten Gensokyo even more than the chill already in effect...\r\n \r\nUnique Gameplay Mechanics\r\nCherry Points\r\n* In this game, you can collect springtime energy, which is measured in Cherry Points.\r\n* Killing enemies while unfocused will get you more Cherry Points than if you\'re focused, but you can also collect Cherry Point Items to make the process go faster.\r\nSupernatural Border\r\n* If your CP reaches +50,000, the collected energy activates a Supernatural Border.\r\n* This border protects you from one hit until your Cherry value reaches 0 again; at that point, whether you ended up needing it or not, it disappears.\r\n* If you take a hit with a border up, it will wipe out all onscreen bullets.\r\n* If you don\'t take damage with your border up, you\'re awarded a sizable Border Bonus for managing to keep your border until its natural expiration.\r\n', 300, 'Classic', 'TH7sample.jpg', 'https://dl.moriyashrine.org/official-games/Touhou%207%20~%20Perfect%20Cherry%20Blossom.zip'),
(3, 'Touhou 7.5: Suimusou - Immaterial and Missing Power', '', 300, 'Classic', 'TH7-5sample.jpg', 'https://dl.moriyashrine.org/official-games/Touhou%207.5%20~%20Immaterial%20and%20Missing%20Power.zip'),
(4, 'Touhou 8: Eiyashou - Imperishable Night', '', 300, 'Classic', 'TH8sample.jpg', 'https://dl.moriyashrine.org/official-games/Touhou%208%20~%20Imperishable%20Night.zip'),
(5, 'Touhou 9: Kaiedzuka - Phantasmagoria of Flower View', '', 300, 'Classic', 'TH9sample.jpg', 'https://dl.moriyashrine.org/official-games/Touhou%209%20~%20Phantasmagoria%20of%20Flower%20View.zip'),
(6, 'Touhou 10: Fuujinroku - Mountain of Faith', '', 300, 'Modern', 'TH10sample.jpg', 'https://dl.moriyashrine.org/official-games/Touhou%2010%20~%20Mountain%20of%20Faith.zip'),
(7, 'Touhou 10.5: Hisouten - Scarlet Weather Rhapsody', 'An earthquake has flattened the Hakurei Shrine. However, even more unusual than that, strange and unseasonable weather has literally been following our girls around - for example, wherever Reimu goes, it\'s sunny; where Marisa goes, it drizzles - the list goes on. This afflicts all the initially playable girls on the roster (13), who investigate the incident.', 300, 'Modern', 'TH10-5sample.jpg', 'https://dl.moriyashrine.org/official-games/Touhou%2010.5%20~%20Scarlet%20Weather%20Rhapsody.zip');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `uid` int(5) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `stats` int(5) NOT NULL DEFAULT 1,
  `history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`uid`, `uname`, `email`, `password`, `stats`, `history`) VALUES
(1, 'dmon55', 'manabas003@gmail.com', '$2y$10$FmNfumzlz60cMHdbM20EjeTyv4mIGXmlXjLBzYUqo/nM5/85PP/1K', 2, ''),
(2, 'Fernzy123', 'manabas0@gmail.com', '$2y$10$Mb8ZnJsNcA6LFYN.eLVb8eeU4Llti5ieVcc7JMOUU/kRkFDb13tgq', 1, ''),
(3, 'xxx', 'manabas00210@gmail.com', '$2y$10$zGX9jnW8AwLnJlJbEKLi1eYY0TDDdcsCQkqQh1rBZcruE56oq4H22', 1, ''),
(4, 'Temmie', 'manabas1@gmail.com', '$2y$10$K3k9052/T2rRwODU/BiwU.JvfPIppAYlHwv8dSZfaF15x2rzM0lVm', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `newsbox`
--

CREATE TABLE `newsbox` (
  `iid` int(5) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsbox`
--

INSERT INTO `newsbox` (`iid`, `info`) VALUES
(1, '2/10/2019\r\nHello!\r\nDev-note: \r\nSome of the product was blank because of testing and bug when i try to add the product info. Don\'t worry.\r\nBut we still have a hard time about Shopping Cart and Search.\r\nHope it gone well before Last present..... ;(\r\nBug:\r\nAdmin-only:\r\n- When you edit you need to put a picture again or the picture won\'t load.\r\nSystem:{\r\nSearch:\r\n-Still don\'t know which code for it and don\'t have a problem.\r\nShopping Cart :\r\n-I did start the cart page but Google can\'t teach me that much.\r\n}\r\nHave a Great Day!\r\n\r\n1/10/2019\r\nHello! Tuesday\r\nDebug:\r\n- Finish recovery database\r\n-single quote is okay to use right now.\r\nExample this\'s single quote(\')\r\n\r\n30/9/2019\r\nOur Server was down don\'t worry we will fix the problem ASAP!\r\n                                    ');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `oid` int(5) NOT NULL,
  `date` date NOT NULL,
  `uoid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `did` int(5) NOT NULL,
  `oid` int(5) NOT NULL,
  `gid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gamelist`
--
ALTER TABLE `gamelist`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `newsbox`
--
ALTER TABLE `newsbox`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `buyer` (`uoid`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`did`),
  ADD KEY `list` (`gid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gamelist`
--
ALTER TABLE `gamelist`
  MODIFY `gid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsbox`
--
ALTER TABLE `newsbox`
  MODIFY `iid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `oid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `did` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `buyer` FOREIGN KEY (`uoid`) REFERENCES `member` (`uid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `list` FOREIGN KEY (`gid`) REFERENCES `gamelist` (`gid`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
