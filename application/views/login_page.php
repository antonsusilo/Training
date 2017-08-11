
<?php
  $this->load->view('template/header.php');
  $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform", "method" => "POST");
  echo form_open("login/index", $attributes);
?>

<h5>Username</h5>
<input type="text" id="username" name="username" value="" size="50" />

<h5>Password</h5>
<input type="password" id="password" name="password" value="" size="50" />

<div><input id="btn_login" name="btn_login" type="submit" value="Login" /></div>

<a href="<?php echo site_url('register/index') ?>">Daftar</a>

<?php echo form_close(); ?>
<?php echo $this->session->flashdata('msg');
$this->load->view('template/footer.php');

?>
