<?php

class BaseModel
{
	protected $db;

	public function __construct()
	{
		try 
		{
			$conn = new PDO("mysql:host=" . DATABASE_URI . ";dbname=camagru;charset=utf8", DATABASE_USER, DATABASE_PASS);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}


		$this->db = $conn;
	}

	public function __destruct()
	{
		$this->db = NULL;
	}

	public function getDB()
	{
		return $this->db;
	}
}