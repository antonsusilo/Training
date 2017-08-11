<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Link_model extends CI_Model{
  function __construct()
  {
       // Call the Model constructor
       parent::__construct();
  }

  function insert_web($code,$link,$user_id,$cr,$ex){
    $data = array(
      'code' => $code,
      'link' => $link,
      'user_id' => $user_id,
      'created' => $cr,
      'expired' => $ex
    );

    $this->db->insert('links', $data);

  }

  public function get_entry()
  {

    $query = $this->db->get("links");
    return $query->result_array();
  }

  public function getURL($shorten)
  {
    $query = $this->db->get_where('links', array('code' => $shorten));
    return $query->result_array();
  }

  public function getURLbyID($id)
  {
    $query = $this->db->get_where('links', array('id' => $id));
    return $query->result_array();
  }

  public function count_all()
  {
    $query = $this->db->get("links");
    return $query->num_rows();
  }

  public function count_filtered()
  {
    $query = $this->db->get("links");
    return $query->num_rows();
  }
}
