<?php
require_once __DIR__ . '/../App/Models/Admin.php';
require_once __DIR__ . '/../App/Models/RegularUser.php';
require_once __DIR__ . '/../App/Services/AuthService.php';

use App\Models\Admin;
use App\Models\RegularUser;
use App\Services\AuthService;

session_start();

$auth = new AuthService();

$admin = new Admin("Alice", "alice@example.com", "admin123");
$user  = new RegularUser("Bob", "bob@example.com", "user123");

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($auth->login($admin, $email, $password) || 
        $auth->login($user, $email, $password)) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Blogi duomenys";
    }
}
?>

<h2>Login</h2>

<form method="POST">
    Email: <input type="email" name="email"><br><br>
    Password: <input type="password" name="password"><br><br>
    <button type="submit">Login</button>
</form>

<p><?php echo $error; ?></p>