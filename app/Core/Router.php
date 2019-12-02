<?php
class Router {

	public static function xssProtect($string)
	{
		return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
	}

	public static function route($url) {

		$result = [];
		$parsed = parse_url($url);
		if (isset($parsed["query"]))
			parse_str($parsed["query"], $result);
		
		$url = $parsed["path"];

		$url_array = array_values(array_filter(explode("/", $url))); // Disgusting!!!!!

		$controller = isset($url_array[0]) ? $url_array[0] : '';
		array_shift($url_array);


		$action = isset($url_array[0]) ? $url_array[0] : '';
		array_shift($url_array);


		$query_string = $url_array;
		

		if(empty($controller)) {
			$controller = "Home";
		}
			
		if(empty($action)) {
			$action = 'default';
		}
		
		$arguments = [
			"params" => array_map('self::xssProtect', $url_array),
			"query" => array_map('self::xssProtect', $result)
		];

		$controller_name = $controller;
		
		$controller = ucwords($controller) . "Controller";

		if (class_exists($controller))
			$dispatch = new $controller($controller_name, $action);
		else
			RenderView::file("404");

		if (in_array($action, $dispatch->allowedRoutes) && method_exists($dispatch, $action)) {
			call_user_func_array(array($dispatch, $action), array($arguments));
		} else {
			RenderView::file("404");
		}
	}
	
}