<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Klasifikasi;
use App\Models\Pasar;
use App\Models\Pedagang;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

    public function export()
    {
        // Mengambil data pedagang dari database
        $model = new Pedagang();
        $data['pedagang'] = $model->findAll();
        // Membuat objek Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan judul
        $sheet->setCellValue('A1', 'LAPORAN DATA PEDAGANG');
        $sheet->mergeCells('A1:J1');
        $sheet->getStyle('A1')->getFont()->setSize(16)->setBold(true);
        $sheet->getStyle('A1:J1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:J1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $sheet->getRowDimension('1')->setRowHeight(30);

        // style
        $sheet->getStyle('A2:J2')->getFont()->setSize(12)->setBold(true);
        $sheet->getStyle('A2:J2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2:J2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        // Menampilkan data pedagang dalam tabel
        $sheet->setCellValue('A2', 'NO');
        $sheet->setCellValue('B2', 'ID_PASAR');
        $sheet->setCellValue('C2', 'ID_KLASIFIKASI');
        $sheet->setCellValue('D2', 'FOTO');
        $sheet->setCellValue('E2', 'NAMA PEDAGANG');
        $sheet->setCellValue('F2', 'JK');
        $sheet->setCellValue('G2', 'AGAMA');
        $sheet->setCellValue('H2', 'NO_HP');
        $sheet->setCellValue('I2', 'ALAMAT');
        $sheet->setCellValue('J2', 'JENIS USAHA');

        $row = 3;
        $no = 1;
        foreach ($data['pedagang'] as $rowdata) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $rowdata['id_pasar']);
            $sheet->setCellValue('C' . $row, $rowdata['id_klasifikasi']);
            $sheet->setCellValue('D' . $row, $rowdata['foto']);
            $sheet->setCellValue('E' . $row, $rowdata['nama_pedagang']);
            $sheet->setCellValue('F' . $row, $rowdata['jk']);
            $sheet->setCellValue('G' . $row, $rowdata['agama']);
            $sheet->setCellValue('H' . $row, $rowdata['no_hp']);
            $sheet->setCellValue('I' . $row, $rowdata['alamat']);
            $sheet->setCellValue('J' . $row, $rowdata['jenis_usaha']);
            $row++;
        }

        // Menyesuaikan panjang cell berdasarkan isi data
        foreach (range('B', 'J') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Membuat teks di tengah cell
        $sheet->getStyle('A2:J' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2:J' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        // Menambahkan garis pada tabel
        $sheet->getStyle('A2:J' . $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);


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

    public function download()
    {
        $filename = "template_laporan_pedagang.xlsx";
        return $filename;
    }
}
