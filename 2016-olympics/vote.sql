CREATE TABLE `2016olympics` (
  `id` SMALLINT (6) NOT NULL AUTO_INCREMENT,
  `week` tinyint(1) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `phone` char(12) DEFAULT NULL,
  `number` SMALLINT (3) DEFAULT NULL,
  `ip` varchar(50) DEFAULT '0.0.0.0',
  `dateline` int(11) DEFAULT '0',
  `note`varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


