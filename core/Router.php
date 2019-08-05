<?php

// function getURI()
// {
//     return $_SERVER['REQUEST_URI'];
// }


// function getURI()
// {
//     return trim($_SERVER['REQUEST_URI'], '/');
// }

// function getURI(){
//     if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
//         return $_SERVER['REQUEST_URI'];
// }

function getURI()
{
    if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
        return trim($_SERVER['REQUEST_URI'], '/');
}

// получаем строку запроса

switch (getURI()) {
    case '':
        # code...
        require_once CONTROLLERS.'/HomeController.php';
        break;
    case 'about':
        # code...
        require_once CONTROLLERS.'/AboutController.php';
        break;
    case 'blog':
        # code...
        require_once CONTROLLERS.'/BlogController.php';
        break;
    case 'contact':
        # code...
        require_once CONTROLLERS.'/ContactController.php';
        break;
    
    default:
        # code...
        require_once VIEWS.'/errors/404.php';
}
