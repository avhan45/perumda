<?php

namespace App\Controllers;

use App\Models\Blok;
use App\Models\Pasar;
use App\Models\Pedagang;
use App\Models\Sertifikat;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\Worksheet\Validations;


class Home extends BaseController
{
    public function index()
    {
        $pasar = new Pasar();
        $pedagang = new Pedagang();
        $sertifikat = new Sertifikat();
        $blok = new Blok();
        $data['jml_pasar'] = $pasar->getCount();
        $data['jml_pedagang'] = $pedagang->getCount();
        $data['jml_sertifikat'] = $sertifikat->getCount();
        $data['jml_blok'] = $blok->getCount();
        $data['menu'] = "dashboard";

        return view('dashboard', $data);
    }

    public function login()
    {
        $session = session();
        if ($session->username) {
            if ($session->level === 'admin') {
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/user');
            }
        }
        return view('login');
    }

    public function user()
    {
        echo "Ini Akses User";
    }

    public function proses_login()
    {
        // Mengambil Inputan dari form login
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (!$validation->run([
            'username' => $username,
            'password' => $password
        ])) {
            // Jika Validasi gagal 
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        //    Lakukan Proses Autentikasi
        $userModel = new User();
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            // Jika User ditemukan maka verifikasi password
            if ($password === $user['password']) {
                // Autentikasi suk'ses, simpan data ke session
                $session = session();
                $session->set('user_id', $user['id_user']);
                $session->set('username', $user['username']);
                $session->set('level', $user['level']);
                // Arahkan pengguna ke halama Beranda
                if ($session->level === 'admin') {
                    return redirect()->to('dashboard');
                } else {
                    return redirect()->to('user');
                }
            }
        }

        // Jika Autentikasi gagal, arahkan kembali ke halaman login
        return redirect()->back()->withInput()->with('error', 'Username atau Password Salah');
    }

    public function logout()
    {
        // Haous data Pengguna dari sesion
        session()->destroy();
        // Redirect ke halaman login setelah logout
        return redirect()->to('login');
    }
}
