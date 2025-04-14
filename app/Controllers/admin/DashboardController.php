<?php 
 namespace App\Controllers\Admin;

use App\Core\Controller;

    class DashboardController extends Controller{

        public function dashboard(){
            $tables = (new \App\Models\Model)->get('tables')->fetchAll();
            $data = [
                "title" => "Trang quản lý",
                'view' => '/dashboard',
                'tables' => $tables
            ];
            
            $this->viewRender("admin/main", $data);
            
        }


        public function logout() {
            session_destroy();
            header("Location: ".BASE_URL."/");
            exit;
        }


        public function statistical(){
            $totalPriceDate = (new \App\Models\payment)->getPriceDate();
            $totalPriceMonth = (new \App\Models\payment)->getPriceMonth();
            // debug($totalPriceDate);
            $data = [
                "title" => "Trang thống kê",
                'view' => '/statistical',
                'totalPriceDate' => $totalPriceDate,
                'totalPriceMonth' => $totalPriceMonth
            ];
            
            $this->viewRender("admin/main", $data);
        }
        
    }
?>