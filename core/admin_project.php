<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../admin/admin_login.php");
    exit();
}
exit();
?>
