<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pasar;
use TCPDF;

class PasarController extends BaseController
{
    public function index()
    {
        $model = new Pasar();
        $data['pasar'] = $model->findAll();
        $data['menu'] = "pasar";

        return view('pasar/index', $data);
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

    public function edit($id)
    {
        $model = new Pasar();
        $data['pasar'] = $model->find($id);
        $data['menu'] = "pasar";

        return view('pasar/edit', $data);
    }

    public function update()
    {
        $model = new Pasar();

        $id_pasar = $this->request->getPost('id_pasar');

        $data = [
            'no_pasar' => $this->request->getPost('no_pasar'),
            'nama_pasar' => $this->request->getPost('nama_pasar'),
            'alamat' => $this->request->getPost('alamat')
        ];

        $model->update($id_pasar, $data);

        return redirect()->to('/pasar');
    }

    public function delete($no_pasar)
    {
        $model = new Pasar();
        $model->delete($no_pasar);

        return redirect()->to('/pasar');
    }

    public function export()
    {
        // Mengambil data pedagang dari database
        $model = new Pasar();
        $data['pasar'] = $model->findAll();

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT);
        $pdf->SetTitle('Laporan_Data_Pasar');
        $pdf->AddPage();

        // $pdf->writeHTML("Hello World");
        // Add your report data here
        $html = '<h1 style="text-align:center">LAPORAN DATA PASAR</h1>';
        $html .= '<table border="1">
                   <thead>
                     <tr>
                       <th style="text-align:center; font-weight:bold">No Pasar</th>
                       <th style="text-align:center; font-weight:bold">Nama Pasar</th>
                       <th style="text-align:center; font-weight:bold">Alamat</th>
                     </tr>
                   </thead>
                   <tbody>';
        foreach ($data['pasar'] as $row) {
            $html .= '<tr>
                        <td style="text-align:center">' . $row['no_pasar'] . '</td>
                        <td style="text-align:center">Blok ' . $row['nama_pasar'] . '</td>
                        <td style="text-align:center">' . $row['alamat'] . ' </td>
                      </tr>';
        }
        $html .= '</tbody></table>';

        $pdf->writeHTML($html);

        $this->response->setContentType('application/pdf');

        $pdf->Output('Laporan.pdf', 'I');
    }

    public function importData()
    {
        return "Hello";
    }
}
