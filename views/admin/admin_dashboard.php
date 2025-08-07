<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<h1>Welcome, <?= $_SESSION['admin']; ?></h1>
<ul>
    <li><a href="../student/index.php">Manage Students</a></li>
    <li><a href="../course/index.php">Manage Courses</a></li>
    <li><a href="../enrollment/index.php">Manage Enrollments</a></li>
</ul>
<a href="logout.php">Logout</a>
