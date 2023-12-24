<?php

class Router
{
    private string $controller = 'Controllers\TeamController';
    private string $method = 'indexAction';
    private array $params = [];

    public function __construct()
    {
        $this->Sender();
    }

    public function Sender(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uriParts = explode('?', $uri);
        $path = $uriParts[0];
        $query = isset($uriParts[1]) ? $uriParts[1] : '';

        $uriSegments = explode('/', trim(strtolower($path), '/'));
        unset($uriSegments[0]);

        if (!empty($uriSegments[1])) {
            $controller = ucwords($uriSegments[1]) . 'Controller';
            unset($uriSegments[1]);
            $controller = 'Controllers\\' . $controller;
            if (class_exists($controller)) {
                $this->controller = $controller;
            } else {
                include 'views/404/404.php';
                exit();
            }
        }

        $class = $this->controller;
        $objetController = new $class();

        parse_str($query, $queryParams);
        $action = isset($queryParams['action']) ? $queryParams['action'] : '';

        if (!empty($action)) {
            $this->method = $action . 'Action';
        }

        if (isset($uriSegments[2])) {
            $method = $uriSegments[2];
            unset($uriSegments[2]);

            if (method_exists($objetController, $method)) {
                $this->method = $method;
            } else {
                include 'views/404/404.php';
                exit();
            }
        }

        $this->params = array_values($uriSegments);

        call_user_func_array([$objetController, $this->method], $this->params);
    }
}
