-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2016 a las 04:09:33
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ppc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calidad`
--

CREATE TABLE `calidad` (
  `cali_calidadid` int(11) NOT NULL,
  `cali_nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calidad`
--

INSERT INTO `calidad` (`cali_calidadid`, `cali_nombre`) VALUES
(1, 'Nuevo'),
(2, 'Remanufacturado'),
(3, 'Compatible'),
(4, 'aca'),
(5, 'aca'),
(6, 'aca'),
(7, 'aca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `cate_categoriaid` int(11) NOT NULL,
  `cate_nombre` varchar(60) DEFAULT NULL,
  `cate_Activo` tinyint(1) DEFAULT NULL,
  `cate_fechacreacion` datetime DEFAULT NULL,
  `cate_fechamodificacion` datetime DEFAULT NULL,
  `cate_usuariocreacion` int(11) DEFAULT NULL,
  `cate_usuariomodificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cate_categoriaid`, `cate_nombre`, `cate_Activo`, `cate_fechacreacion`, `cate_fechamodificacion`, `cate_usuariocreacion`, `cate_usuariomodificacion`) VALUES
(1, 'Tintas', 1, NULL, NULL, NULL, NULL),
(2, 'Impresoras', 1, NULL, NULL, NULL, NULL),
(3, 'Perifericos', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `ciud_ciudadid` int(11) NOT NULL,
  `ciud_nombre` varchar(45) DEFAULT NULL,
  `Estado_esta_estadoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `clie_clienteid` int(11) NOT NULL,
  `clie_nombre` varchar(45) DEFAULT NULL,
  `clie_amaterno` varchar(45) DEFAULT NULL,
  `clie_apaterno` varchar(45) DEFAULT NULL,
  `clie_email` varchar(45) DEFAULT NULL,
  `clie_emailrazon` varchar(45) DEFAULT NULL,
  `clie_fechaingresosistema` datetime DEFAULT NULL,
  `clie_razonsocial` varchar(45) DEFAULT NULL,
  `clie_observaciones` text,
  `clie_rfc` varchar(45) DEFAULT NULL,
  `clie_fax` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`clie_clienteid`, `clie_nombre`, `clie_amaterno`, `clie_apaterno`, `clie_email`, `clie_emailrazon`, `clie_fechaingresosistema`, `clie_razonsocial`, `clie_observaciones`, `clie_rfc`, `clie_fax`) VALUES
