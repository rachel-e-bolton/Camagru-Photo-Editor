<?php

class BaseModel
{
	private $db;

	public function __construct()
	{
		$file_db = new PDO('sqlite:' . ROOT . '/dev.db');
		$this->db = $file_db;
	}
}