CREATE TABLE `weekrecord` (
  `week` tinyint(1) DEFAULT NULL,
  `titile` varchar(250) DEFAULT NULL,
  `expire_date` int(11) DEFAULT '0',
  `note`varchar(250) DEFAULT NULL
  PRIMARY KEY (`week`)
) DEFAULT CHARSET=utf8;
