<?php

namespace App\Models;

use CodeIgniter\Model;

class Pedagang extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Pedagang';
    protected $primaryKey       = 'id_pedagang';
    protected $useAutoIncrement = true;

    protected $allowedFields    = ['id_pasar', 'id_klasifikasi', 'foto', 'nama_pedagang', 'jk', 'agama', 'no_hp', 'alamat', 'jenis_usaha'];

    public function getCount()
    {
        return $this->countAll();
    }
    public function getPasar()
    {
        return $this->db->table('Pedagang')
            ->join('Pasar', 'Pasar.id_pasar = Pedagang.id_pasar')
            ->get()
            ->getResult();
    }

    public function getByIdPasar($id)
    {
        return $this->join('Pasar', 'Pedagang.id_pasar = Pasar.id_pasar')
            ->where('Pedagang.id_pasar', $id)
            ->first();
    }
    public function getByIdKlasifikasi($id)
    {
        return $this->join('Klasifikasi', 'Pedagang.id_klasifikasi=Klasifikasi.id_klasifikasi')
            ->where('Pedagang.id_klasifikasi', $id)
            ->first();
    }
}
