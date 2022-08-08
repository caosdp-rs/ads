<script>
    $(document).on('click', '#deleteCategoryBtn', function() {

        var id = $(this).data('id');
        var url = '<?php echo route_to('categories.delete'); ?>';

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(url, {
                    '<?php echo csrf_token(); ?>': $('meta[name="<?php echo csrf_token() ?>"]').attr('content'),
                    _method: 'DELETE',
                    id: id,
                }, function(response) {
                    window.refreshCSRFToken(response.token);
                    toastr.success(response.message, "Sucesso");
                    $("#dataTable").DataTable().ajax.reload(null, false);

                }, 'json').fail(function() {
                    toastr.error('Error backend');
                });
            }
        })



    });
</script>