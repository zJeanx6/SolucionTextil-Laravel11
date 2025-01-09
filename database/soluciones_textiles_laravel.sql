-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2025 a las 03:46:38
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
-- Base de datos: `soluciones_textiles_laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('stebanrc21@gmail.com|127.0.0.1', 'i:2;', 1736389681),
('stebanrc21@gmail.com|127.0.0.1:timer', 'i:1736389681;', 1736389681),
('stebanrc2d1@gmail.com|127.0.0.1', 'i:1;', 1736389446),
('stebanrc2d1@gmail.com|127.0.0.1:timer', 'i:1736389446;', 1736389446);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `proveedorNit` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompras`
--

CREATE TABLE `detallecompras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `compraId` bigint(20) UNSIGNED DEFAULT NULL,
  `elementoCodigo` varchar(255) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleentradas`
--

CREATE TABLE `detalleentradas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entradaId` bigint(20) UNSIGNED DEFAULT NULL,
  `productoCodigo` varchar(255) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleprestamos`
--

CREATE TABLE `detalleprestamos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prestamoId` bigint(20) UNSIGNED DEFAULT NULL,
  `elementoCodigo` varchar(255) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesalidas`
--

CREATE TABLE `detallesalidas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salidaId` bigint(20) UNSIGNED DEFAULT NULL,
  `productoCodigo` varchar(255) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos`
--

CREATE TABLE `elementos` (
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `colorId` varchar(255) DEFAULT NULL,
  `tipoElementoId` bigint(20) UNSIGNED DEFAULT NULL,
  `ancho` decimal(5,2) DEFAULT NULL,
  `largo` decimal(5,2) DEFAULT NULL,
  `existencias` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `usuarioId` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'activo', NULL, NULL),
(2, 'inactivo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iniciossesion`
--

CREATE TABLE `iniciossesion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuarioId` bigint(20) UNSIGNED DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientomaquinas`
--

CREATE TABLE `mantenimientomaquinas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuarioId` bigint(20) UNSIGNED DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `serialId` varchar(255) DEFAULT NULL,
  `estadoId` bigint(20) UNSIGNED DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `serial` varchar(255) NOT NULL,
  `marcaId` bigint(20) UNSIGNED DEFAULT NULL,
  `tiposMaquinasId` bigint(20) UNSIGNED DEFAULT NULL,
  `estadoId` bigint(20) UNSIGNED DEFAULT NULL,
  `proveedorNit` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2024_12_22_031605_roles', 1),
(4, '2024_12_22_031724_colores', 1),
(5, '2024_12_22_031731_estados', 1),
(6, '2024_12_22_031737_tallas', 1),
(7, '2024_12_22_031743_marcas', 1),
(8, '2024_12_22_031753_proveedores', 1),
(9, '2024_12_22_031811_tipos', 1),
(10, '2024_12_22_031926_elementos', 1),
(11, '2024_12_22_032140_compras', 1),
(12, '2024_12_22_032623_usuarios', 1),
(13, '2024_12_22_032635_prestamos', 1),
(14, '2024_12_22_032733_productos', 1),
(15, '2024_12_22_032754_entradas', 1),
(16, '2024_12_22_032826_salidas', 1),
(17, '2024_12_22_032844_maquinas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('stebanrc21@gmail.com', '$2y$12$PmGT4xNr7q0UWpyKOUzYxOSPGdSOIT.3IpHrv1Ht2UcFCYxBf7HwW', '2025-01-09 07:23:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `usuarioId` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tallaId` bigint(20) UNSIGNED DEFAULT NULL,
  `colorId` varchar(255) DEFAULT NULL,
  `tipoProductoId` bigint(20) UNSIGNED DEFAULT NULL,
  `existencias` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `nit` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `contacto` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'mantenimiento', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dSmY6WH4jdjmKoDAUAzVLtuB2UnoQMdrGTNGHJOV', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM0R4OG1yMkdEc3VHdFEwVWtWdVJyM1dwWnBDZ2FqRmdqSTJxRFdqRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi92ZXItdXN1YXJpb3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1736384242),
