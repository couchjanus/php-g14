<?php

// select.join.products.pictures.php

// example of PDO MySQL connection
$params = [
    'host' => 'localhost',
    'user' => 'root',
    'pwd'  => 'ghbdtn',
    'db' => "store"
];

try {
    $dsn  = sprintf('mysql:charset=utf8mb4;host=%s;dbname=%s', $params['host'], $params['db']);
    $pdo  = new PDO($dsn, $params['user'], $params['pwd']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Select as 
    // $sql = <<<SQL
    //     SELECT filename as picture
    //     FROM pictures
    //     ORDER BY id ASC;
    // SQL;

    // $sql = <<<SQL
    //     SELECT t1.*
    //       FROM products t1
    //       ORDER BY id ASC;
    // SQL;

    // $sql = <<<SQL
    //     SELECT t2.filename as picture
    //           FROM pictures t2
    //           ORDER BY id ASC;
    // SQL;
    
    // $sql = <<<SQL
    //     SELECT * FROM products AS t1
    //     LEFT JOIN pictures AS t2 ON t1.id = t2.resource_id
    //     UNION
    //     SELECT * FROM products t1
    //     RIGHT JOIN pictures AS t2 ON t1.id = t2.resource_id
    // SQL;

    // $sql = <<<SQL
    //     SELECT * FROM products AS t1
    //     LEFT JOIN pictures AS t2 ON t1.id = t2.resource_id
    // SQL;
    
    // $sql = <<<SQL
    //     SELECT * FROM products AS t1
    //     RIGHT JOIN pictures AS t2 ON t1.id = t2.resource_id
    // SQL;
    
    // CROSS

    $sql = <<<SQL
        SELECT * FROM products AS t1
        CROSS JOIN pictures AS t2
    SQL;

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    $result = $stmt->fetchAll();
    var_dump($result);
    
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
