<?php
session_start();
require_once '../classes/admin.class.php';

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Redirect all users to a single dashboard or appropriate page
header("Location: ../admin/home.admin.php");
exit();
?>
