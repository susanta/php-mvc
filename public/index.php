<?php

    require_once __DIR__ . '/../app/init.php';
    require_once __DIR__ . '/../routes/web.php';

    // check class imported correctly
    // $test = new Test();
    // var_dump(get_declared_classes());

    

    $request = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';    

    if(array_key_exists($request, $routes)) {
        echo "Exists";
    } else {
        echo 'Not exists';
    }   