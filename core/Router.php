<?php

function getURI()
{
    if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
        return trim($_SERVER['REQUEST_URI'], '/');
}

switch (getURI()) {
    case '':
        require_once CONTROLLERS.'/HomeController.php';
        break;
    case 'about':
        require_once CONTROLLERS.'/AboutController.php';
        break;
    case 'blog':
        require_once CONTROLLERS.'/BlogController.php';
        break;
    case 'guestbook':
        require_once CONTROLLERS.'/GuestbookController.php';
        break;
    case 'contact':
        require_once CONTROLLERS.'/ContactController.php';
        break;
    
    default:
        require_once VIEWS.'/errors/404.php';
}
