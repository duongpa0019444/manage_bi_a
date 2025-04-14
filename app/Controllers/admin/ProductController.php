<?php 
 namespace App\Controllers\Admin;

use App\Core\Controller;

    class ProductController extends Controller{

        public function list(){
           
            $data = [
                "title" => "Trang danh sách sản phẩm",
                'view' => '/product/product-list',
            ];
            
            $this->viewRender("admin/main", $data);
            
        }

        
        public function create(){
           
            $data = [
                "title" => "Trang thêm sản phẩm",
                'view' => '/product/product-add',
            ];
            
            $this->viewRender("admin/main", $data);
            
        }

        public function edit(){
           
            $data = [
                "title" => "Trang chỉnh sửa sản phẩm",
                'view' => '/product/product-edit',
            ];
            
            $this->viewRender("admin/main", $data);
        }

        

    }
?>