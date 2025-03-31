<?php

include 'config/config.php';
include 'config/db_connect.php';
include 'includes/header.php';

// reporting portion of the Dashboard

// Get child count from the database
$children_count = $conn->query("SELECT COUNT(*) FROM children")->fetchColumn();

// Use stored function to get today's attendance count
$attendance_today = $conn->query("SELECT get_attendance_count(CURDATE(), 'present')")->fetchColumn();

// Get count of unpaid bills
$pending_payments = $conn->query("SELECT COUNT(*) FROM billing WHERE status = 'unpaid'")->fetchColumn();

// Get unread notifications for parents
$unread_notifications = $conn->query("SELECT COUNT(*) FROM notifications WHERE recipient_type = 'parents' AND recipient_id IS NULL")->fetchColumn();

?>

<div class="container mt-5">
    <h2>Admin Dashboard</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <h5>Children</h5>
                    <h3><?= $children_count ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <h5>Today's Attendance</h5>
                    <h3><?= $attendance_today ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning shadow">
                <div class="card-body">
                    <h5>Pending Payments</h5>
                    <h3><?= $pending_payments ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger shadow">
                <div class="card-body">
                    <h5>Unread Notifications</h5>
                    <h3><?= $unread_notifications ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- presenting some of the table from the database on the Dashboard -->

<div class="container mt-5">
    <div class="row text-center">
        <?php
        $sections = [
            "Users" => "pages/users.php",
            "Staff" => "pages/staff.php",
            "Parents" => "pages/parents.php",
            "Children" => "pages/children.php",
            "Attendance" => "pages/attendance.php",
            "Learning Activities" => "pages/activities.php",
            "Activity Resources" => "pages/activity_resources.php",
            "Teacher Assignments" => "pages/teacher_assignments.php",
            "Progress" => "pages/progress.php",
            "Assessments" => "pages/assessments.php",
            "Billing" => "pages/billing.php",
            "Notifications" => "pages/notifications.php"
        ];

        foreach ($sections as $name => $link) {
            echo '<div class="col-md-4 mb-3">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <h5 class="card-title">' . $name . '</h5>
                            <a href="' . $link . '" class="btn btn-primary">Manage ' . $name . '</a>
                        </div>
                    </div>
                  </div>';
        }
        ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

