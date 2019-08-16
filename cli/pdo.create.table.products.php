<?php

// pdo.create.table.products.php

// example of PDO MySQL connection
$params = [
    'host' => 'localhost',
    'user' => 'root',
    'pwd'  => 'ghbdtn',
    'db' => "test"
];

// подключаемся к базе данных
try {
    $dsn  = sprintf('mysql:charset=utf8mb4;host=%s;dbname=%s', $params['host'], $params['db']);
    
    $pdo  = new PDO($dsn, $params['user'], $params['pwd']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create table
    $sql = <<<SQL
        DROP TABLE IF EXISTS `products`;
        CREATE TABLE `products` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `status` tinyint(1) NOT NULL,
        `category_id` int(11) unsigned DEFAULT NULL,
        `price` float unsigned NOT NULL,
        `brand` varchar(255) NOT NULL,
        `description` text NOT NULL,
        `is_new` tinyint(1) NOT NULL DEFAULT '1',
        `is_recommended` tinyint(1) NOT NULL DEFAULT '0',
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    SQL; 
    
    $pdo->exec($sql);
    echo "Table products created successfully\n\n";
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
