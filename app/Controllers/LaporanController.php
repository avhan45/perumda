<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Laporan;
use App\Models\Pedagang;
use TCPDF;

class LaporanController extends BaseController
{

    public function index()
    {
        $data['menu'] = "laporan";
        return view('laporan/index', $data);
    }

    public function laporanPDF()
    {
        // Mengambil data pedagang dari database
        $model = new Laporan();
        $data['pedagang'] = $model->getAllData();

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT);
        $pdf->SetTitle('Laporan_Data_Pedagang');
        $pdf->AddPage();

        // $pdf->writeHTML("Hello World");
        // Add your report data here
        $html = '<h1 style="text-align:center">LAPORAN DATA PEDAGANG</h1>';
        $html .= '<table border="1">
                   <thead>
                     <tr>
                       <th style="text-align:center; font-weight:bold">Nama Pedagang</th>
                       <th style="text-align:center; font-weight:bold">Blok/No</th>
                       <th style="text-align:center; font-weight:bold">Ukuran</th>
                       <th style="text-align:center; font-weight:bold">Klasifikasi</th>
                       <th style="text-align:center; font-weight:bold">No Seri</th>
                       <th style="text-align:center; font-weight:bold">Jenis Usaha</th>
                       <th style="text-align:center; font-weight:bold">Keterangan</th>
                     </tr>
                   </thead>
                   <tbody>';
        foreach ($data['pedagang'] as $row) {
            $html .= '<tr>
                        <td style="text-align:center">' . $row->nama_pedagang . '</td>
                        <td style="text-align:center">Blok ' . $row->blok . ' No. ' . $row->no_blok . '</td>
                        <td style="text-align:center">' . $row->ukuran . ' </td>
                        <td style="text-align:center">' . $row->klasifikasi . '</td>
                        <td style="text-align:center">' . $row->no_pasar . ' BLOK ' . $row->blok . ' ' . $row->no_blok . ' ' . $row->sertifikat . '</td>
                        <td style="text-align:center">' . $row->jenis_usaha . '</td>
                        <td style="text-align:center">' . $row->keterangan . '</td>
                      </tr>';
        }
        $html .= '</tbody></table>';

        $pdf->writeHTML($html);

        $this->response->setContentType('application/pdf');

        $pdf->Output('Laporan.pdf', 'I');
    }
}
