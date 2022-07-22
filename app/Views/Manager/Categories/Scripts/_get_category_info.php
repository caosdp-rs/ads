<script>

$(document).on('click','#updateCategoryBtn',function(){
    var id=$(this).data('id');
    var url = '<?php echo route_to('categories.get.info');?>';
    $.get(url,{
        id:id,
    }, function(response){
        $('#categoryModal').modal('show');
    },'json');
});

</script>