<script>

$(document).on('click','#createCategoryBtn',function(){
    
    $('.modal-title').text('Criar categoria');  
    $('#categoryModal').modal('show');
    $('input[name="id"]').val(''); //Limpamos o id 
    $('input[name="_method"]').remove(); //removemos o spoofing
    $('#categories-form')[0].reset();

    $('#categories-form').attr('action','<?php echo route_to('categories.create');?>');
    $('#categories-form').find('span.error-text').text('');

  var url = '<?php echo route_to('categories.parents');?>';

    $.get(url, function(response){
        $('#boxParents').html(response.parents);

    },'json');
    
});

</script>