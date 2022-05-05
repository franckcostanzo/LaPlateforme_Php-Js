CREATE SCHEMA IF NOT EXISTS `connect4` DEFAULT CHARACTER SET utf8mb4 ;

USE `connect4` ;

CREATE TABLE IF NOT EXISTS `games` (
  `id_game` int(11) AUTO_INCREMENT NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gamer1` varchar(255) NOT NULL,
  `gamer2` varchar(255),
  `game_plan` TEXT,
  PRIMARY KEY (`id_game`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) AUTO_INCREMENT NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `games_played` int(5) DEFAULT 0,
  `win` int(5) DEFAULT 0,
  `loss` int(5) DEFAULT 0,
  `ingame` int(5),
  CONSTRAINT `FK_games_id_game_users` FOREIGN KEY (`ingame`) REFERENCES `games` (`id_game`),
  PRIMARY KEY (`id_user`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


