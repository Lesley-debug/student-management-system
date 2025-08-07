<?php
include_once '../core/connect.php';

function getAllStudents() {
    global $conn;
    $sql = "SELECT * FROM students";
    return mysqli_query($conn, $sql);
}

function getStudentById($id) {
    global $conn;
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function addStudent($data) {
    global $conn;
    $fname = $data['first_name'];
    $lname = $data['last_name'];
    $email = $data['email'];
    $sql = "INSERT INTO students (first_name, last_name, email) VALUES ('$fname', '$lname', '$email')";
    return mysqli_query($conn, $sql);
}

function updateStudent($data) {
    global $conn;
    $id = $data['id'];
    $fname = $data['first_name'];
    $lname = $data['last_name'];
    $email = $data['email'];
    $sql = "UPDATE students SET first_name='$fname', last_name='$lname', email='$email' WHERE id=$id";
    return mysqli_query($conn, $sql);
}

function deleteStudent($id) {
    global $conn;
    $sql = "DELETE FROM students WHERE id = $id";
    return mysqli_query($conn, $sql);
}
?>

