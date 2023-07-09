<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Upload extends BaseConfig
{
    public $path = ROOTPATH . 'public/uploads/';
    public $allowedTypes = 'gif|jpg|jpeg|png';
    public $maxSize = 2048; // in kilobytes
    public $overwrite = true;
}
