<?php
include '../../core/connect.php';
include '../../controllers/EnrollmentController.php';

// Fetch Students
$students = $conn->query("SELECT id, first_name, last_name FROM students");
// Fetch Courses
$courses = $conn->query("SELECT id, title FROM courses");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new EnrollmentController($conn);
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $grade = $_POST['grade'];

    if ($controller->store($student_id, $course_id, $grade)) {
        echo "✅ Student enrolled successfully!";
    } else {
        echo "❌ Failed to enroll student.";
    }
}
?>

<h2>Enroll Student in Course</h2>
<form method="POST">
  <label>Student:</label><br>
  <select name="student_id" required>
    <?php while ($s = $students->fetch_assoc()) { ?>
      <option value="<?= $s['id'] ?>"><?= $s['first_name'] . ' ' . $s['last_name'] ?></option>
    <?php } ?>
  </select><br><br>

  <label>Course:</label><br>
  <select name="course_id" required>
    <?php while ($c = $courses->fetch_assoc()) { ?>
      <option value="<?= $c['id'] ?>"><?= $c['title'] ?></option>
    <?php } ?>
  </select><br><br>

  <label>Grade (optional):</label><br>
  <input type="text" name="grade"><br><br>

  <button type="submit">Enroll</button>
</form>
