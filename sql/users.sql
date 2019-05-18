/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) UNIQUE NOT NULL,
  `password` char(128) NOT NULL,
  cognome varchar(50) NOT NULL,
  nome varchar(50) NOT NULL,
  data_nascita date NOT NULL,
  via varchar(50) NOT NULL,
  provincia varchar(2) NOT NULL,
  comune varchar(50) NOT NULL,
  tipologia ENUM('A','C','E') NOT NULL COMMENT "Administrator, Client, Employee",
  PRIMARY KEY (`id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`provincia`) REFERENCES `province` (`sigla`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
