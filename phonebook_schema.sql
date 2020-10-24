-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2017 at 05:33 PM
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebook_schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name_country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_country`) VALUES
(1, 'Afghanistan'),
(2, 'Aland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `index` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`index`, `id_user`, `email`, `visible`) VALUES
(1, '2', 'biga-boom@mail.ru', 1),
(2, '5', 'crazybaby@mail.ru', 1),
(3, '5', 'fi-cha@mail.ru', 0),
(4, '4', 'fi-fi@mail.ru', 0),
(6, '4', 'mimi-ska@mail.ru', 1),
(8, '2', 'misterx@mail.ru', 0),
(10, '2', 'sandr@mail.ru', 1),
(11, '5', 'shutdonwio@mail.ru', 0),
(12, '4', 'turnwiner@mail.ru', 1),
(13, '1', 'viga-boom@mail.ru', 0),
(14, '1', 'zinger@mail.ru', 0),
(285, '3', 'fsgafdg@mail.ru', 0),
(286, '3', 'jjfj@mail.ru', 0),
(287, '3', 'bestemail@mail.ru', 1),
(288, '3', 'vik-d@mail.ru', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phonenumbers`
--

CREATE TABLE `phonenumbers` (
  `index` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `phonenumber` varchar(13) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phonenumbers`
--

INSERT INTO `phonenumbers` (`index`, `id_user`, `phonenumber`, `visible`) VALUES
(1, 1, '548787', 1),
(2, 1, '5665', 0),
(3, 2, '87897', 1),
(4, 2, '78997', 1),
(5, 4, '3516565', 1),
(6, 4, '565', 0),
(7, 4, '65165', 1),
(8, 5, '56454', 1),
(9, 6, '54454140', 0),
(10, 6, '454545', 1),
(260, 3, '564546', 0),
(261, 3, '544854', 1),
(262, 3, '468446', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `id_country` int(255) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `first_name`, `last_name`, `street`, `city`, `id_country`, `visible`) VALUES
(1, 'Bro0s', 'asdfeDD2', 'Anthony', 'Hopkins', 'Str. Dency', 'Buffalo', 6, 0),
(2, 'jonik', 'ooIdm210LO', 'Johnny', 'Smith', 'Str.Vink ', 'Miami', 3, 1),
(3, 'SuccBurger', 'B0S777mypassword', 'Ed', 'Turney', 'Str. Nightish', 'Nowa-City', 7, 1),
(4, 'Vival', 'FOGDFKFF2V', 'Daniel', 'Rihtel', 'Str. Saten', 'Bins', 3, 1),
(5, 'wers', 'wrtsadfae', 'Johny', 'Sigalo', 'wert', 'wer', 9, 1),
(6, 'qwer', 'qwerewq', 'asdf', 'asdfdasf', 'asdf', 'asdf', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name` (`name_country`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `phonenumbers`
--
ALTER TABLE `phonenumbers`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;
--
-- AUTO_INCREMENT for table `phonenumbers`
--
ALTER TABLE `phonenumbers`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
