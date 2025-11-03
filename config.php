<?php
// Application Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'solisgreen_tracker');
define('DB_USER', 'username');
define('DB_PASS', 'password');
define('SITE_URL', 'https://solisgreenindia.in/solisgreenindia_Login');
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/solisgreenindia_Login/');
define('UPLOAD_PATH', BASE_PATH . 'assets/uploads/');

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
