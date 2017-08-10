<?php
  echo "Selamat datang, ".$this->session->userdata('username')." dengan ID: ".$this->session->userdata('id');


?>
<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.dataTables.min.css">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(function(){
        $( "#btn" ).click(function(event)
        {
            event.preventDefault();
            var website= $("#website").val();

            $.ajax(
                {
                    type:"post",
                    url: "<?php echo site_url('Home/check')?>",
                    data:{ website:website},
                    dataType: 'html',
                    success:function(response)
                    {

                        // console.log(response);

                        $("#message").html(response);
                        // $('#cartmessage').show();
                    }


                }
            );
        });
    });
</script>
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
<script type="text/javascript">
$(document).ready(function() {
  $('#example').DataTable( {
      "processing": true,
      "serverSide": true,
      "ajax": "<?php echo site_url('Home/dataTable')?>",
      "type": "POST"

  } );
} );
</script>
