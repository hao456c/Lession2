<?php


Router::get('/','UserController@index');
Router::get('/login','LoginController@login');
Router::get('/register','LoginController@register');

?>