<?php
namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id_product';

    protected $allowedFields = ['name_product', 'category_id', 'img_product', 'check_mark_product', 'price_product', 'rating_product', 'file'];
}
