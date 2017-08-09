<?php
  class Link_model extends CI_Model{
    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

    public function get_last_ten_entries()
    {
      $query = $this->db->get('entries', 10);
      return $query->result();
    }

    public function insert_entry()
    {
      $this->user = $_POST['user'];
      $this->code = $_POST['code'];
      $this->link = $_POST['link'];
      $this->created = time();
      //$this->date = time();

      $this->db->insert('entries', $this);
    }

    public function update_entry()
    {
      $this->updated = time();

      $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

    public function delete_entry()

    {
      $this->deleted = time();

      $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
  }

?>
