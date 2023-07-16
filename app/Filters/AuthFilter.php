<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Pengecekan status login pengguna
        if (!session()->has('id_user')) {
            return redirect()->to('/login');
        }

        // Pengecekan level User
        $userLevel = session()->get('level');
        if ($arguments !== null && !in_array($userLevel, $arguments)) {
            // Jika level pengguna tidak sesuai, arahkan sesuai levelnya
            switch ($userLevel) {
                case 'admin':
                    return redirect()->to('dashboard');
                    break;
                case 'user':
                    return redirect()->to('user');
                    break;
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu melakukan aksi setelah rute dieksekusi

    }
}
