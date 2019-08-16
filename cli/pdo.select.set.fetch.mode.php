<?php

// pdo.select.set.fetch.mode.php

require_once realpath(__DIR__.'/../models/Category.php');
// example of PDO MySQL connection
$params = [
    'host' => 'localhost',
    'user' => 'root',
    'pwd'  => 'ghbdtn',
    'db' => "store"
];

// подключаемся к базе данных
try {
    $dsn  = sprintf('mysql:charset=utf8mb4;host=%s;dbname=%s', $params['host'], $params['db']);
    $pdo  = new PDO($dsn, $params['user'], $params['pwd']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM categories";
    $stmt = $pdo->query($sql);
    printf('%4s | %20s | %5s' . PHP_EOL, 'ID', 'NAME', 'STATUS');
    printf('%4s | %20s | %5s' . PHP_EOL, '----', str_repeat('-', 20), '-----');
    
    // устанавливаем режим выборки
    $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Category');
    
    while ($row = $stmt->fetch()) {
        printf('%4d | %20s | %5s' . PHP_EOL, $row->id, $row->name, $row->status);
    }
    
    echo "All rows fetched successfully\n\n";
        
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
