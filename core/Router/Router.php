<?php
namespace Core\Router;

use Closure;

class Router
{
    private array $routes = [];

    public function get(string $uri, Closure|array $callback)
    {
        $this->all("GET", $uri, $callback);
    }
    public function post(string $uri, Closure|array $callback)
    {
        $this->all("POST", $uri, $callback);
    }
    public function put(string $uri, Closure|array $callback)
    {
        $this->all("PUT", $uri, $callback);
    }
    public function delete(string $uri, Closure|array $callback)
    {
        $this->all("DELETE", $uri, $callback);
    }

    private function all(string $methode, string $uri, Closure|array $callback)
    {
        $this->routes[] = [
            "methode" => $methode,
            "uri" => $uri,
            "callback" => $callback,
            "auth" => true
        ];
    }

    public function start($twig)
    {
        //
        $methode = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        //
        foreach ($this->routes as $route) {
            if ($uri === $route['uri']) {
                if ($methode === $route['methode']) {
                    var_dump($route['callback']);
                    $this->callback($route, $twig);
                    
                } else {
                    echo "Requisação aceita e " . $route['methode'];
                    exit;
                }
                exit;
            }
        }

        echo "404 Not Found";
    }

    public function callback(array $route, $twig)
    {
        if (is_array($route['callback']) && is_string($route['callback'][0])) {
            $controller = new $route['callback'][0]();
            $method = $route['callback'][1];
            call_user_func_array([$controller, $method], [$twig]);
        } else {
            call_user_func($route['callback']);
        }

    }
}