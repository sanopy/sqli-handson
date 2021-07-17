use sqli;

CREATE TABLE users(
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL
);

CREATE TABLE posts(
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(128) NOT NULL,
  `message` varchar(1024) NOT NULL
);

CREATE TABLE secrets(
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `message` varchar(1024) NOT NULL
);