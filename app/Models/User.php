<?php 
namespace App\Models;

class User extends Model {
    public function getAllUsers()
    {
        $sql = "SELECT id, user_name, email FROM users";
        return $this->query($sql)->fetchAll();
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->query($sql, ["id" => $id]);
        return $stmt->fetch();
    }

    public function getUserByName($name)
    {
        $sql = "SELECT id, user_name, email, password FROM users WHERE user_name = :user_name";
        return $this->query($sql, ['user_name' => $name])->fetch();
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT id, user_name, email, password FROM users WHERE email = :email";
        return $this->query($sql, ['email' => $email])->fetch();
    }

    public function createUser($user_name, $email, $password)
    {
        $sql = "INSERT INTO users (user_name, email, password) VALUES (:user_name, :email, :password)";
        $this->query($sql, [
            'user_name' => $user_name,
            'email' => $email,
            'password' => $password
        ]);
    }

    public function updateUser($id, $user_name, $email, $password = null)
    {
        if ($password) {
            $sql = "UPDATE users SET user_name = :user_name, email = :email, password = :password WHERE id = :id";
            $this->query($sql, [
                'id' => $id,
                'user_name' => $user_name,
                'email' => $email,
                'password' => $password
            ]);
        } else {
            $sql = "UPDATE users SET user_name = :user_name, email = :email WHERE id = :id";
            $this->query($sql, [
                'id' => $id,
                'user_name' => $user_name,
                'email' => $email
            ]);
        }
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $this->query($sql, ['id' => $id]);
    }
}
?>