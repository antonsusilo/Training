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

      $query = $this->db->get("links_stats");
      return $query->num_rows();
    }

    public function count_filtered()
    {
      $query = $this->db->get("links_stats");
      return $query->num_rows();
    }

    public function insert_stat($id,$browser,$time){
      $data = array(
        'link_id' => $id,
        'ip' => $this->input->ip_address(),
        'browser' => $browser,
        'time' => $time

      );

      $this->db->insert('links_stats', $data);
    }
    public function get_entry($id)
    {

      $query = $this->db->get_where('links_stats', array('link_id' => $id));
      return $query->result_array();

    }

  }

?>
