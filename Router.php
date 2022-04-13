<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = include 'routes.php';
    }

    private function getUri()
    {
        if ($_SERVER['REQUEST_URI'])
        {
            return trim($_SERVER['REQUEST_URI']);
        }
    }

    public function run()
    {
        $uri = $this->getUri();

        if (!empty($_SERVER['REQUEST_URI']))
        {
            foreach ($this->routes as $uriPattern => $path)
            {
                if (preg_match("~$uriPattern~", $uri))
                {
                    $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                    $internalRoute = explode($internalRoute, '/');

                    $controllerName = array_shift($internalRoute) . 'Controller';
                    $actionName = 'action' . ucfirst(array_shift($internalRoute));

                    $parameters = $internalRoute;
                    $controllerFile = '/controllers/' . $controllerName . '.php';
                    if (file_exists($controllerFile))
                    {
                        include($controllerFile);
                    }

                    $controllerObject = new $controllerName;
                    $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                    if ($result != null)
                    {
                        break;
                    }
                }
            }
        }
        else
        {
            $controllerName = 'IndexController';
            $actionName = 'actionIndex';

            $controllerFile = $controllerName . '.php';

            include_once($controllerFile);

            $controllerObject = new $controllerName;

            $controllerObject->$actionName();
        }
    }
}