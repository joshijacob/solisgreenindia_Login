<?php
require_once 'config.php';

// Redirect if already logged in
if(isset($_SESSION['user_id'])) {
    header("Location: pages/dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Solis Green India</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <h1>🔒 Solis Green India</h1>
            <p>Project & Expense Management System</p>
        </div>

        <div id="errorMessage" class="error-message"></div>

        <form id="loginForm" action="backend/api/auth.php" method="POST">
            <input type="hidden" name="action" value="login">
            
            <div class="form-group">
                <label for="email">Work Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="your.name@solisgreenindia.in" 
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Enter your password" 
                    required
                >
            </div>

            <div class="remember-forgot">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a href="forgot-password.php">Forgot Password?</a>
            </div>

            <button type="submit" class="login-btn">🚀 Access Dashboard</button>
        </form>

        <div class="quick-demo">
            <strong>Demo Access:</strong>
            <div class="demo-credentials">
                Email: admin@solisgreenindia.in<br>
                Password: demo123
            </div>
        </div>
    </div>

    <script src="assets/js/auth.js"></script>
</body>
</html>
