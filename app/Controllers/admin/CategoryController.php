<?php 
 namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\categorys;

    class CategoryController extends Controller{
        protected $categoryModel;
        protected $tableName;

        public function __construct() {
            $this->categoryModel = new categorys();
            $this->tableName = 'categorys'; 
    
        }
        public function list(){
             $categores = $this->categoryModel->get($this->tableName);
            $data = [
                "title" => "Trang danh sách danh mục sản phẩm",
                'view' => '/category/category-list',
                'categores' => $categores
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

        public function store(){
            // debug(1);
            $CategirysID = $this->categoryModel->create($this->tableName, $_POST);
            header("Location: ". BASE_URL."/admin/category/list");
            exit;
        }
        
        public function edit($id) {
            $category = $this->categoryModel->getById($id);
        // debug(1);
            $data = [
                "title" => "Trang chỉnh sửa danh mục sản phẩm",
                "view" => "/category/category-edit",
                "category" => $category 
            ];
        
            $this->viewRender("admin/main", $data);
        }
        
        public function update($id) {
            // debug(1);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $_POST['id'] = $id;
                // debug($_POST);
                $this->categoryModel->update($this->tableName, $_POST);
                
                header("Location: " . BASE_URL . "/admin/category/list");
                
                exit;
            }
        }
        
        
    
        

        public function delete($id) {
            $this->categoryModel->delete('categorys', $id);
            header("Location: " . BASE_URL . "/admin/category/list");
            exit;
        }
        

    }
?>