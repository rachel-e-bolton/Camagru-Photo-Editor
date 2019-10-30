<?php

require_once "app/Models/BaseModel.php";
require_once "app/Config/Config.php";

$db = (new BaseModel())->getDB();

// Create users table
$sql = <<<EOD
CREATE TABLE IF NOT EXISTS users (
	first_name TEXT,
	last_name TEXT,
	handle TEXT UNIQUE,
	email TEXT,
	password_hash TEXT,
	dob TEXT,
	is_verified INT,
	profile_img TEXT
)
EOD;

$stmt = $db->prepare($sql);
$stmt->execute();

if ($stmt)
	echo "Database setup\n";
else
	echo "Failed to create database\n";

