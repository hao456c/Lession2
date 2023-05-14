<?php


require_once '../app/Core/Request.php';
require_once '../app/Core/Router.php';

Router::load(['../routes/web.php','../routes/api.php'])
             ::direct(Request::url(),Request::method());