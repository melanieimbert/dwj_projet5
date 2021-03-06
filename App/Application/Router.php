<?php

namespace Kernel\Application;

use Exception;

class Router
{
    private $url;
    private $routes = array();
    private $namedRoutes = array();

    public function add($path, $callable, $name, $method)
    {
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if ($name) {
            $this->namedRoutes[$name] = $route;
        }

        return $route;
    }

    public function get($path, $callable, $name = null)
    {
        return $this->add($path, $callable, $name, 'GET');
    }

    public function post($path, $callable, $name = null)
    {
        return $this->add($path, $callable, $name, 'POST');
    }

    public function run($url)
    {
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new Exception('REQUEST_METHOD n\'existe pas');
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($url)) {
                return $route->call();
            }
        }

        throw new Exception('Uhmm... On dirait que cette page n\'existe pas : Aucun itinéraire trouvé.');
    }

    public function url($name, $params = [])
    {
        if (!isset($this->namedRoutes[$name])) {
            throw new Exception('Uhmm... On dirait que cette page n\'existe pas : Aucun chemin ne correspond à ce nom.');
        }

        return $this->namedRoutes[$name]->getUrl($params);
    }
}
