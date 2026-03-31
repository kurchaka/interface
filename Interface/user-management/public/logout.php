<?php
require_once __DIR__ . '/../App/Services/AuthService.php';

use App\Services\AuthService;

$auth = new AuthService();
$auth->logout();

header("Location: login.php");
exit;