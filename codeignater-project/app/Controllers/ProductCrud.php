<?php
namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;

class ProductCrud extends Controller
{
    use ResponseTrait;

    // show categories list
    public function index(){
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();

        $data['products'] = $productModel->orderBy('id_product', 'DESC')->findAll();
        $data['categories'] = $categoryModel->orderBy('id', 'DESC')->findAll();
        return view('products/product_view', $data);
    }

    // add category form
    public function create(){
        $categoryModel = new CategoryModel();
        $data['categories'] =  $categoryModel -> orderBy('id', 'ASC')->findAll();
        return view('products/add_product', $data);
    }

    // insert data
     public function store() {
         
      
        helper(['form', 'url']);

        $rules = [
            'name_product'          => 'required|min_length[2]|max_length[150]',
            'price_product'         => 'required|min_length[1]|max_length[5]|',
            'rating_product'        => 'required|min_length[1]|max_length[2]',
        ];

        //IMG START
        $input = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/png]',
                'max_size[file,1024]',
            ]
        ]);

        if (!$input) {
            print_r('Выберите действительный файл');
        } else {
            $file = $this->request->getFile('file');
            $file->move(FCPATH. 'uploads');
        }
        //IMG END

        if(($this->validate($rules))&&($input)){
            $productModel = new ProductModel();
            $data = [
                'category_id' => $this->request->getPost('category_id'),
                'name_product' => htmlspecialchars($this->request->getPost('name_product')),
                'check_mark_product' => $this->request->getPost('check_mark_product'),
                'price_product' => htmlspecialchars($this->request->getPost('price_product')),
                'rating_product' => htmlspecialchars($this->request->getPost('rating_product')),
                 'file' => $file->getName(),
            ];
            $save = $productModel->insert($data);
            if($save){
                print_r('Data insert');
            }else{
                print_r('Data not insert');
            }
            return $this->response->redirect(base_url('products/product-list'));
        }else{
            $data['validation'] = $this->validator;
            return $this->response->redirect(base_url('products/product-list'));
        }  
    }


    // show single category
    public function singleUser($id_product = null){
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();
        $data['product_obj'] = $productModel -> where('id_product', $id_product)->first();
        $data['categories'] =  $categoryModel -> orderBy('id', 'ASC')->findAll();
        return view('products/edit_view_product', $data);
    }

    // delete category
    public function delete($id_product = null){
        $productModel = new ProductModel();
        $productModel->where('id_product', $id_product)->delete($id_product);
        return $this->response->redirect(base_url('products/product-list'));
    }

    // update product data
    public function update(){
        
        $productModel = new ProductModel();
        $id_product = $this->request->getPost('id_product');
        
        helper(['form']);
        $rules = [
            'name_product'          => 'required',
            'price_product'         => 'required',
            'rating_product'        => 'required',
        ];

        if($this->validate($rules)) {
            $data = [
                'name_product' => $this->request->getPost('name_product'),
                'category_id' => $this->request->getPost('category_id'),
                'check_mark_product' => $this->request->getPost('check_mark_product'),
                'price_product' => $this->request->getPost('price_product'),
                'rating_product' => $this->request->getPost('rating_product'),
                'file'  => $this->request->getPost('file'),
            ];

            $save = $productModel->update($id_product, $data);
            if ($save) {
                print_r('Data update');
            } else {
                print_r('Data not update');
            }
            return $this->response->redirect(site_url('products/product-list'));

        }else{
            echo 'Ошибки валидации';
        }
    }

    function upload() {
        helper(['form', 'url']);

        $database = \Config\Database::connect();
        $db = $database->table('images');

        $input = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/png]',
                'max_size[file,1024]',
            ]
        ]);

        if (!$input) {
            print_r('Choose a valid file');
        } else {
            $img = $this->request->getFile('file');
            $img->move(WRITEPATH . 'uploads');

            $data = [
                'name_images' =>  $img->getName(),
                'type_images'  => $img->getClientMimeType(),
            ];

            $save = $db->insert($data);
            print_r('File has successfully uploaded');
        }
    }

    public function getProducts()
    {
        $productModel = new ProductModel();
        $products = $productModel->where('category_id', $this->request->getPost('category_id'))->findAll();
        return $this->respond($products);
    }

}
