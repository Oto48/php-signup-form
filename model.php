<?php

class Model {
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "users_db";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->server;dbname=$this->db", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function add() {
        $response = array('success' => false);

        if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email'])){

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];

            $sql = "INSERT INTO users (first_name, last_name, email)
            VALUES ('$first_name', '$last_name', '$email')";
            if($this->conn->exec($sql)) {
            $response['success'] = true;
            }

        }
        echo json_encode($response);
    }

    public function delete() {

        if(!empty($_POST['id'])) {
            $id = $_POST['id'];
            $sql = "DELETE FROM users WHERE id=$id";

            if ($this->conn->exec($sql)) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: ";
            }
        }
    }

    public function output() {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
    }

}

?>