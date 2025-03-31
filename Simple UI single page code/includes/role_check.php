* Simple Role-Based Access Control code */
<?php
function checkRole($role) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== $role) {
        header("Location: ../pages/dashboard.php?error=unauthorized");
        exit();
    }
}
?>
