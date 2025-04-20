<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\payment as Payment;
use App\Models\Products;
use DateTime;

class setupController extends Controller
{
    private $object_model;
    public function __construct()
    {
        $this->object_model = new \App\Models\Model();
    }
    public function setup($id)
    {
        $search = $_POST['category_id'] ?? "";

        $categorys = $this->object_model->get('categorys')->fetchAll();
        $products = !empty($search)
            ? $this->object_model->get('products', 'WHERE category_id = :category_id', ['category_id' => $search])->fetchAll()
            : $this->object_model->get('products')->fetchAll();

        $orderDetail = $this->object_model->get('tables', 'WHERE id = :id', ['id' => $id])->fetch();
        // Chỉ lấy phiên chơi có status = 'Đang chơi'
        $sessions = $this->object_model->get('sessions', 'WHERE table_id = :table_id AND status = :status', [
            'table_id' => $id,
            'status' => 'Đang chơi'
        ])->fetch();
        $productOrders = !empty($sessions) ? (new \App\Models\Products)->getProductOrder($sessions['id']) : [];
        $data = [
            "title" => "Trang thiết lập đặt bàn",
            'view' => '/setup/order_setup',
            'categorys' => $categorys,
            'products' => $products,
            'orderDetail' => $orderDetail,
            'sessions' => $sessions,
            'productOrders' => $productOrders
        ];
        $this->viewRender("admin/main", $data);
    }

    public function setSession($id)
    {
        // Đảm bảo múi giờ đúng
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        // Kiểm tra xem có phiên chơi nào đang hoạt động cho table_id không
        $existingSession = $this->object_model->get('sessions', 'WHERE table_id = :table_id AND status = :status', [
            'table_id' => $id,
            'status' => 'Đang chơi'
        ])->fetch();

        if ($existingSession) {
            header('location:' . BASE_URL . '/admin/order/' . $id . '/setup?error=Bàn đang được sử dụng bởi một phiên chơi khác');
            exit;
        }

        // Lấy thời gian hiện tại chính xác
        $timeStart = date('Y-m-d H:i:s');
        $data = [
            'user_id' => $_SESSION['user_id'],
            'table_id' => $id,
            'time_start' => $timeStart,
            'status' => 'Đang chơi'
        ];
        $idSessions = $this->object_model->create('sessions', $data);
        $sessions = $this->object_model->get('sessions', 'WHERE id = :id', ['id' => $idSessions])->fetch();

        $this->object_model->update('tables', ['id' => $id, 'status' => 'Đang sử dụng']);

        header('location:' . BASE_URL . '/admin/order/' . $id . '/setup');
    }


    public function addproduct()
    {
        $product = $this->object_model->get('orders_menu', 'WHERE product_id = :product_id AND session_id= :session_id', ['product_id' => $_POST['id'], 'session_id' => $_POST['session_id']])->fetch();

        if (empty($product)) {

            $this->object_model->create('orders_menu', ['session_id' => $_POST['session_id'], 'product_id' => $_POST['id'], 'quantity' => 1]);
        } else {
            $quantity = $product['quantity'] + 1;
            $this->object_model->update('orders_menu', ['id' => $product['id'], 'quantity' => $quantity]);
        }
        $orderMenus = (new \App\Models\Products)->getProductOrder($_POST['session_id']);
        header('Content-Type: application/json');
        echo json_encode($orderMenus);
        exit;
    }

    public function deleteProduct()
    {
        $productOrder = $this->object_model->get('orders_menu', 'WHERE product_id = :product_id AND session_id = :session_id', ['product_id' => $_POST['product_id'], 'session_id' => $_POST['session_id']])->fetch();
        if ($productOrder['quantity'] > 1) {
            $quantity = $productOrder['quantity'] - 1;
            $this->object_model->update('orders_menu', ['id' => $productOrder['id'], 'quantity' => $quantity]);
        } else {
            $this->object_model->delete('orders_menu', $productOrder['id']);
        }
        $orderMenus = (new \App\Models\Products)->getProductOrder($_POST['session_id']);
        header('Content-Type: application/json');
        echo json_encode($orderMenus);
        exit;
    }


