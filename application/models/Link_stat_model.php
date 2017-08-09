<?php
  class Link_stat_model extends CI_Model{
    public function __construct()
    {
            parent::__construct();
            $this->load->library('user_agent');
            // Your own constructor code
    }

    public function insert_entry()
    {
      $this->link     = $_POST['link'];
      $this->ip       = $_POST['ip'];
      $this->browser  = $this->agent->browser();
      $this->time     = time();

      $this->db->insert('entries', $this);
    }

    public function update_entry()
    {
      $this->link     = $_POST['link'];
      $this->ip       = $this->input->ip_address(); 
      $this->browser  = $_POST['browser'];
      $this->time     = time();

      $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
  }

?>
