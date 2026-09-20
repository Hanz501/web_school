<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('admin'));
        }

        $data = [
            'title' => 'Login Administrator - SMK Unggulan',
        ];

        return view('admin/auth/login', $data);
    }

    public function attemptLogin(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'login'    => 'required',
            'password' => 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $loginInput = $this->request->getPost('login');
        $password   = $this->request->getPost('password');

        $user = $this->userModel->findByUsernameOrEmail($loginInput);

        if (!$user || !password_verify($password, $user['password_hash'])) {
            return redirect()->back()->withInput()->with('error', 'Username/Email atau Password salah.');
        }

        // Set session
        session()->set([
            'isLoggedIn'   => true,
            'userId'       => $user['id'],
            'username'     => $user['username'],
            'email'        => $user['email'],
            'namaLengkap'  => $user['nama_lengkap'],
            'role'         => $user['role'],
        ]);

        return redirect()->to(base_url('admin'))->with('success', 'Selamat datang kembali, ' . $user['nama_lengkap'] . '!');
    }

    public function logout(): \CodeIgniter\HTTP\RedirectResponse
    {
        session()->destroy();
        return redirect()->to(base_url('admin/login'))->with('success', 'Anda telah berhasil logout dari sistem.');
    }
}
