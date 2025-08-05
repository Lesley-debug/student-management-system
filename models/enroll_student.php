<?php 
include '../core/connect.php';

if (isset($_POST['submit'])) {
  $student_id = $_POST['student_id'];
  $course_id = $_POST['course_id'];
  $grade = $_POST['grade'];

  $sql = "INSERT INTO enrollments (student_id, course_id, grade) 
          VALUES ('$student_id', '$course_id', '$grade')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    // Redirect with student_id in URL
    header("Location: view_enroll_studentcourses.php?student_id=" . urlencode($student_id));
    exit();
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>
