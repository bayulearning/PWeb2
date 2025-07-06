<?php namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $title = 'Daftar User';
        $model = new UserModel();
        $users = $model->findAll();
        return view('user/index', ['users' => $users, 'title' => $title]);
    }

    public function login()
    {
        helper(['form']);

        // Ambil data dari form
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validasi form
        if (!$email || !$password) {
            return view('user/login', [
                'validation' => \Config\Services::validation(),
            ]);
        }

        // Inisialisasi session
        $session = session();
        $model = new UserModel();
        $login = $model->where('useremail', $email)->first();

        // Cek apakah user ditemukan
        if ($login) {
            $pass = $login['userpassword'];

            // Verifikasi password
            if (password_verify($password, $pass)) {
                // Data session jika login berhasil
                $login_data = [
                    'user_id' => $login['id'],
                    'user_name' => $login['username'],
                    'user_email' => $login['useremail'],
                    'logged_in' => TRUE,
                ];
                $session->set($login_data);

                // Redirect ke halaman admin/artikel
                return redirect()->to('/admin/artikel');
            } else {
                $session->setFlashdata("flash_msg", "Password salah.");
                return redirect()->to('/user/login');
            }
        } else {
            $session->setFlashdata("flash_msg", "Email tidak terdaftar.");
            return redirect()->to('/user/login');
        }
    }

    public function logout()
    {
        // Hapus session dan redirect ke halaman login
        session()->destroy();
        return redirect()->to('/user/login');
    }
}
