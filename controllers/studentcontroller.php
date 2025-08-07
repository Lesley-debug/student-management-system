<?php
include_once 'models/student.php';

class StudentController {
    public function index() {
        $students = getAllStudents(); // model function
        
    }

    public function create() {
        include '../views/student/form_add_student.php';
    }

    public function store($data) {
        addStudent($data); // model function
        header("Location: StudentController.php?action=index");
    }

    public function edit($id) {
        $student = getStudentById($id);
        include '../views/student/update.php';
    }

    public function update($data) {
        updateStudent($data);
        header("Location: StudentController.php?action=index");
    }

    public function delete($id) {
        deleteStudent($id);
        header("Location: StudentController.php?action=index");
    }
}
