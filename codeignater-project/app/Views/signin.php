<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Вход в систему</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-5">
            <h2>Войти в систему</h2>
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif;?>

            <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
                <div class="form-group mb-3">
                    <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" required minlength="4" maxlength="100">
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" placeholder="Пароль" class="form-control" required minlength="4" maxlength="50">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Вход в систему</button>
                </div>
            </form>

            <div class="list-group">
                <a class="btn btn-secondary mt-2" href="<?php echo base_url('/') ?>">Вернуться на главную</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>