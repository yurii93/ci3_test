<script type="text/javascript">
    $(function() {

        $('.add_send').on('click', function(){
            var options = {
                url: "/ci3/yura_vashchenko_crud/add_request/",
                success: function(data) {
                    $('.ajax_message').html(data);
                }
            };
            $("#add_form").ajaxSubmit(options);

            setTimeout("$('.ajax_message span').fadeOut(2000);", 7000);
        });
    });
</script>