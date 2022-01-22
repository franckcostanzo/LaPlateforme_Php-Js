SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- -----------------------------------------------------
-- Schema livreor
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `franck-costanzo_livreor` DEFAULT CHARACTER SET utf8mb4 ;

USE `franck-costanzo_livreor` ;

create table if not exists `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


create table if not exists `utilisateurs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
