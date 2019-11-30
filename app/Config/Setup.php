<?php

require_once "../Models/BaseModel.php";
require_once "./Config.php";
require_once "./Database.php";

$db = (new BaseModel())->getDB();

foreach ($sql as $table => $query) {
	
	$stmt = $db->prepare($query);
	$stmt->execute();
	
	if ($stmt)
		echo "Created table $table\n";
	else
		echo "Failed to create table $table\n";	
}
