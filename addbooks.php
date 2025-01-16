<?php
include_once("connection.php");


if (
    isset($_POST["isbn"], $_POST["title"], $_POST["author"], $_POST["dor"])
) 

    
        
		print_r($_POST);
			
            $stmt = $conn->prepare("INSERT INTO tblbooks (bookid, isbn, title, author, dor)
                VALUES (null, :isbn, :title, :author, :dor)");

            $stmt->bindParam(':isbn', $_POST["isbn"]);
            $stmt->bindParam(':title', $_POST["title"]);
			$stmt->bindParam(':author', $_POST["author"]);
			$stmt->bindParam(':dor', $_POST["dor"]);
            

            $stmt->execute();

            
         
     
    


$conn = null;
?>
