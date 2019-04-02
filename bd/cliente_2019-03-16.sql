-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-03-2019 a las 19:42:43
-- Versión del servidor: 10.3.13-MariaDB-1:10.3.13+maria~bionic-log
-- Versión de PHP: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cliente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(6) NOT NULL,
  `ruc_dni` varchar(15) DEFAULT NULL,
  `razon_social` varchar(200) DEFAULT NULL,
  `tipo` varchar(2) DEFAULT NULL,
  `direccion_fiscal` varchar(200) DEFAULT NULL,
  `telefonos` varchar(100) DEFAULT NULL,
  `email_principal` varchar(100) DEFAULT NULL,
  `cuentra_detraccion` varchar(50) DEFAULT NULL,
  `adicional` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `ruc_dni`, `razon_social`, `tipo`, direccion, `telefonos`, `email_principal`, detraccion, `adicional`) VALUES
(5, '42516253', 'LINARES OSCCO ABRAHAM MOISES 2', '1', NULL, NULL, NULL, NULL, NULL),
(7, '20532710066', 'SUR MOTRIZ SOCIEDAD COMERCIAL DE RESPONSABILIDAD LIMITADA- SURMOTRIZ S.R.L.', '6', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `documento` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`documento`) VALUES
('{\"documentoTipo\":\"03\",\"documentoNuevo\":\"nuevo\",\"documentoSerie\":\"B001\",\"documentoNumero\":\"25\",\"emisorLocal\":\"3\",\"emisorUsername\":\"AMLO11\",\"emisorPassword\":\"moiseslinar3s\",\"emisorRuc\":\"20532710066\",\"emisorGenerar\":\"boleta\",\"documentoTitulo\":\"Boleta\",\"documentoLetras\":\"\",\"documentoFecha\":\"2019-02-24\",\"documentoMoneda\":\"PEN\",\"documentoOperacion\":\"1\",\"clienteTipo\":\"1\",\"clienteDniRuc\":\"42516253\",\"clienteRazon\":\"LINARES OSCCO ABRAHAM MOISES\",\"clienteDireccion\":\"\",\"items\":[{\"codigo\":\"ARROZ45\",\"descripcionCodigo\":\"ARROZ45 - Arroz Costeu00f1o 5 KG clase 4 Bells\",\"descripcion\":\"Arroz Costeu00f1o 5 KG clase 4 Bells\",\"unidad\":\"\",\"cantidad\":\"1\",\"igv\":\"3.33\",\"precioConIgv\":\"18.50\",\"precioSinIgv\":\"15.17\",\"descuento\":\"0.00\",\"subtotal\":\"15.17\",\"total\":\"18.50\"}],\"documentoInafecta\":\"\",\"documentoAnticipo\":\"\",\"documentoExonerada\":\"\",\"documentoGravada\":\"15.17\",\"documentoIgv\":\"3.33\",\"documentoGratuito\":\"\",\"documentoOtros\":\"\",\"documentoDescuento\":\"\",\"documentoTotal\":\"18.50\",\"respuestaEnviado\":\"no\",\"respuestaPdf\":\"http://api.lineysoft2.com/almacen/20532710066/2019/03/02/24/20532710066-03-B001-25.pdf\",\"respuestaXml\":\"http://api.lineysoft2.com/almacen/20532710066/2019/03/02/24/20532710066-03-B001-25.zip\",\"respuestaCdr\":\"\",\"respuestaMensaje\":\"Boleta generada pero se enviara en el resumen diario\"}'),
('{\"documentoTipo\":\"03\",\"documentoNuevo\":\"nuevo\",\"documentoSerie\":\"B001\",\"documentoNumero\":\"26\",\"emisorLocal\":\"3\",\"emisorUsername\":\"AMLO11\",\"emisorPassword\":\"moiseslinar3s\",\"emisorRuc\":\"20532710066\",\"emisorGenerar\":\"boleta\",\"documentoTitulo\":\"Boleta\",\"documentoLetras\":\"\",\"documentoFecha\":\"2019-02-25\",\"documentoMoneda\":\"PEN\",\"documentoOperacion\":\"1\",\"clienteTipo\":\"1\",\"clienteDniRuc\":\"42516253\",\"clienteRazon\":\"LINARES OSCCO ABRAHAM MOISES\",\"clienteDireccion\":\"\",\"items\":[{\"codigo\":\"ARROZ45\",\"descripcionCodigo\":\"ARROZ45 - Arroz Costeu00f1o 5 KG clase 4 Bells\",\"descripcion\":\"Arroz Costeu00f1o 5 KG clase 4 Bells\",\"unidad\":\"\",\"cantidad\":\"1\",\"igv\":\"3.33\",\"precioConIgv\":\"18.50\",\"precioSinIgv\":\"15.17\",\"descuento\":\"0.00\",\"subtotal\":\"15.17\",\"total\":\"18.50\"}],\"documentoInafecta\":\"\",\"documentoAnticipo\":\"\",\"documentoExonerada\":\"\",\"documentoGravada\":\"15.17\",\"documentoIgv\":\"3.33\",\"documentoGratuito\":\"\",\"documentoOtros\":\"\",\"documentoDescuento\":\"\",\"documentoTotal\":\"18.50\",\"respuestaEnviado\":\"si\",\"respuestaPdf\":\"http://api.lineysoft2.com/almacen/20532710066/2019/03/02/25/20532710066-03-B001-26.pdf\",\"respuestaXml\":\"http://api.lineysoft2.com/almacen/20532710066/2019/03/02/25/20532710066-03-B001-26.zip\",\"respuestaCdr\":\"\",\"respuestaMensaje\":\"Boleta generada pero se enviara en el resumen diario\"}'),
('{\"documentoTipo\":\"03\",\"documentoNuevo\":\"nuevo\",\"documentoSerie\":\"B001\",\"documentoNumero\":\"27\",\"emisorLocal\":\"3\",\"emisorUsername\":\"AMLO11\",\"emisorPassword\":\"moiseslinar3s\",\"emisorRuc\":\"20532710066\",\"emisorGenerar\":\"boleta\",\"documentoTitulo\":\"Boleta\",\"documentoLetras\":\"\",\"documentoFecha\":\"2019-02-25\",\"documentoMoneda\":\"PEN\",\"documentoOperacion\":\"1\",\"clienteTipo\":\"1\",\"clienteDniRuc\":\"42516253\",\"clienteRazon\":\"LINARES OSCCO ABRAHAM MOISES 2\",\"clienteDireccion\":\"tacna\",\"items\":[{\"codigo\":\"CHOCO41\",\"descripcionCodigo\":\"CHOCO41 - Chocolate sublime Blanco 25 g\",\"descripcion\":\"Chocolate sublime Blanco 25 g\",\"unidad\":\"\",\"cantidad\":\"1\",\"igv\":\"1.34\",\"precioConIgv\":\"7.45\",\"precioSinIgv\":\"6.11\",\"descuento\":\"0.00\",\"subtotal\":\"6.11\",\"total\":\"7.45\"}],\"documentoInafecta\":\"\",\"documentoAnticipo\":\"\",\"documentoExonerada\":\"\",\"documentoGravada\":\"6.11\",\"documentoIgv\":\"1.34\",\"documentoGratuito\":\"\",\"documentoOtros\":\"\",\"documentoDescuento\":\"\",\"documentoTotal\":\"7.45\",\"respuestaEnviado\":\"no\",\"respuestaPdf\":\"http://api.lineysoft2.com/almacen/20532710066/2019/03/02/25/20532710066-03-B001-27.pdf\",\"respuestaXml\":\"http://api.lineysoft2.com/almacen/20532710066/2019/03/02/25/20532710066-03-B001-27.zip\",\"respuestaCdr\":\"\",\"respuestaMensaje\":\"Boleta generada pero se enviara en el resumen diario\"}'),
('{\"documentoTipo\":\"03\",\"documentoNuevo\":\"nuevo\",\"documentoSerie\":\"B001\",\"documentoNumero\":\"28\",\"emisorLocal\":\"3\",\"emisorUsername\":\"AMLO11\",\"emisorPassword\":\"moiseslinar3s\",\"emisorRuc\":\"20532710066\",\"emisorGenerar\":\"boleta\",\"documentoTitulo\":\"Boleta\",\"documentoLetras\":\"\",\"documentoFecha\":\"2019-02-26\",\"documentoMoneda\":\"PEN\",\"documentoOperacion\":\"1\",\"clienteTipo\":\"1\",\"clienteDniRuc\":\"42516253\",\"clienteRazon\":\"LINARES OSCCO ABRAHAM MOISES\",\"clienteDireccion\":\"Tacna\",\"items\":[{\"codigo\":\"ARROZ45\",\"descripcionCodigo\":\"ARROZ45 - Arroz Costeu00f1o 5 KG clase 4 Bells\",\"descripcion\":\"Arroz Costeu00f1o 5 KG clase 4 Bells\",\"unidad\":\"\",\"cantidad\":\"1\",\"igv\":\"3.33\",\"precioConIgv\":\"18.50\",\"precioSinIgv\":\"15.17\",\"descuento\":\"0.00\",\"subtotal\":\"15.17\",\"total\":\"18.50\"},{\"codigo\":\"CHOCO41\",\"descripcion\":\"Chocolate sublime Blanco 25 g\",\"unidad\":\"\",\"cantidad\":\"1\",\"igv\":\"1.34\",\"precioConIgv\":\"7.45\",\"precioSinIgv\":\"6.11\",\"descuento\":\"0.00\",\"subtotal\":\"6.11\",\"total\":\"7.45\",\"descripcionCodigo\":\"CHOCO41 - Chocolate sublime Blanco 25 g\"}],\"documentoInafecta\":\"\",\"documentoAnticipo\":\"\",\"documentoExonerada\":\"\",\"documentoGravada\":\"21.28\",\"documentoIgv\":\"4.67\",\"documentoGratuito\":\"\",\"documentoOtros\":\"\",\"documentoDescuento\":\"\",\"documentoTotal\":\"25.95\",\"respuestaEnviado\":\"no\",\"respuestaPdf\":\"http://api.lineysoft2.com/almacen/20532710066/2019/03/02/26/20532710066-03-B001-28.pdf\",\"respuestaXml\":\"http://api.lineysoft2.com/almacen/20532710066/2019/03/02/26/20532710066-03-B001-28.zip\",\"respuestaCdr\":\"\",\"respuestaMensaje\":\"Boleta generada pero se enviara en el resumen diario\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emisores`
--

CREATE TABLE `emisores` (
  `id` int(11) NOT NULL,
  `ruc` varchar(12) DEFAULT NULL,
  `razon_social` varchar(300) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `web` varchar(250) DEFAULT NULL,
  `razon_comercial` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `emisores`
--

INSERT INTO `emisores` (`id`, `ruc`, `razon_social`, `telefono`, `email`, `web`, `razon_comercial`) VALUES
(11, '20532710066', 'Surmotriz SRL', '123457789', 'tacna@surmotriz.com', NULL, 'Surmotriz S.R.L'),
(12, '10425162530', 'Toyotac Tacna', '123457789', 'tacna@toyotac.com', NULL, 'Toyotac S.R.L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emisores_locales`
--

CREATE TABLE `emisores_locales` (
  `emisor_id` varchar(5) DEFAULT NULL,
  `local_id` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `emisores_locales`
--

INSERT INTO `emisores_locales` (`emisor_id`, `local_id`) VALUES
('11', '3'),
('11', '4'),
('11', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE `locales` (
  `id` int(11) NOT NULL,
  `codigo` varchar(5) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `ubigeo` varchar(8) DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `distrito` varchar(50) DEFAULT NULL,
  `emisor_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id`, `codigo`, `descripcion`, `ubigeo`, `direccion`, `departamento`, `provincia`, `distrito`, `emisor_id`) VALUES
(3, '001', 'Surmotriz Tacna', '012045', 'Tacna', 'Tacna', 'Tacna', 'Tacna', 11),
(4, '002', 'Surmotriz Moquegua', '125782', 'Moquegua', 'Moquegua', 'Moquegua', 'Moquegua', 11),
(5, '003', 'Surmotriz Ilo', '015575', 'Ilo', 'Ilo', 'Ilo', 'Ilo', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localesseries`
--

CREATE TABLE `localesseries` (
  `local_id` varchar(7) DEFAULT NULL,
  `serie_id` varchar(7) DEFAULT NULL,
  `defecto` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `localesseries`
--

INSERT INTO `localesseries` (`local_id`, `serie_id`, `defecto`) VALUES
('3', '3', '1'),
('3', '4', '0'),
('3', '5', '1'),
('3', '6', '0'),
('3', '7', '1'),
('3', '8', '1'),
('3', '9', '1'),
('3', '10', '1'),
('4', '3', '0'),
('4', '4', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(7) NOT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `unidad` varchar(7) DEFAULT NULL,
  `moneda` varchar(3) DEFAULT NULL,
  `igv_tipo` varchar(2) DEFAULT NULL,
  `local_id` varchar(7) DEFAULT NULL,
  `categoria_id` varchar(5) DEFAULT NULL,
  `producto_stock_id` varchar(7) DEFAULT NULL,
  `dependiente` varchar(2) DEFAULT NULL,
  `pro_ser` varchar(5) DEFAULT NULL,
  `precio_con_igv` varchar(7) DEFAULT NULL,
  `precio_sin_igv` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `codigo`, `descripcion`, `unidad`, `moneda`, `igv_tipo`, `local_id`, `categoria_id`, `producto_stock_id`, `dependiente`, `pro_ser`, `precio_con_igv`, `precio_sin_igv`) VALUES
(1, 'ARRO1', 'papel unidad', '2', 'PEN', '10', '3', '2', '1', 'si', 'NIU', '18.50', '15.17'),
(2, 'ARRO2', 'papel ciento', '100', 'PEN', '10', '3', '3', '1', 'si', 'NIU', '7.45', '6.11'),
(3, 'ARRO234', 'papel medio millarr', '502', 'USD', '10', '3', '10', '1', 'si', 'ZZ', '30.40', '24.93'),
(13, 'RIBO01', 'Ribosomas 1 pack', '5', 'PEN', '10', '3', '9', '8', NULL, 'NIU', '12.34', '10.12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_categoria`
--

CREATE TABLE `producto_categoria` (
  `id` int(6) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `edit` varchar(6) DEFAULT 'false',
  `codigo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto_categoria`
--

INSERT INTO `producto_categoria` (`id`, `descripcion`, `edit`, `codigo`) VALUES
(1, 'Prensas hidraulicas', 'false', NULL),
(2, 'Equipos Informaticos', 'false', NULL),
(3, 'Laptops Marca Lenovo Serie GHTY47884', 'false', NULL),
(9, 'Laptops DEll y otros', 'false', NULL),
(10, 'nuevo', 'false', NULL),
(11, 'dasdad', 'false', NULL),
(12, 'moises', 'false', NULL),
(13, 'linares', 'false', NULL),
(14, 'oscco linares modificado', 'false', NULL),
(15, 'nuevo elemento', 'false', NULL),
(16, 'uno mas para la lista', 'false', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_header`
--

CREATE TABLE `producto_header` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `user_id` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_header`
--

INSERT INTO `producto_header` (`id`, `codigo`, `descripcion`, `user_id`) VALUES
(1, 'ARROZ45', 'Arroz Costeño 5 KG clase 4 Bells', NULL),
(2, 'CHOCO41', 'Chocolate sublime Blanco 25 g', NULL),
(3, 'COLAGE', 'Colageno 100 mg de 100 capsulas', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_stock`
--

CREATE TABLE `producto_stock` (
  `id` int(11) NOT NULL,
  `producto_id` varchar(10) DEFAULT NULL,
  `cantidad` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto_stock`
--

INSERT INTO `producto_stock` (`id`, `producto_id`, `cantidad`) VALUES
(1, '1', '3001'),
(4, '', ''),
(5, '', '20'),
(6, '', '50'),
(7, '', '1'),
(8, '', '100');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumenes`
--

CREATE TABLE `resumenes` (
  `resumen` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resumenes`
--

INSERT INTO `resumenes` (`resumen`) VALUES
('{\"emisorGenerar\":\"resumen\",\"emisorUsername\":\"AMLO11\",\"emisorRuc\":\"20532710066\",\"emisorPassword\":\"moiseslinar3s\",\"emisorId\":\"11\",\"localId\":\"3\",\"fechaEmision\":\"2019-02-25\",\"fechaGenerado\":\"2019-02-26\",\"respuestaEnviado\":\"\",\"respuestaMensaje\":\"\",\"respuestaXml\":\"\",\"respuestaPdf\":\"\",\"respuestaNombre\":\"\",\"respuestaCorrelativo\":\"\",\"items\":[{\"documentoTipo\":\"03\",\"documentoSerie\":\"B001\",\"documentoNumero\":\"27\",\"clienteTipo\":\"1\",\"clienteDniRuc\":\"42516253\",\"documentoGravada\":\"6.11\",\"documentoIgv\":\"1.34\",\"documentoTotal\":\"7.45\"}]}'),
('{\"emisorGenerar\":\"resumen\",\"emisorUsername\":\"AMLO11\",\"emisorRuc\":\"20532710066\",\"emisorPassword\":\"moiseslinar3s\",\"emisorId\":\"11\",\"localId\":\"3\",\"fechaEmision\":\"2019-02-25\",\"fechaGenerado\":\"2019-02-26\",\"respuestaEnviado\":\"\",\"respuestaMensaje\":\"\",\"respuestaXml\":\"\",\"respuestaPdf\":\"\",\"respuestaNombre\":\"\",\"respuestaCorrelativo\":\"\",\"items\":[{\"documentoTipo\":\"03\",\"documentoSerie\":\"B001\",\"documentoNumero\":\"27\",\"clienteTipo\":\"1\",\"clienteDniRuc\":\"42516253\",\"documentoGravada\":\"6.11\",\"documentoIgv\":\"1.34\",\"documentoTotal\":\"7.45\"}]}'),
('{\"emisorGenerar\":\"resumen\",\"emisorUsername\":\"AMLO11\",\"emisorRuc\":\"20532710066\",\"emisorPassword\":\"moiseslinar3s\",\"emisorId\":\"11\",\"localId\":\"3\",\"fechaEmision\":\"2019-02-25\",\"fechaGenerado\":\"2019-02-26\",\"respuestaEnviado\":\"\",\"respuestaMensaje\":\"\",\"respuestaXml\":\"\",\"respuestaPdf\":\"\",\"respuestaNombre\":\"\",\"respuestaCorrelativo\":\"\",\"items\":[{\"documentoTipo\":\"03\",\"documentoSerie\":\"B001\",\"documentoNumero\":\"27\",\"clienteTipo\":\"1\",\"clienteDniRuc\":\"42516253\",\"documentoGravada\":\"6.11\",\"documentoIgv\":\"1.34\",\"documentoTotal\":\"7.45\"}]}'),
('{\"emisorGenerar\":\"resumen\",\"emisorUsername\":\"AMLO11\",\"emisorRuc\":\"20532710066\",\"emisorPassword\":\"moiseslinar3s\",\"emisorId\":\"11\",\"localId\":\"3\",\"fechaEmision\":\"2019-02-25\",\"fechaGenerado\":\"2019-02-26\",\"respuestaEnviado\":\"\",\"respuestaMensaje\":\"\",\"respuestaXml\":\"\",\"respuestaPdf\":\"\",\"respuestaNombre\":\"\",\"respuestaCorrelativo\":\"\",\"items\":[{\"documentoTipo\":\"03\",\"documentoSerie\":\"B001\",\"documentoNumero\":\"27\",\"clienteTipo\":\"1\",\"clienteDniRuc\":\"42516253\",\"documentoGravada\":\"6.11\",\"documentoIgv\":\"1.34\",\"documentoTotal\":\"7.45\"}]}'),
('{\"emisorGenerar\":\"resumen\",\"emisorUsername\":\"AMLO11\",\"emisorRuc\":\"20532710066\",\"emisorPassword\":\"moiseslinar3s\",\"emisorId\":\"11\",\"localId\":\"3\",\"fechaEmision\":\"2019-02-25\",\"fechaGenerado\":\"2019-02-26\",\"respuestaEnviado\":\"\",\"respuestaMensaje\":\"\",\"respuestaXml\":\"\",\"respuestaPdf\":\"\",\"respuestaNombre\":\"\",\"respuestaCorrelativo\":\"\",\"items\":[{\"documentoTipo\":\"03\",\"documentoSerie\":\"B001\",\"documentoNumero\":\"27\",\"clienteTipo\":\"1\",\"clienteDniRuc\":\"42516253\",\"documentoGravada\":\"6.11\",\"documentoIgv\":\"1.34\",\"documentoTotal\":\"7.45\"}]}'),
('{\"emisorGenerar\":\"resumen\",\"emisorUsername\":\"AMLO11\",\"emisorRuc\":\"20532710066\",\"emisorPassword\":\"moiseslinar3s\",\"emisorId\":\"11\",\"localId\":\"3\",\"fechaEmision\":\"2019-02-25\",\"fechaGenerado\":\"2019-02-25\",\"respuestaEnviado\":\"no\",\"respuestaMensaje\":\"1551145145663\",\"respuestaXml\":\"/almacen/20532710066/2019/re/02/25/20532710066-RC-20190225-5.zip\",\"respuestaPdf\":\"\",\"respuestaNombre\":\"20532710066-RC-20190225-5\",\"respuestaCorrelativo\":5,\"items\":[{\"documentoTipo\":\"03\",\"documentoSerie\":\"B001\",\"documentoNumero\":\"27\",\"clienteTipo\":\"1\",\"clienteDniRuc\":\"42516253\",\"documentoGravada\":\"6.11\",\"documentoIgv\":\"1.34\",\"documentoTotal\":\"7.45\"}]}'),
('{\"emisorGenerar\":\"resumen\",\"emisorUsername\":\"AMLO11\",\"emisorRuc\":\"20532710066\",\"emisorPassword\":\"moiseslinar3s\",\"emisorId\":\"11\",\"localId\":\"3\",\"fechaEmision\":\"2019-02-25\",\"fechaGenerado\":\"2019-02-25\",\"respuestaEnviado\":\"no\",\"respuestaMensaje\":\"1551153601655\",\"respuestaXml\":\"/almacen/20532710066/2019/re/02/25/20532710066-RC-20190225-6.zip\",\"respuestaPdf\":\"\",\"respuestaNombre\":\"20532710066-RC-20190225-6\",\"respuestaCorrelativo\":6,\"items\":[{\"documentoTipo\":\"03\",\"documentoSerie\":\"B001\",\"documentoNumero\":\"27\",\"clienteTipo\":\"1\",\"clienteDniRuc\":\"42516253\",\"documentoGravada\":\"6.11\",\"documentoIgv\":\"1.34\",\"documentoTotal\":\"7.45\"}]}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `serie` varchar(4) DEFAULT NULL,
  `type` varchar(3) DEFAULT NULL,
  `emisor_id` varchar(7) DEFAULT NULL,
  `number` varchar(7) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`id`, `serie`, `type`, `emisor_id`, `number`) VALUES
(3, 'F001', 'F', '11', '32'),
(4, 'F002', 'F', '11', '0'),
(5, 'B001', 'B', '11', '28'),
(6, 'B002', 'B', '11', '0'),
(7, 'FN01', 'FNC', '11', '0'),
(8, 'FD01', 'FND', '11', '0'),
(9, 'BN01', 'BNC', '11', '0'),
(10, 'BD01', 'BND', '11', '0'),
(11, 'FN02', 'FNC', '11', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `activo` varchar(1) NOT NULL DEFAULT '0',
  `local_id` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `email`, `password`, `activo`, `local_id`) VALUES
(3, 'abraham', 'elnaufrago2009@gmail.com', '1234', '0', NULL),
(4, 'moises', 'elnaufrago2009@hotmail.com', '1234', '0', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_locales`
--

CREATE TABLE `usuarios_locales` (
  `local_id` varchar(5) DEFAULT NULL,
  `user_id` varchar(5) DEFAULT NULL,
  `default_local` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_locales`
--

INSERT INTO `usuarios_locales` (`local_id`, `user_id`, `default_local`) VALUES
('4', '3', '0'),
('5', '3', '0'),
('3', '3', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `emisores`
--
ALTER TABLE `emisores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_header`
--
ALTER TABLE `producto_header`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_stock`
--
ALTER TABLE `producto_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `emisores`
--
ALTER TABLE `emisores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `producto_header`
--
ALTER TABLE `producto_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto_stock`
--
ALTER TABLE `producto_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
