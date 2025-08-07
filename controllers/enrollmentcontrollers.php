<?php
require_once '../controllers/EnrollmentController.php';
include '../core/connect.php';

class EnrollmentActions {
    public function index() {
        $enrollments = getAllEnrollments(); // model function
        include '../views/enrollment/index.php';
    }

    public function create() {
        include '../views/enrollment/form_enroll_student.php';
    }

    public function store($data) {
        enrollStudent($data); // model function
        header("Location: EnrollmentController.php?action=index");
    }
}


// controllers/EnrollmentController.php
class EnrollmentController {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function store($student_id, $course_id, $grade) {
        $stmt = $this->conn->prepare("INSERT INTO enrollments (student_id, course_id, grade) VALUES (?, ?, ?)");
        return $stmt->execute([$student_id, $course_id, $grade]);
    }

    public function index() {
        $sql = "SELECT enrollments.id, students.first_name, students.last_name, courses.title, enrollments.grade
                FROM enrollments
                JOIN students ON enrollments.student_id = students.id
                JOIN courses ON enrollments.course_id = courses.id";
        return $this->conn->query($sql);
    }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM enrollments WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $student_id, $course_id, $grade) {
        $sql = "UPDATE enrollments SET student_id = ?, course_id = ?, grade = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$student_id, $course_id, $grade, $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM enrollments WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
