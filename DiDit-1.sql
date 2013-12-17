CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `address1` varchar(15) NOT NULL,
  `address2` varchar(15) NOT NULL,
  `state` char(2) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(10) NOT NULL,
  `locationId` int(100) NOT NULL,
  `description` text NOT NULL,
  `createDate` datetime NOT NULL,
  `dueDate` datetime NOT NULL,
  `priority` int(10) NOT NULL,
  `status` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB;

CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` char(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=InnoDB;

INSERT INTO `Users` (`id`, `userName`, `firstName`, `lastName`, `password`, `email`) VALUES
(1, 'carson', 'carson', 'herrington', '??????????', 'carson@herrington.com'),
(2, 'smartalec', 'alec', 'lopez', '??????????', 'smartalec@gmail.com');

ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`) ON UPDATE CASCADE;