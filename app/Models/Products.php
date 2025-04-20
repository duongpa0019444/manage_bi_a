<?php 
    namespace App\Models;

    use PDO;
    
    class Products extends Model {
        public function getProductOrder($session_id){
            $sql = "SELECT p.id ,om.session_id, om.product_id, p.name, om.quantity, p.price, (p.price* om.quantity) AS total  FROM products p 
                    JOIN orders_menu om ON p.id = om.product_id
                    WHERE om.session_id = :session_id";

                    

            return $this->query($sql,['session_id'=> $session_id])->fetchAll();

            
        }
        public function getById($id) {
            $sql = "SELECT * FROM products WHERE id = :id";
            return $this->query($sql, ["id" => $id])->fetch();
        }

       public function getProducts(){
        $sql = "SELECT * FROM products";
        return $this->query($sql)->fetchAll();
       }
        
    
        public function getByname($param= []){
            $sql = "SELECT * FROM `categorys`";
            return $this->query($sql,$param)->fetch();
        }

        public function deleteProduct($id) {
            $sql = "DELETE FROM products WHERE id = :id";
            $this->query($sql, ["id" => $id]);
        }

    }
?>