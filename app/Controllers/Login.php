<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    protected $ModelLogin;
    public function __construct()
    {
        $this->ModelLogin = new ModelLogin();
    }
    public function index()
    {
        $data = [
            'judul' => 'Login',
            'validation' => \Config\Services::validation(),
        ];
        return view('v_login', $data);
    }

    public function CekLogin()
    {
        $validation = $this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} Masih Kosong!!',
                    'valid_email' => 'Email Tidak Valid',
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!!',
                ],
            ]
        ]);

        if (!$validation) {
            // Set error messages for validation issues
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Login'))->withInput();
        }

        // Retrieve input values
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Check credentials
        $CekLogin = $this->ModelLogin->CekUser($email, $password);
        if ($CekLogin) {
            session()->set('nama_user', $CekLogin['nama_user']);
            session()->set('level', $CekLogin['level']);
            return redirect()->to(base_url('Admin'));
        } else {
            session()->setFlashdata('gagal', 'Email Atau Password Salah!!!');
            return redirect()->to(base_url('Login'));
        }
    }

    public function LogOut()
    {
        session()->remove('nama_user');
        session()->remove('level');
        session()->setFlashdata('pesan', '<i class="fas fa-check-circle"></i> Anda Berhasil Logout!!!');
        return redirect()->to(base_url('Login'));
    }
}
