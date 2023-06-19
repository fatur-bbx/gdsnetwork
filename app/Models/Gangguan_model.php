<?php

namespace App\Models;

use CodeIgniter\Model;

class Gangguan_model extends Model {

    protected $uuidFields = ['id_gangguan'];
    protected $table      = 'gangguan';
    protected $primaryKey = 'id_gangguan';
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;
 
    protected $allowedFields = ['id_gangguan','id_pelanggan','laporan','tanggal_open','tanggal_close','status'];

    protected $validationRules    = [
        'laporan'        => 'required|min_length[3]',
        'tanggal_open'     => 'required|valid_date',
        'status'        => 'required',
    ];

    protected $validationMessages = [
        'laporan'        => [
            'required' => 'Laporan harus diisi!',
            'min_length[3]' => 'Minimal 3 Karakter!'
        ],
        'tanggal_open'        => [
            'required' => 'Tanggal harus dipilih!',
            'valid_date' => 'Hanya bisa diisi dengan tanggal yang valid!'
        ],
        'status'        => [
            'required' => 'Status harus diisi!'
        ]
    ];

    protected $skipValidation  = false;
}