<?php
class Petition
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPetitionById($id)
    {
        $this->db->query("SELECT * FROM petitions WHERE petition_id = :id");

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getPetitionByCategoryId($id)
    {
        $this->db->query("SELECT * FROM petitions WHERE category_id = :id ORDER BY petition_id DESC");

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
                          images ,
                          youtube_url )
                          VALUES ( :usr_id ,
                            :title ,
                            :target_authority ,
                            :target_date ,
                            :target_votes ,
                            :description ,
                            :category_id ,
                            :images ,
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
        $this->db->bind(':images', $data['images']);
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
    public function register($data)
    {

        // Prepare Query
        $this->db->query('UPDATE `petitions` SET `total_votes`=:total_votes WHERE `petition_id`=:id');

        // Bind Values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':total_votes', $data['total_votes']);
        //Execute
        

        if ($this->db->execute()) {
            
            return true;
        } else {
            return false;
        }
    }
    public function decline($data)
    {

        // Prepare Query
        $this->db->query('UPDATE `petitions` SET `down_votes`=:down_votes WHERE `petition_id`=:id');

        // Bind Values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':down_votes', $data['down_votes']);
        //Execute
        

        if ($this->db->execute()) {
            
            return true;
        } else {
            return false;
        }
    }
    public function victory()
    {
        $this->db->query("SELECT * FROM petitions WHERE target_votes <= total_votes and total_votes > 0 ORDER BY petition_id DESC LIMIT 5");

        $result = $this->db->resultset();

        return $result;

    }
}
