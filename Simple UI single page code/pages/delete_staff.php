<?php
#include '../includes/session.php';
include '../config/db_connect.php';
include '../includes/role_check.php';
#checkRole('admin');

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM staff WHERE id = ?");
$stmt->execute([$id]);

header("Location: staff.php");
exit();
?>

