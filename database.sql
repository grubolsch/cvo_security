/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO', SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;

# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`
(
    `id`       int unsigned                       NOT NULL AUTO_INCREMENT,
    `email`    varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    `isAdmin`  tinytext,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users`
    DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`, `isAdmin`)
VALUES (1, 'admin@whole-cheese.be', 'c4ab26c9257182b8bccecb1117289985', '1');

/*!40000 ALTER TABLE `users`
    ENABLE KEYS */;
UNLOCK TABLES;

# Dump of table invoices
# ------------------------------------------------------------

DROP TABLE IF EXISTS `invoices`;

CREATE TABLE `invoices`
(
    `id`     int unsigned                       NOT NULL AUTO_INCREMENT,
    `userId` int unsigned                       NOT NULL,
    `file`   varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    `name`   varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    PRIMARY KEY (`id`),
    KEY `userId` (`userId`),
    CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4;

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices`
    DISABLE KEYS */;

/*!40000 ALTER TABLE `invoices`
    ENABLE KEYS */;
UNLOCK TABLES;

CREATE TABLE `messages`
(
    `id`         int unsigned                                          NOT NULL AUTO_INCREMENT,
    `user_id`    int                                                   NOT NULL,
    `to_user_id` int DEFAULT NULL,
    `message`    text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
