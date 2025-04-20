<?php 
    namespace App\Models;
    class payment extends Model {
        public function getPriceDate(){
            $sql = "SELECT 
                        w.weekday,
                        w.label,
                        IFNULL(SUM(p.total_amount), 0) AS price,
                        DATE_FORMAT(s.time_end, '%Y-%m-%d') AS date
                    FROM (
                        SELECT 2 AS weekday, 'Thứ 2' AS label UNION ALL
                        SELECT 3, 'Thứ 3' UNION ALL
                        SELECT 4, 'Thứ 4' UNION ALL
                        SELECT 5, 'Thứ 5' UNION ALL
                        SELECT 6, 'Thứ 6' UNION ALL
                        SELECT 7, 'Thứ 7' UNION ALL
                        SELECT 1, 'Chủ nhật'
                    ) w
                    LEFT JOIN sessions s ON DAYOFWEEK(s.time_end) = w.weekday 
                        AND s.time_end >= DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY)
                    LEFT JOIN payments p ON s.id = p.session_id
                    GROUP BY w.weekday, w.label
                    ORDER BY FIELD(w.weekday, 2, 3, 4, 5, 6, 7, 1);";
                    
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