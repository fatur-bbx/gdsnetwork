<?php

namespace App\Models;

use CodeIgniter\Model;

class Pelanggan_model extends Model {
    protected $uuidFields = ['id_pelanggan'];
    protected $table      = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;
 
    protected $allowedFields = ['id_pelanggan','nama','alamat','no_hp','email','id_bts','id_perangkat','tanggal','id_paket'];

    protected $validationRules    = [
        'nama'     => 'required|min_length[3]',
        'alamat'        => 'required|min_length[3]',
        'no_hp'     => 'required|min_length[10]',
        'id_bts'        => 'required',
        'id_perangkat'     => 'required',
        'tanggal'        => 'required|valid_date',
        'id_paket'        => 'required',
    ];

    protected $validationMessages = [
        'nama'        => [
            'required' => 'Nama Pelanggan harus dipilih!',
            'min_length[3]' => 'Minimal 3 Karakter!'
        ],
        'alamat'        => [
            'required' => 'Alamat harus diisi!',
            'min_length[3]' => 'Minimal 3 Karakter!'
        ],
        'no_hp'        => [
            'required' => 'Nomor HP harus diisi!',
            'min_length[10]' => 'Minimal 10 Karakter!'
        ],
        'id_bts'        => [
            'required' => 'BTS harus diisi!'
        ],
        'id_perangkat'        => [
            'required' => 'Perangkat harus diisi!'
        ],
        'tanggal'        => [
            'required' => 'Tanggal harus diisi!',
            'valid_date' => 'Hanya bisa diisi dengan tanggal yang valid!'
        ],
        'id_paket'        => [
            'required' => 'Paket harus diisi!'
        ],
    ];

    protected $skipValidation  = false;
}