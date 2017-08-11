<?php
$this->load->view('template/header.php');
$attributes = array("class" => "form-horizontal", "id" => "registerform", "name" => "registerform", "method" => "POST");
echo form_open("Register/daftar", $attributes);?>

  <h5>Username</h5>
<input type="text" id="username" name="username" value="" size="50" />

<h5>Password</h5>
<input type="password" id="password" name="password" value="" size="50" />

<h5>Email</h5>
<input type="text" id="email" name="email" value="" size="50" />

<h5>Nama Depan</h5>
<input type="text" id="first_name" name="first_name" value="" size="50" />

<h5>Nama Belakang</h5>
<input type="text" id="last_name" name="last_name" value="" size="50" />

<div><input id="btn_daftar" name="btn_daftar" type="submit" value="Daftar" /></div>

<?php echo form_close(); ?>
<?php echo $this->session->flashdata('msg');
$this->load->view('template/footer.php');
?>
</div>

  </body>
</html>
