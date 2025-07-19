<?php
require_once 'includes/dbh.inc.php';
require_once 'includes/model.php';
require_once 'includes/control.php';
require_once 'includes/control.php';
$db = new database();
$conn = $db->connection();

$controller = new controller($conn);
$rows = $controller->fetch_all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-4xl mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-semibold text-gray-800">My Tasks</h1>
                <div class="space-x-2">
                    <a href="index.php"
                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">View
                        Tasks</a>
                    <a href="add.php"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">Add
                        Task</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Task List Page (index.html) -->
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white rounded-lg shadow-sm border">
            <div class="p-6 border-b">
                <h2 class="text-lg font-medium text-gray-900">Your Tasks</h2>
                <p class="text-gray-500 text-sm mt-1">Keep track of your daily activities</p>
            </div>

            <!-- Sample Tasks -->
            <div class="divide-y">
                <!-- Task 1 - High Priority -->
                <?php
                foreach ($rows as $row) {
                    ?>
                    <div class="p-4 hover:bg-gray-50 transition-colors">
                        <div class="flex items-start gap-3">
                            <input type="checkbox"
                                class="mt-1 h-4 w-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-1">
                                    <h3 class="font-medium text-gray-900"><?php echo $row['title'] ?></h3>
                                </div>
                                <p class="text-sm text-gray-600"><?php echo $row['description'] ?>
                                </p>
                            </div>
                            <button class="text-red-500 hover:text-red-700 p-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <a href="includes/delete.php?id=<?php echo $row['id']?>">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                    </a>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
</body>

</html>