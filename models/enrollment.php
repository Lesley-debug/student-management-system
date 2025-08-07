<?php
include_once '../core/connect.php';

function getAllEnrollments() {
    global $conn;
    $sql = "SELECT e.id, s.first_name, s.last_name, c.title, e.grade
            FROM enrollments e
            JOIN students s ON e.student_id = s.id
            JOIN courses c ON e.course_id = c.id";
    return mysqli_query($conn, $sql);
}

function enrollStudent($data) {
    global $conn;
    $student_id = $data['student_id'];
    $course_id = $data['course_id'];
    $grade = $data['grade'];
    $sql = "INSERT INTO enrollments (student_id, course_id, grade) VALUES ('$student_id', '$course_id', '$grade')";
    return mysqli_query($conn, $sql);
}
