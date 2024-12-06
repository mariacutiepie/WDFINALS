<?php
require_once "database.class.php";

class Skills
{   
    private $conn;
    public $first = "";
    public $second = "";
    public $third = "";
    public $fourt = "";
    public $fifth = "";
    public $sixth = "";
    public $user_id;

    function __construct()
    {
        $db = new Database;
        $this->conn = $db->connect();
    }

function skills(){
        $sql = "INSERT INTO skills (user_id, first, second, third, fourt, fifth, sixth) VALUES (:user_id, :first, :second, :third, :fourt, :fifth, :sixth)";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':user_id', $this->user_id);
        $query->bindParam(':first', $this->first);
        $query->bindParam(':second', $this->second);
        $query->bindParam(':third', $this->third);
        $query->bindParam(':fourt', $this->fourt);
        $query->bindParam(':fifth', $this->fifth);
        $query->bindParam(':sixth', $this->sixth);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function acc(){
        $sql = "SELECT * FROM skills WHERE user_id = :user_id";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':user_id', $this->user_id);

        $query->execute();
        return $query->fetch(); 
    }
}