<!DOCTYPE html>
<html>
<head>

    <!--
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta http-equiv="Cache-Control" content="private, max-age=300, must-revalidate, proxy-revalidate" />
    -->

    <meta charset="utf-8">
    <title><?= $seo_title ?></title>
    <meta content="initial-scale=1.0, width=device-width" name="viewport">
    <meta name="description" content="<?= $seo_description ?>">
    <meta name="keywords" content="<?= $seo_keywords ?>">
    <meta name="author" content="IT.iKiev.biz">

    <link href="/files/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="/files/outside/css/core.css" rel="stylesheet">
    <link href="/files/outside/css/style.css" rel="stylesheet">
    <link href="/ci3/files/outside/css/yura_v.css" rel="stylesheet">

    <link rel="icon" href="favicon.ico">

    <?php
    if (@file_exists(APPPATH . "/views/outside/pages/{$page_center}_head.php")) {
        $this->load->view("outside/pages/{$page_center}_head");
    }
    ?>

</head>

<body>

<script>
    // Place for Google Analytics Code
</script>

<div class="header">
    <div class="container">
        <a href="<?= site_url('/yura_vashchenko_crud/') ?>" class="logo_holder">
            <?= $logo; ?>
        </a>
        <?php if ($user) { ?>
            <a href="<?= site_url('/yura_vashchenko_auth/logout') ?>" class="header_right register_btn">
                <i class="glyphicon glyphicon-log-out"></i> <span class="menu_text">Logout</span>
            </a>
        <?php } ?>
    </div>
</div>

<div class="content">
    <?php $this->load->view('outside/pages/' . $page_center); ?>
</div>

<div class="footer">
    Startup.ikiev.biz. All rights reserved.
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/files/inside/js/jquery.form.js"></script>
<script src="/files/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script>
    $('[data-toggle="tooltip"]').tooltip();
</script>

<?php
if (@file_exists(APPPATH . "/views/outside/pages/{$page_center}_footer.php")) {
    $this->load->view("outside/pages/{$page_center}_footer");
}
?>

</body>
</html>