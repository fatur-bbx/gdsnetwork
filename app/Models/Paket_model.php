<?php

namespace App\Models;

use CodeIgniter\Model;

class Paket_model extends Model {
    protected $table      = 'paket';
    protected $primaryKey = 'id_paket';
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;
 
    protected $allowedFields = ['id_paket','nama_paket'];

    protected $validationRules    = [
        'id_paket'     => 'required|numeric',
        'nama_paket'        => 'required|min_length[3]',
    ];

    protected $validationMessages = [
        'id_paket'        => [
            'required' => 'Pelanggan harus dipilih!',
            'numeric' => 'Hanya bisa diisi dengan angka!'
        ],
        'laporan'        => [
            'required' => 'Laporan harus diisi!',
            'min_length[3]' => 'Minimal 3 Karakter!'
        ]
    ];

    protected $skipValidation  = false;
}