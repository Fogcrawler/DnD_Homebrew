CREATE TABLE IF NOT EXISTS `stats` (
	`id` int(32) NOT NULL AUTO_INCREMENT,
	`ip` varchar(64) NOT NULL,
	`time` varchar(32) NOT NULL,
	`date` varchar(32) NOT NULL,
	`name` varchar(64) NOT NULL,
	`homebrew` varchar(32) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
