<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Find USer BY Email
    public function findUserByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //Check Rows
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Add User / Register
    public function register($data)
    {
        // Prepare Query
        $this->db->query('INSERT INTO users (name, email, password, uname) VALUES (:name, :email, :password, :uname)');

        // Bind Values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['psw']);
        $this->db->bind(':uname', $data['uname']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // Login / Authenticate User
    public function login($email, $password)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        // echo '<pre>';
        // echo 'here';
        // print_r($row);
        // die();

        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    // Find User By ID
    public function getUserById($id)
    {
        $this->db->query("SELECT * FROM users WHERE usr_id = :id");
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
}
