<?php

require_once "./app/Config/Config.php";
require_once "./app/Models/BaseModel.php";

$directory = './stickers';
$scanned_directory = array_diff(scandir($directory), array('..', '.'));

$model = new BaseModel();

foreach ($scanned_directory as $file) {
	$path = $directory . "/" . $file;
	$type = pathinfo($path, PATHINFO_EXTENSION);
	$data = file_get_contents($path);
	$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
	echo $base64;
	
	$db = $model->getDb();

	$stmt = $db->prepare("INSERT INTO stickers (image, type) VALUES (:image, :type)");

	$stmt->bindParam(":image", $base64);
	$stmt->bindParam(":type", $type);

	$stmt->execute();
}