('rAo5cWqmArylKJoxgGOENv0yobNMKXqD922bFDd7', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiczBZWmdtMHlmMXFFMVJpd2d6NXlJRHY4MGJVUmpWanNuTkdOWFdWNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9zb2x1Y2lvbmVzdGV4dGlsZXMudGVzdC9hZG1pbi92ZXItdXN1YXJpb3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1736384999),
('sWsBigxnrBMxrzX4sMuVqJ3WiTEfttgbig3DuYa2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHkybWwxd0ZaeHpJOGFJRGVYU2JNWG9wVTJiODhNbHpjWHJoSjJlNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9zb2x1Y2lvbmVzdGV4dGlsZXMudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1736381934),
('wswJQEAIzy5CQRYpc3RN2OCh3dSraiw8Yg87xnBR', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSW9pVGd6bkFnWWNzQXZOQTQwblBZTFN2WHRVdGFVcXI2MWxnQno3MCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi92ZXItdXN1YXJpb3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1736390753);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `letra` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposelementos`
--

CREATE TABLE `tiposelementos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposmaquinas`
--

CREATE TABLE `tiposmaquinas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposproductos`
--

CREATE TABLE `tiposproductos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `contacto` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `estadoId` bigint(20) UNSIGNED DEFAULT NULL,
  `rolId` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `email_verified_at`, `contacto`, `password`, `remember_token`, `estadoId`, `rolId`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, '3132800855', '$2y$12$nyOc3ymCo/UhhkENNMtoieeYD20KwVdOY7ZF9MG4hgFX8oYqCFBTq', 'FsKpnFK8Aq5cMiv8y1wjPar2R3M6CnEl0fpYUpNx0allkn7gGn2syb8K5TGb', 1, 1, '2025-01-01 00:06:47', '2025-01-01 00:06:47'),
