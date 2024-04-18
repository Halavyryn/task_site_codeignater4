<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Добавление категории</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 500px;
        }
        .error {
            display: block;
            padding-top: 5px;
            font-size: 14px;
            color: red;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <?php if(session()->get('email') !== null): ?>
        <h2>Добавление категории</h2>
        
        <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>
        
        <form method="post" id="add_create_category" name="add_create_category"
              action="<?= site_url('categories/submit-form') ?>">
            
            <div class="form-group">
                <label>Название категории</label>
                <input type="text" name="name" class="form-control" required minlength="2" maxlength="100">
            </div>

            <div class="form-group">
                <label>Описание категории</label>
                <input type="text" name="description" class="form-control" required minlength="2" maxlength="100">
            </div>

            <div class="form-group">
                <label>Родитель Категории продукта</label>
                <?php if($categories): ?>
                    <select class="form-control" name="parent_id" id="parent_id">
                        <?php foreach($categories as $category): ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Добавить категорию</button>
            </div>
        </form>
        <div class="list-group col-6">
            <a href="<?php echo site_url('categories/category-list') ?>" class="btn btn-secondary mb-2">К списку категорий</a>
            <a href="<?php echo site_url('admin') ?>" class="btn btn-secondary mb-2">Меню редактора</a>
            <a href="<?php echo site_url('/') ?>" class="btn btn-secondary mb-2">На главную</a>
        </div>
    <?php else: ?>
        <?php echo '<h1>У вас нет прав для этой страницы</h1>' ?>
    <?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script>
    if ($("#add_create_category").length > 0) {
        $("#add_create_category").validate({
           rules: {
                name: {
                    required: true,
                    minlength: 2,
                    maxlength: 100,
                },
                description: {
                    required: true,
                    minlength: 2,
                    maxlength: 100
                }
            },
            messages: {
                name: {
                    required: "Название должно быть заполнено обязательно",
                    minlength: "Длина поля должна быть не меньше 2 символов",
                    maxlength: "Длина поля должна быть не больше 100 символов",
                },
                description: {
                    required: "Описание должно быть заполнено",
                    minlength: "Длина поля должна быть не меньше 2 символов",
                    maxlength: "Длина поля должна быть не больше 100 символов",
                }
            },
        })
    }
</script>
</body>
</html>
