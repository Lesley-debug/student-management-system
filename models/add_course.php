<?php
include '../core/connect.php';

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $desc = $_POST['description'];

  // Use prepared statements to prevent SQL injection
  $stmt = $conn->prepare("INSERT INTO courses (title, description) VALUES (?, ?)");
  $stmt->bind_param("ss", $title, $desc);
  if ($result = $stmt->execute()) {
    echo "Course added successfully!";

    // Make sure $student_id is defined, e.g., from session or POST/GET
    $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
    header("Location: view_courses.php?student_id=" . urlencode($student_id));
    exit();
  } else {
    echo "Error: " . $stmt->error;
  }
    echo "Error: " . mysqli_error($conn);
  }

?>
