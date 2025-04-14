<?php

namespace App\Models;

use PDO;

class Order extends Model
{
    public function getOrders($page, $itemsPerPage)
    {
        $offset = ($page - 1) * $itemsPerPage;

        $query = "SELECT 
            p.id,
            s.time_start,
            s.time_end,
            COUNT(DISTINCT om.product_id) AS product_count,
            p.total_amount
        FROM 
            payments p
        LEFT JOIN 
            sessions s ON p.session_id = s.id
        LEFT JOIN 
            orders_menu om ON p.session_id = om.session_id
        GROUP BY 
            p.id, s.time_start, s.time_end, p.total_amount
        ORDER BY 
            s.time_start DESC
        LIMIT 
            :offset, :itemsPerPage;
        ";

        $stmt = self::$pdo->prepare($query);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalOrders()
    {
        $query = "SELECT 
                    COUNT(*) as total
                  FROM 
                    payments p
                  LEFT JOIN 
                    sessions s ON p.session_id = s.id";

        $stmt = self::$pdo->query($query);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }

    public function orderDetail($id)
    {
        $query = "SELECT 
            p.id AS id_DH,
            s.time_start AS thoi_gian,
            p.total_amount AS tong_tien,
            s.status AS trang_thai,
            '' AS ghi_chu, -- Không có trường note trong database
            '' AS ho_va_ten, -- Không có bảng customers
            '' AS chi_tiet_dia_chi -- Không có bảng customers
        FROM 
            payments p
        JOIN 
            sessions s ON p.session_id = s.id
        WHERE 
            p.id = :id";

        $stmt = self::$pdo->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getOrderStatuses()
    {
        // Giả định trạng thái được quản lý cứng hoặc từ một nguồn khác
        // Vì không thấy bảng order_status trong database
        return [
            ['id' => 0, 'trang_thai' => 'Đã kết thúc'],
            ['id' => 1, 'trang_thai' => 'Đang hoạt động']
        ];
    }

    public function getOrderItems($id)
    {
        $query = "SELECT 
            pr.name AS ten_san_pham,
            pr.image AS hinh_anh,
            pr.price AS gia_san_pham,
            om.quantity AS sl_san_pham,
            (om.quantity * pr.price) AS tong,
            c.name AS ten_DM_small
        FROM 
            orders_menu om
        JOIN 
            products pr ON om.product_id = pr.id
        JOIN 
            categorys c ON pr.category_id = c.id
        JOIN 
            payments p ON om.session_id = p.session_id
        WHERE 
            p.id = :id";

        $stmt = self::$pdo->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateOrderStatus($id, $statusId)
    {
        $query = "UPDATE sessions 
                  SET status = :status 
                  WHERE id = (SELECT session_id FROM payments WHERE id = :id)";

        $stmt = self::$pdo->prepare($query);
        $stmt->bindValue(':status', $statusId, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
}