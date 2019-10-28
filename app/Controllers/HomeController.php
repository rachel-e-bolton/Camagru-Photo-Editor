<?php

//require_once "./BaseProtectedController.php";

class HomeController extends BaseProtectedController
{
	function default()
	{
		include_once dirname(__DIR__) . "/DevConsole.php";
	}

	function test()
	{
		// Deal with request
		
		$json = file_get_contents("php://input");

		//convert the string of data to an array
		$data = json_decode($json, true);

		//output the array in the response of the curl request
		//print_r($data);

		// Respond
		header('Content-Type: application/json');
		echo json_encode((string)file_get_contents("php://input"));
	}
}