<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Blok;

class BlokController extends BaseController
{
    public function index()
    {
        $model = new Blok();
        $data['blok'] = $model->findAll();

        return view('blok/index', $data);
    }

    public function create()
    {
        return view('blok/create');
    }

    public function store()
    {
        helper('form');

        $model = new Blok();

        $data = [
            'no_blok' => $this->request->getVar('no_blok'),
            'blok' => $this->request->getVar('blok'),
            'ukuran' => $this->request->getVar('ukuran')
        ];

        $model->insert($data);

        return redirect()->to('/blok');
    }

    public function edit($id_blok)
    {
        $model = new Blok();
        $data['blok'] = $model->find($id_blok);

        return view('blok/edit', $data);
    }

    public function update()
    {
        helper('form');

        $model = new Blok();

        $id_blok = $this->request->getVar('id_blok');

        $data = [
            'no_blok' => $this->request->getVar('no_blok'),
            'blok' => $this->request->getVar('blok'),
            'ukuran' => $this->request->getVar('ukuran')
        ];

        $model->update($id_blok, $data);

        return redirect()->to('/blok');
    }

    public function delete($id_blok)
    {
        $model = new Blok();
        $model->delete($id_blok);

        return redirect()->to('/blok');
    }
}
