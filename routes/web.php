<?php

    $router = new Route();

    // $router->get('/user/test/{id}', 'UserController@testMethod');


    $router->get('/', 'HomeController@index');
    $router->get('/about', 'HomeController@about');
    $router->get('/contact', 'HomeController@contact');
    $router->get('/user/register', 'UserController@showRegisterForm');
    $router->get('/user/login', 'UserController@showLoginForm');
    $router->get('/dashboard', 'AdminController@dashboard');
    $router->get('/admin', 'AdminController@admin');
    $router->get('/admin/users/profile', 'UserController@showProfile');


    $router->post('/register', 'UserController@register');
    $router->post('/login', 'UserController@loginUser');
    $router->post('/logout', 'UserController@logout');
    $router->post('/admin/users/update', 'UserController@updateProfile');
    $router->post('/admin/profile/users/password/update', 'UserController@updateUserProfilePassword');

    

    // $routes = [
    //     'GET' => [
    //         '/' => 'HomeController@index',        
    //         '/about' => 'HomeController@about',        
    //         '/contact' => 'HomeController@contact',        
    //         '/user/register' => 'UserController@showRegisterForm', 
    //         '/user/login' => 'UserController@showLoginForm', 
    //         '/dashboard' => 'AdminController@dashboard', 
    //         '/admin' => 'AdminController@admin', 
    //         '/admin/users/profile' => 'UserController@showProfile', 
             
    //     ],

    //     'POST' => [
    //         '/register' => 'UserController@register',    
    //         '/login' => 'UserController@loginUser',    
    //         '/logout' => 'UserController@logout', 
    //         '/admin/users/update' => 'UserController@updateProfile',   
    //         '/admin/profile/users/password/update' => 'UserController@updateUserProfilePassword',   
    //     ],
    // ];
