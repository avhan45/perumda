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
        $klasifikasi = new Klasifikasi();
        $pasar = new Pasar();
        $data['pedagang'] = $model->getPasar();
        $data['pasar'] = $pasar->findAll();
        $data['klasifikasi'] = $klasifikasi->findAll();
        $data['menu'] = "pedagang";

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
            $namaFoto = $foto->getName();
            // $filepath = WRITEPATH . 'uploads/' . $foto->store();
            // Memindahkan file ke folder upload
            $foto->move(ROOTPATH . 'public/uploads', $namaFoto, true);
            // Menyimpan nama file ke dalam database
        }

        $data = [
            'id_pasar' => $this->request->getPost('id_pasar'),
            'id_klasifikasi' => $this->request->getPost('id_klasifikasi'),
            'foto' => $namaFoto,
            'nama_pedagang' => $this->request->getPost('nama_pedagang'),
            'jk' => $this->request->getPost('jk'),
            'agama' => $this->request->getPost('agama'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'jenis_usaha' => $this->request->getPost('jenis_usaha')
        ];

        $model->insert($data);

        return redirect()->to('/pedagang');
    }

    public function edit($id)
    {

        $pedagangModel = new Pedagang();
        $pasarModel = new Pasar();
        $klasfikasiModel = new Klasifikasi();
        $data['pedagang'] = $pedagangModel->find($id);
        $id_pasar = $data['pedagang']['id_pasar'];
        $id_klasifikasi = $data['pedagang']['id_klasifikasi'];
        $data['pedagang'] = $pedagangModel->getByIdPasar($id_pasar);
        $data['nm_klasifikasi'] = $pedagangModel->getByIdKlasifikasi($id_klasifikasi);
        $data['pasar'] = $pasarModel->findAll();
        $data['klasifikasi'] = $klasfikasiModel->findAll();
        $data['menu'] = "pedagang";


        // dd($data['nm_klasifikasi']);
        return view('pedagang/edit', $data);
    }

    public function update($id)
    {
        $model = new Pedagang();
        $pedagang = $model->find($id);
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            // Menghapus FOto Lama Jika ada 
            if ($model->foto == NULL) {
                unlink(ROOTPATH . 'public/uploads/' . $pedagang['foto']);
            }
            $namaFoto = $foto->getName();
            //     // Memindahkan file ke folder upload
            $foto->move(ROOTPATH . 'public/uploads', $namaFoto);
            $data = [
                'id_pasar' => $this->request->getPost('id_pasar'),
                'id_klasifikasi' => $this->request->getPost('id_klasifikasi'),
                'foto' => $namaFoto,
                'nama_pedagang' => $this->request->getPost('nama_pedagang'),
                'jk' => $this->request->getPost('jk'),
                'agama' => $this->request->getPost('agama'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
                'jenis_usaha' => $this->request->getPost('jenis_usaha')
            ];
        } else {
            $ft = $pedagang['foto'];
            $data = [
                'id_pasar' => $this->request->getPost('id_pasar'),
                'id_klasifikasi' => $this->request->getPost('id_klasifikasi'),
                'foto' => $ft,
                'nama_pedagang' => $this->request->getPost('nama_pedagang'),
                'jk' => $this->request->getPost('jk'),
                'agama' => $this->request->getPost('agama'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
                'jenis_usaha' => $this->request->getPost('jenis_usaha')
            ];
        }
        $model->update($id, $data);
        return redirect()->to('/pedagang');
    }

    public function delete($id)
    {
        $model = new Pedagang();
        $pedagang = $model->find($id);

        // Menghapus foto jika ada 
        if ($pedagang['foto'] != null) {
            unlink(ROOTPATH . 'public/uploads/' . $pedagang['foto']);
        }
        $model->delete($id);

        return redirect()->to('/pedagang');
    }
}
