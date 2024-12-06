<?php
require_once 'database.class.php';
class User
{
    public $user_id;
    private $conn;

    function __construct()
    {
        $db = new Database;
        $this->conn = $db->connect();
    }

    function create_account($lastname, $firstname, $email, $username, $password)
    {
        $sql = "INSERT INTO user(lastname, firstname, email, username, password) VALUES(:lastname, :firstname, :email, :username, :password)";
        $query = $this->conn->prepare($sql);
        $query->bindParam(":lastname", $lastname);
        $query->bindParam(":firstname", $firstname);
        $query->bindParam(":email", $email);
        $query->bindParam(":username", $username);
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);
        $query->bindParam(":password", $hashpassword);

        if ($query->execute()) {
                $_SESSION['user_credentials'] = [
                    'user_id' => $this->conn->lastInsertId(),
                ];
            $_SESSION['user_data'] = [
                'lastname' => $lastname,
                'firstname' => $firstname,
                'email' => $email,
                'username' => $username
            ];
            header('Location: home.php');
        } else {
            return false;
        }
    }   


    function login($username, $password)
    {
        $sql = "SELECT * FROM user WHERE username = :username LIMIT 1";
        $query = $this->conn->prepare($sql);
        $query->bindParam(":username", $username);

        if ($query->execute()) {
            $user_data = $query->fetch(PDO::FETCH_ASSOC); // Fetch a single row

            if ($user_data && password_verify($password, $user_data['password'])) {
                $_SESSION['user'] = [
                    'username' => $user_data['username'],
                    'user_id' => $user_data['user_id']

                ];
                $this->user_id = $user_data['user_id'];
                if (!empty($this->skills_func()) || !empty($this->infos_func())) {
                    header('location: ../admin/dashboard.php');
                } else {
                    header('location: home.php');
                }
                exit;
            } else {
                $_SESSION['incorrect_credentials'] = 'Incorrect Credentials';
            }
        } else {
            $_SESSION['incorrect_credentials'] = 'Query execution failed';
        }
    }

    function record_exist($username)
    {
        $sql = 'SELECT COUNT(*) FROM user WHERE username = :username LIMIT 1';
        $query = $this->conn->prepare($sql);

        $query->bindParam(":username", $username);

        $query->execute();
        $count = $query->fetchColumn();

        return $count > 0;
    }

    function skills_func()
    {
        $sql = "SELECT * FROM skills WHERE user_id = :user_id";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':user_id', $this->user_id);

        $query->execute();
        return $query->fetchAll();
    }

    function infos_func()
    {
        $sql = "SELECT * FROM infos WHERE user_id = :user_id";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':user_id', $this->user_id);

        $query->execute();
        return $query->fetch();
    }
    function name(){
        $sql = "SELECT * FROM user WHERE user_id = :user_id";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':user_id', $this->user_id);

        $query->execute();
        return $query->fetch();
    }
}
