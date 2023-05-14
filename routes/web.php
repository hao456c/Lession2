<?php


Router::get('/','UserController@index');
Router::get('/login','LoginController@login');
Router::get('/register','LoginController@register');
Router::post('/login','LoginController@checkLogin');
Router::post('/logout','LoginController@logout');
?>