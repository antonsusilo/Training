<?php
  class Direct extends CI_Controller{
    public function __construct()
    {
         parent::__construct();
         $this->load->library('session');
         $this->load->helper('form');
         $this->load->helper('url');
         $this->load->helper('html');
         $this->load->database();
         $this->load->library('form_validation');
         $this->load->model('link_model');
         $this->load->model('link_stat_model');
         $this->load->library('user_agent');
    }

    public function path($shorten){

      $link = "";
      $longURL = $this->link_model->getURL($shorten);

      $browser  = $this->agent->browser();
      $time = time();

      foreach ($longURL as $res) {
        $link = $res['link'];
        $this->link_stat_model->insert_stat($res['id'],$browser,$time);
      }

      redirect($link);
      //redirect($url);
    }
  }

?>
