<?php

namespace App\Models;

use CodeIgniter\Model;

class User_level_model extends Model {
    protected $table      = 'user_level';
    protected $primaryKey = 'id_level';
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;
 
    protected $allowedFields = ['level','description'];

    protected $validationRules    = [
        'level'     => 'required|min_length[3]',
        'description'        => 'required|min_length[3]',
    ];

    protected $validationMessages = [
        'level'        => [
            'required' => 'Nama Level harus diisi!',
            'min_length' => 'Minimal 3 Karakter'
        ],
        'description'        => [
            'required' => 'Deskripsi harus diisi!',
            'min_length' => 'Minimal 3 Karakter'
        ]
    ];

    protected $skipValidation  = false;
}