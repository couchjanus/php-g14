<?php

// pdo.connect.mysql.errormode.test.php

// example of PDO MySQL connection

$host = "localhost";
$user = "root";
$pass = "ghbdtn";
$dbname = "store";

// PDO::ERRMODE_EXCEPTION
// В большинстве ситуаций этот тип контроля выполнения скрипта предпочтителен. Он выбрасывает исключение, что позволяет вам ловко обрабатывать ошибки и скрывать щепетильную информацию. Как, например, тут:

// подключаемся к базе данных
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Oops! Набрал DELECT вместо SELECT!
    $pdo->prepare('DELECT name FROM posts')->execute();
}
catch(PDOException $e) {
    // В SQL-выражении есть синтаксическая ошибка, которая вызовет исключение. Мы можем записать детали ошибки в лог-файл и человеческим языком намекнуть пользователю, что что-то случилось.
    echo "SQL, у нас проблемы.\n";
    error_log($e->getMessage());
    file_put_contents('PDOErrors.log', $e->getMessage(), FILE_APPEND);
} catch (Throwable $e) {
    error_log($e->getMessage());
}
