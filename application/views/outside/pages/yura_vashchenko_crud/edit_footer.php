<script type="text/javascript">
    $(function () {

        $('.edit_send').on('click', function () {
            var options = {
                url: "/ci3/yura_vashchenko_crud/edit_request/<?= $user_info['id']; ?>",
                success: function (data) {
                    $('.ajax_message').html(data);
                }
            };
            $("#edit_form").ajaxSubmit(options);

            setTimeout("$('.ajax_message span').fadeOut(2000);", 7000);
        });

    });
</script>