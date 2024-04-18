<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Список категорий</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){

            $('#category').change(function(){
                let parent_id = $('#category').val();
                let selectedText = $('option:selected').text();
                if(parent_id !== ''){
                    $.ajax({
                        url:"<?= base_url('category/getsubcategories'); ?>",
                        method:"POST",
                        data:{ parent_id: parent_id },
                        success:function(subcategories) {
                            if( $('.table').find('.t_res').length>0){
                                $('.table').find('.t_res').empty();
                            }
                            subcategories.forEach((subcategory) => {
                                    $('.table').find('.t_res').append(`
                                        <tr>
                                          <td>${subcategory['id']}</td>
                                          <td>${subcategory['name']}</td>
                                          <td>${subcategory['description']}</td>
                                          <td>${selectedText }</td>
                                          <td>
                                            <a href="<?= base_url('categories/edit-view/')?>${subcategory['id']}"  class="btn btn-primary btn-sm">Редактировать</a>
                                            <a href="<?= base_url('categories/delete/')?>${subcategory['id']}"  class="btn btn-danger btn-sm">Удалить</a>
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
        <h2>Список категорий</h2>
        <div class="list-group col-3">
            <a href="<?php echo base_url('/') ?>" class="btn btn-success mb-2">На главную</a>
            <a href="<?php echo base_url('admin') ?>" class="btn btn-success mb-2">Меню редактора</a>
        </div>
        <div class="d-flex justify-content-end">
            <a href="<?php echo base_url('categories/category-form') ?>" class="btn btn-warning mb-2">Добавить категорию</a>
        </div>
        <div class="mt-3">
            <div>
                <label>Родительская категория:</label>
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
                    <th>Название категории</th>
                    <th>Описание категории</th>
                    <th>Родитель категории</th>
                </tr>
                </thead>
                <tbody class="t_res">
                    <?php if($categories): ?>
                        <?php if($subcategories): ?>
                            <?php foreach($categories as $category): ?>
                                <tr>
                                    <td><?php echo $category['id']; ?></td>
                                    <td><?php echo $category['name']; ?></td>
                                    <td><?php echo $category['description']; ?></td>

                                    <td>
                                        <?php foreach($subcategories as $subcategory): ?>
                                            <?php if( $category['parent_id'] === $subcategory['id']): ?>
                                                <?php echo $subcategory['name']; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>

                                    <td>
                                        <a href="<?php echo base_url('categories/edit-view/'.$category['id']);?>" class="btn btn-primary btn-sm">Редактировать</a>
                                        <a href="<?php echo base_url('categories/delete/'.$category['id']);?>" class="btn btn-danger btn-sm">Удалить</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
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
