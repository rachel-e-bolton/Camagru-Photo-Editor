<?php

/**
 * Protected Controller class, requires a user to be logged in.
 * Redirect to login otherwise
 */
class BaseProtectedController extends BaseController
{
	public function __construct($name, $args)
	{
		// if user not auth here do something
		if (!isset($_SESSION["logged_in_uid"]))
		{
			header("Location: /login");
			die();
		}
		
		parent::__construct($name, $args);
	}
}