<?php
namespace App\Services;

use App\Core\AuthInterface;

class AuthService {

    public function login(AuthInterface $user, $email, $password) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $result = $user->login($email, $password);

        if ($result === "success") {
            $_SESSION['user'] = [
                'email' => $email,
                'role' => $user->userRole()
            ];
            return true;
        }

        return false;
    }

    public function check() {
        session_start();
        return isset($_SESSION['user']);
    }

    public function user() {
        return $_SESSION['user'] ?? null;
    }

    public function logout() {
        session_start();
        session_destroy();
    }
}