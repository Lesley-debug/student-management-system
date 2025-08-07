<?php
include '../../core/connect.php';
include '../../controllers/CourseController.php';

$controller = new CourseController($conn);
$courses = $controller->index();
?>

<h2>All Courses</h2>
<a href="create.php">+ Add New Course</a>
<table border="1" cellpadding="10">
  <tr>
    <th>Title</th>
    <th>Description</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($courses as $course): ?>
  <tr>
    <td><?= $course['title'] ?></td>
    <td><?= $course['description'] ?></td>
    <td>
      <a href="edit.php?id=<?= $course['id'] ?>">Edit</a> |
      <a href="delete.php?id=<?= $course['id'] ?>" onclick="return confirm('Delete this course?')">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
