<?php 
    namespace App\Core;

    class Controller {
        public function viewRender($viewR, $viewPath = []) {
            extract($viewPath, EXTR_SKIP);
            //ob_start();
            $viewPath = __DIR__ . "/../views/$viewR.php";

            if (file_exists($viewPath)) {
                require $viewPath;
            } else {
                die("View not found: $viewPath");
            }
            //return ob_get_clean();
        }
    }
?>