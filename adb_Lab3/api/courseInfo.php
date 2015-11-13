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

$class = $_GET["course"];

// Find all of the documents in the courses collection, order by abbreviation
$records = $mb->find(array('abbreviation'=>$class));

// Create a array to be converted to JSon
$output = array();

// Loop through all documents returned from the find()
foreach ($records as $rec) {
	// Create an array and push abbreviation value as courseAbbr
	$p = array();
	$p['_id'] = $rec['_id'];
	$p['name'] = $rec['name'];
	$p['degree'] = $rec['degree'];
	$p['abbreviation'] = $rec['abbreviation'];
	$p['creditHours'] = $rec['creditHours'];

	$output["courseInfo"] = $p;
}
// json_encode converts an array to JSon format
echo json_encode($output);

?>
