<?php
include_once("connection.php");


if (
    isset($_POST["userid"], $_POST["bookid"], $_POST["isbn"], $_POST["borrowdate"], $_POST["status"])
) {
    array_map("htmlspecialchars", $_POST);

    $borrowdate = dat
    $duedate = date_add($_POST["borrowdate"], date_interval_create_from_date_string("14 days"));

    switch ($_POST["status"]) {
        case "On loan":
            $status = 0;
            break;
        case "Returned":
            $status = 1;
            break;
        default:
            $status = null;
    }

    if ($status !== null) {
        //try {
            $stmt = $conn->prepare("INSERT INTO tblloans (userid, bookid, isbn, borrowdate, duedate, status)
                VALUES (:userid, :bookid, :isbn, :borrowdate, :duedate, :status)");
            $stmt->bindParam(':userid', $_POST["userid"]);
            $stmt->bindParam(':bookid', $_POST["bookid"]);
			$stmt->bindParam(':isbn', $_POST["isbn"]);
            $stmt->bindParam(':borrowdate', $_POST["borrowdate"]);
            $stmt->bindParam(':duedate', $duedate);
            $stmt->bindParam(':status', $status);

            $stmt->execute();

            
         //   header('Location: users.php');
         //   exit();
       // } catch (PDOException $e) {
            
        //    error_log("Database error: " . $e->getMessage());
         //   echo "An error occurred. Please try again later.";
        //}
    } else {
        echo "Please select loan status.";
    }
} else {
    echo "Incomplete form submission.";
}

$conn = null;
?>
