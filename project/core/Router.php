<?php
namespace Core;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function init($file)
    {
        $router = new static;
        include $file;
        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {   
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->initController(...$this->getController($this->routes[$requestType][$uri]));
        } else {
            foreach ($this->routes[$requestType] as $key => $val) {
                $pattern = "@^" .preg_replace('/{([a-zA-Z0-9\_\-]+)}/', '(?<$1>[a-zA-Z0-9\_\-]+)', $key). "$@";
                preg_match($pattern, $uri, $matches);
                array_shift($matches);
                if ($matches) {
                    $arr = $this->getController($val);
                    $arr[] = $matches;
                    return $this->initController(...$arr);
                }
            }
            return $this->initController(...$this->getController($this->routes[$requestType]['404']));
        }
    }

    private function getController($path)
    {
        list($controller, $action) = explode('@', $path);
        return array ($controller, $action);
    }

    protected function initController($controller, $action, $vars = [])
    {
        $controller = CONTROLLERS.$controller;
        // dd('$controller: '.$controller);
        $controller = new $controller;
        if (! method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }
        return $controller->$action($vars);
    }
}