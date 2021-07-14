use sqli;

CREATE TABLE users(
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
);

CREATE TABLE secrets(
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `message` varchar(1024) NOT NULL
);