<?php

// Set debug to show errors
error_reporting(-1);
ini_set('display_errors', 1);
ini_set('memory_limit', -1);

// Connect to MongoDB
$username = 'adbOwner';
$password = 'adb';
$mongo = new MongoClient("mongodb://${username}:${password}@localhost", array("db" => "adb"));

// Connect to the ADB database, grades collection.
$mb = $mongo->selectDb("adb")->selectCollection("grades");

// Select all of the records inside of the grades collection
$records = $mb->find();

$user = "adbSQL";
$pass = "adb";
$dbh = new PDO("mysql:host=localhost;dbname=adb;port=3307", $user, $pass);

foreach($records as $rec){
    $id = $rec["_id"];
    $classAbbr = $rec["classAbbr"];
    $studentId = $rec["studentId"];
    $semester = $rec["semester"];
    $grade = $rec["grade"];

    $sth = $dbh->prepare("SELECT gradeId, classAbbr, studentId, semester, grade FROM grades WHERE gradeId = $id");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

    if(count($result) == 1){
        echo "Found";
    } else{
        $ins = $dbh->prepare("INSERT INTO grades(gradeId, classAbbr, studentId, semester, grade) VALUES(:id, :abbr, :studentId, :semester, :grade)");
        $ins->bindParam(":id",$id);
        $ins->bindParam(":abbr",$classAbbr);
        $ins->bindParam(":studentId",$studentId);
        $ins->bindParam(":semester",$semester);
        $ins->bindParam(":grade",$grade);
        $ins->execute();
    }
}

?>
