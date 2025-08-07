<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="POST" action="../../controllers/studentcontroller.php">
  <label>First Name:</label><br>
  <input type="text" name="first_name" required><br>

  <label>Last Name:</label><br>
  <input type="text" name="last_name" required><br>

  <label>Email:</label><br>
  <input type="email" name="email" required><br><br>

  <button type="submit" name="submit">Add Student</button>
</form>
</body>
</html>

<?php if (isset($_GET['success'])): ?>
  <p style="color: green;">Student added successfully!</p>
<?php endif; ?>
