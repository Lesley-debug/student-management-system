<?php
include '../core/db.php';
include '../controllers/EnrollmentController.php';

$controller = new EnrollmentController($conn);
$id = $_GET['id'];

if ($controller->delete($id)) {
    header("Location: index.php");
} else {
    echo "❌ Could not delete enrollment.";
}
?>
