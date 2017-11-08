-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2017 at 02:54 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sahalat`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'tPf97iNBjpypHyyhFSHE0TmgdzdcYEIw', 1, '2016-03-13 15:05:12', '2016-03-13 15:05:12', '2016-03-13 15:05:12'),
(2, 2, '4O7HxmHdDXLLhEL21DoxY8tVs9TLZ4hX', 1, '2016-03-13 15:05:12', '2016-03-13 15:05:12', '2016-03-13 15:05:12'),
(23, 3, 'chdb2kUrImQgiliEt5MX8tTyvMiGBLBe', 1, NULL, '2016-04-03 07:55:47', '2016-04-03 08:16:07'),
(25, 6, '57dzZka4R03hD9jDuHuNOVX5VylRkf74', 1, NULL, '2016-04-03 08:16:49', '2016-04-03 08:16:49'),
(26, 4, 'K89rkP0DWLxLRi3rJKS0XhRRNVX2JIwE', 1, NULL, '2016-04-03 12:41:10', '2016-04-03 12:41:10'),
(30, 10, 'ksg4G06PGLF3NnfEVW5JJpGfm0fUZLqn', 1, NULL, '2016-04-26 13:53:03', '2016-04-26 13:55:34'),
(31, 11, 'ZYHjAxNlKVz0e6G8KZTOXctzn9Xb6gSt', 1, NULL, '2016-04-27 12:49:08', '2016-04-27 12:49:08'),
(32, 12, 'djXW7VAbp6KE8pqLKYjqlmc6rJwmMUTC', 1, NULL, '2016-04-27 12:55:37', '2016-04-27 12:56:07'),
(33, 13, 'JL7avcoawOAvQ5Mr0V5lCPxSaMP17Mpl', 1, '2016-05-01 13:01:21', '2016-05-01 13:01:21', '2016-05-01 13:01:21'),
(35, 15, 'InxZVzKaU3ISzvLlpGJGHPMqcn4YCfr8', 1, '2016-05-01 13:04:34', '2016-05-01 13:04:34', '2016-05-01 13:04:34'),
(37, 16, 'Xo7d8vAk19k83eA2oUO76CTvQ7OtpqQh', 1, '2016-05-01 13:05:12', '2016-05-01 13:05:12', '2016-05-01 13:05:12'),
(39, 17, 'dBtdr8fpNtuGxJcEbPuNoiBXelOOD0cu', 1, '2016-05-01 13:11:23', '2016-05-01 13:11:23', '2016-05-01 13:11:23'),
(41, 18, 'gu5JQSd9ly0QPKu9MF2nCScxcO5uwGqw', 1, '2016-05-01 13:12:22', '2016-05-01 13:12:22', '2016-05-01 13:12:22'),
(43, 19, 'e8s2ZTZWQlJ7m3x86Dg3S8SWQlhmyFXs', 1, '2016-05-01 13:14:07', '2016-05-01 13:14:07', '2016-05-01 13:14:07'),
(45, 20, 'r4zLDah67AznM1zkVRhob3gNYb8XWwGj', 1, '2016-05-01 13:17:20', '2016-05-01 13:17:20', '2016-05-01 13:17:20'),
(47, 21, 'jZeoeqMEnecZbMhH0g9EcoMzZI2w12Nx', 1, '2016-05-01 13:22:34', '2016-05-01 13:22:34', '2016-05-01 13:22:34'),
(48, 22, 'Yd0eGosRjJYuJ9lHy4ctna7MAK39BSKP', 1, '2016-05-01 13:28:23', '2016-05-01 13:28:23', '2016-05-01 13:28:23'),
(49, 23, 'X7qlgmI7cob0pdXqr2f1o3qFj3zEFjOr', 1, '2016-05-01 13:28:54', '2016-05-01 13:28:54', '2016-05-01 13:28:54'),
(50, 24, 'U5FhTJHWeqZamLA4qIvinrRY0sL9mPHj', 1, '2016-05-01 13:29:13', '2016-05-01 13:29:13', '2016-05-01 13:29:13'),
(51, 25, 'uRUR8Q3XvmqnRqvmJm69qFbBhAPdEBCP', 1, '2016-05-01 13:33:39', '2016-05-01 13:33:39', '2016-05-01 13:33:39'),
(52, 26, 'cN1jWNfLjxDQWz9rLMkYwEtEFYp3LLeW', 1, '2016-05-01 13:35:54', '2016-05-01 13:35:54', '2016-05-01 13:35:54'),
(53, 27, 'xgwqIvjLxKELsidSPg0uM2sNa3zw4lvw', 1, '2016-05-01 13:46:24', '2016-05-01 13:46:24', '2016-05-01 13:46:24'),
(54, 28, 'fzq00Yn0KhGlDPWjiv7HMdm4hmVjANkV', 1, '2016-05-01 13:46:55', '2016-05-01 13:46:55', '2016-05-01 13:46:55'),
(55, 29, 'iYF6ubSG8fyz5NniBLInUg1lF7KHXf60', 1, '2016-05-01 13:48:29', '2016-05-01 13:48:29', '2016-05-01 13:48:29'),
(56, 30, 'l3PtmrpdwumRMeQRgaHBFF3S4YWRzJw2', 1, '2016-05-01 13:49:41', '2016-05-01 13:49:41', '2016-05-01 13:49:41'),
(57, 31, 'iXcg1CGDz0xpI79gVLBL7Wzox7a2JTqD', 1, '2016-05-01 13:49:57', '2016-05-01 13:49:57', '2016-05-01 13:49:57'),
(58, 33, 'DDTR4RWYbZbyofng0arphVdxtLiuCYAX', 1, '2016-05-01 13:50:38', '2016-05-01 13:50:38', '2016-05-01 13:50:38'),
(59, 34, 'CJyqUWfRqnw8m5IvjnkHH9X184x0f23m', 1, '2016-05-01 13:50:47', '2016-05-01 13:50:47', '2016-05-01 13:50:47'),
(60, 35, 'U3JoFYSltvlcPjSxoICUDq8539XvrDZr', 1, '2016-05-01 13:53:10', '2016-05-01 13:53:10', '2016-05-01 13:53:10'),
(61, 36, '8y3UDBBZ9XM1mKNfDqxYnM3yWzzfqToF', 1, '2016-05-01 13:53:16', '2016-05-01 13:53:16', '2016-05-01 13:53:16'),
(62, 37, '2uwyRggW8K149vkNmv85o4k48XpgiR7N', 1, '2016-05-01 13:53:24', '2016-05-01 13:53:24', '2016-05-01 13:53:25'),
(63, 38, '8OF6m4azklbXjFj3urnIuQQn6DOLbiBq', 1, '2016-05-01 14:02:28', '2016-05-01 14:02:28', '2016-05-01 14:02:28'),
(64, 39, 'EZEv82huie3moSmcqqMIax6iln5eJ8BH', 1, '2016-05-01 14:07:24', '2016-05-01 14:07:24', '2016-05-01 14:07:24'),
(65, 40, 'TvbzBY6gqenH5UEgbWrXEG1Axk2urAIy', 1, '2016-05-01 14:10:48', '2016-05-01 14:10:48', '2016-05-01 14:10:48'),
(66, 41, 'RtXiCeIVz09ytzStqY023by18zB6BOhb', 1, '2016-05-01 14:14:07', '2016-05-01 14:14:07', '2016-05-01 14:14:07'),
(67, 43, 'eTA27Hi37t5mWSl3Ka3e3a31NcPe5Rl3', 1, '2016-05-01 14:14:43', '2016-05-01 14:14:43', '2016-05-01 14:14:43'),
(68, 44, '77WN0Sh66exXZ4E54rPcRYPrr0KpG1OA', 1, '2016-05-01 14:17:26', '2016-05-01 14:17:26', '2016-05-01 14:17:26'),
(70, 45, 'uTRb0VX8JahSgMvxWUu7fzkWoBH7Lycs', 1, NULL, '2016-05-09 13:23:05', '2016-05-09 13:27:00'),
(71, 45, 'wrs1fyC19FkKjrpvbgCJtC0ctjiUsxO4', 1, NULL, '2016-05-09 13:23:43', '2016-05-09 13:27:00'),
(72, 45, 'JiUXEkVNrWDJtlpjNAwQz21gbdIEQwb6', 1, NULL, '2016-05-09 13:24:05', '2016-05-09 13:27:00'),
(73, 45, 'gWuhzk8QyEB0X8GEYf9NGbR6esvHHMjQ', 1, NULL, '2016-05-09 13:24:10', '2016-05-09 13:27:00'),
(74, 45, 'Xv1uHKiw6b6Y6X1WBTPf73OQGubT7PU1', 1, NULL, '2016-05-09 13:26:08', '2016-05-09 13:27:00'),
(75, 45, '0P46UgZnXMMjBfVGbfxuBxyUEEMaN5I2', 1, NULL, '2016-05-09 13:27:00', '2016-05-09 13:27:00'),
(76, 5, 'x3heK3iakXcXlZF4Xk989NazxUZlB7Qr', 1, NULL, '2016-05-09 13:30:32', '2016-05-10 08:02:59'),
(80, 5, 'jpnafXF4sQiWF3Yo8G8tG43WilQnoRSs', 1, NULL, '2016-05-10 07:40:20', '2016-05-10 08:02:59'),
(81, 5, 'PH8aZpg0qdOCl6zepqnCVYJQrSxRMKHH', 1, NULL, '2016-05-10 07:40:56', '2016-05-10 08:02:59'),
(82, 5, 'POcB9yg27dHcXxpcGRp7pGShvamZ0QC4', 1, NULL, '2016-05-10 07:42:06', '2016-05-10 08:02:59'),
(83, 5, 'EQQQWRy6cCMj1y5SyZnGq2nO8HqkRCkg', 1, NULL, '2016-05-10 07:42:13', '2016-05-10 08:02:59'),
(84, 5, 'sRlYuLe6tKqteVqizO1jgyXh7YePOXr3', 1, NULL, '2016-05-10 07:42:43', '2016-05-10 08:02:59'),
(85, 5, 'uguqiwaqkHArF11sjiNBfJwVYGPnHX0A', 1, NULL, '2016-05-10 07:42:50', '2016-05-10 08:02:59'),
(86, 5, '4dawz9kr7raOCRSGsF7YdFANR91OvJJS', 1, NULL, '2016-05-10 07:51:52', '2016-05-10 08:02:59'),
(87, 5, '5sxywo700I4oqTaAd3iKw0E2qEjFryiV', 1, NULL, '2016-05-10 08:02:59', '2016-05-10 08:02:59'),
(98, 56, 'XfYSBKjmBD7Ec4OFWYowrTsVrl1pfTcx', 1, '2016-05-10 11:17:02', '2016-05-10 11:16:41', '2016-05-10 11:17:02'),
(99, 57, 'uUm4a9wADTtMtNisGzMgVQZ0V6nLL70h', 1, '2016-05-10 11:21:37', '2016-05-10 11:21:28', '2016-05-10 11:21:37'),
(100, 58, '6ZjLlnSSJF73I4LLIQLMjYNNqSFyVMJD', 1, '2016-05-10 11:24:31', '2016-05-10 11:24:26', '2016-05-10 11:24:31'),
(101, 59, 'x9mugFlJyzVLjhBDMKfkGXw1w1a70ZoA', 1, '2016-05-10 11:40:07', '2016-05-10 11:39:27', '2016-05-10 11:40:07'),
(102, 60, 'ScFgUNVZynEA7BGbAd7WkwDpmjV86P1r', 1, '2016-05-10 12:00:58', '2016-05-10 11:59:33', '2016-05-10 12:00:58'),
(103, 60, 'bOhFo8rWZ0i15ZKZzC4dDl7J6q6JrTXh', 1, '2016-05-10 12:02:03', '2016-05-10 12:01:42', '2016-05-10 12:02:03'),
(104, 60, '1EM3JYVSW4vytTf6qKeCbRXUeXAvn6bl', 1, '2016-05-10 12:12:18', '2016-05-10 12:02:48', '2016-05-10 12:12:18'),
(116, 60, 'eOHrp2koznt9hn7ge6NNU2BgKcvTu4m3', 1, '2016-05-10 12:14:22', '2016-05-10 12:14:10', '2016-05-10 12:14:22'),
(118, 62, '34pbdVIYpKmxvRTMljIDwKVFwWqLM8mt', 1, '2016-05-10 12:17:35', '2016-05-10 12:17:20', '2016-05-10 12:17:35'),
(120, 64, 'fyw73k63hp6oYd0vABNFAn0lrvJ35w9M', 1, NULL, '2016-05-24 08:38:45', '2016-05-24 08:44:09'),
(125, 69, 'TUsfohei0PSGpv7MmPD4WES9BX120Kqq', 1, '2016-05-29 11:37:44', '2016-05-29 11:33:21', '2016-05-29 11:37:44'),
(128, 72, '6M6iQ2QfDwEMWhPtc0QR4w4Fz1yyf82d', 1, '2016-06-12 12:37:46', '2016-06-12 12:37:46', '2016-06-12 12:37:46'),
(129, 73, 'U5vlzNBZdYVeLw6gIiE8tkNkeqL8tU3w', 1, '2016-06-12 12:46:27', '2016-06-12 12:46:27', '2016-06-12 12:46:27'),
(130, 74, 'iHXJ6mn79U2onVb7dmWdle8m2Zgehbnh', 1, '2016-06-12 12:53:44', '2016-06-12 12:53:44', '2016-06-12 12:53:44'),
(131, 75, 'bc7fvcDm2DoDFfe22sp8VmOSNndjVA2F', 1, '2016-06-13 08:59:23', '2016-06-13 08:59:23', '2016-06-13 08:59:23'),
(132, 76, 'j71eRD7aCsLqC8WSDEzPZU7em7NQeUld', 1, '2016-07-04 12:40:10', '2016-07-04 12:40:10', '2016-07-04 12:40:10'),
(133, 77, 'dFq3fmww1UUSd2mpGsqlgb1Psv6VgrXg', 1, '2016-07-04 12:57:23', '2016-07-04 12:57:23', '2016-07-04 12:57:23'),
(134, 76, '5uYLkdC5YVEsVWlTfvLP2HgKEQm3g3fP', 1, '2016-12-27 12:38:50', '2016-12-27 12:38:50', '2016-12-27 12:38:50'),
(135, 71, 'dBQWDYKSVBRAQT0wo0VkDKFiud244Paz', 1, NULL, '2017-01-03 10:40:18', '2017-01-03 10:40:18'),
(136, 70, 'Q6rTcjEEk3q56MtdZVhiYG1FfTN0giBb', 1, NULL, '2017-01-03 10:45:30', '2017-01-03 10:45:30'),
(137, 68, 'wtcbpSv7h1zA36jrIkOuenJF5mRhxeL0', 1, NULL, '2017-01-03 11:12:01', '2017-01-03 11:12:01'),
(138, 77, 'WJsOOtOGwC8jDmrrhMkV8M7S1ih2hjEX', 1, '2017-03-22 03:59:04', '2017-03-22 03:59:04', '2017-03-22 03:59:04'),
(139, 78, '0Uz4S5jyRmRWYukKZsw3Yw5jblsp1cgn', 1, '2017-03-22 21:43:26', '2017-03-22 21:43:26', '2017-03-22 21:43:26'),
(140, 79, '5Xr87r2OzNQIoiQrMwUOM5MkAsQSk1yi', 1, '2017-03-22 21:54:59', '2017-03-22 21:54:59', '2017-03-22 21:54:59'),
(141, 80, 'RYxgasRve41DM8s6mhOS3PPCXnRgRTy2', 1, '2017-03-22 21:55:47', '2017-03-22 21:55:47', '2017-03-22 21:55:47'),
(142, 81, 'SjBZa3jgXtrysKb3gSQbdkxD9wbmxmtW', 1, '2017-03-22 21:58:12', '2017-03-22 21:58:12', '2017-03-22 21:58:12'),
(143, 82, 'nucioEkxUEoXR6OclmMyOhGgFclU3M5L', 1, '2017-05-20 12:18:06', '2017-05-20 12:18:06', '2017-05-20 12:18:06'),
(144, 89, 'CFlWDVoLtA3t6IhXwVUs4qqk3yR8Mt29', 1, '2017-05-22 09:22:12', '2017-05-22 09:22:12', '2017-05-22 09:22:12'),
(145, 90, 'QOP3ICrzIWfqX1UklmheshfwnnPOxJH7', 1, '2017-05-23 04:55:32', '2017-05-23 04:55:32', '2017-05-23 04:55:32'),
(146, 91, '2vUHtW1GViGgVIpmrq93s4niCagOG0lZ', 1, '2017-05-23 04:57:03', '2017-05-23 04:57:03', '2017-05-23 04:57:03'),
(147, 92, 'd1O7Y0YZlIuM9zC9O7bZrEaPoJ4qcTAZ', 1, '2017-05-23 04:58:10', '2017-05-23 04:58:10', '2017-05-23 04:58:10'),
(148, 93, 'loKY7uWSOQwtM1yuAHAU9byWreAbyZ1y', 1, '2017-05-26 13:40:50', '2017-05-26 13:40:50', '2017-05-26 13:40:50'),
(149, 94, 'anLMmvo5WHME6rP54BjsevFN4iZuhNnN', 1, '2017-06-03 15:19:33', '2017-06-03 15:19:33', '2017-06-03 15:19:33'),
(150, 95, '24paPJ7Tk4M7wnnGwadv6r7njlGOM8ro', 1, '2017-06-03 17:41:35', '2017-06-03 17:41:35', '2017-06-03 17:41:35'),
(151, 96, 'qex2G3hIG6SfEyDIcX0bqeuNhAktACdl', 1, '2017-06-06 06:39:22', '2017-06-06 06:39:22', '2017-06-06 06:39:22'),
(153, 97, 'TY7rOfvkqB1XC9sLlOiMLtSo4mdJOTVj', 1, '2017-06-07 09:39:51', '2017-06-07 09:39:51', '2017-06-07 09:39:51'),
(154, 98, '5XfshfSLacxUOuECANEKXGWYsUmW9qjm', 1, '2017-06-07 10:04:00', '2017-06-07 10:04:00', '2017-06-07 10:04:00'),
(155, 99, 'RjZ9ElDLhh8wMdklRXwROhu0FxJmh3Ad', 1, '2017-06-07 10:05:27', '2017-06-07 10:05:27', '2017-06-07 10:05:27'),
(156, 100, '9JLz6N3Bo2TgsaYEEeVAWK6XxDqJTlKi', 1, '2017-06-08 06:34:31', '2017-06-08 06:34:31', '2017-06-08 06:34:31'),
(157, 101, 'LBzlZtY45pUKycqZfRnV1eKPN7upMPyq', 1, '2017-06-11 06:41:14', '2017-06-11 06:41:14', '2017-06-11 06:41:14'),
(158, 102, '7ZqXfnHgbw2CWqeo8IYJlRQAAvbgjECA', 1, '2017-06-11 07:58:45', '2017-06-11 07:58:45', '2017-06-11 07:58:45'),
(159, 103, 'okDLtD72yiCRRdWONtRzwdPhoD1q8ORl', 1, '2017-06-11 10:41:58', '2017-06-11 10:41:58', '2017-06-11 10:41:58'),
(160, 104, '6Krnaad3iZp7WKjB99hGBmXs0pOd0azp', 1, '2017-06-15 06:45:35', '2017-06-15 06:45:35', '2017-06-15 06:45:35'),
(161, 105, 't7SfjCSIEG8aUNHXDSiw6AS1a7skH5A6', 1, '2017-06-15 20:49:29', '2017-06-15 20:49:29', '2017-06-15 20:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `paci_number` varchar(20) DEFAULT NULL,
  `block` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `judda` varchar(255) DEFAULT NULL,
  `avenue` varchar(255) DEFAULT NULL,
  `building` varchar(255) DEFAULT NULL,
  `floor` varchar(255) DEFAULT NULL,
  `apartment_number` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `directions` varchar(255) DEFAULT NULL,
  `default` int(11) DEFAULT NULL,
  `notification` int(11) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `users_id`, `area_id`, `name`, `type`, `first_name`, `last_name`, `paci_number`, `block`, `street`, `judda`, `avenue`, `building`, `floor`, `apartment_number`, `mobile`, `phone`, `long`, `lat`, `directions`, `default`, `notification`, `created_at`, `updated_at`) VALUES
(1, 82, 4, 'second address', 1, 'taylor', 'successor', '234', 'block', 'sdf', 'sdf', 'sdf', 'building', 'floor', 'sfg', '3454353', '345345', '35.90153503', '31.91148692', 'sdfg', 1, 0, '2017-05-20 15:54:17', '2017-05-26 17:33:21'),
(2, 0, 3, 'city address', 0, 'asdf', 'ksjdf', 'asdf', 'lkjsdf', 'lkjdsf', NULL, 'kjldsf', 'lk', 'lkj', 'lkj', 'sdkfj', 'jksdf', '35.91526794', '31.91265266', '', NULL, NULL, '2017-05-22 10:50:54', '2017-05-22 10:50:54'),
(3, 0, 3, 'ksdjf', 0, 'admin', 'adin', 'sdklfj', 'kjsdf', 'klsjdf', NULL, 'kjdfs', 'jklsdf', 'lkjsdf', 'lkjkjsdf', '234324', '234234', '35.92556762', '31.91381837', 'kjfsdf', NULL, NULL, '2017-05-22 11:15:58', '2017-05-22 11:15:58'),
(4, 89, 3, 'yousif', 0, 'aslkdfj', 'skldfj', 'skdflj', 'slkjdf', 'kljsdf', NULL, 'kjlsdf', 'kljdsf', 'kljsdf', 'lkjsdf', '23443', '234', '35.93380737', '31.92897136', 'slkdfj', NULL, NULL, '2017-05-22 12:22:12', '2017-05-22 12:22:12'),
(5, 92, 3, 'vacation address ', 0, 'rrrrrr', 'rrrrrr', 'rrrrrr', 'rrrrrr', 'rrrrrr', NULL, 'rrrrrr', 'rrrrrr', 'rrrrrr', 'rrrrrr', '34534345', '3534534', '35.94136047', '31.94179116', 'sddddddddddddd', NULL, NULL, '2017-05-23 07:58:10', '2017-05-23 07:58:10'),
(6, 82, 5, 'home address', 0, NULL, NULL, '', '23', 'sdf', NULL, 'sdf', 'sdfg', 'sdfg', 'sfg', '', '', '35.94410705', '31.96393025', 'sdfg', NULL, NULL, '2017-05-23 19:48:24', '2017-05-26 17:06:10'),
(7, 82, 5, 'third address', NULL, NULL, NULL, NULL, '23', 'sdf', NULL, 'sdf', 'sdfg', 'sdfg', 'sfg', NULL, NULL, '35.95646667', '31.94645247', 'sdfg', NULL, NULL, '2017-05-23 19:49:11', '2017-05-23 19:54:59'),
(8, 93, 3, 'last address', 0, 'sdf', 'sdf', 'sdf', 'sfd', 'sdf', NULL, 'safd', 'asfd', 'sg', 'sadf', '234', '24234', '35.94960022', '31.96626037', 'sdf', NULL, NULL, '2017-05-26 16:40:50', '2017-05-26 16:40:50'),
(9, 82, 3, 'address2', 1, NULL, NULL, 'sfsdf', 'jkj', 'lkjlk', NULL, 'jlkj', 'lkj', 'lkjl', 'kjkjl', '876876', '67868', '35.91732788', '31.95227876', 'hgjh', NULL, NULL, '2017-05-26 17:41:43', '2017-05-26 17:41:43'),
(10, 82, 3, 'sdfgs', 1, NULL, NULL, 'sfsdf', 'jkj', 'lkjlk', NULL, 'jlkj', 'lkj', 'lkjl', 'kjkjl', '876876', '67868', '35.90153503', '31.96334771', 'hgjh', NULL, NULL, '2017-05-26 20:45:42', '2017-05-26 20:45:42'),
(11, 82, 3, 'address 1', 1, NULL, NULL, 'sfsdf', 'jkj', 'lkjlk', NULL, 'jlkj', 'lkj', 'lkjl', 'kjkjl', '876876', '67868', '35.88642883', '31.95402658', 'hgjh', NULL, NULL, '2017-05-26 21:26:23', '2017-05-26 21:26:23'),
(12, 82, 3, 'demo 1', 1, NULL, NULL, 'sfsdf', 'jkj', 'lkjlk', NULL, 'jlkj', 'lkj', 'lkjl', 'kjkjl', '876876', '67868', '35.89741516', '31.93305058', 'hgjh', NULL, NULL, '2017-05-26 21:27:00', '2017-05-26 21:27:00'),
(13, 82, 3, 'address now', 1, NULL, NULL, 'sfsdf', 'jkj', 'lkjlk', NULL, 'jlkj', 'lkj', 'lkjl', 'kjkjl', '876876', '67868', '35.90192557', '31.9590672', 'hgjh', NULL, NULL, '2017-05-26 21:27:25', '2017-05-26 21:27:25'),
(14, 82, 3, 'new address', 1, NULL, NULL, 'sfsdf', 'jkj', 'lkjlk', NULL, 'jlkj', 'lkj', 'lkjl', 'kjkjl', '876876', '67868', '35.90261221', '31.96256254', 'hgjh', NULL, NULL, '2017-05-26 21:28:08', '2017-06-03 17:33:31'),
(15, 95, 3, 'demo', 0, NULL, NULL, 'dsf', 'dsf', 'hkjh', NULL, 'hk', 'jhj', 'hjh', 'hkjh', '976', '8768768', '35.90947867', '31.95498913', 'dsf', NULL, NULL, '2017-06-03 21:06:16', '2017-06-03 21:06:16'),
(16, 95, 3, 'demo', 0, NULL, NULL, 'dsf', 'dsf', 'hkjh', NULL, 'hk', 'jhj', 'hjh', 'hkjh', '976', '8768768', '35.91085196', '31.96197999', 'dsf', NULL, NULL, '2017-06-03 21:06:46', '2017-06-03 21:06:46'),
(17, 82, 3, 'salim address', 1, NULL, NULL, 'sfsdf', 'jkj', 'lkjlk', NULL, 'jlkj', 'lkj', 'lkjl', 'kjkjl', '876876', '67868', '35.91840506', '31.98178455', 'hgjh', NULL, NULL, '2017-06-07 13:43:22', '2017-06-07 13:43:22'),
(18, 82, 3, 'shamiya address', 1, NULL, NULL, 'sfsdf', 'jkj', 'lkjlk', NULL, 'jlkj', 'lkj', 'lkjl', 'kjkjl', '876876', '67868', '35.90055228', '31.97945482', 'hgjh', NULL, NULL, '2017-06-07 20:10:22', '2017-06-07 20:10:22'),
(19, 82, 7, 'shamiya address', 1, NULL, NULL, 'sfsdf', 'jkj', 'lkjlk', NULL, 'jlkj', 'lkj', 'lkjl', 'kjkjl', '876876', '67868', '35.89437247', '31.98586143', 'hgjh', NULL, NULL, '2017-06-07 20:10:56', '2017-06-07 20:10:56'),
(20, 82, 6, 'khaldiya address', 1, NULL, NULL, 'sfsdf', 'jkj', 'lkjlk', NULL, 'jlkj', 'lkj', 'lkjl', 'kjkjl', '876876', '67868', '35.88063956', '31.98586143', 'hgjh', NULL, NULL, '2017-06-07 20:33:52', '2017-06-07 20:33:52'),
(23, 82, 4, 'kuwait city address', 1, NULL, NULL, 'sfsdf', 'jkj', 'lkjlk', NULL, 'jlkj', 'lkj', 'lkjl', 'kjkjl', '876876', '67868', '35.86141348', '31.97013533', 'hgjh', NULL, NULL, '2017-06-07 20:59:35', '2017-06-07 20:59:35'),
(26, 82, 5, 'kaifan address', 1, NULL, NULL, 'sfsdf', 'jkj', 'lkjlk', NULL, 'jlkj', 'lkj', 'lkjl', 'kjkjl', '876876', '67868', '35.83669424', '31.95557172', 'hgjh', NULL, NULL, '2017-06-07 21:15:22', '2017-06-07 21:15:22'),
(27, 82, 3, 'shuwaikh address', 1, NULL, NULL, 'sfsdf', 'jkj', 'lkjlk', NULL, 'jlkj', 'lkj', 'lkjl', 'kjkjl', '876876', '67868', '35.8661521', '31.9589647', 'hgjh', NULL, NULL, '2017-06-07 21:22:22', '2017-06-07 21:22:22'),
(28, 91, 5, 'كيفان أدرس ', 0, 'sd', 'vdsfv', '2424', 'المجمع', 'الشارع', 'sdc', 'الجادة', 'البناء', 'الطابق', '43', '28472394', '28492834', '47.97720868786621', '29.27966221534416', 'إضافي', 0, 0, '2017-06-15 09:50:57', '2017-06-15 22:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `governorate_id` int(11) NOT NULL,
  `description_en` varchar(255) DEFAULT NULL,
  `description_ar` varchar(255) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name_en`, `name_ar`, `governorate_id`, `description_en`, `description_ar`, `created_at`, `updated_at`) VALUES
