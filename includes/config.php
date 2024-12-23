<?php

$host = 'db'; // Nama service database di docker-compose.yml
$username = 'root'; // Harus sesuai dengan MYSQL_USER
$password = '123456'; // Harus sesuai dengan MYSQL_PASSWORD
$database = 'wedding_db'; // Harus sesuai dengan MYSQL_DATABASE

$mysqli = new mysqli($host, $username, $password, $database);

// Periksa apakah ada kesalahan
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>