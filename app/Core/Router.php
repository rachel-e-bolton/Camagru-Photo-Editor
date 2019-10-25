<?php
class Router {

	public static function route($url) {
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
	 
	    $controller_name = $controller;
	    $controller = ucwords($controller) . "Controller";

      $dispatch = new $controller($controller_name,$action);
	 
	    if (method_exists($dispatch, $action)) {
	        call_user_func_array(array($dispatch, $action), $query_string);
	    } else {
	        echo "<br>Error Loading the correct Controller!<br>";
	    }
	}
	
}