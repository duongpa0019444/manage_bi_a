<?php 
    namespace App\Models;
    class payment extends Model {
        public function getPriceDate(){
            $sql = "SELECT 
                        DAYOFWEEK(s.time_end) AS weekday, 
                        DATE_FORMAT(s.time_end, '%Y-%m-%d') AS date,  
                        SUM(p.total_amount) AS price
                    FROM sessions s 
                    JOIN payments p ON s.id = p.session_id
                    WHERE s.time_end >= DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY)
                    GROUP BY weekday, date
                    ORDER BY FIELD(weekday, 2, 3, 4, 5, 6, 7, 1); ";
                    
            return $this->query($sql)->fetchAll();
        }

        public function getPriceMonth(){
            $sql = "SELECT 
                        m.month,
                        COALESCE(SUM(p.total_amount), 0) AS price
                    FROM (
                        SELECT 1 AS month UNION SELECT 2 UNION SELECT 3 UNION SELECT 4
                        UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8
                        UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12
                    ) AS m
                    LEFT JOIN sessions s ON MONTH(s.time_end) = m.month AND YEAR(s.time_end) = YEAR(CURDATE())
                    LEFT JOIN payments p ON s.id = p.session_id
                    GROUP BY m.month
                    ORDER BY m.month;";
                    
            return $this->query($sql)->fetchAll();
        }

        // Phương thức getCustom: Thực hiện truy vấn SQL tùy chỉnh
        public function getCustom($query, $params = []) {
            $stmt = self::$pdo->prepare($query);    
            $stmt->execute($params);
            return $stmt;
        }
        
    }
?>