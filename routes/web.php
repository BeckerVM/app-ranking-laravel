<?php

Route::get('/', 'IndexController@index')->name('home');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@loginUser');
Route::get('/registrate', 'AuthController@register')->name('register');

