<?php
require_once 'dbh.inc.php';
require_once 'model.php';
require_once 'control.php';

$db = new database();
$conn = $db->connection();

$controller = new controller($conn);
$id = $_GET['id'];
$controller->delete($id);
?>