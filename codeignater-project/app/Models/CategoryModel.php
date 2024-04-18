<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'parent_id'];

}
