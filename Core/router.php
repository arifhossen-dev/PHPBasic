<?php
namespace Core;
class Router 
{
    protected $routes = [];

    public function addRoute($method, $uri, $controller)
    {
        $this->routes[] = compact('method','uri','controller');
    }

    public function get($uri, $controller)
    {
        return $this->addRoute("GET", $uri, $controller);
    }
    public function post($uri, $controller)
    {
        return $this->addRoute("POST", $uri, $controller);
    }
    public function delete($uri, $controller)
    {
        return $this->addRoute("DELETE", $uri, $controller);
    }
    public function put($uri, $controller)
    {
        return $this->addRoute("PUT", $uri, $controller);
    }
    public function patch($uri, $controller)
    {
        return $this->addRoute("PATCH", $uri, $controller);
    }

    function route($uri, $method) {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }
    
    function abort($code = 404) {
        http_response_code($code);
    
        require base_path("views/{$code}.php");
    
        die();
    }
}