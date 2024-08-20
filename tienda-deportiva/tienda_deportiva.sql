-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2024 a las 00:06:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_deportiva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `popularidad` int(11) DEFAULT 0,
  `stock` int(11) DEFAULT 0,
  `oferta` tinyint(1) DEFAULT 0,
  `precio_anterior` decimal(10,2) DEFAULT NULL,
  `en_oferta` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--


INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `categoria`, `imagen`, `popularidad`, `stock`, `oferta`, `precio_anterior`, `en_oferta`) VALUES
(31, 'Guantes de Boxeo', 'Guantes de boxeo de cuero sintético, acolchados para protección.', 24999.00, 'Accesorios', 'guantes_boxeo.jpg', 10, 50, 1, 27999.00, 1),
(32, 'Banda Elástica', 'Banda elástica de resistencia media, ideal para ejercicios de fuerza.', 2999.00, 'Accesorios', 'banda_elastica.jpg', 7, 200, 0, NULL, 0),
(33, 'Chamarra Impermeable', 'Chamarra ligera impermeable, perfecta para correr bajo la lluvia.', 19999.00, 'Ropa', 'chamarra_impermeable.jpg', 15, 80, 0, NULL, 0),
(34, 'Calcetas Deportivas', 'Calcetas transpirables para entrenamientos intensos.', 1999.00, 'Ropa', 'calcetas_deportivas.jpg', 13, 300, 0, NULL, 0),
(35, 'Gorra Deportiva', 'Gorra ligera y transpirable para actividades al aire libre.', 4999.00, 'Accesorios', 'gorra_deportiva.jpg', 8, 150, 0, NULL, 0),
(36, 'Mancuernas Ajustables', 'Set de mancuernas ajustables de 5 a 25 kg.', 69999.00, 'Equipamiento', 'mancuernas_ajustables.jpg', 9, 30, 1, 74999.00, 1),
(37, 'Camiseta de Entrenamiento', 'Camiseta ligera y transpirable, ideal para cualquier tipo de ejercicio.', 6999.00, 'Ropa', 'camiseta_entrenamiento.jpg', 12, 100, 0, NULL, 0),
(38, 'Tapete para Ejercicio', 'Tapete acolchonado para ejercicios de suelo.', 7999.00, 'Accesorios', 'tapete_ejercicio.jpg', 7, 120, 0, NULL, 0),
(39, 'Raqueta de Tenis', 'Raqueta de tenis de alta calidad, ligera y duradera.', 34999.00, 'Equipamiento', 'raqueta_tenis.jpg', 15, 25, 1, 39999.00, 1),
(40, 'Faja Deportiva', 'Faja ajustable para soporte lumbar durante entrenamientos.', 9999.00, 'Accesorios', 'faja_deportiva.jpg', 10, 60, 0, NULL, 0),
(41, 'Tobilleras Deportivas', 'Tobilleras de compresión para protección y soporte.', 3999.00, 'Accesorios', 'tobilleras_deportivas.jpg', 7, 80, 0, NULL, 0),
(42, 'Zapatos de Correr', 'Zapatos ligeros y amortiguados, diseñados para carreras de larga distancia.', 24999.00, 'Calzado', 'zapatos_correr.jpg', 18, 45, 1, 27999.00, 1),
(43, 'Gafas de Natación', 'Gafas antiempañantes para natación en piscina o aguas abiertas.', 5999.00, 'Accesorios', 'gafas_natacion.jpg', 11, 150, 0, NULL, 0),
(44, 'Chaleco de Peso', 'Chaleco ajustable con pesos incluidos para entrenamientos intensivos.', 34999.00, 'Equipamiento', 'chaleco_peso.jpg', 6, 25, 1, 39999.00, 1),
(45, 'Bolsa de Hidratación', 'Bolsa de hidratación de 2 litros, ideal para ciclismo y running.', 12999.00, 'Accesorios', 'bolsa_hidratacion.jpg', 14, 100, 0, NULL, 0),
(46, 'Guantes para Gym', 'Guantes antideslizantes para entrenamiento de pesas.', 4999.00, 'Accesorios', 'guantes_gym.jpg', 12, 120, 0, NULL, 0),
(47, 'Protector Solar Deportivo', 'Protector solar resistente al agua para actividades al aire libre.', 1999.00, 'Accesorios', 'protector_solar.jpg', 16, 300, 0, NULL, 0),
(48, 'Bicicleta de Carretera', 'Bicicleta ligera de carbono para alta velocidad en carretera.', 159999.00, 'Equipamiento', 'bicicleta_carretera.jpg', 20, 10, 1, 179999.00, 1),
(49, 'Comba de CrossFit', 'Comba de alta velocidad, perfecta para entrenamientos de CrossFit.', 3499.00, 'Accesorios', 'comba_crossfit.jpg', 8, 150, 0, NULL, 0),
(50, 'Camiseta de Compresión', 'Camiseta ajustada para compresión y soporte muscular.', 8999.00, 'Ropa', 'camiseta_compresion.jpg', 10, 90, 0, NULL, 0),
(51, 'Bicicleta Estática', 'Bicicleta estática con múltiples niveles de resistencia.', 79999.00, 'Equipamiento', 'bicicleta_estatica.jpg', 14, 20, 1, 89999.00, 1),
(52, 'Reloj Inteligente', 'Reloj con GPS y monitor de actividad física.', 39999.00, 'Accesorios', 'reloj_inteligente.jpg', 19, 50, 0, NULL, 0),
(53, 'Sudadera con Capucha', 'Sudadera cómoda y cálida para entrenamiento al aire libre.', 14999.00, 'Ropa', 'sudadera_capucha.jpg', 13, 80, 0, NULL, 0),
(54, 'Balón de Fútbol', 'Balón de fútbol oficial con diseño resistente.', 7999.00, 'Equipamiento', 'balon_futbol.jpg', 18, 200, 0, NULL, 0),
(55, 'Camiseta para Ciclismo', 'Camiseta ligera y transpirable con bolsillos traseros.', 12999.00, 'Ropa', 'camiseta_ciclismo.jpg', 15, 70, 0, NULL, 0),
(56, 'Botella Deportiva', 'Botella de agua de acero inoxidable con aislamiento.', 5999.00, 'Accesorios', 'botella_deportiva.jpg', 14, 150, 0, NULL, 0),
(57, 'Bandas de Resistencia', 'Set de bandas de resistencia con diferentes niveles.', 7999.00, 'Accesorios', 'bandas_resistencia.jpg', 12, 200, 0, NULL, 0),
(58, 'Casco de Escalada', 'Casco ligero y resistente para escalada en roca.', 19999.00, 'Accesorios', 'casco_escalada.jpg', 11, 50, 0, NULL, 0),
(59, 'Short de Correr', 'Short ligero con bolsillo trasero y ajuste cómodo.', 6999.00, 'Ropa', 'short_correr.jpg', 9, 100, 0, NULL, 0),
(60, 'Pantalones de Yoga', 'Pantalones elásticos y cómodos, perfectos para yoga.', 9999.00, 'Ropa', 'pantalones_yoga.jpg', 10, 80, 0, NULL, 0),
(61, 'Botas de Escalada', 'Botas ligeras y resistentes con suela adherente.', 44999.00, 'Calzado', 'botas_escalada.jpg', 7, 30, 1, 49999.00, 1),
(62, 'Lentes Deportivos', 'Lentes con protección UV para actividades al aire libre.', 7999.00, 'Accesorios', 'lentes_deportivos.jpg', 12, 120, 0, NULL, 0),
(63, 'Chaleco de Seguridad', 'Chaleco reflectante para actividades en la carretera.', 2499.00, 'Accesorios', 'chaleco_seguridad.jpg', 8, 200, 0, NULL, 0),
(64, 'Pesa de Mano', 'Pesa de mano de 5 kg para entrenamiento de fuerza.', 4999.00, 'Equipamiento', 'pesa_mano.jpg', 6, 80, 0, NULL, 0),
(65, 'Ropa Interior Térmica', 'Conjunto de ropa interior térmica para climas fríos.', 14999.00, 'Ropa', 'ropa_interior_termica.jpg', 15, 60, 0, NULL, 0),
(66, 'Botas de Senderismo', 'Botas resistentes e impermeables para senderismo.', 59999.00, 'Calzado', 'botas_senderismo.jpg', 9, 40, 1, 64999.00, 1),
(67, 'Cuerda de Escalada', 'Cuerda dinámica para escalada con alta resistencia.', 79999.00, 'Accesorios', 'cuerda_escalada.jpg', 7, 20, 1, 89999.00, 1),
(68, 'Chaqueta para Nieve', 'Chaqueta aislante para deportes de invierno.', 79999.00, 'Ropa', 'chaqueta_nieve.jpg', 16, 25, 1, 89999.00, 1),
(69, 'Gorra Térmica', 'Gorra con forro polar para mantener la cabeza caliente.', 2999.00, 'Accesorios', 'gorra_termica.jpg', 10, 150, 0, NULL, 0),
(70, 'Raqueta de Bádminton', 'Raqueta ligera y balanceada para bádminton.', 19999.00, 'Equipamiento', 'raqueta_badminton.jpg', 9, 50, 0, NULL, 0),
(71, 'Zapatillas para Montaña', 'Zapatillas con suela resistente para montañismo.', 74999.00, 'Calzado', 'zapatillas_montana.jpg', 8, 35, 1, 79999.00, 1),
(72, 'Guantes de Montañismo', 'Guantes impermeables y resistentes para montañismo.', 34999.00, 'Accesorios', 'guantes_montanismo.jpg', 7, 40, 0, NULL, 0),
(73, 'Tienda de Campaña', 'Tienda de campaña ligera para dos personas.', 99999.00, 'Equipamiento', 'tienda_campana.jpg', 11, 15, 1, 109999.00, 1),
(74, 'Calcetas de Montaña', 'Calcetas gruesas para mantener los pies calientes.', 3999.00, 'Ropa', 'calcetas_montana.jpg', 12, 120, 0, NULL, 0),
(75, 'Bicicleta de Montaña', 'Bicicleta con suspensión total para terrenos difíciles.', 129999.00, 'Equipamiento', 'bicicleta_montana.jpg', 20, 12, 1, 139999.00, 1),
(76, 'Bañador para Natación', 'Bañador de competición resistente al cloro.', 9999.00, 'Ropa', 'banador_natacion.jpg', 14, 60, 0, NULL, 0),
(77, 'Pantalones de Montañismo', 'Pantalones resistentes al agua para montañismo.', 24999.00, 'Ropa', 'pantalones_montanismo.jpg', 10, 70, 0, NULL, 0),
(78, 'Calcetas de Compresión', 'Calcetas ajustadas para mejorar la circulación.', 4999.00, 'Ropa', 'calcetas_compresion.jpg', 9, 120, 0, NULL, 0),
(79, 'Zapatillas de Trekking', 'Zapatillas ligeras y duraderas para trekking.', 64999.00, 'Calzado', 'zapatillas_trekking.jpg', 8, 30, 1, 69999.00, 1),
(80, 'Chaleco de Pesas', 'Chaleco con pesos adicionales para entrenamientos.', 39999.00, 'Equipamiento', 'chaleco_pesas.jpg', 7, 20, 1, 44999.00, 1),
(81, 'Camiseta Reflectante', 'Camiseta reflectante para mayor seguridad al correr de noche.', 6999.00, 'Ropa', 'camiseta_reflectante.jpg', 10, 80, 0, NULL, 0),
(82, 'Zapatos de Escalada', 'Zapatos ajustados y adherentes para escalada en roca.', 49999.00, 'Calzado', 'zapatos_escalada.jpg', 11, 30, 1, 54999.00, 1),
(83, 'Guantes de Ciclismo', 'Guantes acolchonados y antideslizantes para ciclismo.', 9999.00, 'Accesorios', 'guantes_ciclismo.jpg', 12, 100, 0, NULL, 0),
(84, 'Botas de Invierno', 'Botas impermeables y cálidas para invierno.', 79999.00, 'Calzado', 'botas_invierno.jpg', 15, 25, 1, 89999.00, 1),
(85, 'Pesa Rusa', 'Pesa rusa de 16 kg para ejercicios funcionales.', 59999.00, 'Equipamiento', 'pesa_rusa.jpg', 8, 50, 0, NULL, 0),
(86, 'Cinturón de Levantamiento', 'Cinturón de cuero para levantamiento de pesas.', 19999.00, 'Accesorios', 'cinturon_levantamiento.jpg', 9, 70, 0, NULL, 0),
(87, 'Pantalones Térmicos', 'Pantalones ajustados para mantener el calor en invierno.', 14999.00, 'Ropa', 'pantalones_termicos.jpg', 11, 50, 0, NULL, 0),
(88, 'Bastones de Trekking', 'Bastones ligeros y ajustables para trekking.', 29999.00, 'Accesorios', 'bastones_trekking.jpg', 10, 40, 0, NULL, 0),
(89, 'Pesa de Mano Ajustable', 'Pesa de mano ajustable de 2 a 10 kg.', 24999.00, 'Equipamiento', 'pesa_mano_ajustable.jpg', 6, 70, 0, NULL, 0),
(90, 'Ropa Interior de Compresión', 'Ropa interior ajustada para compresión muscular.', 12999.00, 'Ropa', 'ropa_compresion.jpg', 10, 90, 0, NULL, 0),
(91, 'Zapatos de Invierno', 'Zapatos impermeables con forro térmico.', 64999.00, 'Calzado', 'zapatos_invierno.jpg', 9, 40, 1, 69999.00, 1),
(92, 'Cuerda para Saltar', 'Cuerda ligera y rápida para entrenamiento cardiovascular.', 3999.00, 'Accesorios', 'cuerda_saltar.jpg', 8, 150, 0, NULL, 0),
(93, 'Malla Deportiva', 'Malla ajustada y transpirable para entrenamientos intensos.', 9999.00, 'Ropa', 'malla_deportiva.jpg', 13, 70, 0, NULL, 0),
(94, 'Guantes de Portero', 'Guantes acolchonados para porteros de fútbol.', 19999.00, 'Accesorios', 'guantes_portero.jpg', 7, 50, 0, NULL, 0),
(95, 'Chaqueta Térmica', 'Chaqueta aislante para climas fríos.', 49999.00, 'Ropa', 'chaqueta_termica.jpg', 12, 40, 0, NULL, 0),
(96, 'Botas para Nieve', 'Botas resistentes al agua y al frío extremo.', 89999.00, 'Calzado', 'botas_nieve.jpg', 14, 20, 1, 99999.00, 1),
(97, 'Bicicleta de Montaña Eléctrica', 'Bicicleta de montaña con asistencia eléctrica.', 199999.00, 'Equipamiento', 'bicicleta_montana_electrica.jpg', 20, 10, 1, 219999.00, 1),
(98, 'Camiseta Técnica', 'Camiseta técnica ligera y de secado rápido.', 6999.00, 'Ropa', 'camiseta_tecnica.jpg', 12, 90, 0, NULL, 0),
(99, 'Zapatos para Trail Running', 'Zapatos ligeros con suela adherente para trail running.', 74999.00, 'Calzado', 'zapatos_trail_running.jpg', 11, 35, 1, 79999.00, 1),
(100, 'Zapatillas de Running', 'Zapatillas ligeras y amortiguadas para running.', 64999.00, 'Calzado', 'zapatillas_running.jpg', 15, 45, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores`
--

CREATE TABLE `suscriptores` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fecha_suscripcion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `email`) VALUES
(1, 'Guada', '$2y$10$tsMv3d91aIfrzIedGgc8cOZdJX2CwFWNG1C/ckqKqExem3AXAAzgq', '2024-08-18 14:19:23', 'ovalleguadalupe04@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
