<?php

namespace App\Models;

use CodeIgniter\Model;

class Klasifikasi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Klasifikasi';
    protected $primaryKey       = 'id_klasifikasi';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['klasifikasi'];
}
