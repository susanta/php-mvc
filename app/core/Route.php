<?php

    class Route {

        protected $routes = [
            'GET' => [],
            'POST' => []
        ];

        public function get($path, $handler) 
        {
            $this->routes['GET'][$this->formatRoute($path)] = $handler;

            // echo "<pre>";
            // print_r($path);
            // echo "</pre>";

            // echo "<pre>";
            // print_r($handler);
            // echo "</pre>";

            // echo "<pre>";
            // print_r($this->routes['GET'][$path]);
            // echo "</pre>";

            // var_dump($this->routes['GET'][$path]);
        }

        public function post($path, $handler) 
        {
            $this->routes['POST'][$this->formatRoute($path)] = $handler;

        }


        protected function formatRoute($route) {
            return '/' . trim($route, '/');
        }


    }