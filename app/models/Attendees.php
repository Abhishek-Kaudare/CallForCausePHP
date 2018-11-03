<?php
class Attendees
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function attend($data)
    {

        // Prepare Query
        $this->db->query('INSERT INTO attendees
                          ( usr_id ,
                          event_id  )
                          VALUES ( :usr_id ,
                            :event_id
                          )');

        // Bind Values
        $this->db->bind(':usr_id', $data['usr_id']);
        $this->db->bind(':event_id', $data['id']);
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
    public function getAttendeeById($data)
    {

        $this->db->query("SELECT * FROM attendees WHERE event_id = :id and usr_id = :usr_id");
        
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
