-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2025 at 02:45 PM
-- Server version: 8.0.40
-- PHP Version: 8.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slim_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tov`
--

DROP TABLE IF EXISTS `tov`;
CREATE TABLE IF NOT EXISTS `tov` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tov`
--

INSERT INTO `tov` (`id`, `name`, `description`, `price`, `quantity`, `created_at`) VALUES
(1, 'Парфуми Aqua Blue', 'Свіжий морський аромат із нотками лимона та лаванди.', 599.99, 20, '2025-03-29 20:47:27'),
(2, 'Парфуми Midnight Rose', 'Глибокий квітковий аромат з відтінками троянди та ванілі.', 749.50, 15, '2025-03-29 20:47:27'),
(3, 'Парфуми Citrus Energy', 'Яскравий цитрусовий аромат для активних людей.', 499.00, 30, '2025-03-29 20:47:27'),
(4, 'Парфуми Oriental Spice', 'Східний аромат з нотками кориці, мускусу та сандалу.', 899.99, 10, '2025-03-29 20:47:27'),
(5, 'Парфуми Vanilla Dream', 'Солодкий ванільний аромат із карамельним післясмаком.', 650.00, 25, '2025-03-29 20:47:27'),
(6, 'Парфуми Fresh Morning', 'Легкий трав’яний аромат для повсякденного використання.', 550.00, 18, '2025-03-29 20:47:27'),
(7, 'Парфуми Black Oud', 'Насичений деревний аромат з нотками уда та шкіри.', 1200.00, 8, '2025-03-29 20:47:27'),
(8, 'Парфуми Floral Symphony', 'Квітковий мікс із жасмину, фрезії та орхідеї.', 700.50, 22, '2025-03-29 20:47:27'),
(9, 'Парфуми Musk Elegance', 'Теплий мускусний аромат з нотами амбри.', 980.00, 12, '2025-03-29 20:47:27'),
(10, 'Парфуми Green Tea Breeze', 'Легкий чайний аромат з нотками лимону та жасмину.', 520.00, 28, '2025-03-29 20:47:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
