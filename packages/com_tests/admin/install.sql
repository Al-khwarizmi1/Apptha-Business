DROP TABLE IF EXISTS `#__testimonal`;
 
CREATE TABLE `#__testimonal` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `description`  text NOT NULL,
  `date` date,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
INSERT INTO `#__testimonal` (`id`, `title`, `name`, `description`, `date`) VALUES (NULL, 'Testimonials', 'Apptha', 'Apptha Team', '2011-06-23');