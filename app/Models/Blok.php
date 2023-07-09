<?php

namespace App\Models;

use CodeIgniter\Model;

class Blok extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Blok';
    protected $primaryKey       = 'id_blok';
    protected $allowedFields    = ['no_blok', 'blok', 'ukuran'];
}
