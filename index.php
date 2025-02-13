<?php
session_start();
include_once("connection.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">Welcome to the Library</h1>

        
        <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Login</h2>
            <form action="login.php" method="POST">
                <input type="text" name="username" placeholder="Username" class="w-full p-2 border rounded mb-3">
                <input type="password" name="password" placeholder="Password" class="w-full p-2 border rounded mb-3">
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Login</button>
            </form>
            <div class="mt-6 text-center">
        <a href="users.php" class="w-full bg-blue-500 text-white p-2 rounded">Sign Up</a>
        </div>
        </div>

        
        <h2 class="text-2xl font-bold mt-8">Browse Books</h2>
        <div class="grid grid-cols-3 gap-4 mt-4">
            <?php
            $stmt = $conn->prepare("SELECT * FROM tblbooks");
            $stmt->execute();
            while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                    
                    echo "<div class='bg-white p-4 rounded shadow'>
                        <h3 class='text-lg font-bold'>{$row['title']}</h3>
                        <p class='text-gray-600'>by {$row['author']}</p>
                    </div>";
                }
        

            
            
            
            ?>
        </div>
    </div>
    
    
</body>
</html>

