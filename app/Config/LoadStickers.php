<?php

require_once "Config.php";
require_once "../Models/BaseModel.php";

$directory = '../../stickers';
$scanned_directory = array_diff(scandir($directory), array('..', '.'));

$model = new BaseModel();


$db = $model->getDb();
$stmt = $db->prepare("DELETE FROM stickers");
$stmt->execute();


$counter = 0;

foreach ($scanned_directory as $file) {
	$counter++;
	$path = $directory . "/" . $file;
	$type = pathinfo($path, PATHINFO_EXTENSION);
	$data = file_get_contents($path);
	$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
	$path_parts = pathinfo($path);
	
	$name = $path_parts['filename'];

	$stmt = $db->prepare("INSERT INTO stickers (name, image, type) VALUES (:name, :image, :type)");
	$stmt->bindParam(":name", $name);
	$stmt->bindParam(":image", $base64);
	$stmt->bindParam(":type", $type);
	$stmt->execute();
}

echo "Added $counter stickers.";
