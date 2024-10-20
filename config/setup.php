<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$conn = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS']);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($conn->query('CREATE DATABASE IF NOT EXISTS ' . $_ENV['DB_NAME']) === FALSE) {
    die('Error creating database: ' . $conn->error);
}

if ($conn->query('USE ' . $_ENV['DB_NAME']) === FALSE) {
    die('Error using database: ' . $conn->error);
}

if ($conn->query('CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`username` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
)') === FALSE) {
    die('Error creating table: ' . $conn->error);
}

if ($conn->query('CREATE TABLE IF NOT EXISTS `tokens` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`token` varchar(255) NOT NULL,
`user_id` int(11) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
)') === FALSE) {
    die('Error creating table: ' . $conn->error);
}

if ($conn->query('CREATE TABLE IF NOT EXISTS `contacts` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL,
`phone` varchar(255) NOT NULL,
`user_id` int(11) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
)') === FALSE) {
    die('Error creating table: ' . $conn->error);
}

$conn->close();
