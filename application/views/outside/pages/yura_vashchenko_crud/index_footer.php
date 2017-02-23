<script type="text/javascript">
    $(function () {

        data_refresh();

        $('.data-form-control').on('input', function () {
            data_refresh();
        });

        $('.page_left').on('click', function () {
            var page = $('#page_number').val();
            if (page > 1) {
                page--;
                $('#page_number').val(page);
                data_refresh();
            }
        });

        $('.page_right').on('click', function () {
            var page = $('#page_number').val();
            if (page < (<?= $users_count; ?>/ 5))
            {
                page++;
                $('#page_number').val(page);
                data_refresh();
            }
        });

        $('.del-btn').on('click', function () {

            var checkbox_count = $('#data-table-form').find('input[type=checkbox]:checked').length;

            if (checkbox_count) {
                if (confirm('Are you sure?')) {
                    var options = {
                        url: "/ci3/yura_vashchenko_crud/delete_request/",
                        success: function (data) {
                            if(data) {
                                console.log('ok');
                                $('.delete-checkbox:checked').parent().parent().remove();
                                $('.ajax_message').html(data);
                            }
                        }
                    };
                    $("#data-table-form").ajaxSubmit(options);
                }
            }

            setTimeout("$('.ajax_message').fadeOut(2000);", 4000);
        });

    });
    function data_refresh() {
        $('#data_table').html('loading...');
        var options = {
            url: "/ci3/yura_vashchenko_crud/data/",
            success: function (data) {
                $('#data_table').html(data);
                $('[data-toggle="tooltip"]').tooltip();
            }
        };
        $("#crud_form").ajaxSubmit(options);
    }
</script>