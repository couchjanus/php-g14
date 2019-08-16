<?php

// pdo.bind.param.positional.placeholders.php

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
    
    $stmt = $pdo->prepare("INSERT INTO categories(name, status) VALUES(?, ?)");

    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $status);

    // вставим одну строку
    $name = 'More then one';
    $status = 1;
    $stmt->execute();

    // теперь другую строку с другими значениями
    $name = 'More then two';
    $status = 0;
    $stmt->execute();

    // набор данных, которые мы будем вставлять
    $data = array(['Black Cat', 1], ['Green Cat', 1], ['Red Cat', 1], ['Cool Cat', 1]);

    for ($i=0; $i<count($data); $i++) {
        $stmt->execute($data[$i]);
    }
    // $data[0] вставится на место первого placeholder’а, $data[1] — на место второго, и т.д.


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
