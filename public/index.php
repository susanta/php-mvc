<?php

    require_once __DIR__ . '/../app/init.php';
    require_once __DIR__ . '/../routes/web.php';

    // check class imported correctly
    // $test = new Test();
    // var_dump(get_declared_classes());

    

    $request = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';    

    if(array_key_exists($request, $routes)) {

        $route = explode('@', $routes[$request]);

        $controllerName = $route[0];
        $methodName = $route[1];
        $controller = new $controllerName();
        $controller->$methodName();
        
    } else {
        echo '404 - Page not found.';
    }   