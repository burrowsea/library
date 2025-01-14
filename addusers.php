<?php
include_once("connection.php");


if (
    isset($_POST["forename"], $_POST["surname"], $_POST["passwd"], $_POST["dob"], $_POST["email"], $_POST["gender"], $_POST["role"])
) {
    array_map("htmlspecialchars", $_POST);

    
    switch ($_POST["role"]) {
        case "User":
            $role = 0;
            break;
        case "Admin":
            $role = 2;
            break;
        default:
            $role = null;
    }

    if ($role !== null) {
        try {
            $stmt = $conn->prepare("INSERT INTO tblusers (userid, forename, surname, password, dob, email, gender, role)
                VALUES (null, :forename, :surname, :password, :dob, :email, :gender, :role)");

            $stmt->bindParam(':forename', $_POST["forename"]);
            $stmt->bindParam(':surname', $_POST["surname"]);
			$stmt->bindParam(':passwd', password_hash($_POST["passwd"], PASSWORD_BCRYPT)); // Secure password hashing
			$stmt->bindParam(':dob', $_POST["dob"]);
            $stmt->bindParam(':email', $_POST["email"]);
            $stmt->bindParam(':gender', $_POST["gender"]);
            $stmt->bindParam(':role', $role);

            $stmt->execute();

            
            header('Location: users.php');
            exit();
        } catch (PDOException $e) {
            
            error_log("Database error: " . $e->getMessage());
            echo "An error occurred. Please try again later.";
        }
    } else {
        echo "Invalid role provided.";
    }
} else {
    echo "Incomplete form submission.";
}

$conn = null;
?>
