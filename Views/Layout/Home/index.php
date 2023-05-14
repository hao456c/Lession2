<?php 
    $controllerName = ucfirst(($_REQUEST['controller'] ?? 'UserController'));
    echo $controllerName;
  