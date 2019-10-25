<?php

class BaseController 
{
	private $args;
	private $db;

	public function __construct($name, $args)
	{
		$this->args = $args;

		// Get Model here and assign to private? I dunno
		$potentialModelName = ucwords(rtrim($name, "s")) . "Model";

		if (class_exists($potentialModelName))
			$this->db = new $potentialModelName();
		else
			$this->db = new BaseModel();
	}

	public function default()
	{
		// Render default View here
		$data = [
			"user" => [
				"name" => "gwasserf"
			],
			"posts" => [
				
			]
		];
		include_once dirname(__DIR__) . "/Views/VisitorHome.php";
	}
}