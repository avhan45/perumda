<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Laporan;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use TCPDF;

class LaporanController extends BaseController
{

  public function index()
  {
    $data['menu'] = "laporan";
    return view('laporan/index', $data);
  }

  public function laporanXl()
  {
    // Mengambil data pedagang dari database
    $model = new Laporan();
    $data['pedagang'] = $model->getAllData();
    // Membuat objek Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Menambahkan judul
    $sheet->setCellValue('A1', 'LAPORAN DATA PEDAGANG');
    $sheet->mergeCells('A1:H1');
    $sheet->getStyle('A1')->getFont()->setSize(16)->setBold(true);
    $sheet->getStyle('A1:H1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('A1:H1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

    $sheet->getRowDimension('1')->setRowHeight(30);

    // style
    $sheet->getStyle('A2:H2')->getFont()->setSize(12)->setBold(true);
    $sheet->getStyle('A2:H2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('A2:H2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

    // Menampilkan data pedagang dalam tabel
    $sheet->setCellValue('A2', 'NO');
    $sheet->setCellValue('B2', 'NAMA PEDAGANG');
    $sheet->setCellValue('C2', 'BLOK/NO');
    $sheet->setCellValue('D2', 'UKURAN');
    $sheet->setCellValue('E2', 'KLASIFIKASI');
    $sheet->setCellValue('F2', 'NO. SERI');
    $sheet->setCellValue('G2', 'JENIS USAHA');
    $sheet->setCellValue('H2', 'KETERANGAN');

    $row = 3;
    $no = 1;
    foreach ($data['pedagang'] as $rowdata) {
      $sheet->setCellValue('A' . $row, $no++);
      $sheet->setCellValue('B' . $row, $rowdata->nama_pedagang);
      $sheet->setCellValue('C' . $row, $rowdata->blok);
      $sheet->setCellValue('D' . $row, $rowdata->ukuran);
      $sheet->setCellValue('E' . $row, $rowdata->klasifikasi);
      $sheet->setCellValue('F' . $row, $rowdata->no_pasar . ' BLOK ' . $rowdata->blok . '  ' . $rowdata->no_blok . '  ' . $rowdata->sertifikat);
      $sheet->setCellValue('G' . $row, $rowdata->jenis_usaha);
      $sheet->setCellValue('H' . $row, $rowdata->keterangan);
      $row++;
    }

    // Menyesuaikan panjang cell berdasarkan isi data
    foreach (range('B', 'H') as $column) {
      $sheet->getColumnDimension($column)->setAutoSize(true);
    }

    // Membuat teks di tengah cell
    $sheet->getStyle('A2:H' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('A2:H' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

    // Menambahkan garis pada tabel
    $sheet->getStyle('A2:H' . $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);


    // Mengeksport ke format Excel
    $writer = new Xlsx($spreadsheet);
    $filename = 'laporan_pedagang.xlsx';
    $writer->save($filename);

    // Mengirim file Excel sebagai respons download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit;
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
                        <td style="text-align:center">' . $row->no_pasar . ' BLOK ' . $row->blok . ' ' . $row->no_blok . '  ' . $row->sertifikat . '</td>
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