    public function delete()
    {
        (new \App\Models\ordersMenu)->deleteOrderMenu($_POST['session_id']); //xóa trong bảng order_menu
        $this->object_model->delete('sessions', $_POST['session_id']); //xóa trong bảng sessions

        $this->object_model->update('tables', ['id' => $_POST['table_id'], 'status' => 'Còn trống']); //cập nhật trạng thái bảng tables

    }
    // Phương thức lấy danh sách sản phẩm bằng AJAX
    public function getOrderItems()
    {
        header('Content-Type: application/json');

        $data = json_decode(file_get_contents("php://input"), true);
        $session_id = $data['session_id'] ?? null;

        if (!$session_id) {
            echo json_encode(["success" => false, "message" => "Thiếu session_id"]);
            exit;
        }

        try {
            // Lấy danh sách sản phẩm
            $query = "
                    SELECT p.name, om.quantity, p.price 
                    FROM orders_menu om 
                    JOIN products p ON om.product_id =  p.id 
                    WHERE om.session_id = :session_id
                ";
            $items = (new Payment())->getCustom($query, ['session_id' => $session_id])->fetchAll();

            // Lấy thông tin phiên chơi (bao gồm start_time)
            $session_query = "SELECT time_start, table_id FROM sessions WHERE id = :session_id";
            $session = (new Payment())->getCustom($session_query, ['session_id' => $session_id])->fetch();

            if (!$session) {
                echo json_encode(["success" => false, "message" => "Không tìm thấy phiên chơi."]);
                exit;
            }

            // Lấy giá tiền của bàn
            $table_query = "SELECT table_price FROM tables WHERE id = :table_id";
            $table = (new Payment())->getCustom($table_query, ['table_id' => $session['table_id']])->fetch();

            if (!$table) {
                echo json_encode(["success" => false, "message" => "Không tìm thấy thông tin bàn."]);
                exit;
            }

            if ($items) {
                echo json_encode([
                    "success" => true,
                    "items" => $items,
                    "start_time" => $session['time_start'],
                    "price_per_hour" => $table['table_price']
                ]);
            } else {
                echo json_encode([
                    "success" => false,
                    "message" => "Không tìm thấy sản phẩm cho phiên này.",
                    "start_time" => $session['time_start'],
                    "price_per_hour" => $table['table_price']
                ]);
            }
        } catch (\Exception $e) {
            echo json_encode(["success" => false, "message" => "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage()]);
        }
        exit;
    }

    // Phương thức lưu hóa đơn vào bảng payments bằng AJAX
    public function savePayment()
    {
        ob_start();
        header('Content-Type: application/json');

        // Đảm bảo múi giờ đúng
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        // Nhận dữ liệu từ request
        $data = json_decode(file_get_contents("php://input"), true);

        // Kiểm tra dữ liệu đầu vào
        if (
            !$data || !isset($data['session_id']) || !isset($data['table_id']) ||
            !isset($data['total_food_price']) || !isset($data['total_play_time']) || !isset($data['total_amount'])
        ) {
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
            ob_end_flush();
            exit;
        }

        $sessionId = $data['session_id'];
        $tableId = $data['table_id'];
        $totalFoodPrice = $data['total_food_price'];
        $totalPlayTime = $data['total_play_time'];
        $totalAmount = $data['total_amount'];

        try {
            // Kiểm tra dữ liệu số
            if (!is_numeric($totalFoodPrice) || !is_numeric($totalPlayTime) || !is_numeric($totalAmount)) {
                throw new \Exception("Dữ liệu số không hợp lệ");
            }

            // Kiểm tra table_id
            if (!is_numeric($tableId) || $tableId <= 0) {
                throw new \Exception("ID bàn không hợp lệ: table_id = " . $tableId);
            }

            // Lấy dữ liệu phiên chơi hiện tại để kiểm tra
            $session = $this->object_model->get('sessions', 'WHERE id = :id', ['id' => $sessionId])->fetch();
            if (!$session) {
                throw new \Exception("Không tìm thấy phiên chơi");
            }

            // Lưu giá trị time_start ban đầu để kiểm tra sau
            $originalTimeStart = $session['time_start'];
            error_log("Before update - time_start: " . $session['time_start'] . ", time_end: " . $session['time_end']);

            // Kiểm tra xem bàn có tồn tại không
            $table = $this->object_model->get('tables', 'WHERE id = :id', ['id' => $tableId])->fetch();
            if (!$table) {
                throw new \Exception("Không tìm thấy bàn với ID: " . $tableId);
            }

            // Cập nhật thời gian kết thúc (time_end) và trạng thái cho session
            $timeEnd = date('Y-m-d H:i:s');
            $timeStart = new DateTime($session['time_start']);
            $timeEndObj = new DateTime($timeEnd);

            // Kiểm tra nếu time_end nhỏ hơn time_start
            if ($timeEndObj < $timeStart) {
                throw new \Exception("Thời gian kết thúc không thể nhỏ hơn thời gian bắt đầu");
            }

            // Chỉ cập nhật time_end và status
            $updateData = [
                'id' => $sessionId,
                'time_end' => $timeEnd,
                'status' => 'Đã kết thúc'
            ];
            $this->object_model->update('sessions', $updateData);
            // if (!$result) {
            //     throw new \Exception("Không thể cập nhật thời gian kết thúc cho phiên chơi");
            // }

            // Kiểm tra lại dữ liệu sau khi cập nhật
            $updatedSession = $this->object_model->get('sessions', 'WHERE id = :id', ['id' => $sessionId])->fetch();
            error_log("After update - time_start: " . $updatedSession['time_start'] . ", time_end: " . $updatedSession['time_end']);
            // if ($updatedSession['time_start'] !== $originalTimeStart) {
            //     throw new \Exception("time_start đã bị thay đổi sau khi cập nhật: " . $updatedSession['time_start']);
            // }

            // Tính total_play_time dựa trên time_start và time_end
            $interval = $timeStart->diff($timeEndObj);
            $totalPlayTime = ($interval->h * 60) + $interval->i; // Tính bằng phút

            // Lấy giá bàn từ bảng tables
            $tablePrice = $table['table_price'] ?? 0;
            $playTimeHours = $totalPlayTime / 60;
            $playTimePrice = $playTimeHours * $tablePrice;

            // Tính tổng tiền
            $totalAmount = $totalFoodPrice + $playTimePrice;

            // Lưu vào bảng payments
            $paymentData = [
                'session_id' => $sessionId,
                'total_food_price' => $totalFoodPrice,
                'total_play_time' => $totalPlayTime,
                'total_amount' => $totalAmount
            ];
            $paymentId = $this->object_model->create('payments', $paymentData);

            // Xác nhận dữ liệu đã được lưu vào payments
            $savedPayment = $this->object_model->get('payments', 'WHERE id = :id', ['id' => $paymentId])->fetch();
            if (!$savedPayment) {
                throw new \Exception("Hóa đơn không được lưu vào payments");
            }

            // Cập nhật trạng thái bàn thành "Còn trống"
            $result = $this->object_model->update('tables', [
                'id' => $tableId,
                'status' => 'Còn trống'
            ]);
            // if (!$result) {
            //     throw new \Exception("Không thể cập nhật trạng thái bàn");
            // }

            // Trả về phản hồi thành công
            echo json_encode([
                'success' => true,
                'message' => 'Thanh toán thành công',
                'payment_id' => $paymentId,
                'total_play_time' => $totalPlayTime,
                'play_time_price' => $playTimePrice,
                'total_amount' => $totalAmount
            ]);
        } catch (\Exception $e) {
            error_log("Error in savePayment: " . $e->getMessage());
            echo json_encode([
                'success' => false,
                'message' => 'Lỗi khi lưu hóa đơn: ' . $e->getMessage()
            ]);
        }

        ob_end_flush();
        exit;
    }
}
