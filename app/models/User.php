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
        $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');

        // Bind Values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['psw']);

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

    // Add User / Register
    public function checkUser($data)
    {
        // check for oauth id
        $this->db->query("SELECT * FROM users WHERE oauth_provider = :oauth_provider and oauth_uid = :oauth_uid");
        $this->db->bind(':oauth_provider', $data['oauth_provider']);
        $this->db->bind(':oauth_uid', $data['oauth_uid']);

        $row = $this->db->single();
        $count = $this->db->rowCount();
        echo '<pre>';
        print_r($count);
        die();
        //Check Rows
        if ( $count > 0) {
            return $row;
        } else {
            $result = $this->insertUser($data);
            if ($result) {
                echo '<pre>';
                print_r($result);
                die();
                echo $this->db->getUserById($result);
            } else {
                return false;
            }

        }
    }

    public function insertUser($data)
    {
        // Prepare Query to insert data
        $this->db->query('INSERT INTO users (oauth_provider, oauth_uid, name, email, picture)
        VALUES (:oauth_provider, :oauth_uid, :name, :email, :picture)');

        // Bind Values
        $this->db->bind(':oauth_provider', $data['oauth_provider']);
        $this->db->bind(':oauth_uid', $data['oauth_uid']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':picture', $data['picture']);

        // Execute
        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }
}
