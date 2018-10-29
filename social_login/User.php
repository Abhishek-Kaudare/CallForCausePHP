<?php
require_once '../app/models/User.php';
require_once '../app/helpers/session_helper.php';
require_once '../app/libraries';


class User {
	private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName     = "call_for_cause";
    private $userTbl    = 'users_profilw';
	
	function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
	
	function checkUser($userData = array()){
        if(!empty($userData)){
            //Check whether user data already exists in database
            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
            $prevResult = $this->db->query($prevQuery);
            if($prevResult->num_rows > 0){
                //Update user_profile data if already exists
                $query = "UPDATE ".$this->userTbl." SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
                $update = $this->db->query($query);
            }else{
                //Insert user_profile data
                $query = "INSERT INTO ".$this->userTbl." SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'";
                $insert = $this->db->query($query);
                $profile = $this->db->lastInsertId();

                //
                $query1= $this->db->query("INSERT INTO users (profile_id, name, email, password, uname) VALUES ('".$profile."','".$userData['first_name']." ".$userData['last_name']."', '".$userData['email']."', '', '".$userData['first_name']." ".$userData['last_name']."')");
                $user = $this->db->lastInsertId();
                $query = "UPDATE ".$this->userTbl." SET usr_id = '".$user."'";
                $update = $this->db->query($query);


            }
            
            //Get user data from the database
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();



        }
        
        //Return user data
        return $userData;
    }
}
?>