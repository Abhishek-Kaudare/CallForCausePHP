<?php
class Event
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

    public function new_petition($data)
    {

        // Prepare Query
        $this->db->query('INSERT INTO petitions
                          ( usr_id ,
                          title ,
                          target_authority ,
                          target_date ,
                          target_votes ,
                          description ,
                          category_id ,
                          youtube_url )
                          VALUES ( :usr_id ,
                            :title ,
                            :target_authority ,
                            :target_date ,
                            :target_votes ,
                            :description ,
                            :category_id ,
                            :youtube_url
                          )');

        // Bind Values
        $this->db->bind(':usr_id', $data['usr_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':target_authority', $data['target_authority']);
        $this->db->bind(':target_date', $data['target_date']);
        $this->db->bind(':target_votes', $data['target_votes']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':category_id', $data['category_id']);
        // $this->db->bind(':images', $data['images']);
        $this->db->bind(':youtube_url', $data['youtube_url']);
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
}
