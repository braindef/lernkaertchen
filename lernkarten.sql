FLUSH PRIVILEGES;
CREATE USER IF NOT EXISTS 'lernkarten'@'localhost' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON *.* TO 'lernkarten'@'localhost' WITH GRANT OPTION;

CREATE DATABASE IF NOT EXISTS lernkarten;

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
