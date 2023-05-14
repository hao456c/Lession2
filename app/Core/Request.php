<?php
    class  Request {
	
	//Trả ra url 
	public static function url() {
		return trim(
			parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH ),
			'/' );
	}
	
	//Trả ra method của request
	public static function method() {
		return $_SERVER["REQUEST_METHOD"];
	}
}