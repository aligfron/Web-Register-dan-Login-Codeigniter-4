<?php

namespace App\Models;

use CodeIgniter\Model;

class gambarModel extends Model
{
    protected $table = 'gambar';
    protected $useTimestamps = true;
    protected $protectFields = false;
    protected $allowedField = ['id','gambar','nama'];


}
