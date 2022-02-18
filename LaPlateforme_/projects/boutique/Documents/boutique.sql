CREATE SCHEMA IF NOT EXISTS `boutique` DEFAULT CHARACTER SET utf8mb4 ;

USE `boutique` ;

-- ------------------------------------
--          Rights table             --
-- ------------------------------------

CREATE TABLE IF NOT EXISTS Rights (
right_id INT AUTO_INCREMENT NOT NULL, 
right_name VARCHAR(255), 
PRIMARY KEY (right_id)
) ENGINE=InnoDB;


-- ------------------------------------
--          Users table            --
-- ------------------------------------

CREATE TABLE IF NOT EXISTS Users (
id_user INT AUTO_INCREMENT NOT NULL,
firstname VARCHAR(255),
lastname VARCHAR(255),
email VARCHAR(255),
password VARCHAR(255),
phone VARCHAR(10),
has_fidelity_bonus BOOLEAN,
right_id INT NOT NULL,
birthday DATE,
address VARCHAR(255),
zip_code INT(5),
PRIMARY KEY (id_user),
CONSTRAINT FK_Clients_right_id_Rights FOREIGN KEY (right_id) REFERENCES Rights (right_id)
) ENGINE=InnoDB;

-- ------------------------------------
--        payments_method table      --
-- ------------------------------------


CREATE TABLE IF NOT EXISTS payments_method (
payment_id INT AUTO_INCREMENT NOT NULL,
date_paid DATE,
payment_description TEXT,
PRIMARY KEY (payment_id)
) ENGINE=InnoDB;


-- ------------------------------------
--          Orders table             --
-- ------------------------------------

CREATE TABLE IF NOT EXISTS Orders (
order_id INT AUTO_INCREMENT NOT NULL,
id_user INT NOT NULL,
payment_id INT NOT NULL,
date_ordered DATE,
PRIMARY KEY (order_id),
CONSTRAINT FK_Orders_id_user_Users FOREIGN KEY (id_user) REFERENCES Users (id_user),
CONSTRAINT FK_Orders_payment_id_payment_method FOREIGN KEY (payment_id) REFERENCES payments_method (payment_id)
) ENGINE=InnoDB;


-- ------------------------------------
--          Categories table         --
-- ------------------------------------

CREATE TABLE IF NOT EXISTS Categories (
category_id INT AUTO_INCREMENT NOT NULL,
category_name VARCHAR(255),
PRIMARY KEY (category_id)
) ENGINE=InnoDB;




-- ------------------------------------
--         Subcategories table       --
-- ------------------------------------

CREATE TABLE IF NOT EXISTS Subcategories (
subcategory_id INT AUTO_INCREMENT NOT NULL,
subcategory_name VARCHAR(255),
PRIMARY KEY (subcategory_id)
) ENGINE=InnoDB;



-- ------------------------------------
--         Products table            --
-- ------------------------------------

CREATE TABLE IF NOT EXISTS Products (
product_id INT AUTO_INCREMENT NOT NULL,
product_name VARCHAR(255),
img_url VARCHAR(255),
unit_price DECIMAL,
product_description TEXT,
units_in_stock INT,
category_id INT NOT NULL,
subcategory_id INT NOT NULL,
PRIMARY KEY (product_id),
CONSTRAINT FK_Products_category_id_Category FOREIGN KEY (category_id) REFERENCES Categories (category_id),
CONSTRAINT FK_Products_subcategory_id_Subcategory FOREIGN KEY (subcategory_id) REFERENCES Subcategories (subcategory_id)
) ENGINE=InnoDB;


-- ------------------------------------
--       To_concern table            --
-- ------------------------------------

CREATE TABLE IF NOT EXISTS To_concern (
order_id INT AUTO_INCREMENT NOT NULL,
product_id INT NOT NULL,
quantity_ordered INT,
PRIMARY KEY (order_id, product_id),
CONSTRAINT FK_To_concern_order_id_Orders FOREIGN KEY (order_id) REFERENCES Orders (order_id),
CONSTRAINT FK_To_concern_product_id_Products FOREIGN KEY (product_id) REFERENCES Products (product_id)
) ENGINE=InnoDB;


-- ------------------------------------
--         Data generation           --
-- ------------------------------------

-- -------- CATEGORIES ----------------
INSERT INTO `categories` (`category_id`, `category_name`) VALUES (NULL, 'city');
INSERT INTO `categories` (`category_id`, `category_name`) VALUES (NULL, 'friends');
INSERT INTO `categories` (`category_id`, `category_name`) VALUES (NULL, 'marvel');
INSERT INTO `categories` (`category_id`, `category_name`) VALUES (NULL, 'starwars');



-- -------- SUBCATEGORIES -------------
INSERT INTO `subcategories` (`subcategory_id`, `subcategory_name`) VALUES (NULL, 'vehicule');
INSERT INTO `subcategories` (`subcategory_id`, `subcategory_name`) VALUES (NULL, 'scene');



