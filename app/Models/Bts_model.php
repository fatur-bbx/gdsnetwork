<?php

namespace App\Models;

use CodeIgniter\Model;

class Bts_model extends Model {
    protected $table      = 'bts';
    protected $primaryKey = 'id_bts';
 
    protected $returnType     = 'object';
    protected $useSoftDeletes = true;
 
    protected $allowedFields = ['nama_bts','alamat'];

    protected $validationRules    = [
        'nama_bts'     => 'required|min_length[3]',
        'alamat'        => 'required',
    ];

    protected $validationMessages = [
        'nama_bts'        => [
            'required' => 'Nama BTS harus diisi!',
            'min_length' => 'Minimal 3 Karakter'
        ],
        'alamat'        => [
            'required' => 'Alamat BTS harus diisi!'
        ]
    ];

    protected $skipValidation  = false;
}