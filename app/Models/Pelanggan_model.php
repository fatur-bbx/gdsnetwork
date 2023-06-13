<?php

namespace App\Models;

use CodeIgniter\Model;

class Pelanggan_model extends Model {
    protected $table      = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
 
    protected $returnType     = 'object';
    protected $useSoftDeletes = true;
 
    protected $allowedFields = ['nama','alamat','no_hp','email','id_bts','id_perangkat','tanggal','id_paket'];

    protected $validationRules    = [
        'nama'     => 'required|min_length[3]',
        'alamat'        => 'required|min_length[3]',
        'no_hp'     => 'required|min_length[10]',
        'email'        => 'required|valid_email|is_unique[pelanggan.email]|min_length[6]',
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
        'email'        => [
            'required' => 'Email harus diisi!',
            'valid_email' => 'Hanya bisa diisi dengan email yang valid!'
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