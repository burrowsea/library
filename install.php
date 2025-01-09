<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS tblusers;
CREATE TABLE tblusers 
(userid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
surname VARCHAR(20) NOT NULL,
forename VARCHAR(20) NOT NULL,
password VARCHAR(20) NOT NULL
dob VARCHAR(10) NOT NULL
email VARCHAR(30) NOT NULL)"
);
$stmt->execute();
$stmt->closeCursor();
echo("tblusers created");

$stmt = $conn->prepare("DROP TABLE IF EXISTS tblbooks;
CREATE TABLE tblbooks
(bookid INT(14) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
)"
);
$stmt->execute();
$stmt->closeCursor();
echo("tblusers created");