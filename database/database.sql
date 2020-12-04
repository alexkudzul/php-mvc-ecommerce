CREATE DATABASE php_mvc_ecommerce;
USE php_mvc_ecommerce;

CREATE TABLE users(
id              int(255) auto_increment not null,
name            varchar(100) not null,
lastname        varchar(255),
email           varchar(255) not null,
password        varchar(255) not null,
rol             varchar(20),
image           varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO users VALUES(NULL, 'Admin', 'Admin', 'admin@admin.com', '123', 'admin', null);

CREATE TABLE categories(
id              int(255) auto_increment not null,
name          varchar(100) not null,
CONSTRAINT pk_categories PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO categories VALUES(null, 'Hombre');
INSERT INTO categories VALUES(null, 'Mujer');
INSERT INTO categories VALUES(null, 'Niños');
INSERT INTO categories VALUES(null, 'Deporte');

CREATE TABLE products(
id              int(255) auto_increment not null,
category_id     int(255) not null,
name            varchar(100) not null,
description     text,
price           float(100,2) not null,
stock           int(255) not null,
offer           varchar(2),
date            date not null,
image           varchar(255),
CONSTRAINT pk_categories PRIMARY KEY(id),
CONSTRAINT fk_product_category FOREIGN KEY(category_id) REFERENCES categories(id)
)ENGINE=InnoDb;

INSERT INTO products VALUES(NULL, 1, 'Adidas 1', 'Tenis Adidas para Hombre', 100.00, 50, NULL, CURDATE(), 'adidas1.jpg');
INSERT INTO products VALUES(NULL, 2, 'Adidas 2', 'Tenis Adidas para Mujer', 150.00, 100, NULL, CURDATE(), 'adidas2.jpg');
INSERT INTO products VALUES(NULL, 3, 'Adidas 3', 'Tenis Adidas para Niños', 200.00, 50, NULL, CURDATE(), 'adidas3.jpg');

CREATE TABLE orders(
id              int(255) auto_increment not null,
user_id         int(255) not null,
state           varchar(100) not null,
city            varchar(100) not null,
adress          varchar(255) not null,
cost            float(200,2) not null,
status          varchar(20) not null,
date            date,
hour            time,
CONSTRAINT pk_orders PRIMARY KEY(id),
CONSTRAINT fk_order_user FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;

CREATE TABLE lines_orders(
id              int(255) auto_increment not null,
order_id       int(255) not null,
product_id     int(255) not null,
units_order        int(255) not null,
CONSTRAINT pk_lines_orders PRIMARY KEY(id),
CONSTRAINT fk_line_order FOREIGN KEY(order_id) REFERENCES orders(id),
CONSTRAINT fk_line_product FOREIGN KEY(product_id) REFERENCES products(id)
)ENGINE=InnoDb;




