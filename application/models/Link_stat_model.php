<?php
  class Link_stat_model extends CI_Model{
    public function __construct()
    {
            parent::__construct();
            $this->load->library('user_agent');
            // Your own constructor code
    }



    public function count_all()
    {
      $sql = "select * from Links_stats";
      $query = $this->db->query($sql);
      return $query->num_rows();
    }

    public function count_filtered()
    {
      $sql = "select * from Links_stats";
      $query = $this->db->query($sql);
      return $query->num_rows();
    }

    public function insert_stat($id,$browser,$time){
      $data = array(
        'link_id' => $id,
        'ip' => $this->input->ip_address(),
        'browser' => $browser,
        'time' => $time

      );

      $this->db->insert('Links_stats', $data);
    }
    public function get_entry($id)
    {

      $query = $this->db->get_where('Links_stats', array('link_id' => $id));
      return $query->result_array();

    }
    // public function insert_entry()
    // {
    //   $this->link     = $_POST['link'];
    //   $this->ip       = $_POST['ip'];
    //   $this->browser  = $this->agent->browser();
    //   $this->time     = time();
    //
    //   $this->db->insert('entries', $this);
    // }
    //
    // public function update_entry()
    // {
    //   $this->link     = $_POST['link'];
    //   $this->ip       = $this->input->ip_address();
    //   $this->browser  = $_POST['browser'];
    //   $this->time     = time();
    //
    //   $this->db->update('entries', $this, array('id' => $_POST['id']));
    // }
  }

?>
