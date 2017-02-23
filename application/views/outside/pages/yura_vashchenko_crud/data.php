<form id="data-table-form" method="GET">
    <table class="table table-bordered table-hover">
        <tr class="table-head">
            <th>ID</th>
            <th>Email</th>
            <th>Groups</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['groups']; ?></td>
                <td>
                    <a class="btn btn-primary btn-xs glyphicon glyphicon-edit"
                       href="/ci3/yura_vashchenko_crud/edit/<?= $user['id']; ?>" data-toggle="tooltip"
                       data-placement="top" title="Edit user"></a>
                </td>
                <td onclick="$(this).find('input').click();">
                    <input type="checkbox" class="delete-checkbox" name="del[]" value="<?= $user['id']; ?>"
                           onclick="event.stopPropagation();"/>
                    <span class="delete-checkbox-custom"></span>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</form>