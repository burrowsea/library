<!DOCTYPE html>
<html>
<head>
    
    <title>Users</title>
    
</head>
<body>
    <form action="addloans.php" method="POST">
    User ID:<input type="text" name="userid"><br>
    Book ID:<input type="text" name="bookid"><br>
    ISBN:<input type="text" name="isbn"><br>
    Borrow Date:<input type="date" name="borrowdate"><br>
    <br>
    <!--Next 3 lines create a radio button which we can use to select the loan status-->
    <input type="radio" name="status" value="On Loan" checked> On Loan<br>
    <input type="radio" name="status" value="Retuned"> Returned<br>
    <input type="submit" value="Add Loan">
    </form>
    <h2>Current loans</h2>
    <?php
    include_once("connection.php");
    $stmt = $conn->prepare("SELECT * FROM tblloans");
    $stmt->execute();
    while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            #print_r($row);
            echo($row["userid"]." ".$row["bookid"]." ".$row["borrowdate"]." ".$row["duedate"]."<br>");
        }

    ?>

</body>
</html>