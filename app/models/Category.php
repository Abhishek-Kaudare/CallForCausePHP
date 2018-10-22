
<?php
class Category
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Find USer BY Email
    public function getCategories()
    {
        $this->db->query("SELECT * FROM categories");

        $row = $this->db->resultset();

        //Check Rows
        return $row;
    }
    public function getCategoryById($id){
      $this->db->query("SELECT * FROM categories WHERE category_id = :id");

      $this->db->bind(':id', $id);
      
      $row = $this->db->single();

      return $row;
    }
}