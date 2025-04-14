<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    private $orderModel;

    public function __construct() {
        // Khởi tạo model để lấy dữ liệu đơn hàng
        $this->orderModel = new Order(); // Giả sử bạn đã có OrderModel
    }

    public function list() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 10;

        $orders = $this->orderModel->getOrders($page, $itemsPerPage);
        $totalOrders = $this->orderModel->getTotalOrders();
        $totalPages = ceil($totalOrders / $itemsPerPage);

        $data = [
            "title" => "Trang lịch sử đơn hàng",
            'view' => '/order/orders-list',
            'orders' => $orders,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'itemsPerPage' => $itemsPerPage
        ];

        $this->viewRender("admin/main", $data);
    }

    public function detail($id)
    {
        // Xử lý cập nhật trạng thái nếu có POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_trang_thai'])) {
            $this->orderModel->updateOrderStatus($id, $_POST['id_trang_thai']);
        }

        // Lấy dữ liệu từ model
        $information = $this->orderModel->orderDetail($id);

        // Kiểm tra nếu không tìm thấy đơn hàng
        if (!$information) {
            $data = [
                "title" => "Lỗi",
                "view" => "/error/404",
                "message" => "Không tìm thấy đơn hàng"
            ];
            return $this->viewRender("admin/main", $data);
        }

        $trangthais = $this->orderModel->getOrderStatuses();
        $products = $this->orderModel->getOrderItems($id);

        // Chuẩn bị dữ liệu cho view
        $data = [
            "title" => "Trang chi tiết đơn hàng",
            "view" => "/order/order-detail",
            "information" => $information,
            "trangthais" => $trangthais,
            "products" => $products
        ];

        // Render view
        $this->viewRender("admin/main", $data);
    }
}
