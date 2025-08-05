<?php
include '../core/connect.php';

$sql = "SELECT * FROM courses";
$result = mysqli_query($conn, $sql);
?>

<h2>All Courses</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Course Title</th>
        <th>Description</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['title'] ?></td>
            <td><?= $row['description'] ?></td>
        </tr>
    <?php } ?>
</table>

<p><a href="/student/views/course/form_add_course.php">Add New Course</a></p>
