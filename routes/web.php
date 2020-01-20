<?php

Route::get('/', 'IndexController@index')->name('home');
Route::get('/tienda/producto/{id}', 'IndexController@product')->name('product');
Route::get('/tienda/{id}', 'IndexController@store')->name('shop');
Route::get('/tienda/{id}/productos', 'IndexController@products')->name('products');
Route::get('/mis-favoritos', 'FavoriteController@index')->name('favorites');
Route::get('/mis-deseos', 'WishController@index')->name('wishes');
Route::get('/add-favorites/{store_id}', 'FavoriteController@save')->name('save-favorite');
Route::get('/delete-favorites/{store_id}', 'FavoriteController@delete')->name('delete-favorite');

Route::post('/api/favorites', 'FavoriteController@get');
Route::post('api/products/product', 'ProductController@getProductById');
Route::post('/api/favorites/delete', 'FavoriteController@destroy');
Route::post('/api/account', 'AccountController@get');
Route::post('/api/wishes', 'WishController@get');
Route::post('/api/wish/save', 'WishController@save');
Route::post('/api/wish/delete', 'WishController@delete');
Route::post('/api/commentaries', 'CommentaryController@get');
Route::post('/api/commentaries/save', 'CommentaryController@save');
Route::post('/api/commentaries/update', 'CommentaryController@update');

//AUTENTICACION
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/registrate', 'AuthController@register')->name('register');
Route::get('/mi-cuenta', 'AuthController@account')->name('account');
Route::get('/logout', 'AuthController@logoutUser')->name('logout');

Route::post('/login', 'AuthController@loginUser');
Route::post('/registrate', 'AuthController@registerUser');


//ADMIN
Route::get('admin/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth', 'admin');
Route::get('admin/dashboard/usuarios', 'DashboardController@users')->name('users')->middleware('auth', 'admin');
Route::get('api/users', 'UserController@index');
Route::post('api/users/update_state', 'UserController@updateState');
Route::post('api/users/{id}', 'UserController@destroy');

