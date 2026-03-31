<?php
namespace App\Models;

require_once __DIR__ . '/../Core/AbstractUser.php';
require_once __DIR__ . '/../Core/AuthInterface.php';

use App\Core\AbstractUser;
use App\Core\AuthInterface;

class RegularUser extends AbstractUser implements AuthInterface {

    public function userRole() {
        return "User";
    }

    public function login($email, $password) {
        if ($email === $this->email && password_verify($password, $this->password)) {
            return "success";
        }
        return "fail";
    }

    public function logout() {
        return "User logged out";
    }
}