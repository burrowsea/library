<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold text-center mb-8">Welcome to the backrooms</h1>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

            <a href="users.php" class="block p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition">
                <h2 class="text-xl font-semibold mb-2">Manage Users</h2>
                <p class="text-gray-600">View, add, or edit library users.</p>
            </a>

            <a href="loans.php" class="block p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition">
                <h2 class="text-xl font-semibold mb-2">Manage Loans</h2>
                <p class="text-gray-600">Track current and past loans.</p>
            </a>

            <a href="books.php" class="block p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition">
                <h2 class="text-xl font-semibold mb-2">Manage Books</h2>
                <p class="text-gray-600">Add, remove, or edit book records.</p>
            </a>

    
        </div>
        <div class="mt-6 text-center">
        <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded">Logout</a>
        </div>
    </div></body>
</html> 