(3, 'Shuwaikh', 'الشويكة', 3, 'Shuwaikh area', 'منطقة الشويكة', '2017-05-19 13:39:11', '2017-06-07 16:18:14'),
(4, 'Kuwait City', 'مدينة الكويت', 4, 'Kuwait City area', 'مدينة الكويت', '2017-05-19 13:40:00', '2017-06-07 16:21:23'),
(5, 'Kaifan', 'كيفان', 4, 'Kaifan area', 'منطقة كيفان', '2017-05-19 13:41:17', '2017-06-07 16:19:52'),
(6, 'Khaldiya', 'الخالدية', 3, 'Khaldiya area', 'منطقة الخالدية', '2017-06-07 16:22:21', '2017-06-07 16:22:21'),
(7, 'Shamiya', 'شامية', 3, 'Shamiya area', 'منطقة الشامية', '2017-06-07 16:35:15', '2017-06-07 16:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `audit_track`
--

CREATE TABLE `audit_track` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `action` varchar(255) DEFAULT NULL,
  `users_name` varchar(100) DEFAULT NULL,
  `users_role` varchar(100) DEFAULT NULL,
  `description` text,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `audit_track`
--

INSERT INTO `audit_track` (`id`, `users_id`, `action`, `users_name`, `users_role`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'addAddress', 'dddd', 'dddd', '{\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"users_id\":\"13\",\"area_id\":\"3\",\"name\":\"sd\",\"type\":\"0\",\"first_name\":\"oijo\",\"last_name\":\"ijoi\",\"pacl_number\":\"joijoi\",\"block\":\"joij\",\"street\":\"oijoi\",\"judda\":\"joi\",\"avenue\":\"jo\",\"building\":\"ijo\",\"floor\":\"ijoi\",\"apartment_number\":\"joi\",\"mobile\":\"jo\",\"phone\":\"ijoi\",\"long\":\"joijo\",\"lat\":\"ijo\",\"directions\":\"ijoj\",\"default\":\"0\",\"notification\":\"0\"}', '2017-06-15 22:28:39', '2017-06-15 22:28:39'),
(2, 82, 'Delete Address', 'taylor successor', 'Admin . Client . ', '{\"id\":29,\"users_id\":13,\"area_id\":3,\"name\":\"sd\",\"type\":0,\"first_name\":\"oijo\",\"last_name\":\"ijoi\",\"paci_number\":null,\"block\":\"joij\",\"street\":\"oijoi\",\"judda\":\"joi\",\"avenue\":\"jo\",\"building\":\"ijo\",\"floor\":\"ijoi\",\"apartment_number\":\"joi\",\"mobile\":\"jo\",\"phone\":\"ijoi\",\"long\":\"joijo\",\"lat\":\"ijo\",\"directions\":\"ijoj\",\"default\":0,\"notification\":0,\"created_at\":\"2017-06-15 22:28:39\",\"updated_at\":\"2017-06-15 22:28:39\"}', '2017-06-15 22:41:15', '2017-06-15 22:41:15'),
(3, 82, 'Update Address', 'taylor successor', 'Admin . Client . ', '{\"_method\":\"PATCH\",\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"users_id\":\"91\",\"area_id\":\"5\",\"name\":\"\\u0643\\u064a\\u0641\\u0627\\u0646 \\u0623\\u062f\\u0631\\u0633 \",\"type\":\"0\",\"first_name\":\"sd\",\"last_name\":\"vdsfv\",\"pacl_number\":\"\",\"block\":\"\\u0627\\u0644\\u0645\\u062c\\u0645\\u0639\",\"street\":\"\\u0627\\u0644\\u0634\\u0627\\u0631\\u0639\",\"judda\":\"sdc\",\"avenue\":\"\\u0627\\u0644\\u062c\\u0627\\u062f\\u0629\",\"building\":\"\\u0627\\u0644\\u0628\\u0646\\u0627\\u0621\",\"floor\":\"\\u0627\\u0644\\u0637\\u0627\\u0628\\u0642\",\"apartment_number\":\"43\",\"mobile\":\"28472394\",\"phone\":\"28492834\",\"long\":\"47.97720868786621\",\"lat\":\"29.27966221534416\",\"directions\":\"\\u0625\\u0636\\u0627\\u0641\\u064a\",\"default\":\"0\",\"notification\":\"0\"}', '2017-06-15 22:43:26', '2017-06-15 22:43:26'),
(4, 82, 'Add Area', 'taylor successor', 'Admin . Client . ', '{\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"name_en\":\"area\",\"name_ar\":\"area\",\"governorate_id\":\"3\",\"description_en\":\"hjb\",\"description_ar\":\"hgvy\"}', '2017-06-15 23:12:34', '2017-06-15 23:12:34'),
(5, 82, 'Update area', 'taylor successor', 'Admin . Client . ', '{\"_method\":\"PATCH\",\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"name_en\":\"area\",\"name_ar\":\"arean\",\"governorate_id\":\"3\",\"description_en\":\"hjb\",\"description_ar\":\"hgvy\"}', '2017-06-15 23:12:50', '2017-06-15 23:12:50'),
(6, 82, 'Delete Area', 'taylor successor', 'Admin . Client . ', '{\"id\":8,\"name_en\":\"area\",\"name_ar\":\"arean\",\"governorate_id\":3,\"description_en\":\"hjb\",\"description_ar\":\"hgvy\",\"created_at\":\"2017-06-15 23:12:34\",\"updated_at\":\"2017-06-15 23:12:50\"}', '2017-06-15 23:12:59', '2017-06-15 23:12:59'),
(7, 82, 'Add Restaurant', 'taylor successor', 'Admin . Client . ', '{\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"name_en\":\"ohiuo\",\"available_payment\":\"jh\",\"status\":\"0\",\"min_amount\":\"hi\",\"working_hour_from\":\"uh\",\"working_hour_to\":\"ih\",\"deliver_time_from\":\"ih\",\"deliver_time_to\":\"iu\",\"deliver_charge\":\"hiu\",\"rating\":\"h\",\"show_menu\":\"iuh\",\"order_accept_days\":\"iu\",\"offline_order\":\"0\",\"url\":\"uh\",\"img\":\"iuh\",\"commission_type\":\"0\",\"discount_type\":\"0\",\"discount\":\"uh\",\"area_id\":\"3\",\"follow_us\":\"0\",\"notification\":\"0\",\"name_ar\":\"jhi\",\"address_ar\":\"\",\"description_ar\":\"\",\"summary_ar\":\"\",\"Owner_first_name\":\"oijo\",\"Owner_last_name\":\"hoh\",\"email\":\"ih\",\"telephone\":\"ih\",\"address_en\":\"\",\"description_en\":\"\",\"summary_en\":\"\"}', '2017-06-15 23:14:56', '2017-06-15 23:14:56'),
(8, 82, 'Update Restaurant', 'taylor successor', 'Admin . Client . ', '{\"_method\":\"PATCH\",\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"name_en\":\"ohiuo\",\"available_payment\":\"jhj\",\"status\":\"0\",\"min_amount\":\"hi\",\"working_hour_from\":\"uh\",\"working_hour_to\":\"ih\",\"deliver_time_from\":\"ih\",\"deliver_time_to\":\"iu\",\"deliver_charge\":\"hiu\",\"rating\":\"0\",\"show_menu\":\"0\",\"order_accept_days\":\"0\",\"offline_order\":\"0\",\"url\":\"uh\",\"img\":\"iuh\",\"commission_type\":\"0\",\"discount_type\":\"0\",\"discount\":\"uh\",\"area_id\":\"3\",\"follow_us\":\"0\",\"notification\":\"0\",\"name_ar\":\"jhi\",\"address_ar\":\"\",\"description_ar\":\"\",\"summary_ar\":\"\",\"Owner_first_name\":\"oijo\",\"Owner_last_name\":\"hoh\",\"email\":\"ih\",\"telephone\":\"ih\",\"address_en\":\"\",\"description_en\":\"\",\"summary_en\":\"\"}', '2017-06-15 23:15:08', '2017-06-15 23:15:08'),
(9, 82, 'delete restaurant', 'taylor successor', 'Admin . Client . ', '{\"id\":11,\"name_en\":\"ohiuo\",\"name_ar\":\"jhi\",\"Owner_first_name\":\"oijo\",\"Owner_last_name\":\"hoh\",\"email\":\"ih\",\"available_payment\":\"jhj\",\"telephone\":\"ih\",\"address_en\":\"\",\"address_ar\":\"\",\"description_en\":\"\",\"description_ar\":\"\",\"status\":0,\"min_amount\":\"hi\",\"working_hour_from\":\"uh\",\"working_hour_to\":\"ih\",\"deliver_time_from\":\"ih\",\"deliver_time_to\":\"iu\",\"deliver_charge\":\"hiu\",\"rating\":0,\"show_menu\":0,\"order_accept_days\":0,\"offline_order\":0,\"summary_en\":\"\",\"summary_ar\":\"\",\"url\":\"uh\",\"img\":\"iuh\",\"commission_type\":0,\"discount_type\":0,\"discount\":\"uh\",\"area_id\":3,\"follow_us\":0,\"notification\":0,\"long\":\"\",\"lat\":\"\",\"created_at\":\"2017-06-15 23:14:56\",\"updated_at\":\"2017-06-15 23:15:08\"}', '2017-06-15 23:15:18', '2017-06-15 23:15:18'),
(10, 82, 'Add area to restaurant', 'taylor successor', 'Admin . Client . ', '{\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"restaurant_id\":\"3\",\"cuisine_id\":\"1\"}', '2017-06-15 23:16:21', '2017-06-15 23:16:21'),
(11, 82, 'Update restaurant cuisine', 'taylor successor', 'Admin . Client . ', '{\"_method\":\"PATCH\",\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"restaurant_id\":\"3\",\"cuisine_id\":\"1\"}', '2017-06-15 23:16:33', '2017-06-15 23:16:33'),
(12, 82, 'delete restaurant cuisine', 'taylor successor', 'Admin . Client . ', '{\"id\":8,\"restaurant_id\":3,\"cuisine_id\":1}', '2017-06-15 23:16:42', '2017-06-15 23:16:42'),
(13, 82, 'Add Dish', 'taylor successor', 'Admin . Client . ', '{\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"name_en\":\"rec\",\"name_ar\":\"gd\",\"restaurant_id\":\"3\",\"cuisine_id\":\"1\",\"menu_section_id\":\"1\",\"category_id\":\"3\",\"delivery_menu_id\":\"1\",\"parent_id\":\"u\",\"price\":\"gu\",\"quantity\":\"gu\",\"img\":\"\\/files\\/18952_9633res4.jpg\",\"discount\":\"u\",\"available_from\":\"2017-06-15\",\"available_to\":\"2017-06-16\",\"description_en\":\"jhgu\\r\\n\",\"description_ar\":\"uygu\",\"status\":\"0\"}', '2017-06-15 23:17:24', '2017-06-15 23:17:24'),
(14, 82, 'Update Dish', 'taylor successor', 'Admin . Client . ', '{\"_method\":\"PATCH\",\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"name_en\":\"rec\",\"name_ar\":\"gdjh\",\"restaurant_id\":\"3\",\"cuisine_id\":\"1\",\"menu_section_id\":\"1\",\"category_id\":\"3\",\"delivery_menu_id\":\"1\",\"parent_id\":\"0\",\"price\":\"gu\",\"quantity\":\"0\",\"img\":\"\\/files\\/18952_9633res4.jpg\",\"discount\":\"u\",\"available_from\":\"2017-06-15\",\"available_to\":\"2017-06-16\",\"description_en\":\"jhgu\\r\\n\",\"description_ar\":\"uygu\",\"status\":\"0\"}', '2017-06-15 23:17:35', '2017-06-15 23:17:35'),
(15, 82, 'Delete Dish', 'taylor successor', 'Admin . Client . ', '{\"id\":12,\"name_en\":\"rec\",\"name_ar\":\"gdjh\",\"restaurant_id\":3,\"cuisine_id\":1,\"menu_section_id\":1,\"category_id\":3,\"delivery_menu_id\":1,\"parent_id\":0,\"price\":\"gu\",\"quantity\":0,\"img\":\"\\/files\\/18952_9633res4.jpg\",\"discount\":\"u\",\"available_from\":\"2017-06-15\",\"available_to\":\"2017-06-16\",\"description_en\":\"jhgu\\r\\n\",\"description_ar\":\"uygu\",\"status\":0,\"rating\":0,\"created_at\":\"2017-06-15 23:17:24\",\"updated_at\":\"2017-06-15 23:17:35\"}', '2017-06-15 23:17:44', '2017-06-15 23:17:44'),
(16, 82, 'Add Order', 'taylor successor', 'Admin . Client . ', '{\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"users_id\":\"13\",\"restaurant_id\":\"3\",\"area_id\":\"3\",\"address_id\":\"1\",\"deliver_time\":\"23:26\",\"deliver_date\":\"2017-06-15\",\"deliver_charge\":\"\",\"sahalat_charge\":\"\",\"extra_charge\":\"\",\"sub_total\":\"\",\"total\":\"\",\"rate\":\"\",\"point\":\"\",\"status\":\"0\",\"notification\":\"0\",\"note\":\"\"}', '2017-06-15 23:26:07', '2017-06-15 23:26:07'),
(17, 82, 'Update Order', 'taylor successor', 'Admin . Client . ', '{\"_method\":\"PATCH\",\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"users_id\":\"13\",\"restaurant_id\":\"3\",\"area_id\":\"3\",\"address_id\":\"1\",\"deliver_time\":\"23:26\",\"deliver_date\":\"2017-06-15\",\"deliver_charge\":\"\",\"sahalat_charge\":\"0\",\"extra_charge\":\"0\",\"sub_total\":\"0\",\"total\":\"0\",\"rate\":\"0\",\"point\":\"0\",\"status\":\"0\",\"notification\":\"0\",\"note\":\"\"}', '2017-06-15 23:26:30', '2017-06-15 23:26:30'),
(18, 82, 'Delete Order', 'taylor successor', 'Admin . Client . ', '{\"id\":31,\"users_id\":13,\"restaurant_id\":3,\"area_id\":3,\"from_id\":null,\"address_id\":1,\"order_time\":null,\"deliver_time\":\"23:26\",\"expected_time\":\"\",\"deliver_date\":\"2017-06-15\",\"note\":\"\",\"deliver_charge\":\"\",\"sahalat_charge\":0,\"extra_charge\":0,\"sub_total\":0,\"total\":0,\"rate\":0,\"point\":0,\"notification\":0,\"status\":0,\"created_at\":\"2017-06-15 23:26:07\",\"updated_at\":\"2017-06-15 23:26:30\"}', '2017-06-15 23:26:42', '2017-06-15 23:26:42'),
(19, 82, 'Add Cart', 'taylor successor', 'Admin . Client . ', '{\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"users_id\":\"13\",\"restaurant_id\":\"3\",\"dish_id\":\"3\",\"order_id\":\"1\",\"deliver_charge\":\"1\",\"quantity\":\"1\",\"unit_price\":\"1\",\"total_price\":\"1\",\"special_request\":\"x\\r\\n\"}', '2017-06-15 23:27:22', '2017-06-15 23:27:22'),
(20, 82, 'Update Cart', 'taylor successor', 'Admin . Client . ', '{\"_method\":\"PATCH\",\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"users_id\":\"13\",\"restaurant_id\":\"3\",\"dish_id\":\"3\",\"order_id\":\"1\",\"deliver_charge\":\"1\",\"quantity\":\"1\",\"unit_price\":\"1\",\"total_price\":\"1\",\"special_request\":\"xzd3\\r\\n\"}', '2017-06-15 23:27:39', '2017-06-15 23:27:39'),
(21, 82, 'Delete Cart', 'taylor successor', 'Admin . Client . ', '{\"id\":33,\"users_id\":13,\"restaurant_id\":3,\"dish_id\":3,\"order_id\":1,\"deliver_charge\":\"1\",\"quantity\":1,\"unit_price\":\"1\",\"total_price\":\"1\",\"special_request\":\"xzd3\\r\\n\",\"created_at\":\"2017-06-15 23:27:22\",\"updated_at\":\"2017-06-15 23:27:39\"}', '2017-06-15 23:27:49', '2017-06-15 23:27:49'),
(22, 82, 'Add Payment', 'taylor successor', 'Admin . Client . ', '{\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"users_id\":\"13\",\"order_id\":\"1\",\"amount\":\"1\",\"status\":\"0\",\"type\":\"0\",\"notification\":\"0\"}', '2017-06-15 23:28:50', '2017-06-15 23:28:50'),
(23, 82, 'delete payment', 'taylor successor', 'Admin . Client . ', '{\"id\":12,\"order_id\":1,\"users_id\":13,\"amount\":\"1\",\"status\":0,\"type\":0,\"notification\":0,\"created_at\":\"2017-06-15 23:28:50\",\"updated_at\":\"2017-06-15 23:28:50\"}', '2017-06-15 23:29:03', '2017-06-15 23:29:03'),
(24, 82, 'Add CMS', 'taylor successor', 'Admin . Client . ', '{\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"title_en\":\"kl\",\"title_ar\":\"jlkj\",\"alias\":\"lkjlk\",\"content_en\":\"jlkj\",\"content_ar\":\"lkj\"}', '2017-06-15 23:29:44', '2017-06-15 23:29:44'),
(25, 82, 'Delete CMS', 'taylor successor', 'Admin . Client . ', '{\"id\":5,\"title_en\":\"kl\",\"title_ar\":\"jlkj\",\"alias\":\"lkjlk\",\"content_en\":\"jlkj\",\"content_ar\":\"lkj\",\"created_at\":\"2017-06-15 23:29:44\",\"updated_at\":\"2017-06-15 23:29:44\"}', '2017-06-15 23:29:51', '2017-06-15 23:29:51'),
(26, 82, 'Add Restaurant', 'taylor successor', 'Admin . Client . ', '{\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"name_en\":\"e;djf\",\"long\":\"35.93949794769287\",\"lat\":\"31.93956238929864\",\"available_payment\":\"kl\",\"status\":\"0\",\"min_amount\":\"ij\",\"working_hour_from\":\"oijoi\",\"working_hour_to\":\"ho\",\"deliver_time_from\":\"ho\",\"deliver_time_to\":\"h\",\"deliver_charge\":\"ou\",\"rating\":\"ho\",\"show_menu\":\"h\",\"order_accept_days\":\"oh\",\"offline_order\":\"0\",\"url\":\"iho\",\"img\":\"ih\",\"commission_type\":\"0\",\"discount_type\":\"0\",\"discount\":\"ho\",\"area_id\":\"3\",\"follow_us\":\"0\",\"notification\":\"0\",\"name_ar\":\"sdfsdf\",\"address_ar\":\"\",\"description_ar\":\"\",\"summary_ar\":\"\",\"Owner_first_name\":\"j\",\"Owner_last_name\":\"hoih\",\"email\":\"oih\",\"telephone\":\"oh\",\"address_en\":\"\",\"description_en\":\"\",\"summary_en\":\"\"}', '2017-06-15 23:35:53', '2017-06-15 23:35:53'),
(27, 82, 'Add Restaurant', 'taylor successor', 'Admin . Client . ', '{\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"name_en\":\"kjoj\",\"long\":\"36.06566905975342\",\"lat\":\"32.06591949246112\",\"available_payment\":\"jh\",\"status\":\"0\",\"min_amount\":\"kjh\",\"working_hour_from\":\"kjh\",\"working_hour_to\":\"kj\",\"deliver_time_from\":\"hk\",\"deliver_time_to\":\"jh\",\"deliver_charge\":\"kjhkj\",\"rating\":\"hk\",\"show_menu\":\"jh\",\"order_accept_days\":\"kjh\",\"offline_order\":\"0\",\"url\":\"hk\",\"img\":\"jh\",\"commission_type\":\"0\",\"discount_type\":\"0\",\"discount\":\"kj\",\"area_id\":\"3\",\"follow_us\":\"0\",\"notification\":\"0\",\"name_ar\":\"kjhh\",\"address_ar\":\"\",\"description_ar\":\"\",\"summary_ar\":\"\",\"Owner_first_name\":\"lkjlkj\",\"Owner_last_name\":\"lkj\",\"email\":\"lkj\",\"telephone\":\"lk\",\"address_en\":\"\",\"description_en\":\"\",\"summary_en\":\"\"}', '2017-06-15 23:37:57', '2017-06-15 23:37:57'),
(28, 82, 'Add Restaurant', 'taylor successor', 'Admin . Client . ', '{\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"name_en\":\"kjkjkj\",\"long\":\"36.11081600189209\",\"lat\":\"32.083738118953725\",\"available_payment\":\"lkjl\",\"status\":\"0\",\"min_amount\":\"jl\",\"working_hour_from\":\"kj\",\"working_hour_to\":\"lkj\",\"deliver_time_from\":\"lkj\",\"deliver_time_to\":\"lk\",\"deliver_charge\":\"jlk\",\"rating\":\"j\",\"show_menu\":\"lkj\",\"order_accept_days\":\"lkj\",\"offline_order\":\"0\",\"url\":\"jlk\",\"img\":\"jlk\",\"commission_type\":\"0\",\"discount_type\":\"0\",\"discount\":\"lkj\",\"area_id\":\"3\",\"follow_us\":\"0\",\"notification\":\"0\",\"name_ar\":\"lknjlkjl\",\"address_ar\":\"kjlkj\",\"description_ar\":\"lkj\",\"summary_ar\":\"lkj\",\"Owner_first_name\":\"kmlk\",\"Owner_last_name\":\"lkmlk\",\"email\":\"mlkm\",\"telephone\":\"lkm\",\"address_en\":\"\",\"description_en\":\"\",\"summary_en\":\"\"}', '2017-06-15 23:39:56', '2017-06-15 23:39:56'),
(29, 82, 'Update Restaurant', 'taylor successor', 'Admin . Client . ', '{\"_method\":\"PATCH\",\"_token\":\"Q2sv3JzpXeNLiVXnur131E4TJsKoKcW1qhtyZAjl\",\"name_en\":\"kjoj\",\"long\":\"36.139397621154785\",\"lat\":\"32.08908302965641\",\"available_payment\":\"jh\",\"status\":\"0\",\"min_amount\":\"kjh\",\"working_hour_from\":\"kjh\",\"working_hour_to\":\"kj\",\"deliver_time_from\":\"hk\",\"deliver_time_to\":\"jh\",\"deliver_charge\":\"kjhkj\",\"rating\":\"0\",\"show_menu\":\"0\",\"order_accept_days\":\"0\",\"offline_order\":\"0\",\"url\":\"hk\",\"img\":\"jh\",\"commission_type\":\"0\",\"discount_type\":\"0\",\"discount\":\"kj\",\"area_id\":\"3\",\"follow_us\":\"0\",\"notification\":\"0\",\"name_ar\":\"kjhh\",\"address_ar\":\"\",\"description_ar\":\"\",\"summary_ar\":\"\",\"Owner_first_name\":\"lkjlkj\",\"Owner_last_name\":\"lkj\",\"email\":\"lkj\",\"telephone\":\"lk\",\"address_en\":\"\",\"description_en\":\"\",\"summary_en\":\"\"}', '2017-06-15 23:41:42', '2017-06-15 23:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `img`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, '/files/31768_22129banner1.jpg', 1, 0, '2017-06-06 14:36:56', '2017-06-06 14:50:06'),
(2, '/files/27734_1239banner2.jpg', 2, 0, '2017-06-06 14:39:08', '2017-06-06 14:51:00'),
(3, '/files/16836_26797banner3.jpg', 3, 0, '2017-06-06 14:51:28', '2017-06-06 14:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `deliver_charge` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `special_request` varchar(255) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `users_id`, `restaurant_id`, `dish_id`, `order_id`, `deliver_charge`, `quantity`, `unit_price`, `total_price`, `special_request`, `created_at`, `updated_at`) VALUES
(5, 13, 4, 3, 1, '2', 12, '12', '32', 'dfsdg', '2017-06-03 16:13:10', '2017-06-03 16:13:10'),
(6, 94, 4, 3, 7, NULL, 1, '13', NULL, '', '2017-06-03 18:19:54', '2017-06-03 18:19:54'),
(7, 95, 4, 3, 8, NULL, 1, '13', NULL, '', '2017-06-03 20:41:35', '2017-06-03 20:41:35'),
(9, 96, 4, 3, 10, NULL, 1, '13', NULL, '', '2017-06-06 13:57:26', '2017-06-06 13:57:26'),
(10, 97, 4, 3, 11, NULL, 1, '13', NULL, '', '2017-06-07 12:39:51', '2017-06-07 12:39:51'),
(11, 98, 4, 3, 12, NULL, 1, '13', NULL, '', '2017-06-07 13:04:00', '2017-06-07 13:04:00'),
(12, 99, 4, 3, 13, NULL, 1, '13', NULL, '', '2017-06-07 13:05:27', '2017-06-07 13:05:27'),
(14, 82, 8, 4, 15, NULL, 2, '375', NULL, '', '2017-06-07 19:51:25', '2017-06-07 19:51:25'),
(17, 82, 7, 10, 18, NULL, 2, '4', NULL, '', '2017-06-07 21:14:37', '2017-06-10 23:00:50'),
(20, 82, 6, 8, 20, NULL, 2, '3.45', NULL, '', '2017-06-07 21:28:41', '2017-06-07 21:32:34'),
(21, 82, 6, 7, 20, NULL, 2, '2.550', NULL, '', '2017-06-07 21:33:24', '2017-06-11 14:01:24'),
(22, 82, 6, 11, 20, NULL, 1, '5', NULL, '', '2017-06-07 21:35:42', '2017-06-07 21:35:42'),
(24, 100, 4, 3, 22, NULL, 1, '13', NULL, '', '2017-06-08 09:34:31', '2017-06-08 09:34:31'),
(25, 82, 7, 10, 23, NULL, 5, '4', NULL, '', '2017-06-10 22:44:25', '2017-06-10 22:44:25'),
(26, 101, 8, 4, 24, NULL, 1, '375', NULL, '', '2017-06-11 09:41:14', '2017-06-11 09:41:14'),
(27, 102, 8, 4, 25, NULL, 1, '375', NULL, '', '2017-06-11 10:58:45', '2017-06-11 10:58:45'),
(28, 103, 7, 10, 26, NULL, 1, '4', NULL, '', '2017-06-11 13:41:58', '2017-06-11 13:41:58'),
(29, 82, 4, 3, 27, NULL, 2, '13', NULL, '', '2017-06-13 08:16:03', '2017-06-13 17:38:14'),
(30, 82, 8, 4, 28, NULL, 1, '375', NULL, '', '2017-06-13 17:29:07', '2017-06-13 17:29:07'),
(31, 104, 6, 7, 29, NULL, 1, '2.550', NULL, '', '2017-06-15 09:45:36', '2017-06-15 09:45:36'),
(32, 104, 7, 10, 30, NULL, 6, '4', NULL, '', '2017-06-15 09:47:31', '2017-06-15 09:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `min_quantity` int(11) DEFAULT NULL,
  `max_quantity` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_en`, `name_ar`, `min_quantity`, `max_quantity`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(3, 'category', 'gff', 65, 56, 4, '2017-05-19 14:42:34', '2017-05-19 14:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `content_en` longtext,
  `content_ar` longtext,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title_en`, `title_ar`, `alias`, `content_en`, `content_ar`, `created_at`, `updated_at`) VALUES
(1, 'about', 'about', 'about', '\r\n<section class=\"inner_content_area\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n	<strong class=\"blue\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,</strong> \r\n    <p>when an unknown printer took a galley of type and scrambled it to make a type  specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker..\r\nthe 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker..</p><br>\r\n<br>\r\n\r\n</div>\r\n<div class=\"col-md-6\">\r\n	<div class=\"vision clearfix\">\r\n        <img src=\"/assets/website/images/vision.png\" alt=\"\">\r\n        <h5>Our Vision</h5>\r\n        <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, </p>\r\n    </div>\r\n    <div class=\"mission clearfix\">\r\n        <img src=\"/assets/website/images/mission.png\" alt=\"\">\r\n        <h5>Our Mission</h5>\r\n        <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, </p>\r\n    </div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n\r\n</section>\r\n\r\n\r\n', '\r\n<section class=\"inner_content_area\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n	<strong class=\"blue\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,</strong> \r\n    <p>when an unknown printer took a galley of type and scrambled it to make a type  specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker..\r\nthe 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker..</p><br>\r\n<br>\r\n\r\n</div>\r\n<div class=\"col-md-6\">\r\n	<div class=\"vision clearfix\">\r\n        <img src=\"/assets/website/images/vision.png\" alt=\"\">\r\n        <h5>Our Vision</h5>\r\n        <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, </p>\r\n    </div>\r\n    <div class=\"mission clearfix\">\r\n        <img src=\"/assets/website/images/mission.png\" alt=\"\">\r\n        <h5>Our Mission</h5>\r\n        <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, </p>\r\n    </div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n\r\n</section>\r\n\r\n\r\n', '2017-05-31 14:28:55', '2017-05-31 14:46:50'),
(2, 'PRIVACY<br><span> POLICY</span>', 'PRIVACY POLICY', 'privacy', '<section class=\"inner_content_area\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n	<div class=\"col-sm-9\">\r\n		<div class=\"row\">\r\n			<p>Privacy policy paragraph will be here...</p>\r\n		</div>\r\n    </div>\r\n    <div class=\"col-sm-3\">\r\n    	<section class=\"in-section\">\r\n        	<h3>iN THIS sECTION</h3>\r\n            <ul>\r\n            	<li><a class=\"active\" href=\"#\">Menues will be here</a></li>\r\n                <li><a href=\"#\">Menues will be here</a></li>\r\n                <li><a href=\"#\">Menues will be here</a></li>\r\n                <li><a href=\"#\">Menues will be here</a></li>\r\n                <li><a href=\"#\">Menues will be here</a></li>\r\n                <li><a href=\"#\">Menues will be here</a></li>\r\n            </ul>\r\n        </section>\r\n    </div>\r\n    \r\n</div>\r\n</div>\r\n\r\n\r\n</section>\r\n\r\n\r\n', '<section class=\"inner_content_area\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n	<div class=\"col-sm-9\">\r\n		<div class=\"row\">\r\n			<p>Privacy policy paragraph will be here...</p>\r\n		</div>\r\n    </div>\r\n    <div class=\"col-sm-3\">\r\n    	<section class=\"in-section\">\r\n        	<h3>iN THIS sECTION</h3>\r\n            <ul>\r\n            	<li><a class=\"active\" href=\"#\">Menues will be here</a></li>\r\n                <li><a href=\"#\">Menues will be here</a></li>\r\n                <li><a href=\"#\">Menues will be here</a></li>\r\n                <li><a href=\"#\">Menues will be here</a></li>\r\n                <li><a href=\"#\">Menues will be here</a></li>\r\n                <li><a href=\"#\">Menues will be here</a></li>\r\n            </ul>\r\n        </section>\r\n    </div>\r\n    \r\n</div>\r\n</div>\r\n\r\n\r\n</section>\r\n\r\n\r\n', '2017-05-31 14:56:29', '2017-05-31 14:58:39'),
(3, 'site <br><span>map</span>', 'site <br><span>map</span>', 'sitemap', '\r\n<section class=\"inner_content_area\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n	<div class=\"col-sm-9\">\r\n		<div class=\"row\">\r\n			<ul class=\"sitemap\">\r\n				<li><a class=\"home\" href=\"#\"> Home</a></li>\r\n\r\n				<li><a href=\"/restaurant\">All Restaurants</a></li>\r\n				<li><a href=\"#\">New Restaurants</a></li>\r\n				<li><a href=\"#\">Most Selling Dishes</a></li>\r\n				<li><a href=\"#\">Promotions</a></li>\r\n				<li><a href=\"#\">Members Area</a></li>\r\n				<li><a href=\"#\">All Locations</a></li>\r\n				<li><a href=\"#\">All Cuisines</a></li>\r\n				<li><a href=\"#\">Consultation</a></li>\r\n				<li><a href=\"#\">Add Restaurant</a></li>\r\n				<li><a href=\"#\">Feedback</a></li>\r\n				<li><a href=\"#\">Terms</a></li>\r\n				<li><a href=\"#\">FAQ</a></li>\r\n				<li><a href=\"#\">Privacy</a></li>\r\n				<li><a href=\"#\">Social responsibility</a></li>\r\n				<li><a href=\"#\">Sitemap</a></li>\r\n			</ul>\r\n		</div>\r\n    </div>\r\n        \r\n</div>\r\n</div>\r\n\r\n\r\n</section>\r\n', '\r\n<section class=\"inner_content_area\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n	<div class=\"col-sm-9\">\r\n		<div class=\"row\">\r\n			<ul class=\"sitemap\">\r\n				<li><a class=\"home\" href=\"#\"> Home</a></li>\r\n\r\n				<li><a href=\"#\">All Restaurants</a></li>\r\n				<li><a href=\"#\">New Restaurants</a></li>\r\n				<li><a href=\"#\">Most Selling Dishes</a></li>\r\n				<li><a href=\"#\">Promotions</a></li>\r\n				<li><a href=\"#\">Members Area</a></li>\r\n				<li><a href=\"#\">All Locations</a></li>\r\n				<li><a href=\"#\">All Cuisines</a></li>\r\n				<li><a href=\"#\">Consultation</a></li>\r\n				<li><a href=\"#\">Add Restaurant</a></li>\r\n				<li><a href=\"#\">Feedback</a></li>\r\n				<li><a href=\"#\">Terms</a></li>\r\n				<li><a href=\"#\">FAQ</a></li>\r\n				<li><a href=\"#\">Privacy</a></li>\r\n				<li><a href=\"#\">Social responsibility</a></li>\r\n				<li><a href=\"#\">Sitemap</a></li>\r\n			</ul>\r\n		</div>\r\n    </div>\r\n        \r\n</div>\r\n</div>\r\n\r\n\r\n</section>\r\n', '2017-05-31 15:01:37', '2017-05-31 15:01:37'),
(4, 'thank', 'شكرا ', 'thank', '<div style=\"display:block;text-align:center;clear:both;padding:200px 0px;\"><h1>Thank You ......<a href=\'/\'>SAHALAT</a> </h1></div>', '<div style=\"display:block;text-align:center;clear:both;padding:200px 0px;\"><h1>شكرا لك ......<a href=\'/\'>سهلات</a> </h1></div>', '2017-06-14 00:12:09', '2017-06-14 00:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `columns_info`
--

CREATE TABLE `columns_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `columns_info` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `columns_info`
--

INSERT INTO `columns_info` (`id`, `users_id`, `columns_info`, `created_at`, `updated_at`) VALUES
(3, '1', '{\"/admin/reports/closed-orders\":{\"0\":{\"Order#\":1,\"Login\":1,\"Live/Demo\":1,\"Symbol\":1,\"Type\":1,\"Lots\":0,\"Open Time\":0,\"Open Price\":0,\"SL\":1,\"TP\":1,\"Commission\":1,\"Swaps\":1,\"Price\":1,\"Profit\":1}},\"/admin/reports/open-orders\":{\"0\":{\"Order#\":1,\"Login\":1,\"Live/Demo\":1,\"Symbol\":0,\"Type\":0,\"Lots\":1,\"Open Time\":0,\"Open Price\":0,\"SL\":0,\"TP\":1,\"Commission\":0,\"Swaps\":0,\"Price\":1,\"Profit\":1}},\"/admin/reports/account-statement\":{\"0\":{\"Order#\":0,\"Login\":0,\"Live/Demo\":0,\"Symbol\":0,\"Type\":0,\"Lots\":0,\"Open Time\":1,\"Open Price\":0,\"SL\":0,\"TP\":1,\"Commission\":1,\"Swaps\":1,\"Price\":1,\"Profit\":1},\"1\":{\"Order#\":0,\"Login\":1,\"Live/Demo\":0,\"Symbol\":0,\"Type\":1,\"Lots\":1,\"Open Time\":1,\"Open Price\":1,\"SL\":1,\"TP\":1,\"Commission\":1,\"Swaps\":1,\"Price\":1,\"Profit\":1},\"2\":{\"Order#\":1,\"Login\":0,\"Live/Demo\":0,\"Symbol\":0,\"Type\":1,\"Lots\":1,\"Open Time\":1,\"Open Price\":1,\"SL\":1,\"TP\":1,\"Commission\":1,\"Swaps\":1,\"Price\":1,\"Profit\":1},\"3\":{\"Order#\":1,\"Login\":1,\"Live/Demo\":1,\"Symbol\":1,\"Type\":1,\"Lots\":0,\"Open Time\":0,\"Open Price\":1,\"SL\":1,\"TP\":1,\"Commission\":1,\"Swaps\":1,\"Price\":1,\"Profit\":1},\"4\":{\"Order#\":1,\"Login\":1,\"Live/Demo\":1,\"Symbol\":0,\"Type\":0,\"Lots\":0,\"Open Time\":1,\"Open Price\":0,\"SL\":0,\"TP\":0,\"Commission\":0,\"Swaps\":0,\"Price\":0,\"Profit\":1}},\"/admin/accounts/accounts-list\":{\"0\":{\"Id\":1,\"Last Name\":0,\"Email \":1,\"Last Login\":1,\"\":1}},\"/admin/mt4Configrations/groups-list\":{\"0\":{\"Name\":1,\"Company\":1,\"MC/SO\":1}},\"/admin/reports/daily-report\":{\"0\":{\"Login\":1,\"Live/Demo\":1,\"Time\":1,\"Group\":1,\"Bank\":0,\"Prev balance\":0,\"Balance\":0,\"Deposit\":0,\"Credit\":0,\"Profit Closed\":1,\"Profit\":1,\"Equity\":1,\"Margin\":1,\"Margin Free\":1}},\"/admin/settings/admins-list\":{\"0\":{\"Id\":1,\"First Name\":1,\"Last Name\":1,\"Email \":1,\"\":1}}}', '2017-01-18 10:43:53', '2017-02-06 09:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `users_id`, `email`, `phone`, `comments`, `created_at`, `updated_at`) VALUES
(1, 0, 'kijhiho@gfg.jh', '7676', 'gf', '2017-06-02 16:25:18', '2017-06-02 16:25:18'),
(2, 0, 'kijhiho@gfg.jh', '7676', 'gf', '2017-06-02 16:26:32', '2017-06-02 16:26:32'),
(3, 0, 'skdf@Oho.df', '7657', 'iuhiu', '2017-06-02 16:27:15', '2017-06-02 16:27:15'),
(4, 0, 'dfsd@kjd.sdf', '234234', 'sdf', '2017-06-02 16:27:54', '2017-06-02 16:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `cuisine`
--

CREATE TABLE `cuisine` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `description_en` varchar(255) DEFAULT NULL,
  `description_ar` varchar(255) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cuisine`
--

INSERT INTO `cuisine` (`id`, `name_en`, `name_ar`, `status`, `description_en`, `description_ar`, `created_at`, `updated_at`) VALUES
(1, 'kuwaiti', 'كويتي', 0, 'description kuwaiti ', 'شرح المطبخ الكويتي', '2017-05-19 13:42:52', '2017-06-07 16:37:00'),
(2, 'chinese', 'صيني', 0, 'description chinese', 'شرح المطبخ الصيني', '2017-05-19 13:43:48', '2017-06-07 16:38:03'),
(3, 'lebanese', 'لبناني', 0, 'description of lebanese cuisine', 'المطعم اللبناني', '2017-06-07 16:39:37', '2017-06-07 16:39:37'),
(4, 'continental', 'غربي', 0, 'continental description', 'continental ', '2017-06-07 16:41:11', '2017-06-07 16:41:11'),
(5, 'indian', 'هندي', 0, 'indian', 'هندي', '2017-06-07 16:41:55', '2017-06-07 16:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_menu`
--

CREATE TABLE `delivery_menu` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `restaurant_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `description_en` varchar(255) DEFAULT NULL,
  `description_ar` varchar(255) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery_menu`
--

INSERT INTO `delivery_menu` (`id`, `name_en`, `name_ar`, `restaurant_id`, `status`, `description_en`, `description_ar`, `created_at`, `updated_at`) VALUES
(1, 'deliver menu 1', 'قائمة التوصيل 1', 4, 1, 'deliver menu description 1', 'شرح قائمة التوصيل 1', '2017-05-19 14:45:06', '2017-05-19 14:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `deliver_package`
--

CREATE TABLE `deliver_package` (
  `id` int(11) NOT NULL,
  `deliver_number` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `restaurant_id` int(11) NOT NULL,
  `cuisine_id` int(11) NOT NULL,
  `menu_section_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `delivery_menu_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `available_from` varchar(20) DEFAULT NULL,
  `available_to` varchar(20) DEFAULT NULL,
  `description_en` varchar(255) DEFAULT NULL,
  `description_ar` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`id`, `name_en`, `name_ar`, `restaurant_id`, `cuisine_id`, `menu_section_id`, `category_id`, `delivery_menu_id`, `parent_id`, `price`, `quantity`, `img`, `discount`, `available_from`, `available_to`, `description_en`, `description_ar`, `status`, `rating`, `created_at`, `updated_at`) VALUES
(3, 'dish 1', 'الطبق 1', 4, 1, 1, 3, 1, 1, '13', 0, '/assets/website/images/dishes/dishes1.jpg', '', '2016-06-06', '2019-06-18', 'dish 1 description', 'شرح الطبق 1', 0, 3, '2017-05-20 14:06:58', '2017-06-14 22:34:34'),
(4, 'max xtrem mel', 'ماكس اكستريم ميل ', 8, 2, 1, 3, 1, 0, '375', 198, '/files/27734_1239banner2.jpg', '1', '2016-06-07', '2018-06-07', 'max xtrem mel', 'ماكس اكستريم ميل', 0, 2, '2017-06-07 18:37:54', '2017-06-14 22:31:04'),
(5, 'strbs', 'وجبة الارز بدجاج الكرسبي ', 3, 3, 1, 3, 1, 0, '325', 1, '/files/31768_22129banner1.jpg', '300', '2016-06-07', '2018-06-07', 'strbs', 'وجبة الارز بدجاج الكرسبي ستربس', 0, 0, '2017-06-07 18:50:24', '2017-06-07 18:50:24'),
(6, 'supper  sobrem ', 'سوير سوبريم كبير ', 5, 1, 1, 3, 1, 0, '3,650', 74, '/files/3856_31241dishes3.jpg', '100', '2016-06-07', '2018-06-07', 'sober sobrem ', 'سوير سوبريم كبير ', 0, 0, '2017-06-07 19:00:58', '2017-06-07 21:24:37'),
(7, 'big taisty', 'بيج تايستي ', 6, 1, 1, 3, 1, 0, '2.550', 77, '/files/11714_18387img_order1.jpg', '10', '2017-06-07', '2017-06-07', 'big taisty', 'بيج تايستي ', 0, 3, '2017-06-07 19:07:39', '2017-06-14 22:31:32'),
(8, 'big mak', 'بيج ماك', 6, 4, 1, 3, 1, 0, '3.45', 89, '/files/16836_26797banner3.jpg', '100', '2016-06-07', '2018-06-07', 'big mak', 'بيج ماك', 0, 5, '2017-06-07 19:11:23', '2017-06-14 22:44:13'),
(9, 'mak roial', 'ماك رويال', 6, 1, 1, 3, 1, 0, '2.555', 1, '/files/13082_24139dishes6.jpg', '150', '2016-06-07', '2018-06-07', 'mak roial', 'ماك رويال', 0, 0, '2017-06-07 19:14:46', '2017-06-07 19:32:09'),
(10, 'Falafil', 'فلافل', 7, 1, 1, 3, 1, 0, '4', 69, '/files/3856_31241dishes3.jpg', '1', '2016-06-07', '2018-06-07', 'falafil', 'فلافل', 0, 0, '2017-06-07 21:14:21', '2017-06-15 09:51:38'),
(11, 'Burger max', 'برغر', 6, 1, 1, 3, 1, 0, '5', 199, '/files/16836_26797banner3.jpg', '1', '2016-06-07', '2018-06-07', 'Burger max', 'Burger max', 0, 5, '2017-06-07 21:27:55', '2017-06-14 22:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `dish_rate`
--

CREATE TABLE `dish_rate` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `notification` int(11) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dish_rate`
--

INSERT INTO `dish_rate` (`id`, `users_id`, `dish_id`, `rate`, `description`, `status`, `notification`, `created_at`, `updated_at`) VALUES
(2, 82, 3, 3, 'sdfsdf', 0, 1, '1', '2017-06-14 22:37:30'),
(3, 82, 8, 5, 'dvsd', 0, 0, '2017-06-14 22:37:04', '2017-06-14 22:44:13'),
(4, 82, 11, 5, 'sdsssssssssssss', 0, 1, '2017-06-14 22:37:43', '2017-06-14 22:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `email_group`
--

CREATE TABLE `email_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_group`
--

INSERT INTO `email_group` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'desdf', '2017-03-21 11:14:09', '2017-03-21 11:14:09'),
(2, 'drivers', '2017-06-08 10:53:35', '2017-06-08 10:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `email_group_users`
--

CREATE TABLE `email_group_users` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_group_users`
--

INSERT INTO `email_group_users` (`id`, `group_id`, `users_id`, `type`) VALUES
(97, 1, 3, NULL),
(98, 1, 7, NULL),
(99, 1, 13, NULL),
(100, 2, 15, NULL),
(101, 2, 17, NULL),
(102, 2, 18, NULL),
(103, 2, 19, NULL),
(104, 2, 20, NULL),
(105, 2, 21, NULL),
(106, 2, 22, NULL),
(107, 2, 23, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_mass_queue`
--

CREATE TABLE `email_mass_queue` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `language` varchar(10) DEFAULT NULL,
  `last_users_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `email_group_id` int(11) NOT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email_mass_template`
--

CREATE TABLE `email_mass_template` (
  `id` int(11) NOT NULL,
  `email_group_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `language` varchar(10) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_mass_template`
--

INSERT INTO `email_mass_template` (`id`, `email_group_id`, `name`, `subject`, `body`, `language`, `created_at`, `updated_at`) VALUES
(1, 1, 'hhhhhhhhhhh', 'hhhhhhhhh', '', 'en', '2017-03-21 12:18:42', '2017-03-21 12:22:46'),
(2, 1, 'sdfg', 'sdfg', '<p>gdgsdf</p>\r\n', 'en', '2017-03-23 08:32:02', '2017-03-23 08:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `to_field` varchar(255) DEFAULT NULL,
  `to_email` varchar(255) DEFAULT NULL,
  `language` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`id`, `name`, `subject`, `body`, `type`, `to_field`, `to_email`, `language`, `status`, `created_at`, `updated_at`) VALUES
(2, 'signUp', 'sssssss', '<p><img alt=\"\" src=\"http://localhost:8000/files/15697_31158business-user-group-icon-44614.png\" style=\"height:256px; width:256px\" />sssssss</p>\r\n', 0, 'sssssssssss', 'ssssss', 'en', 0, '2017-03-21 11:50:22', '2017-03-23 08:42:43'),
(3, 'signUp', 'sdfg', 'sdfgggggggg', 2, 'gdf', 'gsdfg', 'en', 0, '2017-03-21 12:05:04', '2017-03-21 12:05:04'),
(4, 'signUp', 'gmmmmmmm', 'mmmmmmmmmmmmm', 0, 'mmmmmm', 'm', 'en', 1, '2017-03-21 12:05:34', '2017-03-21 12:05:34'),
(5, 'forgetPassword', 'forgetPassword', 'reminder_id : 25<br>reminder_user_id : 82<br>reminder_code : g8MwzIY7Tg58tl8zR5pO5J4E58WGtVvv<br>reminder_completed : <br>reminder_completed_at : <br>reminder_created_at : 2017-06-06 22:49:23<br>reminder_updated_at : 2017-06-06 22:49:23<br>accountInfo_id ', 0, 'accountInfo_email', 'manager@fintolog.com', 'en', 0, '2017-06-06 22:49:23', '2017-06-06 22:49:23'),
(6, 'forgetPassword', 'client forget password', '<p>this is forget password for client</p>\r\n', 1, 'accountInfo_email', 'admin@fintolog.com', 'en', 0, '2017-06-15 23:57:40', '2017-06-15 23:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `governorate`
--

CREATE TABLE `governorate` (
  `id` int(11) NOT NULL,
  `name_en` varchar(50) DEFAULT NULL,
  `name_ar` varchar(50) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `governorate`
--

INSERT INTO `governorate` (`id`, `name_en`, `name_ar`, `created_at`, `updated_at`) VALUES
(3, 'governorate 1', 'المحافظة 1', '2017-05-19 12:59:05', '2017-05-19 12:59:05'),
(4, 'GOVERNORATE 2', 'محافظة 2', '2017-05-19 13:01:24', '2017-05-19 13:01:24'),
(5, 'GOVERNORATE 3', 'محافظة 3', '2017-05-19 13:01:48', '2017-05-19 13:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `menu_section`
--

CREATE TABLE `menu_section` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `restaurant_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `description_en` varchar(255) DEFAULT NULL,
  `description_ar` varchar(255) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_section`
--

INSERT INTO `menu_section` (`id`, `name_en`, `name_ar`, `restaurant_id`, `status`, `description_en`, `description_ar`, `created_at`, `updated_at`) VALUES
(1, 'menu section 1', 'قسم القاشمة 1', 4, 0, 'description menu section 1', 'شرح القائمة 1', '2017-05-20 14:06:42', '2017-05-20 14:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `deliver_number` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `operation_hour`
--

CREATE TABLE `operation_hour` (
  `id` int(11) NOT NULL,
  `restaurant_area_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `day` varchar(20) DEFAULT NULL,
  `shift1_from` varchar(20) DEFAULT NULL,
  `shift1_to` varchar(20) DEFAULT NULL,
  `shift2_from` varchar(20) DEFAULT NULL,
  `shift2_to` varchar(20) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `operation_hour`
--

INSERT INTO `operation_hour` (`id`, `restaurant_area_id`, `restaurant_id`, `day`, `shift1_from`, `shift1_to`, `shift2_from`, `shift2_to`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '0', '08:00:00', '12:00:00', '12:00:00', '20:00:00', '2017-05-26 22:22:44', '2017-05-26 22:22:44'),
(2, 2, 3, '4', '08:00:00', '12:00:00', '12:00:00', '20:', '2017-05-29 11:14:44', '2017-05-29 11:14:44'),
(3, 2, 4, '1', '08:00:00', '12:00:00', '12:00:00', '20:00:00', '2017-05-29 11:16:33', '2017-05-29 11:16:33'),
(4, 1, 3, '0', '08:00:00', '13:00:00', '13:00:00', '23:00:00', '2017-06-02 11:32:13', '2017-06-02 11:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `from_id` int(11) DEFAULT NULL,
  `address_id` int(11) NOT NULL,
  `order_time` varchar(20) DEFAULT NULL,
  `deliver_time` varchar(20) DEFAULT NULL,
  `expected_time` varchar(10) NOT NULL,
  `deliver_date` varchar(20) DEFAULT NULL,
  `note` text,
  `deliver_charge` varchar(255) DEFAULT NULL,
  `sahalat_charge` double NOT NULL,
  `extra_charge` double NOT NULL,
  `sub_total` double NOT NULL,
  `total` double NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `notification` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `users_id`, `restaurant_id`, `area_id`, `from_id`, `address_id`, `order_time`, `deliver_time`, `expected_time`, `deliver_date`, `note`, `deliver_charge`, `sahalat_charge`, `extra_charge`, `sub_total`, `total`, `rate`, `point`, `notification`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 4, 4, 1, 1, '1', '1', '', '1', 'sdfsd', '2', 0, 0, 0, 0, 2, 2, 1, 4, '2017-05-19 19:42:56', '2017-06-03 16:11:30'),
(6, 13, 3, 5, NULL, 1, NULL, '16:09', '', '2017-06-03', 'sdf', '2', 2, 1, 33, 50, 2, 1, 1, 3, '2017-06-03 16:10:19', '2017-06-07 18:29:37'),
(7, 94, 4, 0, NULL, 1, NULL, NULL, '', NULL, NULL, '2', 0, 0, 0, 0, NULL, NULL, NULL, 0, '2017-06-03 18:19:53', '2017-06-03 18:19:53'),
(8, 95, 4, 3, NULL, 1, NULL, '00:15', '', '2017-06-04', '', '2', 2, 0, 13, 16, NULL, NULL, 1, 1, '2017-06-03 20:41:35', '2017-06-04 13:11:55'),
(9, 13, 4, 3, NULL, 0, NULL, '17:55', '', '2017-06-04', '', '2', 0, 0, 0, 0, 0, 0, 1, 0, '2017-06-04 17:55:56', '2017-06-05 17:39:39'),
(10, 96, 4, 3, NULL, 1, NULL, '18:30', '', '', '', '2', 1, 0, 0, 0, 0, 0, 0, 0, '2017-06-06 09:39:22', '2017-06-09 19:47:22'),
(11, 97, 4, 0, NULL, 0, NULL, NULL, '', NULL, NULL, '2', 1, 0, 0, 0, NULL, NULL, NULL, 0, '2017-06-07 12:39:51', '2017-06-07 12:39:51'),
(12, 98, 4, 0, NULL, 0, NULL, NULL, '', NULL, NULL, '2', 0, 0, 0, 0, NULL, NULL, NULL, 0, '2017-06-07 13:04:00', '2017-06-07 13:04:00'),
(13, 99, 4, 0, NULL, 0, NULL, NULL, '', NULL, NULL, '2', 0, 0, 0, 0, NULL, NULL, NULL, 0, '2017-06-07 13:05:27', '2017-06-07 13:05:27'),
(15, 82, 8, 7, NULL, 19, NULL, '20:00', '16:37:00', '2017-06-08', '', '2', 1, 0, 750, 744.5, 0, 0, 1, 3, '2017-06-07 19:51:25', '2017-06-10 18:24:44'),
(17, 82, 6, 4, NULL, 23, NULL, '08:15', '16:23:00', '2017-06-08', '', '2', 44, 0, 31.05, 2, 0, 0, 0, 1, '2017-06-07 20:53:51', '2017-06-10 16:21:41'),
(18, 82, 7, 5, NULL, 26, NULL, '18:40', '16:31:00', '2017-06-08', '', '2', 1, 0, 20, 21.8, 0, 0, 1, 2, '2017-06-07 21:14:37', '2017-06-10 22:43:56'),
(19, 82, 5, 3, NULL, 27, NULL, '21:40', '16:42:00', '2017-06-08', '', '2', 1, 0, 18, -580, 0, 0, 1, 1, '2017-06-07 21:20:56', '2017-06-12 11:01:25'),
(20, 82, 6, 4, NULL, 23, NULL, '08:15', '16:23:00', '2017-06-08', '', '2', 1, 0, 14.45, 9.24, 0, 0, 1, 1, '2017-06-07 21:28:29', '2017-06-10 16:21:34'),
(22, 100, 4, 0, NULL, 0, NULL, NULL, '', NULL, NULL, '2', 0, 0, 0, 0, NULL, NULL, NULL, 0, '2017-06-08 09:34:31', '2017-06-08 09:34:31'),
(23, 82, 7, 0, NULL, 0, NULL, NULL, '', NULL, NULL, '2', 0, 0, 0, 0, NULL, NULL, NULL, 0, '2017-06-10 22:44:25', '2017-06-10 22:44:25'),
(24, 101, 8, 0, NULL, 0, NULL, NULL, '', NULL, NULL, '2', 0, 0, 0, 0, NULL, NULL, NULL, 0, '2017-06-11 09:41:14', '2017-06-11 09:41:14'),
(25, 102, 8, 0, NULL, 0, NULL, NULL, '', NULL, NULL, '2', 0, 0, 0, 0, NULL, NULL, NULL, 0, '2017-06-11 10:58:45', '2017-06-11 10:58:45'),
(26, 103, 7, 0, NULL, 0, NULL, NULL, '', NULL, NULL, '2', 0, 0, 0, 0, NULL, NULL, NULL, 0, '2017-06-11 13:41:58', '2017-06-11 13:41:58'),
(27, 82, 4, 0, NULL, 0, NULL, NULL, '', NULL, NULL, '2', 0, 0, 0, 0, NULL, NULL, NULL, 0, '2017-06-13 08:16:03', '2017-06-13 08:16:03'),
(28, 82, 8, 0, NULL, 0, NULL, NULL, '', NULL, NULL, '2', 0, 0, 0, 0, NULL, NULL, NULL, 0, '2017-06-13 17:29:07', '2017-06-13 17:29:07'),
(29, 104, 6, 0, NULL, 0, NULL, NULL, '', NULL, NULL, '2', 0, 0, 0, 0, NULL, NULL, NULL, 0, '2017-06-15 09:45:36', '2017-06-15 09:45:36'),
(30, 104, 7, 5, NULL, 28, NULL, '10:06', '23:09:00', '2017-06-15', '', '2', 1, 0, 24, 24.76, NULL, NULL, 1, 3, '2017-06-15 09:47:31', '2017-06-15 09:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `order_driver`
--

CREATE TABLE `order_driver` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `current_long` varchar(255) DEFAULT NULL,
  `current_lat` varchar(255) DEFAULT NULL,
  `delivering_id` int(11) NOT NULL DEFAULT '0',
  `deliver_distance` double NOT NULL DEFAULT '0',
  `deliver_time` varchar(20) NOT NULL DEFAULT '0',
  `return_distance` double NOT NULL DEFAULT '0',
  `return_time` varchar(20) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `notification` int(11) DEFAULT NULL,
  `deliver_start_hour` varchar(20) NOT NULL,
  `deliver_end_hour` varchar(20) NOT NULL,
  `return_start_hour` varchar(20) NOT NULL,
  `return_end_hour` varchar(20) NOT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_driver`
--

INSERT INTO `order_driver` (`id`, `users_id`, `order_id`, `current_long`, `current_lat`, `delivering_id`, `deliver_distance`, `deliver_time`, `return_distance`, `return_time`, `status`, `note`, `notification`, `deliver_start_hour`, `deliver_end_hour`, `return_start_hour`, `return_end_hour`, `created_at`, `updated_at`) VALUES
(11, 82, 8, '35.8894614', '32.0054921', 1, 19, '19', 43, '19', 0, NULL, 1, '', '', '', '', '2017-06-07 22:34:56', '2017-06-08 11:05:16'),
(15, 82, 1, '35.8746053', '31.9799521', 1, 200, '200', 200, '200', 0, NULL, 0, '', '', '', '', '2017-06-10 12:36:40', '2017-06-10 12:36:40'),
(22, 82, 15, '35.8746053', '31.9799521', 2, 50, '50', 12, '50', 0, NULL, 0, '', '', '', '', '2017-06-10 16:13:03', '2017-06-10 16:13:03'),
(24, 82, 20, '35.8746053', '31.9799521', 2, 100, '100', 60, '100', 0, NULL, 0, '', '', '', '', '2017-06-10 16:17:18', '2017-06-10 16:17:18'),
(25, 82, 17, '35.8746053', '31.9799521', 2, 60, '60', 5, '60', 0, NULL, 0, '', '', '', '', '2017-06-10 16:19:21', '2017-06-10 16:19:21'),
(26, 82, 19, '35.8746053', '31.9799521', 3, 90, '90', 120, '90', 0, NULL, 1, '', '', '', '', '2017-06-10 16:19:37', '2017-06-12 19:53:46'),
(28, 82, 18, '35.8746053', '31.9799521', 4, 150, '150', 13, '150', 0, NULL, 0, '', '', '', '', '2017-06-10 16:19:37', '2017-06-10 16:19:37'),
(29, 81, 30, '35.8746053', '31.9799521', 5, 120, '120', 70, '120', 1, '', 1, '', '', '', '', '2017-06-15 09:58:16', '2017-06-15 10:00:05'),
(30, 82, 13, '35.8746053', '31.9799521', 2, 180, '180', 90, '180', 0, NULL, 0, '', '', '', '', '2017-06-10 16:19:21', '2017-06-10 16:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `notification` int(11) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `order_id`, `users_id`, `amount`, `status`, `type`, `notification`, `created_at`, `updated_at`) VALUES
(4, 8, 95, '16', 0, 0, 0, '2017-06-03 20:41:54', '2017-06-03 20:41:54'),
(6, 15, 82, '744.5', 2, 0, 0, '2017-06-07 20:13:01', '2017-06-12 00:59:49'),
(7, 17, 82, '2', 2, 0, 0, '2017-06-07 21:08:56', '2017-06-07 21:08:56'),
(8, 19, 82, '-580', 0, 0, 0, '2017-06-07 21:24:37', '2017-06-07 21:24:37'),
(9, 20, 82, '9.24', 0, 0, 0, '2017-06-07 21:36:24', '2017-06-07 21:36:24'),
(10, 18, 82, '21.8', 1, 0, 0, '2017-06-08 09:52:40', '2017-06-12 00:59:34'),
(11, 30, 104, '24.76', 0, 0, 0, '2017-06-15 09:51:38', '2017-06-15 09:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(13, 6, 'aGBPzjGUrSTzGrFWqIqfBUYvdBcu3IKz', '2016-03-14 11:11:24', '2016-03-14 11:11:24'),
(21, 2, '0bsTPqQffZJUYINtFELUiTwRbd6n99Mb', '2016-03-15 11:08:45', '2016-03-15 11:08:45'),
(198, 6, 'DhP1XiaQ6ravLOhlCDmOsXc2KodsqOug', '2016-03-31 22:08:21', '2016-03-31 22:08:21'),
(200, 2, 'G0CvO9N8A1dfs2aSRmwKs8EqPjKVLPx4', '2016-04-01 17:25:40', '2016-04-01 17:25:40'),
(201, 2, 'tfNy8ZvSi4ZNXlG9UKnTS9YERHqpnwVq', '2016-04-01 18:27:34', '2016-04-01 18:27:34'),
(202, 2, 'eD04LoOYTd8rd1oJORQVFG9vI8WUh1UX', '2016-04-01 22:17:05', '2016-04-01 22:17:05'),
(213, 2, 'vlHgdDzy8cECi0MAmTf7HittgKJ2qZO2', '2016-04-04 06:38:58', '2016-04-04 06:38:58'),
(216, 2, 'mqLb4PaaBxQSoGutmIc9nwDjB5mLSgxm', '2016-04-05 07:37:01', '2016-04-05 07:37:01'),
(239, 2, 'DcDlJRWbi4dQbWNjQuflfOCWKlkwHbB1', '2016-04-08 17:57:23', '2016-04-08 17:57:23'),
(240, 2, 'tJmo4912LPXUxYVNJRe9U9e4ntS79BHG', '2016-04-08 20:29:42', '2016-04-08 20:29:42'),
(241, 2, 'REr5LXnnuyyImKiw8cmf0uTQsJovugvP', '2016-04-09 07:19:41', '2016-04-09 07:19:41'),
(246, 2, '9FxqSqdsQeDVlAa3g9puhX8zAnasUfF8', '2016-04-10 19:52:57', '2016-04-10 19:52:57'),
(268, 2, 'vz2qSKpx6kkUvSB6P7XcOUdOMyXAJG8p', '2016-04-13 18:39:37', '2016-04-13 18:39:37'),
(296, 4, 'ZtQJVPkNkMUlFDI7V3XQlfFikhA9qOji', '2016-04-19 14:45:34', '2016-04-19 14:45:34'),
(322, 4, '84sqz4XOyQVlc5RycNBPoi0ZBds01mVR', '2016-04-26 14:46:33', '2016-04-26 14:46:33'),
(330, 4, 'GxcieRdtZ9W0ZuC9phigoiX1PClhBrLS', '2016-04-27 12:02:04', '2016-04-27 12:02:04'),
(336, 4, 'l3Ch8sMgucWsV4FOe42faoipM9OCGjPK', '2016-04-30 15:49:09', '2016-04-30 15:49:09'),
(350, 20, 'WBGDzIYYWyneYLWEBgIRXcTp3JhQHMAT', '2016-05-01 13:18:01', '2016-05-01 13:18:01'),
(352, 18, 'HgMkihmdqosW8HXQUNLRbx0W5pbZa1cZ', '2016-05-01 13:22:35', '2016-05-01 13:22:35'),
(353, 21, 'e1Ijuw5yeXSfZApXWtSwkCOSpmEjByhe', '2016-05-01 13:23:05', '2016-05-01 13:23:05'),
(356, 26, 'FAeE7eqvmepKMEKbxM6YnI3rM3ITQ8RX', '2016-05-01 13:36:36', '2016-05-01 13:36:36'),
(357, 28, 'ODN81CXLx4QR1vczvFdhqzIz6Hku44Yy', '2016-05-01 13:47:29', '2016-05-01 13:47:29'),
(358, 12, 'kW11CamqTa3noWxxN02KRF8BW80PaiUK', '2016-05-01 13:59:26', '2016-05-01 13:59:26'),
(359, 39, '2fLMrqC2aDnVQCQ2oUv2ayglVuuQsyid', '2016-05-01 14:08:17', '2016-05-01 14:08:17'),
(360, 40, 'fhFjD5so2K3rxjRub2g3qmmZlWu0K44k', '2016-05-01 14:11:17', '2016-05-01 14:11:17'),
(362, 4, 'mPrmFHW16wggdaPFYcUMXBIHgiGEsvhI', '2016-05-01 14:34:04', '2016-05-01 14:34:04'),
(378, 12, 'YToBg3sS8R3Xxp6kufW0CqcHHf7Lpc9n', '2016-05-09 07:23:07', '2016-05-09 07:23:07'),
(385, 12, 'ksrIus9ZbV6i6URyGSgVZKCsrj3c29sq', '2016-05-10 06:53:35', '2016-05-10 06:53:35'),
(391, 11, '1g4msvKw3JfxJtMCV7nDejsdHfXPHoXS', '2016-05-10 11:14:05', '2016-05-10 11:14:05'),
(392, 56, 'dLPFAvR1FSGfo65vJQAyuRIVukn3VAiL', '2016-05-10 11:17:12', '2016-05-10 11:17:12'),
(393, 57, 'Be7kBATXAOzaTEdc1tJ2KSrBsEs9FWDJ', '2016-05-10 11:21:48', '2016-05-10 11:21:48'),
(395, 59, 'sFFhsIOII0r7zuDZEos0O2rhJO0MWkYo', '2016-05-10 11:40:16', '2016-05-10 11:40:16'),
(396, 59, 'Fv7ySwol0SnvdXqjYIb5bw324M5URpLz', '2016-05-10 11:46:05', '2016-05-10 11:46:05'),
(401, 59, 'FQC8mpXw0SCa1SX1xjPHYFFxvKE3uTVL', '2016-05-10 11:57:58', '2016-05-10 11:57:58'),
(402, 60, 'X2Z91KsVmdqRFvEkjhsZdM699mk4eR9h', '2016-05-10 12:11:07', '2016-05-10 12:11:07'),
(403, 60, 'meYifxiLMmMZ8OyCg9vXD4iMKMO66MQK', '2016-05-10 12:14:42', '2016-05-10 12:14:42'),
(405, 62, '3p1Z95LClarupWPkwjEJalIUAIb78Q4S', '2016-05-10 12:18:08', '2016-05-10 12:18:08'),
(462, 64, 'vttSfarMntiWYxNhMUqDzKXrx01glNA1', '2016-05-29 06:47:05', '2016-05-29 06:47:05'),
(470, 69, 'TagiBTWWF4NiiNvPoQtyZKG47YYyTyDb', '2016-05-29 11:38:10', '2016-05-29 11:38:10'),
(487, 4, 'AE7f2jTsLd8l4UJjAhzOu1TpAqjCHt9n', '2016-06-01 09:32:49', '2016-06-01 09:32:49'),
(507, 4, 'UdfuXc5X2TKbLDHtSuaX2ZNOUfLvnUPH', '2016-06-09 13:30:01', '2016-06-09 13:30:01'),
(759, 5, 'LsEf94NVFuMZ5w7hVh29tJFDbk0hEdtP', '2017-01-04 11:13:23', '2017-01-04 11:13:23'),
(760, 5, 'CMh19Tb6fzo0HR5aLGaz7JEyjN61zaoP', '2017-01-04 11:35:03', '2017-01-04 11:35:03'),
(762, 5, 'i6Vq9llTFN6ynkQGg5OswceRB9WbvjNU', '2017-01-04 11:46:51', '2017-01-04 11:46:51'),
(764, 5, 'zz8ARNLcEHDRFm6S6iMSTMePVLQrv0KN', '2017-01-04 12:36:58', '2017-01-04 12:36:58'),
(765, 5, '9MXAGm6vA1J4og4cndTAJqHXFgvlakvw', '2017-01-04 12:45:20', '2017-01-04 12:45:20'),
(768, 5, 'MXJJnSLUAEokkbTnyHWa0Wt3cpWJv3Xv', '2017-01-04 12:52:44', '2017-01-04 12:52:44'),
(770, 5, 'h65Fb2HIxmKm71g9uLU8ILuWxKhViu8u', '2017-01-04 13:16:34', '2017-01-04 13:16:34'),
(772, 5, 'orF9EdXntpOtHR3uI4enUrCFN8OO3efQ', '2017-02-08 21:25:08', '2017-02-08 21:25:08'),
(942, 89, 'llTk8YHKyjUBfS6yJATMGgjOqbePZp15', '2017-05-23 02:46:15', '2017-05-23 02:46:15'),
(1003, 94, 'svqsK6B6PDJGmNKMLGMMmpUtZC6yaiYO', '2017-06-03 15:19:33', '2017-06-03 15:19:33'),
(1005, 95, 'MfVuc8wdyRB9MbGXiYRXNtZShkndQTLk', '2017-06-03 17:41:35', '2017-06-03 17:41:35'),
(1041, 96, 'ZouvnfqIkwVlfaIZX4hxNjK6l3pzewgQ', '2017-06-06 06:39:22', '2017-06-06 06:39:22'),
(1057, 99, 'kzkbi8RuuzdflfApKVg8HYo99G6CkUjp', '2017-06-07 10:05:27', '2017-06-07 10:05:27'),
(1072, 100, 'Q2OCYiM9h98JbXGywQh2i9gEUgnYp5SP', '2017-06-08 06:34:31', '2017-06-08 06:34:31'),
(1075, 13, 'th0pq6RGYDs4FuexVtlSHOdnbLZKTTSn', '2017-06-08 07:14:59', '2017-06-08 07:14:59'),
(1076, 13, 'Dl9zrj0yMBzETGnCPbVNrpp3rvvdhXRc', '2017-06-08 07:16:12', '2017-06-08 07:16:12'),
(1090, 101, 'KgNGZv88oOHNY5lvLD1FKXpqhtfIImml', '2017-06-11 06:41:14', '2017-06-11 06:41:14'),
(1092, 102, 'Der5DP1caZAlOYHiqIM00ZDnA3cHwyvE', '2017-06-11 07:58:45', '2017-06-11 07:58:45'),
(1094, 103, 'MwO3lcIweJmTDRAkNGdy4rU5t4gYhufT', '2017-06-11 10:41:58', '2017-06-11 10:41:58'),
(1112, 104, 'g3OpvHz7V43aNp1yM4w5jlJ5tR1Wn21Q', '2017-06-15 06:45:36', '2017-06-15 06:45:36'),
(1117, 82, 'ffbspmpxnhaNCJuZGGW7StAtpXs1xuER', '2017-06-16 10:58:18', '2017-06-16 10:58:18'),
(1118, 82, 'GnK7b0okFajAAkhvxQnsr06XLVXYLcmk', '2017-07-19 02:09:11', '2017-07-19 02:09:11'),
(1119, 82, '7oWYN8w2x5uCpjr0nT0t72nJlpQRH2iK', '2017-08-11 15:14:34', '2017-08-11 15:14:34'),
(1120, 82, 'OACQ5fXxWUwcp9gIqSESLdry9Y0JkJ4V', '2017-08-11 15:14:50', '2017-08-11 15:14:50'),
(1121, 82, 'NVZoJhk8GcbzPoOcQS1g0lTvCSXfKkJe', '2017-08-11 15:16:48', '2017-08-11 15:16:48'),
(1122, 82, 'lxd5idDAcOHCcrxI1Sto1Ml3A2nMizLU', '2017-08-11 17:36:25', '2017-08-11 17:36:25'),
(1123, 82, 'DhDWGsrlB4UxDWWr8mQSDAQe2TPan1Oh', '2017-08-12 04:16:35', '2017-08-12 04:16:35'),
(1124, 82, '4lm6p4RseSqRoV8HBVBCTB6KCj4MA25e', '2017-08-15 08:52:53', '2017-08-15 08:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(11, 3, 'Tf82pzBVSKQCocIl4wLAJHOYnjQmCyqc', 1, '2016-04-24 07:07:13', '2016-04-24 07:06:19', '2016-04-24 07:07:13'),
(12, 3, 'bg8a6p52d0Y1fLdvaWjPXrTWBDIss6Tm', 1, '2016-12-27 13:31:16', '2016-12-27 12:22:15', '2016-12-27 13:31:16'),
(25, 82, 'g8MwzIY7Tg58tl8zR5pO5J4E58WGtVvv', 1, '2017-06-06 20:31:57', '2017-06-06 19:49:23', '2017-06-06 20:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `branch` int(11) NOT NULL,
  `Owner_first_name` varchar(255) DEFAULT NULL,
  `Owner_last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `available_payment` varchar(25) DEFAULT NULL,
  `telephone` varchar(25) DEFAULT NULL,
  `address_en` varchar(255) DEFAULT NULL,
  `address_ar` varchar(255) DEFAULT NULL,
  `description_en` varchar(255) DEFAULT NULL,
  `description_ar` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `min_amount` varchar(255) DEFAULT NULL,
  `working_hour_from` varchar(20) DEFAULT NULL,
  `working_hour_to` varchar(20) DEFAULT NULL,
  `deliver_time_from` varchar(20) DEFAULT NULL,
  `deliver_time_to` varchar(20) DEFAULT NULL,
  `deliver_charge` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `show_menu` int(11) DEFAULT NULL,
  `order_accept_days` int(11) DEFAULT NULL,
  `offline_order` int(11) DEFAULT NULL,
  `summary_en` varchar(255) DEFAULT NULL,
  `summary_ar` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `commission_type` int(11) DEFAULT NULL,
  `discount_type` int(11) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `area_id` int(11) NOT NULL,
  `follow_us` int(11) DEFAULT NULL,
  `notification` int(11) DEFAULT NULL,
  `long` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name_en`, `name_ar`, `branch`, `Owner_first_name`, `Owner_last_name`, `email`, `available_payment`, `telephone`, `address_en`, `address_ar`, `description_en`, `description_ar`, `status`, `min_amount`, `working_hour_from`, `working_hour_to`, `deliver_time_from`, `deliver_time_to`, `deliver_charge`, `rating`, `show_menu`, `order_accept_days`, `offline_order`, `summary_en`, `summary_ar`, `url`, `img`, `commission_type`, `discount_type`, `discount`, `area_id`, `follow_us`, `notification`, `long`, `lat`, `created_at`, `updated_at`) VALUES
(3, 'landy', 'sfdj', 0, 'landy', 'landy', 'landy@gmail.com', '', '0785181656', 'lkj', 'lj', 'lj', 'lk', 1, '30', '12:00', '19:35', '00:00', '18:30', '1', 0, 0, 0, 0, 'kj', 'lkj', '/', '/files/17350_24455res1.jpg', 0, 0, 'klj', 6, 0, 1, '35.9391932', '31.9466904', '2017-05-18 07:31:26', '2017-06-07 19:47:30'),
(4, 'MCDonald', 'ماك', 0, 'taylor', 'successor', 'taylorsuccessor@gmail.com', 'knet,visa, cash ', '0785181656', 'address restaurant 1', 'عنوان 1', 'description restaurant 1', 'شرح المطعم 1', 1, '21.32', '08:00:00', '16:00:00', '09:00:00', '15:00:00', '2.5', 4, 1, 7, 1, 'summary restaurant 1', 'مختصر المطعم 1', '/assets/website/images/img_order1.jpg', '/files/18952_9633res4.jpg', 1, 1, '10', 3, 0, 1, '35.9754138', '31.9897962', '2017-05-19 14:26:54', '2017-06-14 22:41:02'),
(5, 'Pizza Hut', 'بيتزا', 0, 'owner name', 'yosif', 'yosit@pizza.com', 'knet,visa, cash ', '0785181656', '', 'عنوان بيتزا', '', 'بيتزا', 1, '10', '08:00', '23:55', '08:43', '16:43', '1', 0, 1, 3, 1, '', 'بيتزا', '/', '/files/1078_28471Pizza_Hut_logo.svg.png', 0, 0, '1', 3, 0, 0, '35.9089808', '31.9823706', '2017-06-07 17:52:09', '2017-06-07 19:34:31'),
(6, 'Burger King', 'برقر', 0, 'jon', 'land', 'jon@pros.com', 'knet,visa, cash ', '0096182783468', '', '', '', '', 1, '13', '05:25', '17:52', '08:00', '17:52', '1', 3, 1, 2, 1, '', '', '/', '/files/19620_18957res3.jpg', 0, 1, '1', 4, 0, 0, '35.8969645', '31.938096', '2017-06-07 17:57:06', '2017-06-14 22:38:18'),
(7, 'Johnny Rockets', 'Rockets', 0, 'kali', 'jonson', 'kali@produ.com', '', '0785181656', '', '', '', '', 1, '12', '17:57', '17:57', '00:00', '22:50', '1', 0, 1, 4, 0, '', '', '/', '/files/11714_18387img_order1.jpg', 1, 1, '1', 5, 0, 1, '35.9074359', '31.9056047', '2017-06-07 18:04:54', '2017-06-07 21:16:58'),
(8, 'KFC', 'KFC', 0, 'kfc', 'kfc', 'kfc@kfc.com', '', '0785181656', '', '', '', '', 1, '30', '10:50', '18:07', '10:50', '18:07', '1', 0, 1, 2, 1, '', '', '/', '/files/506_13227res2.jpg', 0, 1, '20', 7, 0, 1, '35.8988528', '31.9462535', '2017-06-07 18:11:01', '2017-06-07 19:46:15'),
(9, 'hkj', NULL, 0, 'j', 'hj', 'kjh', NULL, 'jhkj', 'hk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, '', '', '2017-06-14 00:49:44', '2017-06-15 23:46:31'),
(10, 'sahalat', 'sahalat', 0, 'sahalat', 'sahalat', 'info@sahalat.com', 'sahalat', '346346', '', '', '', '', 0, '1', '13:34', '13:34', '13:34', '13:34', '1', 5, 0, 0, 0, '', '', '/', '/files/12050_14051logo.png', 0, 0, '0', 3, 0, 0, '', '', '2017-06-15 13:36:37', '2017-06-15 13:36:37'),
(12, 'e;djf', 'sdfsdf', 0, 'j', 'hoih', 'oih', 'kl', 'oh', '', '', '', '', 0, 'ij', 'oijoi', 'ho', 'ho', 'h', 'ou', 0, 0, 0, 0, '', '', 'iho', 'ih', 0, 0, 'ho', 3, 0, 0, '', '', '2017-06-15 23:35:53', '2017-06-15 23:35:53'),
(13, 'kjoj', 'kjhh', 0, 'lkjlkj', 'lkj', 'lkj', 'jh', 'lk', '', '', '', '', 0, 'kjh', 'kjh', 'kj', 'hk', 'jh', 'kjhkj', 0, 0, 0, 0, '', '', 'hk', 'jh', 0, 0, 'kj', 3, 0, 1, '36.139397621154785', '32.08908302965641', '2017-06-15 23:37:57', '2017-06-15 23:42:04'),
(14, 'kjkjkj', 'lknjlkjl', 0, 'kmlk', 'lkmlk', 'mlkm', 'lkjl', 'lkm', '', 'kjlkj', '', 'lkj', 0, 'jl', 'kj', 'lkj', 'lkj', 'lk', 'jlk', 0, 0, 0, 0, '', 'lkj', 'jlk', 'jlk', 0, 0, 'lkj', 3, 0, 0, '36.11081600189209', '32.083738118953725', '2017-06-15 23:39:57', '2017-06-15 23:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_area`
--

CREATE TABLE `restaurant_area` (
  `id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `delivery_charges` varchar(255) DEFAULT NULL,
  `sahalat_charge` varchar(255) DEFAULT NULL,
  `min_amount` varchar(255) DEFAULT NULL,
  `deliver_time_from` varchar(20) DEFAULT NULL,
  `deliver_time_to` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `governorate_id` int(11) NOT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant_area`
--

INSERT INTO `restaurant_area` (`id`, `area_id`, `restaurant_id`, `delivery_charges`, `sahalat_charge`, `min_amount`, `deliver_time_from`, `deliver_time_to`, `status`, `governorate_id`, `created_at`, `updated_at`) VALUES
(1, 4, 4, '12', '2', '13', '08:00:00', '16:00:00', 0, 3, '2017-05-26 22:20:50', '2017-05-26 22:20:50'),
(2, 3, 4, '3', '2', '100', '09:00', '14:00', 0, 3, '2017-05-29 10:54:29', '2017-05-29 11:10:37'),
(3, 3, 4, '4', '6', '90', '08:00:00', '16:00:00', 0, 3, '2017-05-30 08:41:58', '2017-05-30 08:41:58'),
(4, 3, 4, '1', '2', '12', '00:00', '18:00:00', 0, 3, '2017-06-02 11:17:16', '2017-06-02 11:17:16'),
(5, 3, 3, 'g', 'dg', 'f', '08:00', '18:00:00', 0, 3, '2017-06-15 23:19:10', '2017-06-15 23:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_cuisine`
--

CREATE TABLE `restaurant_cuisine` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `cuisine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant_cuisine`
--

INSERT INTO `restaurant_cuisine` (`id`, `restaurant_id`, `cuisine_id`) VALUES
(1, 4, 2),
(2, 4, 1),
(3, 3, 2),
(4, 5, 2),
(5, 5, 3),
(6, 6, 4),
(7, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_notification`
--

CREATE TABLE `restaurant_notification` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `order_status` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_offer`
--

CREATE TABLE `restaurant_offer` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_rate`
--

CREATE TABLE `restaurant_rate` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `notification` int(11) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant_rate`
--

INSERT INTO `restaurant_rate` (`id`, `users_id`, `restaurant_id`, `rate`, `description`, `status`, `notification`, `created_at`, `updated_at`) VALUES
(1, 31, 9, 3, 'description this is description', 1, 1, '2017-06-02 07:47:24', '2017-06-03 00:45:20'),
(2, 91, 4, 2, 'skdf asldkfjasdkfj', 1, 1, '2017-06-14 16:36:32', '2017-06-14 17:53:52'),
(3, 82, 4, 5, 'vsfdv', 0, 1, '2017-06-14 17:54:47', '2017-06-14 22:41:02'),
(4, 82, 6, 3, 'lksjdf', 0, 0, '2017-06-14 22:38:14', '2017-06-14 22:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_users`
--

CREATE TABLE `restaurant_users` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant_users`
--

INSERT INTO `restaurant_users` (`id`, `users_id`, `restaurant_id`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 82, 10, 0, 4, '2017-05-19 14:40:20', '2017-06-15 14:01:17'),
(2, 13, 4, 0, 1, '2017-06-02 08:43:57', '2017-06-02 08:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `deny_permissions` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `deny_permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '|*.*.*.*', '|', '2016-03-28 13:25:48', '2017-03-23 02:56:17'),
(3, 'client', 'Client', '|', '', '2017-03-22 21:52:50', '2017-03-22 21:52:50'),
(4, 'public', 'public', '|*.*.*.*', '', '2017-03-22 22:15:21', '2017-03-22 22:15:21'),
(9, 'driver', 'driver', '|dashboard.*.*.*|admin.delivery_menu.*.*|admin.order_driver.*.*|admin.order.*.*', '|*.*.otherData.*|*.*.allData.*|*.order.create.*', '2017-06-04 14:18:53', '2017-06-04 20:11:25'),
(10, 'dispatcher', 'dispatcher', '|*.address.*.*|*.order_driver.*.*|*.service_company_order.*.*|*.service_company.index.*|dashboard.*.*.*|*.*.groupData.*|*.order.*.*|*.cart.*.*|*.*.deliverMap.*|*.*.map.*|*.*.allmap.*|*.service_company_order_service.*.*', '|*.*.userData.*', '2017-06-05 10:47:26', '2017-06-15 21:54:54'),
(11, 'sahalatdriver', 'sahalatdriver', '|*.address.*.*|*.order.*.*|*.order_driver.*.*|*.*.allData.*|dashboard.*.*.*|*.*.map.*|*.*.allmap.*|*.*.deliverMap.*|*.service_company_order_service.*.*', '|*.*.userData.*', '2017-06-05 15:16:18', '2017-06-15 21:56:27'),
(12, 'restaurant-manager', 'restaurant manager', '|*.restaurant.*.*|*.*.groupData.*|*.restaurant_area.*.*|*.restaurant_users.*.*|*.order_driver.*.*|*.cart.*.*|*.order.*.*|*.payment.*.*|*.dish_rate.*.*|*.dish.*.*|*.menu_section.*.*|dashboard.*.*.*|*.restaurant_cuisine.*.*', '|*.*.allData.*', '2017-06-05 15:23:02', '2017-06-05 15:23:02'),
(13, 'call-center', 'call center', '|dashboard.*.*.*|*.dish_rate.*.*|*.restaurant_rate.*.*|*.contact_us.*.*|*.order.*.*|*.order_driver.*.*|*.*.groupData.*', '|*.*.create.*|*.*.allData.*', '2017-06-05 18:34:30', '2017-06-05 18:35:52'),
(14, 'cms', 'cms', '|*.cms.*.*|*.contact_us.*.*|*.banner.*.*|dashboard.*.*.*', '|', '2017-06-05 18:40:47', '2017-06-05 18:40:47'),
(15, 'guest', 'guest', '|', '|', '2017-06-07 09:39:24', '2017-06-07 09:39:24'),
(16, 'block', 'block', '|', '|*.*.*.*', '2017-06-15 21:50:05', '2017-06-15 21:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(4, 3, NULL, NULL),
(13, 9, NULL, NULL),
(15, 10, NULL, NULL),
(16, 12, NULL, NULL),
(19, 1, NULL, NULL),
(79, 1, NULL, NULL),
(80, 1, NULL, NULL),
(80, 3, NULL, NULL),
(81, 3, NULL, NULL),
(82, 1, NULL, NULL),
(82, 3, NULL, NULL),
(97, 3, '2017-06-07 09:39:51', '2017-06-07 09:39:51'),
(97, 15, '2017-06-07 09:39:51', '2017-06-07 09:39:51'),
(98, 3, '2017-06-07 10:04:00', '2017-06-07 10:04:00'),
(98, 15, '2017-06-07 10:04:00', '2017-06-07 10:04:00'),
(99, 3, '2017-06-07 10:05:27', '2017-06-07 10:05:27'),
(99, 15, '2017-06-07 10:05:27', '2017-06-07 10:05:27'),
(100, 3, '2017-06-08 06:34:31', '2017-06-08 06:34:31'),
(100, 15, '2017-06-08 06:34:31', '2017-06-08 06:34:31'),
(101, 3, '2017-06-11 06:41:14', '2017-06-11 06:41:14'),
(101, 15, '2017-06-11 06:41:14', '2017-06-11 06:41:14'),
(102, 3, '2017-06-11 07:58:45', '2017-06-11 07:58:45'),
(102, 15, '2017-06-11 07:58:45', '2017-06-11 07:58:45'),
(103, 3, '2017-06-11 10:41:58', '2017-06-11 10:41:58'),
(103, 15, '2017-06-11 10:41:58', '2017-06-11 10:41:58'),
(104, 3, '2017-06-15 06:45:35', '2017-06-15 06:45:35'),
(104, 15, '2017-06-15 06:45:36', '2017-06-15 06:45:36'),
(105, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name_en`, `name_ar`) VALUES
(1, 'first service', 'الخدمة الأولى'),
(2, 'oil change', 'تغيير زيت');

-- --------------------------------------------------------

--
-- Table structure for table `service_boy`
--

CREATE TABLE `service_boy` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `service_company_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_boy`
--

INSERT INTO `service_boy` (`id`, `users_id`, `manager_id`, `service_company_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 34, 13, 2, 0, '2017-06-02 15:30:42', '2017-06-02 15:30:42'),
(2, 13, 13, 1, 0, '2017-06-02 15:51:25', '2017-06-02 15:51:25'),
(3, 66, 13, 1, 0, '2017-06-12 20:49:03', '2017-06-12 20:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `service_company`
--

CREATE TABLE `service_company` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_company`
--

INSERT INTO `service_company` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'service company 1', '2017-06-02 15:24:39', '2017-06-02 15:24:39'),
(2, 'service company 2', '2017-06-02 15:24:57', '2017-06-02 15:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `service_company_order`
--

CREATE TABLE `service_company_order` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `service_company_id` int(11) NOT NULL,
  `service_boy_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `notification` int(11) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_company_order`
--

INSERT INTO `service_company_order` (`id`, `users_id`, `service_company_id`, `service_boy_id`, `description`, `status`, `notification`, `created_at`, `updated_at`) VALUES
(1, 13, 2, 1, 'jojo', 0, 0, '2017-06-02 15:40:06', '2017-06-02 15:40:06'),
(2, 13, 1, 1, 'kkhk', 0, 1, '2017-06-02 15:40:25', '2017-06-12 20:20:16'),
(3, 66, 1, 82, 'jkb', 0, 1, '2017-06-02 15:40:54', '2017-06-12 19:55:14'),
(4, 82, 1, 1, 'hhjhk', 0, 1, '2017-06-02 15:41:19', '2017-06-04 13:07:23'),
(5, 20, 1, 8, 'fgjfgjfg', 4, 1, '2017-06-08 10:33:19', '2017-06-11 14:13:58'),
(6, 13, 1, 1, '', 0, 1, '2017-06-12 13:07:36', '2017-06-12 13:07:44'),
(7, 20, 2, 7, 'sssssssssssss', 0, 1, '2017-06-12 13:35:41', '2017-06-12 19:54:32'),
(8, 20, 2, 82, 'sssssssssssss', 0, 1, '2017-06-12 13:37:29', '2017-06-12 13:37:38'),
(9, 0, 1, 1, '', 0, 1, '2017-06-12 17:33:07', '2017-06-12 19:49:41'),
(10, 82, 2, 1, 'fsf', 0, 1, '2017-06-12 19:50:18', '2017-06-12 19:54:11'),
(11, 0, 1, 0, 'ddddddddd', 0, 1, '2017-06-12 20:09:23', '2017-06-12 20:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `service_company_order_service`
--

CREATE TABLE `service_company_order_service` (
  `id` int(11) NOT NULL,
  `service_company_order_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_company_order_service`
--

INSERT INTO `service_company_order_service` (`id`, `service_company_order_id`, `service_id`) VALUES
(1, 8, 1),
(2, 8, 2),
(3, 9, 1),
(4, 9, 2),
(5, 10, 1),
(6, 10, 2),
(10, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `uid` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `oauth1_token_identifier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth1_token_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth2_access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth2_refresh_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth2_expires` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `user_id`, `uid`, `provider`, `oauth1_token_identifier`, `oauth1_token_secret`, `oauth2_access_token`, `oauth2_refresh_token`, `oauth2_expires`, `created_at`, `updated_at`) VALUES
(1, 82, '104567598488922195517', 'google', NULL, NULL, 'ya29.GlthBOkiU0n6vxju6Yh7tYq63rR6C6ecCoBBiLvnG47e3N4Og0WT9csE2BSXjoxAQ27f8m3XKSOxWsHPv4QxRLXHEsW0yFDAWK-P_2iMf92sqUZmHyCsrS-3_wIB', NULL, '2017-06-06 20:20:19', '2017-06-06 19:03:42', '2017-06-06 19:20:21'),
(2, 82, 'zTEUdqQbCS', 'linkedin', NULL, NULL, 'AQWwCGOLQnAychcJ4MReXD9i0sE8xL_URVMRs9Ys9YoriCmPRfjAR5FI74cqvMZ-yK2z7d65W_rTatI2q3XlOGro7QAdEW_ORwDBwH52ltuztt8Y4XGo7aNgs4gj8hxm9MSkHKWOt1Q2YsSBd8wSC9e1JMOQUv1AuOj2Q0B6dHbQFQKCOLQ', NULL, '2017-08-07 07:57:37', '2017-06-06 19:16:24', '2017-06-08 07:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2017-05-21 10:55:01', '2017-05-21 10:55:01'),
(2, NULL, 'ip', '192.168.100.11', '2017-05-21 10:55:01', '2017-05-21 10:55:01'),
(3, NULL, 'global', NULL, '2017-05-23 05:48:01', '2017-05-23 05:48:01'),
(4, NULL, 'ip', '192.168.100.11', '2017-05-23 05:48:01', '2017-05-23 05:48:01'),
(5, 92, 'user', NULL, '2017-05-23 05:48:01', '2017-05-23 05:48:01'),
(6, NULL, 'global', NULL, '2017-06-06 20:33:33', '2017-06-06 20:33:33'),
(7, NULL, 'ip', '::1', '2017-06-06 20:33:33', '2017-06-06 20:33:33'),
(8, 82, 'user', NULL, '2017-06-06 20:33:33', '2017-06-06 20:33:33'),
(9, NULL, 'global', NULL, '2017-06-06 20:44:27', '2017-06-06 20:44:27'),
(10, NULL, 'ip', '::1', '2017-06-06 20:44:27', '2017-06-06 20:44:27'),
(11, 82, 'user', NULL, '2017-06-06 20:44:27', '2017-06-06 20:44:27'),
(12, NULL, 'global', NULL, '2017-06-06 20:44:35', '2017-06-06 20:44:35'),
(13, NULL, 'ip', '::1', '2017-06-06 20:44:35', '2017-06-06 20:44:35'),
(14, 82, 'user', NULL, '2017-06-06 20:44:35', '2017-06-06 20:44:35'),
(15, NULL, 'global', NULL, '2017-06-06 20:44:44', '2017-06-06 20:44:44'),
(16, NULL, 'ip', '::1', '2017-06-06 20:44:44', '2017-06-06 20:44:44'),
(17, 82, 'user', NULL, '2017-06-06 20:44:44', '2017-06-06 20:44:44'),
(18, NULL, 'global', NULL, '2017-06-06 20:45:59', '2017-06-06 20:45:59'),
(19, NULL, 'ip', '::1', '2017-06-06 20:45:59', '2017-06-06 20:45:59'),
(20, 82, 'user', NULL, '2017-06-06 20:45:59', '2017-06-06 20:45:59'),
(21, NULL, 'global', NULL, '2017-06-07 14:42:53', '2017-06-07 14:42:53'),
(22, NULL, 'ip', '::1', '2017-06-07 14:42:53', '2017-06-07 14:42:53'),
(23, NULL, 'global', NULL, '2017-06-15 21:47:10', '2017-06-15 21:47:10'),
(24, NULL, 'ip', '::1', '2017-06-15 21:47:10', '2017-06-15 21:47:10'),
(25, NULL, 'global', NULL, '2017-06-15 21:48:48', '2017-06-15 21:48:48'),
(26, NULL, 'ip', '::1', '2017-06-15 21:48:48', '2017-06-15 21:48:48'),
(27, NULL, 'global', NULL, '2017-06-15 21:48:54', '2017-06-15 21:48:54'),
(28, NULL, 'ip', '::1', '2017-06-15 21:48:54', '2017-06-15 21:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` blob,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `occupation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `session_id` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `long` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `avatar`, `mobile`, `phone`, `gender`, `occupation`, `type`, `session_id`, `lat`, `long`, `created_at`, `updated_at`) VALUES
(13, 'driver@sahalat.com', '$2y$10$QMDdN.pWvXD81YyB0Aafm.MUTMebeH1i/LK4nVb2bv3E8AoqGirDS', NULL, '2017-06-08 07:16:12', 'first name', 'last name', NULL, '', '', 0, '', 0, '', 31.95557172, 35.83669424, '2016-05-01 13:01:21', '2017-06-08 07:16:12'),
(15, 'dispatcher@sahalat.com', '$2y$10$.YBEnmlyQ30lycw..YHOcuyZsFvvrFxEN7NiUW/Vm49LboErg1znC', NULL, '2017-06-08 06:57:15', NULL, ': admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:04:34', '2017-06-08 06:57:15'),
(16, 'restaurant@sahalat.com', '$2y$10$qVF5MuFwYsMZ4.73HaFk5.uCpKYkddFqIRRMg8dd7qLiNvLpOBvLe', NULL, '2017-06-08 06:26:31', 'restaurant', 'kfc', NULL, '', '', 0, '0', 0, '', 0, 0, '2016-05-01 13:05:12', '2017-06-08 06:26:31'),
(17, 'admin@admin7.com', '$2y$10$6YDAKpvtDaQy.QcH1wdV3uOZueFCAAFqn8JeiZowDVL8hqwHW/eGK', NULL, NULL, ': admin firstName', ': admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:11:23', '2016-05-01 13:11:23'),
(18, 'admintest@admin.com', '$2y$10$F8E6o6rlUgxh9xd49aDI..DnnsGKZ..10uFxqSYJ109ck8H0.UyWS', NULL, '2016-05-01 13:22:35', 'adminTest', 'Test', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:12:22', '2016-05-01 13:22:35'),
(19, 'admin@admi.com', '$2y$10$bCnkSmJrDVQtYkCU2Rh30.21yqyw/M9WQ2J2CkIoSe/Yls6zddmSK', NULL, '2017-06-07 08:42:50', 'A first', 'b Second', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:14:07', '2017-06-07 08:42:50'),
(20, 'admin@admin9.com', '$2y$10$33PXn.qz2Ktm48z7xgziK.8scy0wu5IMZli0/QODg1k.ntaU0PzCi', NULL, '2016-05-01 13:18:01', ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:17:20', '2016-05-01 13:18:01'),
(21, 'admin@admina.com', '$2y$10$Y3Ht/J9B5VozrTqmerM8veTjIiF0GEcegPHuRyB5c7l3RGnmyi1KG', NULL, '2016-05-01 13:23:05', ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:22:34', '2016-05-01 13:23:05'),
(22, 'admin@adminb.com', '$2y$10$WNjXQg8y8abXr4lZItJxCueIR3qHJquO3MVExTM98zz9QTqXOsFKy', NULL, NULL, ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:28:23', '2016-05-01 13:28:23'),
(23, 'admin@adminc.com', '$2y$10$KD4oByWVRd4VkcJhTHhBGOeBmDaRAE/DiyqF/XydG/BvOtQ.NlmM6', NULL, NULL, ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:28:54', '2016-05-01 13:28:54'),
(24, 'admin@admind.com', '$2y$10$fCblwhGnZfN54Vukn4hPS.g5LpCzzg8hA.c8XNHokf7id2bqTyGlu', NULL, NULL, ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:29:13', '2016-05-01 13:29:13'),
(25, 'ddd@ddd.ddd', '$2y$10$orGG6KvMrH4TO1agzzSmvupHecZgciUHbO2r6.gzrQeLZQaBEpdGK', NULL, '2016-05-01 13:33:53', 'asdf', 'sf', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:33:39', '2016-05-01 13:33:53'),
(26, 'admin@admine.com', '$2y$10$M.KIZXmo.0Ox/BwwkXnjteR8ck0uWIf0dewsRj01njcvnThiWx9s2', NULL, '2016-05-01 13:36:36', ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:35:54', '2016-05-01 13:36:36'),
(27, 'admin@adminv.com', '$2y$10$/tp9OFQq2vbsf.63/JFY5eKKDSKkmlfIiFks7TNPaTD6eL52mvs.y', NULL, NULL, ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:46:24', '2016-05-01 13:46:24'),
(28, 'admin@adminz.com', '$2y$10$z6RFdmsA.kdgpMujELpBouYMLl2/XiciDrdX1O4DkzylfMT/Zybje', NULL, '2016-05-01 13:47:29', ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:46:55', '2016-05-01 13:47:29'),
(29, 'admin@adminx.com', '$2y$10$ozdl9T7dMl.W/G64tU1cNuFJk30xj7VfZtri26QQl/s1q.W16Gsy2', NULL, NULL, ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:48:29', '2016-05-01 13:48:29'),
(30, 'admin@admink.com', '$2y$10$fPBKMa4PpH7cyb9Keby.EOU8B8Oe0hmXpwmGQLFR5EOvo1MUda57C', NULL, NULL, ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:49:41', '2016-05-01 13:49:41'),
(31, 'admin@admint.com', '$2y$10$MUZSx0j9aOmMMVplFosSE.8lVQjIdGL2m6WEt.zuuy8HFq844TV.K', NULL, NULL, ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:49:57', '2016-05-01 13:49:57'),
(33, 'admin@admintt.com', '$2y$10$TgyW12bN1zRrTLCVhOEN5.1pVKdCuMP2INgwGZ0wAF2uuiAGf4/DW', NULL, NULL, ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:50:38', '2016-05-01 13:50:38'),
(34, 'admin@admintx.com', '$2y$10$SqwIYTitU.eUORVnneZnAO/uLXnveMMUvSKQvXH2PmLuoUNkWEu1S', NULL, NULL, ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:50:47', '2016-05-01 13:50:47'),
(35, 'admin@adminthx.com', '$2y$10$KbTUhocfRRpr.TkQaBPEwu/NX0j/VLBltUyW.2QrhTCoCQ/SVkCjm', NULL, NULL, ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:53:10', '2016-05-01 13:53:10'),
(36, 'admin@admjinthx.com', '$2y$10$EpscExd4AFgDqFo44FitLu7Qen.ViLsopDvs93CFqC./ccAAk4rTS', NULL, NULL, ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:53:16', '2016-05-01 13:53:16'),
(37, 'admin@ajdmjinthx.com', '$2y$10$Hi.7Wj0bgELIKRrtUR8afeVRDvpXsKOJHSIYu3oir3YS9TE6SQwGW', NULL, NULL, ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 13:53:24', '2016-05-01 13:53:24'),
(38, 'admin@ajdmjintfhx.com', '$2y$10$tpU.G8mawQvrLAEvPsEm/u3uXKfpsu0h3tVXvsv2UWLT9Vri7wC1.', NULL, NULL, ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 14:02:28', '2016-05-01 14:02:28'),
(39, 'admin1@admin.com', '$2y$10$LWCNmqpRdS6PQA6Kq3VuOu7WIqKsSmQk6rgIGz.ICeTb8qvElTbmy', NULL, '2016-05-01 14:08:17', ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 14:07:24', '2016-05-01 14:08:17'),
(40, 'admin3@admin.com', '$2y$10$Jrnm/CmeA9oT6MGbEvRk4OIwjsZ8XnIo2/aBYyJaVLamo.3.RY/42', NULL, '2016-05-01 14:11:17', ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 14:10:48', '2016-05-01 14:11:17'),
(41, 'admin4@admin.com', '$2y$10$2HeUvzgoooi9tvSeEn3aRegPVXC4EnX4KYf0Ic8IDe/8WXSCjVZGu', NULL, NULL, ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 14:14:07', '2016-05-01 14:14:07'),
(43, 'admin5@admin.com', '$2y$10$dTp2sKdyofdp4N.eS3scx.HRnSt6.cCkIdWysOAuDhKp5kI6SF2Ae', NULL, '2016-05-01 14:15:54', ' admin firstName', ' admin last_name', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 14:14:43', '2016-05-01 14:15:54'),
(44, 'admin6@admin.com', '$2y$10$zdBqpmXqpujNPalq6.W5meP0zIRuf/XYT1BkmuICJQHho1UO4BGPW', NULL, NULL, 'first', 'last', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-01 14:17:26', '2016-12-26 10:00:02'),
(64, 'abdalfattah.hammad@yahoo.com', '$2y$10$R6gGLALtsBIs7BWSkVzche5XURZ9k671XFbQ22g1Mrsmp.NW1YyGi', '', '2016-05-29 06:47:05', 'abdalfattah', 'hammad', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-24 08:38:45', '2016-05-29 06:47:05'),
(66, 'taylorsuccessor1@gmail.com', '$2y$10$FGuj819KqAmJNMIxi5qWne/qyvT8SpUhlrgGDJXkKjkYf597RgMby', '{\"user.denyLiveAccount\":true}', NULL, 'taylor', 'successor', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-25 13:05:11', '2016-05-25 13:05:16'),
(67, 'dfsa@ragf.com', '$2y$10$gMS96cK40k52LuVk7BDj2.lCjmrR.htpHH2jvZSw8Vsj/SEieeIoi', '{\"user.denyLiveAccount\":true}', NULL, 'weq', 'ewqrew', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-29 11:28:02', '2016-05-29 11:28:06'),
(68, 'sdaflh@dfs.com', '$2y$10$cE9o/HVrD0xKwQ435xf.o.FruuEBvkhtK9zzzO4wY.zAkiRRjeARG', '{\"user.denyLiveAccount\":true}', NULL, 'dfs', 'asfd', NULL, '', '', 0, '', 0, '', 0, 0, '2016-05-29 11:29:44', '2016-05-29 11:29:49'),
(70, 'taylorsuccessor2@gmail.com', '$2y$10$WOOk/daK6a37/0Z0vQStX.HmvuSJRF7jDQm3LBRPuLzKEECApIwTi', '{\"user.denyLiveAccount\":true}', NULL, 'sdf', 'sdfsdf', NULL, '', '', 0, '', 0, '', 0, 0, '2016-06-12 10:40:00', '2016-06-12 10:40:05'),
(71, 'taylorsuccessor3@gmail.com', '$2y$10$vEuPJ4u3ZzRIDaNwVTg.MObXT64Wjk840AF96e.EPbnY4nGR9H7Wq', '{\"user.denyLiveAccount\":true}', NULL, 'sdfs', 'dfgdfg', NULL, '', '', 0, '', 0, '', 0, 0, '2016-06-12 10:42:49', '2016-06-12 10:42:54'),
(72, 'taylorsuccessor4@gmail.com', '$2y$10$vyw6J2fgdFtchWsjQdV2EuhnEDmyfpX9p0Fb0SqH1LqgP6S0Uxxqu', '{\"user.denyLiveAccount\":true}', '2016-06-12 12:37:46', 'Test', '', NULL, '', '', 0, '', 0, '', 0, 0, '2016-06-12 12:37:46', '2016-06-12 12:37:52'),
(73, 'taylorsuccessor5@gmail.com', '$2y$10$aQ69hOigVigdEDLPIaJXO.KaXSkjVorqJv4hRNe1n.0cRhpF8hkT6', '{\"user.denyLiveAccount\":true}', '2016-06-12 12:46:28', 'Test', '', NULL, '', '', 0, '', 0, '', 0, 0, '2016-06-12 12:46:27', '2016-06-12 12:46:33'),
(74, 'taylorsuccessor6@gmail.com', '$2y$10$DOKqv/T4Hn6p6VCB496W8usXxtsdARnjMe/B6HsLCxcNWFmGvz9aq', '{\"user.denyLiveAccount\":true}', '2016-06-12 12:53:44', 'Test', '', NULL, '', '', 0, '', 0, '', 0, 0, '2016-06-12 12:53:44', '2016-06-12 12:53:49'),
(77, 'hbhuy', '$2y$10$SgJ2cJm/NXnCU0B.4/Ya3emRjKeBI77eHP7osCXYQfHdWNxvx7/kO', NULL, NULL, 'gfy', 'tyf', NULL, '', '', 0, '', 0, '', 0, 0, '2017-03-22 03:59:03', '2017-03-22 03:59:03'),
(78, 'vv', '$2y$10$g.bIACByPTjl.3GNq5TEm.XEdealK44IeAR8JSjcX4DZbXIshD7sm', NULL, NULL, 'vvvv', 'vvv', NULL, '', '', 0, '', 0, '', 0, 0, '2017-03-22 21:43:26', '2017-03-22 21:43:26'),
(79, 'test admin', '$2y$10$W4wwHxfeWRTX0N35zqpiru0tBjHGI6zLBsfaSmhGK3VWKoc3ieQ82', NULL, NULL, 'ffff', 'fffffff', NULL, '', '', 0, '', 0, '', 0, 0, '2017-03-22 21:54:59', '2017-03-22 21:54:59'),
(80, 'dfgsdfg', '$2y$10$vLQ5jLvll4mU0CA.6PNZM.qZzchaZ7BXdS03coY/SFEI2KlmqbUY.', NULL, NULL, 'dfgsdfg', 'gsdfg', NULL, '', '', 0, '', 0, '', 0, 0, '2017-03-22 21:55:47', '2017-03-22 21:55:47'),
(81, 'bbbbbbbbbb', '$2y$10$bBU./jpORO7jyZYlsNjeKubcu38Pv9PyDlYmQaHWaiL67Qvb5p7Fi', NULL, NULL, NULL, 'cvbcvb', NULL, '', '', 0, '', 0, '', 0, 0, '2017-03-22 21:58:12', '2017-03-22 21:58:12'),
(82, 'taylorsuccessor@gmail.com', '$2y$10$Bzx1t/8iNtjE4NRUEb1xruK2HMPXCLs5jO4YVUsgCg4IMuSeJEbeW', NULL, '2017-08-15 08:52:53', 'taylor', 'successor', NULL, '11111111111', '222222222', 1, '1', 0, '', 31.9799521, 35.8746053, '2017-05-20 12:18:06', '2017-08-15 08:52:53'),
(83, 'asfd@sdf.sdf', 'admin', NULL, NULL, 'asdf', 'ksjdf', NULL, '', '', 0, '', 0, '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'asfd@sddsf.sdf', 'admin', NULL, NULL, 'asdf', 'ksjdf', NULL, '', '', 0, '', 0, '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'asfd@sddddsf.sdf', 'admin', NULL, NULL, 'asdf', 'ksjdf', NULL, '', '', 0, '', 0, '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'asfad@sddddsf.sdf', 'admin', NULL, NULL, 'asdf', 'ksjdf', NULL, '', '', 0, '', 0, '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'asdf@sdf.sdf', 'admin', NULL, NULL, 'admin', 'adin', NULL, '234324', '234234', 0, '1', 0, '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'slkdfj@sdf.sdf', '$2y$10$sh.w238mR9.TxyQoQittrucX71gbfEhkdkCQRtLg2X6bBs8k1jPbK', NULL, '2017-05-23 02:46:15', 'aslkdfj', 'skldfj', NULL, '', '', 0, '', 0, '', 0, 0, '2017-05-22 09:22:12', '2017-05-23 02:46:15'),
(90, 'rrrrrrrrr@rrrrrrr.rrrr', '$2y$10$/048LG5QGvzXeBziesRQVOPGhJ6RjxAK4Ub461IQI0bRLbxPB2Kpy', NULL, NULL, 'rrrrrr', 'rrrrrr', NULL, '', '', 0, '', 0, '', 0, 0, '2017-05-23 04:55:32', '2017-05-23 04:55:32'),
(91, 'rrrrrrrrrrrr@rrrrrrr.rrrr', 'admin', NULL, NULL, 'rrrrrr', 'rrrrrr', NULL, '34534345', '3534534', 0, '0', 0, '', 0, 0, '2017-05-23 04:57:03', '2017-05-23 04:57:03'),
(92, 'rrrrrrrrr@rr.rrr', 'admin', NULL, NULL, 'rrrrrr', 'rrrrrr', NULL, '34534345', '3534534', 0, '0', 0, '', 0, 0, '2017-05-23 04:58:10', '2017-05-23 04:58:10'),
(93, 'sdf@ddd.vdf', 'admin', NULL, NULL, 'sdf', 'sdf', NULL, '234', '24234', 0, '1', 0, '', 0, 0, '2017-05-26 13:40:50', '2017-05-26 13:40:50'),
(94, 'gest_32126656_80530962@sahalat.com', '$2y$10$BqQVbnq.f.PTEV/Dw6h1UeQup3bsC6brkuXaSjCXY0B56Wd7uoL6G', NULL, '2017-06-03 15:19:33', NULL, NULL, NULL, '', '', 0, '', 0, '', 0, 0, '2017-06-03 15:19:33', '2017-06-03 15:19:33'),
(95, 'gest_16718495_21294603@sahalat.com', '$2y$10$6jHZpO5EgT/fMNx4Jxt5VOd/6FoBw2T3dALpLD89zes6bCl6yaLiG', NULL, '2017-06-03 17:41:35', NULL, NULL, NULL, '', '', 0, '', 0, '', 0, 0, '2017-06-03 17:41:35', '2017-06-03 17:41:35'),
(96, 'gest_83994293_69461111@sahalat.com', '$2y$10$q73d0BT8HrGuYv5QslFSuOoteAaRCeOK5jwdxGNi9IuORXKZD.98W', NULL, '2017-06-06 06:39:22', NULL, NULL, NULL, '', '', 0, '', 0, '', 0, 0, '2017-06-06 06:39:22', '2017-06-06 06:39:22'),
(97, 'guest_94801956_72110436@sahalat.com', '$2y$10$Tuh13OEUbg/X/juxuxD0BOl.SMIsvgSjsKjqKJObIDB/4evFBGs22', NULL, '2017-06-07 09:39:51', NULL, NULL, NULL, '', '', 0, '', 0, '', 0, 0, '2017-06-07 09:39:51', '2017-06-07 09:39:51'),
(98, 'guest_94292822_40028902@sahalat.com', '$2y$10$/uWVVDqC9XxR9XxyM6YtG.ZdUV9EOV/QLMtcxys4T/KYK97.f7J1K', NULL, '2017-06-07 10:04:00', NULL, NULL, NULL, '', '', 0, '', 0, '', 0, 0, '2017-06-07 10:04:00', '2017-06-07 10:04:00'),
(99, 'guest_69479403_62324090@sahalat.com', '$2y$10$Uub6FsOWsFqnvnLVmRl0t.slKv1flNmn4QTnwyyS174n9BVLJoDFS', NULL, '2017-06-07 10:05:27', NULL, NULL, NULL, '', '', 0, '', 0, '', 0, 0, '2017-06-07 10:05:27', '2017-06-07 10:05:27'),
(100, 'guest_3947466_60632058@sahalat.com', '$2y$10$Y.Z5q6li7YHFT/U35kyfQ.RpnGiZgR3mle3B.0L.xwT8xH1Br/jHS', NULL, '2017-06-08 06:34:31', NULL, NULL, NULL, '', '', 0, '', 0, '', 0, 0, '2017-06-08 06:34:31', '2017-06-08 06:34:31'),
(101, 'guest_55241945_30794371@sahalat.com', '$2y$10$.iN05pc9JxO8WnLOa8QAHuesRFE2yJQKkJCD1dbzhisRqgPsZkUjG', NULL, '2017-06-11 06:41:14', NULL, NULL, NULL, '', '', 0, '', 0, '', 0, 0, '2017-06-11 06:41:14', '2017-06-11 06:41:14'),
(102, 'guest_80064510_92225799@sahalat.com', '$2y$10$4IMzi.XDk5waw.khf5SHRu/KbV/jWFZKS.XsN82nNYz3p1AV1pKsO', NULL, '2017-06-11 07:58:45', NULL, NULL, NULL, '', '', 0, '', 0, '', 0, 0, '2017-06-11 07:58:45', '2017-06-11 07:58:45'),
(103, 'guest_81921172_5828517@sahalat.com', '$2y$10$M7F6Qnv44cKckQ0BV.3FMeCSVI3IgrbkzZ/U5yIszlu4IeXioMfga', NULL, '2017-06-11 10:41:58', NULL, NULL, NULL, '', '', 0, '', 0, '', 0, 0, '2017-06-11 10:41:58', '2017-06-11 10:41:58'),
(104, 'guest_64000878_59882076@sahalat.com', '$2y$10$PL6xj51AWAGPaq2NTYTqvOAWFdmZc5iVf5owpqn0M7KF92H5z8Lvm', NULL, '2017-06-15 06:45:36', NULL, NULL, NULL, '', '', 0, '', 0, '', 0, 0, '2017-06-15 06:45:35', '2017-06-15 06:45:36'),
(105, 'klmkdc', '$2y$10$BmLvJuUY2dEqxEey4xfWyuQplEpxvPP8mLFpli4bJITylcfatNK0W', NULL, NULL, 'lkjo', 'ijoij', NULL, '', '', 0, '0', 0, '', 34.08906131584994, 38.14453125, '2017-06-15 20:49:29', '2017-06-15 20:49:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_id` (`area_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `governorate_id` (`governorate_id`);

--
-- Indexes for table `audit_track`
--
ALTER TABLE `audit_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `dish_id` (`dish_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `columns_info`
--
ALTER TABLE `columns_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuisine`
--
ALTER TABLE `cuisine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_menu`
--
ALTER TABLE `delivery_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `deliver_package`
--
ALTER TABLE `deliver_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `cuisine_id` (`cuisine_id`),
  ADD KEY `menu_section_id` (`menu_section_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `delivery_menu_id` (`delivery_menu_id`);

--
-- Indexes for table `dish_rate`
--
ALTER TABLE `dish_rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dish_id` (`dish_id`);

--
-- Indexes for table `email_group`
--
ALTER TABLE `email_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_group_users`
--
ALTER TABLE `email_group_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `email_mass_queue`
--
ALTER TABLE `email_mass_queue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_group_id` (`email_group_id`);

--
-- Indexes for table `email_mass_template`
--
ALTER TABLE `email_mass_template`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_group_id` (`email_group_id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governorate`
--
ALTER TABLE `governorate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_section`
--
ALTER TABLE `menu_section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation_hour`
--
ALTER TABLE `operation_hour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_area_id` (`restaurant_area_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_driver`
--
ALTER TABLE `order_driver`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_id` (`area_id`);

--
-- Indexes for table `restaurant_area`
--
ALTER TABLE `restaurant_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_id` (`area_id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `governorate_id` (`governorate_id`);

--
-- Indexes for table `restaurant_cuisine`
--
ALTER TABLE `restaurant_cuisine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `cuisine_id` (`cuisine_id`);

--
-- Indexes for table `restaurant_notification`
--
ALTER TABLE `restaurant_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `restaurant_offer`
--
ALTER TABLE `restaurant_offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `offer_id` (`offer_id`);

--
-- Indexes for table `restaurant_rate`
--
ALTER TABLE `restaurant_rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `restaurant_users`
--
ALTER TABLE `restaurant_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_boy`
--
ALTER TABLE `service_boy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_company_id` (`service_company_id`);

--
-- Indexes for table `service_company`
--
ALTER TABLE `service_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_company_order`
--
ALTER TABLE `service_company_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_company_id` (`service_company_id`),
  ADD KEY `order_id` (`service_boy_id`);

--
-- Indexes for table `service_company_order_service`
--
ALTER TABLE `service_company_order_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_company_order_id` (`service_company_order_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_provider_user_id_unique` (`provider`,`user_id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;
--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `audit_track`
--
ALTER TABLE `audit_track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `columns_info`
--
ALTER TABLE `columns_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cuisine`
--
ALTER TABLE `cuisine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `delivery_menu`
--
ALTER TABLE `delivery_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `deliver_package`
--
ALTER TABLE `deliver_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `dish_rate`
--
ALTER TABLE `dish_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `email_group`
--
ALTER TABLE `email_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `email_group_users`
--
ALTER TABLE `email_group_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `email_mass_queue`
--
ALTER TABLE `email_mass_queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_mass_template`
--
ALTER TABLE `email_mass_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `governorate`
--
ALTER TABLE `governorate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu_section`
--
ALTER TABLE `menu_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `operation_hour`
--
ALTER TABLE `operation_hour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `order_driver`
--
ALTER TABLE `order_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1125;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `restaurant_area`
--
ALTER TABLE `restaurant_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `restaurant_cuisine`
--
ALTER TABLE `restaurant_cuisine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `restaurant_notification`
--
ALTER TABLE `restaurant_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `restaurant_offer`
--
ALTER TABLE `restaurant_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `restaurant_rate`
--
ALTER TABLE `restaurant_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `restaurant_users`
--
ALTER TABLE `restaurant_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `service_boy`
--
ALTER TABLE `service_boy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `service_company`
--
ALTER TABLE `service_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `service_company_order`
--
ALTER TABLE `service_company_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `service_company_order_service`
--
ALTER TABLE `service_company_order_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`governorate_id`) REFERENCES `governorate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`dish_id`) REFERENCES `dish` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery_menu`
--
ALTER TABLE `delivery_menu`
  ADD CONSTRAINT `delivery_menu_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dish`
--
ALTER TABLE `dish`
  ADD CONSTRAINT `dish_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dish_ibfk_2` FOREIGN KEY (`cuisine_id`) REFERENCES `cuisine` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dish_ibfk_3` FOREIGN KEY (`menu_section_id`) REFERENCES `menu_section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dish_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dish_ibfk_5` FOREIGN KEY (`delivery_menu_id`) REFERENCES `delivery_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dish_rate`
--
ALTER TABLE `dish_rate`
  ADD CONSTRAINT `dish_rate_ibfk_1` FOREIGN KEY (`dish_id`) REFERENCES `dish` (`id`);

--
-- Constraints for table `email_group_users`
--
ALTER TABLE `email_group_users`
  ADD CONSTRAINT `email_group_users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `email_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `email_mass_queue`
--
ALTER TABLE `email_mass_queue`
  ADD CONSTRAINT `email_mass_queue_ibfk_1` FOREIGN KEY (`email_group_id`) REFERENCES `email_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `email_mass_template`
--
ALTER TABLE `email_mass_template`
  ADD CONSTRAINT `email_mass_template_ibfk_1` FOREIGN KEY (`email_group_id`) REFERENCES `email_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_section`
--
ALTER TABLE `menu_section`
  ADD CONSTRAINT `menu_section_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `operation_hour`
--
ALTER TABLE `operation_hour`
  ADD CONSTRAINT `operation_hour_ibfk_1` FOREIGN KEY (`restaurant_area_id`) REFERENCES `restaurant_area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `operation_hour_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_driver`
--
ALTER TABLE `order_driver`
  ADD CONSTRAINT `order_driver_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_area`
--
ALTER TABLE `restaurant_area`
  ADD CONSTRAINT `restaurant_area_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurant_area_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurant_area_ibfk_3` FOREIGN KEY (`governorate_id`) REFERENCES `governorate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_cuisine`
--
ALTER TABLE `restaurant_cuisine`
  ADD CONSTRAINT `restaurant_cuisine_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurant_cuisine_ibfk_2` FOREIGN KEY (`cuisine_id`) REFERENCES `cuisine` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_notification`
--
ALTER TABLE `restaurant_notification`
  ADD CONSTRAINT `restaurant_notification_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_offer`
--
ALTER TABLE `restaurant_offer`
  ADD CONSTRAINT `restaurant_offer_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurant_offer_ibfk_2` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_rate`
--
ALTER TABLE `restaurant_rate`
  ADD CONSTRAINT `restaurant_rate_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_users`
--
ALTER TABLE `restaurant_users`
  ADD CONSTRAINT `restaurant_users_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_boy`
--
ALTER TABLE `service_boy`
  ADD CONSTRAINT `service_boy_ibfk_1` FOREIGN KEY (`service_company_id`) REFERENCES `service_company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_company_order_service`
--
ALTER TABLE `service_company_order_service`
  ADD CONSTRAINT `service_company_order_service_ibfk_1` FOREIGN KEY (`service_company_order_id`) REFERENCES `service_company_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_company_order_service_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
