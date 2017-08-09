<?php
class Coba extends CI_Controller {

  public function coba()
  {
    $this->load->model('Link_model');
    $this->load->view('login_page');
  }

}
?>
