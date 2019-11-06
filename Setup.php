<?php

require_once "app/Models/BaseModel.php";
require_once "app/Config/Config.php";

$db = (new BaseModel())->getDB();

// Create users table
$sql = file_get_contents("./database.sql");

$stmt = $db->prepare($sql);
$stmt->execute();

if ($stmt)
	echo "Database setup\n";
else
	echo "Failed to create database\n";