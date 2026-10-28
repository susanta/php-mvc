<?php 

    // Base URL   
    function base_url($path = '') {

        if(defined('BASE_URL')) {
            return BASE_URL . ltrim($path, '/\\');
        }

        // 1. Detect Protocol https:// or http:
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443 ? "https://" : "http://";

        // 2. Get the domain server.com/
        $host = $_SERVER['HTTP_HOST'];

        // 3. Trim both forward slashes AND backslashes /blog
        $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');

        // 4. Construct URL with web-standard forward slashes
        return $protocol . $host . $base . '/' . ltrim($path, '/\\');
    }

    function base_path($path = '') {
        return realpath(__DIR__ . '/../' . '/' . ltrim($path, '/'));
    }

    function views_path($path = '') {
        return base_path('app/views' . '/' . ltrim($path, '/'));
    }




    function render($view, $data = [], $layout = 'layout') {

        extract($data);

        ob_start();

        require __DIR__ . '/views/' . $view . '.php';

        $content = ob_get_clean();

        require __DIR__ . "/views/" . $layout . ".php";
    }