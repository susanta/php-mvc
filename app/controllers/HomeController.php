<?php

    class HomeController {

        public function index() {
            $data = [
                'title' => 'Home Page',
                'message' => 'Welcome to the home page.'
            ];

            render('home/index', $data);

            // require_once __DIR__ . '/../views/home/index.php';
        }

        public function about() {
            $data = [
                'title' => 'About Page',
                'message' => 'Welcome to the about page.'
            ];

            render('home/about', $data);
        }
    }