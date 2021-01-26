-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `projectes`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `projectes`
--

CREATE TABLE `projectes` (
  `codi` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `descripcio` varchar(200) NOT NULL,
  `dataInici` date NOT NULL,
  `dataFi` date NOT NULL,
  `estat` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `projectes`
--

INSERT INTO `projectes` (`codi`, `nom`, `descripcio`, `dataInici`, `dataFi`, `estat`) VALUES
(1, 'ff', 'ff', '2020-01-08', '2020-01-23', 0),
(4, 'faa', 'f', '2020-01-17', '2020-01-09', 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `tasques`
--

CREATE TABLE `tasques` (
  `codi` int(11) NOT NULL,
  `codiprojecte` int(11) NOT NULL,
  `descripcio` varchar(200) NOT NULL,
  `estat` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `usuaris`
--

CREATE TABLE `usuaris` (
  `codi` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `cognoms` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `usuaris`
--

INSERT INTO `usuaris` (`codi`, `username`, `nom`, `cognoms`, `email`, `password`, `rol`) VALUES
(1, 'admin', 'Ana ', 'Fernandez Puig', 'afernan@prova.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'prova', 'Josep ', 'Ponts Camí', 'prova@prova.com', '189bbbb00c5f1fb7fba9ad9285f193d1', 0),
(14, 'esther', 'Esther', 'Serra Dalmau', 'prova@prova.com', 'hola', 0),
(19, 'esther', 'Esther', 'Serra Dalmau', 'prova@prova.com', 'hola', 0),
(22, 'vvv', 'hola', 'kjkjjk kjkjkj joojjooj', 'klklkl', 'd41d8cd98f00b204e9800998ecf8427e', 0),
(29, '', 'ww', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0);

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `projectes`
--
ALTER TABLE `projectes`
  ADD PRIMARY KEY (`codi`);

--
-- Index de la taula `tasques`
--
ALTER TABLE `tasques`
  ADD PRIMARY KEY (`codi`);

--
-- Index de la taula `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`codi`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `projectes`
--
ALTER TABLE `projectes`
  MODIFY `codi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la taula `tasques`
--
ALTER TABLE `tasques`
  MODIFY `codi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la taula `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `codi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
