<!DOCTYPE html>
<html>
<head>
    <title>Редактирование продукта</title>
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
        <h2>Редактирование продукта</h2>
      
         <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
        <?php endif;?>
            
        <form method="post" id="update_product" name="update_product"
              action="<?= base_url('products/update') ?>"
              enctype="multipart/form-data">

             <input type="hidden" name="id_product" id="id_product" value="<?php echo $product_obj['id_product']; ?>">


            <div class="form-group">
                <label>Название продукта</label>
                <input type="text" name="name_product" class="form-control" value="<?php echo $product_obj['name_product']; ?>"  minlength="2" maxlength ="100" required>
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
                    <option value="в наличии" <?= ($product_obj['check_mark_product'] === 'в наличии') ? 'selected': '' ?> >в наличии</option>
                    <option value="нет в наличии" <?= ($product_obj['check_mark_product']  === 'нет в наличии') ? 'selected': '' ?> >нет в наличии</option>
                </select>
            </div>

            <div class="form-group">
                <label>Цена продукта</label>
                <input type="number" name="price_product" step="0.01" class="form-control" value="<?php echo $product_obj['price_product']; ?>" required>
            </div>

            <div class="form-group">
                <label>Рейтинг продукта</label>
                <input type="number" min="1" max="5" name="rating_product" class="form-control" value="<?php echo $product_obj['rating_product']; ?>" required>
            </div>

          <div class="form-group">
                <label for="text" >Изображение товара</label>
                <input type="text" name="file" value="<?php echo $product_obj['file']; ?>" class="form-control">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-danger btn-block">Сохранить изменения</button>
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
    if ($("#update_product").length > 0) {
        $("#update_product").validate({
            rules: {
                name_product: {
                    required: true,
                    minlength: 2,
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
              
            },
            messages: {
                name_product: {
                    required: "Введите правильное имя",
                    minlength: "Поле должно содержать минимум 2 символа",
                    minlength: "Поле должно содержать максимум 100 символа",
                    
                },
              
                price_product: {
                    required: "Введите цену продукта",
                },
                
                rating_product: {
                    required: "Введите рейтинг продукта",
                    number: "Введите значение от 1 до 5",
                },
            },
        })
    }
</script>
</body>
</html>
