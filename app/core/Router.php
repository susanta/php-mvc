<?php

    class Router {

        protected static $routes = [
            'GET' => [],
            'POST' => []
        ];

        protected static $nameRoutes = [];
        protected static $lastAddedRoute = null;

        public static function get($path, $handler) 
        {
            // self::$routes['GET'][self::formatRoute($path)] = $handler;

            $formattedPath = self::formatRoute($path);
            self::$routes['GET'][self::formatRoute($path)] = $handler;
            self::$lastAddedRoute = $formattedPath;

            return new static;
        }

        public static function post($path, $handler) 
        {
            // self::$routes['POST'][self::formatRoute($path)] = $handler;

            $formattedPath = self::formatRoute($path);
            self::$routes['POST'][self::formatRoute($path)] = $handler;
            self::$lastAddedRoute = $formattedPath;

            return new static;

        }

        public static function name($routerName)
        {
            if(self::$lastAddedRoute !== null) {
                self::$nameRoutes[$routerName] = self::$lastAddedRoute;
                self::$lastAddedRoute = null;
            } else {
                throw new Exception("No route available for named $routerName");
            }

            // $lastRoute = array_key_last(self::$routes['GET'] + self::$routes['POST']);

            // if($lastRoute !== null) {
            //     self::$nameRoutes[$routerName] = $lastRoute;
            // }

            return new static;
        }

        public static function route($name, $params = [])
        {
            if(!isset(self::$nameRoutes[$name])) {
                throw new Exception('ROute $name does not exist');
            }
            
            $route = self::$nameRoutes[$name];

            foreach ($params as $key => $value) {
                $route = str_replace('{'.$key.'}', $value, $route);
            }

            return $route;

        }

        protected static function formatRoute($route) 
        {
            return '/' . trim($route, '/');
        }


        public static function dispatch() 
        {
            $method = $_SERVER['REQUEST_METHOD'];
            $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

            $cleanRequest = self::formatRoute($requestUri);

            if(self::match($method, $cleanRequest)) {
                $handler = self::match($method, $cleanRequest);

                // var_dump($handler);

                list($controller, $action) = explode('@', $handler['handler']);
                $params = $handler['params'];

                self::callAction($controller, $action, $params);

            }

        }

        public static function match($method, $requestUri) 
        {
            foreach (self::$routes[$method] as $route => $handler) {

                $pattern = preg_replace('#\{[a-zA-Z0-9_]+}#', '([a-zA-Z0-9_]+)', $route);

                if(preg_match('#^' . $pattern . '$#', $requestUri, $matches)) {

                    array_shift($matches);

                    return [
                        'handler' => $handler,
                        'params' => $matches
                    ];
                    
                }
            }

            return false;
        }

        protected static function callAction($controller, $action, $params= [])
        {
            require_once base_path('/app/controllers/') . '/' . $controller . '.php';
            $controllerInstance = new $controller();

            // var_dump($controllerInstance);

            call_user_func_array([$controllerInstance, $action], $params);
        }

    }