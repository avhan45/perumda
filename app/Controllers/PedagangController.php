<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Klasifikasi;
use App\Models\Pasar;
use App\Models\Pedagang;

class PedagangController extends BaseController
{
    public function index()
    {
        $model = new Pedagang();
        $data['pedagang'] = $model->findAll();

        return view('pedagang/index', $data);
    }

    public function create()
    {
        $pasar = new Pasar();
        $klasifikasi = new Klasifikasi();
        $data['pasar'] = $pasar->findAll();
        $data['klasifikasi'] = $klasifikasi->findAll();
        return view('pedagang/create', $data);
    }

    public function store()
    {
        $model = new Pedagang();
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            // Menghasilkan nama unik untuk file
            $namaFoto = $foto->getRandomName();

            // Memindahkan file ke folder upload
            $foto->move(WRITEPATH . 'public/uploads', $namaFoto);
            // Menyimpan nama file ke dalam database
        }

        $data = [
            'id_pasar' => $this->request->getPost('id_pasar'),
            'id_klasifikasi' => $this->request->getPost('id_klasifikasi'),
            'foto' => $namaFoto,
            'nama_pedagang' => $this->request->getPost('nama_pedagang'),
            'jk' => $this->request->getPost('jk'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'jenis_usaha' => $this->request->getPost('jenis_usaha')
        ];

        $model->insert($data);

        return redirect()->to('/pedagang');
    }

    public function edit($id)
    {
        $model = new Pedagang();
        $data['pedagang'] = $model->find($id);

        return view('pedagang/edit', $data);
    }

    public function update($id)
    {
        $model = new Pedagang();

        $data = [
            'id_pasar' => $this->request->getPost('id_pasar'),
            'id_klasifikasi' => $this->request->getPost('id_klasifikasi'),
            'foto' => $this->request->getPost('foto'),
            'nama_pedagang' => $this->request->getPost('nama_pedagang'),
            'jk' => $this->request->getPost('jk'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'jenis_usaha' => $this->request->getPost('jenis_usaha')
        ];

        $model->update($id, $data);

        return redirect()->to('/pedagang');
    }

    public function delete($id)
    {
        $model = new Pedagang();
        $model->delete($id);

        return redirect()->to('/pedagang');
    }
}
