<?php
class Vote
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function attend($data)
    {

        // Prepare Query
        $this->db->query('INSERT INTO votes
                          ( usr_id ,
                          petition_id, 
                          status  )
                          VALUES ( :usr_id ,
                            :petition_id ,
                            :status
                          )');

        // Bind Values
        $this->db->bind(':usr_id', $data['usr_id']);
        $this->db->bind(':petition_id', $data['id']);
        
        $this->db->bind(':status', 1);
        //Execute
        // echo '<pre>';
        // print_r($this->db);
        // die();

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function decline($data)
    {

        // Prepare Query
        $this->db->query('INSERT INTO votes
                          ( usr_id ,
                          petition_id, 
                          status  )
                          VALUES ( :usr_id ,
                            :petition_id ,
                            :status
                          )');

        // Bind Values
        $this->db->bind(':usr_id', $data['usr_id']);
        $this->db->bind(':petition_id', $data['id']);
        
        $this->db->bind(':status', 0);
        //Execute
        // echo '<pre>';
        // print_r($this->db);
        // die();

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function geVoterById($data)
    {

        $this->db->query("SELECT * FROM votes WHERE petition_id = :id and usr_id = :usr_id");

        // Bind Values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':usr_id', $data['usr_id']);

        $results = $this->db->single();

        if (!empty($results)) {

            return $results;
        }
        return false;

    }
}
