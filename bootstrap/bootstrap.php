<?php

// Устанавливаем временную зону по умолчанию
if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('Europe/Kiev');    
}

// Ошибки и протоколирование
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL | E_NOTICE | E_STRICT | E_DEPRECATED);

function dd($msg, $mix)
{
	echo "<h3>$msg</h3>";
	echo '<pre>';
	print_r($mix);
	echo '</pre>';
}

function conf($mix)
{
	return include(realpath(__DIR__)."/../config/".$mix.".php"); 
}

// function view($path, $data = null) 
// {
// 	if ( $data ) {
// 		extract($data);
// 	}
// 	$path .= '.php';
// 	return require VIEWS."/layouts/app.php";
// 	// return require VIEWS."/layouts/admin.php";
// }


function view($path, $data = null, $layout='app') 
{
	if ( $data ) {
		extract($data);
	}
	$path .= '.php';
	return require VIEWS."/layouts/${layout}.php";
}
// ============================================
require_once realpath(__DIR__).'/../config/app.php';

// $url = 'http://127.0.0.1:8000/admin';

// dd('URL: ', parse_url($url));
// dd('PHP_URL_SCHEME: ', parse_url($url, PHP_URL_SCHEME));
// dd('PHP_URL_USER: ', parse_url($url, PHP_URL_USER));
// dd('PHP_URL_PASS: ', parse_url($url, PHP_URL_PASS));
// dd('PHP_URL_HOST: ', parse_url($url, PHP_URL_HOST));
// dd('PHP_URL_PORT: ', parse_url($url, PHP_URL_PORT));
// dd('PHP_URL_PATH: ', parse_url($url, PHP_URL_PATH));
// dd('PHP_URL_QUERY: ', parse_url($url, PHP_URL_QUERY));
// dd('PHP_URL_FRAGMENT: ', parse_url($url, PHP_URL_FRAGMENT));

// Функции с переменным количеством аргументов, используя синтаксис ...
// function f($req, $opt = null, ...$params) {
//     // $params - массив, содержащий все остальные аргументы.
//     printf('$req: %d; $opt: %d; количество параметров: %d'."\n",
//            $req, $opt, count($params));
// }

// f(1);
// f(1, 2);
// f(1, 2, 3);
// f(1, 2, 3, 4);
// f(1, 2, 3, 4, 5);

// Массивы и объекты, реализующие интерфейс Traversable могут быть распакованы в список аргументов при передаче в функцию с помощью оператора ....
// function add($a, $b, $c) {
//     return $a + $b + $c;
// }

// $operators = [2, 3];
// echo add(1, ...$operators);

// Возврат нескольких значений в виде массива
// function small_numbers()
// {
//     return array (0, 1, 2);
// }
// list ($zero, $one, $two) = small_numbers();
require_once CORE.'/View.php';
require_once CORE.'/Controller.php';
require_once CORE.'/Helper.php';

require_once CORE.'/Router.php';
