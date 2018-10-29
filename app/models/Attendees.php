<?php
class Attendees
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getEventById($id)
    {
        $this->db->query("SELECT * FROM events_cfc WHERE event_id = :id");

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function new_event($data)
    {

        // Prepare Query
        $this->db->query('INSERT INTO events_cfc
                          ( usr_id ,
                          event_title ,
                          venue ,
                          date ,
                          details )
                          VALUES ( :usr_id ,
                            :event_title ,
                            :venue ,
                            :date ,
                            :details
                          )');

        // Bind Values
        $this->db->bind(':usr_id', $data['usr_id']);
        $this->db->bind(':event_title', $data['event_title']);
        $this->db->bind(':venue', $data['venue']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':details', $data['details']);
        //Execute
        // echo '<pre>';
        // print_r($this->db);
        // die();

        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }
    public function eventEdit($data)
    {

        // Prepare Query
        $this->db->query('UPDATE `events_cfc` SET `event_id`=:id,`event_title`=:event_title,`venue`=:venue,`date`=:date,`details`=:details WHERE `event_id`=:id');

        // Bind Values
        $this->db->bind(':id', $data['id']);

        $this->db->bind(':event_title', $data['event_title']);
        $this->db->bind(':venue', $data['venue']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':details', $data['details']);
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
}
