<?php 
    namespace App\Models;

    class Products extends Model {
        public function getProductOrder($session_id){
            $sql = "SELECT p.id ,om.session_id, om.product_id, p.name, om.quantity, p.price, (p.price* om.quantity) AS total  FROM products p 
                    JOIN orders_menu om ON p.id = om.product_id
                    WHERE om.session_id = :session_id";

            return $this->query($sql,['session_id'=> $session_id])->fetchAll();

        }
    }
?>