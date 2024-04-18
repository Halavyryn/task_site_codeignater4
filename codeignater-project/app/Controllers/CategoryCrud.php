<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use CodeIgniter\API\ResponseTrait;

class CategoryCrud extends BaseController
{
    use ResponseTrait;

    // show categories list
    public function index(){
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->orderBy('id', 'DESC')->findAll();
        $data['subcategories'] = $categoryModel->orderBy('id', 'DESC')->findAll();
        return view('categories/category_view', $data);
    }

    // add category form
    public function create(){
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->orderBy('id', 'ASC')->findAll();
        return view('categories/add_category', $data);
    }

    // insert data
    public function store() {
        helper(['form']);

        $rules = [
            'name'                => 'required|min_length[2]|max_length[100]',
            'description'         => 'required|min_length[2]|max_length[100]',
        ];

        if($this->validate($rules)){
            $categoryModel = new CategoryModel();
            $data = [
                'name' => htmlspecialchars($this->request->getPost('name')),
                'description' => htmlspecialchars($this->request->getPost('description')),
                'parent_id' => $this->request->getPost('parent_id'),
            ];
            $categoryModel->insert($data);
            return $this->response->redirect(base_url('categories/category-list'));
        }else{
            $data['validation'] = $this->validator;
            echo view('categories/category-list', $data);
        }        
    }


    // show single category
    public function singleUser($id = null){
        $categoryModel = new CategoryModel();
        $data['category_obj'] = $categoryModel->where('id', $id)->first();
        $data['categories'] = $categoryModel->orderBy('id', 'DESC')->findAll();
        return view('categories/edit_view_category', $data);
    }

    // update category data
    public function update(){
        helper(['form']);

        $rules = [
            'name'                => 'required|min_length[2]|max_length[100]',
            'description'         => 'required|min_length[2]|max_length[100]',
        ];

        if($this->validate($rules)){
            $categoryModel= new CategoryModel();
            $id = $this->request->getPost('id');
            $data = [
                'name' => htmlspecialchars($this->request->getPost('name')),
                'description' => htmlspecialchars($this->request->getPost('description')),
                'parent_id' => $this->request->getPost('parent_id'),
            ];
            $categoryModel->update($id, $data);
            return $this->response->redirect(site_url('categories/category-list'));
        }else{
            $data['validation'] = $this->validator;
            echo view('categories/category-list', $data);
        }  
    }

    // delete category
    public function delete($id = null){
        $categoryModel = new CategoryModel();
        $categoryModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('categories/category-list'));
    }

    public function getSubcategories()
    {
        $subcategoryModel = new CategoryModel();
        $subcategories = $subcategoryModel->where('parent_id', $this->request->getPost('parent_id'))->findAll();
        return $this->respond($subcategories);
    }
}
