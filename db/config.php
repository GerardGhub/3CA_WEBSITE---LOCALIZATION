<?php
DEFINE('DBHost','127.0.0.1');
DEFINE('DBUser', 'root');
DEFINE('DBPass','');
DEFINE('DBName','user_db');
DEFINE('DBCharset','utf8mb4');
DEFINE('DBCollation', 'utf8_general_ci');
DEFINE('DBPrefix', '');

// Connect to your database (Replace with your database credentials)
$host = "localhost";
$user = "root";
$password = "";
$db = "user_db";

$conn = new mysqli($host, $user, $password, $db);
?>
