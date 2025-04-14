<?php 
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'manage_bi_a');
    define('DB_USER', 'root');
    define('DB_PASS', '');


    define('BASE_URL', '/manage_bi_a_2');

    function debug($message) {
        echo '<pre>';
        print_r($message);
        echo '</pre>';
        die();
    }
    
?>