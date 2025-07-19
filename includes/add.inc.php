<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    require_once 'dbh.inc.php';
    require_once 'model.php';
    require_once 'control.php';

    $db = new database();
    $conn = $db->connection();

    $controller = new controller($conn);

    try {
        $errors = [];

        if ($controller->is_empty_inputs($title, $description)) {
            $errors[] = "Please fill in all fields.";
        }

        if ($controller->is_invalid_task($title)) {
            $errors[] = "Title is invalid.";
        }

        if ($controller->is_lenght_title($title)) {
            $errors[] = "Title must be less than 60 characters.";
        }

        if ($controller->is_lenght_description($description)) {
            $errors[] = "Description must be at least 120 characters.";
        }

        if ($errors) {
            session_start();
            $_SESSION['errors'] = $errors;
            header('Location: ../add.php?errors');
            exit;
        }

        $controller->insert($title, $description);
        
    } catch (PDOException $e) {
        die('Query Failed : ' . $e->getMessage());
    }
} else {
    header('Location: ../add.php');
    exit;
}
?>