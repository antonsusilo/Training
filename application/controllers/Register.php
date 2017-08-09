<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller
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

     public function index(){
       $this->load->view('register_page.php');
     }

     public function daftar()
     {
          //get the posted values
          $username = $this->input->post("username");
          $password = $this->input->post("password");
          $email = $this->input->post("email");
          $first_name = $this->input->post("first_name");
          $last_name = $this->input->post("last_name");
          $created = time();

          //set validations
          $this->form_validation->set_rules("username", "Username", "trim|required");
          $this->form_validation->set_rules("password", "Password", "trim|required");
          $this->form_validation->set_rules("email", "Email", "trim|required");
          $this->form_validation->set_rules("first_name", "First_name", "trim|required");
          $this->form_validation->set_rules("last_name", "Last_name", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('register_page.php');
          }
          else
          {
               //validation succeeds
               if ($this->input->post('btn_daftar') == "Daftar")
               {
                    //check if username and password is correct
                    //echo($this->input->post("username"));
                    $this->login_model->reg_user($username, $password, $email, $first_name, $last_name,$created);
                    redirect("");

               }
               else
               {
                    redirect("aaaaaa");
               }
          }
     }

}?>
