<?php 
 namespace App\Controllers\Client;

use App\Core\Controller;
use App\Core\Validator;
use App\Models\User;

    class HomeController extends Controller{
        protected $userModel;
        protected $tableName;
        public function __construct()
        {
            $this->userModel = new User();
            $this->tableName = 'users';
        }

        public function index() {
            $data = [
                "title" => "Trang chủ",
                'view' => '/login'
            ];
            $this->viewRender("client/main", $data);
        }


        public function signUp() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $user_name = $_POST['user_name'] ?? '';
                $password = $_POST['password']?? '';
                $email = $_POST['email']?? '';
                $confirmPassword = $_POST['confirmPassword']?? '';
                // validate form đăng ký
                $validator = new Validator();
                if (empty($user_name) || empty($password) || empty($email) || empty($confirmPassword)) {
                    $validator->addError('required', 'Vui lòng điền đầy đủ thông tin');
                }
                if ($password!== $confirmPassword) {
                    $validator->addError('password', 'Mật khẩu không trùng khớp');
                }
                if ($this->userModel->getUserByEmail($email)) {
                    $validator->addError('email', 'Email đã tồn tại');
                }
    
                if ($validator->hasErrors()) {
                    $_SESSION['error'] = $validator->getAllErrors();
                    header("Location: ".BASE_URL."/");
                    exit;
                }
    
                $password = password_hash($password, PASSWORD_DEFAULT);
                $userParam = [
                    'user_name' => $user_name,
                    'password' => $password,
                    'email' => $email
                ];
                $this->userModel->create($this->tableName, $userParam);
                header("Location: ".BASE_URL."/admin");
                exit;
            }
        }
    
        public function signIn() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               
                $name = $_POST['user_name']?? '';
                $password = $_POST['password']?? '';
                
                $user = $this->userModel->getUserByName($name);
                // debug($user);
                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['user_name'];
                    header("Location: ".BASE_URL."/admin");
                    exit;
                } else {
                    $validator = new Validator();
                    $validator->addError('loginError', 'Sai tài khoản hoặc mật khẩu');
                    $_SESSION['error'] = $validator->getAllErrors();
                    header("Location: ".BASE_URL."/");
                    exit;
                }
            }
        }
    
    
    }
?>