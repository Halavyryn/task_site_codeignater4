<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class SigninController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('signin');
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getPostGet('email');
        $password = $this->request->getPostGet('password');

        $data = $userModel->where('email', $email)->first();

        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/');

            }else{
                $session->setFlashdata('msg', 'Неверный пароль');
                return redirect()->to('/signin');
            }
        }else{
            $session->setFlashdata('msg', 'Email не найден');
            return redirect()->to('/signin');
        }
    }
}