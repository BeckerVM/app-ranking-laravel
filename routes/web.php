<?php

Route::get('/', 'IndexController@index');
Route::get('/logueo', 'AuthController@login');

