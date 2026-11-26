<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = [
        'nim',
        'nama',
        'email',
        'no_hp',
        'prodi',
        'angkatan',
        'ipk',
        'status_mahasiswa'
    ];
}

