$(document).ready(function() {
  $('#example').DataTable( {
      "processing": true,
      "serverSide": true,
      "ajax": "dataTable",
      "type": "POST"

  } );
} );

$(function(){
    $( "#btn" ).click(function(event)
    {
        event.preventDefault();
        var website= $("#website").val();

        $.ajax(
            {
                type:"post",
                url: "check",
                data:{ website:website},
                dataType: 'html',
                success:function(response)
                {
                    $("#message").html(response);
                }


            }
        );
    });
});
