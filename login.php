<?php
session_start();

$valid_username = "admin";
$valid_password = "password"; 

if ($_POST['username'] === $valid_username && $_POST['password'] === $valid_password) {
    $_SESSION['admin_logged_in'] = true;
    header("Location: admin.php");
} else {
    echo "Invalid login credentials. <a href='index.php'>Try again</a>";
}
?>
