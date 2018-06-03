-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.22-0ubuntu0.16.04.1 - (Ubuntu)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para evaluacion_optime_consulting
CREATE DATABASE IF NOT EXISTS `evaluacion_optime_consulting` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `evaluacion_optime_consulting`;

-- Volcando estructura para tabla evaluacion_optime_consulting.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B3BA5A5A77153098` (`code`),
  UNIQUE KEY `UNIQ_B3BA5A5A5E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla evaluacion_optime_consulting.products: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `code`, `name`, `description`, `brand`, `category`, `price`) VALUES
	(1, 'P110', 'teclado slimstar 8000', 'Teclado inalámbrico negro alfanumérico', 'genius', 'perifericos', 45000),
	(2, 'P111', 'teclado slimstar 8200', 'Teclado inalámbrico negro', 'genius', 'perifericos', 35000),
	(4, 'P120', 'Teclado slimstar 5200', 'Teclado negro alfanumérico', 'genius', 'perifericos', 25000),
	(5, 'P130', 'Teclado slimstar 8400', 'Teclado alfanumérico retroiluminado', 'genius', 'perifericos', 85000),
	(6, 'P210', 'Mouse M170', 'Mouse inalámbrico negro de batería doble AA', 'logitech', 'perifericos', 23000),
	(13, 'P220', 'Mouse M220', 'Mouse USB Negro', 'logitech', 'perifericos', 15000),
	(14, 'P221', 'Mouse M220 W', 'Mouse USB Blanco', 'logitech', 'perifericos', 15000),
	(15, 'P310', 'Monitor Flatron W1600', 'Monitor LED 19 pulgadas negro', 'LG', 'perifericos', 450000),
	(16, 'H100', 'Disco duro SlimSpeed 1TB', 'Disco duro de 1TB, de 2.5 pulgadas, 7200rpm', 'Western Digital', 'hardware', 260000),
	(17, 'H200', 'Memoria RAM Spectrix D40 8gb', 'Memoria RAM de 8 gb 2400mhz DDR4', 'adata', 'hardware', 325000),
	(18, 'H210', 'Memoria RAM Hyperx', 'Memoria RAM 8GB 2400mhz DDR4', 'kingston', 'hardware', 350000);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
