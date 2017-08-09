<?php
class Home extends CI_Controller
{
  public function __construct()
  {
       parent::__construct();

  }

  public function index(){
    $this->load->view('home',$this->session->all_userdata());
  }

  public function check(){
  $website = $this->input->post('website'); # add this

   $this->form_validation->set_rules('website','WEBSITE','trim|required');

   if($this->form_validation->run() == FALSE)
   {
       echo "ada yang salah";
   }
   else
   {
       //$this->website_model->insert_web($website);
       echo "ini sudah bener";
   }
  }
}



?>
