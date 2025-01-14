<?php
include_once("connection.php");
header('Location:users.php');
array_map("htmlspecialchars", $_POST);
echo($_POST["forename"]);
print_r($_POST);
switch($_POST["role"]){
	case "User":
		$role=0;
		break;
	case "Admin":
		$role=2;
		break;
}
echo($role);
$stmt = $conn->prepare("INSERT INTO tblusers (surname,forename,password,dob,email)
VALUES (null,:gender,:surname,:forename,:password,:house,:year,:role)");

$stmt->bindParam(':forename', $_POST["forename"]);
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->bindParam(':password', $_POST["password"]);
$stmt->bindParam(':dob', $_POST["dob"]);
$stmt->bindParam(':email', $_POST["email"]);
$stmt->bindParam(':role', $role);
$stmt->execute();
$conn=null;

?>