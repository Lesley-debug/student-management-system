<?php
include '../../core/connect.php';


// Get students
$students = mysqli_query($conn, "SELECT id, first_name, last_name FROM students");

// Get courses
$courses = mysqli_query($conn, "SELECT id, title FROM courses");
?>

<form method="POST" action="../../models/enroll_student.php">
  <label>Select Student:</label><br>
  <select name="student_id">
    <?php while ($s = mysqli_fetch_assoc($students)) { ?>
      <option value="<?= $s['id'] ?>"><?= $s['first_name'] . ' ' . $s['last_name'] ?></option>
    <?php } ?>
  </select><br>

  <label>Select Course:</label><br>
  <select name="course_id">
    <?php while ($c = mysqli_fetch_assoc($courses)) { ?>
      <option value="<?= $c['id'] ?>"><?= $c['title'] ?></option>
    <?php } ?>
  </select><br>

  <label>Grade (optional):</label><br>
  <input type="text" name="grade"><br><br>

  <button type="submit" name="submit">Enroll</button>
</form>
