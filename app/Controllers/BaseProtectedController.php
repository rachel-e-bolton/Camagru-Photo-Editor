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
	
		if (isset($_SERVER["HTTP_SEC_FETCH_MODE"]))
			$jsonCall = true;

		if (!isset($_SESSION["logged_in_uid"]))
		{
			if (!$jsonCall)
			{
				header("Location: /login");
				die();
			}
			RenderView::json([], 401, "You are not authorised to use this resource.");
			die();
		}

		// All check pass get the user to global
		$GLOBALS["user"] = (new UserModel())->getUserByEmail($_SESSION["logged_in_uid"]);

		parent::__construct($name, $args);
	}
}