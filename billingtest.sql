-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2014 at 01:12 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `billingtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_to_invoice`
--

CREATE TABLE IF NOT EXISTS `customer_to_invoice` (
  `zoho_books_contact_id` varchar(100) NOT NULL,
  PRIMARY KEY (`zoho_books_contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_to_invoice`
--

INSERT INTO `customer_to_invoice` (`zoho_books_contact_id`) VALUES
('ZBCID0000001'),
('ZBCID0000002'),
('ZBCID0000003'),
('ZBCID0000004'),
('ZBCID0000005');

-- --------------------------------------------------------

--
-- Table structure for table `lines_to_invoice`
--

CREATE TABLE IF NOT EXISTS `lines_to_invoice` (
  `zoho_books_contact_id` varchar(100) NOT NULL,
  `device_serial_number` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `rate` decimal(11,2) NOT NULL,
  PRIMARY KEY (`zoho_books_contact_id`,`device_serial_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lines_to_invoice`
--

INSERT INTO `lines_to_invoice` (`zoho_books_contact_id`, `device_serial_number`, `description`, `rate`) VALUES
('ZBCID0000001', 'DSN0000001', 'Contract: C0000001, Serial Number: DSN0000001, Mono Pages: 201 (0.11 per page), Colour Pages: 101 (0.21 per page)', '5.72'),
('ZBCID0000001', 'DSN0000005', 'Contract: C0000005, Serial Number: DSN0000005, Mono Pages: 205 (0.15 per page), Colour Pages: 105 (0.25 per page)', '9.00'),
('ZBCID0000002', 'DSN0000002', 'Contract: C0000002, Serial Number: DSN0000002, Mono Pages: 201 (0.12 per page), Colour Pages: 101 (0.22 per page)', '6.48'),
('ZBCID0000003', 'DSN0000003', 'Contract: C0000003, Serial Number: DSN0000003, Mono Pages: 203 (0.13 per page), Colour Pages: 103 (0.23 per page)', '7.28'),
('ZBCID0000004', 'DSN0000004', 'Contract: C0000004, Serial Number: DSN0000004, Mono Pages: 203 (0.14 per page), Colour Pages: 103 (0.24 per page)', '8.12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
