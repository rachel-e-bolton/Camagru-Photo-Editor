<?php

class BaseModel
{
	private $db;

	public function __construct()
	{
		$file_db = new PDO('sqlite:' . ROOT . '/dev.db');

		$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$this->db = $file_db;
	}

	public function getDB()
	{
		return $this->db;
	}
}