<?php
//include_once 'models/course.php';


// controllers/CourseController.php
class CourseController {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function store($title, $description) {
        $sql = "INSERT INTO courses (title, description) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$title, $description]);
    }

    public function index() {
        return $this->conn->query("SELECT * FROM courses");
    }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $description) {
        $sql = "UPDATE courses SET title = ?, description = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$title, $description, $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM courses WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
