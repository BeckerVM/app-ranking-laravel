<?php

Route::get('/', 'IndexController@index')->name('home');

//AUTENTICACION
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@loginUser');
Route::get('/logout', 'AuthController@logoutUser')->name('logout');
Route::get('/registrate', 'AuthController@register')->name('register');
Route::post('/registrate', 'AuthController@registerUser');

//ADMIN
Route::get('admin/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth', 'admin');
