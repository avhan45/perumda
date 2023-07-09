<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pasar;

class PasarController extends BaseController
{
    public function index()
    {
        $model = new Pasar();
        $data['pasar'] = $model->findAll();
        return view('pasar/index', $data);
    }

    public function create()
    {
        return view('pasar/create');
    }

    public function store()
    {
        $model = new Pasar();

        $data = [
            'no_pasar' => $this->request->getPost('no_pasar'),
            'nama_pasar' => $this->request->getPost('nama_pasar'),
            'alamat' => $this->request->getPost('alamat')
        ];

        $model->insert($data);

        return redirect()->to('/pasar');
    }

    public function edit($no_pasar)
    {
        $model = new Pasar();
        $data['pasar'] = $model->find($no_pasar);

        return view('pasar/edit', $data);
    }

    public function update()
    {
        $model = new Pasar();

        $no_pasar = $this->request->getPost('no_pasar');

        $data = [
            'no_pasar' => $this->request->getPost('no_pasar'),
            'nama_pasar' => $this->request->getPost('nama_pasar'),
            'alamat' => $this->request->getPost('alamat')
        ];

        $model->update($no_pasar, $data);

        return redirect()->to('/pasar');
    }

    public function delete($no_pasar)
    {
        $model = new Pasar();
        $model->delete($no_pasar);

        return redirect()->to('/pasar');
    }
}
