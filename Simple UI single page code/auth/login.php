// Simple Login code redirecting to the dashboard.php page 

<?php
include '../config/db_connect.php';

if (isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Daycare Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">


    <div class="card p-4 shadow-lg" style="width: 400px;">
        <h3 class="text-center mb-4">Login</h3>
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger"> <?= htmlspecialchars($_GET['error']); ?> </div>
        <?php endif; ?>
        <form action="authenticate.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>

</body>

 
</html>
