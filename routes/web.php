<?php

Route::get('/', 'IndexController@index');
Route::get('/login', 'AuthController@login');
Route::get('/registrate', 'AuthController@register');

