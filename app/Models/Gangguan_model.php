<?php

namespace App\Models;

use CodeIgniter\Model;

class Gangguan_model extends Model {
    protected $table      = 'gangguan';
    protected $primaryKey = 'id_gangguan';
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;
 
    protected $allowedFields = ['id_pelanggan','laporan','tanggal_open','tanggal_close','status'];

    protected $validationRules    = [
        'id_pelanggan'     => 'required|numeric',
        'laporan'        => 'required|min_length[3]',
        'tanggal_open'     => 'required|valid_date',
        'tanggal_close'        => 'required|valid_date',
        'status'        => 'required',
    ];

    protected $validationMessages = [
        'id_pelanggan'        => [
            'required' => 'Pelanggan harus dipilih!',
            'numeric' => 'Hanya bisa diisi dengan angka!'
        ],
        'laporan'        => [
            'required' => 'Laporan harus diisi!',
            'min_length[3]' => 'Minimal 3 Karakter!'
        ],
        'tanggal_open'        => [
            'required' => 'Tanggal harus dipilih!',
            'valid_date' => 'Hanya bisa diisi dengan tanggal yang valid!'
        ],
        'tanggal_close'        => [
            'required' => 'Laporan harus diisi!',
            'valid_date' => 'Hanya bisa diisi dengan tanggal yang valid!'
        ],
        'status'        => [
            'required' => 'Status harus diisi!'
        ]
    ];

    protected $skipValidation  = false;
}