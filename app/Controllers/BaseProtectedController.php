<?php

/**
 * Protected Controller class, requires a user to be logged in.
 * Redirect to login otherwise
 */
class BaseProtectedController extends BaseController
{
	public function __construct($name, $args)
	{
		$jsonCall = false;

		if (!isset($_SESSION["logged_in_uid"]))
		{
			if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
				strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
				
					RenderView::json([$_SERVER], 401, "You are not authorised to use this resource.");
				}
			else
				RenderView::redirect("/login");
		}

		
		// All checks pass call parents contructor method
		parent::__construct($name, $args);
	}
}