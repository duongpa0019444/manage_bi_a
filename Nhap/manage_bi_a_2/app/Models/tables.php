<?php 
    namespace App\Models;

    class Tables extends Model {

        public function finById($id){
            $sql = "SELECT * FROM tables where id = :id";
            $stmt = $this->query($sql, ["id" => $id]);
            return $stmt->fetch();
        }
        
    }
?>