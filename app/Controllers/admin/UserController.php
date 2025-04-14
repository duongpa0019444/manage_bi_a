<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function list()
    {
        $userModel = new User();
        $users = $userModel->getAllUsers();

        $data = [
            "title" => "Trang danh sách quản trị viên",
            'view' => '/user/users-list',
            'users' => $users
        ];

        $this->viewRender("admin/main", $data);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_user = $_POST['ten_user'];
            $email = $_POST['email'];
            $mat_khau = password_hash($_POST['mat_khau'], PASSWORD_BCRYPT);

            $userModel = new User();
            $userModel->createUser($ten_user, $email, $mat_khau);

            header("Location: " . BASE_URL . "/admin/user/list");
            exit;
        }

        $data = [
            "title" => "Trang thêm quản trị viên",
            'view' => '/user/users-add',
        ];

        $this->viewRender("admin/main", $data);
    }

    public function edit()
    {
        $userModel = new User();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $ten_user = $_POST['ten_user'];
            $email = $_POST['email'];
            $mat_khau = !empty($_POST['mat_khau']) ? password_hash($_POST['mat_khau'], PASSWORD_BCRYPT) : null;

            $userModel->updateUser($id, $ten_user, $email, $mat_khau);
            header("Location: " . BASE_URL . "/admin/user/list");
            exit;
        }

        $id = $_GET['id'] ?? null;
        if (!$id || !($user = $userModel->getUserById($id))) {
            header("Location: " . BASE_URL . "/admin/user/list");
            exit;
        }

        $data = [
            "title" => "Trang chỉnh sửa quản trị viên",
            'view' => '/user/users-edit',
            'user' => $user
        ];

        $this->viewRender("admin/main", $data);
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $userModel = new User();
            $userModel->deleteUser($id);
        }
        
        header("Location: " . BASE_URL . "/admin/user/list");
        exit;
    }
}
