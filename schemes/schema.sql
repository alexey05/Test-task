CREATE TABLE IF NOT EXISTS `short_urls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `long_url` text NOT NULL,
  `short_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `short_url` (`short_url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;