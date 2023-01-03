<script>
    $(document).on('click', '#archivePlanBtn', function() {

        var id = $(this).data('id');
        var url = '<?php echo route_to('plans.archive'); ?>';
        // alert(id);
        // return; // para não continuar o código
        $.post(url, {
            '<?php echo csrf_token(); ?>': $('meta[name="<?php echo csrf_token() ?>"]').attr('content'),
            _method: 'PUT',
            id: id,
        }, function(response) {
            window.refreshCSRFToken(response.token);
            toastr.success(response.message, "Sucesso");
            $("#dataTable").DataTable().ajax.reload(null, false);

        }, 'json').fail(function(){
            toastr.error('Error backend');
        });

    });
</script>