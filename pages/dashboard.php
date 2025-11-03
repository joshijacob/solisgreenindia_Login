<?php
require_once '../config.php';
require_once '../includes/auth-check.php';
require_once '../backend/classes/Project.php';
require_once '../backend/classes/Expense.php';

$project = new Project($pdo);
$expense = new Expense($pdo);

$userProjects = $project->getUserProjects($_SESSION['user_id']);
$recentExpenses = $expense->getRecentExpenses($_SESSION['user_id']);
$stats = $expense->getUserStats($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Solis Green India</title>
    <base href="/solisgreenindia_Login/">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>
    
    <main class="main-content">
        <div class="dashboard-header">
            <h1>Welcome to Solis Green India Tracker</h1>
            <p>Manage your projects and expenses efficiently</p>
            <!-- Dashboard content -->
        </div>
    </main>
    
    <script src="assets/js/dashboard.js"></script>
</body>
</html>
