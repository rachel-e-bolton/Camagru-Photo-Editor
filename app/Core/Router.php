<?php
class Router {

	public static function route($url) {

		// TODO::
		// 1) Remove illegal chars from url
		// 2) Parse and remove $_GET args

		$result = [];
		$parsed = parse_url($url);
		if (isset($parsed["query"]))
			parse_str($parsed["query"], $result);
		
		$url = $parsed["path"];

		//print_r(parse_str($url)["query"], $result);


      // Split the URL into parts\  
	    $url_array = array_values(array_filter(explode("/", $url))); // Disgusting!!!!!

      // The first part of the URL is the controller name
	    $controller = isset($url_array[0]) ? $url_array[0] : '';
	    array_shift($url_array);

      // The second part is the method name
	    $action = isset($url_array[0]) ? $url_array[0] : '';
	    array_shift($url_array);

      // The third part are the parameters
	    $query_string = $url_array;
	 
	    // if controller is empty, redirect to default controller
	    if(empty($controller)) {
	       $controller = "Home";
		}
		
      // if action is empty, redirect to index page
	    if(empty($action)) {
	        $action = 'default';
	    }
	 
		$arguments = [
			"params" => $url_array,
			"query" => $result
		];

	    $controller_name = $controller;
	    $controller = ucwords($controller) . "Controller";
      	$dispatch = new $controller($controller_name, $action);
	 
	    if (method_exists($dispatch, $action)) {
	        call_user_func_array(array($dispatch, $action), array($arguments));
	    } else {
	        echo "<br>Error Loading the correct Controller! $action<br>";
	    }
	}
	
}