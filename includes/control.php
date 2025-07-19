<?php
class controller extends model
{
    public $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function is_empty_inputs(string $title, string $description)
    {
        return empty($title) || empty($description);
    }

    public function is_invalid_task(string $title)
    {
        return !preg_match("/['a-zA-Z ']+$/", $title);
    }

    public function is_lenght_title(string $title)
    {
        return strlen($title) >= 60;
    }

    public function is_lenght_description(string $description)
    {
        return strlen($description) >= 120;
    }
}
?>