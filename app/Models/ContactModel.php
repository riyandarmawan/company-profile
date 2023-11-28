<?php

namespace App\Models;

use CodeIgniter\Model;

class contactModel extends Model
{
    protected $table  = 'contact';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'email', 'telepon', 'pesan'];
}