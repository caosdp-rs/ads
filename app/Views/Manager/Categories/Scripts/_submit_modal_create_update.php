<script>
    $('#categories-form').submit(function(e) {
        e.preventDefault();
        var form = this;
        //alert($(form).attr('_method'));
        $.ajax({
            url:$(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: false,
            beforeSend: function(){
                $(form).find('span.error-text').text('');
            },
            success:function(response){

            },
        });
    });
</script>