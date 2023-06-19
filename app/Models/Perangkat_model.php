<?php

namespace App\Models;

use CodeIgniter\Model;

class Perangkat_model extends Model {
    protected $table      = 'perangkat';
    protected $primaryKey = 'id_perangkat';
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;
 
    protected $allowedFields = ['nama_perangkat','tipe_perangkat','gambar'];

    protected $validationRules    = [
        'nama_perangkat'     => 'required|min_length[3]',
        'tipe_perangkat'        => 'required|min_length[3]',
        'gambar'        => 'required',
    ];

    protected $validationMessages = [
        'nama_perangkat'        => [
            'required' => 'Nama perangkat harus diisi!',
            'min_length' => 'Minimal 3 Karakter'
        ],
        'tipe_perangkat'        => [
            'required' => 'Tipe perangkat harus diisi!',
            'min_length' => 'Minimal 3 Karakter'
        ],
        'gambar'        => [
            'required' => 'Gambar harus dipilih!'
        ]
    ];

    protected $skipValidation  = false;
}