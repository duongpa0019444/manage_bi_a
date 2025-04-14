<?php 
    namespace App\Core;

    class Validator {
        private $errors = [];
        //Thêm lỗi vào mảng
        public function addError($field, $message) {
            $this->errors[$field][] = $message;
        }

        //Lấy ra lỗi theo loại lõi - field
        public function getErrors($field) {
            return $this->errors[$field]?? [];
        }

        //lấy toàn bộ lỗi
        public function getAllErrors() {
            return $this->errors;
        }

        //Kieemmr tra có lỗi hay không
        public function hasErrors() {
            return !empty($this->errors);
        }
    }
?>