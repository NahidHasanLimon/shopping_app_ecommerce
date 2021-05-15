-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 02:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_value` decimal(8,2) NOT NULL DEFAULT 0.00,
  `number_of_items_in_cart` int(11) NOT NULL DEFAULT 0,
  `sub_total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `session_id`, `coupon_code`, `coupon_value`, `number_of_items_in_cart`, `sub_total`, `total`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'aY6nG9UT0bjtN0AaVM7rgVNWzVFs4buv8xoAxdcA', 'on51', '500.00', 2, '6962.33', '6462.33', 1, '2020-12-17 15:06:16', '2020-12-19 14:24:02'),
(3, 4, 'uFQVG76eCT8Hu5yzymGKcgObVUa3M6Qh7RRgDJvF', 'on51', '500.00', 2, '12022.33', '11522.33', 1, '2020-12-21 14:33:08', '2020-12-21 14:37:24'),
(4, 3, 'bpkT1HwfUR6Wb89W4q5tGQBGkUkNQrKy2W4oTcjV', NULL, '0.00', 4, '45823.99', '45823.99', 0, '2020-12-23 09:09:53', '2021-01-04 03:22:39'),
(5, 3, 'JABL23KKkmNI8ABSbit0L4o7mye3Ke1Oa6i1q8Bb', NULL, '0.00', 1, '6825.00', '6825.00', 0, '2021-01-04 03:24:26', '2021-01-04 05:25:02'),
(6, 3, 'JABL23KKkmNI8ABSbit0L4o7mye3Ke1Oa6i1q8Bb', 'on51', '500.00', 5, '29895.66', '29395.66', 0, '2021-01-04 05:25:15', '2021-01-04 05:25:54'),
(7, 3, 'JABL23KKkmNI8ABSbit0L4o7mye3Ke1Oa6i1q8Bb', NULL, '0.00', 2, '8311.33', '8311.33', 0, '2021-01-04 05:30:49', '2021-01-04 05:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `atttributes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `item_total` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `quantity`, `atttributes`, `price`, `discount`, `item_total`, `created_at`, `updated_at`) VALUES
(7, 1, 7, 1, '', '1021.33', '0.00', '1021.33', '2020-12-18 13:31:57', '2020-12-18 13:31:57'),
(8, 1, 13, 1, '', '5941.00', '0.00', '5941.00', '2020-12-18 13:31:58', '2020-12-20 13:22:31'),
(12, 3, 1, 1, '', '3850.33', '0.00', '3850.33', '2020-12-21 14:36:32', '2020-12-21 14:36:32'),
(13, 3, 2, 2, '', '4086.00', '0.00', '8172.00', '2020-12-21 14:37:01', '2020-12-21 14:37:24'),
(19, 4, 2, 4, '', '4086.00', '0.00', '16344.00', '2020-12-23 15:11:19', '2021-01-04 01:28:26'),
(20, 4, 7, 3, '', '1021.33', '0.00', '3063.99', '2020-12-23 15:11:22', '2021-01-04 01:28:17'),
(22, 4, 5, 3, '', '6825.00', '0.00', '20475.00', '2020-12-26 10:53:23', '2021-01-04 01:28:14'),
(23, 4, 13, 1, '', '5941.00', '0.00', '5941.00', '2020-12-26 10:55:43', '2020-12-26 11:10:47'),
(24, 5, 5, 1, '', '6825.00', '0.00', '6825.00', '2021-01-04 03:24:26', '2021-01-04 03:24:26'),
(25, 6, 2, 3, '', '4086.00', '0.00', '12258.00', '2021-01-04 05:25:15', '2021-01-04 05:25:39'),
(26, 6, 5, 1, '', '6825.00', '0.00', '6825.00', '2021-01-04 05:25:16', '2021-01-04 05:25:39'),
(27, 6, 7, 1, '', '1021.33', '0.00', '1021.33', '2021-01-04 05:25:17', '2021-01-04 05:25:17'),
(28, 6, 13, 1, '', '5941.00', '0.00', '5941.00', '2021-01-04 05:25:19', '2021-01-04 05:25:39'),
(29, 6, 1, 1, '', '3850.33', '0.00', '3850.33', '2021-01-04 05:25:24', '2021-01-04 05:25:24'),
(30, 7, 1, 1, '', '3850.33', '0.00', '3850.33', '2021-01-04 05:30:49', '2021-01-04 05:30:49'),
(31, 7, 3, 1, '', '4461.00', '0.00', '4461.00', '2021-01-04 05:30:50', '2021-01-04 05:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'ea', 'Tempore est provident quam qui. Consequatur consequatur nostrum consequuntur quia cupiditate reiciendis quia.', '6a3b89862d7212e27d771a35efa952c4.jpg', '2020-07-13 12:07:17', '2020-07-13 12:07:17'),
(2, 'eligendi', 'Consectetur nisi eligendi rerum enim molestiae qui omnis. Ut aut ut enim dolor cumque. Qui blanditiis ut iste qui. Tempora autem qui nesciunt et fugiat et.', '7097fdb11992c9b76b984a9d708bdd5a.jpg', '2020-07-13 12:07:17', '2020-07-13 12:07:17'),
(3, 'nemo', 'Illo voluptates velit expedita distinctio molestias quibusdam animi. Et sint consequuntur maiores. Eveniet quam consequatur suscipit illo eius alias voluptatibus.', 'a1a8be9f877df13f5fc48943f5abdcdf.jpg', '2020-07-13 12:07:17', '2020-07-13 12:07:17'),
(4, 'deleniti', 'Eaque aliquid illo quos perferendis itaque. Impedit est magni ea omnis similique quo. Recusandae et adipisci omnis dolores.', 'ff4aec2a5eea9e4d39345afdd27822f3.jpg', '2020-07-13 12:07:17', '2020-07-13 12:07:17'),
(5, 'possimus', 'Aut reiciendis id error velit earum animi. Ab repellendus quia laboriosam. Vel doloribus ratione ratione non dolorem. Reiciendis repellendus aspernatur aperiam quia voluptatem ipsam.', 'eeb4147c6c413c3f0c717071664f6b0a.jpg', '2020-07-13 12:07:17', '2020-07-13 12:07:17'),
(6, 'autem', 'Dolor illo eos qui sit est iste. Nisi omnis dolor delectus. Voluptates earum voluptatem eligendi molestias.', '48454c54dd5a1ab537ef1dc6b6127db3.jpg', '2020-07-13 14:01:35', '2020-07-13 14:01:35'),
(7, 'maxime', 'Ea deleniti et voluptas a in. Rerum iste reiciendis nobis. Ad exercitationem dicta consequatur.', 'fcf454ed1a6c90cfc48efea924e1a6f2.jpg', '2020-07-13 14:01:38', '2020-07-13 14:01:38'),
(8, 'optio', 'Rem aut fugit commodi voluptas ut rerum. Rerum at in minus saepe. Non a illum ut vitae repellendus. Exercitationem tenetur et ut consectetur nostrum sequi laborum.', '2b4be3740ceb5d72efcd312ffde07027.jpg', '2020-07-13 14:01:41', '2020-07-13 14:01:41'),
(9, 'inventore', 'Est et assumenda voluptates distinctio quia eligendi. Beatae similique nulla inventore sit. Voluptas fugit neque accusantium sint molestias. Sit debitis sint ducimus officia nesciunt ipsa.', '693304f8081b7c50ec4492599b1a78ed.jpg', '2020-07-13 14:01:43', '2020-07-13 14:01:43'),
(10, 'aut', 'Illum sit vitae aperiam voluptas aut molestiae. Voluptates sit voluptate enim totam. Perferendis enim tenetur ex et amet est. Necessitatibus dolores id eum iusto in recusandae.', '8efa45f3c1dbfffa02c1c1b4b0e8da99.jpg', '2020-07-13 14:01:45', '2020-07-13 14:01:45'),
(11, 'optio', 'Et iure ab libero et quaerat. Voluptas esse et enim occaecati fugit. Velit porro molestiae sequi accusamus.', '4c8260aafeef2ee6f413ec0f6bd4d4cb.jpg', '2020-07-13 14:06:13', '2020-07-13 14:06:13'),
(12, 'illum', 'Architecto aut sint aliquid vitae quis iure et nisi. Ea et id culpa corrupti quaerat non et aut. Assumenda qui est dolor id.', '81b647eb605a9214a1c6b6610fd11fec.jpg', '2020-07-13 14:06:16', '2020-07-13 14:06:16'),
(13, 'aliquam', 'Vero quam qui commodi aliquid pariatur sit temporibus sed. Omnis similique eos vero molestias exercitationem eaque. Cupiditate eaque dignissimos corrupti saepe.', '667bba8982aeaf210bd8b7203e55f03f.jpg', '2020-07-13 14:06:20', '2020-07-13 14:06:20'),
(14, 'dicta', 'Fugit tenetur voluptatem vero magnam earum esse autem. Eum repudiandae est et unde. Hic cupiditate aut commodi veritatis. Eveniet provident unde ab quod minima perferendis.', 'f7ecd8b805b9e16e1438c2f2db329dbe.jpg', '2020-07-13 14:06:23', '2020-07-13 14:06:23'),
(15, 'et', 'Quia quia est rerum natus labore voluptatum. Nisi reiciendis eum eum vel alias mollitia in. Numquam nesciunt accusantium et odio. Est et qui iste soluta.', '18a8c6c1eeca685e9a1fac92413b2379.jpg', '2020-07-13 14:06:27', '2020-07-13 14:06:27'),
(16, 'voluptas', 'Itaque eos quam et fugit necessitatibus iure fugiat. Et vero accusantium saepe quod alias laudantium reiciendis. Doloribus sequi cupiditate nihil illum sit eum quia.', '3ff59ec6c9e4eadb25e821f94efa1bc2.jpg', '2020-07-13 14:06:32', '2020-07-13 14:06:32'),
(17, 'provident', 'Saepe itaque sunt delectus quae aliquam. Praesentium reiciendis maiores impedit aliquam ut qui. Placeat sed vitae non dicta. Adipisci eum sint et. Velit praesentium doloribus id nobis corrupti eius.', 'f2c7c9de6f1f0a63ba0d6ea41cc591f7.jpg', '2020-07-13 14:06:35', '2020-07-13 14:06:35'),
(18, 'consequatur', 'Sed accusantium eos quis iste sint et assumenda. Id enim asperiores nam in et ut.', '02847b3ad0489d3911b1de221bcad210.jpg', '2020-07-13 14:06:40', '2020-07-13 14:06:40'),
(19, 'amet', 'Nesciunt delectus rerum temporibus. Quaerat voluptatem et provident et voluptatum magnam fugiat. Non aut sapiente maiores esse expedita fugit. Quo laudantium et eum quas optio illum omnis.', '6f4ed4d76933a44bca8462cec0120b09.jpg', '2020-07-13 14:06:45', '2020-07-13 14:06:45'),
(20, 'tenetur', 'Aut eos id omnis eveniet ut aliquam officia. Atque minus similique voluptatem. Neque amet corrupti ipsam molestiae nemo ut. Et laudantium sed corporis voluptas aut dolorem placeat.', '5870b422311b05b565e65527c0cc934e.jpg', '2020-07-13 14:06:49', '2020-07-13 14:06:49'),
(21, 'quam', 'Magnam consequuntur asperiores dolore repellat ut animi. Rerum non magnam minima. Repellendus sit sed voluptatum dicta ut velit non officia.', '95d0763adce9a4c0c80b2fd13a8531c2.jpg', '2020-07-13 14:06:53', '2020-07-13 14:06:53'),
(22, 'quis', 'Sunt id rerum enim excepturi. Est voluptas officia nihil aperiam rerum minus. Asperiores harum magnam nesciunt reprehenderit sunt.', '72cafeac7e07f6907b8daeeb0bb2a1d1.jpg', '2020-07-13 14:06:55', '2020-07-13 14:06:55'),
(23, 'omnis', 'Error quae sed consequatur repellendus voluptate laborum omnis. Non est quam voluptatem omnis accusantium. Molestiae quaerat quod quasi sequi fuga. Nam magnam porro reprehenderit explicabo.', 'd3091fa81401ae43dab581f04d86c1fb.jpg', '2020-07-13 14:06:59', '2020-07-13 14:06:59'),
(24, 'dolorum', 'Tenetur magni error repudiandae impedit eius cumque ullam. Voluptatem recusandae sit beatae magnam officia. Et nostrum voluptates minus praesentium.', '684ecfff761b7b2176a6a6cc18fc3acf.jpg', '2020-07-13 14:07:04', '2020-07-13 14:07:04'),
(25, 'sunt', 'Autem aut est rerum placeat ipsa aut alias. Sint animi qui optio eligendi molestiae non. Quae quia rerum quo ut. Nihil natus ex iste.', 'c8c9ba225128244754765bb3a05a2fb8.jpg', '2020-07-13 14:07:09', '2020-07-13 14:07:09'),
(26, 'dolorem', 'Eius aut nihil sequi placeat ut natus labore. Possimus saepe fuga rem et. Cumque in expedita et asperiores magni doloribus adipisci reiciendis. Quis quas sint ut nulla sit inventore sunt.', '93886916453c7ead59ca5605c3ab58ca.jpg', '2020-07-13 14:07:12', '2020-07-13 14:07:12'),
(27, 'rerum', 'Voluptatem et animi impedit omnis. Nihil laborum qui reiciendis adipisci consequatur. Ea quis nisi consectetur tempora. Suscipit minima praesentium praesentium perspiciatis accusamus qui.', '9a6f88abfd76d1618477e7ab17b8be75.jpg', '2020-07-13 14:07:16', '2020-07-13 14:07:16'),
(28, 'quam', 'Modi molestias eos tenetur sint assumenda ullam quam. Illum qui nisi veniam qui. Culpa vel qui fugiat nulla hic officiis omnis.', '334ef8085d188c8c38f5d02d535284a7.jpg', '2020-07-13 14:07:19', '2020-07-13 14:07:19'),
(29, 'dolor', 'Ullam et et a minima recusandae. Inventore aut et illum soluta similique. Voluptatem error ea dolores necessitatibus et enim excepturi.', '0ec745ddc52b3b4ae848afb22a0bac6b.jpg', '2020-07-13 14:07:22', '2020-07-13 14:07:22'),
(30, 'aut', 'Fugit velit neque harum. Vel in dicta modi maxime ut. Deserunt laudantium sed vitae et provident rerum.', 'cf814563acfc3d19ac5c2f7e5df2184c.jpg', '2020-07-13 14:07:25', '2020-07-13 14:07:25'),
(31, 'totam', 'Aliquam architecto impedit dolores reiciendis. Delectus sunt voluptas placeat doloribus est consectetur.', '8b4fe1fa435c45456b94b959a0aefaa6.jpg', '2020-07-13 14:14:14', '2020-07-13 14:14:14'),
(32, 'vitae', 'Assumenda laudantium velit sapiente quia earum dolores aut. Est sapiente laborum consectetur assumenda. Dolor consequatur laborum velit qui in assumenda mollitia.', '2ded6f1be72a255ee022af7c5cc8585b.jpg', '2020-07-13 14:14:18', '2020-07-13 14:14:18'),
(33, 'minima', 'A et quasi nam veniam perferendis. A modi optio et ut enim impedit ut. Aut ad sit possimus. Modi ut voluptatibus aut suscipit fugiat eum. Consequatur dolores rerum sint accusantium in esse sapiente.', '8bd3f346a4a1f1cf97c772e04fdbbd31.jpg', '2020-07-13 14:14:21', '2020-07-13 14:14:21'),
(34, 'architecto', 'Atque maiores placeat aut nulla. Ex quisquam velit vel. Repellendus adipisci et quos rerum.', 'b53549fc2825d75b350236c6384b174f.jpg', '2020-07-13 14:14:24', '2020-07-13 14:14:24'),
(35, 'sint', 'Maxime eaque est qui eveniet nam repellendus veniam a. Quia molestias voluptatibus rem. Facilis natus ea veritatis est et ut.', 'a3df95f4989d394f4bf5659cc2319f45.jpg', '2020-07-13 14:14:28', '2020-07-13 14:14:28'),
(36, 'perferendis', 'Pariatur tempore aperiam architecto sit magni sed. Non itaque ad nulla ducimus aut perspiciatis suscipit qui. Cumque laudantium atque quod quisquam nostrum.', '518185a373b8d9f0bde3697a9b518e18.jpg', '2020-07-13 14:14:31', '2020-07-13 14:14:31'),
(37, 'est', 'Pariatur neque est cupiditate ipsum voluptatem. Sed et tenetur nemo qui at.', 'c787b19cc2f16cb4a86135a026835e7b.jpg', '2020-07-13 14:14:35', '2020-07-13 14:14:35'),
(38, 'odio', 'Quaerat iure ea alias occaecati. Fugit quae nesciunt saepe ea ullam doloribus. Illum consequuntur et sed esse. Rerum laborum aspernatur et illum distinctio temporibus.', 'b90027a92e1f5df47c93af4fe4218e7c.jpg', '2020-07-13 14:14:38', '2020-07-13 14:14:38'),
(39, 'fuga', 'Repellendus hic hic eos vel inventore placeat earum voluptatum. Vitae rerum impedit labore nihil iusto. Fuga fugit qui eos temporibus.', '9412abd7b1528598b979464d97fda650.jpg', '2020-07-13 14:14:42', '2020-07-13 14:14:42'),
(40, 'reprehenderit', 'Aliquid officiis vel officia dolores doloremque nemo. Modi earum ratione ex nisi rerum similique. Consequatur facere est quidem quam.', '3517033fb16627b6bb773cf802931899.jpg', '2020-07-13 14:14:45', '2020-07-13 14:14:45'),
(41, 'veritatis', 'Amet voluptates quaerat suscipit optio at. Est porro rerum eligendi ut. Quia ut est nemo voluptas accusantium pariatur.', 'bc19d1cafaee5eceae2197a950427152.jpg', '2020-07-13 14:14:48', '2020-07-13 14:14:48'),
(42, 'nulla', 'Aliquid est quia qui dolores. Ut inventore veritatis voluptate qui provident ipsum qui error. Voluptatibus blanditiis optio vel dolores. Enim sapiente corrupti enim et maxime.', '64feb55bce1d68dfae0a58854199ad51.jpg', '2020-07-13 14:14:51', '2020-07-13 14:14:51'),
(43, 'rerum', 'Iusto dignissimos quasi quia. Placeat perferendis sint eveniet similique architecto aut sequi. Accusantium enim ea atque.', '75b98fcf4fa58572b87aecdee5b65ef5.jpg', '2020-07-13 14:14:55', '2020-07-13 14:14:55'),
(44, 'voluptatem', 'Mollitia qui nostrum dolores natus aut et aut. Libero et et vel praesentium dolor voluptatibus exercitationem porro. Qui soluta reprehenderit non.', 'e62a3d4654e0fc3bb094de6ebd86094f.jpg', '2020-07-13 14:14:58', '2020-07-13 14:14:58'),
(45, 'iusto', 'Cumque sequi inventore quia odit illo eaque. Eum provident dolorem odio ipsam officiis dolores. Quo voluptas illum saepe velit aliquid perferendis temporibus doloremque. Ea possimus voluptas quis.', 'a62ca251122effcc408ac60606365cec.jpg', '2020-07-13 14:15:02', '2020-07-13 14:15:02'),
(46, 'velit', 'Quae eveniet ab velit voluptatem et assumenda dicta dolorum. Eaque velit consequatur illum dolorem neque. Laborum et recusandae iure. Quibusdam non provident numquam porro aspernatur est ratione et.', 'c90ee032bd19ad0b23ec84f17c71c47c.jpg', '2020-07-13 14:15:05', '2020-07-13 14:15:05'),
(47, 'occaecati', 'Voluptatibus vel dolore odit vero qui velit asperiores. Perferendis aspernatur eveniet eligendi perspiciatis autem officiis ex vel.', '77a33f64080948004938c0a95dd81861.jpg', '2020-07-13 14:15:09', '2020-07-13 14:15:09'),
(48, 'eligendi', 'Natus perferendis aliquam atque. Ut doloremque officiis doloremque debitis modi et voluptas. Aliquid sit et itaque et vero provident. Qui ex asperiores quis officiis labore eveniet.', '8064a8823ed1e5e911f91e7ebf81da9f.jpg', '2020-07-13 14:15:12', '2020-07-13 14:15:12'),
(49, 'reiciendis', 'Quia perspiciatis hic quis et consectetur corrupti ullam. Est est ipsum voluptatum fugiat molestiae autem.', 'bc0e727f4a6501931495c6f9cc01cba1.jpg', '2020-07-13 14:15:16', '2020-07-13 14:15:16'),
(50, 'a', 'Velit odio magnam blanditiis sed rerum. Cumque possimus pariatur voluptatibus repellendus nostrum tempore. Ut consequatur non beatae quia eum.', '5a5ce071b8e4fd12e0f1bc453e35bcc7.jpg', '2020-07-13 14:15:20', '2020-07-13 14:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(8,2) NOT NULL DEFAULT 0.00,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `expiration_date` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `value`, `is_active`, `expiration_date`, `created_at`, `updated_at`) VALUES
(1, 'on51', '500.00', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guest_checkouts`
--

CREATE TABLE `guest_checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town_or_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guest_checkouts`
--

INSERT INTO `guest_checkouts` (`id`, `order_id`, `name`, `email`, `street_address`, `town_or_city`, `district`, `post_code`, `phone`, `additional_details`, `created_at`, `updated_at`) VALUES
(1, 13, 'Sheehan Rahman', 'sheehanvy@gmail.com', NULL, 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2020-12-27 14:53:51', '2020-12-27 14:53:51'),
(2, 14, 'Sheehan Rahman', 'sheehanvy@gmail.com', NULL, 'Select Country...', 'Select Country...', '1213', '01621316727', '444', '2020-12-27 14:57:14', '2020-12-27 14:57:14'),
(3, 18, 'Sheehan Rahman', 'sheehanvy@gmail.com', NULL, 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-01 08:46:15', '2021-01-01 08:46:15'),
(4, 20, 'Sheehan Rahman', 'sheehanvy@gmail.com', NULL, 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-01 12:35:39', '2021-01-01 12:35:39'),
(5, 21, 'Sheehan Rahman', 'sheehanvy@gmail.com', NULL, 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-01 12:40:10', '2021-01-01 12:40:10'),
(6, 4, 'Sheehan Rahman', 'sheehanvy44@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-13 01:00:52', '2021-01-13 01:00:52'),
(7, 5, 'Sheehan Rahman', 'sheehanvy33@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-13 01:04:12', '2021-01-13 01:04:12'),
(8, 6, 'Sheehan Rahman', 'sheehanvy32@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-13 01:06:07', '2021-01-13 01:06:07'),
(9, 7, 'Sheehan Rahman', 'sheehaddnvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-13 01:25:39', '2021-01-13 01:25:39'),
(10, 8, 't', 'sheehanadvy@gmail.com', 'Village: Hazarigonj, PO: Goldarhat, Thana:Shashibussion, District: Bhola', 'Select Country...', 'Select Country...', '8340', NULL, NULL, '2021-01-13 01:26:26', '2021-01-13 01:26:26'),
(11, 9, 'Sheehan Rahman', 'sheehfdfanvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-13 01:27:39', '2021-01-13 01:27:39'),
(12, 10, 'Sheehan Rahman', 'sheeharewrrnvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-13 01:30:41', '2021-01-13 01:30:41'),
(13, 11, 'Sheehan Rahman', 'sheehavppnvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-13 03:57:40', '2021-01-13 03:57:40'),
(14, 12, 'Sheehan Rahman', 'sheehasdfddsnvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-13 04:09:10', '2021-01-13 04:09:10'),
(15, 13, 'Sheehan Rahman', 'sheehanvy44@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-13 04:11:53', '2021-01-13 04:11:53'),
(16, 14, 'Sheehan Rahman', 'sheehanvy00@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-13 04:13:39', '2021-01-13 04:13:39'),
(17, 15, 'Sheehan Rahman', 'sheehanlllvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, '444', '2021-01-13 05:40:47', '2021-01-13 05:40:47'),
(18, 16, 'Sheehan Rahman', 'sheehjjanvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-22 06:08:39', '2021-01-22 06:08:39'),
(19, 17, 'Sheehan Rahman', 'sheehanvy@gmlail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-22 06:18:51', '2021-01-22 06:18:51'),
(20, 18, 'Sheehan Rahman', 'sheehanvy@gmail.comppp', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-22 13:44:19', '2021-01-22 13:44:19'),
(21, 19, 'Sheehan Rahman', 'sheehanvy@gmail.comppp', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-22 13:44:41', '2021-01-22 13:44:41'),
(22, 20, 'Sheehan Rahman', 'sheehanvy@gmail.comppp', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-22 13:44:46', '2021-01-22 13:44:46'),
(23, 21, 'Sheehan Rahman', 'sheehanvy@gmail.comppp', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-22 13:45:29', '2021-01-22 13:45:29'),
(24, 22, 'Sheehan Rahman', 'sheehanvy@gmail.comppp', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-22 13:46:20', '2021-01-22 13:46:20'),
(25, 23, 't', 'sheehanvy@gmail.comogvfc', 'Village: Hazarigonj, PO: Goldarhat, Thana:Shashibussion, District: Bhola', 'Select Country...', 'Select Country...', '8340', NULL, NULL, '2021-01-22 13:47:09', '2021-01-22 13:47:09'),
(26, 24, 'Sheehan Rahman', 'sheehanvy@gmail.comolj', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-22 13:56:23', '2021-01-22 13:56:23'),
(27, 25, 'Sheehan Rahman', 'shzcvzceehanvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-22 14:04:17', '2021-01-22 14:04:17'),
(28, 26, 'Sheehan Rahman', 'shzcvzceehanvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-22 14:04:32', '2021-01-22 14:04:32'),
(29, 27, 'Sheehan Rahman', 'sheehanvpppy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-22 14:05:32', '2021-01-22 14:05:32'),
(30, 28, 't', 'sheehanvy@gmail.comjaq', 'Village: Hazarigonj, PO: Goldarhat, Thana:Shashibussion, District: Bhola', 'Select Country...', 'Select Country...', '8340', NULL, NULL, '2021-01-22 14:07:04', '2021-01-22 14:07:04'),
(31, 29, 'Sheehan Rahman', 'sheehanvy@gmail.compo', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-22 14:08:19', '2021-01-22 14:08:19'),
(32, 30, 'Sheehan Rahman', 'sheehanvuuy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-22 14:21:21', '2021-01-22 14:21:21'),
(33, 31, 'Sheehan Rahman', 'sheehanvylll@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-22 15:16:27', '2021-01-22 15:16:27'),
(34, 32, 'Sheehan Rahman', 'sheehanvddy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', '01621316727', NULL, '2021-01-24 23:33:38', '2021-01-24 23:33:38'),
(35, 33, 'Sheehan Rahman', 'sheerrrlhanvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', '016213167270', NULL, '2021-01-24 23:37:15', '2021-01-24 23:37:15'),
(36, 34, 'Sheehan Rahman', 'sheedshaqqnvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-24 23:43:50', '2021-01-24 23:43:50'),
(37, 35, 'Sheehan Rahman', 'sheehanvyli@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-25 00:43:38', '2021-01-25 00:43:38'),
(38, 36, 'Sheehan Rahman', 'shlleehanvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-25 00:44:20', '2021-01-25 00:44:20'),
(39, 37, 'Sheehan Rahman', 'sheehanvpoy@gmail.com', 'Village: Hazarigonj, PO: Goldarhat, Thana:Shashibussion, District: Bhola', 'Select Country...', 'Select Country...', '8340', NULL, NULL, '2021-01-25 00:53:16', '2021-01-25 00:53:16'),
(40, 38, 't', 'sheehaqqnddvy@gmail.com', 'Village: Hazarigonj, PO: Goldarhat, Thana:Shashibussion, District: Bhola', 'Select Country...', 'Select Country...', '8340', NULL, NULL, '2021-01-25 00:57:29', '2021-01-25 00:57:29'),
(41, 39, 'Sheehan Rahman', 'sheehanvylll@gmail.com', 'Village: Hazarigonj, PO: Goldarhat, Thana:Shashibussion, District: Bhola', 'Select Country...', 'Select Country...', '8340', NULL, NULL, '2021-01-25 02:47:24', '2021-01-25 02:47:24'),
(42, 40, 't', 'sheehanvyll@gmail.com', 'Village: Hazarigonj, PO: Goldarhat, Thana:Shashibussion, District: Bhola', 'Select Country...', 'Select Country...', '8340', NULL, NULL, '2021-01-25 03:56:42', '2021-01-25 03:56:42'),
(43, 41, 'Sheehan Rahman', 'sheehanvpo0y@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-25 03:59:00', '2021-01-25 03:59:00'),
(44, 42, 'Sheehan Rahman', 'sheehanvypo@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-25 04:06:49', '2021-01-25 04:06:49'),
(45, 43, 'Sheehan Rahman', 'sheehanvsy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-25 04:07:42', '2021-01-25 04:07:42'),
(46, 44, 'Sheehan Rahman', 'sheehzdanvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-25 04:08:50', '2021-01-25 04:08:50'),
(47, 45, 'Sheehan Rahman', 'sheehzdanvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-25 04:09:05', '2021-01-25 04:09:05'),
(48, 46, 'Sheehan Rahman', 'sheehanvylllllu@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-25 04:11:44', '2021-01-25 04:11:44'),
(49, 47, 'Sheehan Rahman', 'sheiotehanvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-25 04:22:30', '2021-01-25 04:22:30'),
(50, 48, 'Sheehan Rahman', 'shiupeehanvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-25 04:39:34', '2021-01-25 04:39:34'),
(51, 49, 'Sheehan Rahman', 'spoiheehanvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-25 04:40:59', '2021-01-25 04:40:59'),
(52, 50, 'Sheehan Rahman', 'shquieehanvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-25 04:42:13', '2021-01-25 04:42:13'),
(53, 51, 'Sheehan Rahman', 'sheeiohanvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-25 04:46:45', '2021-01-25 04:46:45'),
(54, 52, 'Sheehan Rahman', 'shesehaqqnvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-26 12:53:03', '2021-01-26 12:53:03'),
(55, 53, 't', 'sheeszahaqqnvy@gmail.com', 'Village: Hazarigonj, PO: Goldarhat, Thana:Shashibussion, District: Bhola', 'Select Country...', 'Select Country...', '8340', NULL, NULL, '2021-01-26 12:54:17', '2021-01-26 12:54:17'),
(56, 54, 'Sheehan Rahman', 'sheehanvoooy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-26 13:05:08', '2021-01-26 13:05:08'),
(57, 55, 'Sheehan Rahman', 'sheechaqqnvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-26 13:06:03', '2021-01-26 13:06:03'),
(58, 56, 'Sheehan Rahman', 'iosheehanvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-26 13:12:53', '2021-01-26 13:12:53'),
(59, 57, 'Sheehan Rahman', 'sheehanvy@gmail.comop', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-26 13:16:21', '2021-01-26 13:16:21'),
(60, 58, 'Sheehan Rahman', 'sheehasdfghjknvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-26 13:25:20', '2021-01-26 13:25:20'),
(61, 59, 'Sheehan Rahman', 'sheehanvypo@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-26 23:34:34', '2021-01-26 23:34:34'),
(62, 60, 'Sheehan Rahman', 'shsseehanvy@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-02-05 10:43:25', '2021-02-05 10:43:25'),
(63, 61, 'Sheehan Rahman', 'sheehanvyopw@gmail.com', 'Road 17/A, Banani, House 17', 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-02-05 11:11:53', '2021-02-05 11:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(4, 'default', '{\"uuid\":\"78543af8-ea8b-4cdc-95f1-d46fdb54a746\",\"displayName\":\"App\\\\Listeners\\\\SendOrderPlaceMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:32:\\\"App\\\\Listeners\\\\SendOrderPlaceMail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:22:\\\"App\\\\Events\\\\OrderPlaced\\\":2:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:60;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1612543408, 1612543408);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `type`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
(1697616353, 'user', 3, 16, 'plugin', NULL, 1, '2021-01-14 00:12:18', '2021-01-14 00:14:29'),
(1756149483, 'user', 3, 16, 'its working', NULL, 1, '2021-01-14 00:16:28', '2021-01-14 00:16:29'),
(1839749454, 'user', 3, 13, 'l', NULL, 0, '2021-01-13 13:16:05', '2021-01-13 13:16:05'),
(2029142776, 'user', 3, 16, 'added', NULL, 1, '2021-01-14 00:12:22', '2021-01-14 00:14:29'),
(2106536594, 'user', 3, 16, 'ok', NULL, 1, '2021-01-14 00:11:41', '2021-01-14 00:14:29'),
(2155237300, 'user', 3, 16, 'nice', NULL, 1, '2021-01-14 00:12:08', '2021-01-14 00:14:29'),
(2219165221, 'user', 3, 2, 'hello', NULL, 0, '2021-01-13 12:52:47', '2021-01-13 12:52:47'),
(2227591813, 'user', 16, 3, 'good to know', NULL, 1, '2021-01-14 00:16:00', '2021-01-14 00:16:01'),
(2229844118, 'user', 16, 3, 'alright', NULL, 1, '2021-01-14 00:14:35', '2021-01-14 00:14:36'),
(2251232843, 'user', 3, 16, 'ok', NULL, 1, '2021-01-14 00:12:06', '2021-01-14 00:14:29'),
(2256040867, 'user', 3, 16, 'ok', NULL, 1, '2021-01-14 00:14:59', '2021-01-14 00:15:00'),
(2317206378, 'user', 3, 1, 'hello', NULL, 0, '2021-01-13 12:49:28', '2021-01-13 12:49:28'),
(2329676080, 'user', 16, 3, 'How are you', NULL, 1, '2021-01-13 13:10:19', '2021-01-13 13:10:21'),
(2430613608, 'user', 3, 16, 'created', NULL, 1, '2021-01-14 00:12:24', '2021-01-14 00:14:29'),
(2525019676, 'user', 3, 16, 'hey', NULL, 1, '2021-01-13 13:10:09', '2021-01-13 13:10:11'),
(2569327478, 'user', 3, 16, 'ok', NULL, 1, '2021-01-14 00:15:24', '2021-01-14 00:15:25'),
(2581520515, 'user', 16, 3, 'hello', NULL, 1, '2021-01-13 13:09:56', '2021-01-13 13:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2020_07_13_091435_create_products_table', 1),
(12, '2020_07_13_092616_create_categories_table', 1),
(13, '2020_07_13_092647_create_sub_categories_table', 1),
(15, '2020_07_13_201021_add_is_available_to_products_table', 2),
(16, '2020_07_13_205535_create_testimonials_table', 3),
(36, '2020_11_30_181927_create_carts_table', 8),
(37, '2020_11_30_190154_create_cart_items_table', 8),
(38, '2020_12_17_194448_create_coupons_table', 9),
(39, '2014_10_12_000000_create_users_table', 10),
(40, '2020_12_26_102723_create_shipping_addresses_table', 11),
(41, '2020_12_26_104713_create_user_addresses_table', 11),
(45, '2020_11_30_194647_create_order_items_table', 12),
(46, '2020_12_27_092549_create_guest_users_table', 12),
(48, '2020_12_27_191510_create_guest_checkouts_table', 13),
(50, '2020_11_30_165313_create_orders_table', 14),
(52, '2021_01_05_054054_create_product_reviews_table', 15),
(53, '2020_07_13_094728_create_product_images_table', 16),
(54, '2019_09_22_192348_create_messages_table', 17),
(55, '2019_10_16_211433_create_favorites_table', 17),
(57, '2019_10_20_211056_add_messenger_color_to_users', 17),
(58, '2019_10_22_000539_add_dark_mode_to_users', 17),
(59, '2019_10_25_214038_add_active_status_to_users', 17),
(60, '2019_10_18_223259_add_avatar_to_users', 18),
(61, '2021_01_26_183000_create_jobs_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `number_of_items` int(11) NOT NULL DEFAULT 0,
  `sub_total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `is_different_shipping` tinyint(4) NOT NULL DEFAULT 0,
  `is_guest_checkout` tinyint(4) NOT NULL DEFAULT 0,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `shipping_date` timestamp(6) NULL DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `coupon_code`, `coupon_value`, `discount`, `number_of_items`, `sub_total`, `total`, `is_different_shipping`, `is_guest_checkout`, `date`, `shipping_date`, `notes`, `created_at`, `updated_at`) VALUES
(32, NULL, 'processing', NULL, NULL, '0.00', 2, '21496.33', '21496.33', 0, 1, '2021-01-25 05:33:38.079048', NULL, NULL, '2021-01-24 23:33:38', '2021-01-24 23:33:38'),
(33, NULL, 'processing', NULL, NULL, '0.00', 1, '11882.00', '11882.00', 0, 1, '2021-01-25 05:37:15.863555', NULL, NULL, '2021-01-24 23:37:15', '2021-01-24 23:37:15'),
(34, NULL, 'processing', NULL, NULL, '0.00', 3, '16018.33', '16018.33', 0, 1, '2021-01-25 05:43:50.343613', NULL, NULL, '2021-01-24 23:43:50', '2021-01-24 23:43:50'),
(35, NULL, 'processing', NULL, NULL, '0.00', 3, '16018.33', '16018.33', 0, 1, '2021-01-25 06:43:37.339438', NULL, NULL, '2021-01-25 00:43:37', '2021-01-25 00:43:37'),
(36, NULL, 'processing', NULL, NULL, '0.00', 2, '14997.00', '14997.00', 0, 1, '2021-01-25 06:44:20.511360', NULL, NULL, '2021-01-25 00:44:20', '2021-01-25 00:44:20'),
(37, NULL, 'processing', NULL, NULL, '0.00', 1, '8172.00', '8172.00', 0, 1, '2021-01-25 06:53:16.091658', NULL, NULL, '2021-01-25 00:53:16', '2021-01-25 00:53:16'),
(38, NULL, 'processing', NULL, NULL, '0.00', 1, '8172.00', '8172.00', 0, 1, '2021-01-25 06:57:29.309462', NULL, NULL, '2021-01-25 00:57:29', '2021-01-25 00:57:29'),
(39, NULL, 'processing', NULL, NULL, '0.00', 1, '2042.66', '2042.66', 0, 1, '2021-01-25 08:47:24.541265', NULL, NULL, '2021-01-25 02:47:24', '2021-01-25 02:47:24'),
(40, NULL, 'processing', NULL, NULL, '0.00', 1, '13650.00', '13650.00', 0, 1, '2021-01-25 09:56:42.580636', NULL, NULL, '2021-01-25 03:56:42', '2021-01-25 03:56:42'),
(41, NULL, 'processing', NULL, NULL, '0.00', 1, '13650.00', '13650.00', 0, 1, '2021-01-25 09:59:00.219002', NULL, NULL, '2021-01-25 03:59:00', '2021-01-25 03:59:00'),
(42, NULL, 'processing', NULL, NULL, '0.00', 1, '13650.00', '13650.00', 0, 1, '2021-01-25 10:06:49.653510', NULL, NULL, '2021-01-25 04:06:49', '2021-01-25 04:06:49'),
(43, NULL, 'processing', NULL, NULL, '0.00', 1, '8172.00', '8172.00', 0, 1, '2021-01-25 10:07:41.864529', NULL, NULL, '2021-01-25 04:07:41', '2021-01-25 04:07:41'),
(44, NULL, 'processing', NULL, NULL, '0.00', 1, '8172.00', '8172.00', 0, 1, '2021-01-25 10:08:50.317091', NULL, NULL, '2021-01-25 04:08:50', '2021-01-25 04:08:50'),
(45, NULL, 'processing', NULL, NULL, '0.00', 1, '8172.00', '8172.00', 0, 1, '2021-01-25 10:09:05.074609', NULL, NULL, '2021-01-25 04:09:05', '2021-01-25 04:09:05'),
(46, NULL, 'processing', NULL, NULL, '0.00', 1, '8172.00', '8172.00', 0, 1, '2021-01-25 10:11:44.757363', NULL, NULL, '2021-01-25 04:11:44', '2021-01-25 04:11:44'),
(47, NULL, 'processing', NULL, NULL, '0.00', 1, '8172.00', '8172.00', 0, 1, '2021-01-25 10:22:30.201777', NULL, NULL, '2021-01-25 04:22:30', '2021-01-25 04:22:30'),
(48, NULL, 'processing', NULL, NULL, '0.00', 2, '14997.00', '14997.00', 0, 1, '2021-01-25 10:39:34.149221', NULL, NULL, '2021-01-25 04:39:34', '2021-01-25 04:39:34'),
(49, NULL, 'processing', NULL, NULL, '0.00', 2, '14997.00', '14997.00', 0, 1, '2021-01-25 10:40:59.320261', NULL, NULL, '2021-01-25 04:40:59', '2021-01-25 04:40:59'),
(50, NULL, 'processing', NULL, NULL, '0.00', 1, '13650.00', '13650.00', 0, 1, '2021-01-25 10:42:13.907701', NULL, NULL, '2021-01-25 04:42:13', '2021-01-25 04:42:13'),
(51, NULL, 'processing', NULL, NULL, '0.00', 2, '14997.00', '14997.00', 0, 1, '2021-01-25 10:46:43.457267', NULL, NULL, '2021-01-25 04:46:43', '2021-01-25 04:46:43'),
(52, NULL, 'processing', NULL, NULL, '0.00', 1, '8172.00', '8172.00', 0, 1, '2021-01-26 18:53:03.233106', NULL, NULL, '2021-01-26 12:53:03', '2021-01-26 12:53:03'),
(53, NULL, 'processing', NULL, NULL, '0.00', 1, '2042.66', '2042.66', 0, 1, '2021-01-26 18:54:17.005448', NULL, NULL, '2021-01-26 12:54:17', '2021-01-26 12:54:17'),
(54, NULL, 'processing', NULL, NULL, '0.00', 3, '15829.99', '15829.99', 0, 1, '2021-01-26 19:05:08.648870', NULL, NULL, '2021-01-26 13:05:08', '2021-01-26 13:05:08'),
(55, NULL, 'processing', NULL, NULL, '0.00', 1, '2042.66', '2042.66', 0, 1, '2021-01-26 19:06:02.872064', NULL, NULL, '2021-01-26 13:06:02', '2021-01-26 13:06:02'),
(56, NULL, 'processing', NULL, NULL, '0.00', 1, '2042.66', '2042.66', 0, 1, '2021-01-26 19:12:53.569106', NULL, NULL, '2021-01-26 13:12:53', '2021-01-26 13:12:53'),
(57, NULL, 'processing', NULL, NULL, '0.00', 2, '7983.66', '7983.66', 0, 1, '2021-01-26 19:16:21.279088', NULL, NULL, '2021-01-26 13:16:21', '2021-01-26 13:16:21'),
(58, NULL, 'processing', NULL, NULL, '0.00', 2, '14671.33', '14671.33', 0, 1, '2021-01-26 19:25:20.528986', NULL, NULL, '2021-01-26 13:25:20', '2021-01-26 13:25:20'),
(59, NULL, 'processing', NULL, NULL, '0.00', 2, '14671.33', '14671.33', 0, 1, '2021-01-27 05:34:34.557082', NULL, NULL, '2021-01-26 23:34:34', '2021-01-26 23:34:34'),
(60, NULL, 'processing', NULL, NULL, '0.00', 2, '45035.32', '45035.32', 0, 1, '2021-02-05 16:43:25.801157', NULL, NULL, '2021-02-05 10:43:25', '2021-02-05 10:43:25'),
(61, NULL, 'processing', NULL, NULL, '0.00', 3, '20612.33', '20612.33', 0, 1, '2021-02-05 17:11:53.633066', NULL, NULL, '2021-02-05 11:11:53', '2021-02-05 11:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `atttributes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `item_total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `atttributes`, `price`, `discount`, `item_total`, `created_at`, `updated_at`) VALUES
(118, 32, 5, 3, NULL, '6825.00', '0.00', '20475.00', NULL, NULL),
(119, 32, 7, 1, NULL, '1021.33', '0.00', '1021.33', NULL, NULL),
(120, 33, 13, 2, NULL, '5941.00', '0.00', '11882.00', NULL, NULL),
(121, 34, 2, 2, NULL, '4086.00', '0.00', '8172.00', NULL, NULL),
(122, 34, 5, 1, NULL, '6825.00', '0.00', '6825.00', NULL, NULL),
(123, 34, 7, 1, NULL, '1021.33', '0.00', '1021.33', NULL, NULL),
(124, 35, 2, 2, NULL, '4086.00', '0.00', '8172.00', NULL, NULL),
(125, 35, 5, 1, NULL, '6825.00', '0.00', '6825.00', NULL, NULL),
(126, 35, 7, 1, NULL, '1021.33', '0.00', '1021.33', NULL, NULL),
(127, 36, 2, 2, NULL, '4086.00', '0.00', '8172.00', NULL, NULL),
(128, 36, 5, 1, NULL, '6825.00', '0.00', '6825.00', NULL, NULL),
(129, 37, 2, 2, NULL, '4086.00', '0.00', '8172.00', NULL, NULL),
(130, 38, 2, 2, NULL, '4086.00', '0.00', '8172.00', NULL, NULL),
(131, 39, 7, 2, NULL, '1021.33', '0.00', '2042.66', NULL, NULL),
(132, 40, 5, 2, NULL, '6825.00', '0.00', '13650.00', NULL, NULL),
(133, 41, 5, 2, NULL, '6825.00', '0.00', '13650.00', NULL, NULL),
(134, 42, 5, 2, NULL, '6825.00', '0.00', '13650.00', NULL, NULL),
(135, 43, 2, 2, NULL, '4086.00', '0.00', '8172.00', NULL, NULL),
(136, 44, 2, 2, NULL, '4086.00', '0.00', '8172.00', NULL, NULL),
(137, 45, 2, 2, NULL, '4086.00', '0.00', '8172.00', NULL, NULL),
(138, 46, 2, 2, NULL, '4086.00', '0.00', '8172.00', NULL, NULL),
(139, 47, 2, 2, NULL, '4086.00', '0.00', '8172.00', NULL, NULL),
(140, 48, 2, 2, NULL, '4086.00', '0.00', '8172.00', NULL, NULL),
(141, 48, 5, 1, NULL, '6825.00', '0.00', '6825.00', NULL, NULL),
(142, 49, 2, 2, NULL, '4086.00', '0.00', '8172.00', NULL, NULL),
(143, 49, 5, 1, NULL, '6825.00', '0.00', '6825.00', NULL, NULL),
(144, 50, 5, 2, NULL, '6825.00', '0.00', '13650.00', NULL, NULL),
(145, 51, 2, 2, NULL, '4086.00', '0.00', '8172.00', NULL, NULL),
(146, 51, 5, 1, NULL, '6825.00', '0.00', '6825.00', NULL, NULL),
(147, 52, 2, 2, NULL, '4086.00', '0.00', '8172.00', NULL, NULL),
(148, 53, 7, 2, NULL, '1021.33', '0.00', '2042.66', NULL, NULL),
(149, 54, 7, 3, NULL, '1021.33', '0.00', '3063.99', NULL, NULL),
(150, 54, 13, 1, NULL, '5941.00', '0.00', '5941.00', NULL, NULL),
(151, 54, 5, 1, NULL, '6825.00', '0.00', '6825.00', NULL, NULL),
(152, 55, 7, 2, NULL, '1021.33', '0.00', '2042.66', NULL, NULL),
(153, 56, 7, 2, NULL, '1021.33', '0.00', '2042.66', NULL, NULL),
(154, 57, 7, 2, NULL, '1021.33', '0.00', '2042.66', NULL, NULL),
(155, 57, 13, 1, NULL, '5941.00', '0.00', '5941.00', NULL, NULL),
(156, 58, 5, 2, NULL, '6825.00', '0.00', '13650.00', NULL, NULL),
(157, 58, 7, 1, NULL, '1021.33', '0.00', '1021.33', NULL, NULL),
(158, 59, 5, 2, NULL, '6825.00', '0.00', '13650.00', NULL, NULL),
(159, 59, 7, 1, NULL, '1021.33', '0.00', '1021.33', NULL, NULL),
(160, 60, 5, 6, NULL, '6825.00', '0.00', '40950.00', NULL, NULL),
(161, 60, 7, 4, NULL, '1021.33', '0.00', '4085.32', NULL, NULL),
(162, 61, 5, 2, NULL, '6825.00', '0.00', '13650.00', NULL, NULL),
(163, 61, 7, 1, NULL, '1021.33', '0.00', '1021.33', NULL, NULL),
(164, 61, 13, 1, NULL, '5941.00', '0.00', '5941.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_price` double NOT NULL,
  `new_price` double NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sub_category_id`, `name`, `description`, `old_price`, `new_price`, `is_featured`, `thumbnail`, `created_at`, `updated_at`, `is_available`) VALUES
(1, '3', 'laudantium', 'Ducimus aut dignissimos pariatur molestiae consectetur sit. Repudiandae officiis odio dolores molestiae voluptas eum asperiores. Magnam dolores eos quia dolores tempore ut.', 6599, 3850.33, 0, '7bb9fd5e69aad9761b61b83f9ac43e4a.jpg', '2020-07-13 14:22:05', '2020-07-13 14:22:05', 1),
(2, '9', 'quos', 'Reprehenderit iure exercitationem omnis maiores placeat laborum. Pariatur laborum qui sint eius quia quia tenetur.', 6615, 4086, 1, '3c4eb27ea8c3ef339cda8c2230abdcf4.jpg', '2020-07-13 14:22:05', '2020-07-13 14:22:05', 1),
(3, '5', 'rerum', 'Numquam culpa enim aliquid. Quia repudiandae sit hic beatae autem quos quisquam. Ex qui iure deserunt possimus.', 9293, 4461, 0, '17bd17dce0ae435b1748e19c0a3a8946.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(4, '5', 'at', 'Dolorem similique et adipisci maxime et magni id. Ipsa totam est nulla est eum ad quae. Rem corporis distinctio earum nobis non.', 9917, 6423, 0, '779ea704dc0260dd33f26e079bee8e8f.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(5, '12', 'illum', 'Eaque aut maiores ut impedit repellendus. Est laudantium nihil expedita quo. Sequi quasi voluptatem aperiam magni recusandae assumenda. Est voluptatum odit id recusandae voluptas.', 3787, 6825, 1, 'c47380e439561d28fe14ed916c2d334f.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(6, '11', 'eius', 'Qui quas et placeat temporibus ut quia. Et et et soluta maiores. Soluta nesciunt dolorem reprehenderit voluptatibus culpa.', 6981, 3577, 0, 'f6c52251cd9b190942b591dac3b6b461.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(7, '14', 'excepturi', 'Dolor ullam omnis et sequi exercitationem corrupti. Illum eveniet cum dignissimos quasi. Mollitia facilis voluptatem impedit vitae et aut sit.', 4428, 1021.33, 1, '0eded7cb2fb07dd296ea659b4143aea0.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(8, '14', 'et', 'Sed repellendus distinctio et eligendi. Laboriosam sed aut sint enim voluptatem et soluta aut. Recusandae et architecto eligendi et maxime aut impedit voluptas.', 4649, 8839, 0, 'e470f45c2cb0e274447f0f55de2a10fc.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(9, '25', 'vel', 'Molestiae et odit iste. Harum laborum et non ut blanditiis quia. Assumenda ut omnis cumque reprehenderit alias facere non.', 9956, 1334, 0, 'b19eaaed13b4a7c77843aa3873e8dcc8.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(10, '5', 'a', 'Nostrum aut ipsa ducimus eveniet nemo. Ipsam voluptatibus nesciunt eius nesciunt autem. Molestiae at ex est nemo laudantium.', 1523, 1643, 0, '212109989ccb3ecd5741a8c312fbbf80.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(11, '3', 'doloremque', 'Libero sequi ut dolores voluptas unde ea. Doloribus quisquam aut quam modi maiores ratione. Incidunt in pariatur in. Consectetur ullam et vel consequatur.', 4554, 6987, 0, 'e1e7d72f511ab267039dfef813b3b6f7.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(12, '18', 'vitae', 'Facilis totam perspiciatis inventore nisi quis possimus. Vel eum omnis voluptas impedit autem saepe explicabo. Voluptas consequuntur ut id consequatur nisi.', 5166, 2287, 0, '35b10f2a59d0b6afe83f36c37d67770c.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(13, '11', 'sed', 'Id provident qui esse laudantium id itaque distinctio voluptatum. Quia suscipit quam repellendus et.', 2288, 5941, 1, '33c0ab8ac58511731589da994d6ba3a9.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(14, '22', 'cumque', 'Nesciunt distinctio iure ut temporibus. Nam minus itaque repellat veniam magni alias quia. Veritatis perspiciatis sint cumque quia aspernatur. Voluptas nobis consequuntur et.', 5251, 1370, 0, '431b966c18c8aa90a04ecbbcf63adba0.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(15, '23', 'et', 'Esse esse sit cum tempora nemo molestiae. In id autem et nemo cum accusamus. Nihil quidem odio et nemo mollitia molestias. Eum quaerat ut voluptatibus asperiores laudantium eligendi ut.', 6332, 359, 1, '5b53a2942195e8e231d2bb34b483cb2f.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(16, '17', 'ut', 'Inventore dolor aut ut occaecati suscipit. Nihil ipsam adipisci voluptates est et. Maiores nam ea recusandae dolore.', 4400, 5491, 1, 'e6b6ea872af0c4fa29a0fcb7d9da85b0.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(17, '5', 'ab', 'Placeat impedit autem nobis beatae. Hic quidem voluptas perspiciatis a quia modi. Animi omnis possimus occaecati est minus minus.', 7189, 5991, 1, '3a7e84871c96b68ce5fc9caff9fe0a14.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(18, '14', 'mollitia', 'Nihil totam ea et ut ratione non. Necessitatibus est voluptas in explicabo maxime porro esse. Non placeat ea omnis porro voluptatem sequi ex. Nemo dolores cumque dolor.', 7715, 1405, 0, 'bf3a59d3f78ae51c3d403b263f5fae6c.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(19, '4', 'est', 'Totam ut porro minima minima. Maxime sequi quos et dicta ratione. Harum et id quisquam consequatur sunt.', 2110, 6476, 0, 'd6d4787a6ee8296ba4355fa3360f0a18.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1),
(20, '10', 'sint', 'Ut doloremque quisquam numquam quis. Voluptatibus corrupti suscipit tempore. Deserunt perspiciatis voluptatibus nulla dolor sint.', 8852, 981, 0, 'a2cbdeab61b393b809ff5837c15b34ec.jpg', '2020-07-13 14:22:06', '2020-07-13 14:22:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '7bb9fd5e69aad9761b61b83f9ac43e4a.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `user_id`, `product_id`, `review`, `image`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'ok', NULL, '2021-01-05 03:01:56', '2021-01-05 03:01:56'),
(2, 3, 3, 'Lorem Ipsum! Lorem Ipsum ! Lorem Ipsum! Lorem Ipsum !Lorem Ipsum !Lorem Ipsum !Lorem Ipsum !Lorem Ipsum !Lorem Ipsum !Lorem Ipsum !Lorem Ipsum ! Lorem Ipsum ! Lorem Ipsum !', NULL, '2021-01-05 03:09:28', '2021-01-05 03:09:28'),
(3, 3, 3, 'orem Ipsum! Lorem Ipsum ! Lorem Ipsum! Lorem Ipsum !Lorem Ipsum !Lorem Ipsum !Lorem Ipsum !Lorem Ipsum !Lorem Ipsum !Lorem Ipsum !Lorem Ipsum ! Lorem Ipsum ! Lorem Ipsum !', NULL, '2021-01-05 03:10:08', '2021-01-05 03:10:08'),
(4, 4, 9, 'Lorem Ipsum! Lorem Ipsum ! Lorem Ipsum! Lorem Ipsum !Lorem Ipsum !Lorem Ipsum !Lorem Ipsum !Lorem Ipsum!', NULL, '2021-01-05 03:12:21', '2021-01-05 03:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town_or_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `order_id`, `name`, `street_address`, `town_or_city`, `district`, `post_code`, `phone`, `additional_details`, `created_at`, `updated_at`) VALUES
(1, 14, NULL, 'Village: Hazarigonj, PO: Goldarhat, Thana:Shashibussion, District: Bhola', 'Select Country...', 'Select Country...', '8340', NULL, NULL, '2020-12-27 14:57:15', '2020-12-27 14:57:15'),
(2, 15, NULL, 'Village: Hazarigonj, PO: Goldarhat, Thana:Shashibussion, District: Bhola', 'Select Country...', 'Select Country...', '8340', NULL, NULL, '2020-12-27 15:00:48', '2020-12-27 15:00:48'),
(3, 16, NULL, 'Village: Hazarigonj, PO: Goldarhat, Thana:Shashibussion, District: Bhola', 'Select Country...', 'Select Country...', '8340', NULL, NULL, '2020-12-27 15:04:47', '2020-12-27 15:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `description`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, '6', 'ex', 'Fugiat omnis est asperiores ullam aut dolores. Assumenda illum dolores harum sit enim est. Aliquid nesciunt ratione veniam ea molestiae qui.', '6c382fa917cb8161eedb9d7a17939740.jpg', '2020-07-13 14:01:46', '2020-07-13 14:01:46'),
(2, '7', 'non', 'Fuga ut voluptatem excepturi ad pariatur dolor qui. Ut culpa molestias eveniet sint quos. Alias dicta placeat earum. Qui possimus sit eius et velit eius atque optio.', '1cea68d2e6614a788e481a4bb9f68a0d.jpg', '2020-07-13 14:01:46', '2020-07-13 14:01:46'),
(3, '8', 'harum', 'Assumenda doloremque laudantium consequatur optio quam. Fugit aut et dicta. Libero nostrum aut sit illum quasi.', '7e53e31d651e21447fb173cc3e8b82e4.jpg', '2020-07-13 14:01:46', '2020-07-13 14:01:46'),
(4, '9', 'provident', 'Doloribus doloribus neque provident itaque iste. Aut quia ut consectetur praesentium unde sapiente non.', 'ec54b6e7ab5efdc81e546d47494da06b.jpg', '2020-07-13 14:01:46', '2020-07-13 14:01:46'),
(5, '10', 'quia', 'Vitae id necessitatibus culpa ratione. Ut sapiente hic sunt illum harum illo. Quae laudantium accusamus dolores animi. Sint officia maxime nostrum non. Aspernatur ut optio aut sint at laboriosam.', '4e728c1533924c7563f7db1cf5c4d131.jpg', '2020-07-13 14:01:46', '2020-07-13 14:01:46'),
(6, '11', 'minima', 'Atque asperiores soluta alias in. Hic sapiente sed soluta ipsam praesentium. Laboriosam rem quam delectus eum. Reprehenderit aut accusantium fuga sint doloremque.', '929f364440295fcdb899b37371a9c071.jpg', '2020-07-13 14:06:13', '2020-07-13 14:06:13'),
(7, '12', 'fugiat', 'Et qui similique reiciendis voluptas nisi sunt inventore. Et porro sint fugiat officiis voluptas. Dolores eligendi eius nulla facilis.', '0586484b64c22b787862d30cc50e9e13.jpg', '2020-07-13 14:06:17', '2020-07-13 14:06:17'),
(8, '13', 'et', 'Est enim voluptatem cum adipisci. Et voluptas voluptate similique aut. Voluptate et iusto aut ratione perferendis atque. Accusantium ad aliquam amet natus tenetur modi.', '66eedfd4d0841ce7532603ef2f90356e.jpg', '2020-07-13 14:06:20', '2020-07-13 14:06:20'),
(9, '14', 'aliquid', 'Aut nulla ut id. Ab ut dolores earum autem dolorem. Tempore deleniti atque sint autem eum. Qui ad sunt nostrum facere qui nemo. Praesentium nisi itaque similique.', '68b19c797a2562bb3154e85112d15fe0.jpg', '2020-07-13 14:06:23', '2020-07-13 14:06:23'),
(10, '15', 'tenetur', 'Quasi totam sed dolore doloribus minus. Natus voluptas architecto sequi doloribus itaque reiciendis.', '1ec71efb7e5b50f65c18b18dc9c1ab5e.jpg', '2020-07-13 14:06:28', '2020-07-13 14:06:28'),
(11, '16', 'veniam', 'Laudantium nobis itaque similique quia et. Non sint eum minus sed a qui itaque totam. Et ab molestiae commodi sunt iusto tempore. Vitae ut et commodi natus consequatur.', 'b82b5a2ba61783453dc8f73fcb2f19b7.jpg', '2020-07-13 14:06:32', '2020-07-13 14:06:32'),
(12, '17', 'dolorem', 'Ipsa rerum illum amet voluptas est quia. Qui ea voluptas maxime quam. Laboriosam aut reiciendis nesciunt eius. Dolor fugit tempora aut provident exercitationem dolorum et.', '13e26f5c88bc7463a3b7d870df5d839b.jpg', '2020-07-13 14:06:36', '2020-07-13 14:06:36'),
(13, '18', 'autem', 'Quas labore laboriosam voluptates odit dolore perferendis qui expedita. Est et amet esse dolores qui.', 'c4640474c1e68f122bf6eaa27ec53728.jpg', '2020-07-13 14:06:41', '2020-07-13 14:06:41'),
(14, '19', 'possimus', 'Voluptatum iusto veritatis est culpa ullam velit autem. Corrupti eos rem vel. Nesciunt quia odit omnis beatae incidunt.', '613ad1367f0fbfcd2c2ad9ebc60ebc83.jpg', '2020-07-13 14:06:45', '2020-07-13 14:06:45'),
(15, '20', 'repellendus', 'Nulla quia facere est expedita ullam cum. Ut quo quisquam vel eum ipsa numquam. Corporis saepe doloremque adipisci quaerat sed porro corrupti assumenda.', '94e8ff941347615364dc433772356f8b.jpg', '2020-07-13 14:06:49', '2020-07-13 14:06:49'),
(16, '21', 'omnis', 'Nisi atque beatae ipsum eos consequuntur. Vel hic itaque quisquam consequuntur sint repellat. Nostrum dolor illum id fugiat.', '1db69b97af7b43941b80fbf6a6819af3.jpg', '2020-07-13 14:06:53', '2020-07-13 14:06:53'),
(17, '22', 'sint', 'Dolor ipsam aut eos earum. Ipsa quos error ut non occaecati. Voluptas ut temporibus maxime omnis excepturi modi consequatur. Eligendi et molestias quibusdam velit.', '518c789082a0962520cbeefca1fed37d.jpg', '2020-07-13 14:06:56', '2020-07-13 14:06:56'),
(18, '23', 'omnis', 'Facere consectetur assumenda non aut quae odio error. Sapiente assumenda blanditiis assumenda ipsum quae nulla. Asperiores dignissimos adipisci quam ipsa dolores rerum facere.', 'dddc05072d60f72432bf24380c1557d6.jpg', '2020-07-13 14:07:01', '2020-07-13 14:07:01'),
(19, '24', 'aliquid', 'Nostrum error ipsum est hic modi eum. Reiciendis suscipit iste ipsum quas dolorem rerum. Enim libero iure veniam quo eos. Reprehenderit delectus asperiores nostrum eius vel.', '261b161fb1b894fa932133b662c85718.jpg', '2020-07-13 14:07:05', '2020-07-13 14:07:05'),
(20, '25', 'minus', 'Unde dolor alias aut cum fugiat deleniti. Ea mollitia dolorem et dolores velit.', 'dce12136a50b1e7e0a7a873878b8ae19.jpg', '2020-07-13 14:07:09', '2020-07-13 14:07:09'),
(21, '26', 'quam', 'Doloribus sit quia sint culpa beatae. Autem quo natus est sint. Et et corporis possimus assumenda. Qui numquam odio magnam.', '18ba5c8d88f469922406f05ef509f352.jpg', '2020-07-13 14:07:12', '2020-07-13 14:07:12'),
(22, '27', 'cupiditate', 'Debitis eum et inventore optio suscipit minima nihil. Corrupti quia omnis qui ut nihil. Magnam nisi tempora sed in cupiditate nihil.', '760b60761ff51896e4d57e274f5d1e78.jpg', '2020-07-13 14:07:16', '2020-07-13 14:07:16'),
(23, '28', 'ullam', 'Id qui vel qui et. Repellendus nulla ratione sunt voluptatem recusandae sed sit. Deserunt fugiat in illum dicta.', '83bb63d142d13b8c52ed61dc91941c9f.jpg', '2020-07-13 14:07:19', '2020-07-13 14:07:19'),
(24, '29', 'laudantium', 'Aut eveniet sapiente aut. Sit sed quis laboriosam rerum qui dolorem. Laudantium optio quam modi voluptatum rem nemo enim.', '7db2af0d90b33efd66742518087e48b5.jpg', '2020-07-13 14:07:22', '2020-07-13 14:07:22'),
(25, '30', 'laudantium', 'Quis voluptate nulla et qui id quod. Perspiciatis eius velit illum ducimus corporis nulla nemo.', '59042cfb9879a654bd5f067d555ec05f.jpg', '2020-07-13 14:07:25', '2020-07-13 14:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `active_status`, `dark_mode`, `messenger_color`, `email_verified_at`, `password`, `facebook_id`, `google_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Drimik 4u', 'drimik2010@gmail.com', 'avatar.png', 0, 0, '#2180f3', NULL, '98d8a23fd60826a2a474c5b4f5811707', NULL, '114411052706319548792', NULL, '2020-12-20 11:56:47', '2020-12-20 11:56:47'),
(2, 'techover file', 'techoverlmn@gmail.com', 'avatar.png', 0, 0, '#2180f3', NULL, '7f39f8317fbdb1988ef4c628eba02591', NULL, '107466083718106871182', NULL, '2020-12-20 13:30:03', '2020-12-20 13:30:03'),
(3, 'Nahid Hasan Limon', 'nh.limon2010@gmail.com', 'avatar.png', 0, 0, '#2180f3', NULL, 'ad68473a64305626a27c32a5408552d7', NULL, '108577829226192454917', NULL, '2020-12-20 13:32:55', '2020-12-20 13:32:55'),
(4, 'Toyota Service Center', 'toyotaservicecenterbd@gmail.com', 'avatar.png', 0, 0, '#2180f3', NULL, '4a3fd911279cd8bc597fa13222ef83be', NULL, '111928184889045169096', NULL, '2020-12-21 13:33:00', '2020-12-21 13:33:00'),
(13, 'Sheehan Rahman', 'sheehanvy22@gmail.com', 'avatar.png', 0, 0, '#2180f3', NULL, '12345678', NULL, NULL, NULL, '2020-12-27 15:04:47', '2020-12-27 15:04:47'),
(15, 'Sheehan Rahman', 'sheehanvy@gmail.com', 'avatar.png', 0, 0, '#2180f3', NULL, 'gfdgfdg', NULL, NULL, NULL, '2021-01-01 12:44:40', '2021-01-01 12:44:40'),
(16, 'Folmool BD', 'folmoolbd@gmail.com', 'avatar.png', 0, 1, '#9C27B0', NULL, 'd98c1545b7619bd99b817cb3169cdfde', NULL, '110186565978108683821', NULL, '2021-01-13 13:09:33', '2021-01-14 00:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town_or_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `street_address`, `town_or_city`, `district`, `post_code`, `phone`, `additional_details`, `created_at`, `updated_at`) VALUES
(2, 12, NULL, 'Select Country...', 'Select Country...', '1213', '01621316727', '444', '2020-12-27 15:00:47', '2020-12-27 15:00:47'),
(3, 13, NULL, 'Select Country...', 'Select Country...', '1213', '01621316727', '444', '2020-12-27 15:04:47', '2020-12-27 15:04:47'),
(4, 14, NULL, 'Select Country...', 'Select Country...', '1213', NULL, NULL, '2021-01-01 08:54:02', '2021-01-01 08:54:02'),
(5, 38, 'Road 17/A, Banani, House 17', 'Albania', 'Select Country...', '1213', '01621316727', NULL, '2021-01-01 12:44:40', '2021-01-01 12:44:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_checkouts`
--
ALTER TABLE `guest_checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest_checkouts`
--
ALTER TABLE `guest_checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
