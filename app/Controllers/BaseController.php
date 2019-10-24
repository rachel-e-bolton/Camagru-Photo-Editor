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


		echo "Model is $potentialModelName<br>";

		if (class_exists($potentialModelName))
			$this->db = new $potentialModelName();
		else
			$this->db = new BaseModel();
	}
}