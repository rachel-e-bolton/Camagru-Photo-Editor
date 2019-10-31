<?php

class RenderView
{
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
	public static function json($data, $status_code, $message="")
	{
		$response = [
            "success" => ($status_code < 299) ? true : false,
			"data"    => $data,
			"message" => $message
        ];
		header('Content-Type: application/json');
		http_response_code($status_code);
        echo json_encode($response);
	}
}