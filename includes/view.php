<?php
class view
{
    public function add_task_error()
    {
        if (isset($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];

            echo "<br>";

            foreach ($errors as $error) {
                echo "<p class='text-red-500'>
                $error
                </p>";
            }

            unset($_SESSION['errors']);
        }
    }
}
?>