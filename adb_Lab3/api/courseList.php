<?php
/*
Description: 	Returns ALL categories
Inputs:	None
URL:	/courseListlist.php
*/

// Set debug to show errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to MongoDB
$username = 'adbOwner';
$password = 'adb';
$mongo = new MongoClient("mongodb://${username}:${password}@localhost", array("db" => "adb"));

// Connect to the ADB database, courses collection.
$mb = $mongo->selectDb("adb")->selectCollection("courses");

// Find all of the documents in the courses collection, order by abbreviation
$records = $mb->find()->sort(array('abbreviation'=>1));

// Create a array to be converted to JSon
$output = array();

// Loop through all documents returned from the find()
foreach ($records as $rec) {
	// Create an array and push abbreviation value as courseAbbr
	$p = array();
	$p['courseAbbr'] = $rec['abbreviation'];

	// Push the $p array to the $output array
	array_push($output, $p);
}
// json_encode converts an array to JSon format
echo json_encode($output);
?>
