<?php

class BaseController 
{
	private $args;
	public $model;

	public function __construct($name, $args)
	{
		$this->args = $args;

		// Get Model here and assign to private? I dunno
		$potentialModelName = ucwords(rtrim($name, "s")) . "Model";

		if (class_exists($potentialModelName))
			$this->model = new $potentialModelName();
		else
			$this->model = new BaseModel();
	}

	public function default()
	{
		// Render default View here
		include_once dirname(__DIR__) . "/Views/VisitorHome.php";
	}
}