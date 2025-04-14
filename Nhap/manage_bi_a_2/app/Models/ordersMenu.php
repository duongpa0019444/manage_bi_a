<?php 
    namespace App\Models;
    class ordersMenu extends Model {
        public function deleteOrderMenu($id){
            $sql = "DELETE FROM orders_menu WHERE session_id = :session_id";
            $this->query($sql, ['session_id' => $id]);
        }
    }
?>