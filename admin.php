<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">Admin Dashboard</h1>

        <div class="grid grid-cols-3 gap-4">
            <a href="users.php" class="bg-blue-500 text-white p-4 rounded text-center">Manage Users</a>
            <a href="books.php" class="bg-green-500 text-white p-4 rounded text-center">Manage Books</a>
            <a href="loans.php" class="bg-yellow-500 text-white p-4 rounded text-center">Manage Loans</a>
        </div>

        <div class="mt-6 text-center">
            <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded">Logout</a>
        </div>
    </div>
</body>
</html>
