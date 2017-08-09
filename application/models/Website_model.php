<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Website_model extends CI_Model{
  function __construct()
  {
       // Call the Model constructor
       parent::__construct();
  }

  function insert_web($link){
    $data = array(

      'link' => $link,
      'created' => time();

    );

    $this->db->insert('Links', $data);
  }
}
