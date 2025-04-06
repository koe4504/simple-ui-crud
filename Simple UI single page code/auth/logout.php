// Simple Logout code  redirecting to the index.php page

<?php
session_start();
session_destroy();
header("Location: ../index.php");
exit();
?>
