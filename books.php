<!DOCTYPE html>
<html>
<head>
    
    <title>Users</title>
    
</head>
<body>
    <form action="addbooks.php" method="POST">
    title:<input type="text" name="title"><br>
    isbn:<input type="text" name="isbn"><br>
    Author:<input type="text" name="author"><br>
    Date of Release:<input type="date" name="dor"><br>
    <br>
    <input type="submit" value="Add Book">
    </form>
    <h2>Current books</h2>
    <?php
    include_once("connection.php");
    $stmt = $conn->prepare("SELECT * FROM tblbooks");
    $stmt->execute();
    while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            #print_r($row);
            echo($row["title"]." by ".$row["author"]."<br>");
        }

    ?>

</body>
</html>