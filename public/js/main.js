$(document).ready(function(){
      $('#faculty').change(function(e){
        e.preventDefault();
        var fact_id = $(this).val();
        console.log(fact_id);
        //$('select').remove();
         $.ajax({
            url: "register.getdepartment/"+fact_id,
            type: "GET",
            dataType:'html',
                success:function(data){
                   $('#department').html(data);
                   console.log(data);
                },
                error:function(error){
                    console.log(error);
                }
        });
    });

});