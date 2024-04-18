<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return redirect()->to('/')->with('success', 'Вы успешно вошли');;
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); //Уничтожаем сессию и все что в ней было
        return redirect()->to('/')->with('success', 'Вы успешно вышли');;
    }
}