<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Список продуктов</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){

            $('#category').change(function(){
                let category_id= $('#category').val();
                let selectedText = $('option:selected').text();
                if(category_id !== ''){
                    $.ajax({
                        url:"<?= base_url('product/getproducts'); ?>",
                        method:"POST",
                        data:{ category_id: category_id },
                        success:function(products) {

                            if( $('.table').find('.t_res').length>0){
                                $('.table').find('.t_res').empty();
                            }
                            products.forEach((product) => {
                                $('.table').find('.t_res').append(`
                                        <tr>
                                          <td>${product['id_product']}</td>
                                          <td>${product['name_product']}</td>
                                          <td>${selectedText}</td>
                                          <td>
                                            <img src="<?php echo base_url('uploads/')?>${product['file']}">
                                          </td>

                                          <td>${product['check_mark_product']}</td>
                                          <td>${product['price_product']}</td>
                                          <td>${product['rating_product']}</td>
                                          <td>${product['category_id']}</td>
                                          <td>
                                            <a href="<?= base_url('products/edit-view/')?>${product['id_product']}"  class="btn btn-primary btn-sm">Редактировать</a>
                                            <a href="<?= base_url('products/delete/')?>${product['id_product']}"  class="btn btn-danger btn-sm">Удалить</a>
                                          </td>
                                        </tr>
                                      `);
                            });
                        },
                    });
                }
            });

        });

    </script>
</head>
<body>
<div class="container mt-4">
    <?php if(session()->get('email') !== null): ?>
        <h2>Список продуктов</h2>
        <div class="list-group col-3">
            <a href="<?php echo site_url('/') ?>" class="btn btn-success mb-2">На главную</a>
            <a href="<?php echo site_url('admin') ?>" class="btn btn-success mb-2">Меню редактора</a>
        </div>
        <div class="d-flex justify-content-end">
            <a href="<?php echo site_url('products/product-form') ?>" class="btn btn-warning mb-2">Добавить продукт</a>
        </div>

        <div class="mt-3">

            <div>
                <label>Фильтр по категории:</label>
                <select id="category">
                    <option value="">Выберите категорию</option>
                        <?php foreach($categories as $category): ?>
                            <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                        <?php endforeach; ?>
                </select>
            </div>

            <table class="table table-bordered" id="categories-list">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Название продукта</th>
                    <th>Категория продукта</th>
                    <th>Внешний вид</th>
                    <th>Наличие</th>
                    <th>Цена</th>
                    <th>Рейтинг</th>
                </tr>
                </thead>
                <tbody  class="t_res">
                <?php if($products): ?>
                    <?php foreach($products as $product): ?>
                        <tr>
                            <td><?php echo $product['id_product']; ?></td>
                            <td><?php echo $product['name_product']; ?></td>

                            <td>
                                    <?php foreach($categories as $category): ?>
                                        <?php if( $product['category_id'] === $category['id']): ?>
                                            <?php echo $category['name']; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                            </td>

                            <td>
                                <img src="<?php echo base_url('uploads/'.$product['file']);?>">
                            </td>
                            <td><?php echo $product['check_mark_product']; ?></td>
                            <td><?php echo $product['price_product']; ?></td>
                            <td><?php echo $product['rating_product']; ?></td>

                            <td>
                                <a href="<?php echo base_url('products/edit-view/'.$product['id_product']);?>" class="btn btn-primary btn-sm">Редактировать</a>
                                <a href="<?php echo base_url('products/delete/'.$product['id_product']);?>" class="btn btn-danger btn-sm">Удалить</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
    <?php echo '<h1>У вас нет прав для этой страницы</h1>' ?>
    <?php endif; ?>
</div>

</body>
</html>
