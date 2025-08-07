<?php

include '../../core/admin_project.php';
// Enable error reporting for debugging (optional)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include '../../core/connect.php';
$id = $_GET['updateid'];
//for the data to show on the update page 
$sql = "select * from students where id =$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$first_name = $row['last_name'];
$last_name = $row['last_name'];
$gender = $row['gender'];
$date_of_birth = $row['date_of_birth'];
$email = $row['email'];
$phone = $row['phone'];
$address = $row['address'];

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
    $sql = "UPDATE students set id = $id, first_name = '$first_name', last_name = '$last_name', gender = '$gender', date_of_birth = '$date_of_birth', email = '$email', phone = '$phone', address = '$address' where id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "updated successfully";
       // header('Location: display.php');
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
  <h1>update Student</h1>

  <form method="POST" action="../../models/display.php">
    <label>first_Name:</label><br>
    <input type="text" name="first_name" value=<?php echo $first_name; ?>> <br>
    <label>last_Name:</label><br>
    <input type="text" name="last_name" value=<?php echo $last_name; ?>> <br>

    <label>Gender:</label><br />
    <select name="gender" value=<?php echo $gender; ?>>
      <option value="">-- Select --</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select><br /><br />

     <label>Date of Birth:</label><br />
    <input type="date" name="date_of_birth" required value=<?php echo $date_of_birth; ?>/><br /><br />

    <label>Email:</label><br>
    <input type="email" name="email" required value=<?php echo $email; ?>> <br>

    <label for="phone">phone</label><br>
    <input type="text" name="phone" require value=<?php echo $phone; ?>> <br>

    <label for="address">address</label>
    <input type="text" name="address" require value=<?php echo $address; ?>> <br>

    <button type="submit" name="submit">update</button>
  </form>
</body>
</html>
