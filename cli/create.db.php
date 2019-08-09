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


// Create database CREATE DATABASE IF NOT EXISTS store;
$sql = "DROP DATABASE IF EXISTS store; CREATE DATABASE store;";
if (mysqli_multi_query($conn, $sql)) {
    echo "\nDatabase created successfully\n";
} else {
    echo "\nError creating database: " . mysqli_error($conn)."\n\n";
}

mysqli_close($conn);