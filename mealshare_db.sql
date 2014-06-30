-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Erstellungszeit: 30. Jun 2014 um 03:18
-- Server Version: 5.5.34
-- PHP-Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `mealshare_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `meal_tbl`
--

CREATE TABLE `meal_tbl` (
  `user_ID` int(11) DEFAULT NULL,
  `participants` varchar(123) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `meal_ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `meal_date` varchar(255) DEFAULT NULL,
  `hour` varchar(255) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  PRIMARY KEY (`meal_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Daten für Tabelle `meal_tbl`
--

INSERT INTO `meal_tbl` (`user_ID`, `participants`, `meal_ID`, `title`, `description`, `meal_date`, `hour`, `seats`) VALUES
(12, '', 27, 'eins', '213123123', '2012-12-22', '22:22', 2),
(16, '', 47, 'asdasd', 'ilugkhj', '2014-11-11', '11:11', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Daten für Tabelle `user_tbl`
--

INSERT INTO `user_tbl` (`user_ID`, `firstname`, `lastname`, `email`, `street`, `city`, `password`) VALUES
(16, 'Aileen', 'Voelker', 'neelia0610@gmail.com', 'Rottenburgerstrasse 13', '72070 Tuebingen', '9af21581e9bd113fa0449eb336ef3f06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
