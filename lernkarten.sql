FLUSH PRIVILEGES;
CREATE USER 'lernkarten'@'localhost' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON *.* TO 'lernkarten'@'localhost' WITH GRANT OPTION;

CREATE DATABASE lernkarten;

use lernkarten;

CREATE TABLE IF NOT EXISTS `lernkarten` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `proxy` text NOT NULL,
  `subject` text NOT NULL,
  `theme` text NOT NULL,
  `category` text NOT NULL,
  `image` blob,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS `log` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT,
  `timestamp` text NOT NULL,
  `ip` text NOT NULL,
  `proxy` text NOT NULL,
  `query` text NOT NULL,
  PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS `test` (
	  `id` SMALLINT NOT NULL AUTO_INCREMENT,
	  `datum` DATE NOT NULL UNIQUE,
	  `morgen` text NOT NULL,
	  `abends` text NOT NULL,
	  PRIMARY KEY (id)
	);

INSERT INTO `test` (`datum`, `morgen`, `abends`) VALUES
	('2017-7-19', 'Hauswart Telli', '1'),
	('2017-7-20', '2', 'Hauswart Telli'),
	('2017-7-21', 'Hauswart Telli', '3'),
	('2017-7-22', 'Hauswart Telli', '4');

