<?php
class Home extends CI_Controller
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
       $this->load->model('link_model');
       $this->load->model('link_stat_model');
  }

  public function index(){
    $this->load->view('home',$this->session->all_userdata());
  }

  public function check(){
  $website = $this->input->post('website');



   $this->form_validation->set_rules('website','WEBSITE','trim|required|valid_url');

   if($this->form_validation->run() == FALSE)
   {
       echo "ada yang salah";
   }
   else
   {
      $arr = str_split($website);
      $res = [];
      foreach ($res as $key => $value) {
        if(!isset($value)){
          $value = "";
        }

      }
      $tamp = 0;
      for($i = 0 ; $i < count($arr)/2 ; $i++){
        $random = rand(0,100);

        if($random <= 50){
          $res[$i] = chr(rand(65,90));
          // $tamp = ord($arr[$i])+rand(0,32);
          // if(($tamp >= 65 && $tamp <= 90) || ($tamp >= 97 && $tamp <= 122)){
          //   $res[$i] = chr($tamp);
          // }
          // else{
          //   $tamp = ($tamp + 65)/2;
          //   $res[$i] = chr($tamp);
          // }
        }
        else if($random > 50 && $random <= 100) {
          $res[$i] = chr(rand(97,122));
        //   $tamp = ord($arr[$i])-rand(0,32);
        //   if(($tamp >= 65 && $tamp <= 90) || ($tamp >= 97 && $tamp <= 122)){
        //     $res[$i] = chr($tamp);
        //   }
        //   else{
        //     $tamp = ($tamp + 65)/2;
        //     $res[$i] = chr($tamp);
        //   }
        //
        // }
        // $tamp = 0;
      }


    }
    $strres = implode($res);
    $this->link_model->insert_web($strres,$website,$this->session->userdata('id'),time(),time()+86400);
    echo "Data sudah dimasukkan. Hasil random untuk ".$website." adalah: ".implode($res)." dari user dengan ID: ".$this->session->userdata('id');
  }
}

  public function dataTable(){

    $hasil = $this->link_model->get_entry();

    $data = array();
    foreach ($hasil as $res) {
      if(time() != $res['expired']){
        $row = array();
        $row[] = $res['id'];
        $row[] = "<a href=".site_url('Direct/path/'.$res['code'].'').">".$res['code']."</a>";
        $row[] = $res['link'];
        $row[] = "<a href=".base_url('index.php/Home/detailDataTable/'.$res['id'].'').">View</a>";

        $data[] = $row;
      }
    }
    $output = array("draw" => 1,
                    "recordsTotal" => $this->link_model->count_all(),
                    "recordsFiltered" => $this->link_model->count_filtered(),
                    "data" => $data,
                  );
    echo json_encode($output);
  }

  public function detailDataTable(){
    $id = $this->uri->segment(3);
    $res = $this->link_model->getURLbyID($id);
    foreach ($res as $hasil) {
      $data = array('id' => $hasil['id'],
                    'link'=> $hasil['link']);
    }



    $this->load->view("detailed_home.php",$data);
  }

  public function detailDataTableFix($id){
    $hasil = $this->link_stat_model->get_entry($id);

    $data = array();
    foreach ($hasil as $res) {
      $row = array();
      $row[] = date('d M Y', $res['time']);
      $row[] = $res['ip'];
      $row[] = $res['browser'];
      //$row[] = "<a href=".base_url('index.php/Home/detailDataTable/'.$res['id'].'').">View</a>";

      $data[] = $row;

    }
    $output = array("draw" => 1,
                    "recordsTotal" => $this->link_stat_model->count_all(),
                    "recordsFiltered" => $this->link_stat_model->count_filtered(),
                    "data" => $data,
                  );
    echo json_encode($output);
  }
}



?>
