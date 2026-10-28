<?php 

    function render($view, $data = []) {

        extract($data);

        ob_start();

        require_once __DIR__ . '/views/' . $view . '.php';

        $content = ob_get_clean();

        require __DIR__ . '/views/layout.php';
    }