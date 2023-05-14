<?php

//Home Page
Router::get('/','UserController@index');

//Login Form
Router::get('/login','LoginController@login');
Router::post('/login','LoginController@checkLogin');

//Register Form
Router::get('/register','LoginController@register');
Router::post('/register','LoginController@store');

//logout
Router::post('/logout','LoginController@logout');

//detail
Router::get('/detail', 'UserController@show');

//copy
Router::get('/copy', 'UserController@copy');

//edit
Router::get('/edit', 'UserController@edit');
Router::post('/edit', 'UserController@update');

//delete
Router::delete('/delete', 'UserController@delete');
?>