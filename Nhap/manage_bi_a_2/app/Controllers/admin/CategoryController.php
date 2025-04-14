<?php 
 namespace App\Controllers\Admin;

use App\Core\Controller;

    class CategoryController extends Controller{

        public function list(){
           
            $data = [
                "title" => "Trang danh sách danh mục sản phẩm",
                'view' => '/category/category-list',
            ];
            
            $this->viewRender("admin/main", $data);
            
        }

        
        public function create(){
           
            $data = [
                "title" => "Trang thêm danh mục sản phẩm",
                'view' => '/category/category-add',
            ];
            
            $this->viewRender("admin/main", $data);
            
        }

        public function edit(){
           
            $data = [
                "title" => "Trang chỉnh sửa danh mục sản phẩm",
                'view' => '/category/category-edit',
            ];
            
            $this->viewRender("admin/main", $data);
        }


    }
?>