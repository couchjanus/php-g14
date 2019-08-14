<?php

function getURI()
{
    if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
        return trim($_SERVER['REQUEST_URI'], '/');
}

$result = null;

// Подключаем строку запроса
$uri = getURI();

// Подключаем файл routes
$filename = CONFIG.'/routes'.EXT;

if (file_exists($filename)) {
    $routes = include_once $filename;
} else {
    echo "Файл $filename не существует";
}

// foreach ($routes as $route => $path) {
//     //Сравниваем route и $uri
//     if ($route == $uri) {
        
//         list($controller, $action) = explode('@', $path);

//         //Подключаем файл контроллера
//         $controllerFile = CONTROLLERS . "/" . $controller . EXT;
        
//         if (file_exists($controllerFile)) {
//             include_once $controllerFile;
//             $controller = new $controller;

//             if (method_exists($controller, $action)) {
//                 $controller->$action();
//             }
//             $result = true;
//         }

//         if ($result !== null) {
//             break;
//         }
//     }
// }

// foreach ($routes as $route => $path) {
//     //Сравниваем route и $uri
//     if ($route === $uri) {
//         var_dump($route);
//         $segments = explode('\\', $path);
//         var_dump($segments);
//         list($controller, $action)=explode('@', array_pop($segments));
//         var_dump($segments);
//         $result = true;
//         break;
//     }
// }

// foreach ($routes as $route => $path) {
//     if ($route == $uri) {
//         $segments = explode('\\', $path);
//         list($controller, $action)=explode('@', array_pop($segments));
//         $controllerPath = DIRECTORY_SEPARATOR;
        
//         foreach ($segments as $segment) {
//             $controllerPath .= $segment.DIRECTORY_SEPARATOR;
//             var_dump($controllerPath);
//         }
//         var_dump($controllerPath);
//         $result = true;
//         break;
//     }
// }


// foreach ($routes as $route => $path) {
//     if ($route == $uri) {
//         $segments = explode('\\', $path);
//         list($controller, $action)=explode('@', array_pop($segments));
//         $controllerPath = DIRECTORY_SEPARATOR;
//         foreach ($segments as $segment) {
//             $controllerPath .= $segment.DIRECTORY_SEPARATOR;
//         }
        
//         // Подключаем файл контроллера
//         $controllerPath = CONTROLLERS . $controllerPath . $controller . EXT;

//         if (file_exists($controllerPath)) {
//             include_once $controllerPath;
//             $controller = new $controller;

//             if (method_exists($controller, $action)) {
//                 $controller->$action();
//                 $result = true;
//                 break;
//             }
//         }
//     }
// }

function getController($path) {
    $segments = explode('\\', $path);
    list($controller, $action)=explode('@', array_pop($segments));
    $controllerPath = DIRECTORY_SEPARATOR;
    foreach ($segments as $segment) {
        $controllerPath .= $segment.DIRECTORY_SEPARATOR;
    }
    return [$controllerPath, $controller, $action];
}

function initController($controllerPath, $controller, $action, $result = null) {
    $controllerPath = CONTROLLERS . $controllerPath . $controller . EXT;
    if (file_exists($controllerPath)) {
        include_once $controllerPath;
        $controller = new $controller;
        if (method_exists($controller, $action)) {
            $controller->$action();
            $result = true;
        }
    }
    return $result;
}

foreach ($routes as $route => $path) {
    if ($route == $uri) {
        // list($controllerPath, $controller, $action) = getController($path);
        // $result = initController($controllerPath, $controller, $action);
        $result = initController(...getController($path));
        if ($result)
        {
            break;
        }
    }
}

if ($result === null) {
    include_once VIEWS.'/errors/404'.EXT;
}
