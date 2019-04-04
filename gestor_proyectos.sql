-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-04-2019 a las 16:08:54
-- Versión del servidor: 5.7.25-0ubuntu0.18.04.2
-- Versión de PHP: 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor_proyectos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anexos`
--

CREATE TABLE `anexos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(1500) NOT NULL,
  `program_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anexos`
--

INSERT INTO `anexos` (`id`, `name`, `path`, `program_id`, `created_at`, `updated_at`) VALUES
(3, 'prueba', 'storage/anexos/keRFTOsiwXIYk813S3nZz3lp7kpCyFFLCq2LFE9c.jpeg', 3, '2019-03-31 19:23:21', '2019-03-31 19:23:21'),
(4, 'anexo2', 'storage/anexos/0WLQ4xxjv796LefXtg14ENCzw5JDQNdXCuVVl7n9.jpeg', 4, '2019-04-01 00:58:19', '2019-04-01 00:58:19'),
(5, 'Anexo 1', 'storage/anexos/wxgCPzL94PkiUtE76O4GedrGuHFPqrG9C9tQzxcP.pdf', 7, '2019-04-01 08:16:40', '2019-04-01 08:16:40'),
(6, 'pdf 1', 'storage/anexos/lqrlfmtLBxzjEn9idt5iBYlzPLFBbN0PlReIBSmb.pdf', 8, '2019-04-01 13:14:37', '2019-04-01 13:14:37'),
(8, 'Mario', 'storage/anexos/rgzAdTrwqNIhqCcC46kQ4nceOoWarJadgVaqfFTB.jpeg', 9, '2019-04-01 13:18:48', '2019-04-01 13:18:48'),
(9, 'MARIO HUMBERTO', 'storage/anexos/kbKzLageFluqdJG69sDDo0LZ4x1vOssft9PDt3ew.jpeg', 12, '2019-04-01 13:32:50', '2019-04-01 13:32:50'),
(10, 'MARIO HUMBERTO', 'storage/anexos/GTG78gGoxbPfxIUcDZYlqBFNsjoArTRDUVgXlZPy.png', 12, '2019-04-01 13:32:50', '2019-04-01 13:32:50'),
(11, 'ef', 'storage/anexos/z6COs3boYIVVR2KCBpPePtPveX3dD5kzQXtAbMNL.png', 14, '2019-04-01 15:07:52', '2019-04-01 15:07:52'),
(12, 'dfg', 'storage/anexos/SIs5k4XpBsCoLGpPlekGwvty0tKWMzAQ2uXEbSnI.pptx', 14, '2019-04-01 15:07:52', '2019-04-01 15:07:52'),
(13, 'ine', 'storage/anexos/0zyOVvD0s0kT0aHEUbHd8FAj0Yjeh375eaPoAyMK.doc', 16, '2019-04-01 21:00:23', '2019-04-01 21:00:23'),
(14, '1', 'storage/anexos/LuorHRUOT3gpnieqxk5DwVuAC3tTUIhpFQYe3Jvg.pdf', 18, '2019-04-02 12:29:47', '2019-04-02 12:29:47'),
(15, '2', 'storage/anexos/StQSDfOK7nK0DNgzegsjULq6bZ0g7Nonsyrdcrul.pdf', 18, '2019-04-02 12:29:47', '2019-04-02 12:29:47'),
(16, '3', 'storage/anexos/AdcN8hUM9oJYso7UdPvNF8grjZQH8kcE594rnrT0.pdf', 18, '2019-04-02 12:29:47', '2019-04-02 12:29:47'),
(17, '4', 'storage/anexos/Cn3HLTHeZ8ocqc0ItM6fihBCGcKVgAuuWVPP5H35.pdf', 18, '2019-04-02 12:29:47', '2019-04-02 12:29:47'),
(18, '5', 'storage/anexos/eDKRUGyNqcbmFjCkVYc9hRrtpFpVXmUE87Vqqrz2.pdf', 18, '2019-04-02 12:29:47', '2019-04-02 12:29:47'),
(19, '6', 'storage/anexos/PueNbc3xnO4EoUsZgiYNIGUt7afsk8oaXgDdx3il.pdf', 18, '2019-04-02 12:29:47', '2019-04-02 12:29:47'),
(20, '7', 'storage/anexos/tSfsnLTeMnl0EnsiyeHatuJ0NmILfekVT6DjHO2g.pdf', 18, '2019-04-02 12:29:47', '2019-04-02 12:29:47'),
(21, '8', 'storage/anexos/YYzup58L1MpRRipDbCg8ucymB8AoHskfaoQd9COr.pdf', 18, '2019-04-02 12:29:47', '2019-04-02 12:29:47'),
(22, '9', 'storage/anexos/EERHzcnB95CiuljV62OzQTBXzK1MR0udUS9h2DYM.pdf', 18, '2019-04-02 12:29:47', '2019-04-02 12:29:47'),
(23, '10', 'storage/anexos/HQ18tHn4EuA0mDdhZzaW2V9DUUpil67VAY9kfNck.pdf', 18, '2019-04-02 12:29:47', '2019-04-02 12:29:47'),
(24, 'Mario', 'storage/anexos/2xiFZreywOEpS0ep3ztRWncbPkeUWES8IdfrJPC8.pdf', 21, '2019-04-02 15:11:14', '2019-04-02 15:11:14'),
(25, 'Mario', 'storage/anexos/LmsTUVuJdKWuyRtRXrFp6GBq5qik7jasHtD8zEk3.pdf', 22, '2019-04-02 15:14:00', '2019-04-02 15:14:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `applicants`
--

CREATE TABLE `applicants` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_last_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` int(10) UNSIGNED NOT NULL,
  `ejido` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colony` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `applicants`
--

INSERT INTO `applicants` (`id`, `first_name`, `last_name`, `second_last_name`, `type`, `phone`, `city`, `ejido`, `colony`, `street`, `number`, `zip`, `created_at`, `updated_at`) VALUES
(1, 'Rodrigo', 'Rojas', 'Martinez', 'Moral', '8341436123', 29104, 'safoiqwmk', 'klasnmlak', 'slkamfs', 'msaklmfa', '87100', '2019-03-31 18:56:11', '2019-03-31 18:56:11'),
(2, 'Miguel Angel', 'Perez', 'sanchez', 'Fisico', '8341034416', 29136, 'Victoria', 'xxxx', 'Colonia Liberal Avenida La Paz', '87', '87000', '2019-04-01 12:05:19', '2019-04-01 12:05:19'),
(3, 'Óscar', 'López', '-', 'Fisico', '8341182860', 29102, '-', '-', 'Sonora', '320', '87024', '2019-04-02 15:50:17', '2019-04-02 15:50:17'),
(4, 'MARIO HUMBERTO', 'CHÁVEZ', 'CHÁVEZ', 'Fisico', '8341262321', 29136, 'VICTORIA', 'FRACC. AMPL. MIGUEL ALEMÁN', 'HIDALGO ENTRE HENEQUENAL Y DESFIBRADORA, FRACC. AMPL. MIGUEL ALEMÁN', '2286', '87030', '2019-04-03 10:39:43', '2019-04-03 10:39:43'),
(5, 'Karla', 'Butrón', 'Balboa', 'Moral', '8341262321', 29136, 'Victoria', 'Col. Norberto Treviño Zapata', 'Sonora #320, entre Manuel Gonzalez y Emiliano Nafarrete, Col. Norberto Treviño Zapata', '5bfgbgfb', '87020', '2019-04-03 13:50:46', '2019-04-03 13:50:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(29102, 'Abasolo', NULL, NULL),
(29103, 'Aldama', NULL, NULL),
(29104, 'Altamira', NULL, NULL),
(29105, 'Antiguo Morelos', NULL, NULL),
(29106, 'Camargo', NULL, NULL),
(29107, 'Cuauhtemoc', NULL, NULL),
(29108, 'El Mante', NULL, NULL),
(29109, 'Estacion Manuel', NULL, NULL),
(29110, 'Gonzalez', NULL, NULL),
(29111, 'Graciano Sanchez', NULL, NULL),
(29112, 'Guerrero', NULL, NULL),
(29113, 'Gustavo Diaz Ordaz', NULL, NULL),
(29114, 'Hidalgo', NULL, NULL),
(29115, 'Jaumave', NULL, NULL),
(29116, 'Llerca', NULL, NULL),
(29117, 'Los Guerra', NULL, NULL),
(29118, 'Madero', NULL, NULL),
(29119, 'Matamoros', NULL, NULL),
(29120, 'Mier', NULL, NULL),
(29121, 'Miguel Aleman', NULL, NULL),
(29122, 'Miramar', NULL, NULL),
(29123, 'Nuevo Laredo', NULL, NULL),
(29124, 'Nuevo Progreso', NULL, NULL),
(29125, 'Ocampo', NULL, NULL),
(29126, 'Padilla', NULL, NULL),
(29127, 'Reynosa', NULL, NULL),
(29128, 'Rio Bravo', NULL, NULL),
(29129, 'San Fernando', NULL, NULL),
(29130, 'Santa Engracia', NULL, NULL),
(29131, 'Santander Jimenez', NULL, NULL),
(29132, 'Soto la Marina', NULL, NULL),
(29133, 'Tampico', NULL, NULL),
(29134, 'Tula', NULL, NULL),
(29135, 'Valle Hermoso', NULL, NULL),
(29136, 'Victoria', NULL, NULL),
(29137, 'Xicotencatl', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `components`
--

CREATE TABLE `components` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `components`
--

INSERT INTO `components` (`id`, `name`, `path`, `start_date`, `finish_date`, `program_id`, `created_at`, `updated_at`) VALUES
(3, 'Componente 1', 'storage/components/EiyEzLUaeBQIuUZt1A9Fz7qpRCiwXkuByMddeq0D.jpeg', '2019-04-01', '2019-04-10', 7, '2019-04-01 08:18:04', '2019-04-01 08:18:04'),
(5, 'Componente 1 de 4mil', 'storage/components/DkrflFjjBFgTjWbxmHjj7DKWXCk93wh9aOk5qk9O.jpeg', '2019-04-05', '2019-04-12', 14, '2019-04-01 15:08:36', '2019-04-01 15:08:36'),
(6, 'Componente 2 de 4mil', 'storage/components/iXyJeysOAUqvgq0AmmlOeFaWNOQMhO2Bxmpz85Pa.jpeg', '2019-04-13', '2019-04-24', 14, '2019-04-01 15:11:11', '2019-04-01 15:11:11'),
(7, 'Apoyo al cultivo de maíz (comp.)', 'storage/components/JBCxPDju9ANWs2WPXdruoClbLnU6wKgtJBPee8Pf.png', '2019-04-01', '2019-04-19', 16, '2019-04-01 21:19:14', '2019-04-01 21:19:14'),
(8, 'Apoyo cultivo de cocoa (comp.)', 'storage/components/WkGFtC6sW4oT3Encys61yBDFoQYWAIs0SbYsF94A.jpeg', '2019-04-11', '2019-04-26', 16, '2019-04-01 21:20:34', '2019-04-01 21:21:04'),
(9, 'Meca component 1', 'storage/components/8U78uXvUfb2Nbbk0VkN1WZJbeYXcCEtv0ov6YNCg.jpeg', '2019-04-03', '2019-04-12', 22, '2019-04-02 15:14:51', '2019-04-02 15:14:51'),
(10, 'Meca component 2', 'storage/components/zD1NfEugJz12rD4Xn6YGTFTwi5evh49qoA5vYEZT.jpeg', '2019-04-06', '2019-04-17', 22, '2019-04-02 15:15:21', '2019-04-02 15:15:21'),
(11, 'Meca component 3', 'storage/components/0HVElHHngjVWzwpFUZ7jPs9vGtpya5XARIUWEQej.jpeg', '2019-04-05', '2019-04-18', 22, '2019-04-02 15:15:46', '2019-04-02 15:15:46'),
(12, 'safklqwj', 'storage/components/f3a5ZY4dcmpAQ3cYXyYM1rYzqzRtRtuDD1KRLDbJ.png', '2019-04-03', '2019-04-12', 16, '2019-04-02 16:04:06', '2019-04-02 16:04:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepts`
--

CREATE TABLE `concepts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specific_requirements` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_amount_max` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_amount_max` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `component_id` int(11) DEFAULT NULL,
  `sub_component_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `concepts`
--

INSERT INTO `concepts` (`id`, `name`, `specific_requirements`, `p_amount_max`, `m_amount_max`, `program_id`, `component_id`, `sub_component_id`, `created_at`, `updated_at`) VALUES
(5, 'Concepto 1 de 4mil', 'storage/concepts/5uYzsMrYIK5wylgwAxwlDHBv4M4NrLaTixRURx9l.jpeg', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum  \r\n\r\n45654\r\n656', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum \r\n\r\n\r\n\r\n\r\ns4567657\r\n\r\n456', 14, NULL, 5, '2019-04-01 15:16:14', '2019-04-01 15:16:14'),
(6, 'concepto demo 3', 'storage/concepts/GeIWbj6wUnA6VhoOw7j3UW8JOZwyNLDHiXbYh1CG.jpeg', 'demo', 'demo', 14, 6, NULL, '2019-04-01 20:13:32', '2019-04-01 20:13:32'),
(7, 'Implementación de montos específicos', 'storage/concepts/mIe3xOnuZJgOLWc5mVGKULl9kGxOQCP6p3Qd7ftd.jpeg', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum \r\n\r\n$5,000.00', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum \r\n\r\n$45,0000', 16, NULL, 7, '2019-04-01 21:26:42', '2019-04-01 21:26:42'),
(8, 'Aplicación de asuntol', 'storage/concepts/ctlZowPSRv1HYA3jpjJ1Dcnp1va1lHlYG8cmpm77.jpeg', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum \r\n\r\n$5,000.00345435', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum \r\n\r\n$545454,000.00', 16, 8, NULL, '2019-04-01 21:27:32', '2019-04-01 21:27:32'),
(9, 'Meca concep 1', 'storage/concepts/kiSWGs7OfVonjoARks9hGdLqDzb2Maemo02PGjID.png', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\n$456456,4546.000', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\n$45645756', 22, NULL, 9, '2019-04-02 15:19:41', '2019-04-02 15:19:41'),
(10, 'Meca subcomponent 1.4', 'storage/concepts/Rp7l8m7oX59g5I6yWe8Tacva9DFHsdRre4Ev0vSV.jpeg', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\n$456456,4546.000', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\n$456456,44767', 22, NULL, 10, '2019-04-02 15:20:17', '2019-04-02 15:20:17'),
(11, 'Meca concep 3 - sin sucomponet', 'storage/concepts/Ky9fjn58RpwVKfkoF1CXLxDOZUSbw4xsu3iYeKIR.png', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\n$456456,4546.000', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\n$456456,4546.000353545', 22, 11, NULL, '2019-04-02 15:21:11', '2019-04-02 15:21:11'),
(12, 'componente 1', 'storage/concepts/MWoXvLxCh12AfknUnz8zFV59FxKN6ssQabKxmyv2.png', 'bsHKIJ', 'jaj', 16, 12, NULL, '2019-04-02 16:04:33', '2019-04-02 16:04:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documents`
--

CREATE TABLE `documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `documents`
--

INSERT INTO `documents` (`id`, `name`, `path`, `project_id`, `created_at`, `updated_at`) VALUES
(65, 'sasdg', 'storage/documents/OHWQ284Ak8QQgy7ixz5eDUjlmVEOmz0qdSJVu7BS.png', 54, '2019-04-03 11:43:35', '2019-04-03 11:43:35'),
(66, 'gsdag', 'storage/documents/z8f4GQJ26GGwYEg2lZJaHLvMAH2whCfExeKpiu7S.png', 55, '2019-04-03 11:45:27', '2019-04-03 11:45:27'),
(67, 'gasdg', 'storage/documents/wrJAUcFTvHm5RytRVP5L1kUtJhjaQpFSXH3hlJlL.png', 57, '2019-04-03 11:55:43', '2019-04-03 11:55:43'),
(72, 'ewgsghsh', 'storage/documents/i60OGr37PKj0rAsRJcTBcKiHAeMggMTPutRMuOVY.jpeg', 61, '2019-04-03 13:16:06', '2019-04-03 13:16:06'),
(73, 'INE', 'storage/documents/pSsJmkAQG071pfcpGcDxD8YcKLZNsJhjzqZTNO6N.jpeg', 62, '2019-04-03 14:08:20', '2019-04-03 14:08:20'),
(74, 'CURP', 'storage/documents/kPAjRjQEKl97X17bQiRoUbKwb3OfGClO3pfF5DX6.jpeg', 62, '2019-04-03 14:08:20', '2019-04-03 14:08:20'),
(75, 'RFC', 'storage/documents/SCqEfZgucB8sm2BGMSaLSj9JB0u1QrtZBiGb1Us8.pdf', 62, '2019-04-03 14:08:20', '2019-04-03 14:08:20'),
(76, 'Comprobante de domicilio', 'storage/documents/QBQwFDFdrdzbNSP2bQYFr5lwRpjCg4m6GAJENKl3.pdf', 62, '2019-04-03 14:08:20', '2019-04-03 14:08:20'),
(77, 'Acta de nacimiento', 'storage/documents/AU7svMIYg6V8FoTwcvuqUUeH8H1rYeiuERcrsb1i.pdf', 62, '2019-04-03 14:08:20', '2019-04-03 14:08:20'),
(78, 'INE', 'storage/documents/G4WOjsANrEmxPMAoBBBK8936OIh9sZwgdFlq7Wuz.jpeg', 66, '2019-04-03 18:58:09', '2019-04-03 18:58:09'),
(79, 'CURP', 'storage/documents/LB0roHtRGpQ837yZLk8jNWgTk2J1yfOZ8ZqtZEu4.jpeg', 70, '2019-04-03 19:18:34', '2019-04-03 19:18:34'),
(80, 'njksa', 'storage/documents/3JSHKoEUF9Db5F6DBE1JoEqEIBluVZyYbHLhOhkE.jpeg', 66, '2019-04-03 20:21:06', '2019-04-03 20:21:06'),
(81, 'iqw', 'storage/documents/ZlnUrDDuadXUwAOBdeCZp4Vq9asy0P7hWpzzpkQ4.jpeg', 66, '2019-04-03 20:21:06', '2019-04-03 20:21:06'),
(82, 'wiqo', 'storage/documents/xvvIPTRgOKxPT8ApC5mE0A6yEiKTzjDHy26S7cfF.jpeg', 66, '2019-04-03 20:21:06', '2019-04-03 20:21:06'),
(83, 'Jjjj', 'storage/documents/zRoVqu1aHp8vlnRY1kb4EezohWmIm1N8AfYdfXU0.png', 72, '2019-04-03 21:03:03', '2019-04-03 21:03:03'),
(84, 'Uno', 'storage/documents/L2h0edOjkrdWGKHaCZRzmVa10DILHH9ZN7acbs0t.jpeg', 73, '2019-04-03 21:09:24', '2019-04-03 21:09:24'),
(85, 'Dos', 'storage/documents/1SafyOOh76WgmiQRDxwMbgB0eZrxJ9ilNJAA97xY.jpeg', 73, '2019-04-03 21:09:24', '2019-04-03 21:09:24'),
(86, 'INE', 'storage/documents/spAkZuyidSfbTKDqCU7JXlrIvh4Iu6Vw035bC2mk.jpeg', 74, '2019-04-03 21:12:13', '2019-04-03 21:12:13'),
(87, 'CURP', 'storage/documents/O6B2s6gJNCNwK8DqDPsIMZSb8tXuOfnxPYwnhWvt.jpeg', 74, '2019-04-03 21:12:13', '2019-04-03 21:12:13'),
(88, 'salkfa', 'storage/documents/2aSqg25OEYhciBqm2H1M4eB22JwggkAgNb7WXAwT.jpeg', 74, '2019-04-03 21:27:50', '2019-04-03 21:27:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `glosaries`
--

CREATE TABLE `glosaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `word` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `definition` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `glosaries`
--

INSERT INTO `glosaries` (`id`, `word`, `definition`, `created_at`, `updated_at`) VALUES
(1, 'Laravel', 'Framework de PHP.', '2019-04-04 08:42:29', '2019-04-04 08:42:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `action` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id`, `message`, `date`, `action`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'El administrador Administardor System  ha iniciado sesión', '2019-03-31 17:51:03', 1, 1, NULL, NULL),
(2, 'El administrador Administardor System  registro programa con el id ', '2019-03-31 17:59:12', 3, 1, NULL, NULL),
(3, 'El administrador Administardor System  registro componente con el id 1', '2019-03-31 18:39:41', 3, 1, NULL, NULL),
(4, 'El administrador Administardor System  registro solicitante con el id 1', '2019-03-31 18:56:11', 3, 1, NULL, NULL),
(5, 'El administrador Administardor System  registro usuario con el id ', '2019-03-31 18:58:03', 3, 1, NULL, NULL),
(6, 'El administrador Administardor System  elimino proyecto con el id 1', '2019-03-31 18:59:41', 5, 1, NULL, NULL),
(7, 'El administrador Administardor System  registro documentos con el id 1', '2019-03-31 19:01:13', 3, 1, NULL, NULL),
(8, 'El administrador Administardor System  registro documentos con el id 2', '2019-03-31 19:01:13', 3, 1, NULL, NULL),
(9, 'El administrador Administardor System  registro proyecto con el id 2', '2019-03-31 19:01:13', 3, 1, NULL, NULL),
(10, 'El administrador Administardor System  registro historial con el id 1', '2019-03-31 19:01:13', 3, 1, NULL, NULL),
(11, 'El administrador Administardor System  elimino documento con el id 1', '2019-03-31 19:20:06', 5, 1, NULL, NULL),
(12, 'El administrador Administardor System  registro programa con el id ', '2019-03-31 19:23:21', 3, 1, NULL, NULL),
(13, 'El administrador Administardor System  registro documentos con el id 3', '2019-03-31 19:24:43', 3, 1, NULL, NULL),
(14, 'El administrador Administardor System  registro documentos con el id 4', '2019-03-31 19:24:43', 3, 1, NULL, NULL),
(15, 'El administrador Administardor System  registro proyecto con el id 3', '2019-03-31 19:24:43', 3, 1, NULL, NULL),
(16, 'El administrador Administardor System  registro historial con el id 2', '2019-03-31 19:24:43', 3, 1, NULL, NULL),
(17, 'El administrador Administardor System  elimino documento con el id 3', '2019-03-31 19:26:59', 5, 1, NULL, NULL),
(18, 'El administrador Administardor System  registro documentos con el id 5', '2019-03-31 19:31:07', 3, 1, NULL, NULL),
(19, 'El administrador Administardor System  registro documentos con el id 6', '2019-03-31 19:31:07', 3, 1, NULL, NULL),
(20, 'El administrador Administardor System  registro proyecto con el id 4', '2019-03-31 19:31:07', 3, 1, NULL, NULL),
(21, 'El administrador Administardor System  registro historial con el id 3', '2019-03-31 19:31:07', 3, 1, NULL, NULL),
(22, 'El administrador Administardor System  elimino documento con el id 5', '2019-03-31 19:37:13', 5, 1, NULL, NULL),
(23, 'El administrador Administardor System  registro documentos con el id 7', '2019-03-31 19:45:23', 3, 1, NULL, NULL),
(24, 'El administrador Administardor System  registro documentos con el id 8', '2019-03-31 19:45:23', 3, 1, NULL, NULL),
(25, 'El administrador Administardor System  registro proyecto con el id 5', '2019-03-31 19:45:23', 3, 1, NULL, NULL),
(26, 'El administrador Administardor System  registro historial con el id 4', '2019-03-31 19:45:23', 3, 1, NULL, NULL),
(27, 'El administrador Administardor System  elimino documento con el id 7', '2019-03-31 19:45:54', 5, 1, NULL, NULL),
(28, 'El administrador Administardor System  registro documentos con el id 9', '2019-03-31 19:56:35', 3, 1, NULL, NULL),
(29, 'El administrador Administardor System  registro documentos con el id 10', '2019-03-31 19:56:35', 3, 1, NULL, NULL),
(30, 'El administrador Administardor System  registro proyecto con el id 6', '2019-03-31 19:56:35', 3, 1, NULL, NULL),
(31, 'El administrador Administardor System  registro historial con el id 5', '2019-03-31 19:56:35', 3, 1, NULL, NULL),
(32, 'El administrador Administardor System  elimino documentos con el id 6', '2019-03-31 19:56:47', 5, 1, NULL, NULL),
(33, 'El administrador Administardor System  elimino proyecto con el id 6', '2019-03-31 19:56:47', 5, 1, NULL, NULL),
(34, 'El administrador Administardor System  elimino historial con el id 6', '2019-03-31 19:56:47', 5, 1, NULL, NULL),
(35, 'El administrador Administardor System  registro documentos con el id 11', '2019-03-31 19:59:58', 3, 1, NULL, NULL),
(36, 'El administrador Administardor System  registro proyecto con el id 7', '2019-03-31 19:59:58', 3, 1, NULL, NULL),
(37, 'El administrador Administardor System  registro historial con el id 6', '2019-03-31 19:59:58', 3, 1, NULL, NULL),
(38, 'El administrador Administardor System  elimino documentos del proyecto con el id 7', '2019-03-31 21:16:35', 5, 1, NULL, NULL),
(39, 'El administrador Administardor System  elimino proyecto con el id 7', '2019-03-31 21:16:35', 5, 1, NULL, NULL),
(40, 'El administrador Administardor System  elimino historial del proyecto con el id 7', '2019-03-31 21:16:35', 5, 1, NULL, NULL),
(41, 'El administrador Administardor System  registro documentos con el id 12', '2019-03-31 21:21:02', 3, 1, NULL, NULL),
(42, 'El administrador Administardor System  registro proyecto con el id 8', '2019-03-31 21:21:02', 3, 1, NULL, NULL),
(43, 'El administrador Administardor System  registro historial con el id 7', '2019-03-31 21:21:02', 3, 1, NULL, NULL),
(44, 'El administrador Administardor System  registro historial con el id ', '2019-03-31 22:22:36', 3, 1, NULL, NULL),
(45, 'El administrador Administardor System  actualizo proyecto con el id 8', '2019-03-31 22:22:36', 4, 1, NULL, NULL),
(46, 'El administrador Administardor System  registro documentos con el id 13', '2019-03-31 22:23:55', 3, 1, NULL, NULL),
(47, 'El administrador Administardor System  registro proyecto con el id 9', '2019-03-31 22:23:55', 3, 1, NULL, NULL),
(48, 'El administrador Administardor System  registro historial con el id 8', '2019-03-31 22:23:55', 3, 1, NULL, NULL),
(49, 'El administrador Administardor System  elimino documentos del proyecto con el id 8', '2019-03-31 22:29:39', 5, 1, NULL, NULL),
(50, 'El administrador Administardor System  elimino proyecto con el id 8', '2019-03-31 22:29:39', 5, 1, NULL, NULL),
(51, 'El administrador Administardor System  elimino historial del proyecto con el id 8', '2019-03-31 22:29:39', 5, 1, NULL, NULL),
(52, 'El administrador Administardor System  registro historial con el id 9', '2019-03-31 22:33:35', 3, 1, NULL, NULL),
(53, 'El administrador Administardor System  actualizo proyecto con el id 9', '2019-03-31 22:33:35', 4, 1, NULL, NULL),
(54, 'El administrador Administardor System  ha iniciado sesión', '2019-03-31 22:46:00', 1, 1, NULL, NULL),
(55, 'El administrador Administardor System  registro programa con el id ', '2019-03-31 22:59:07', 3, 1, NULL, NULL),
(56, 'El administrador Administardor System  registro documentos con el id 14', '2019-03-31 23:04:39', 3, 1, NULL, NULL),
(57, 'El administrador Administardor System  registro proyecto con el id 10', '2019-03-31 23:04:39', 3, 1, NULL, NULL),
(58, 'El administrador Administardor System  registro historial con el id 10', '2019-03-31 23:04:39', 3, 1, NULL, NULL),
(59, 'El administrador Administardor System  elimino anexo con el id 1', '2019-03-31 23:23:01', 5, 1, NULL, NULL),
(60, 'El administrador Administardor System  elimino anexo con el id 1', '2019-03-31 23:24:42', 5, 1, NULL, NULL),
(61, 'El administrador Administardor System  elimino anexo con el id 1', '2019-03-31 23:25:27', 5, 1, NULL, NULL),
(62, 'El administrador Administardor System  elimino anexo con el id 2', '2019-03-31 23:26:05', 5, 1, NULL, NULL),
(63, 'El administrador Administardor System  cerró sesión', '2019-04-01 00:47:58', 2, 1, NULL, NULL),
(64, 'El administrador Mike Sanchez  ha iniciado sesión', '2019-04-01 00:48:03', 1, 2, NULL, NULL),
(65, 'El administrador Mike Sanchez  actualizo programa con el id 4', '2019-04-01 00:58:19', 4, 2, NULL, NULL),
(66, 'El administrador Mike Sanchez  actualizo programa con el id 4', '2019-04-01 00:58:50', 4, 2, NULL, NULL),
(67, 'El administrador Mike Sanchez  elimino programa con el id 1', '2019-04-01 01:24:50', 5, 2, NULL, NULL),
(68, 'El administrador Mike Sanchez  ha iniciado sesión', '2019-04-01 01:27:35', 1, 2, NULL, NULL),
(69, 'El administrador Mike Sanchez  registro componente con el id 2', '2019-04-01 01:45:15', 3, 2, NULL, NULL),
(70, 'El administrador Administardor System  elimino documentos del proyecto con el id 9', '2019-04-01 01:59:23', 5, 1, NULL, NULL),
(71, 'El administrador Administardor System  elimino proyecto con el id 9', '2019-04-01 01:59:23', 5, 1, NULL, NULL),
(72, 'El administrador Administardor System  elimino historial del proyecto con el id 9', '2019-04-01 01:59:23', 5, 1, NULL, NULL),
(73, 'El administrador Administardor System  registro documentos con el id 15', '2019-04-01 02:00:43', 3, 1, NULL, NULL),
(74, 'El administrador Administardor System  actualizo proyecto con el id 10', '2019-04-01 02:00:43', 4, 1, NULL, NULL),
(75, 'El administrador Administardor System  registro historial con el id 14', '2019-04-01 02:00:43', 3, 1, NULL, NULL),
(76, 'El administrador Mike Sanchez  registro subcomponente con el id 1', '2019-04-01 02:08:28', 3, 2, NULL, NULL),
(77, 'El administrador Mike Sanchez  actualizo subcomponente con el id 1', '2019-04-01 02:11:40', 4, 2, NULL, NULL),
(78, 'El administrador Mike Sanchez  registro concepto con el id 1', '2019-04-01 02:20:54', 3, 2, NULL, NULL),
(79, 'El administrador Mike Sanchez  actualizo concepto con el id 1', '2019-04-01 02:24:31', 4, 2, NULL, NULL),
(80, 'El administrador Administardor System  ha iniciado sesión', '2019-04-01 08:06:48', 1, 1, NULL, NULL),
(81, 'El administrador Administardor System  ha iniciado sesión', '2019-04-01 08:08:09', 1, 1, NULL, NULL),
(82, 'El administrador Administardor System  registro documentos con el id 16', '2019-04-01 08:10:15', 3, 1, NULL, NULL),
(83, 'El administrador Administardor System  registro documentos con el id 17', '2019-04-01 08:10:15', 3, 1, NULL, NULL),
(84, 'El administrador Administardor System  registro proyecto con el id 11', '2019-04-01 08:10:15', 3, 1, NULL, NULL),
(85, 'El administrador Administardor System  registro historial con el id 15', '2019-04-01 08:10:15', 3, 1, NULL, NULL),
(86, 'El administrador Administardor System  registro programa con el id 7', '2019-04-01 08:16:40', 3, 1, NULL, NULL),
(87, 'El administrador Administardor System  registro componente con el id 3', '2019-04-01 08:18:04', 3, 1, NULL, NULL),
(88, 'El administrador Administardor System  registro subcomponente con el id 2', '2019-04-01 08:19:03', 3, 1, NULL, NULL),
(89, 'El administrador Administardor System  registro concepto con el id 2', '2019-04-01 08:20:22', 3, 1, NULL, NULL),
(90, 'El administrador Administardor System  actualizo programa con el id 7', '2019-04-01 08:24:37', 4, 1, NULL, NULL),
(91, 'El administrador Administardor System  registro componente con el id 4', '2019-04-01 08:25:12', 3, 1, NULL, NULL),
(92, 'El administrador Administardor System  registro subcomponente con el id 3', '2019-04-01 08:26:13', 3, 1, NULL, NULL),
(93, 'El administrador Administardor System  registro concepto con el id 3', '2019-04-01 08:28:59', 3, 1, NULL, NULL),
(94, 'El administrador Administardor System  cerró sesión', '2019-04-01 08:43:17', 2, 1, NULL, NULL),
(95, 'El administrador Administardor System  ha iniciado sesión', '2019-04-01 08:45:03', 1, 1, NULL, NULL),
(96, 'El administrador Administardor System  ha iniciado sesión', '2019-04-01 08:54:26', 1, 1, NULL, NULL),
(97, 'El administrador Administardor System  registro concepto con el id 4', '2019-04-01 08:56:13', 3, 1, NULL, NULL),
(98, 'El administrador Administardor System  registro historial con el id 16', '2019-04-01 09:33:41', 3, 1, NULL, NULL),
(99, 'El administrador Administardor System  actualizo proyecto con el id 10', '2019-04-01 09:33:41', 4, 1, NULL, NULL),
(100, 'El administrador Administardor System  elimino documento con el id 14', '2019-04-01 09:52:43', 5, 1, NULL, NULL),
(101, 'El administrador Mike Sanchez  ha iniciado sesión', '2019-04-01 10:29:52', 1, 2, NULL, NULL),
(102, 'El administrador Mike Sanchez  registro solicitante con el id 2', '2019-04-01 12:05:19', 3, 2, NULL, NULL),
(103, 'El administrador Administardor System  ha iniciado sesión', '2019-04-01 12:22:59', 1, 1, NULL, NULL),
(104, 'El administrador Administardor System  registro programa con el id 8', '2019-04-01 13:14:37', 3, 1, NULL, NULL),
(105, 'El administrador Administardor System  elimino anexo con el id 7', '2019-04-01 13:15:27', 5, 1, NULL, NULL),
(106, 'El administrador Administardor System  registro programa con el id 9', '2019-04-01 13:18:48', 3, 1, NULL, NULL),
(107, 'El administrador Administardor System  registro programa con el id 10', '2019-04-01 13:25:45', 3, 1, NULL, NULL),
(108, 'El administrador Administardor System  registro programa con el id 11', '2019-04-01 13:29:46', 3, 1, NULL, NULL),
(109, 'El administrador Administardor System  registro programa con el id 12', '2019-04-01 13:32:50', 3, 1, NULL, NULL),
(110, 'El administrador Administardor System  registro programa con el id 13', '2019-04-01 13:34:40', 3, 1, NULL, NULL),
(111, 'El administrador Administardor System  cerró sesión', '2019-04-01 13:55:39', 2, 1, NULL, NULL),
(112, 'El administrador Administardor System  ha iniciado sesión', '2019-04-01 15:05:27', 1, 1, NULL, NULL),
(113, 'El administrador Administardor System  registro programa con el id 14', '2019-04-01 15:07:52', 3, 1, NULL, NULL),
(114, 'El administrador Administardor System  registro componente con el id 5', '2019-04-01 15:08:36', 3, 1, NULL, NULL),
(115, 'El administrador Administardor System  registro componente con el id 6', '2019-04-01 15:11:11', 3, 1, NULL, NULL),
(116, 'El administrador Administardor System  registro subcomponente con el id 4', '2019-04-01 15:11:46', 3, 1, NULL, NULL),
(117, 'El administrador Administardor System  registro subcomponente con el id 5', '2019-04-01 15:13:26', 3, 1, NULL, NULL),
(118, 'El administrador Administardor System  registro concepto con el id 5', '2019-04-01 15:16:14', 3, 1, NULL, NULL),
(119, 'El administrador Administardor System  actualizo subcomponente con el id 5', '2019-04-01 15:17:31', 4, 1, NULL, NULL),
(120, 'El administrador Administardor System  actualizo subcomponente con el id 5', '2019-04-01 15:17:31', 4, 1, NULL, NULL),
(121, 'El administrador Administardor System  actualizo concepto con el id 5', '2019-04-01 15:19:20', 4, 1, NULL, NULL),
(122, 'El administrador Mike Sanchez  ha iniciado sesión', '2019-04-01 15:25:09', 1, 2, NULL, NULL),
(123, 'El administrador Mike Sanchez  cerró sesión', '2019-04-01 15:26:34', 2, 2, NULL, NULL),
(124, 'El administrador Administardor System  ha iniciado sesión', '2019-04-01 18:31:06', 1, 1, NULL, NULL),
(125, 'El administrador Mike Sanchez  actualizo componente con el id 2', '2019-04-01 18:55:54', 4, 2, NULL, NULL),
(126, 'El administrador Mike Sanchez  elimino componente con el id 4', '2019-04-01 18:56:14', 5, 2, NULL, NULL),
(127, 'El administrador Mike Sanchez  elimino componente con el id 4', '2019-04-01 18:56:44', 5, 2, NULL, NULL),
(128, 'El administrador Mike Sanchez  elimino concepto con el id 3', '2019-04-01 19:54:12', 5, 2, NULL, NULL),
(129, 'El administrador Mike Sanchez  elimino concepto con el id 4', '2019-04-01 19:54:19', 5, 2, NULL, NULL),
(130, 'El administrador Administardor System  ha iniciado sesión', '2019-04-01 19:59:58', 1, 1, NULL, NULL),
(131, 'El administrador Mike Sanchez  elimino componente con el id 2', '2019-04-01 20:09:52', 5, 2, NULL, NULL),
(132, 'El administrador Mike Sanchez  registro concepto con el id 6', '2019-04-01 20:13:32', 3, 2, NULL, NULL),
(133, 'El administrador Mike Sanchez  elimino subcomponente con el id 2', '2019-04-01 20:16:43', 5, 2, NULL, NULL),
(134, 'El administrador Mike Sanchez  elimino programa con el id 3', '2019-04-01 20:26:38', 5, 2, NULL, NULL),
(135, 'El administrador Mike Sanchez  elimino programa con el id 5', '2019-04-01 20:27:47', 5, 2, NULL, NULL),
(136, 'El administrador Mike Sanchez  elimino programa con el id 2', '2019-04-01 20:27:57', 5, 2, NULL, NULL),
(137, 'El administrador Mike Sanchez  elimino programa con el id 6', '2019-04-01 20:28:08', 5, 2, NULL, NULL),
(138, 'El administrador Mike Sanchez  registro programa con el id 15', '2019-04-01 20:39:10', 3, 2, NULL, NULL),
(139, 'El administrador Administardor System  ha iniciado sesión', '2019-04-01 20:44:38', 1, 1, NULL, NULL),
(140, 'El administrador Administardor System  ha iniciado sesión', '2019-04-01 20:58:09', 1, 1, NULL, NULL),
(141, 'El administrador Administardor System  registro programa con el id 16', '2019-04-01 21:00:23', 3, 1, NULL, NULL),
(142, 'El administrador Administardor System  registro componente con el id 7', '2019-04-01 21:19:14', 3, 1, NULL, NULL),
(143, 'El administrador Administardor System  registro componente con el id 8', '2019-04-01 21:20:34', 3, 1, NULL, NULL),
(144, 'El administrador Administardor System  actualizo componente con el id 8', '2019-04-01 21:21:04', 4, 1, NULL, NULL),
(145, 'El administrador Administardor System  registro subcomponente con el id 6', '2019-04-01 21:23:30', 3, 1, NULL, NULL),
(146, 'El administrador Administardor System  registro subcomponente con el id 7', '2019-04-01 21:24:25', 3, 1, NULL, NULL),
(147, 'El administrador Administardor System  registro subcomponente con el id 8', '2019-04-01 21:25:13', 3, 1, NULL, NULL),
(148, 'El administrador Administardor System  registro concepto con el id 7', '2019-04-01 21:26:42', 3, 1, NULL, NULL),
(149, 'El administrador Administardor System  registro concepto con el id 8', '2019-04-01 21:27:32', 3, 1, NULL, NULL),
(150, 'El administrador Administardor System  cerró sesión', '2019-04-01 22:51:39', 2, 1, NULL, NULL),
(151, 'El administrador Administardor System  ha iniciado sesión', '2019-04-02 06:33:21', 1, 1, NULL, NULL),
(152, 'El administrador Administardor System  registro documentos con el id 18', '2019-04-02 06:56:14', 3, 1, NULL, NULL),
(153, 'El administrador Administardor System  registro documentos con el id 19', '2019-04-02 06:57:45', 3, 1, NULL, NULL),
(154, 'El administrador Administardor System  registro documentos con el id 20', '2019-04-02 06:58:23', 3, 1, NULL, NULL),
(155, 'El administrador Administardor System  elimino documentos del proyecto con el id 12', '2019-04-02 06:58:54', 5, 1, NULL, NULL),
(156, 'El administrador Administardor System  elimino proyecto con el id 12', '2019-04-02 06:58:54', 5, 1, NULL, NULL),
(157, 'El administrador Administardor System  registro documentos con el id 21', '2019-04-02 07:02:06', 3, 1, NULL, NULL),
(158, 'El administrador Administardor System  registro documentos con el id 22', '2019-04-02 07:06:10', 3, 1, NULL, NULL),
(159, 'El administrador Administardor System  registro documentos con el id 23', '2019-04-02 07:08:08', 3, 1, NULL, NULL),
(160, 'El administrador Administardor System  registro conceptos con el id 1', '2019-04-02 07:08:08', 3, 1, NULL, NULL),
(161, 'El administrador Administardor System  registro conceptos con el id 2', '2019-04-02 07:08:08', 3, 1, NULL, NULL),
(162, 'El administrador Administardor System  registro proyecto con el id 17', '2019-04-02 07:08:08', 3, 1, NULL, NULL),
(163, 'El administrador Administardor System  registro historial con el id 17', '2019-04-02 07:08:08', 3, 1, NULL, NULL),
(164, 'El administrador Administardor System  elimino documentos del proyecto con el id 16', '2019-04-02 07:08:38', 5, 1, NULL, NULL),
(165, 'El administrador Administardor System  elimino proyecto con el id 16', '2019-04-02 07:08:38', 5, 1, NULL, NULL),
(166, 'El administrador Administardor System  elimino conceptos del proyecto con el id 17', '2019-04-02 07:11:21', 5, 1, NULL, NULL),
(167, 'El administrador Administardor System  elimino documentos del proyecto con el id 17', '2019-04-02 07:11:21', 5, 1, NULL, NULL),
(168, 'El administrador Administardor System  elimino proyecto con el id 17', '2019-04-02 07:11:21', 5, 1, NULL, NULL),
(169, 'El administrador Administardor System  elimino historial del proyecto con el id 17', '2019-04-02 07:11:21', 5, 1, NULL, NULL),
(170, 'El administrador Administardor System  ha iniciado sesión', '2019-04-02 08:12:42', 1, 1, NULL, NULL),
(171, 'El administrador Administardor System  ha iniciado sesión', '2019-04-02 08:24:05', 1, 1, NULL, NULL),
(172, 'El administrador Administardor System  cerró sesión', '2019-04-02 08:24:16', 2, 1, NULL, NULL),
(173, 'El administrador Administardor System  ha iniciado sesión', '2019-04-02 08:24:23', 1, 1, NULL, NULL),
(174, 'El administrador Administardor System  registro documentos con el id 24', '2019-04-02 08:34:21', 3, 1, NULL, NULL),
(175, 'El administrador Administardor System  registro conceptos con el id 3', '2019-04-02 08:34:21', 3, 1, NULL, NULL),
(176, 'El administrador Administardor System  registro proyecto con el id 18', '2019-04-02 08:34:21', 3, 1, NULL, NULL),
(177, 'El administrador Administardor System  registro historial con el id 18', '2019-04-02 08:34:21', 3, 1, NULL, NULL),
(178, 'El administrador Administardor System  registro documentos con el id 25', '2019-04-02 08:36:54', 3, 1, NULL, NULL),
(179, 'El administrador Administardor System  actualizo proyecto con el id 18', '2019-04-02 08:36:54', 4, 1, NULL, NULL),
(180, 'El administrador Administardor System  registro historial con el id 19', '2019-04-02 08:36:54', 3, 1, NULL, NULL),
(181, 'El administrador Administardor System  registro documentos con el id 26', '2019-04-02 08:45:21', 3, 1, NULL, NULL),
(182, 'El administrador Administardor System  actualizo proyecto con el id 18', '2019-04-02 08:45:21', 4, 1, NULL, NULL),
(183, 'El administrador Administardor System  registro historial con el id 20', '2019-04-02 08:45:21', 3, 1, NULL, NULL),
(184, 'El administrador Mike Sanchez  ha iniciado sesión', '2019-04-02 08:56:49', 1, 2, NULL, NULL),
(185, 'El administrador Administardor System  registro documentos con el id 27', '2019-04-02 09:23:33', 3, 1, NULL, NULL),
(186, 'El administrador Administardor System  registro conceptos con el id 4', '2019-04-02 09:23:33', 3, 1, NULL, NULL),
(187, 'El administrador Administardor System  registro proyecto con el id 19', '2019-04-02 09:23:33', 3, 1, NULL, NULL),
(188, 'El administrador Administardor System  registro historial con el id 21', '2019-04-02 09:23:33', 3, 1, NULL, NULL),
(189, 'El administrador Administardor System  registro documentos con el id 28', '2019-04-02 09:29:15', 3, 1, NULL, NULL),
(190, 'El administrador Administardor System  registro conceptos con el id 5', '2019-04-02 09:29:15', 3, 1, NULL, NULL),
(191, 'El administrador Administardor System  registro proyecto con el id 20', '2019-04-02 09:29:15', 3, 1, NULL, NULL),
(192, 'El administrador Administardor System  registro historial con el id 22', '2019-04-02 09:29:15', 3, 1, NULL, NULL),
(193, 'El administrador Administardor System  ha iniciado sesión', '2019-04-02 11:20:34', 1, 1, NULL, NULL),
(194, 'El administrador Administardor System  registro documentos con el id 29', '2019-04-02 11:29:43', 3, 1, NULL, NULL),
(195, 'El administrador Administardor System  registro proyecto con el id 21', '2019-04-02 11:29:43', 3, 1, NULL, NULL),
(196, 'El administrador Administardor System  registro historial con el id 23', '2019-04-02 11:29:43', 3, 1, NULL, NULL),
(197, 'El administrador Administardor System  ha iniciado sesión', '2019-04-02 11:38:53', 1, 1, NULL, NULL),
(198, 'El administrador Administardor System  registro proyecto con el id 25', '2019-04-02 11:53:30', 3, 1, NULL, NULL),
(199, 'El administrador Administardor System  registro historial con el id 24', '2019-04-02 11:53:30', 3, 1, NULL, NULL),
(200, 'El administrador Administardor System  registro proyecto con el id 26', '2019-04-02 12:09:44', 3, 1, NULL, NULL),
(201, 'El administrador Administardor System  registro historial con el id 25', '2019-04-02 12:09:44', 3, 1, NULL, NULL),
(202, 'El administrador Administardor System  actualizo proyecto con el id 25', '2019-04-02 12:13:29', 4, 1, NULL, NULL),
(203, 'El administrador Administardor System  registro historial con el id 26', '2019-04-02 12:13:29', 3, 1, NULL, NULL),
(204, 'El administrador Administardor System  registro programa con el id 18', '2019-04-02 12:29:47', 3, 1, NULL, NULL),
(205, 'El administrador Administardor System  cerró sesión', '2019-04-02 12:32:09', 2, 1, NULL, NULL),
(206, 'El administrador Administardor System  ha iniciado sesión', '2019-04-02 12:40:23', 1, 1, NULL, NULL),
(207, 'El administrador Administardor System  actualizo programa con el id 8', '2019-04-02 12:42:39', 4, 1, NULL, NULL),
(208, 'El administrador Administardor System  registro proyecto con el id 27', '2019-04-02 12:48:17', 3, 1, NULL, NULL),
(209, 'El administrador Administardor System  registro historial con el id 27', '2019-04-02 12:48:17', 3, 1, NULL, NULL),
(210, 'El administrador Administardor System  registro proyecto con el id 28', '2019-04-02 12:48:41', 3, 1, NULL, NULL),
(211, 'El administrador Administardor System  registro historial con el id 28', '2019-04-02 12:48:41', 3, 1, NULL, NULL),
(212, 'El administrador Administardor System  registro documentos con el id 30', '2019-04-02 12:58:52', 3, 1, NULL, NULL),
(213, 'El administrador Administardor System  registro proyecto con el id 29', '2019-04-02 12:58:52', 3, 1, NULL, NULL),
(214, 'El administrador Administardor System  registro historial con el id 29', '2019-04-02 12:58:52', 3, 1, NULL, NULL),
(215, 'El administrador Administardor System  registro documentos con el id 31', '2019-04-02 13:01:57', 3, 1, NULL, NULL),
(216, 'El administrador Administardor System  registro documentos con el id 32', '2019-04-02 13:01:57', 3, 1, NULL, NULL),
(217, 'El administrador Administardor System  registro documentos con el id 33', '2019-04-02 13:01:57', 3, 1, NULL, NULL),
(218, 'El administrador Administardor System  registro documentos con el id 34', '2019-04-02 13:04:04', 3, 1, NULL, NULL),
(219, 'El administrador Administardor System  actualizo proyecto con el id 29', '2019-04-02 13:06:10', 4, 1, NULL, NULL),
(220, 'El administrador Administardor System  registro historial con el id 32', '2019-04-02 13:06:10', 3, 1, NULL, NULL),
(221, 'El administrador Administardor System  registro documentos con el id 35', '2019-04-02 13:10:36', 3, 1, NULL, NULL),
(222, 'El administrador Administardor System  registro documentos con el id 36', '2019-04-02 13:10:36', 3, 1, NULL, NULL),
(223, 'El administrador Administardor System  actualizo proyecto con el id 27', '2019-04-02 13:10:36', 4, 1, NULL, NULL),
(224, 'El administrador Administardor System  registro historial con el id 33', '2019-04-02 13:10:36', 3, 1, NULL, NULL),
(225, 'El administrador Administardor System  registro documentos con el id 37', '2019-04-02 13:11:30', 3, 1, NULL, NULL),
(226, 'El administrador Administardor System  registro proyecto con el id 30', '2019-04-02 13:11:30', 3, 1, NULL, NULL),
(227, 'El administrador Administardor System  registro historial con el id 34', '2019-04-02 13:11:30', 3, 1, NULL, NULL),
(228, 'El administrador Administardor System  registro documentos con el id 38', '2019-04-02 13:12:55', 3, 1, NULL, NULL),
(229, 'El administrador Administardor System  registro documentos con el id 39', '2019-04-02 13:16:29', 3, 1, NULL, NULL),
(230, 'El administrador Administardor System  actualizo proyecto con el id 26', '2019-04-02 13:16:29', 4, 1, NULL, NULL),
(231, 'El administrador Administardor System  registro historial con el id 36', '2019-04-02 13:16:29', 3, 1, NULL, NULL),
(232, 'El administrador Administardor System  registro documentos con el id 40', '2019-04-02 13:17:40', 3, 1, NULL, NULL),
(233, 'El administrador Administardor System  registro documentos con el id 41', '2019-04-02 13:17:40', 3, 1, NULL, NULL),
(234, 'El administrador Administardor System  registro documentos con el id 42', '2019-04-02 13:17:40', 3, 1, NULL, NULL),
(235, 'El administrador Administardor System  actualizo proyecto con el id 26', '2019-04-02 13:17:40', 4, 1, NULL, NULL),
(236, 'El administrador Administardor System  registro historial con el id 37', '2019-04-02 13:17:40', 3, 1, NULL, NULL),
(237, 'El administrador Administardor System  registro documentos con el id 43', '2019-04-02 13:18:38', 3, 1, NULL, NULL),
(238, 'El administrador Administardor System  registro proyecto con el id 31', '2019-04-02 13:18:38', 3, 1, NULL, NULL),
(239, 'El administrador Administardor System  registro historial con el id 38', '2019-04-02 13:18:38', 3, 1, NULL, NULL),
(240, 'El administrador Administardor System  registro documentos con el id 44', '2019-04-02 13:19:24', 3, 1, NULL, NULL),
(241, 'El administrador Administardor System  registro documentos con el id 45', '2019-04-02 13:19:24', 3, 1, NULL, NULL),
(242, 'El administrador Administardor System  registro documentos con el id 46', '2019-04-02 13:19:24', 3, 1, NULL, NULL),
(243, 'El administrador Administardor System  registro documentos con el id 47', '2019-04-02 13:19:24', 3, 1, NULL, NULL),
(244, 'El administrador Administardor System  actualizo proyecto con el id 31', '2019-04-02 13:19:24', 4, 1, NULL, NULL),
(245, 'El administrador Administardor System  registro historial con el id 39', '2019-04-02 13:19:24', 3, 1, NULL, NULL),
(246, 'El administrador Administardor System  registro documentos con el id 48', '2019-04-02 13:21:08', 3, 1, NULL, NULL),
(247, 'El administrador Administardor System  registro proyecto con el id 32', '2019-04-02 13:21:08', 3, 1, NULL, NULL),
(248, 'El administrador Administardor System  registro historial con el id 40', '2019-04-02 13:21:08', 3, 1, NULL, NULL),
(249, 'El administrador Administardor System  registro documentos con el id 49', '2019-04-02 13:28:08', 3, 1, NULL, NULL),
(250, 'El administrador Administardor System  registro proyecto con el id 33', '2019-04-02 13:28:08', 3, 1, NULL, NULL),
(251, 'El administrador Administardor System  registro historial con el id 42', '2019-04-02 13:28:08', 3, 1, NULL, NULL),
(252, 'El administrador Administardor System  registro documentos con el id 50', '2019-04-02 13:29:06', 3, 1, NULL, NULL),
(253, 'El administrador Administardor System  registro documentos con el id 51', '2019-04-02 13:29:06', 3, 1, NULL, NULL),
(254, 'El administrador Administardor System  registro documentos con el id 52', '2019-04-02 13:29:06', 3, 1, NULL, NULL),
(255, 'El administrador Administardor System  registro documentos con el id 53', '2019-04-02 13:29:06', 3, 1, NULL, NULL),
(256, 'El administrador Administardor System  actualizo proyecto con el id 33', '2019-04-02 13:29:06', 4, 1, NULL, NULL),
(257, 'El administrador Administardor System  registro historial con el id 43', '2019-04-02 13:29:06', 3, 1, NULL, NULL),
(258, 'El administrador Administardor System  ha iniciado sesión', '2019-04-02 13:33:30', 1, 1, NULL, NULL),
(259, 'El administrador Administardor System  registro documentos con el id 54', '2019-04-02 13:34:10', 3, 1, NULL, NULL),
(260, 'El administrador Administardor System  actualizo proyecto con el id 33', '2019-04-02 13:34:10', 4, 1, NULL, NULL),
(261, 'El administrador Administardor System  registro historial con el id 44', '2019-04-02 13:34:10', 3, 1, NULL, NULL),
(262, 'El administrador Administardor System  registro documentos con el id 55', '2019-04-02 13:53:48', 3, 1, NULL, NULL),
(263, 'El administrador Administardor System  registro proyecto con el id 37', '2019-04-02 13:53:48', 3, 1, NULL, NULL),
(264, 'El administrador Administardor System  registro historial con el id 45', '2019-04-02 13:53:48', 3, 1, NULL, NULL),
(265, 'El administrador Administardor System  registro proyecto con el id 39', '2019-04-02 13:58:30', 3, 1, NULL, NULL),
(266, 'El administrador Administardor System  registro historial con el id 46', '2019-04-02 13:58:30', 3, 1, NULL, NULL),
(267, 'El administrador Administardor System  registro documentos con el id 56', '2019-04-02 14:12:54', 3, 1, NULL, NULL),
(268, 'El administrador Administardor System  registro proyecto con el id 40', '2019-04-02 14:12:54', 3, 1, NULL, NULL),
(269, 'El administrador Administardor System  registro historial con el id 47', '2019-04-02 14:12:54', 3, 1, NULL, NULL),
(270, 'El administrador Administardor System  registro documentos con el id 57', '2019-04-02 14:18:48', 3, 1, NULL, NULL),
(271, 'El administrador Administardor System  registro proyecto con el id 41', '2019-04-02 14:18:48', 3, 1, NULL, NULL),
(272, 'El administrador Administardor System  registro historial con el id 48', '2019-04-02 14:18:48', 3, 1, NULL, NULL),
(273, 'El administrador Administardor System  registro programa con el id 21', '2019-04-02 15:11:14', 3, 1, NULL, NULL),
(274, 'El administrador Administardor System  registro programa con el id 22', '2019-04-02 15:14:00', 3, 1, NULL, NULL),
(275, 'El administrador Administardor System  registro componente con el id 9', '2019-04-02 15:14:51', 3, 1, NULL, NULL),
(276, 'El administrador Administardor System  registro componente con el id 10', '2019-04-02 15:15:21', 3, 1, NULL, NULL),
(277, 'El administrador Administardor System  registro componente con el id 11', '2019-04-02 15:15:46', 3, 1, NULL, NULL),
(278, 'El administrador Administardor System  registro subcomponente con el id 9', '2019-04-02 15:16:34', 3, 1, NULL, NULL),
(279, 'El administrador Administardor System  registro subcomponente con el id 10', '2019-04-02 15:16:56', 3, 1, NULL, NULL),
(280, 'El administrador Administardor System  registro subcomponente con el id 11', '2019-04-02 15:17:17', 3, 1, NULL, NULL),
(281, 'El administrador Administardor System  registro subcomponente con el id 12', '2019-04-02 15:17:39', 3, 1, NULL, NULL),
(282, 'El administrador Administardor System  registro subcomponente con el id 13', '2019-04-02 15:18:17', 3, 1, NULL, NULL),
(283, 'El administrador Administardor System  registro concepto con el id 9', '2019-04-02 15:19:41', 3, 1, NULL, NULL),
(284, 'El administrador Administardor System  registro concepto con el id 10', '2019-04-02 15:20:17', 3, 1, NULL, NULL),
(285, 'El administrador Administardor System  registro concepto con el id 11', '2019-04-02 15:21:11', 3, 1, NULL, NULL),
(286, 'El administrador Administardor System  registro documentos con el id 58', '2019-04-02 15:22:55', 3, 1, NULL, NULL),
(287, 'El administrador Administardor System  registro proyecto con el id 42', '2019-04-02 15:22:55', 3, 1, NULL, NULL),
(288, 'El administrador Administardor System  registro historial con el id 49', '2019-04-02 15:22:55', 3, 1, NULL, NULL),
(289, 'El administrador Administardor System  registro documentos con el id 59', '2019-04-02 15:24:41', 3, 1, NULL, NULL),
(290, 'El administrador Administardor System  registro proyecto con el id 43', '2019-04-02 15:24:41', 3, 1, NULL, NULL),
(291, 'El administrador Administardor System  registro historial con el id 50', '2019-04-02 15:24:41', 3, 1, NULL, NULL),
(292, 'El administrador Administardor System  registro proyecto con el id 44', '2019-04-02 15:28:26', 3, 1, NULL, NULL),
(293, 'El administrador Administardor System  registro historial con el id 51', '2019-04-02 15:28:26', 3, 1, NULL, NULL),
(294, 'El administrador Administardor System  registro proyecto con el id 45', '2019-04-02 15:30:01', 3, 1, NULL, NULL),
(295, 'El administrador Administardor System  registro historial con el id 52', '2019-04-02 15:30:01', 3, 1, NULL, NULL),
(296, 'El administrador Administardor System  registro documentos con el id 60', '2019-04-02 15:40:07', 3, 1, NULL, NULL),
(297, 'El administrador Administardor System  registro proyecto con el id 46', '2019-04-02 15:40:07', 3, 1, NULL, NULL),
(298, 'El administrador Administardor System  registro historial con el id 53', '2019-04-02 15:40:07', 3, 1, NULL, NULL),
(299, 'El administrador Administardor System  ha iniciado sesión', '2019-04-02 15:43:39', 1, 1, NULL, NULL),
(300, 'El administrador Administardor System  cerró sesión', '2019-04-02 15:46:03', 2, 1, NULL, NULL),
(301, 'El administrador Administardor System  registro solicitante con el id 3', '2019-04-02 15:50:17', 3, 1, NULL, NULL),
(302, 'El administrador Administardor System  registro componente con el id 12', '2019-04-02 16:04:06', 3, 1, NULL, NULL),
(303, 'El administrador Administardor System  registro concepto con el id 12', '2019-04-02 16:04:33', 3, 1, NULL, NULL),
(304, 'El administrador Mike Sanchez  ha iniciado sesión', '2019-04-02 17:38:21', 1, 2, NULL, NULL),
(305, 'El administrador Administardor System  ha iniciado sesión', '2019-04-02 18:37:05', 1, 1, NULL, NULL),
(306, 'El administrador Administardor System  ha iniciado sesión', '2019-04-02 19:08:22', 1, 1, NULL, NULL),
(307, 'El administrador Mike Sanchez  ha iniciado sesión', '2019-04-02 20:45:10', 1, 2, NULL, NULL),
(308, 'El administrador Administardor System  ha iniciado sesión', '2019-04-02 22:45:04', 1, 1, NULL, NULL),
(309, 'El administrador Administardor System  ha iniciado sesión', '2019-04-02 23:11:33', 1, 1, NULL, NULL),
(310, 'El administrador Mike Sanchez  ha iniciado sesión', '2019-04-03 01:16:41', 1, 2, NULL, NULL),
(311, 'El administrador Administardor System  ha iniciado sesión', '2019-04-03 04:48:24', 1, 1, NULL, NULL),
(312, 'El administrador Administardor System  ha iniciado sesión', '2019-04-03 06:51:23', 1, 1, NULL, NULL),
(313, 'El administrador Administardor System  registro conceptos con el id 6', '2019-04-03 07:03:38', 3, 1, NULL, NULL),
(314, 'El administrador Administardor System  registro proyecto con el id 47', '2019-04-03 07:03:38', 3, 1, NULL, NULL),
(315, 'El administrador Administardor System  registro historial con el id 54', '2019-04-03 07:03:38', 3, 1, NULL, NULL),
(316, 'El administrador Administardor System  ha iniciado sesión', '2019-04-03 07:38:11', 1, 1, NULL, NULL),
(317, 'El administrador Administardor System  ha iniciado sesión', '2019-04-03 08:12:06', 1, 1, NULL, NULL),
(318, 'El administrador Administardor System  ha iniciado sesión', '2019-04-03 08:17:21', 1, 1, NULL, NULL),
(319, 'El administrador Administardor System  registro documentos con el id 61', '2019-04-03 08:22:25', 3, 1, NULL, NULL),
(320, 'El administrador Administardor System  registro documentos con el id 62', '2019-04-03 08:22:25', 3, 1, NULL, NULL),
(321, 'El administrador Administardor System  actualizo proyecto con el id 46', '2019-04-03 08:22:25', 4, 1, NULL, NULL),
(322, 'El administrador Administardor System  registro historial con el id 55', '2019-04-03 08:22:25', 3, 1, NULL, NULL),
(323, 'El administrador Mike Sanchez  ha iniciado sesión', '2019-04-03 08:50:09', 1, 2, NULL, NULL),
(324, 'El administrador Administardor System  registro conceptos con el id 7', '2019-04-03 08:53:57', 3, 1, NULL, NULL),
(325, 'El administrador Administardor System  registro proyecto con el id 48', '2019-04-03 08:53:57', 3, 1, NULL, NULL),
(326, 'El administrador Administardor System  registro historial con el id 56', '2019-04-03 08:53:57', 3, 1, NULL, NULL),
(327, 'El administrador Administardor System  registro conceptos con el id 8', '2019-04-03 09:41:13', 3, 1, NULL, NULL),
(328, 'El administrador Administardor System  registro proyecto con el id 49', '2019-04-03 09:41:13', 3, 1, NULL, NULL),
(329, 'El administrador Administardor System  registro historial con el id 57', '2019-04-03 09:41:13', 3, 1, NULL, NULL),
(330, 'El administrador Administardor System  registro solicitante con el id 4', '2019-04-03 10:39:43', 3, 1, NULL, NULL),
(331, 'El administrador Administardor System  registro proyecto con el id 50', '2019-04-03 10:55:45', 3, 1, NULL, NULL),
(332, 'El administrador Administardor System  registro historial con el id 58', '2019-04-03 10:55:45', 3, 1, NULL, NULL),
(333, 'El administrador Mike Sanchez  ha iniciado sesión', '2019-04-03 10:59:35', 1, 2, NULL, NULL),
(334, 'El administrador Mike Sanchez  cerró sesión', '2019-04-03 11:00:15', 2, 2, NULL, NULL),
(335, 'El administrador Administardor System  registro conceptos con el id 9', '2019-04-03 11:19:17', 3, 1, NULL, NULL),
(336, 'El administrador Administardor System  registro proyecto con el id 51', '2019-04-03 11:19:17', 3, 1, NULL, NULL),
(337, 'El administrador Administardor System  registro historial con el id 59', '2019-04-03 11:19:17', 3, 1, NULL, NULL),
(338, 'El administrador Administardor System  registro documentos con el id 63', '2019-04-03 11:32:00', 3, 1, NULL, NULL),
(339, 'El administrador Administardor System  registro documentos con el id 64', '2019-04-03 11:32:00', 3, 1, NULL, NULL),
(340, 'El administrador Administardor System  registro conceptos con el id 10', '2019-04-03 11:32:00', 3, 1, NULL, NULL),
(341, 'El administrador Administardor System  registro documentos con el id 65', '2019-04-03 11:43:35', 3, 1, NULL, NULL),
(342, 'El administrador Administardor System  registro conceptos con el id 11', '2019-04-03 11:43:35', 3, 1, NULL, NULL),
(343, 'El administrador Administardor System  registro conceptos con el id 12', '2019-04-03 11:43:35', 3, 1, NULL, NULL),
(344, 'El administrador Administardor System  registro proyecto con el id 54', '2019-04-03 11:43:35', 3, 1, NULL, NULL),
(345, 'El administrador Administardor System  registro historial con el id 61', '2019-04-03 11:43:35', 3, 1, NULL, NULL),
(346, 'El administrador Administardor System  registro documentos con el id 66', '2019-04-03 11:45:27', 3, 1, NULL, NULL),
(347, 'El administrador Administardor System  registro conceptos con el id 13', '2019-04-03 11:45:27', 3, 1, NULL, NULL),
(348, 'El administrador Administardor System  registro conceptos con el id 14', '2019-04-03 11:45:27', 3, 1, NULL, NULL),
(349, 'El administrador Administardor System  registro proyecto con el id 55', '2019-04-03 11:45:27', 3, 1, NULL, NULL),
(350, 'El administrador Administardor System  registro historial con el id 62', '2019-04-03 11:45:27', 3, 1, NULL, NULL),
(351, 'El administrador Administardor System  registro documentos con el id 67', '2019-04-03 11:55:43', 3, 1, NULL, NULL),
(352, 'El administrador Administardor System  registro conceptos con el id 15', '2019-04-03 11:55:43', 3, 1, NULL, NULL),
(353, 'El administrador Administardor System  registro conceptos con el id 16', '2019-04-03 11:55:43', 3, 1, NULL, NULL),
(354, 'El administrador Administardor System  registro proyecto con el id 57', '2019-04-03 11:55:43', 3, 1, NULL, NULL),
(355, 'El administrador Administardor System  registro historial con el id 63', '2019-04-03 11:55:43', 3, 1, NULL, NULL),
(356, 'El administrador Administardor System  registro documentos con el id 68', '2019-04-03 12:18:45', 3, 1, NULL, NULL),
(357, 'El administrador Administardor System  registro conceptos con el id 17', '2019-04-03 12:18:45', 3, 1, NULL, NULL),
(358, 'El administrador Administardor System  registro proyecto con el id 58', '2019-04-03 12:18:45', 3, 1, NULL, NULL),
(359, 'El administrador Administardor System  registro historial con el id 64', '2019-04-03 12:18:45', 3, 1, NULL, NULL),
(360, 'El administrador Administardor System  registro documentos con el id 69', '2019-04-03 12:23:02', 3, 1, NULL, NULL),
(361, 'El administrador Administardor System  actualizo proyecto con el id 58', '2019-04-03 12:23:02', 4, 1, NULL, NULL),
(362, 'El administrador Administardor System  registro historial con el id 65', '2019-04-03 12:23:02', 3, 1, NULL, NULL),
(363, 'El administrador Administardor System  elimino documento con el id 68', '2019-04-03 12:23:46', 5, 1, NULL, NULL),
(364, 'El administrador Administardor System  registro documentos con el id 70', '2019-04-03 12:24:35', 3, 1, NULL, NULL),
(365, 'El administrador Administardor System  actualizo proyecto con el id 58', '2019-04-03 12:24:35', 4, 1, NULL, NULL),
(366, 'El administrador Administardor System  registro historial con el id 66', '2019-04-03 12:24:35', 3, 1, NULL, NULL),
(367, 'El administrador Administardor System  registro documentos con el id 71', '2019-04-03 12:30:19', 3, 1, NULL, NULL),
(368, 'El administrador Administardor System  actualizo proyecto con el id 58', '2019-04-03 12:30:19', 4, 1, NULL, NULL),
(369, 'El administrador Administardor System  registro historial con el id 67', '2019-04-03 12:30:19', 3, 1, NULL, NULL),
(370, 'El administrador Administardor System  registro conceptos con el id 18', '2019-04-03 12:32:21', 3, 1, NULL, NULL),
(371, 'El administrador Administardor System  registro proyecto con el id 59', '2019-04-03 12:32:21', 3, 1, NULL, NULL),
(372, 'El administrador Administardor System  registro historial con el id 68', '2019-04-03 12:32:21', 3, 1, NULL, NULL),
(373, 'El administrador Administardor System  elimino documentos del proyecto con el id 41', '2019-04-03 12:42:33', 5, 1, NULL, NULL),
(374, 'El administrador Administardor System  elimino proyecto con el id 41', '2019-04-03 12:42:33', 5, 1, NULL, NULL),
(375, 'El administrador Administardor System  elimino historial del proyecto con el id 41', '2019-04-03 12:42:33', 5, 1, NULL, NULL),
(376, 'El administrador Administardor System  elimino conceptos del proyecto con el id 58', '2019-04-03 12:42:52', 5, 1, NULL, NULL),
(377, 'El administrador Administardor System  elimino documentos del proyecto con el id 58', '2019-04-03 12:42:52', 5, 1, NULL, NULL),
(378, 'El administrador Administardor System  elimino proyecto con el id 58', '2019-04-03 12:42:52', 5, 1, NULL, NULL),
(379, 'El administrador Administardor System  elimino historial del proyecto con el id 58', '2019-04-03 12:42:52', 5, 1, NULL, NULL),
(380, 'El administrador Administardor System  registro conceptos con el id 19', '2019-04-03 12:45:32', 3, 1, NULL, NULL),
(381, 'El administrador Administardor System  registro proyecto con el id 60', '2019-04-03 12:45:32', 3, 1, NULL, NULL),
(382, 'El administrador Administardor System  registro historial con el id 69', '2019-04-03 12:45:32', 3, 1, NULL, NULL),
(383, 'El administrador Administardor System  actualizo proyecto con el id 60', '2019-04-03 13:04:39', 4, 1, NULL, NULL),
(384, 'El administrador Administardor System  registro historial con el id 70', '2019-04-03 13:04:39', 3, 1, NULL, NULL),
(385, 'El administrador Administardor System  registro proyecto con el id 61', '2019-04-03 13:13:24', 3, 1, NULL, NULL),
(386, 'El administrador Administardor System  registro historial con el id 71', '2019-04-03 13:13:24', 3, 1, NULL, NULL),
(387, 'El administrador Administardor System  registro documentos con el id 72', '2019-04-03 13:16:06', 3, 1, NULL, NULL),
(388, 'El administrador Administardor System  actualizo proyecto con el id 61', '2019-04-03 13:16:06', 4, 1, NULL, NULL),
(389, 'El administrador Administardor System  registro historial con el id 72', '2019-04-03 13:16:06', 3, 1, NULL, NULL),
(390, 'El administrador Administardor System  registro solicitante con el id 5', '2019-04-03 13:50:46', 3, 1, NULL, NULL),
(391, 'El administrador Administardor System  registro conceptos con el id 20', '2019-04-03 13:58:17', 3, 1, NULL, NULL),
(392, 'El administrador Administardor System  registro proyecto con el id 62', '2019-04-03 13:58:17', 3, 1, NULL, NULL),
(393, 'El administrador Administardor System  registro historial con el id 73', '2019-04-03 13:58:17', 3, 1, NULL, NULL),
(394, 'El administrador Administardor System  registro documentos con el id 73', '2019-04-03 14:08:20', 3, 1, NULL, NULL),
(395, 'El administrador Administardor System  registro documentos con el id 74', '2019-04-03 14:08:20', 3, 1, NULL, NULL),
(396, 'El administrador Administardor System  registro documentos con el id 75', '2019-04-03 14:08:20', 3, 1, NULL, NULL),
(397, 'El administrador Administardor System  registro documentos con el id 76', '2019-04-03 14:08:20', 3, 1, NULL, NULL),
(398, 'El administrador Administardor System  registro documentos con el id 77', '2019-04-03 14:08:20', 3, 1, NULL, NULL),
(399, 'El administrador Administardor System  actualizo proyecto con el id 62', '2019-04-03 14:08:20', 4, 1, NULL, NULL),
(400, 'El administrador Administardor System  registro historial con el id 74', '2019-04-03 14:08:20', 3, 1, NULL, NULL),
(401, 'El administrador Administardor System  ha iniciado sesión', '2019-04-03 14:29:44', 1, 1, NULL, NULL),
(402, 'El administrador Administardor System  actualizo proyecto con el id 52', '2019-04-03 14:43:18', 4, 1, NULL, NULL),
(403, 'El administrador Administardor System  registro historial con el id 76', '2019-04-03 14:43:18', 3, 1, NULL, NULL),
(404, 'El administrador Administardor System  actualizo proyecto con el id 52', '2019-04-03 14:44:41', 4, 1, NULL, NULL),
(405, 'El administrador Administardor System  registro historial con el id 78', '2019-04-03 14:44:41', 3, 1, NULL, NULL),
(406, 'El administrador Administardor System  registro conceptos con el id 21', '2019-04-03 14:56:32', 3, 1, NULL, NULL),
(407, 'El administrador Administardor System  registro proyecto con el id 63', '2019-04-03 14:56:32', 3, 1, NULL, NULL),
(408, 'El administrador Administardor System  registro historial con el id 79', '2019-04-03 14:56:32', 3, 1, NULL, NULL),
(409, 'El administrador Administardor System  registro programa con el id 23', '2019-04-03 14:57:14', 3, 1, NULL, NULL),
(410, 'El administrador Administardor System  registro proyecto con el id 64', '2019-04-03 15:01:01', 3, 1, NULL, NULL),
(411, 'El administrador Administardor System  registro historial con el id 80', '2019-04-03 15:01:01', 3, 1, NULL, NULL),
(412, 'El administrador Administardor System  registro proyecto con el id 65', '2019-04-03 15:06:50', 3, 1, NULL, NULL),
(413, 'El administrador Administardor System  registro historial con el id 81', '2019-04-03 15:06:50', 3, 1, NULL, NULL),
(414, 'El administrador Administardor System  actualizo proyecto con el id 42', '2019-04-03 15:35:45', 4, 1, NULL, NULL),
(415, 'El administrador Administardor System  registro historial con el id 82', '2019-04-03 15:35:45', 3, 1, NULL, NULL),
(416, 'El administrador Mike Sanchez  ha iniciado sesión', '2019-04-03 16:03:50', 1, 2, NULL, NULL),
(417, 'El administrador Mike Sanchez  cerró sesión', '2019-04-03 16:40:39', 2, 2, NULL, NULL),
(418, 'El administrador Administardor System  ha iniciado sesión', '2019-04-03 16:47:13', 1, 1, NULL, NULL),
(419, 'El administrador Administardor System  ha iniciado sesión', '2019-04-03 18:26:55', 1, 1, NULL, NULL),
(420, 'El administrador Administardor System  ha iniciado sesión', '2019-04-03 18:27:07', 1, 1, NULL, NULL),
(421, 'El administrador Administardor System  cerró sesión', '2019-04-03 18:32:29', 2, 1, NULL, NULL),
(422, 'El administrador Administardor System  registro historial con el id 83', '2019-04-03 18:35:10', 3, 1, NULL, NULL),
(423, 'El administrador Administardor System  actualizo proyecto con el id 47', '2019-04-03 18:35:10', 4, 1, NULL, NULL),
(424, 'El administrador Administardor System  registro documentos con el id 78', '2019-04-03 18:58:09', 3, 1, NULL, NULL);
INSERT INTO `log` (`id`, `message`, `date`, `action`, `user_id`, `created_at`, `updated_at`) VALUES
(425, 'El administrador Administardor System  registro proyecto con el id 66', '2019-04-03 18:58:09', 3, 1, NULL, NULL),
(426, 'El administrador Administardor System  registro historial con el id 84', '2019-04-03 18:58:09', 3, 1, NULL, NULL),
(427, 'El administrador Administardor System  registro conceptos con el id 22', '2019-04-03 19:00:01', 3, 1, NULL, NULL),
(428, 'El administrador Administardor System  registro proyecto con el id 67', '2019-04-03 19:00:01', 3, 1, NULL, NULL),
(429, 'El administrador Administardor System  registro historial con el id 85', '2019-04-03 19:00:01', 3, 1, NULL, NULL),
(430, 'El administrador Administardor System  elimino conceptos del proyecto con el id 67', '2019-04-03 19:01:38', 5, 1, NULL, NULL),
(431, 'El administrador Administardor System  registro conceptos con el id 23', '2019-04-03 19:06:39', 3, 1, NULL, NULL),
(432, 'El administrador Administardor System  registro proyecto con el id 68', '2019-04-03 19:06:39', 3, 1, NULL, NULL),
(433, 'El administrador Administardor System  registro historial con el id 86', '2019-04-03 19:06:39', 3, 1, NULL, NULL),
(434, 'El administrador Administardor System  registro conceptos con el id 24', '2019-04-03 19:13:00', 3, 1, NULL, NULL),
(435, 'El administrador Administardor System  registro proyecto con el id 69', '2019-04-03 19:13:00', 3, 1, NULL, NULL),
(436, 'El administrador Administardor System  registro historial con el id 87', '2019-04-03 19:13:00', 3, 1, NULL, NULL),
(437, 'El administrador Administardor System  registro documentos con el id 79', '2019-04-03 19:18:34', 3, 1, NULL, NULL),
(438, 'El administrador Administardor System  registro conceptos con el id 25', '2019-04-03 19:18:34', 3, 1, NULL, NULL),
(439, 'El administrador Administardor System  registro proyecto con el id 70', '2019-04-03 19:18:34', 3, 1, NULL, NULL),
(440, 'El administrador Administardor System  registro historial con el id 88', '2019-04-03 19:18:34', 3, 1, NULL, NULL),
(441, 'El administrador Administardor System  registro conceptos con el id 26', '2019-04-03 19:26:06', 3, 1, NULL, NULL),
(442, 'El administrador Administardor System  registro proyecto con el id 71', '2019-04-03 19:26:06', 3, 1, NULL, NULL),
(443, 'El administrador Administardor System  registro historial con el id 89', '2019-04-03 19:26:06', 3, 1, NULL, NULL),
(444, 'El administrador Administardor System  elimino conceptos del proyecto con el id 47', '2019-04-03 19:26:42', 5, 1, NULL, NULL),
(445, 'El administrador Administardor System  elimino proyecto con el id 47', '2019-04-03 19:30:08', 5, 1, NULL, NULL),
(446, 'El administrador Administardor System  elimino historial del proyecto con el id 47', '2019-04-03 19:30:08', 5, 1, NULL, NULL),
(447, 'El administrador Administardor System  elimino conceptos del proyecto con el id 48', '2019-04-03 19:30:24', 5, 1, NULL, NULL),
(448, 'El administrador Administardor System  elimino conceptos del proyecto con el id 49', '2019-04-03 19:34:39', 5, 1, NULL, NULL),
(449, 'El administrador Administardor System  elimino proyecto con el id 50', '2019-04-03 19:37:27', 5, 1, NULL, NULL),
(450, 'El administrador Administardor System  elimino historial del proyecto con el id 50', '2019-04-03 19:37:27', 5, 1, NULL, NULL),
(451, 'El administrador Administardor System  elimino conceptos del proyecto con el id 52', '2019-04-03 19:38:34', 5, 1, NULL, NULL),
(452, 'El administrador Administardor System  elimino documentos del proyecto con el id 52', '2019-04-03 19:38:34', 5, 1, NULL, NULL),
(453, 'El administrador Administardor System  elimino proyecto con el id 52', '2019-04-03 19:38:34', 5, 1, NULL, NULL),
(454, 'El administrador Administardor System  elimino historial del proyecto con el id 52', '2019-04-03 19:38:34', 5, 1, NULL, NULL),
(455, 'El administrador Administardor System  ha iniciado sesión', '2019-04-03 20:11:27', 1, 1, NULL, NULL),
(456, 'El administrador Administardor System  registro documentos con el id 80', '2019-04-03 20:21:06', 3, 1, NULL, NULL),
(457, 'El administrador Administardor System  registro documentos con el id 81', '2019-04-03 20:21:06', 3, 1, NULL, NULL),
(458, 'El administrador Administardor System  registro documentos con el id 82', '2019-04-03 20:21:06', 3, 1, NULL, NULL),
(459, 'El administrador Administardor System  actualizo proyecto con el id 66', '2019-04-03 20:21:06', 4, 1, NULL, NULL),
(460, 'El administrador Administardor System  registro historial con el id 90', '2019-04-03 20:21:06', 3, 1, NULL, NULL),
(461, 'El administrador Administardor System  cerró sesión', '2019-04-03 20:53:22', 2, 1, NULL, NULL),
(462, 'El administrador Administardor System  ha iniciado sesión', '2019-04-03 20:53:37', 1, 1, NULL, NULL),
(463, 'El administrador Administardor System  cerró sesión', '2019-04-03 20:55:33', 2, 1, NULL, NULL),
(464, 'El administrador Administardor System  ha iniciado sesión', '2019-04-03 20:55:39', 1, 1, NULL, NULL),
(465, 'El administrador Administardor System  registro documentos con el id 83', '2019-04-03 21:03:03', 3, 1, NULL, NULL),
(466, 'El administrador Administardor System  registro proyecto con el id 72', '2019-04-03 21:03:03', 3, 1, NULL, NULL),
(467, 'El administrador Administardor System  registro historial con el id 91', '2019-04-03 21:03:03', 3, 1, NULL, NULL),
(468, 'El administrador Administardor System  registro conceptos con el id 27', '2019-04-03 21:07:53', 3, 1, NULL, NULL),
(469, 'El administrador Administardor System  registro proyecto con el id 73', '2019-04-03 21:07:53', 3, 1, NULL, NULL),
(470, 'El administrador Administardor System  registro historial con el id 92', '2019-04-03 21:07:53', 3, 1, NULL, NULL),
(471, 'El administrador Administardor System  registro documentos con el id 84', '2019-04-03 21:09:24', 3, 1, NULL, NULL),
(472, 'El administrador Administardor System  registro documentos con el id 85', '2019-04-03 21:09:24', 3, 1, NULL, NULL),
(473, 'El administrador Administardor System  actualizo proyecto con el id 73', '2019-04-03 21:09:24', 4, 1, NULL, NULL),
(474, 'El administrador Administardor System  registro historial con el id 93', '2019-04-03 21:09:24', 3, 1, NULL, NULL),
(475, 'El administrador Administardor System  registro documentos con el id 86', '2019-04-03 21:12:13', 3, 1, NULL, NULL),
(476, 'El administrador Administardor System  registro documentos con el id 87', '2019-04-03 21:12:13', 3, 1, NULL, NULL),
(477, 'El administrador Administardor System  registro conceptos con el id 28', '2019-04-03 21:12:13', 3, 1, NULL, NULL),
(478, 'El administrador Administardor System  registro proyecto con el id 74', '2019-04-03 21:12:13', 3, 1, NULL, NULL),
(479, 'El administrador Administardor System  registro historial con el id 94', '2019-04-03 21:12:13', 3, 1, NULL, NULL),
(480, 'El administrador Administardor System  cerró sesión', '2019-04-03 21:12:48', 2, 1, NULL, NULL),
(481, 'El administrador Administardor System  registro documentos con el id 88', '2019-04-03 21:27:50', 3, 1, NULL, NULL),
(482, 'El administrador Administardor System  actualizo proyecto con el id 74', '2019-04-03 21:27:50', 4, 1, NULL, NULL),
(483, 'El administrador Administardor System  registro historial con el id 95', '2019-04-03 21:27:50', 3, 1, NULL, NULL),
(484, 'El administrador Mike Sanchez  registro historial con el id 96', '2019-04-03 21:50:45', 3, 2, NULL, NULL),
(485, 'El administrador Mike Sanchez  actualizo proyecto con el id 51', '2019-04-03 21:50:45', 4, 2, NULL, NULL),
(486, 'El administrador Administardor System  registro historial con el id 97', '2019-04-03 21:56:19', 3, 1, NULL, NULL),
(487, 'El administrador Administardor System  actualizo proyecto con el id 51', '2019-04-03 21:56:19', 4, 1, NULL, NULL),
(488, 'El administrador Mike Sanchez  registro usuario con el id ', '2019-04-03 22:55:24', 3, 2, NULL, NULL),
(489, 'El administrador Mike Sanchez  registro usuario con el id ', '2019-04-03 22:56:32', 3, 2, NULL, NULL),
(490, 'El administrador Mike Sanchez  actualizo usuario con el id 3', '2019-04-03 22:57:18', 4, 2, NULL, NULL),
(491, 'El administrador Mike Sanchez  actualizo usuario con el id 3', '2019-04-03 22:57:30', 4, 2, NULL, NULL),
(492, 'El administrador Mike Sanchez  actualizo usuario con el id 3', '2019-04-03 23:01:26', 4, 2, NULL, NULL),
(493, 'El administrador Mike Sanchez  registro usuario con el id ', '2019-04-03 23:01:57', 3, 2, NULL, NULL),
(494, 'El administrador Mike Sanchez  registro usuario con el id ', '2019-04-03 23:02:32', 3, 2, NULL, NULL),
(495, 'El administrador Mike Sanchez  cerró sesión', '2019-04-03 23:03:19', 2, 2, NULL, NULL),
(496, 'El empleado user1 test  ha iniciado sesión', '2019-04-03 23:03:24', 1, 3, NULL, NULL),
(497, 'El empleado user1 test  cerró sesión', '2019-04-03 23:04:05', 2, 3, NULL, NULL),
(498, 'El empleado user2 test  ha iniciado sesión', '2019-04-03 23:06:17', 1, 4, NULL, NULL),
(499, 'El empleado user2 test  cerró sesión', '2019-04-03 23:06:45', 2, 4, NULL, NULL),
(500, 'El empleado user3 test  ha iniciado sesión', '2019-04-03 23:06:49', 1, 5, NULL, NULL),
(501, 'El empleado user3 test  cerró sesión', '2019-04-03 23:07:11', 2, 5, NULL, NULL),
(502, 'El empleado user4 test  ha iniciado sesión', '2019-04-03 23:07:17', 1, 6, NULL, NULL),
(503, 'El empleado user4 test  cerró sesión', '2019-04-03 23:08:50', 2, 6, NULL, NULL),
(504, 'El administrador Mike Sanchez  ha iniciado sesión', '2019-04-03 23:08:55', 1, 2, NULL, NULL),
(505, 'El administrador Administardor System  cerró sesión', '2019-04-03 23:33:45', 2, 1, NULL, NULL),
(506, 'El administrador Administardor System  ha iniciado sesión', '2019-04-04 08:39:12', 1, 1, NULL, NULL),
(507, 'El administrador Administardor System  registro palabra con el id 1', '2019-04-04 08:42:29', 3, 1, NULL, NULL),
(508, 'El administrador Administardor System  ha iniciado sesión', '2019-04-04 08:50:08', 1, 1, NULL, NULL),
(509, 'El administrador Administardor System  cerró sesión', '2019-04-04 08:58:35', 2, 1, NULL, NULL),
(510, 'El administrador Administardor System  cerró sesión', '2019-04-04 09:09:37', 2, 1, NULL, NULL),
(511, 'El administrador Administardor System  ha iniciado sesión', '2019-04-04 09:16:51', 1, 1, NULL, NULL),
(512, 'El administrador Administardor System  cerró sesión', '2019-04-04 09:50:47', 2, 1, NULL, NULL),
(513, 'El administrador Administardor System  ha iniciado sesión', '2019-04-04 10:05:06', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_01_22_112950_create_users_types_table', 1),
(2, '2019_01_23_192201_create_users_table', 1),
(3, '2019_01_23_192526_create_logs_table', 1),
(4, '2019_03_26_113043_create_glosaries_table', 1),
(5, '2019_03_26_113350_create_programs_table', 1),
(6, '2019_03_26_113602_create_cities_table', 1),
(7, '2019_03_26_113758_create_applicants_table', 1),
(8, '2019_03_26_113832_create_projects_table', 1),
(9, '2019_03_26_131335_create_status_projects_table', 1),
(10, '2019_03_26_131505_create_visit_histories_table', 1),
(11, '2019_03_26_131543_create_documents_table', 1),
(12, '2019_03_29_130337_components', 1),
(13, '2019_03_29_130352_sub_components', 1),
(14, '2019_03_29_130418_concepts', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programs`
--

CREATE TABLE `programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_population` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable_unit` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executing_unit` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `operation_rules` int(11) NOT NULL DEFAULT '0',
  `general_requirements` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specific_requirements` varchar(1500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `announcement_pdf` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vinculo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_amount_max` longtext COLLATE utf8mb4_unicode_ci,
  `m_amount_max` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `programs`
--

INSERT INTO `programs` (`id`, `name`, `description`, `target_population`, `responsable_unit`, `executing_unit`, `start_date`, `finish_date`, `operation_rules`, `general_requirements`, `specific_requirements`, `announcement_pdf`, `vinculo`, `p_amount_max`, `m_amount_max`, `created_at`, `updated_at`) VALUES
(4, 'P - Sin reglas', 'descr', 'VICTORIA', 'Tampico', 'Reybos', '2019-03-01', '2019-03-10', 0, 'storage/programs/hJtjN3GHfMQ9mAkmVZvWtxoD9UiOhPPvWw3J2fA7.jpeg', 'storage/programs/hrD3o20G8GxVe5iJVA2DG5fkp1QUUQwwQVFFTuw6.jpeg', 'storage/programs/9Na7pFg2nPCqBxLi6oIeEhrSJ5NkbVoJWP1G1Beh.jpeg', '', '32', '33', '2019-03-31 22:50:17', '2019-04-01 00:58:50'),
(7, 'Programa sujeto a regla de operación 1', 'rthrt rtyu', 'VICTORIA', 'Tampico', 'sdgfd', NULL, NULL, 1, 'storage/programs/l8SVcQboHiOVkDv7ijJh3KDRfhLL5qvPEGReXDCL.jpeg', NULL, 'storage/programs/C481nOVPNXpS3Li1UoYz7HGa3UDoDLZpQsbbCSkA.jpeg', '', NULL, NULL, '2019-04-01 08:16:40', '2019-04-01 08:24:37'),
(8, 'Programa NO sujeto a regla de operación 1 - Mario', 'Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem', 'VICTORIA', 'Altamira', 'Matamoros', '2019-04-01', '2019-04-13', 0, 'storage/programs/ihli0abUJD4KQ8WaJZHyqRhJbW7J5URkLXdsBJ7Y.jpeg', 'storage/programs/hO4IPhVrFMggcrTEPOkT1d83zNklfGwMXHshhmEy.jpeg', 'storage/programs/qtVwkoOvRUi1JgYKnmShv3aGi6zlY2irGKnBtsdE.png', 'http://www.google.com', 'Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem \r\n\r\n$500,0000', 'Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem \r\n\r\n$5434400,0000', '2019-04-01 13:14:36', '2019-04-02 12:42:39'),
(9, 'Programa sujeto a regla de operación 2', 'Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem \r\n Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem \r\n Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem', 'VICTORIA', 'Tampico', 'Laredo', NULL, NULL, 1, 'storage/programs/rWaH8jNt4YCtwMktHqEJl41Ihds43oBZNqtEbycE.jpeg', NULL, 'storage/programs/G9FO8X3GxAFbz7TeOgucMUT9IEWtwQoD7BZDVgBw.pdf', '', NULL, NULL, '2019-04-01 13:18:48', '2019-04-01 13:18:48'),
(10, 'Programa sujeto a regla de operación 3', 'Loem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem IpsumLoem Ipsum Loem', 'VICTORIA', 'Tampico', 'Reybos', NULL, NULL, 1, 'storage/programs/bo645aVX4330ayS97TxEvHhfzS2wsB5ampH6xtjy.jpeg', NULL, 'storage/programs/ygoh0q7FkZYEe4iZ6UuDknhXrulIYLgjulwBl3Ze.jpeg', '', NULL, NULL, '2019-04-01 13:25:45', '2019-04-01 13:25:45'),
(11, 'Otro programa sin Regla de op3', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', 'VICTORIA', 'Padilla', 'Tula', '2019-04-01', '2019-04-06', 0, 'storage/programs/suLUNuL8AedHe3X4B3JoZBbL7KTE3IJ1hC5mgmX2.jpeg', 'storage/programs/AMVPoExmd3ik1Z0iJtKwdBp8Ehfsg4CbQ1mF69aD.jpeg', 'storage/programs/3wqvy24W722GN9lCooGmG3wKvEsoqN2NHEhzzG3S.jpeg', '', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum \r\n\r\n$500.0000', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum \r\n\r\n$365456465500.0000', '2019-04-01 13:29:46', '2019-04-01 13:29:46'),
(12, 'Programa sujeto a regla de operación 4', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum \r\n\r\n$500.0000Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum \r\n\r\n$500.0000Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum \r\n\r\n$500.0000', 'VICTORIA', 'Mexico', 'Europa', NULL, NULL, 1, 'storage/programs/MFKgELGu2APRJxZbJPMy0fiUNiKY6v66OU9CpiLK.jpeg', NULL, 'storage/programs/tZMRJTLuEN9SG3LImdwOOwN73YtjeWKz5P7Qbpul.png', '', NULL, NULL, '2019-04-01 13:32:50', '2019-04-01 13:32:50'),
(13, 'Otro', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum \r\n\r\n$500.0000\r\n\r\n\r\nm\r\na\r\nr\r\ni\r\no', 'VICTORIA', 'Tampico', 'Reybos', NULL, NULL, 1, 'storage/programs/56o5mGjYPuXzxCxTWU19UrRtZxoLJQPUPujSGF7Y.jpeg', NULL, 'storage/programs/LlpDonr3oZaX8qlh72qb6xi2WqPmxAR2udLS7ZEy.png', '', NULL, NULL, '2019-04-01 13:34:40', '2019-04-01 13:34:40'),
(14, 'Programa sujeto a regla de operación 4mil', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', 'VICTORIA', 'Tampico', 'Matamoros 2', NULL, NULL, 1, 'storage/programs/tQZfXzMdUPGMdDyWOsQyptTQstbXxYajunVOovLj.jpeg', NULL, 'storage/programs/TxpETqiBnKJe5MHxoQXWCZnC35iCMV9LlSNxQHFQ.jpeg', '', NULL, NULL, '2019-04-01 15:07:52', '2019-04-01 15:07:52'),
(15, 'Programa demo 10', 'informacion demo informacion informacion demo informacion demo informacion informacion informacion demo informacion informacion informacion demo informacion informacion', 'informacion demo informacion informacion', 'informacion demo informacion informacion', 'informacion demo informacion informacion', '2019-04-04', '2019-04-18', 0, 'storage/programs/2DCPQRolOnaP7J5Fg49VxboPDcgDyamKMVOpMmix.jpeg', 'storage/programs/VjO6NyWW2xENAyFhJYwv4wwgl57LLuT7pLwl8F9i.jpeg', 'storage/programs/WUrI62uv58YOd3kEp6JWzfpmFZ34rdv8byfTAoBZ.jpeg', 'http://www.forosdelweb.com/f86/phpmyadmin-llaves-foraneas-490013/', 'informacion demo informacion informacion', 'informacion demo informacion informacion', '2019-04-01 20:39:10', '2019-04-01 20:39:10'),
(16, 'Procampo con regla de Operación', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .', 'Reynosa', 'No se', 'Ejecutoria', NULL, NULL, 1, 'storage/programs/U6sxFq3UP5FUidhwWZOCrYnaT9GSVUCZd4rPQhxV.jpeg', NULL, 'storage/programs/WCbODWHCVVUoYPEaU1QmueJNtHI6BW9HTs23qGds.jpeg', 'http://mariorc.com.mx/elearning/', NULL, NULL, '2019-04-01 21:00:23', '2019-04-01 21:00:23'),
(17, 'Selecciona un programa', 'sbfhqjiwbfjkqbna', 'fasf', 'asff', 'fsaf', NULL, NULL, 0, 'asfq', NULL, 'afgrr', 'fasgg', 'dsagewaq', 'aasgqwf', NULL, NULL),
(18, 'Fomento Ganadero 2018', 'Apoyos a productores pecuarios', 'Productores pecuarios de estratos e1, e2, e3', 'Sader', 'sader', NULL, NULL, 1, 'storage/programs/zIPY9mUPEgC2TG9S36uZntsC7ingAsSsk7dji68W.pdf', NULL, 'storage/programs/qmZDnSlpQgPNNSeBtnSLL4r78OuaixBehPQQlcRT.pdf', 'https://www.gob.mx/sader', NULL, NULL, '2019-04-02 12:29:47', '2019-04-02 12:29:47'),
(19, 'Otro con regla', 'djety', 'VICTORIA', 'Tampico', 'Reybos', NULL, NULL, 1, 'storage/programs/jjINbp2Xa4T7abqeyOagZcBYGPcfwFxMJcQTIqdL.pdf', NULL, 'storage/programs/ywn9G9f8MIjBxFY6ynOIQ5dui5fF69zJDfuK0Pgo.pdf', 'http://www.google.com', NULL, NULL, '2019-04-02 13:35:07', '2019-04-02 13:35:07'),
(20, 'Otrohwerhywrethy', 'rthreth', 'VICTORIA', 'Tampico', 'Reybos', NULL, NULL, 1, 'storage/programs/KyKQkcYngDciRrMqYJHRGKyOrJRfOokj7RZDgAig.pdf', NULL, 'storage/programs/um93MDprR12y6NkRmL5tixWyQqDErVAAIteCokv4.pdf', 'http://www.google.com', NULL, NULL, '2019-04-02 13:37:22', '2019-04-02 13:37:22'),
(21, 'ITI Prospera 2019', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .', 'VICTORIA', 'Tampico', 'Tula', '2019-04-03', '2019-04-21', 0, 'storage/programs/t8FDQ7JfnBvhKskuGhinSpukMcfriPeZvg4zS6h1.pdf', 'storage/programs/aTkfYNmbGjMyiGXe7lTZhrRcqeYzUAy4uy66xqwu.jpeg', 'storage/programs/HcLRcc5JDeDskGvjAd92AERcIOUMeiW9x8RbkDh6.jpeg', 'http://www.goo4545gle.com', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\n$456456,4546.000', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\n$4555', '2019-04-02 15:11:14', '2019-04-02 15:11:14'),
(22, 'Meca prospera con reglas 2019', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .', 'Altamira', 'San Fernando', 'Ocampo', NULL, NULL, 1, 'storage/programs/bxjJn5d6TjKMUqy3UO6xbRvIEq99TJPrx3QMZgNF.pdf', NULL, 'storage/programs/e41dJR8rt33hcUDnftUIokx69Fzy9IkPFqJdwu82.jpeg', 'http://www.gooeeeeeeegle.com', NULL, NULL, '2019-04-02 15:14:00', '2019-04-02 15:14:00'),
(23, 'Programa celular SIN reglas', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum .\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum.', 'Jaumave', 'Gobierno federal', 'Tamaulipas', '2019-03-31', '2019-04-01', 0, 'storage/programs/cEd08DBLu2S3bwTvPRKLBWibbKBeaAWHKF8e9qlw.jpeg', 'storage/programs/gohaI085T7FwQ3267ZupwzgsqDDyelgoXggyJTxd.jpeg', 'storage/programs/OOBjT1EW8YpVi1ODRbmsF1RpoNS8ZkVHAOlouSSt.pdf', 'http://www.google.com', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum \r\n\r\n\r\n$5000.000', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum \r\n\r\n\r\n$45\r\n000.000', '2019-04-03 14:57:14', '2019-04-03 14:57:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `applicant_id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `requested_concept` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folio` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_project` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `status_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `applicant_id`, `program_id`, `requested_concept`, `folio`, `status_project`, `status_date`, `created_at`, `updated_at`) VALUES
(51, 1, 16, 'sfFFDdf', '284710', 1, '2019-04-03', '2019-04-03 11:19:17', '2019-04-03 11:19:17'),
(54, 2, 16, 'afasgasdghsda', NULL, 1, '2019-04-03', '2019-04-03 11:43:35', '2019-04-03 11:43:35'),
(55, 1, 16, 'asgasshah', NULL, 1, '2019-04-03', '2019-04-03 11:45:27', '2019-04-03 11:45:27'),
(57, 2, 16, 'asgasggs', NULL, 1, '2019-04-03', '2019-04-03 11:55:43', '2019-04-03 11:55:43'),
(59, 3, 16, 'ASFAG', NULL, 1, '2019-04-03', '2019-04-03 12:32:21', '2019-04-03 12:32:21'),
(60, 3, 16, 'vh hjj k85558', NULL, 6, '2019-04-03', '2019-04-03 12:45:32', '2019-04-03 12:45:32'),
(61, 1, 8, 'asgasddghha', NULL, 1, '2019-04-03', '2019-04-03 13:13:24', '2019-04-03 13:13:24'),
(62, 5, 16, 'Como persona moral solicita el 50%', NULL, 2, '2019-04-03', '2019-04-03 13:58:17', '2019-04-03 13:58:17'),
(63, 3, 16, 'ASfaggsd', NULL, 1, '2019-04-03', '2019-04-03 14:56:32', '2019-04-03 14:56:32'),
(64, 1, 23, 'sagasggags', NULL, 3, '2019-04-03', '2019-04-03 15:01:01', '2019-04-03 15:01:01'),
(65, 5, 23, 'Solicita el 95% del proyecto.', NULL, 1, '2019-04-03', '2019-04-03 15:06:50', '2019-04-03 15:06:50'),
(66, 1, 11, 'kalsmñflas', NULL, 2, '2019-04-03', '2019-04-03 18:58:09', '2019-04-03 18:58:09'),
(69, 2, 16, 'nszljkanfjkas', NULL, 2, '2019-04-03', '2019-04-03 19:13:00', '2019-04-03 19:13:00'),
(70, 2, 16, 'jskalnakjsfnksaf', NULL, 1, '2019-04-03', '2019-04-03 19:18:34', '2019-04-03 19:18:34'),
(71, 2, 16, 'safagagasgasgagsa', NULL, 1, '2019-04-03', '2019-04-03 19:26:06', '2019-04-03 19:26:06'),
(72, 5, 8, 'Uhiuh', NULL, 3, '2019-04-03', '2019-04-03 21:03:03', '2019-04-03 21:03:03'),
(73, 5, 22, 'Gfytftftf', NULL, 4, '2019-04-03', '2019-04-03 21:07:53', '2019-04-03 21:07:53'),
(74, 1, 16, 'sanlgjkangjka', NULL, 2, '2019-04-03', '2019-04-03 21:12:13', '2019-04-03 21:12:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects_concepts`
--

CREATE TABLE `projects_concepts` (
  `id` int(11) NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `concept_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `projects_concepts`
--

INSERT INTO `projects_concepts` (`id`, `project_id`, `concept_id`, `created_at`, `updated_at`) VALUES
(3, 18, 7, '2019-04-02 08:34:21', '2019-04-02 08:34:21'),
(4, 19, 5, '2019-04-02 09:23:33', '2019-04-02 09:23:33'),
(5, 20, 8, '2019-04-02 09:29:15', '2019-04-02 09:29:15'),
(9, 51, 7, '2019-04-03 11:19:17', '2019-04-03 11:19:17'),
(11, 54, 7, '2019-04-03 11:43:35', '2019-04-03 11:43:35'),
(12, 54, 12, '2019-04-03 11:43:35', '2019-04-03 11:43:35'),
(13, 55, 7, '2019-04-03 11:45:27', '2019-04-03 11:45:27'),
(14, 55, 12, '2019-04-03 11:45:27', '2019-04-03 11:45:27'),
(15, 57, 12, '2019-04-03 11:55:43', '2019-04-03 11:55:43'),
(16, 57, 12, '2019-04-03 11:55:43', '2019-04-03 11:55:43'),
(18, 59, 7, '2019-04-03 12:32:21', '2019-04-03 12:32:21'),
(19, 60, 12, '2019-04-03 12:45:32', '2019-04-03 12:45:32'),
(20, 62, 7, '2019-04-03 13:58:17', '2019-04-03 13:58:17'),
(21, 63, 12, '2019-04-03 14:56:32', '2019-04-03 14:56:32'),
(24, 69, 12, '2019-04-03 19:13:00', '2019-04-03 19:13:00'),
(25, 70, 7, '2019-04-03 19:18:34', '2019-04-03 19:18:34'),
(26, 71, 7, '2019-04-03 19:26:06', '2019-04-03 19:26:06'),
(27, 73, 10, '2019-04-03 21:07:53', '2019-04-03 21:07:53'),
(28, 74, 7, '2019-04-03 21:12:13', '2019-04-03 21:12:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_projects`
--

CREATE TABLE `status_projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `status_projects`
--

INSERT INTO `status_projects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Incompleto', NULL, NULL),
(2, 'Información completa sin proyecto', NULL, NULL),
(3, 'Información completa con proyecto', NULL, NULL),
(4, 'Expediente revisado', NULL, NULL),
(5, 'Expediente en vinculación', NULL, NULL),
(6, 'Expediente en ventanilla', NULL, NULL),
(7, 'Aprobado', NULL, NULL),
(8, 'Rechazado', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_components`
--

CREATE TABLE `sub_components` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specific_requirements` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `component_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sub_components`
--

INSERT INTO `sub_components` (`id`, `name`, `specific_requirements`, `start_date`, `finish_date`, `program_id`, `component_id`, `created_at`, `updated_at`) VALUES
(4, 'sub 1 de 4mil', 'storage/subcomponents/hKJNLr95yPwjZkZwpgIOIEB6P3GL2jQSQlBxqp3k.jpeg', '2019-04-05', '2019-04-17', 14, 5, '2019-04-01 15:11:46', '2019-04-01 15:11:46'),
(5, 'sub de 4mil', 'storage/subcomponents/pDkFv7W3XRaEK9cWGxT1wcXZJii8vS30kXnKG8Pj.jpeg', '2019-04-13', '2019-04-24', 14, 6, '2019-04-01 15:13:26', '2019-04-01 15:17:31'),
(6, 'Adquisición de insumos (subcomp.)', 'storage/subcomponents/1jN1Z4rq1ly51PsozyMyePwy6oRGLbGrwbc1R9aP.jpeg', '2019-04-01', '2019-04-19', 16, 7, '2019-04-01 21:23:30', '2019-04-01 21:23:30'),
(7, 'Investigación de campo (sucomp.)', 'storage/subcomponents/mDtoVw7D0fysjSCPmV0qlQYjHAJVt8Y2JDC3IX2s.jpeg', '2019-04-20', '2019-04-23', 16, 7, '2019-04-01 21:24:25', '2019-04-01 21:24:25'),
(8, 'Cultivo de cocoa (subcomp.)', 'storage/subcomponents/2tJfxlYQVQArxD3bduNKRG0ZB3CSRkwbrcJMi89i.png', '2019-04-11', '2019-04-26', 16, 8, '2019-04-01 21:25:13', '2019-04-01 21:25:13'),
(9, 'Meca subcomponent 1', 'storage/subcomponents/lqjMysyfunaXlgs05iWrJySoQhGqAZg82FZewQP1.jpeg', '2019-04-03', '2019-04-12', 22, 9, '2019-04-02 15:16:34', '2019-04-02 15:16:34'),
(10, 'Meca subcomponent 2', 'storage/subcomponents/j8iBd2aBSdVbJgI60dkQVeKhUsaRvjnfMLrV4QQ3.png', '2019-04-03', '2019-04-12', 22, 9, '2019-04-02 15:16:56', '2019-04-02 15:16:56'),
(11, 'Meca subcomponent 3', 'storage/subcomponents/fDAhgKxpmJTpua9xta0JhPnX9R0HnECtulMiv3YP.png', '2019-04-03', '2019-04-12', 22, 9, '2019-04-02 15:17:17', '2019-04-02 15:17:17'),
(12, 'Meca subcomponent 1.2', 'storage/subcomponents/WjzNiilWDAlKLO0oAIXrAtPgoS6dpHeIkXmnTwcJ.jpeg', '2019-04-06', '2019-04-17', 22, 10, '2019-04-02 15:17:39', '2019-04-02 15:17:39'),
(13, 'Meca subcomponent 1.3', 'storage/subcomponents/up1onGgqZPglgC88dz9bdKGf1T4rLcfVXA5yE7Sd.png', '2019-04-06', '2019-04-17', 22, 10, '2019-04-02 15:18:17', '2019-04-02 15:18:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_last_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'storage/no_image.png',
  `type` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `second_last_name`, `email`, `password`, `office`, `image_url`, `type`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administardor', 'System', NULL, 'admin@system.com', '$2y$10$Pfan0GgLm90/PhdVf4qeeu1RXVFkzLm7Fpv1T/PLmZVc5AJamZ9Jm', 'Altamira', 'storage/users/OQ09j49rqSWPT7VEQUDxTt4iEmzJmsdB3cegCLGW.jpeg', 1, NULL, 'dOJ0t1bETGmrjxPTbfuNtnxwYlwdIOh7k6Bqhl3A58qlX28kOW1XBzwviry8', NULL, NULL),
(2, 'Mike', 'Sanchez', NULL, 'admin@admin.com', '$2y$10$tfA9vZtwfGHvWxaaqBfX3ObsFHjyXfQoHF5Pm9C3Qsh0mwzb3/j5e', 'Altamira', 'storage/users/ajpkDq49r5CvZW5oFsOkJTwyCFY3CI4J0gnmWU6x.jpeg', 1, NULL, '6onRQOm2PSHihvJAXiaoapq7dNhpT7Y8umQkGI1saFNJgY6klAYN0ji6LZW0', '2019-03-31 18:58:03', '2019-03-31 18:58:03'),
(3, 'user1', 'test', NULL, 'test1@gmail.com', '$2y$10$9nuJ3xqPgkpNMmK6TPiL2Ou/l3JV1RHeQvwbEEbM2NJo8HwRZdLmO', 'Altamira', 'storage/no_image.png', 2, NULL, '6SqBsUsRZfcAG6Ql7Mt9qmhlz7o5M1CP81PbUxOF3XStm5AYP5crcdO68SHs', '2019-04-03 22:55:24', '2019-04-03 23:01:26'),
(4, 'user2', 'test', NULL, 'test2@gmail.com', '$2y$10$n4I/w39QwV4iD8OIKDiYoORdnr56x1cUBKL12QJ59l3S741vP2dyG', 'Altamira', 'storage/no_image.png', 3, NULL, 'wNd43egC29uqPr2ovr7z9U0dFXG3PXxhYhXA5Q12uyiDwbXpOX8MBJIILNFW', '2019-04-03 22:56:32', '2019-04-03 22:56:44'),
(5, 'user3', 'test', NULL, 'test3@gmail.com', '$2y$10$xBxznfdg4iR3Wy3Bk6WKbuZ5NWFSFjTJ57b25dILFANdFhYzej.YW', 'Altamira', 'storage/no_image.png', 4, NULL, 'lBEjSDcJTE9nOS5aT1nAQBZ8gwhX2JdDDJNQFQQde9IygqrrnoCUrVWlJCd1', '2019-04-03 23:01:57', '2019-04-03 23:01:57'),
(6, 'user4', 'test', NULL, 'test4@gmail.com', '$2y$10$MMwngAVG6m8Cc5/uLsXmdOPLVq4g1L.zvrFtlnOf7CwhgUZ8qMHc.', 'Altamira', 'storage/no_image.png', 5, NULL, 'dsWtQPEK9fBD7WEZS7nsMJrlw9RQwsEpXdqHlRfY10qsPORW1tnH7iiXeqxM', '2019-04-03 23:02:32', '2019-04-03 23:02:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_types`
--

CREATE TABLE `users_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_types`
--

INSERT INTO `users_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', NULL, NULL),
(2, 'Monitoreo y difusión', NULL, NULL),
(3, 'Vinculación estratégica', NULL, NULL),
(4, 'Atención específica', NULL, NULL),
(5, 'Atención general', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visit_histories`
--

CREATE TABLE `visit_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `status_project_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `comments` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `visit_histories`
--

INSERT INTO `visit_histories` (`id`, `status_project_id`, `project_id`, `comments`, `date`, `user_id`, `created_at`, `updated_at`) VALUES
(59, 1, 51, 'sffagsga', '2019-04-03', 1, '2019-04-03 11:19:17', '2019-04-03 11:19:17'),
(61, 1, 54, 'asdgasasag', '2019-04-03', 1, '2019-04-03 11:43:35', '2019-04-03 11:43:35'),
(62, 1, 55, 'asggsagghssdh', '2019-04-03', 1, '2019-04-03 11:45:27', '2019-04-03 11:45:27'),
(63, 1, 57, 'sfagasgg', '2019-04-03', 1, '2019-04-03 11:55:43', '2019-04-03 11:55:43'),
(68, 1, 59, 'SFAGSAGASG', '2019-04-03', 1, '2019-04-03 12:32:21', '2019-04-03 12:32:21'),
(69, 1, 60, 'sin doctos', '2019-04-03', 1, '2019-04-03 12:45:32', '2019-04-03 12:45:32'),
(70, 6, 60, 'dfhrhretytr', '2019-04-03', 1, '2019-04-03 13:04:39', '2019-04-03 13:04:39'),
(71, 1, 61, 'dhahdhadh', '2019-04-03', 1, '2019-04-03 13:13:24', '2019-04-03 13:13:24'),
(72, 1, 61, 'dfsdfjdf', '2019-04-03', 1, '2019-04-03 13:16:06', '2019-04-03 13:16:06'),
(73, 1, 62, 'se recibe proyecto sin doctos.', '2019-04-03', 1, '2019-04-03 13:58:17', '2019-04-03 13:58:17'),
(74, 2, 62, 'Se reciben documentos pero quedan aun faltantes.', '2019-04-03', 1, '2019-04-03 14:08:20', '2019-04-03 14:08:20'),
(79, 1, 63, 'sagasgasg', '2019-04-03', 1, '2019-04-03 14:56:32', '2019-04-03 14:56:32'),
(80, 3, 64, 'saggghadhh', '2019-04-03', 1, '2019-04-03 15:01:01', '2019-04-03 15:01:01'),
(81, 1, 65, 'Pendiente doctos.', '2019-04-03', 1, '2019-04-03 15:06:50', '2019-04-03 15:06:50'),
(84, 1, 66, 'maslkvmalkfmlñfsa', '2019-04-03', 1, '2019-04-03 18:58:09', '2019-04-03 18:58:09'),
(87, 2, 69, 'naslkjfnsajkfnasjk', '2019-04-03', 1, '2019-04-03 19:13:00', '2019-04-03 19:13:00'),
(88, 1, 70, 'nsalkjansf', '2019-04-03', 1, '2019-04-03 19:18:34', '2019-04-03 19:18:34'),
(89, 1, 71, 'sfagasgeagegae', '2019-04-03', 1, '2019-04-03 19:26:06', '2019-04-03 19:26:06'),
(90, 2, 66, 'nsajklfnjksafnaks', '2019-04-03', 1, '2019-04-03 20:21:06', '2019-04-03 20:21:06'),
(91, 3, 72, 'Jnuhuhuh', '2019-04-03', 1, '2019-04-03 21:03:03', '2019-04-03 21:03:03'),
(92, 6, 73, 'Uyuyyu', '2019-04-03', 1, '2019-04-03 21:07:53', '2019-04-03 21:07:53'),
(93, 4, 73, 'Jhuhyh', '2019-04-03', 1, '2019-04-03 21:09:24', '2019-04-03 21:09:24'),
(94, 1, 74, 'slakjnfaskf', '2019-04-03', 1, '2019-04-03 21:12:13', '2019-04-03 21:12:13'),
(95, 2, 74, 'snaknlaksjfa', '2019-04-03', 1, '2019-04-03 21:27:50', '2019-04-03 21:27:50'),
(96, 6, 51, 'Se agrego folio exterior', '2019-04-03', 2, '2019-04-03 21:50:45', '2019-04-03 21:50:45'),
(97, 6, 51, 'Se agrego folio exterior', '2019-04-03', 1, '2019-04-03 21:56:19', '2019-04-03 21:56:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anexos`
--
ALTER TABLE `anexos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicants_city_foreign` (`city`);

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `components_program_id_foreign` (`program_id`);

--
-- Indices de la tabla `concepts`
--
ALTER TABLE `concepts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `concepts_program_id_foreign` (`program_id`);

--
-- Indices de la tabla `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_project_id_foreign` (`project_id`);

--
-- Indices de la tabla `glosaries`
--
ALTER TABLE `glosaries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_applicant_id_foreign` (`applicant_id`),
  ADD KEY `projects_program_id_foreign` (`program_id`),
  ADD KEY `status_project` (`status_project`);

--
-- Indices de la tabla `projects_concepts`
--
ALTER TABLE `projects_concepts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status_projects`
--
ALTER TABLE `status_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sub_components`
--
ALTER TABLE `sub_components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_components_program_id_foreign` (`program_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_type_foreign` (`type`);

--
-- Indices de la tabla `users_types`
--
ALTER TABLE `users_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visit_histories`
--
ALTER TABLE `visit_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visit_histories_status_project_id_foreign` (`status_project_id`),
  ADD KEY `visit_histories_project_id_foreign` (`project_id`),
  ADD KEY `visit_histories_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anexos`
--
ALTER TABLE `anexos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29138;
--
-- AUTO_INCREMENT de la tabla `components`
--
ALTER TABLE `components`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `concepts`
--
ALTER TABLE `concepts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT de la tabla `glosaries`
--
ALTER TABLE `glosaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT de la tabla `projects_concepts`
--
ALTER TABLE `projects_concepts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `status_projects`
--
ALTER TABLE `status_projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `sub_components`
--
ALTER TABLE `sub_components`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `users_types`
--
ALTER TABLE `users_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `visit_histories`
--
ALTER TABLE `visit_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `components`
--
ALTER TABLE `components`
  ADD CONSTRAINT `components_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `concepts`
--
ALTER TABLE `concepts`
  ADD CONSTRAINT `concepts_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sub_components`
--
ALTER TABLE `sub_components`
  ADD CONSTRAINT `sub_components_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_type_foreign` FOREIGN KEY (`type`) REFERENCES `users_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `visit_histories`
--
ALTER TABLE `visit_histories`
  ADD CONSTRAINT `visit_histories_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visit_histories_status_project_id_foreign` FOREIGN KEY (`status_project_id`) REFERENCES `status_projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visit_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
