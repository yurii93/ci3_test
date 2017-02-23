<form class="form-horizontal login-form" method="post">
    <div class="form-group">
        <input type="email" name="email" class="form-control" id="email" placeholder="Email"
               value="<?= set_value('email'); ?>" data-toggle="tooltip" data-placement="left" title="Type your email"
               required>
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
               data-toggle="tooltip" data-placement="left" title="Type your password" required>
    </div>
    <div class="form-group">
        <div>
            <input type="submit" class="btn btn-default btn-block btn-send" value="Login">
            <br>
            <br>
            <div class="login-errors"></div>
        </div>
    </div>
</form>
