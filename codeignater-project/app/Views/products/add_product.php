<!DOCTYPE html>
<html>
<head>
    <title>Добавление продукта</title>
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
        <h2>Добавление продукта</h2>
        
         <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
          <?php endif;?>
            
        <form method="post" id="add_create_product" name="add_create_product"
              action="<?= site_url('products/submit-form') ?>"
              enctype="multipart/form-data">

            <div class="form-group">
                <label>Название продукта</label>
                <input type="text" name="name_product" class="form-control" minlength="2" maxlength="100" required>
            </div>

            <div class="form-group">
                <label>Категория продукта</label>
                <?php if($categories): ?>
                    <select class="form-control" name="category_id" id="category_id">
                        <?php foreach($categories as $category): ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>Наличие продукта</label>
                <select class="form-control" name="check_mark_product" id="check_mark_product">
                    <option value="в наличии">в наличии</option>
                    <option value="нет в наличии">нет в наличии</option>
                </select>
            </div>

            <div class="form-group">
                <label>Цена продукта</label>
                <input type="number" name="price_product" step="0.01" class="form-control" min="0" max="999" required>
            </div>

            <div class="form-group">
                <label>Рейтинг продукта</label>
                <input type="number" min="1" max="5"name="rating_product" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Изображение товара</label>
                <input type="file" name="file" accept="image/png, image/jpeg" class="form-control" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block mt-2">Добавить продукт</button>
            </div>
        </form>
        <div class="list-group col-6">
            <a href="<?php echo site_url('products/product-list') ?>" class="btn btn-secondary mb-2">К списку продуктов</a>
            <a href="<?php echo site_url('/') ?>" class="btn btn-secondary mb-2">На главную</a>
            <a href="<?php echo site_url('admin') ?>" class="btn btn-secondary mb-2">Меню редактора</a>
        </div>
    <?php else: ?>
        <?php echo '<h1>У вас нет прав для этой страницы</h1>' ?>
    <?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script>
    if ($("#add_create").length > 0) {
        $("#add_create").validate({
            rules: {
                name_product: {
                    required: true,
                    minlength: 3,
                    maxlength: 100,
                },
              
                price_product: {
                    required: true,
                    number: true,
                },
                rating_product: {
                    required: true,
                    number: true,
                },
                img_product: {
                    required: true,
                },
            },
            messages: {
                name_product: {
                    required: "Введите имя",
                    minlength: "Не менее 2 символов",
                    maxlength:"Не более 100 символов"
                },
             
                price_product: {
                    required: "Введите цену продукта",
                },
                rating_product: {
                    required: "Введите рейтинг продукта",
                    number: "Введите рейтинг продукта от 1 до 5",
                },
                img_product: {
                    required: "Введите рейтинг продукта",
                },
            },
        })
    }
</script>
</body>
</html>
