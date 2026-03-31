<?php
namespace App\Models;

require_once __DIR__ . '/../Core/AbstractUser.php';
require_once __DIR__ . '/../Core/AuthInterface.php';
require_once __DIR__ . '/../Core/LoggerTrait.php';

use App\Core\AbstractUser;
use App\Core\AuthInterface;
use App\Core\LoggerTrait;

class Admin extends AbstractUser implements AuthInterface {
    use LoggerTrait;

    public function userRole() {
        return "Admin";
    }

    public function login($email, $password) {
        if ($email === $this->email && password_verify($password, $this->password)) {
            $this->logActivity("Admin {$this->name} logged in.");
            return "success";
        }
        return "fail";
    }

    public function logout() {
        return "Admin logged out";
    }
}