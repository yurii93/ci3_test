<div class="yura_wrapper">
    <div class="ajax_message"></div>
    <a class="back_btn glyphicon glyphicon-arrow-left" href="/ci3/yura_vashchenko_crud/" data-toggle="tooltip"
       data-placement="left" title="Back"></a>
    <form action="/ci3/yura_vashchenko_crud/add_request/" id="add_form" method="POST">
        <div class="form-group">
            <label for="first_name">Name *</label>
            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="last_name">Surname *</label>
            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Surname">
        </div>
        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Password *</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <?php if ($groups) : ?>
            <div class="form-group">
                <label for="groups">Group</label>
                <select class="form-control" name="groups[]" multiple size="1" id="groups">
                    <?php foreach ($groups as $group) { ?>
                        <option value="<?= $group['id']; ?>"><?= $group['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        <?php endif; ?>
        <br><br>
        <a class="btn btn-success btn-block add_send">ADD</a>
    </form>
</div>