<?php

namespace App\Controllers;

use App\Models\Blok;
use App\Models\Pasar;
use App\Models\Pedagang;
use App\Models\Sertifikat;

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
    }
}
