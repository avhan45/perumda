<?php

namespace App\Models;

use CodeIgniter\Model;

class Sertifikat extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Sertifikat';
    protected $primaryKey       = 'id_sertifikat';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_pedagang', 'id_blok', 'sertifikat', 'keterangan'];

    public function getPedagang()
    {
        return $this->db->table('Sertifikat')
            ->join('Pedagang', 'Pedagang.id_pedagang=Sertifikat.id_pedagang')
            ->join('Blok', 'Blok.id_blok=Sertifikat.id_blok')
            ->get()
            ->getResult();
    }

    public function getPedagangById($id)
    {
        return $this->join('Pedagang', 'Pedagang.id_pedagang=Sertifikat.id_pedagang')
            ->where('Sertifikat.id_pedagang', $id)
            ->first();
    }

    public function getBlokById($id)
    {
        return $this->join('Blok', 'Blok.id_blok=Sertifikat.id_blok')
            ->where('Sertifikat.id_blok', $id)
            ->first();
    }
}
