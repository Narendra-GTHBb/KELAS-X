<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// 🔐 Login & Register
$router->post('api/register', ['uses' => 'LoginController@register']);
$router->post('api/login', ['uses' => 'LoginController@login']);

// 📦 Menu (sementara tanpa auth untuk test)
$router->get('api/menu', ['uses' => 'MenuController@index']);
$router->post('api/menu', ['uses' => 'MenuController@create']);
$router->delete('api/menu/{id}', ['uses' => 'MenuController@destroy']);

// 📁 Kategori (tanpa auth hanya index)
$router->get('api/kategori', ['uses' => 'KategoriController@index']);

// 🔐 Semua route di bawah ini butuh auth
$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {

    // 📁 Kategori (CRUD lengkap)
    $router->get('kategori/{id}', ['uses' => 'KategoriController@show']);
    $router->post('kategori', ['uses' => 'KategoriController@create']);
    $router->put('kategori/{id}', ['uses' => 'KategoriController@update']);
    $router->delete('kategori/{id}', ['uses' => 'KategoriController@destroy']);

    // 👤 Pelanggan (CRUD lengkap)
    $router->get('pelanggan', ['uses' => 'PelangganController@index']);
    $router->get('pelanggan/{id}', ['uses' => 'PelangganController@show']);
    $router->post('pelanggan', ['uses' => 'PelangganController@create']);
    $router->put('pelanggan/{id}', ['uses' => 'PelangganController@update']);
    $router->delete('pelanggan/{id}', ['uses' => 'PelangganController@destroy']);

    // 🧾 Order
    $router->get('order', ['uses' => 'OrderController@index']);
    $router->put('order/{id}', ['uses' => 'OrderController@update']); // Update order

    // Tampilkan order berdasarkan tanggal / rentang tanggal
    $router->get('order/{a}/{b}', ['uses' => 'OrderController@show']); // 2 tanggal (rentang)
    $router->get('order/{a}', ['uses' => 'OrderController@show']); 
    
    $router->get('detail/{a}/{b}', ['uses' => 'DetailController@show']);

    // 👤 User Management
    $router->get('user', ['uses' => 'LoginController@index']);
    $router->put('user/{id}', ['uses' => 'LoginController@update']); 
    
    // Route tambahan untuk debug
    $router->patch('user/{id}/status', ['uses' => 'LoginController@updateStatus']);

    // Jika kamu punya store order, bisa aktifkan ini:
    // $router->post('order', ['uses' => 'OrderController@store']);
});

// Route debug tanpa auth untuk testing
$router->put('api/debug/user/{id}', ['uses' => 'LoginController@update']);
$router->patch('api/debug/user/{id}/status', ['uses' => 'LoginController@updateStatus']);