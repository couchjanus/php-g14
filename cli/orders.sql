-- Adminer 4.5.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `products`, `status`) VALUES
(19,	4,	'2019-06-21 10:02:53',	'\"[{\\\"Id\\\":\\\"25\\\",\\\"Product\\\":\\\"Green Cat\\\",\\\"Price\\\":\\\"$555\\\",\\\"Quantity\\\":\\\"3\\\",\\\"Picture\\\":\\\"images\\\\\\/products\\\\\\/7e5dfe16732e1b09b39ea84d5adc235642ca81c41560011421\\\"}]\"',	2),
(20,	4,	'2019-09-04 11:17:27',	'\"[{\\\"id\\\":\\\"2\\\",\\\"name\\\":\\\"Black Car\\\",\\\"price\\\":\\\"444\\\",\\\"picture\\\":\\\"images\\\\\\/products\\\\\\/042c86fd77ec52db46e6773601039962b3cde96a1566558566\\\",\\\"amount\\\":1}]\"',	1),
(21,	4,	'2019-09-04 11:19:38',	'\"[{\\\"id\\\":\\\"9\\\",\\\"name\\\":\\\"Yellow Cat\\\",\\\"price\\\":\\\"123\\\",\\\"picture\\\":\\\"images\\\\\\/products\\\\\\/80aaf8262a1cf95c0f70b7f7a65ec383dd7281c61566821118\\\",\\\"amount\\\":1}]\"',	1),
(22,	4,	'2019-09-04 11:21:32',	'\"[{\\\"id\\\":\\\"2\\\",\\\"name\\\":\\\"Black Car\\\",\\\"price\\\":\\\"444\\\",\\\"picture\\\":\\\"images\\\\\\/products\\\\\\/042c86fd77ec52db46e6773601039962b3cde96a1566558566\\\",\\\"amount\\\":1}]\"',	1);

-- 2019-09-04 13:09:29