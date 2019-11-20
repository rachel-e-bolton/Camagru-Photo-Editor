<?php

class Component
{
	/**
	 * Render a component wihtin a view
	 *
	 * @param string $name Name of the component to load.
	 * @param array  $data Array of data to be available in the component.
	 */
	public static function load($name, $data = null)
	{
		$file = dirname(__DIR__) . "/Views/Components/$name.php";
		if (file_exists($file))
		{
			$user = self::loadUserIfFound();
			require_once $file;
		}
		else
		{
			throw new Exception("Error Componet File $name does not exist.", 1);
			die();
		}
	}

	/**
	 * Get the user if there is a logged in one
	 */
	public static function loadUserIfFound()
	{
		$user = null;
		if (isset($_SESSION["logged_in_uid"]))
			$user = (new UserModel())->getUserByEmail($_SESSION["logged_in_uid"]);
		return $user;
	}
}