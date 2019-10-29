<?php

class RenderView
{
	public static function file($viewFile, $data = [])
	{
		if (!strstr($viewFile, ".php"))
			$viewFile = $viewFile . ".php";
		
		if (file_exists(VIEWS . $viewFile))
			include_once VIEWS . $viewFile;
		else
			include_once VIEWS . "404.php";
	}

	/**
	 * Set headers to application/json and send serialised $data to browser.
	 *
	 * @param array $data Assoc array of the data to be serialised.
	 * @param int   $status_code HTTP Status code.
	 */
	public static function json($data, $status_code)
	{
		echo "Render some JSON";
	}
}