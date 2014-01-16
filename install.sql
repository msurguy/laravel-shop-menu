-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2014 at 02:23 AM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `shop-menu`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Cupcake wrappers', 'cupcake-wrappers', 'Printable cupcake wrappers', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Baby Shower Products', 'baby-shower-products', 'Baby shower supplies', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Bridal Shower', 'bridal-shower', 'Bridal shower supplies', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 3, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 2, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 2, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 3, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 2, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 2, 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 3, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 2, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 2, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 2, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 1, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 1, 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 2, 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 3, 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 2, 24, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 3, 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `rating_cache` float(2,1) unsigned NOT NULL DEFAULT '3.0',
  `rating_count` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `pricing` float(9,2) unsigned NOT NULL DEFAULT '0.00',
  `short_description` varchar(255) NOT NULL,
  `long_description` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `published`, `rating_cache`, `rating_count`, `name`, `slug`, `pricing`, `short_description`, `long_description`, `icon`, `banner`, `created_at`, `updated_at`) VALUES
(1, 1, 3.0, 0, 'Cupcake wrapper', '1-cupcake-wrapper', 20.99, 'This is a short description asdf as This is a short description asdf as', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-1.jpg', 'img/icons/banner/1.jpg', '2013-11-06 05:11:00', '2013-12-14 21:40:10'),
(2, 1, 3.0, 0, 'Second product', '2-second-product', 55.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-2.jpg', 'img/icons/banner/2.jpg', '2013-11-06 05:11:00', '2013-11-11 16:17:23'),
(3, 1, 4.0, 0, 'Third product', '3-third-product', 65.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-3.jpg', 'img/icons/banner/3.jpg', '2013-11-06 05:11:00', '2013-11-06 06:08:00'),
(4, 1, 5.0, 0, 'Fourth product', '4-fourth-product', 85.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-4.jpg', 'img/icons/banner/4.jpg', '2013-11-06 05:11:00', '2013-11-06 06:08:00'),
(5, 1, 2.5, 0, 'Fifth product', '5-fifth-product', 95.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-5.jpg', 'img/icons/banner/5.jpg', '2013-11-06 05:11:00', '2013-11-06 06:08:00'),
(6, 1, 3.0, 0, 'Sixth product', '6-cupcake-wrapper', 20.99, 'This is a short description asdf as This is a short description asdf as', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-1.jpg', 'img/icons/banner/1.jpg', '2013-11-06 05:11:00', '2013-12-14 21:40:10'),
(7, 1, 3.0, 0, 'Seventh product', '7-second-product', 55.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-2.jpg', 'img/icons/banner/2.jpg', '2013-11-06 05:11:00', '2013-11-11 16:17:23'),
(8, 1, 3.2, 0, 'Eight product', '8-third-product', 65.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-3.jpg', 'img/icons/banner/3.jpg', '2013-11-06 05:11:00', '2013-11-06 06:08:00'),
(9, 1, 4.0, 0, 'Ninth product', '9-fourth-product', 85.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-4.jpg', 'img/icons/banner/4.jpg', '2013-11-06 05:11:00', '2013-11-06 06:08:00'),
(10, 1, 5.0, 0, 'Tenth product', '10-fifth-product', 95.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-5.jpg', 'img/icons/banner/5.jpg', '2013-11-06 05:11:00', '2013-11-06 06:08:00'),
(11, 1, 2.0, 0, 'Eleventh Product', '11-cupcake-wrapper', 20.99, 'This is a short description asdf as This is a short description asdf as', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-1.jpg', 'img/icons/banner/1.jpg', '2013-11-06 05:11:00', '2013-12-14 21:40:10'),
(12, 1, 2.0, 0, 'Twelveth product', '12-second-product', 55.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-2.jpg', 'img/icons/banner/2.jpg', '2013-11-06 05:11:00', '2013-11-11 16:17:23'),
(13, 1, 4.0, 0, 'Thirteenth product', '13-third-product', 65.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-3.jpg', 'img/icons/banner/3.jpg', '2013-11-06 05:11:00', '2013-11-06 06:08:00'),
(14, 1, 5.0, 0, 'Fourteenth product', '14-fourth-product', 85.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-4.jpg', 'img/icons/banner/4.jpg', '2013-11-06 05:11:00', '2013-11-06 06:08:00'),
(15, 1, 3.0, 0, 'Fifteenth product', '15-fifth-product', 95.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-5.jpg', 'img/icons/banner/5.jpg', '2013-11-06 05:11:00', '2013-11-06 06:08:00'),
(16, 1, 3.0, 0, 'Cupcake wrapper 16', '16-cupcake-wrapper', 20.99, 'This is a short description asdf as This is a short description asdf as', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-1.jpg', 'img/icons/banner/1.jpg', '2013-11-06 05:11:00', '2013-12-14 21:40:10'),
(17, 1, 3.0, 0, 'Product 17', '17-second-product', 55.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-2.jpg', 'img/icons/banner/2.jpg', '2013-11-06 05:11:00', '2013-11-11 16:17:23'),
(18, 1, 3.0, 0, 'Product 18', '18-third-product', 65.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-3.jpg', 'img/icons/banner/3.jpg', '2013-11-06 05:11:00', '2013-11-06 06:08:00'),
(19, 1, 5.0, 0, 'Product 19', '19-fourth-product', 85.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-4.jpg', 'img/icons/banner/4.jpg', '2013-11-06 05:11:00', '2013-11-06 06:08:00'),
(20, 1, 3.0, 0, 'Twentieth product', '20-fifth-product', 95.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-5.jpg', 'img/icons/banner/5.jpg', '2013-11-06 05:11:00', '2013-11-06 06:08:00'),
(21, 1, 3.0, 0, '21 product', '21-cupcake-wrapper', 20.99, 'This is a short description asdf as This is a short description asdf as', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-1.jpg', 'img/icons/banner/1.jpg', '2013-11-06 05:11:00', '2013-12-14 21:40:10'),
(22, 1, 5.0, 0, '22 product', '22-second-product', 55.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-2.jpg', 'img/icons/banner/2.jpg', '2013-11-06 05:11:00', '2013-11-11 16:17:23'),
(23, 1, 4.0, 0, '23 product', '23-third-product', 65.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-3.jpg', 'img/icons/banner/3.jpg', '2013-11-06 05:11:00', '2013-11-06 06:08:00'),
(24, 1, 3.0, 0, '24 product', '24-fourth-product', 85.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-4.jpg', 'img/icons/banner/4.jpg', '2013-11-06 05:11:00', '2013-11-06 06:08:00'),
(25, 1, 5.0, 0, 'Fifth product', '25-fifth-product', 95.00, 'This is a short description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'img/icons/product-5.jpg', 'img/icons/banner/5.jpg', '2013-11-06 05:11:00', '2013-11-06 06:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `approved` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `spam` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `seoble_id` int(11) unsigned NOT NULL,
  `seoble_type` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(10) unsigned NOT NULL DEFAULT '0',
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
