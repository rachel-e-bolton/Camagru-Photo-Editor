<?php

class Component
{
	public static function load($name, $data = null)
	{
		$file = dirname(__DIR__) . "/Views/Components/$name.php";
		if (file_exists($file))
			require_once $file;
		else
		{
			throw new Exception("Error Componet File $name does not exist.", 1);
			die();
		}
			
	}
}