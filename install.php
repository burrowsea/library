<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS tblusers;
CREATE TABLE tblusers 
(userid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
surname VARCHAR(20) NOT NULL,
forename VARCHAR(20) NOT NULL,
password VARCHAR(20) NOT NULL,
dob VARCHAR(10) NOT NULL,
email VARCHAR(30) NOT NULL)"
);
$stmt->execute();
$stmt->closeCursor();
echo("tblusers created");

$stmt = $conn->prepare("DROP TABLE IF EXISTS tblbooks;
CREATE TABLE tblbooks
(bookid INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
isbn INT(13) UNSIGNED NOT NULL
title VARCHAR(100) NOT NULL,
author VARCHAR(50) NOT NULL,
dor VARCHAR(10) NOT NULL,
)"
);
$stmt->execute();
$stmt->closeCursor();
echo("tblusers created");

$stmt = $conn->prepare("DROP TABLE IF EXISTS tblloans;
CREATE TABLE tblloans 
(loanid INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userid VARCHAR(6) NOT NULL,
bookid VARCHAR(8) NOT NULL,
isbn VARCHAR(13) NOT NULL,
borrowdate VARCHAR(10) NOT NULL,
duedate VARCHAR(10) NOT NULL,
status VARCHAR(20) NOT NULL)"
);
$stmt->execute();
$stmt->closeCursor();
echo("tblloans created");