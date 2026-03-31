<?php
require_once __DIR__ . '/../App/Services/AuthService.php';

use App\Services\AuthService;

session_start();

$auth = new AuthService();

if (!$auth->check()) {
    header("Location: login.php");
    exit;
}

$user = $auth->user();
?>

<h2>Dashboard</h2>

<p>Email: <?php echo $user['email']; ?></p>
<p>Role: <?php echo $user['role']; ?></p>

<a href="logout.php">Logout</a>