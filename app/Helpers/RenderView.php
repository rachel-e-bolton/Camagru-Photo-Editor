<?php

class RenderView
{
	public static function loadUserIfFound()
	{
		$user = null;
		if (isset($_SESSION["logged_in_uid"]))
			$user = (new UserModel())->getUserByEmail($_SESSION["logged_in_uid"]);
		return $user;
	}

	/**
	 * Render a view file back to browser
	 *
	 * @param string $viewFile Name of the view file, with or without extension.
	 * @param array  $data Array of data to be available in the view.
	 */
	public static function file($viewFile, $data = [])
	{
		if (!strstr($viewFile, ".php"))
			$viewFile = $viewFile . ".php";

		$user = self::loadUserIfFound();

		if (file_exists(VIEWS . $viewFile))
			include_once VIEWS . $viewFile;
		else
			include_once VIEWS . "404.php";
		die();
	}

	/**
	 * Set headers to application/json and send serialised $data to browser.
	 *
	 * @param array $data Assoc array of the data to be serialised.
	 * @param int   $status_code HTTP Status code.
	 */
	public static function json($data, $status_code, $message="")
	{
		$response = [
            "success" => ($status_code < 299) ? true : false,
			"data"    => $data,
			"message" => $message
		];
		$user = self::loadUserIfFound();
		header('Content-Type: application/json');
		http_response_code($status_code);
		echo json_encode($response);
		die();
	}

	/**
	 * Set headers to application/json and send serialised $data to browser.
	 *
	 * @param string $snippetFile Name of snippet file.
	 */
	public static function snippet($snippetFile)
	{
		if (!strstr($snippetFile, ".php"))
			$snippetFile = $snippetFile . ".php";
		
		$user = self::loadUserIfFound();
		if (file_exists(SNIPS . $snippetFile))
			include_once SNIPS . $snippetFile;
		else
			include_once SNIPS . "404.php";
		die();
	}

	/**
	 * Redirect browser to a path
	 *
	 * @param string $path Relative path to redirect to.
	 */
	public static function redirect($path)
	{
		header("Location: $path");
		die();
	}
}