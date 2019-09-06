<?php
namespace Core;
// PHP 7+ 
use Core\{Session, Connection, Router, Request as R};

class App
{
    public function __construct()
    {
        // включаем буфер
        ob_start();
        // Запускаем сессию
        Session::init('Init');
    }

    public function init()
    {
        Router::init(ROUTES)->direct(R::uri(), R::method());
    }
}
