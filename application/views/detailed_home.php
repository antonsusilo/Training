<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.dataTables.min.css">
<?php echo "<h1>".$link."</h1>" ?>
<table id="example" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Time</th>
                <th>IP</th>
                <th>Browser</th>
            </tr>
        </thead>

    </table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#example').DataTable( {
      "processing": true,
      "serverSide": true,
      "ajax": "<?php echo site_url('Home/detailDataTableFix/'.$id.'')?>",
      "type": "POST"
  } );
} );
</script>
