<?php

namespace App\Models;

use CodeIgniter\Model;

class emailModel extends Model
{
    protected $table = 'auth_identities';
    protected $useTimestamps = true;
    protected $protectFields = false;
    protected $allowedField = ['id','user_id','type','name','secret'];


}
