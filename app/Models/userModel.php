<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $protectFields = false;
    protected $allowedField = ['id','username','nama','gambar'];


}
