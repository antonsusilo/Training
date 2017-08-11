<?php
  $this->load->view('template/header.php');
  echo "Selamat datang, ".$this->session->userdata('username')." dengan ID: ".$this->session->userdata('id');
?>

<a href=<?php echo site_url('Login/logout') ?>>Logout</a>
<?php
    $attributes = array("class" => "form-horizontal", "id" => "cekWebsite", "name" => "cekWebsite", "method" => "POST");
    echo form_open("Home/index", $attributes);
?>
<label></label>
<input type="text" name="website" id="website" placeholder="Enter link.">
<input type="submit" name="btn" id="btn" value="Submit">
<p id="message"></p>
<?php echo form_close()?>
<table id="example" class="display" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Link</th>
            <th>Action</th>
        </tr>
    </thead>

</table>
<?php
  $this->load->view('template/footer.php');
?>
