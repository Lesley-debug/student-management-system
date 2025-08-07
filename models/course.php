<?php
include_once '../core/connect.php';

function getAllCourses() {
    global $conn;
    $sql = "SELECT * FROM courses";
    return mysqli_query($conn, $sql);
}

function addCourse($data) {
    global $conn;
    $title = $data['title'];
    $description = $data['description'];
    $sql = "INSERT INTO courses (title, description) VALUES ('$title', '$description')";
    return mysqli_query($conn, $sql);
}

