<?php
// Enable error reporting for debugging (optional)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include '../core/connect.php';

if (isset($_POST['submit'])) {
    // Sanitize user inputs
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
   

    // Prepare SQL insert query
    $sql = "INSERT INTO students (first_name, last_name, gender, date_of_birth, email, phone, address) 
            VALUES ('$first_name', '$last_name', '$gender', '$date_of_birth', '$email', '$phone', '$address')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redirect to view all students
        header('Location: ../models/student.php');
        exit();
    } else {
        die("Insert failed: " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Add Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
  <h1 class="mb-4">
  <h1>Add New Student</h1>

  <form method="POST" action="student.php">
    <label>first Name:</label><br>
    <input type="text" name="first_name" required> <br>
    <label>last Name:</label><br>
    <input type="text" name="last_name" required> <br>

    <label>Gender:</label><br />
    <select name="gender" required>
      <option value="">-- Select --</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select><br /><br />

     <label>Date of Birth:</label><br />
    <input type="date" name="date_of_birth" required /><br /><br />

    <label>Email:</label><br>
    <input type="email" name="email" required> <br>

    <label for="phone">phone</label><br>
    <input type="text" name="phone" require> <br>

    <label for="address">address</label>
    <input type="text" name="address" require> <br>

    <a href="display.php"><button type="submit" name="submit">submit</button></a>
  </form>

  <p><a href="display.php">View All Students</a></p>
</body>
</html>
