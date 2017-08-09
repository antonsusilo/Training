<?php
  echo "Selamat datang, ".$username;


?>
<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
<?php
    $attributes = array("class" => "form-horizontal", "id" => "cekWebsite", "name" => "cekWebsite", "method" => "POST");
    echo form_open("Home/index", $attributes);
?>
<label></label>
<input type="text" name="website" id="website" placeholder="Enter link.">
<input type="text" name="code" id="code" placeholder="Short Link.(up to you)">
<input type="submit" name="btn" id="btn" value="Submit">
<p id="message"></p>
<?php echo form_close()?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
