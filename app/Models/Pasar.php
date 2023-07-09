<?php

namespace App\Models;

use CodeIgniter\Model;

class Pasar extends Model
{
    protected $table            = 'Pasar';
    protected $primaryKey       = 'id_pasar';
    protected $allowedFields    = ['no_pasar', 'nama_pasar', 'alamat'];
}
