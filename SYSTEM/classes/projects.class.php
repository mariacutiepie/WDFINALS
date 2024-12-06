<?php
require_once "database.class.php";

class Projects
{   
    public $user_id;
    private $conn;
    public $title = "";
    public $projects = "";
    public $description = "";


    function __construct()
    {
        $db = new Database;
        $this->conn = $db->connect();
    }

    function addprojects(){
        $sql = "INSERT INTO projects (user_id, projects, title, description) VALUES (:user_id, :projects, :title, :description)";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':user_id', $this->user_id);
        $query->bindParam(':projects', $this->projects);
        $query->bindParam(':title', $this->title);
        $query->bindParam(':description', $this->description);

        
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }

    }
    function ac(){
        $sql = "SELECT * FROM projects  WHERE user_id = :user_id";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':user_id', $this->user_id);

        $query->execute();
        return $query->fetchAll(); 
    }
}

?>