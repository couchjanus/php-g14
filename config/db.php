<?php

define('HOST', 'localhost');
define('DBUSER', 'root');
define('DBPASSWORD', 'ghbdtn');
define('DATABASE', 'store');

const DRIVER = 'mysql';
const CHARSET = 'utf8mb4';

/**
 * Данные для подключения к БД
 */

return [
    'db' => [
        'driver' => DRIVER,
        'dbname' => DATABASE,
        'host'    => HOST,
        'charset' => CHARSET,
    ],
    'user' => DBUSER,
    'password' => DBPASSWORD,
    'errmode' => PDO::ERRMODE_EXCEPTION,
    'options' => [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]
];  