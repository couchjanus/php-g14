<?php

// pdo.select.fetch.num.php

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
    
    $stmt = $pdo->query("SELECT * FROM categories");
        
    // устанавливаем режим выборки
    $results = $stmt->fetchAll(PDO::FETCH_NUM);
    
    print_r($results);

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
