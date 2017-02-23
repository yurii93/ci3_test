<div class="yura_wrapper">
    <div class="ajax_message"></div>
    <a class="back_btn glyphicon glyphicon-arrow-left" href="/ci3/yura_vashchenko_crud/" data-toggle="tooltip"
       data-placement="left" title="Back"></a>
    <form action="/ci3/yura_vashchenko_crud/add_request/" id="edit_form" method="POST">
        <div class="form-group">
            <label for="first_name">Name *</label>
            <input type="text" name="first_name" class="form-control" id="name" value="<?= $user_info['first_name']; ?>"
                   placeholder="Name">
        </div>
        <div class="form-group">
            <label for="last_name">Surname *</label>
            <input type="text" name="last_name" class="form-control" id="last_name"
                   value="<?= $user_info['last_name']; ?>" placeholder="Surname">
        </div>
        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" name="email" class="form-control" id="email" value="<?= $user_info['email']; ?>"
                   placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="groups">Group</label>
            <select class="form-control" name="groups[]" multiple id="groups" size="2">
                <?php foreach ($groups as $group) : ?>
                    <option
                        value="<?= $group['id'] ?>" <?php if (in_array($group['name'], $groups_array)) echo "selected"; ?>><?= $group['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <br><br>
        <a class="btn btn-success btn-block edit_send">EDIT</a>
    </form>
</div>