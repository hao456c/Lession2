<?php
	
class Router {
	private static $controllerLink ='../app/Controllers/';
	private static $controllerNamespace = 'App\\Controllers\\';
	public static $routes = [
		'GET'  => [],
		"POST" => [],
		"DELETE" => [],
		"PATCH" => [],
		"PUT" => []
	];
	
	
	public static function get( $url, $controller ) {
		
		return self::$routes["GET"][ trim($url,'/') ] = $controller;
	}
	
	public static function post( $url, $controller ) {
		
		return self::$routes["POST"][ trim($url,'/') ] = $controller;
	}

    public static function delete( $url, $controller ) {

        return self::$routes["DELETE"][ trim($url,'/') ] = $controller;
    }

    public static function patch( $url, $controller ) {

        return self::$routes["PATCH"][ trim($url,'/') ] = $controller;
    }


    public static function load($files=[] ) {
	    $instance = new static();

        foreach ($files as $file) {
         require_once $file;
		}
		return $instance;
	}
	
	public static function direct( $url,$requestType ) {

	    if(!isset(self::$routes[$requestType])){
	        http_response_code(503);
            header('Content-type:application/json');
            echo json_encode(['status'=>'error','message'=>'Bad Request. Unknown request method '.$requestType,
                'code'=>503]);
            return 1;        
		}
		if(array_key_exists(substr($url,26),self::$routes[$requestType])){
			return static::mapController(
				...explode('@',
				self::$routes[$requestType][substr($url,26)]
				));
			
		}
		return 1;
	}


    protected static function mapController($controller, $action){
		require(self::$controllerLink.$controller.'.php');
		$controller= new (self::$controllerNamespace.$controller); 

		return $controller->$action();
		
	}
}