(1141715255, 'Daniela', 'Manrique', 'daniela_manrique@soy.sena.edu.co', NULL, '3197417217', '$2y$12$MHa4My555zbvnM7nWIwWNuhSxwPq/zyZxsBwf/YVqEVqfZ7KP3WRy', NULL, 1, 1, '2025-01-09 07:40:47', '2025-01-09 07:45:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compras_proveedornit_foreign` (`proveedorNit`);

--
-- Indices de la tabla `detallecompras`
--
ALTER TABLE `detallecompras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detallecompras_compraid_foreign` (`compraId`),
  ADD KEY `detallecompras_elementocodigo_foreign` (`elementoCodigo`);

--
-- Indices de la tabla `detalleentradas`
--
ALTER TABLE `detalleentradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalleentradas_entradaid_foreign` (`entradaId`),
  ADD KEY `detalleentradas_productocodigo_foreign` (`productoCodigo`);

--
-- Indices de la tabla `detalleprestamos`
--
ALTER TABLE `detalleprestamos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalleprestamos_prestamoid_foreign` (`prestamoId`),
  ADD KEY `detalleprestamos_elementocodigo_foreign` (`elementoCodigo`);

--
-- Indices de la tabla `detallesalidas`
--
ALTER TABLE `detallesalidas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detallesalidas_salidaid_foreign` (`salidaId`),
  ADD KEY `detallesalidas_productocodigo_foreign` (`productoCodigo`);

--
-- Indices de la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `elementos_colorid_foreign` (`colorId`),
  ADD KEY `elementos_tipoelementoid_foreign` (`tipoElementoId`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entradas_usuarioid_foreign` (`usuarioId`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `iniciossesion`
--
ALTER TABLE `iniciossesion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iniciossesion_usuarioid_foreign` (`usuarioId`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mantenimientomaquinas`
--
ALTER TABLE `mantenimientomaquinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mantenimientomaquinas_serialid_foreign` (`serialId`),
  ADD KEY `mantenimientomaquinas_usuarioid_foreign` (`usuarioId`),
  ADD KEY `mantenimientomaquinas_estadoid_foreign` (`estadoId`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `maquinas_marcaid_foreign` (`marcaId`),
  ADD KEY `maquinas_tiposmaquinasid_foreign` (`tiposMaquinasId`),
  ADD KEY `maquinas_estadoid_foreign` (`estadoId`),
  ADD KEY `maquinas_proveedornit_foreign` (`proveedorNit`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prestamos_usuarioid_foreign` (`usuarioId`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `productos_tallaid_foreign` (`tallaId`),
  ADD KEY `productos_colorid_foreign` (`colorId`),
  ADD KEY `productos_tipoproductoid_foreign` (`tipoProductoId`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`nit`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiposelementos`
--
ALTER TABLE `tiposelementos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiposmaquinas`
--
ALTER TABLE `tiposmaquinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiposproductos`
--
ALTER TABLE `tiposproductos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_email_unique` (`email`),
  ADD KEY `usuarios_estadoid_foreign` (`estadoId`),
  ADD KEY `usuarios_rolid_foreign` (`rolId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallecompras`
--
ALTER TABLE `detallecompras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleentradas`
--
ALTER TABLE `detalleentradas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleprestamos`
--
ALTER TABLE `detalleprestamos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallesalidas`
--
ALTER TABLE `detallesalidas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `iniciossesion`
--
ALTER TABLE `iniciossesion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimientomaquinas`
--
ALTER TABLE `mantenimientomaquinas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiposelementos`
--
ALTER TABLE `tiposelementos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiposmaquinas`
--
ALTER TABLE `tiposmaquinas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiposproductos`
--
ALTER TABLE `tiposproductos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11417152556;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_proveedornit_foreign` FOREIGN KEY (`proveedorNit`) REFERENCES `proveedores` (`nit`) ON DELETE SET NULL;

--
-- Filtros para la tabla `detallecompras`
--
ALTER TABLE `detallecompras`
  ADD CONSTRAINT `detallecompras_compraid_foreign` FOREIGN KEY (`compraId`) REFERENCES `compras` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `detallecompras_elementocodigo_foreign` FOREIGN KEY (`elementoCodigo`) REFERENCES `elementos` (`codigo`) ON DELETE SET NULL;

--
-- Filtros para la tabla `detalleentradas`
--
ALTER TABLE `detalleentradas`
  ADD CONSTRAINT `detalleentradas_entradaid_foreign` FOREIGN KEY (`entradaId`) REFERENCES `entradas` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `detalleentradas_productocodigo_foreign` FOREIGN KEY (`productoCodigo`) REFERENCES `productos` (`codigo`) ON DELETE SET NULL;

--
-- Filtros para la tabla `detalleprestamos`
--
ALTER TABLE `detalleprestamos`
  ADD CONSTRAINT `detalleprestamos_elementocodigo_foreign` FOREIGN KEY (`elementoCodigo`) REFERENCES `elementos` (`codigo`) ON DELETE SET NULL,
  ADD CONSTRAINT `detalleprestamos_prestamoid_foreign` FOREIGN KEY (`prestamoId`) REFERENCES `prestamos` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `detallesalidas`
--
ALTER TABLE `detallesalidas`
  ADD CONSTRAINT `detallesalidas_productocodigo_foreign` FOREIGN KEY (`productoCodigo`) REFERENCES `productos` (`codigo`) ON DELETE SET NULL,
  ADD CONSTRAINT `detallesalidas_salidaid_foreign` FOREIGN KEY (`salidaId`) REFERENCES `salidas` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD CONSTRAINT `elementos_colorid_foreign` FOREIGN KEY (`colorId`) REFERENCES `colores` (`codigo`) ON DELETE SET NULL,
  ADD CONSTRAINT `elementos_tipoelementoid_foreign` FOREIGN KEY (`tipoElementoId`) REFERENCES `tiposelementos` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `entradas_usuarioid_foreign` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `iniciossesion`
--
ALTER TABLE `iniciossesion`
  ADD CONSTRAINT `iniciossesion_usuarioid_foreign` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `mantenimientomaquinas`
--
ALTER TABLE `mantenimientomaquinas`
  ADD CONSTRAINT `mantenimientomaquinas_estadoid_foreign` FOREIGN KEY (`estadoId`) REFERENCES `estados` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `mantenimientomaquinas_serialid_foreign` FOREIGN KEY (`serialId`) REFERENCES `maquinas` (`serial`) ON DELETE SET NULL,
  ADD CONSTRAINT `mantenimientomaquinas_usuarioid_foreign` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `maquinas_estadoid_foreign` FOREIGN KEY (`estadoId`) REFERENCES `estados` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `maquinas_marcaid_foreign` FOREIGN KEY (`marcaId`) REFERENCES `marcas` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `maquinas_proveedornit_foreign` FOREIGN KEY (`proveedorNit`) REFERENCES `proveedores` (`nit`) ON DELETE SET NULL,
  ADD CONSTRAINT `maquinas_tiposmaquinasid_foreign` FOREIGN KEY (`tiposMaquinasId`) REFERENCES `tiposmaquinas` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_usuarioid_foreign` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_colorid_foreign` FOREIGN KEY (`colorId`) REFERENCES `colores` (`codigo`) ON DELETE SET NULL,
  ADD CONSTRAINT `productos_tallaid_foreign` FOREIGN KEY (`tallaId`) REFERENCES `tallas` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `productos_tipoproductoid_foreign` FOREIGN KEY (`tipoProductoId`) REFERENCES `tiposproductos` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_estadoid_foreign` FOREIGN KEY (`estadoId`) REFERENCES `estados` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `usuarios_rolid_foreign` FOREIGN KEY (`rolId`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
