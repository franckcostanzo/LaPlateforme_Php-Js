CREATE SCHEMA IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8mb4;

USE `test`;

CREATE TABLE IF NOT EXISTS Users (
id_user INT AUTO_INCREMENT NOT NULL,
login VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL,
PRIMARY KEY (id_user)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Messages (
message_id INT AUTO_INCREMENT NOT NULL,
message TEXT,
id_user INT NOT NULL,
PRIMARY KEY (message_id),
CONSTRAINT FK_users_user_id FOREIGN KEY (id_user) REFERENCES users (id_user)
) ENGINE=InnoDB;

INSERT INTO `users` (`id_user`, `login`, `password`) VALUES (NULL, 'test', '$2y$10$XnkS3IxtYmNjTUhTt4ynn.fupTbPiUhcHMB/Z60Glz2xclhn3hotu');

INSERT INTO `messages` (`message_id`,`message`, `id_user`) VALUES (NULL, 'YOUPI TROLOLOLOL CHABADABADA !', 1);
INSERT INTO `messages` (`message_id`,`message`, `id_user`) VALUES (NULL, 'SECOND MESSAGE OH YEAH, COMIN AGAIN TO SAVE THE DAY !', 1);