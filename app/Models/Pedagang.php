<?php

namespace App\Models;

use CodeIgniter\Model;

class Pedagang extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Pedagang';
    protected $primaryKey       = 'id_pedagang';
    protected $useAutoIncrement = true;

    protected $allowedFields    = ['id_pasar', 'id_klasifikasi', 'foto', 'nama_pedagang', 'jk', 'no_hp', 'alamat', 'jenis_usaha'];
}
