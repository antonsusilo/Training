
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     //get the username & password from tbl_usrs
     function get_user($usr, $pwd)
     {

          $query = $this->db->get_where('users', array('username' => $usr, 'password' => $pwd));
          return $query->num_rows();
     }

     function get_all_user($usr, $pwd)
     {
          $query = $this->db->get_where('users', array('username' => $usr, 'password' => $pwd));
          return $query->result_array();
     }

     function reg_user($usr, $pwd, $email, $fn, $ln,$cr)
     {
       $data = array(
         'username' => $usr,
         'password' => $pwd,
         'email' => $email,
         'first_name' => $fn,
         'last_name' => $ln,
         'created' => $cr
       );

       $this->db->insert('users', $data);

     }
}?>
