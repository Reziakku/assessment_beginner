<?php
session_start();

// If not logged in, redirect to login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$clients = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM clients"))['c'];
$services = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM services"))['c'];
$bookings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM bookings"))['c'];

$revRow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT IFNULL(SUM(amount_paid),0) AS s FROM payments"));
$revenue = $revRow['s'];
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assessment_beginner/Styles/style.css">
</head>
<body>

<?php include "nav.php"; ?>

<div class="container">
    <h2>Dashboard</h2>
    <h3>Welcome, <?php echo $_SESSION['username']; ?>!</h3>
    <div class="stats">
    <div class="card">
        <span>Total Clients</span>
        <strong><?php echo $clients; ?></strong>
    </div>

    <div class="card">
        <span>Total Services</span>
        <strong><?php echo $services; ?></strong>
    </div>

    <div class="card">
        <span>Total Bookings</span>
        <strong><?php echo $bookings; ?></strong>
    </div>

    <div class="card revenue">
        <span>Total Revenue</span>
        <strong>₱<?php echo number_format($revenue,2); ?></strong>
    </div>
    </div>

    <div class="quick-links">
    <h3>Quick Actions</h3>
    <a href="/assessment_beginner/pages/clients_add.php">Add Client</a>
    <a href="/assessment_beginner/pages/bookings_create.php">Create Booking</a>
    </div>
</div>

</body>
</html>
