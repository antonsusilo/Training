<html>
  <head>
    <title>Training</title>
    <link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">

  </head>
  <body>
    <nav class="navbar anvbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Training</a>
        </div>
        <div id="navbar">
          <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Blog</a></li>
          </ul>

        </div>
      </div>
    </nav>

    <div class="container">
      <?php
          $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform", "method" => "POST");
          echo form_open("Login/index", $attributes);?>

  <h5>Username</h5>
<input type="text" id="username" name="username" value="" size="50" />

<h5>Password</h5>
<input type="password" id="password" name="password" value="" size="50" />

<div><input id="btn_login" name="btn_login" type="submit" value="Login" /></div>
<a href="<?php echo site_url('register/index') ?>">Daftar</a>
<?php echo form_close(); ?>
          <?php echo $this->session->flashdata('msg'); ?>
</div>

  </body>
</html>
