<?php 
    namespace App\Middleware;

    class AuthMiddleware {
        public static function checkLogin() {
            if (!isset($_SESSION['user_id'])) {
                header("Location: ".BASE_URL."/");
                exit;
            }
        }
    }
?>