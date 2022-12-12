<script>
    $('#plans-form').submit(function(e) {
        e.preventDefault();
        var form = this;
        //alert($(form).attr('_method'));
        $.ajax({
            url:$(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'JSON',
            contentType: false,
            beforeSend: function(){
                $(form).find('span.error-text').text('');
            },
            success:function(response){
                window.refreshCSRFToken(response.token);
                if(response.success == false){
                    //Erro
                    toastr.error('<?php echo lang('App.danger_validations');?>');
                    $.each(response.errors, function(field,value){
                        console.log(field);
                        $(form).find('span.' + field).text(value);
                    });
                    return;
                }
                // Tudo certo
                toastr.success(response.message,"Sucesso");
                $('#modalPlan').modal('hide');
                $(form)[0].reset();
                $("#dataTable").DataTable().ajax.reload(null, false);
                $('.modal-title').text('<?php echo lang('Plans.title_new');?>');
                $(form).attr('action','<?php echo route_to('plans.create');?>');
                $(form).find('input[name="id"]').val('');
                $('input[name="_method"]').remove();
            },
            error: function(){
                alert('Error backend');
            }
        });
    });
</script>