(1, 'asdsada', 'asd', 'dasdas', 'asd', 'asd', '0000-00-00 00:00:00', 'asd', 'asd', 'asd', 'asd'),
(2, 'popo', 'popo', 'popo', 'popo', 'popo', '0000-00-00 00:00:00', 'popo', 'popo', 'popo', 'popo'),
(3, 'popo', 'popo', 'popo', 'popo', 'popo', '0000-00-00 00:00:00', 'popo', 'popo', 'popo', 'popo'),
(4, 'caca', 'pipi', 'miaos', 'pipi', 'pipi', '0000-00-00 00:00:00', 'pipi', 'pipi', 'pipi', 'pipi'),
(5, 'caca', 'caca', 'caca', 'caca', 'caca', '0000-00-00 00:00:00', 'caca', 'caca', 'caca', 'caca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `colo_colorid` int(11) NOT NULL,
  `colo_nombre` varchar(45) DEFAULT NULL,
  `colo_activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`colo_colorid`, `colo_nombre`, `colo_activo`) VALUES
(1, 'Negro', 1),
(2, 'Magenta', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `comp_compraid` int(11) NOT NULL,
  `comp_fecha` datetime DEFAULT NULL,
  `comp_subtotal` double DEFAULT NULL,
  `comp_iva` double DEFAULT NULL,
  `comp_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE `detallecompra` (
  `detco_detallecompraid` int(11) NOT NULL,
  `detco_cantidad` double DEFAULT NULL,
  `detco_precio` double DEFAULT NULL,
  `detco_tipocambio` double DEFAULT NULL,
  `Compras_comp_compraid` int(11) NOT NULL,
  `Producto_prod_productoid` int(11) NOT NULL,
  `Producto_SubCategoria_subc_subcategoriaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallegarantia`
--

CREATE TABLE `detallegarantia` (
  `dega_detallegarantiaid` int(11) NOT NULL,
  `dega_nombre` varchar(255) DEFAULT NULL,
  `Garantia_gara_garantiaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleinsumoproducto`
--

CREATE TABLE `detalleinsumoproducto` (
  `dein_detalleinsumoproductoid` int(11) NOT NULL,
  `DetalleVenta_detve_detalleventaid` int(11) NOT NULL,
  `Insumos_insu_insumosid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `detve_detalleventaid` int(11) NOT NULL,
  `detve_cantidad` double DEFAULT NULL,
  `detve_precio` double DEFAULT NULL,
  `detve_tipocambio` double DEFAULT NULL,
  `Ventas_vent_ventaid` int(11) NOT NULL,
  `Producto_prod_productoid` int(11) NOT NULL,
  `Producto_SubCategoria_subc_subcategoriaid` int(11) NOT NULL,
  `Calidad_cali_calidadid` int(11) NOT NULL,
  `DetalleGarantia_dega_detallegarantiaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccioncliente`
--

CREATE TABLE `direccioncliente` (
  `direclie_direccionclienteid` int(11) NOT NULL,
  `direclie_calle` varchar(45) DEFAULT NULL,
  `direclie_numero` varchar(45) DEFAULT NULL,
  `direclie_colonia` varchar(45) DEFAULT NULL,
  `direclie_numeroexterior` varchar(45) DEFAULT NULL,
  `Clientes_clie_clienteid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccionproveedor`
--

CREATE TABLE `direccionproveedor` (
  `direprove_direccionproveedorid` int(11) NOT NULL,
  `direprove_calle` varchar(45) DEFAULT NULL,
  `direprove_numero` varchar(45) DEFAULT NULL,
  `direprove_colonia` varchar(45) DEFAULT NULL,
  `direprove_numeroexterior` varchar(45) DEFAULT NULL,
  `Proveedor_prov_proveedorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `esta_estadoid` int(11) NOT NULL,
  `esta_nombre` varchar(45) DEFAULT NULL,
  `Paises_pais_paisid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formas`
--

CREATE TABLE `formas` (
  `form_formaid` int(11) NOT NULL,
  `form_nombre` varchar(45) DEFAULT NULL,
  `form_archivo` varchar(45) DEFAULT NULL,
  `TipoForma_tifo_tipoformaid` int(11) NOT NULL,
  `Modulos_modu_moduloid` int(11) NOT NULL,
  `Modulos_TipoModulo_timo_tipomoduloid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantia`
--

CREATE TABLE `garantia` (
  `gara_garantiaid` int(11) NOT NULL,
  `gara_tipogarantia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `insu_insumosid` int(11) NOT NULL,
  `insu_nombre` varchar(45) DEFAULT NULL,
  `insu_descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `marc_marcaid` int(11) NOT NULL,
  `marc_nombre` varchar(45) DEFAULT NULL,
  `marc_activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`marc_marcaid`, `marc_nombre`, `marc_activo`) VALUES
(1, 'HP', 1),
(2, 'epson', 1),
(3, 'Brother', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medida`
--

CREATE TABLE `medida` (
  `medi_medidaid` int(11) NOT NULL,
  `medi_nombre` varchar(45) DEFAULT NULL,
  `medi_activo` tinyint(1) DEFAULT NULL,
  `medi_fechacreacion` datetime DEFAULT NULL,
  `medi_fechamodificacion` datetime DEFAULT NULL,
  `medi_usuariocreacion` int(11) DEFAULT NULL,
  `medi_usuariomodificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medida`
--

INSERT INTO `medida` (`medi_medidaid`, `medi_nombre`, `medi_activo`, `medi_fechacreacion`, `medi_fechamodificacion`, `medi_usuariocreacion`, `medi_usuariomodificacion`) VALUES
(1, 'PZA', 1, NULL, NULL, NULL, NULL),
(2, 'Caja', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `modu_moduloid` int(11) NOT NULL,
  `modu_nombre` varchar(45) DEFAULT NULL,
  `TipoModulo_timo_tipomoduloid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda`
--

CREATE TABLE `moneda` (
  `mone_monedaid` int(11) NOT NULL,
  `mone_nombre` varchar(45) DEFAULT NULL,
  `mone_simbolo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `moneda`
--

INSERT INTO `moneda` (`mone_monedaid`, `mone_nombre`, `mone_simbolo`) VALUES
(1, 'Pesos', '$'),
(2, 'Dolar', '$');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `pais_paisid` int(11) NOT NULL,
  `pais_nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`pais_paisid`, `pais_nombre`) VALUES
(1, 'Mexico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `perm_permisoid` int(11) NOT NULL,
  `perm_nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`perm_permisoid`, `perm_nombre`) VALUES
(1, 'Lectura'),
(2, 'Escritura'),
(3, 'Ver Ofertas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `prod_productoid` int(11) NOT NULL,
  `prod_nombre` varchar(255) DEFAULT NULL,
  `prod_descripcion` text NOT NULL,
  `prod_descripcioningles` text NOT NULL,
  `prod_precioestandar` double DEFAULT NULL,
  `prod_preciolista` double DEFAULT NULL,
  `prod_garantia` double DEFAULT NULL,
  `prod_tamano` double DEFAULT NULL,
  `prod_stock` double DEFAULT NULL,
  `prod_imagen` varchar(450) DEFAULT NULL,
  `prod_activo` tinyint(1) DEFAULT NULL,
  `prod_fechacreacion` datetime DEFAULT NULL,
  `prod_fechamodificacion` datetime DEFAULT NULL,
  `prod_usuariocreacion` int(11) DEFAULT NULL,
  `prod_usuariomodificacion` int(11) DEFAULT NULL,
  `prod_costo` double DEFAULT NULL,
  `prod_margen` double DEFAULT NULL,
  `SubCategoria_subc_subcategoriaid` int(11) NOT NULL,
  `Medida_medi_medidaid` int(11) NOT NULL,
  `Colores_colo_colorid` int(11) NOT NULL,
  `Calidad_cali_calidadid` int(11) NOT NULL,
  `Marca_marc_marcaid` int(11) NOT NULL,
  `Moneda_mone_monedaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`prod_productoid`, `prod_nombre`, `prod_descripcion`, `prod_descripcioningles`, `prod_precioestandar`, `prod_preciolista`, `prod_garantia`, `prod_tamano`, `prod_stock`, `prod_imagen`, `prod_activo`, `prod_fechacreacion`, `prod_fechamodificacion`, `prod_usuariocreacion`, `prod_usuariomodificacion`, `prod_costo`, `prod_margen`, `SubCategoria_subc_subcategoriaid`, `Medida_medi_medidaid`, `Colores_colo_colorid`, `Calidad_cali_calidadid`, `Marca_marc_marcaid`, `Moneda_mone_monedaid`) VALUES
(3, 'Producto', '', '', 100, 100, 2, 1, 1, 'http://4.bp.blogspot.com/-lQcDZWgcTkA/U0c7lHalThI/AAAAAAAAWKM/6J7LSMxEdcw/s1600/impresora+canon+pixma+que+suelen+presentar+el+error+5,156,61.jpg', 1, NULL, NULL, NULL, NULL, 100, 4, 1, 1, 1, 1, 1, 1),
(4, 'Producto 2', '', '', 100, 100, 12, 1, 1, 'http://www.definicionabc.com/wp-content/uploads/Impresora.jpg', 1, NULL, NULL, NULL, NULL, 100, 1, 1, 1, 1, 1, 2, 1),
(5, 'Producto 3', '', '', 100, 100, 12, 2, 1, 'http://2.bp.blogspot.com/-OU_EaRuhyO4/UHRU4DCMMqI/AAAAAAAAAwM/w2u8jKyjd94/s1600/260772-epson-workforce-60-front.jpg', 1, NULL, NULL, NULL, NULL, 100, 10, 1, 1, 1, 1, 1, 1),
(6, '2', 'bla bla bla', 'blablabla en ingles', 1, 0, 1, 1, 1, 'http://www.toshibatec-tsis.com/imagenes/img0068.jpg', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(7, 'Producto 4', 'bla bla bla', 'bla bla bla en ingles', 100, 100, 12, 100, 100, 'http://www.alimentadoresdetinta.com/EPSON_XP-411.gif', 1, NULL, NULL, NULL, NULL, 100, 10, 1, 1, 1, 2, 1, 1),
(8, 'hp1233', 'bla bla bla', 'bla bla bla en ingles', 100, 100, 12, 1, 1, 'https://www.walmart.com.mx/images/products/img_large/00088611191714l.jpg', 1, NULL, NULL, NULL, NULL, 100, 10, 3, 1, 1, 1, 1, 1),
(9, 'prueba de producto', 'descripcion', 'description', 100, 100, 12, 100, 3, 'http://www.informatica-hoy.com.ar/trucos-consejos-computadora/imagenes/impresora.jpg', 1, NULL, NULL, NULL, NULL, 200, 4, 2, 1, 1, 1, 1, 1),
(10, 'Mouse Generico Bluetooth', 'Mouse Generico inalambrico', 'Generic wireless mouse', 150, 150, 12, 0, 10, 'http://www9.pcmag.com/media/images/227447-hp-z200-mouse.jpg', 1, NULL, NULL, NULL, NULL, 150, 0, 4, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `prov_proveedorid` int(11) NOT NULL,
  `prov_nombre` varchar(45) DEFAULT NULL,
  `prov_amaterno` varchar(45) DEFAULT NULL,
  `prov_apaterno` varchar(45) DEFAULT NULL,
  `prov_email` varchar(45) DEFAULT NULL,
  `prov_emailrazon` varchar(45) DEFAULT NULL,
  `prov_fechaingresosistema` datetime DEFAULT NULL,
  `prov_razonsocial` varchar(45) DEFAULT NULL,
  `prov_observaciones` text,
  `prov_rfc` varchar(45) DEFAULT NULL,
  `prov_fax` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_rolid` int(11) NOT NULL,
  `rol_nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_rolid`, `rol_nombre`) VALUES
(1, 'Administrador'),
(2, 'Venta Mayorista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolforma`
--

CREATE TABLE `rolforma` (
  `rofo_rolformaid` int(11) NOT NULL,
  `Formas_form_formaid` int(11) NOT NULL,
  `Roles_rol_rolid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolmodulo`
--

CREATE TABLE `rolmodulo` (
  `romo_rolmoduloid` int(11) NOT NULL,
  `Modulos_modu_moduloid` int(11) NOT NULL,
  `Modulos_TipoModulo_timo_tipomoduloid` int(11) NOT NULL,
  `Roles_rol_rolid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolpermiso`
--

CREATE TABLE `rolpermiso` (
  `rolpe_rolpermisoid` int(11) NOT NULL,
  `Roles_rol_rolid` int(11) NOT NULL,
  `Permisos_perm_permisoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rolpermiso`
--

INSERT INTO `rolpermiso` (`rolpe_rolpermisoid`, `Roles_rol_rolid`, `Permisos_perm_permisoid`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `subc_subcategoriaid` int(11) NOT NULL,
  `subc_nombre` varchar(45) DEFAULT NULL,
  `subc_activo` tinyint(1) DEFAULT NULL,
  `subc_fechacreacion` datetime DEFAULT NULL,
  `subc_fechamodificacion` datetime DEFAULT NULL,
  `subc_usuariocreacion` int(11) DEFAULT NULL,
  `subc_usuariomodificacion` int(11) DEFAULT NULL,
  `Categoria_cate_categoriaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`subc_subcategoriaid`, `subc_nombre`, `subc_activo`, `subc_fechacreacion`, `subc_fechamodificacion`, `subc_usuariocreacion`, `subc_usuariomodificacion`, `Categoria_cate_categoriaid`) VALUES
(1, 'Nuevo', 1, NULL, NULL, NULL, NULL, 1),
(2, 'Recargados', 1, NULL, NULL, NULL, NULL, 1),
(3, 'zxczx', NULL, NULL, NULL, NULL, NULL, 2),
(4, 'Mouse', NULL, NULL, NULL, NULL, NULL, 3),
(5, 'Inalambricas', NULL, NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoforma`
--

CREATE TABLE `tipoforma` (
  `tifo_tipoformaid` int(11) NOT NULL,
  `tifo_nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomodulo`
--

CREATE TABLE `tipomodulo` (
  `timo_tipomoduloid` int(11) NOT NULL,
  `timo_nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_usuarioid` int(11) NOT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `user_password` varchar(45) DEFAULT NULL,
  `Roles_rol_rolid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_usuarioid`, `user_name`, `user_password`, `Roles_rol_rolid`) VALUES
(1, 'arturo', '1234', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `vent_ventaid` int(11) NOT NULL,
  `vent_fecha` datetime DEFAULT NULL,
  `vent_subtotal` double DEFAULT NULL,
  `vent_iva` double DEFAULT NULL,
  `vent_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calidad`
--
ALTER TABLE `calidad`
  ADD PRIMARY KEY (`cali_calidadid`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cate_categoriaid`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`ciud_ciudadid`),
  ADD KEY `fk_Ciudad_Estado1_idx` (`Estado_esta_estadoid`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`clie_clienteid`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`colo_colorid`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`comp_compraid`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD PRIMARY KEY (`detco_detallecompraid`),
  ADD KEY `fk_DetalleCompra_Compras1_idx` (`Compras_comp_compraid`),
  ADD KEY `fk_DetalleCompra_Producto1_idx` (`Producto_prod_productoid`,`Producto_SubCategoria_subc_subcategoriaid`);

--
-- Indices de la tabla `detallegarantia`
--
ALTER TABLE `detallegarantia`
  ADD PRIMARY KEY (`dega_detallegarantiaid`),
  ADD KEY `fk_DetalleGarantia_Garantia1_idx` (`Garantia_gara_garantiaid`);

--
-- Indices de la tabla `detalleinsumoproducto`
--
ALTER TABLE `detalleinsumoproducto`
  ADD PRIMARY KEY (`dein_detalleinsumoproductoid`),
  ADD KEY `fk_DetalleInsumoProducto_DetalleVenta1_idx` (`DetalleVenta_detve_detalleventaid`),
  ADD KEY `fk_DetalleInsumoProducto_Insumos1_idx` (`Insumos_insu_insumosid`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`detve_detalleventaid`),
  ADD KEY `fk_DetalleVenta_Ventas1_idx` (`Ventas_vent_ventaid`),
  ADD KEY `fk_DetalleVenta_Producto1_idx` (`Producto_prod_productoid`,`Producto_SubCategoria_subc_subcategoriaid`),
  ADD KEY `fk_DetalleVenta_Calidad1_idx` (`Calidad_cali_calidadid`),
  ADD KEY `fk_DetalleVenta_DetalleGarantia1_idx` (`DetalleGarantia_dega_detallegarantiaid`);

--
-- Indices de la tabla `direccioncliente`
--
ALTER TABLE `direccioncliente`
  ADD PRIMARY KEY (`direclie_direccionclienteid`),
  ADD KEY `fk_DireccionCliente_Clientes1_idx` (`Clientes_clie_clienteid`);

--
-- Indices de la tabla `direccionproveedor`
--
ALTER TABLE `direccionproveedor`
  ADD PRIMARY KEY (`direprove_direccionproveedorid`),
  ADD KEY `fk_DireccionProveedor_Proveedor1_idx` (`Proveedor_prov_proveedorid`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`esta_estadoid`),
  ADD KEY `fk_Estado_Paises1_idx` (`Paises_pais_paisid`);

--
-- Indices de la tabla `formas`
--
ALTER TABLE `formas`
  ADD PRIMARY KEY (`form_formaid`),
  ADD KEY `fk_Formas_TipoForma1_idx` (`TipoForma_tifo_tipoformaid`),
  ADD KEY `fk_Formas_Modulos1_idx` (`Modulos_modu_moduloid`,`Modulos_TipoModulo_timo_tipomoduloid`);

--
-- Indices de la tabla `garantia`
--
ALTER TABLE `garantia`
  ADD PRIMARY KEY (`gara_garantiaid`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`insu_insumosid`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`marc_marcaid`);

--
-- Indices de la tabla `medida`
--
ALTER TABLE `medida`
  ADD PRIMARY KEY (`medi_medidaid`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`modu_moduloid`,`TipoModulo_timo_tipomoduloid`),
  ADD KEY `fk_Modulos_TipoModulo1_idx` (`TipoModulo_timo_tipomoduloid`);

--
-- Indices de la tabla `moneda`
--
ALTER TABLE `moneda`
  ADD PRIMARY KEY (`mone_monedaid`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`pais_paisid`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`perm_permisoid`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`prod_productoid`,`SubCategoria_subc_subcategoriaid`),
  ADD KEY `fk_Producto_SubCategoria1_idx` (`SubCategoria_subc_subcategoriaid`),
  ADD KEY `fk_Producto_Medida1_idx` (`Medida_medi_medidaid`),
  ADD KEY `fk_Producto_Colores1_idx` (`Colores_colo_colorid`),
  ADD KEY `fk_Producto_Calidad1_idx` (`Calidad_cali_calidadid`),
  ADD KEY `fk_Producto_Marca1_idx` (`Marca_marc_marcaid`),
  ADD KEY `fk_Producto_Moneda1_idx` (`Moneda_mone_monedaid`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`prov_proveedorid`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_rolid`);

--
-- Indices de la tabla `rolforma`
--
ALTER TABLE `rolforma`
  ADD PRIMARY KEY (`rofo_rolformaid`),
  ADD KEY `fk_RolForma_Formas1_idx` (`Formas_form_formaid`),
  ADD KEY `fk_RolForma_Roles1_idx` (`Roles_rol_rolid`);

--
-- Indices de la tabla `rolmodulo`
--
ALTER TABLE `rolmodulo`
  ADD PRIMARY KEY (`romo_rolmoduloid`),
  ADD KEY `fk_RolModulo_Modulos1_idx` (`Modulos_modu_moduloid`,`Modulos_TipoModulo_timo_tipomoduloid`),
  ADD KEY `fk_RolModulo_Roles1_idx` (`Roles_rol_rolid`);

--
-- Indices de la tabla `rolpermiso`
--
ALTER TABLE `rolpermiso`
  ADD PRIMARY KEY (`rolpe_rolpermisoid`,`Permisos_perm_permisoid`),
  ADD KEY `fk_RolPermiso_Roles1_idx` (`Roles_rol_rolid`),
  ADD KEY `fk_RolPermiso_Permisos1_idx` (`Permisos_perm_permisoid`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`subc_subcategoriaid`),
  ADD KEY `fk_SubCategoria_Categoria_idx` (`Categoria_cate_categoriaid`);

--
-- Indices de la tabla `tipoforma`
--
ALTER TABLE `tipoforma`
  ADD PRIMARY KEY (`tifo_tipoformaid`);

--
-- Indices de la tabla `tipomodulo`
--
ALTER TABLE `tipomodulo`
  ADD PRIMARY KEY (`timo_tipomoduloid`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_usuarioid`),
  ADD KEY `fk_Usuarios_Roles1_idx` (`Roles_rol_rolid`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`vent_ventaid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calidad`
--
ALTER TABLE `calidad`
  MODIFY `cali_calidadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cate_categoriaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `ciud_ciudadid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `clie_clienteid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `colo_colorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `comp_compraid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  MODIFY `detco_detallecompraid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detallegarantia`
--
ALTER TABLE `detallegarantia`
  MODIFY `dega_detallegarantiaid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalleinsumoproducto`
--
ALTER TABLE `detalleinsumoproducto`
  MODIFY `dein_detalleinsumoproductoid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `detve_detalleventaid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `direccioncliente`
--
ALTER TABLE `direccioncliente`
  MODIFY `direclie_direccionclienteid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `direccionproveedor`
--
ALTER TABLE `direccionproveedor`
  MODIFY `direprove_direccionproveedorid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `esta_estadoid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `formas`
--
ALTER TABLE `formas`
  MODIFY `form_formaid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `garantia`
--
ALTER TABLE `garantia`
  MODIFY `gara_garantiaid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `insu_insumosid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `marc_marcaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `medida`
--
ALTER TABLE `medida`
  MODIFY `medi_medidaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `modu_moduloid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `moneda`
--
ALTER TABLE `moneda`
  MODIFY `mone_monedaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `pais_paisid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `perm_permisoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `prod_productoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `prov_proveedorid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_rolid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rolforma`
--
ALTER TABLE `rolforma`
  MODIFY `rofo_rolformaid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rolmodulo`
--
ALTER TABLE `rolmodulo`
  MODIFY `romo_rolmoduloid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rolpermiso`
--
ALTER TABLE `rolpermiso`
  MODIFY `rolpe_rolpermisoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `subc_subcategoriaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipoforma`
--
ALTER TABLE `tipoforma`
  MODIFY `tifo_tipoformaid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipomodulo`
--
ALTER TABLE `tipomodulo`
  MODIFY `timo_tipomoduloid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_usuarioid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `vent_ventaid` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_Ciudad_Estado1` FOREIGN KEY (`Estado_esta_estadoid`) REFERENCES `estado` (`esta_estadoid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD CONSTRAINT `fk_DetalleCompra_Compras1` FOREIGN KEY (`Compras_comp_compraid`) REFERENCES `compras` (`comp_compraid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DetalleCompra_Producto1` FOREIGN KEY (`Producto_prod_productoid`,`Producto_SubCategoria_subc_subcategoriaid`) REFERENCES `producto` (`prod_productoid`, `SubCategoria_subc_subcategoriaid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallegarantia`
--
ALTER TABLE `detallegarantia`
  ADD CONSTRAINT `fk_DetalleGarantia_Garantia1` FOREIGN KEY (`Garantia_gara_garantiaid`) REFERENCES `garantia` (`gara_garantiaid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalleinsumoproducto`
--
ALTER TABLE `detalleinsumoproducto`
  ADD CONSTRAINT `fk_DetalleInsumoProducto_DetalleVenta1` FOREIGN KEY (`DetalleVenta_detve_detalleventaid`) REFERENCES `detalleventa` (`detve_detalleventaid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DetalleInsumoProducto_Insumos1` FOREIGN KEY (`Insumos_insu_insumosid`) REFERENCES `insumos` (`insu_insumosid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `fk_DetalleVenta_Calidad1` FOREIGN KEY (`Calidad_cali_calidadid`) REFERENCES `calidad` (`cali_calidadid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DetalleVenta_DetalleGarantia1` FOREIGN KEY (`DetalleGarantia_dega_detallegarantiaid`) REFERENCES `detallegarantia` (`dega_detallegarantiaid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DetalleVenta_Producto1` FOREIGN KEY (`Producto_prod_productoid`,`Producto_SubCategoria_subc_subcategoriaid`) REFERENCES `producto` (`prod_productoid`, `SubCategoria_subc_subcategoriaid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DetalleVenta_Ventas1` FOREIGN KEY (`Ventas_vent_ventaid`) REFERENCES `ventas` (`vent_ventaid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `direccioncliente`
--
ALTER TABLE `direccioncliente`
  ADD CONSTRAINT `fk_DireccionCliente_Clientes1` FOREIGN KEY (`Clientes_clie_clienteid`) REFERENCES `clientes` (`clie_clienteid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `direccionproveedor`
--
ALTER TABLE `direccionproveedor`
  ADD CONSTRAINT `fk_DireccionProveedor_Proveedor1` FOREIGN KEY (`Proveedor_prov_proveedorid`) REFERENCES `proveedor` (`prov_proveedorid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `fk_Estado_Paises1` FOREIGN KEY (`Paises_pais_paisid`) REFERENCES `paises` (`pais_paisid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `formas`
--
ALTER TABLE `formas`
  ADD CONSTRAINT `fk_Formas_Modulos1` FOREIGN KEY (`Modulos_modu_moduloid`,`Modulos_TipoModulo_timo_tipomoduloid`) REFERENCES `modulos` (`modu_moduloid`, `TipoModulo_timo_tipomoduloid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Formas_TipoForma1` FOREIGN KEY (`TipoForma_tifo_tipoformaid`) REFERENCES `tipoforma` (`tifo_tipoformaid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `fk_Modulos_TipoModulo1` FOREIGN KEY (`TipoModulo_timo_tipomoduloid`) REFERENCES `tipomodulo` (`timo_tipomoduloid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_Producto_Calidad1` FOREIGN KEY (`Calidad_cali_calidadid`) REFERENCES `calidad` (`cali_calidadid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_Colores1` FOREIGN KEY (`Colores_colo_colorid`) REFERENCES `colores` (`colo_colorid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_Marca1` FOREIGN KEY (`Marca_marc_marcaid`) REFERENCES `marca` (`marc_marcaid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_Medida1` FOREIGN KEY (`Medida_medi_medidaid`) REFERENCES `medida` (`medi_medidaid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_Moneda1` FOREIGN KEY (`Moneda_mone_monedaid`) REFERENCES `moneda` (`mone_monedaid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_SubCategoria1` FOREIGN KEY (`SubCategoria_subc_subcategoriaid`) REFERENCES `subcategoria` (`subc_subcategoriaid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rolforma`
--
ALTER TABLE `rolforma`
  ADD CONSTRAINT `fk_RolForma_Formas1` FOREIGN KEY (`Formas_form_formaid`) REFERENCES `formas` (`form_formaid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RolForma_Roles1` FOREIGN KEY (`Roles_rol_rolid`) REFERENCES `roles` (`rol_rolid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rolmodulo`
--
ALTER TABLE `rolmodulo`
  ADD CONSTRAINT `fk_RolModulo_Modulos1` FOREIGN KEY (`Modulos_modu_moduloid`,`Modulos_TipoModulo_timo_tipomoduloid`) REFERENCES `modulos` (`modu_moduloid`, `TipoModulo_timo_tipomoduloid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RolModulo_Roles1` FOREIGN KEY (`Roles_rol_rolid`) REFERENCES `roles` (`rol_rolid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rolpermiso`
--
ALTER TABLE `rolpermiso`
  ADD CONSTRAINT `fk_RolPermiso_Permisos1` FOREIGN KEY (`Permisos_perm_permisoid`) REFERENCES `permisos` (`perm_permisoid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RolPermiso_Roles1` FOREIGN KEY (`Roles_rol_rolid`) REFERENCES `roles` (`rol_rolid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `fk_SubCategoria_Categoria` FOREIGN KEY (`Categoria_cate_categoriaid`) REFERENCES `categoria` (`cate_categoriaid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Usuarios_Roles1` FOREIGN KEY (`Roles_rol_rolid`) REFERENCES `roles` (`rol_rolid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
