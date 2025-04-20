<?php 
    namespace App\Models;

    class categorys extends Model {
    
        public function getById($id) {
            $sql = "SELECT * FROM categorys WHERE id = :id";
            return $this->query($sql, ["id" => $id])->fetch();
        }

        public function createCategory($name) {
            $sql = "INSERT INTO categorys (name) VALUES (:name)";
            $this->query($sql, ["name" => $name]);
        }

        public function getCategories($param = []) {
            $sql = "SELECT * FROM categorys";
            return $this->query($sql, $param)->fetchAll();
        }
        
        public function updateCategory($id, $name) {
            $sql = "UPDATE categorys SET name = :name WHERE id = :id";
            $this->query($sql, ["id" => $id, "name" => $name]);
        }
        
       
        public function deleteCategory($id) {
            $sql = "DELETE FROM categorys WHERE id = :id";
            $this->query($sql, ["id" => $id]);
        }
        
        
    }
?>