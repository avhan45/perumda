<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Klasifikasi;

class KlasifikasiController extends BaseController
{
    public function index()
    {
        $model = new Klasifikasi();
        $data['klasifikasi'] = $model->findAll();
        $data['menu'] = "klasifikasi";


        return view('klasifikasi/index', $data);
    }


    public function store()
    {
        $model = new Klasifikasi();

        $data = [
            'klasifikasi' => $this->request->getPost('klasifikasi')
        ];

        $model->insert($data);

        return redirect()->to('/klasifikasi');
    }

    public function edit($id_klasifikasi)
    {
        $model = new Klasifikasi();
        $data['klasifikasi'] = $model->find($id_klasifikasi);
        $data['menu'] = "klasifikasi";


        return view('klasifikasi/edit', $data);
    }

    public function update($id_klasifikasi)
    {
        $model = new Klasifikasi();

        $data = [
            'klasifikasi' => $this->request->getPost('klasifikasi')
        ];

        $model->update($id_klasifikasi, $data);

        return redirect()->to('/klasifikasi');
    }

    public function delete($id_klasifikasi)
    {
        $model = new Klasifikasi();
        $model->delete($id_klasifikasi);

        return redirect()->to('/klasifikasi');
    }
}
