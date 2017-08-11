<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{


     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
          $this->load->model('login_model');
     }

     public function index()
     {
          //get the posted values
          $username = $this->input->post("username");
          $password = $this->input->post("password");

          //set validations
          $this->form_validation->set_rules("username", "Username", "trim|required");
          $this->form_validation->set_rules("password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('login_page.php');
          }
          else
          {
               //validation succeeds
               if ($this->input->post('btn_login') == "Login")
               {
                    //check if username and password is correct
                    //echo($this->input->post("username"));
                    $usr_result = $this->login_model->get_user($this->input->post("username"), $this->input->post("password"));
                    $result = $this->login_model->get_all_user($this->input->post("username"), $this->input->post("password"));
                    if ($usr_result > 0) //active user record is present
                    {
                         //set the session variables
                         foreach ($result as $row) {
                           $sessiondata = array(
                                'id' => $row['id'],
                                'username' => $row['username'],
                                'email' => $row['email'],
                                'first_name' => $row['first_name'],
                                'last_name' => $row['$last_name'],
                                'loginuser' => TRUE
                           );
                         }

                         $this->session->set_userdata($sessiondata);
                         redirect("home/index");
                    }
                    else
                    {
                         $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                         $this->load->view('login_page.php');
                    }
               }
               else
               {
                    $this->load->view('login_page.php');
               }
          }
     }

     public function logout(){
       $this->session->sess_destroy();
       $this->load->view('login_page.php');
     }

}?>
