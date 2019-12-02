<?php

$db_pass = file_get_contents(".db_pass");
$db_user = "root";

try
{
    $conn =  new PDO( "mysql:host=localhost", $db_user, $db_pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("CREATE DATABASE IF NOT EXISTS camagru;");
    
    if ($stmt->execute())
        echo "Database is in place.";
    else
        echo "Could not create database.";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}