<?php 
    namespace App\Models;

    use PDO;
    use PDOException;

    class Model {
        protected static $pdo = null;

        public function __construct() {
            if (self::$pdo === null) {
                try {
                    self::$pdo = new PDO("mysql:host=" .DB_HOST.";dbname=" .DB_NAME. ";charset=utf8mb4", DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                } catch (PDOException $e) {
                    die("Lỗi kết nối database: ". $e->getMessage());
                }
            }
        }

        public function query($sql, $params = []) {
            $stmt = self::$pdo->prepare($sql);
            
            //bind giá trị
            foreach ($params as $key => $value) {
                $stmt->bindValue(":$key", $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
                // var_dump($key);
                // var_dump($value);
            }
            $stmt->execute();
            // var_dump($sql);
            return $stmt;
        }

        public function queryPaginator($sql, $param = []) {
            $sql .= " LIMIT :limit OFFSET :offset";
            return $this->query($sql, $param);
        }

        public function create($tableName, $data) {
            // Tạo danh sách cột
            $columns = array_keys($data);
            $placeholders = array_map(fn($col) => ":$col", $columns);
        
            // Ghép chuỗi SQL
            $sql = "INSERT INTO $tableName (" . implode(", ", $columns) . ") 
                    VALUES (" . implode(", ", $placeholders) . ")";
        
            // Chuẩn bị truy vấn
            $stmt = self::$pdo->prepare($sql);
        
            // Bind từng giá trị
            foreach ($data as $key => &$value) {
                $stmt->bindParam(":$key", $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
            }
        
            // Thực thi truy vấn
            $stmt->execute();
            return self::$pdo->lastInsertId(); //Trả về ID mới tạo
        }

        public function update($tableName, $data) {
            $colums = [];
            foreach($data as $key => $value) {
                if ($key !== "id") {
                    $colums[] = "$key = :$key";
                }
            }
            //Nối danh sách cột thành chuỗi SQL
            $setClause = implode(", ", $colums);
            $sql = "UPDATE $tableName SET $setClause WHERE id = :id";
            $stmt = self::$pdo->prepare($sql);
            //Bind từng tham số
            foreach ($data as $key => &$value) { //& để bindparam có thể cập nhật giá trị
                $stmt->bindParam(":$key", $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
            }
            $stmt->execute();
            
        }

        

        public function delete($tableName, $id) {
            $sql = "DELETE FROM $tableName WHERE id = :id";
            $stmt = self::$pdo->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            return $stmt->execute();
        }

        public function get($tableName, $where = '', $data = []){
            $sql = "SELECT*FROM $tableName $where";
            $stmt = $this->query($sql, $data);
            return $stmt;
        }

    }
?>