-- -------- PRODUCTS ------------------
INSERT INTO `products` (`product_id`, `product_name`, `img_url`, `unit_price`, `product_description`, `units_in_stock`, `category_id`, `subcategory_id`) 
VALUES (NULL, 'Fire Copter','Elements/ProductImg/cityVehicule.jpg', 9.99, 
"Initiez les plus jeunes au monde captivant de LEGO City grâce au jouet pour enfants LEGO City Fire L’hélicoptère des pompiers (60318), 
comprenant un jouet hélicoptère avec un compartiment de stockage et des hélices qui tournent ainsi qu’une figurine de pompier et de vendeur de hot-dogs. 
Il ne reste plus qu’à ajouter une poubelle, des flammes LEGO et un hot-dog brûlé pour stimuler des heures de jeu d’imagination. 
Ce jouet pour filles et garçons dès l’âge de 4 ans est fourni avec des instructions de montage papier imagées et une brique LEGO de démarrage, 
une base pré-formée sur laquelle ils peuvent commencer à construire l’hélicoptère. 
De plus, les enfants peuvent aussi utiliser le guide de montage numérique interactif qui leur permet de zoomer, 
pivoter et visualiser les modèles créés sous tous les angles au cours de la construction. 
Il est disponible dans l’application gratuite LEGO Instructions de montage pour smartphones et tablettes. 
Les sets et jouets de construction LEGO pour les enfants comprennent des bâtiments qui regorgent de fonctionnalités, 
des véhicules réalistes et des personnages amusants qui stimuleront le jeu de rôle des enfants en s’inspirant des héros et des événements de la vie quotidienne. 
Ils constituent une superbe idée de cadeau d’anniversaire ou de Noël LEGO pour les enfants dès 4 ans.", 3, 1, 1);

INSERT INTO `products` (`product_id`, `product_name`, `img_url`, `unit_price`, `product_description`, `units_in_stock`, `category_id`, `subcategory_id`) 
VALUES (NULL, 'Police Station','Elements/ProductImg/cityScene.jpg', 29.99, 
"Arrête le camion et libère le chien de la police ! Le bandit enfermé dans la prison mobile essaie
de s’échapper, avec l’aide d’un complice. Attache le crochet et la chaîne aux barreaux de la
porte de la prison et accélère avec le tout-terrain pour briser la porte. Abaisse la rampe
arrière du poste de commandement mobile et décharge la moto de police, puis fonce après les
bandits et ramène-les en prison !", 10, 1, 2);

INSERT INTO `products` (`product_id`, `product_name`, `img_url`, `unit_price`, `product_description`, `units_in_stock`, `category_id`, `subcategory_id`) 
VALUES (NULL, 'Kitty Van', 'Elements/ProductImg/friendsVehicule.jpg', 9.99, 
"Avec La voiture de toilettage pour chat (41439)les enfants développent leurs compétences en construction. 
Les enfants peuvent recueillir les figurines des chats dans le véhicule des mini-poupées Emma et Mia de LEGO Friends et les emmener au salon. 
Apprendre à construire Ce voiture jouet pour les enfants de 4 ans et plus regorge de détails amusants pour une formidable expérience de jeu. 
Chaque sachet contient un modèle complet qui se construit rapidement pour que le jeu commence immédiatement. 
Il contient aussi une brique de démarrage qui facilite la construction. 
S'amuser en famille Les sets 4+ permettent aux adultes et aux enfants de partager le bonheur de construire. 
Ce jeu de construction proposeoutre les instructions papierle guide Instructions PLUS. 
Disponible dans l’appli LEGO Instructions de montageil inclut des outils de zoom et de rotation et un mode fantôme. 
Il leur permet également de sauvegarder le niveau d’avancement pour que les enfants puissent reprendre facilement leur construction. 
La voiture mesure plus de 10 cm de large et le salon plus de 6 cm de large. Contient 60 pièces.", 2, 2, 1);

INSERT INTO `products` (`product_id`, `product_name`, `img_url`, `unit_price`, `product_description`, `units_in_stock`, `category_id`, `subcategory_id`) 
VALUES (NULL, 'Pop Star', 'Elements/ProductImg/friendsScene.jpg', 49.99, 
"Organise un concert spectaculaire avec LEGO® Friends! La scène de la chanteuse LEGO® Friends
modulaire inclut un grand écran, des fonctions d'apparition et de danse pour la chanteuse et des
instruments de musique. Prépare-toi pour un concert exceptionnel avec la chanteuse Livi! La
spectaculaire scène est prête pour le concert de ce soir. Alors que le concert commence, tourne
les panneaux de la scène pour faire apparaître Livi comme par magie. Place Andréa à la batterie
ou au clavier pour accompagner Livi pour les premières chansons. Puis le moment clé du spectacle
arrive : Livi chante son grand succès tandis qu'Andréa joue de la guitare électrique comme une
vraie pro. Utilise la fonction de danse pour voir leurs mouvements de danse géniaux! Le moment est
venu de réorganiser la scène pendant que Livi change de costume avant le grand final! Ceci a été
le meilleur concert de Livi!", 1, 2, 2);

INSERT INTO `products` (`product_id`, `product_name`, `img_url`, `unit_price`, `product_description`, `units_in_stock`, `category_id`, `subcategory_id`) 
VALUES (NULL, 'Snow 4x4', 'Elements/ProductImg/marvelVehicule.jpg', 19.99, 
"Rejoins Thor et Œil-de-Faucon qui sont à la poursuite du complice d'Hydra dans la forêt d'hiver de Sokovia .
Place Œil-de-Faucon dans la cabine du véhicule 4x4 génial des Avengers et accélère.
Quand tu vois le tout-terrain d'Hydra, tire les missiles depuis la tourelle rotative et évite le puissant fusil à tenons du tout-terrain.
Puis lance Thor sur son Super Jumper et désactive le fusil à tenons avec un saut d'une précision parfaite .
Comprend 3 figurines avec des armes et des accessoires assortis : Thor, Œil-de-Faucon et le complice d'Hydra.", 9, 3, 1);

INSERT INTO `products` (`product_id`, `product_name`, `img_url`, `unit_price`, `product_description`, `units_in_stock`, `category_id`, `subcategory_id`) 
VALUES (NULL, 'Rhino Fight', 'Elements/ProductImg/marvelScene.jpg', 79.99, 
"L'Homme-sable et Rhino ont uni leurs forces pour voler les diamants et ils se cachent maintenant avec le butin dans le chanTier.
Fonce pour récupérer les bijoux volés avec Iron Spider et Spider-Man.
Oh non.
Les super malfaiteurs ont tendu une embuscade, attaquant avec le fusil à tenons du robot Rhino et en piégeant Iron Spider dans l'une des mains de sable à la forme changeante de l'Homme-sable.
Fais un super saut pour aller au secours de Spider-Man, en activant la toile d'araignée et la boulede démolition de la grue pour piéger et renverser le robot Rhino.
Libère ensuite Iron Spider de la main de sable et renverse le panneau avec un nouveau saut parfait pour révéler les diamants cachés.
Comprend 4 figurines avec une arme et des accessoires assortis : Spider-Man, Iron Spider, Homme-sable et Rhino.", 7, 3, 2);

INSERT INTO `products` (`product_id`, `product_name`, `img_url`, `unit_price`, `product_description`, `units_in_stock`, `category_id`, `subcategory_id`) 
VALUES (NULL, 'Naboo Starfighter', 'Elements/ProductImg/starwarsVehicule.jpg', 139.99, 
"Recrée la passionnante scène du hangar Naboo de Star Wars : episode I La menace fantôme dans laquelle le jeune Anakin Skywalker aide son protecteur Jedi, Obi-Wan Kenobi, à repousser les attaques des forces de la Fédération du commerce.
Ouvre la cabine du Naboo Starfighter, positionne l'échelle d'accès et installe Anakin et R2-D2.
Puis tire avec les doubles fusils à ressorts pour envoyer dans les airs les droïdes destructeurs et les droïdes de combat.
En plus de détails authentiques et d'une fonction très cool d'éjection de R2-D2, ce modèle Lego Star Wars comprend aussi une station de ravitaillement et un support rotatif pour monter le modèle.
Inclut 3 figurines avec une arme et un accessoire : Anakin Skywalker, Obi-Wan Kenobi et un pilote Naboo, plus R2-D2, 2 droïdes de combat et un commandant de droïde de combat avec des armes assorTies.", 5, 4, 1);

INSERT INTO `products` (`product_id`, `product_name`, `img_url`, `unit_price`, `product_description`, `units_in_stock`, `category_id`, `subcategory_id`) 
VALUES (NULL, 'Hoth Attack', 'Elements/ProductImg/starwarsScene.jpg', 399.99, 
"Rejouez des batailles passionnantes entre les rebelles et l'Empire maléfique sur la planète glacée Hoth.
Ce modèle Lego à déplier de la base Echo de Star Wars : Episode V L'Empire contre-attaque comprend une scène de base de Hoth avec une tour rotative et un missile, une tranchée, un droïde sonde impérial et un fusil à tenons impérial.
Inclut 3 figurines : Yan Solo, un soldat rebelle et un Snowtrooper impérial.
Comprend une base Echo à déplier avec une tour rotative avec une trappe qui s'ouvre et un missile, une tranchée, un droïde sonde impérial et un fusil à tenons impérial.
Dépliez la base pour créer un modèle encore plus grand.
Tirez le missile depuis la tour pour défendre la base.
Utilisez le fusil à tenons pour attaque le Snowtrooper impérial.", 0, 4, 2);

-- -------- RIGHTS --------------------

INSERT INTO `rights` (`right_id`, `right_name`) VALUES
(1, 'user'),
(1337, 'admin');


-- -------- USERS ---------------------

INSERT INTO `users` (`id_user`, `firstname`, `lastname`, `email`, `password`, `phone`, `has_fidelity_bonus`, `right_id`, `birthday`, `address`, `zip_code`) VALUES
(1, 'john', 'doe', 'john@doe.fr', '098f6bcd4621d373cade4e832627b4f6', '060606', 0, 1337, '2015-02-06', 'rue bien bien', 6458);