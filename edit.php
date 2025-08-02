<?php
$id = $_GET['id'];
require_once 'includes/model.php';
require_once 'includes/dbh.inc.php';
require_once 'includes/control.php';
$db = new database();
$conn = $db->connection();

$controller = new controller($conn);
session_start();
require_once 'includes/view.php';
$view = new view();
$res = $controller->pre_filled($id);
if (!empty($res)) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="max-w-full mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Task</h2>

        <form action="includes/edit.inc.php" method="post">
            <input type="hidden" name="id" value="<?php echo $res[0]['id']?>" />
            
            <!-- Title -->
            <label for="title" class="block text-gray-700 mb-2 font-medium">Title</label>
            <input type="text" id="title" name="title"
                class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter task title" value="<?php echo $res[0]['title']?>" />

            <!-- Description -->
            <label for="description" class="block text-gray-700 mb-2 font-medium">Description</label>
            <textarea id="description" name="description" rows="4"
                class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter task description"><?php echo $res[0]['description']?></textarea>

            <!-- Status Dropdown -->
            <label for="status" class="block text-gray-700 mb-2 font-medium">Status</label>
            <select id="status" name="status"
                class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="to-do" <?php if($res[0]['status']=="to-do") echo "selected"; ?>>To-Do</option>
                <option value="in-progress" <?php if($res[0]['status']=="in-progress") echo "selected"; ?>>In Progress</option>
                <option value="completed" <?php if($res[0]['status']=="completed") echo "selected"; ?>>Completed</option>
            </select>

            <div class="flex justify-end space-x-3">
                <a href="./index.php">
                    <button type="button" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400 transition">
                        Cancel
                    </button>
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    Save Changes
                </button>
            </div>
        </form>
        <?php
        $view->add_task_error();
        ?>
    </div>

</body>
</html>
<?php
} else {
    header("location: ./index.php?error");
    exit;   
}
?>
