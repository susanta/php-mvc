<?php

    class HomeController {

        public function index() {

            // $database = Database::getInstance();
            // $conn = $database->getConnection();

            // echo $_SESSION['username'];

            $data = [
                'title' => 'Home Page',
                'message' => 'Welcome to the home page.',
            ];

            render('home/index', $data, 'layouts/hero_layout');
        }

        public function about() {
            $data = [
                'title' => 'About Page',
                'message' => 'Welcome to the about page.'
            ];

            render('home/about', $data);
        }
    }