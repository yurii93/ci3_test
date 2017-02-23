<div class="yura_wrapper">
    <div class="ajax_message"></div>
    <form id="crud_form" method="GET">
        <div class="yura_btns">
            <a class="btn btn-success btn-sm glyphicon glyphicon-ok" href="/ci3/yura_vashchenko_crud/add/"
               data-toggle="tooltip" data-placement="left" title="Add user"></a>
            <a class="btn btn-danger btn-sm glyphicon glyphicon-remove del-btn" data-toggle="tooltip"
               data-placement="right" title="Delete user"></a>
        </div>
        <div class="yura_search">
            <input class="form-control data-form-control" type="text" name="search" value=""
                   placeholder="Search by email and group"/>
        </div>
        <div class="clearfix"></div>
        <div class="pagination_field">
            <a class="btn btn-default glyphicon glyphicon-arrow-left page_left"></a>
            <input id="page_number" class="form-control page-field" type="text" name="page" value="1" readonly/>
            <a class="btn btn-default glyphicon glyphicon-arrow-right page_right"></a>
        </div>
    </form>
    <div id="data_table"></div>
</div>