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

    private function all(string $methode, string $uri, Closure|array $callback) {
        $this->routes[] = [
            "methode" => $methode,
            "uri" => $uri,
            "callback" => $callback,
            "auth" => true
        ];
    }

    public function start() {

    }
}