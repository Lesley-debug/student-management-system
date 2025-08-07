<?php
include '../../core/connect.php';
include '../../controllers/enrollmentcontroller.php';

$controller = new EnrollmentController($conn);
$enrollments = $controller->index();
?>

<h2>Enrollments</h2>
<a href="create.php">+ Enroll New Student</a>
<table border="1" cellpadding="10">
  <tr>
    <th>Student</th>
    <th>Course</th>
    <th>Grade</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($enrollments as $e): ?>
  <tr>
    <td><?= $e['first_name'] . ' ' . $e['last_name'] ?></td>
    <td><?= $e['title'] ?></td>
    <td><?= $e['grade'] ?></td>
    <td>
      <a href="edit.php?id=<?= $e['id'] ?>">Edit</a> |
      <a href="delete.php?id=<?= $e['id'] ?>" onclick="return confirm('Delete this enrollment?')">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
