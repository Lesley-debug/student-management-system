<?php

session_start();
include '../../core/connect.php';
include '../../core/admin_project.php';

// Only redirect if not submitting the login form
if (isset($_SESSION['admin']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    header("Location: admin_dashboard.php");
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']); // match SHA1 in DB

    $stmt = $conn->prepare("SELECT * FROM admins WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid login";
    }
    $stmt->close();
}
?>

<h2>Admin Login</h2>
<form method="POST" action="admin_login.php">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit" name="login">Login</button>
</form>
<?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
