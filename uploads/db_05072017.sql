-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2017 at 10:29 AM
-- Server version: 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `funerariadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bk_apartados_account`
--

DROP TABLE IF EXISTS `bk_apartados_account`;
CREATE TABLE `bk_apartados_account` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `monto_abonado` double DEFAULT '0',
  `monto_total` double DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bk_apartados_account`
--

INSERT INTO `bk_apartados_account` (`id`, `contact_id`, `service_id`, `monto_abonado`, `monto_total`, `saldo`, `status`, `created_by`, `fecha_creacion`) VALUES
(2, 0, 15, 15000, 20000, 5000, 'P', NULL, '2017-06-20 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bk_apartados_account`
--
ALTER TABLE `bk_apartados_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bk_apartados_account`
--
ALTER TABLE `bk_apartados_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;