<?php
include_once("connection.php");

// Check if all expected POST keys exist to avoid undefined index errors
if (
    isset($_POST["forename"], $_POST["surname"], $_POST["house"], $_POST["year"], $_POST["passwd"], $_POST["gender"], $_POST["role"])
) {
    array_map("htmlspecialchars", $_POST);

    // Map role to integer
    switch ($_POST["role"]) {
        case "Pupil":
            $role = 0;
            break;
        case "Teacher":
            $role = 1;
            break;
        case "Admin":
            $role = 2;
            break;
        default:
            $role = null; // Invalid role
    }

    if ($role !== null) {
        try {
            $stmt = $conn->prepare("INSERT INTO tblusers (userid, gender, surname, forename, password, house, year, role)
                VALUES (null, :gender, :surname, :forename, :password, :house, :year, :role)");

            $stmt->bindParam(':forename', $_POST["forename"]);
            $stmt->bindParam(':surname', $_POST["surname"]);
            $stmt->bindParam(':house', $_POST["house"]);
            $stmt->bindParam(':year', $_POST["year"]);
            $stmt->bindParam(':password', password_hash($_POST["passwd"], PASSWORD_BCRYPT)); // Secure password hashing
            $stmt->bindParam(':gender', $_POST["gender"]);
            $stmt->bindParam(':role', $role);

            $stmt->execute();

            // Redirect after successful insertion
            header('Location: users.php');
            exit();
        } catch (PDOException $e) {
            // Handle database errors
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
