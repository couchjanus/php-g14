<?php

// pdo.bind.param.insert.into.categories.php

// example of PDO MySQL connection
$params = [
    'host' => 'localhost',
    'user' => 'root',
    'pwd'  => 'ghbdtn',
    'db' => "mydb"
];

// подключаемся к базе данных
try {
    $dsn  = sprintf('mysql:charset=utf8mb4;host=%s;dbname=%s', $params['host'], $params['db']);
    $pdo  = new PDO($dsn, $params['user'], $params['pwd']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("INSERT INTO categories (name, status) VALUES (:name, :status)");
    // $stmt->bindParam(':name', $name);

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_INT);
    
    // вставим одну строку
    $name = 'new one';
    $status = 1;
    $stmt->execute();

    $name = 'two';
    $status = 0;
    $stmt->execute();

    // можно передавать массив, но он должен быть ассоциативным. В роли ключей должны выступать имена placeholder.
    $data = array( 'name' => 'Cathy', 'status' => 0 );
    $stmt->execute($data);

    echo "All rows inserted successfully\n\n";
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