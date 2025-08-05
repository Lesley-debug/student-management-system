<!-- views/form_add_course.php -->
<?php include '../../core/connect.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course page</title>
</head>
<body>
  
<form method="POST" action="../../models/add_course.php">
  <label>Course Title:</label><br>
  <input type="text" name="title" required><br>

  <label>Description:</label><br>
  <textarea name="description" rows="4" cols="30"></textarea><br><br>

  <button type="submit" name="submit">Add Course</button>
</form>
</body>
</html>

