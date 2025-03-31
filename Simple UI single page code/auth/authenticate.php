/* Simple authentication logic  */

<?php
include '../config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header("Location: ../dashboard.php");
        exit();
    } else {
        header("Location: login.php?error=Invalid username or password");
        exit();
    }
}
?>

/* Logout code redirect to the index.php page*/
<?php
session_start();
session_destroy();
header("Location: ../index.php");
exit();
?>

/* Simple Session Control Code */
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>

