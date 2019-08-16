<?php
// pdo.create.database.test.php

// example of PDO MySQL connection
$params = [
    'host' => 'localhost',
    'user' => 'root',
    'pwd'  => 'ghbdtn',
    'charset' => 'utf8mb4'
];

// подключаемся к базе данных
try {
    $dsn  = sprintf('mysql:host=%s;', $params['host'], $params['db'], $params['charset']);

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ];
    $pdo = new PDO($dsn, $params['user'], $params['pwd'], $options);
    
    // $pdo  = new PDO($dsn, $params['user'], $params['pwd']);
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $options = array(
    //     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
    // ); 

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS test";
    $pdo->exec($sql);
    echo "Database created successfully\n\n";
}

catch(PDOException $e) {
    error_log($e->getMessage());
    file_put_contents('PDOErrors.log', $e->getMessage(), FILE_APPEND);
} catch (Throwable $e) {
    error_log($e->getMessage());
}
finally {
    $pdo = null;
}
