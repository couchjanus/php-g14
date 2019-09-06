<?php
// Устанавливаем временную зону по умолчанию
if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('Europe/Kiev');    
}

// Ошибки и протоколирование
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL | E_NOTICE | E_STRICT | E_DEPRECATED);

// ============================================
require_once realpath(__DIR__).'/../config/app.php';
require_once CORE.'/Helper.php';

$app = new \Core\App();
$app->init();
	