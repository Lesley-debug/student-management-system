<?php
include '../../core/connect.php';
include '../../controllers/EnrollmentController.php';

$controller = new EnrollmentController($conn);
$id = $_GET['id'];
$enrollment = $controller->find($id);

// Get students
$students = $conn->query("SELECT id, first_name, last_name FROM students");

// Get courses
$courses = $conn->query("SELECT id, title FROM courses");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $grade = $_POST['grade'];

    if ($controller->update($id, $student_id, $course_id, $grade)) {
        echo "✅ Enrollment updated successfully!";
    } else {
        echo "❌ Update failed.";
    }
}
?>

<h2>Edit Enrollment</h2>
<form method="POST">
  <label>Select Student:</label><br>
  <select name="student_id" required>
    <?php foreach ($students as $s): ?>
      <option value="<?= $s['id'] ?>" <?= $s['id'] == $enrollment['student_id'] ? 'selected' : '' ?>>
        <?= $s['first_name'] . ' ' . $s['last_name'] ?>
      </option>
    <?php endforeach; ?>
  </select><br><br>

  <label>Select Course:</label><br>
  <select name="course_id" required>
    <?php foreach ($courses as $c): ?>
      <option value="<?= $c['id'] ?>" <?= $c['id'] == $enrollment['course_id'] ? 'selected' : '' ?>>
        <?= $c['title'] ?>
      </option>
    <?php endforeach; ?>
  </select><br><br>

  <label>Grade:</label><br>
  <input type="text" name="grade" value="<?= $enrollment['grade'] ?>"><br><br>

  <button type="submit">Update</button>
</form>
