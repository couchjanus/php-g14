<?php

define('ROUTES', require CONFIG.'/routes'.EXT);

class Router
{
    protected $routes = ROUTES;

    public function direct($uri)
    {   
        if (array_key_exists($uri, $this->routes)) {
            return $this->initController(...$this->getController($this->routes[$uri]));
        } else {
            foreach ($this->routes as $key => $val) {
                $pattern = "@^" .preg_replace('/{([a-zA-Z0-9\_\-]+)}/', '(?<$1>[a-zA-Z0-9\_\-]+)', $key). "$@";
                preg_match($pattern, $uri, $matches);
                array_shift($matches);
                if ($matches) {
                    $arr = $this->getController($val);
                    $arr[] = $matches;
                    return $this->initController(...$arr);
                }
            }
            return $this->initController(...$this->getController($this->routes['404']));
        }
    }

    private function getController($path) {
        $segments = explode('\\', $path);
        list($controller, $action)=explode('@', array_pop($segments));
        $controllerPath = DIRECTORY_SEPARATOR;
        foreach ($segments as $segment) {
            $controllerPath .= $segment.DIRECTORY_SEPARATOR;
        }
        return [$controllerPath, $controller, $action];
    }

    private function initController($controllerPath, $controller, $action, $vars = []) {

        $controllerPath = CONTROLLERS . $controllerPath . $controller . EXT;
        if (file_exists($controllerPath)) {
            include_once $controllerPath;
            $controller = new $controller;
            
            if (! method_exists($controller, $action)) {
                throw new Exception(
                    "{$controller} does not respond to the {$action} action."
                );
            }
        }
        return $controller->$action($vars);
    }
}
