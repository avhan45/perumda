<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Blok;
use App\Models\Pedagang;
use App\Models\Sertifikat;

class SertifikatController extends BaseController
{
    public function index()
    {
        $sertifikatModel = new Sertifikat();
        // $sertfikat = $sertifikatModel->findAll();
        $data['sertifikat'] = $sertifikatModel->getPedagang();
        return view('sertifikat/index', $data);
    }

    public function create()
    {
        $pedagang = new Pedagang();
        $blok = new Blok();
        $data['pedagang'] = $pedagang->findAll();
        $data['blok'] = $blok->findAll();
        return view('sertifikat/create', $data);
    }

    public function store()
    {
        $sertifikatModel = new Sertifikat();

        $data = [
            'id_pedagang' => $this->request->getPost('id_pedagang'),
            'id_blok' => $this->request->getPost('id_blok'),
            'sertifikat' => $this->request->getPost('sertifikat'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $sertifikatModel->insert($data);

        return redirect()->to('/sertifikat');
    }

    public function edit($id)
    {
        $sertifikatModel = new Sertifikat();
        $pedagang = new Pedagang();
        $blok = new Blok();
        $sertifikat = $sertifikatModel->find($id);
        $id_pedagang = $sertifikat['id_pedagang'];
        $id_blok = $sertifikat['id_blok'];
        $data['pedagangs'] = $pedagang->findAll();
        $data['bloks'] = $blok->findAll();
        $data['pedagang'] = $sertifikatModel->getPedagangById($id_pedagang);
        $data['blok'] = $sertifikatModel->getBlokById($id_blok);
        return view('sertifikat/edit', $data);
    }

    public function update($id)
    {
        $sertifikatModel = new Sertifikat();
        $data = [
            'id_pedagang' => $this->request->getPost('id_pedagang'),
            'id_blok' => $this->request->getPost('id_blok'),
            'sertifikat' => $this->request->getPost('sertifikat'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $sertifikatModel->update($id, $data);

        return redirect()->to('/sertifikat');
    }

    public function delete($id)
    {
        $sertifikatModel = new Sertifikat();
        $sertifikatModel->delete($id);

        return redirect()->to('/sertifikat');
    }
}
