<script>

    $(document).on('click','#createAdvertBtn',function(){

        $('.modal-title').text('<?php echo lang('Adverts.title_new');?>');
        $('#modalAdvert').modal('show');
    });

</script>