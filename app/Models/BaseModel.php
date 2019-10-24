<?php

class BaseModel
{
	private $db;

	public function __construct()
	{
		$file_db = new PDO('sqlite:messaging.sqlite3');
	}
}