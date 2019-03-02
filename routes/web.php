<?php
Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');


Route::get('/', 'SessionsController@index');

Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');


Route::get('/albums', 'AlbumsController@index');

Route::post('/albums', 'AlbumsController@store');

Route::get('/albums/{album}', 'AlbumsController@show');
