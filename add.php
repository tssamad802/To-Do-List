<?php
session_start();
require_once 'includes/view.php';
$view = new view();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task - To-Do List</title>
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
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">View
                        Tasks</a>
                    <a href="add.html"
                        class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">Add
                        Task</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Add Task Page -->
    <div class="max-w-2xl mx-auto p-6">
        <div class="bg-white rounded-lg shadow-sm border">
            <div class="p-6 border-b">
                <h2 class="text-lg font-medium text-gray-900">Add New Task</h2>
                <p class="text-gray-500 text-sm mt-1">Create a new task to add to your list</p>
            </div>

            <form class="p-6 space-y-6" action="includes/add.inc.php" method="post">
                <!-- Task Title -->
                <div>
                    <label for="taskTitle" class="block text-sm font-medium text-gray-700 mb-2">Task Title *</label>
                    <input type="text" id="title" name="title"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                        placeholder="Enter task title...">
                </div>

                <!-- Task Description -->
                <div>
                    <label for="taskDescription"
                        class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="taskDescription" name="description" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                        placeholder="Add a description (optional)..."></textarea>
                </div>



                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t">
                    <button type="submit"
                        class="flex-1 px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        ✅ Add Task
                    </button>
                    <button type="button"
                        class="flex-1 px-6 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors">
                        🔄 Reset Form
                    </button>
                    <a href="index.php"
                        class="flex-1 px-6 py-2 text-center bg-red-100 text-red-700 rounded-md hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors">
                        ❌ Cancel
                    </a>
                </div>
            </form>
        </div>
        <?php
        $view->add_task_error();
        ?>
    </div>
</body>

</html>