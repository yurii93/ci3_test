<script type="text/javascript">
    $(function () {

        $(window).keypress(function(event) {
            if (event.keyCode == 13 || event.which == 13) {
                $(".login-form").submit();
                event.preventDefault();
            }
        });

        $.validator.setDefaults({
            errorClass: 'text-danger',
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            }
        });

        $(".login-form").validate({
            submitHandler: function (form) {
                var options = {
                    url: "/ci3/yura_vashchenko_auth/login_request",
                    success: function (data) {
                        $('.login-errors').html(data);
                        setTimeout("$('.login-errors div').fadeOut(2000);", 7000);
                    }
                };
                $(".login-form").ajaxSubmit(options);
            }
        });
        
    });
</script>