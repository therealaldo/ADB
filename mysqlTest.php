<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('CFDump.php');

$sqlDb = new \PDO("mysql:host=localhost;port=8889;dbname=adb","adbSQL","adb");
$sqlDb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM grades WHERE gradeId = :gradeId";

$s = $sqlDb->prepare($sql);

$s->execute(array(":gradeId" => "999999" ));

$sqlResults = $s->fetchAll();

var_dump($sqlResults);

// new CFDump($sqlResults);

echo "<p>END</p>";

?>
