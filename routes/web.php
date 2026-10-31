<?php

    Router::get('/', 'HomeController@index');
    Router::get('/about', 'HomeController@about');
    Router::get('/contact', 'HomeController@contact');
    Router::get('/user/register', 'UserController@showRegisterForm');
    Router::get('/user/login', 'UserController@showLoginForm');
    Router::get('/dashboard', 'AdminController@dashboard');
    Router::get('/admin', 'AdminController@admin');
    Router::get('/admin/users/profile', 'UserController@showProfile');

    Router::get('/users/test/{id}', 'UserController@testMethod');

    Router::get('/admin/test/{id}', 'AdminController@test')->name('admin.test');




    Router::post('/register', 'UserController@register');
    Router::post('/login', 'UserController@loginUser')->name('login');
    Router::post('/logout', 'UserController@logout');
    Router::post('/admin/users/update', 'UserController@updateProfile')->name('update.profile');
    Router::post('/admin/profile/users/password/update', 'UserController@updateUserProfilePassword');

    

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
