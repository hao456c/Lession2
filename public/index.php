<?php


require_once '../app/Core/Request.php';
require_once '../app/Core/Router.php';
require_once '../app/Core/Database.php';
require_once '../app/Models/BaseModel.php';
Router::load(['../routes/web.php','../routes/api.php'])
             ::direct(Request::url(),Request::method());