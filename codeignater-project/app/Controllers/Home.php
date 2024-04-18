<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index(): string
    {
        /*добавляем категории на главную страницу*/
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->orderBy('id', 'DESC')->findAll();
        $data['subcategories'] = $categoryModel->orderBy('id', 'DESC')->findAll();

        /*добавляем продукты на главную страницу*/
        $productModel = new ProductModel();
        $data['products'] = $productModel->orderBy('id_product', 'DESC')->findAll();


        return view('Home/index', [
            'title' => 'Главная cтраница проекта',
            'categories' => $data['categories'],
            'subcategories' => $data['subcategories'],
            'products' => $data['products'],

        ]);
    }

    public function adminPage()
    {
        return view('/admin');
    }
}
