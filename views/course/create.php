<?php
include '../../core/connect.php';
include '../../controllers/CourseController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new CourseController($conn);
    $title = $_POST['title'];
    $description = $_POST['description'];

    if ($controller->store($title, $description)) {
        echo "✅ Course added successfully!";
    } else {
        echo "❌ Failed to add course.";
    }
}
?>

<h2>Add New Course</h2>
<form method="POST">
  <label>Title:</label><br>
  <input type="text" name="title" required><br><br>

  <label>Description:</label><br>
  <textarea name="description" required></textarea><br><br>

  <button type="submit">Add Course</button>
</form>
