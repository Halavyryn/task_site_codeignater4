<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Панель администратора</title>
</head>
<body>
<div class="container">
    <?php if(session()->get('email') !== null): ?>
        <div class="row justify-content-md-center">
        <div class="col-12">
            <h2>Панель редактора</h2>
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif;?>

            <div class="list-group col-6">
                <a class="btn btn-success mb-2" href="<?php echo base_url('categories/category-list') ?>">Редактировать категории</a>
                <a class="btn btn-success mb-2" href="<?php echo base_url('products/product-list') ?>">Редактировать продукты</a>
                <a class="btn btn-success mb-2" href="<?php echo base_url('/') ?>">Вернуться на главную</a>
            </div>
        </div>
    </div>
    <?php else: ?>
        <?php echo '<h1>У вас нет прав для этой страницы</h1>' ?>
    <?php endif; ?>
</div>
</body>
</html>