<?php
include '../core/connect.php';
include '../../controllers/CourseController.php';

$controller = new CourseController($conn);
$id = $_GET['id'];

if ($controller->delete($id)) {
    header("Location: index.php");
} else {
    echo "❌ Could not delete course.";
}
?>
