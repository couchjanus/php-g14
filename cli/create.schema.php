<?php
// Создание MySQL базы данных с помощью MySQLi
$servername = "localhost";
$username = "root";
$password = "ghbdtn";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Schema store
// DROP SCHEMA IF EXISTS `store`;
// Schema store
// CREATE SCHEMA IF NOT EXISTS `store` DEFAULT CHARACTER SET utf8 ;
// USE `store`;

$sql = "DROP SCHEMA IF EXISTS store;";
$sql = "CREATE SCHEMA store CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";

// $sql = <<<EOT
//     DROP SCHEMA IF EXISTS store;
//     CREATE SCHEMA store CHARACTER 
//     SET utf8mb4 
//     COLLATE utf8mb4_unicode_ci;
// EOT;

if (mysqli_multi_query($conn, $sql)) {
    echo "\nSCHEMA created successfully\n";
} else {
    echo "\nError creating SCHEMA: " . mysqli_error($conn)."\n";
}

mysqli_close($conn);