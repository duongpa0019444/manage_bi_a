<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Validator;
use App\Models\categorys;
use App\Models\Model;
use App\Models\Products;

class ProductController extends Controller
{
    protected $productModel;
    protected $tableName;
    protected $cateModel;


    public function __construct()
    {
        $this->tableName = 'Products';
        $this->productModel = new Products();
    }

    public function list()
    {

        $Products = $this->productModel->getProducts();
        $data = [
            "title" => "Trang danh sách sản phẩm",
            'view' => '/product/product-list',
            'Products' => $Products

        ];

        $this->viewRender("admin/main", $data);
    }


    public function create()
    {
        $cateModel = new categorys();
        $categories = $cateModel->getCategories();

        $data = [
            "title" => "Trang thêm sản phẩm",
            'view' => '/product/product-add',
            'categories' => $categories
        ];


        return $this->viewRender("admin/main", $data, $categories);
    }
    
    public function store()
    {
        $validator = new Validator();
        if (empty($_POST['name']) || empty($_POST['price']) || empty($_POST['quantity']) || empty($_POST['category_id'])) {
            $validator->addError('required', 'Vui lòng điền đầy đủ thông tin');
        }


        if ($validator->hasErrors()) {
            $_SESSION['error'] = $validator->getAllErrors();
            header("Location: " . BASE_URL . "/admin/product/create");
            exit;
        }



        if (!empty($_FILES['image']['name'][0])) {
            $file = $_FILES['image']['tmp_name'][0];
            $filename = uniqid() . '_' . $_FILES['image']['name'][0];
            $destination = 'uploads/products/' . $filename;
            if (move_uploaded_file($file, $destination)) {
                $_POST['image'] = $destination;
            }
        }

        (new Model())->create('products', $_POST);

        // Redirect to product list
        header("Location: " . BASE_URL . "/admin/product/list");
        exit;
    }

    public function edit($id)
    {
        $product = $this->productModel->getById($id);
        $cateModel = new categorys();
        $categories = $cateModel->getCategories();

        $data = [
            "title" => "Trang chỉnh sửa sản phẩm",
            'view' => '/product/product-edit',
            'categories' => $categories,
            'product' => $product,


        ];

        $this->viewRender("admin/main", $data);
    }


    public function update($id)
    {
        $_POST['id'] = $id;
        $validator = new Validator();
        if (empty($_POST['name']) || empty($_POST['price']) || empty($_POST['quantity']) || empty($_POST['category_id'])) {
            $validator->addError('required', 'Vui lòng điền đầy đủ thông tin');
        }

        if ($validator->hasErrors()) {
            $_SESSION['error'] = $validator->getAllErrors();
            header("Location: " . BASE_URL . "/admin/product/edit/$id");
            exit;
        }

        // Nếu có upload ảnh mới thì xử lý thay thế
        if (!empty($_FILES['image']['name'][0])) {
            $file = $_FILES['image']['tmp_name'][0];
            $filename = uniqid() . '_' . $_FILES['image']['name'][0];
            $destination = 'uploads/products/' . $filename;

            if (move_uploaded_file($file, $destination)) {
                $_POST['image'] = $destination;

                // Xoá ảnh cũ nếu có
                if (!empty($_POST['old_image']) && file_exists($_POST['old_image'])) {
                    unlink($_POST['old_image']);
                }
            }
        }


        (new Model())->update('products', $_POST);

        // Redirect về danh sách sản phẩm
        header("Location: " . BASE_URL . "/admin/product/list");
        exit;
    }

    public function delete($id)
    {
        $this->productModel->delete($this->tableName, $id);
        header("Location: " . BASE_URL . "/admin/product/list");
        exit;
    }
}
