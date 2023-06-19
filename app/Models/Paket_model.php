<?php

namespace App\Models;

use CodeIgniter\Model;

class Paket_model extends Model {
    protected $uuidFields = ['id_paket'];
    protected $table      = 'paket';
    protected $primaryKey = 'id_paket';
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;
 
    protected $allowedFields = ['id_paket','nama_paket'];

    protected $validationRules    = [
        'nama_paket'        => 'required|min_length[3]',
    ];

    protected $validationMessages = [
        'laporan'        => [
            'required' => 'Laporan harus diisi!',
            'min_length[3]' => 'Minimal 3 Karakter!'
        ]
    ];

    protected $skipValidation  = false;
}