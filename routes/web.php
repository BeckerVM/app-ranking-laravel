<?php

Route::get('/', 'IndexController@index')->name('home');
Route::get('/tienda/producto/{id}', 'IndexController@product')->name('product');
Route::get('/tienda/{id}', 'IndexController@store')->name('shop');
Route::get('/tienda/{id}/productos', 'IndexController@products')->name('products');
Route::post('api/products/product', 'ProductController@getProductById');

//AUTENTICACION
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@loginUser');
Route::get('/logout', 'AuthController@logoutUser')->name('logout');
Route::get('/registrate', 'AuthController@register')->name('register');
Route::post('/registrate', 'AuthController@registerUser');

//ADMIN
Route::get('admin/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth', 'admin');
Route::get('admin/dashboard/usuarios', 'DashboardController@users')->name('users')->middleware('auth', 'admin');
Route::get('api/users', 'UserController@index');
Route::post('api/users/update_state', 'UserController@updateState');
Route::post('api/users/{id}', 'UserController@destroy');

