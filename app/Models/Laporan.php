<?php

namespace App\Models;

use CodeIgniter\Model;

class Laporan extends Model
{
    public function getAllData()
    {
        return $this->db->table('Pedagang')
            ->join('Pasar', 'Pasar.id_pasar=Pedagang.id_pasar')
            ->join('Klasifikasi', 'Klasifikasi.id_klasifikasi=Pedagang.id_klasifikasi')
            ->join('Sertifikat', 'Sertifikat.id_pedagang=Pedagang.id_pedagang')
            ->join('Blok', 'Blok.id_blok=Sertifikat.id_blok')
            ->get()
            ->getResult();
    }
}
