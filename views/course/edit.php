<?php
include '../../core/connect.php';
include '../../controllers/CourseController.php';

$controller = new CourseController($conn);
$id = $_GET['id'];
$course = $controller->find($id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    if ($controller->update($id, $title, $description)) {
        echo "✅ Updated successfully!";
    } else {
        echo "❌ Update failed!";
    }
}
?>

<h2>Edit Course</h2>
<form method="POST">
  <label>Title:</label><br>
  <input type="text" name="title" value="<?= $course['title'] ?>" required><br><br>

  <label>Description:</label><br>
  <textarea name="description" required><?= $course['description'] ?></textarea><br><br>

  <button type="submit">Update</button>
</form>
