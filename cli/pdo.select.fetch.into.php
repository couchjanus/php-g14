<?php

// pdo.select.fetch.into.php

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
    
    $category = new Category();
    $sql = "SELECT * FROM categories";
    $stmt = $pdo->query($sql, PDO::FETCH_INTO, $category);

    printf('%4s | %20s | %5s' . PHP_EOL, 'ID', 'NAME', 'STATUS');
    printf('%4s | %20s | %5s' . PHP_EOL, '----', str_repeat('-', 20), '-----');
    
    // устанавливаем режим выборки
    
    while ($row = $stmt->fetch(PDO::FETCH_INTO)) {
        printf('%4d | %20s | %5s' . PHP_EOL, $category->id, $category->name, $category->status);
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
