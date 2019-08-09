#!/usr/bin/php
<?php

$link = mysqli_init();
if (!$link) {
    die('mysqli_init завершилась провалом');
}

if (!mysqli_options($link, MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) {
    die('Установка MYSQLI_INIT_COMMAND завершилась провалом');
}

if (!mysqli_options($link, MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
    die('Установка MYSQLI_OPT_CONNECT_TIMEOUT завершилась провалом');
}

if (!mysqli_real_connect($link, 'localhost', "root", "ghbdtn", 'mydb')) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

echo 'Выполнено... ' . mysqli_get_host_info($link) . "\n";

mysqli_close($link);


// $con = mysqli_connect("localhost", "root", "ghbdtn");

// if (mysqli_connect_errno()) { /* проверка соединения */
//     printf("Не удалось подключиться: %s\n", mysqli_connect_error());
//     exit();
// }

// if (!$con) {
//     echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
//     echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
//     echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
//     exit;
// }

// echo "Соединение с MySQL установлено!" . PHP_EOL;
// echo "Информация о сервере: " . mysqli_get_host_info($con) . PHP_EOL;

// mysqli_close($con);
