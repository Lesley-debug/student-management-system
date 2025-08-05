<?php
include '../core/connect.php';

if (!isset($_GET['student_id'])) {
    die("Student ID missing.");
}

$student_id = $_GET['student_id'];

$sql = "SELECT c.title AS course_name, e.grade 
        FROM enrollments e
        JOIN courses c ON e.course_id = c.id
        WHERE e.student_id = '$student_id'";

$result = mysqli_query($conn, $sql);
?>

<h2>Enrolled Courses</h2>
<table border="1">
    <tr>
        <th>Course</th>
        <th>Grade</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['course_name'] ?></td>
            <td><?= $row['grade'] ?></td>
        </tr>
    <?php } ?>
</table>
<a href="../models/view_enroll_studentcourses.php?student_id=<?php echo $row['id']; ?>">enroll here</a>