CREATE SCHEMA IF NOT EXISTS `boutique` DEFAULT CHARACTER SET utf8mb4 ;

USE `boutique` ;


-- ------------------------------------
--          Clients table            --
-- ------------------------------------

CREATE TABLE IF NOT EXISTS Clients (
client_id INT AUTO_INCREMENT NOT NULL,
firstname VARCHAR(255),
lastname VARCHAR(255),
email VARCHAR(255),
password VARCHAR(255),
phone VARCHAR(10),
has_fidelity_bonus BOOLEAN,
birthday DATE,
address VARCHAR(255),
zip_code INT(5),
PRIMARY KEY (client_id)
) ENGINE=InnoDB;


-- ------------------------------------
--          Orders table             --
-- ------------------------------------

CREATE TABLE IF NOT EXISTS Orders (
order_id INT AUTO_INCREMENT NOT NULL,
client_id INT NOT NULL,
date_ordered DATE,
PRIMARY KEY (order_id),
CONSTRAINT FK_Orders_client_id_Clients FOREIGN KEY (client_id) REFERENCES Clients (client_id)
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
--        payments_method table      --
-- ------------------------------------


CREATE TABLE IF NOT EXISTS payments_method (
payment_id INT AUTO_INCREMENT NOT NULL,
date_paid DATE,
payment_description TEXT,
PRIMARY KEY (payment_id)
) ENGINE=InnoDB;

-- ------------------------------------
--         Subcategories table       --
-- ------------------------------------

CREATE TABLE IF NOT EXISTS Subcategories (
subcategory_id INT AUTO_INCREMENT NOT NULL,
category_id INT NOT NULL,
subcategory_name VARCHAR(255),
PRIMARY KEY (subcategory_id),
CONSTRAINT FK_Subcategory_category_id_Category FOREIGN KEY (category_id) REFERENCES Categories (category_id)
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
PRIMARY KEY (product_id)
) ENGINE=InnoDB;


-- ------------------------------------
--          To_use table             --
-- ------------------------------------

CREATE TABLE IF NOT EXISTS To_use (
order_id INT NOT NULL,
payment_id INT NOT NULL,
PRIMARY KEY (order_id, payment_id),
CONSTRAINT FK_To_use_order_id_Orders FOREIGN KEY (order_id) REFERENCES Orders (order_id),
CONSTRAINT FK_To_use_payment_id_payment_method FOREIGN KEY (payment_id) REFERENCES payments_method (payment_id)
) ENGINE=InnoDB;




-- ------------------------------------
--       To_belong_to table         --
-- ------------------------------------

CREATE TABLE IF NOT EXISTS To_belong_to (
product_id INT NOT NULL,
category_id INT NOT NULL,
PRIMARY KEY (product_id, category_id),
CONSTRAINT FK_To_belong_to_product_id_Products FOREIGN KEY (product_id) REFERENCES Products (product_id),
CONSTRAINT FK_To_belong_to_category_id_Category FOREIGN KEY (category_id) REFERENCES Categories (category_id)
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
